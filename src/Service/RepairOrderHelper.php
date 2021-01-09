<?php

namespace App\Service;

use App\Entity\Customer;
use App\Entity\RepairOrder;
use App\Entity\User;
use App\Helper\FalsyTrait;
use App\Helper\iServiceLoggerTrait;
use App\Repository\CustomerRepository;
use App\Repository\RepairOrderRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class RepairOrderHelper.
 */
class RepairOrderHelper
{
    use iServiceLoggerTrait;
    use FalsyTrait;

    private $em;
    private $repo;
    private $customers;
    private $users;
    private $customerHelper;

    /**
     * RepairOrderHelper constructor.
     */
    public function __construct(
        EntityManagerInterface $em,
        RepairOrderRepository $repo,
        CustomerRepository $customers,
        UserRepository $users,
        CustomerHelper $customerHelper
    ) {
        $this->em = $em;
        $this->repo = $repo;
        $this->customers = $customers;
        $this->users = $users;
        $this->customerHelper = $customerHelper;
    }

    public function isNumberUnique(string $roNumber): bool
    {
        $ro = $this->repo->findByUID($roNumber);

        return null === $ro;
    }

    /**
     * @return RepairOrder|array Array on validation failure
     */
    public function addRepairOrder(array $params)
    {
        $errors = [];
        $required = ['customerName', 'customerPhone', 'number'];
        foreach ($required as $k) {
            if (!isset($params[$k]) || 0 === strlen($params[$k])) {
                $errors[$k] = 'Required field missing';
            }
        }
        $ro = new RepairOrder();
        $customer = $this->handleCustomer($params);
        if ($customer instanceof Customer) {
            $ro->setPrimaryCustomer($customer);
        } else {
            $errors = array_merge($errors, $customer);
        }
        $errors = array_merge($errors, $this->buildRO($params, $ro));
        if (!empty($errors)) {
            return $errors;
        }
        if (null === $ro->getLinkHash()) {
            $ro->setLinkHash($this->generateLinkHash($ro->getDateCreated()->format('c')));
        }
        if (null === $ro->getPrimaryAdvisor()) {
            $advisors = $this->users->getUserByRole('ROLE_SERVICE_ADVISOR');
            $advisor = $advisors[0] ?? null;
            if (!$advisor instanceof User) {
                throw new \RuntimeException('Could not find advisor');
            }
            $ro->setPrimaryAdvisor($advisor);
        }
        $this->em->persist($ro);
        $this->commitRepairOrder();

        return $ro;
    }

    public function updateRepairOrder(array $params, RepairOrder $ro): array
    {
        if (null === $ro->getId()) {
            throw new \InvalidArgumentException('RO is missing ID');
        }
        $errors = $this->buildRO($params, $ro);
        if (!empty($errors)) {
            return $errors;
        }
        $this->commitRepairOrder();

        return [];
    }

    public function closeRepairOrder(RepairOrder $ro): void
    {
        if (null !== $ro->getDateClosed()) {
            throw new \InvalidArgumentException('RO is already closed');
        }
        $ro->setDateClosed(new \DateTime());
        $this->commitRepairOrder();
    }

    public function archiveRepairOrder(RepairOrder $ro): void
    {
        if (true === $ro->isArchived()) {
            throw new \InvalidArgumentException('RO is already archived');
        }
        $ro->setArchived(true);
        $this->commitRepairOrder();
    }

    public function deleteRepairOrder(RepairOrder $ro): void
    {
        if (true === $ro->getDeleted()) {
            throw new \InvalidArgumentException('RO is already deleted');
        }
        $ro->setDeleted(true);
        $this->commitRepairOrder();
    }

    private function commitRepairOrder(): void
    {
        $this->em->beginTransaction();
        try {
            $this->em->flush();
            $this->em->commit();
        } catch (\Exception $e) {
            $this->em->rollback();
            throw new \RuntimeException('Caught exception during flush', 0, $e);
        }
    }

    private function generateLinkHash(string $dateCreated): string
    {
        try {
            $hash = sha1($dateCreated.random_bytes(32));
        } catch (\Exception $e) { // Shouldn't ever happen
            throw new \RuntimeException('Could not generate random bytes. The server is broken.', 0, $e);
        }
        $ro = $this->repo->findByHash($hash);
        if (null !== $ro) { // Very unlikely
            $this->logger->warning('link hash collision');

            return $this->generateLinkHash($dateCreated);
        }

        return $hash;
    }

    /**
     * @return array Array on validation failure
     */
    private function buildRO(array $params, RepairOrder $ro): array
    {
        $errors = [];
        foreach (['advisor', 'technician'] as $k) {
            if (!isset($params[$k]) || empty($params[$k])) {
                continue;
            }
            $role = ('advisor' === $k) ? 'ROLE_SERVICE_ADVISOR' : 'ROLE_TECHNICIAN';
            $user = $this->users->find($params[$k]);
            if (null === $user) {
                $errors[$k] = ucfirst($k).' not found';
                continue;
            } elseif (!in_array($role, $user->getRoles())) {
                $errors[$k] = ucfirst($k).' does not have role '.$role;
                continue;
            }
            if ('advisor' === $k) {
                $ro->setPrimaryAdvisor($user);
            } else {
                $ro->setPrimaryTechnician($user);
            }
        }
        if (isset($params['number'])) {
            if ($this->isNumberUnique($params['number'])) {
                $ro->setNumber($params['number']);
            } else {
                $errors['number'] = 'RO# already exists';
            }
        }
        if (isset($params['startValue'])) {
            $ro->setStartValue($params['startValue']);
        }
        if (isset($params['finalValue'])) {
            $ro->setFinalValue($params['finalValue']);
        }
        if (isset($params['approvedValue'])) {
            $ro->setApprovedValue($params['approvedValue']);
        }
        if (isset($params['waiter'])) {
            $ro->setWaiter($this->paramToBool($params['waiter']));
        }
        if (isset($params['pickupDate'])) {
            try {
                $dt = new \DateTime($params['pickupDate']);
                $ro->setPickupDate($dt);
            } catch (\Exception $e) {
                $errors['pickupDate'] = 'Invalid date format';
            }
        }
        if (isset($params['year'])) {
            $ro->setYear($params['year']);
        }
        if (isset($params['make'])) {
            $ro->setMake($params['make']);
        }
        if (isset($params['model'])) {
            $ro->setModel($params['model']);
        }
        if (isset($params['miles'])) {
            $ro->setMiles($params['miles']);
        }
        if (isset($params['vin'])) {
            $ro->setVin($params['vin']);
        }
        if (isset($params['internal'])) {
            $ro->setInternal($this->paramToBool($params['internal']));
        }
        if (isset($params['dmsKey'])) {
            $ro->setDmsKey($params['dmsKey']);
        }
        if (isset($params['waiver'])) {
            $ro->setWaiver($params['waiver']);
        }
        if (isset($params['waiverVerbiage'])) {
            $ro->setWaiverVerbiage($params['waiverVerbiage']);
        }
        if (isset($params['upgradeQue'])) {
            $ro->setUpgradeQue($this->paramToBool($params['upgradeQue']));
        }
        if (isset($params['note'])) {
            $ro->setNote($params['note']);
        }

        return $errors;
    }

    /**
     * @return Customer|array Array on validation failure
     */
    private function handleCustomer(array $params)
    {
        $customer = $this->customers->findByPhone($params['customerPhone']);
        if (null !== $customer) {
            $customer->setName($params['customerName']);
            $this->customerHelper->commitCustomer($customer);

            return $customer;
        }
        $translated = $this->translateCustomerParams($params);
        $errors = $this->customerHelper->validateParams($translated);
        if (!empty($errors)) {
            return $this->translateCustomerParams($errors, true);
        }
        $customer = new Customer();
        $this->customerHelper->commitCustomer($customer, $translated);

        return $customer;
    }

    private function translateCustomerParams(array $params, bool $reverse = false): array
    {
        $map = [
            'customerName' => 'name',
            'customerPhone' => 'phone',
            'skipMobileVerification' => 'skipMobileVerification',
        ];
        $return = [];

        foreach ($map as $from => $to) {
            if ($reverse && isset($params[$to])) {
                $return[$from] = $params[$to];
            } elseif (!$reverse) {
                $return[$to] = $params[$from] ?? null;
            }
        }

        return $return;
    }
}

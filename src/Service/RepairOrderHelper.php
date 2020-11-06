<?php

namespace App\Service;

use App\Entity\RepairOrder;
use App\Helper\FalsyTrait;
use App\Helper\iServiceLoggerTrait;
use App\Repository\CustomerRepository;
use App\Repository\RepairOrderRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class RepairOrderHelper
 * @package App\Service
 */
class RepairOrderHelper {
    use iServiceLoggerTrait, FalsyTrait;

    private $em;
    private $repo;
    private $customers;
    private $users;

    /**
     * RepairOrderHelper constructor.
     * @param EntityManagerInterface $em
     * @param RepairOrderRepository  $repo
     * @param CustomerRepository     $customers
     * @param UserRepository         $users
     */
    public function __construct (
        EntityManagerInterface $em,
        RepairOrderRepository $repo,
        CustomerRepository $customers,
        UserRepository $users
    ) {
        $this->em = $em;
        $this->repo = $repo;
        $this->customers = $customers;
        $this->users = $users;
    }

    /**
     * @param string $roNumber
     *
     * @return bool
     */
    public function isNumberUnique (string $roNumber): bool {
        $ro = $this->repo->findByUID($roNumber);

        return ($ro === null);
    }

    /**
     * @param array $params
     *
     * @return RepairOrder|array Array on validation failure
     */
    public function addRepairOrder (array $params) {
        $errors = [];
        $required = ['customer', 'advisor', 'technician', 'number', 'startValue'];
        foreach ($required as $k) {
            if (!isset($params[$k]) || strlen($params[$k]) === 0) {
                $errors[$k] = 'Required field missing';
            }
        }
        $ro = new RepairOrder();
        $errors = array_merge($errors, $this->buildRO($params, $ro));
        if (!empty($errors)) {
            return $errors;
        }
        if ($ro->getLinkHash() === null) {
            $ro->setLinkHash($this->generateLinkHash($ro->getDateCreated()->format('c')));
        }
        $this->em->persist($ro);
        $this->commitRepairOrder();

        return $ro;
    }

    /**
     * @param array       $params
     * @param RepairOrder $ro
     *
     * @return array
     */
    public function updateRepairOrder (array $params, RepairOrder $ro): array {
        if ($ro->getId() === null) {
            throw new \InvalidArgumentException('RO is missing ID');
        }
        $errors = $this->buildRO($params, $ro);
        if (!empty($errors)) {
            return $errors;
        }
        $this->commitRepairOrder();

        return [];
    }

    /**
     * @param RepairOrder $ro
     */
    public function closeRepairOrder (RepairOrder $ro): void {
        if ($ro->getDateClosed() !== null) {
            throw new \InvalidArgumentException('RO is already closed');
        }
        $ro->setDateClosed(new \DateTime());
        $this->commitRepairOrder();
    }

    /**
     * @param RepairOrder $ro
     */
    public function archiveRepairOrder (RepairOrder $ro): void {
        if ($ro->isArchived() === true) {
            throw new \InvalidArgumentException('RO is already archived');
        }
        $ro->setArchived(true);
        $this->commitRepairOrder();
    }

    /**
     * @param RepairOrder $ro
     */
    public function deleteRepairOrder (RepairOrder $ro): void {
        if ($ro->getDeleted() === true) {
            throw new \InvalidArgumentException('RO is already deleted');
        }
        $ro->setDeleted(true);
        $this->commitRepairOrder();
    }

    private function commitRepairOrder (): void {
        $this->em->beginTransaction();
        try {
            $this->em->flush();
            $this->em->commit();
        } catch (\Exception $e) {
            $this->em->rollback();
            throw new \RuntimeException('Caught exception during flush', 0, $e);
        }
    }

    /**
     * @param string $dateCreated
     *
     * @return string
     */
    private function generateLinkHash (string $dateCreated): string {
        try {
            $hash = sha1($dateCreated . random_bytes(32));
        } catch (\Exception $e) { // Shouldn't ever happen
            throw new \RuntimeException('Could not generate random bytes. The server is broken.', 0, $e);
        }
        $ro = $this->repo->findByHash($hash);
        if ($ro !== null) { // Very unlikely
            $this->logger->warning('link hash collision');
            return $this->generateLinkHash($dateCreated);
        }

        return $hash;
    }

    /**
     * @param array       $params
     * @param RepairOrder $ro
     *
     * @return array Array on validation failure
     */
    private function buildRO (array $params, RepairOrder $ro): array {
        $errors = [];
        if (isset($params['customer'])) {
            $customer = $this->customers->find($params['customer']);
            if ($customer === null) {
                $errors['customer'] = 'Customer not found';
            } else {
                $ro->setPrimaryCustomer($customer);
            }
        }
        foreach (['advisor', 'technician'] as $k) {
            if (!isset($params[$k]) || empty($params[$k])) {
                continue;
            }
            $user = $this->users->find($params[$k]);
            if ($user === null) {
                $errors[$k] = ucfirst($k) . ' not found';
                continue;
            }
            if ($k === 'advisor') {
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
}
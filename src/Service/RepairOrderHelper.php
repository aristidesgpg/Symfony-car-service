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
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;
use Exception;
use InvalidArgumentException;
use RuntimeException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class RepairOrderHelper
{
    use iServiceLoggerTrait;
    use FalsyTrait;

    private $em;
    private $repo;
    private $customers;
    private $users;
    private $customerHelper;

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

    /**
     * @return RepairOrder|array Array on validation failure
     *
     * @throws Exception
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

        if (is_null($ro->getLinkHash())) {
            $ro->setLinkHash($this->generateLinkHash($ro->getDateCreated()->format('c')));
        }

        if (is_null($ro->getPrimaryAdvisor())) {
            $advisors = $this->users->getUserByRole('ROLE_SERVICE_ADVISOR');
            $advisor = $advisors[0] ?? null;
            if (!$advisor instanceof User) {
                throw new Exception('Could not find advisor');
            }
            $ro->setPrimaryAdvisor($advisor);
        }

        if (is_null($ro->getPaymentStatus())) {
            $ro->setPaymentStatus('Not Started');
        }

        $this->em->persist($ro);
        $this->commitRepairOrder();

        return $ro;
    }

    /**
     * @return Customer|array Array on validation failure
     */
    private function handleCustomer(array $params)
    {
        $customer = $this->customers->findByPhone($params['customerPhone']);
        $translated = $this->translateCustomerParams($params);
        $errors = $this->customerHelper->validateParams($translated);
        if (!empty($errors)) {
            return $this->translateCustomerParams($errors, true);
        }
        if (!$customer) {
            $customer = new Customer();
        }
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
        if (array_key_exists('customerEmail', $params) || array_key_exists('email', $params)) {
            $map['customerEmail'] = 'email';
        }

        foreach ($map as $from => $to) {
            if ($reverse && isset($params[$to])) {
                $return[$from] = $params[$to];
            } elseif (!$reverse) {
                $return[$to] = $params[$from] ?? null;
            }
        }

        return $return;
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
                $dt = new DateTime($params['pickupDate']);
                $ro->setPickupDate($dt);
            } catch (Exception $e) {
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

        if (isset($params['waiverSignature'])) {
            $ro->setWaiverSignature($params['waiverSignature']);
        }

        if (isset($params['waiverVerbiage'])) {
            $ro->setWaiverVerbiage($params['waiverVerbiage']);
        }

        if (isset($params['upgradeQue'])) {
            $ro->setUpgradeQue($this->paramToBool($params['upgradeQue']));
        }

        return $errors;
    }

    public function isNumberUnique(string $roNumber): bool
    {
        $ro = $this->repo->findByUID($roNumber);

        return null === $ro;
    }

    public function generateLinkHash(string $dateCreated): string
    {
        try {
            $hash = sha1($dateCreated.random_bytes(32));
        } catch (Exception $e) { // Shouldn't ever happen
            throw new RuntimeException('Could not generate random bytes. The server is broken.', 0, $e);
        }
        $ro = $this->repo->findByHash($hash);
        if (null !== $ro) { // Very unlikely
            $this->logger->warning('link hash collision');

            return $this->generateLinkHash($dateCreated);
        }

        return $hash;
    }

    private function commitRepairOrder(): void
    {
        $this->em->beginTransaction();
        try {
            $this->em->flush();
            $this->em->commit();
        } catch (Exception $e) {
            $this->em->rollback();
            throw new RuntimeException('Caught exception during flush', 0, $e);
        }
    }

    public function updateRepairOrder(array $params, RepairOrder $ro): array
    {
        if (null === $ro->getId()) {
            throw new InvalidArgumentException('RO is missing ID');
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
            throw new InvalidArgumentException('RO is already closed');
        }
        $ro->setDateClosed(new DateTime());
        $this->commitRepairOrder();
    }

    public function deleteRepairOrder(RepairOrder $ro): void
    {
        if (true === $ro->getDeleted()) {
            throw new InvalidArgumentException('RO is already deleted');
        }
        $ro->setDeleted(true);
        $this->commitRepairOrder();
    }

    /**
     * @return array
     */
    public function getSuggestedRoNumbers()
    {
        $suggestedRoNumbers = [];
        // Get the latest RO number that is JUST a number in the last 20 ros entered
        $query = $this->em
            ->getConnection()
            ->prepare("
                SELECT MAX(r.number) number
                FROM (
                    SELECT *
                    FROM repair_order
                    WHERE number NOT REGEXP '[[:alpha:]]'
                    ORDER BY id DESC
                    LIMIT 20
                ) r 
            ");
        $query->execute();
        $latestRO = $query->fetchAll();

        if (!$latestRO) {
            return [];
        }
        $latestRO = array_shift($latestRO);
        if (!isset($latestRO)) {
            return [];
        }
        $latestRO = $latestRO['number'];
        $start = $latestRO - 20;
        $end = $latestRO + 20;
        foreach (range($latestRO - 1, $start, -1) as $possibleRONumber) {
            $exists = $this->repo->findOneBy(['number' => $possibleRONumber]);
            if (!$exists) {
                $suggestedRoNumbers[] = $possibleRONumber;
            }
            if (count($suggestedRoNumbers) >= 10) {
                break;
            }
        }
        foreach (range($latestRO + 1, $end, 1) as $possibleRONumber) {
            $exists = $this->repo->findOneBy(['number' => $possibleRONumber]);
            if (!$exists) {
                $suggestedRoNumbers[] = $possibleRONumber;
            }
            if (count($suggestedRoNumbers) >= 20) {
                break;
            }
        }
        sort($suggestedRoNumbers);

        return $suggestedRoNumbers;
    }

    public function addFilters(
        $queryBuilder,
        $startDate,
        $endDate,
        $sortField,
        $sortDirection,
        $searchTerm,
        $fields
    ) {
        try {
            $qb = $queryBuilder;

            foreach ($fields as $name => $value) {
                if (null !== $value) {
                    if ('open' === $name) {
                        if ($value) {
                            $qb->andWhere('ro.dateClosed IS NULL');
                        } else {
                            $qb->andWhere('ro.dateClosed IS NOT NULL');
                        }
                    } else {
                        if ('dateClosedStart' === $name || 'dateClosedEnd' === $name) {
                            try {
                                $value = new DateTime($value);
                            } catch (Exception $e) {
                                throw new BadRequestHttpException("$name is invalid date format".$value);
                            }
                            if ('dateClosedStart' === $name) {
                                $qb->andWhere("ro.dateClosed >= :$name");
                            } else {
                                $qb->andWhere("ro.dateClosed <= :$name");
                            }
                            $qb->setParameter($name, $value);
                        } else {
                            $qb->andWhere("ro.$name = :$name")
                               ->setParameter($name, $value);
                        }
                    }
                }
            }

            if ($startDate && $endDate) {
                try {
                    $startDate = new DateTime($startDate);
                    $endDate = new DateTime($endDate);

                    $qb->andWhere('ro.dateCreated BETWEEN :startDate AND :endDate')
                       ->setParameter('startDate', $startDate)
                       ->setParameter('endDate', $endDate);
                } catch (Exception $e) {
                    throw new BadRequestHttpException('Invalid startDate or endDate format');
                }
            }

            if ($searchTerm) {
                $query = '';

                $qb->leftJoin('ro.primaryCustomer', 'ro_customer')
                   ->leftJoin('ro.primaryTechnician', 'ro_technician')
                   ->leftJoin('ro.primaryAdvisor', 'ro_advisor');

                $searchFields = [
                    'ro' => ['number', 'year', 'model', 'miles', 'vin'],
                    'ro_customer' => ['name', 'phone', 'email'],
                    'ro_advisor' => ['combine_name', 'phone', 'email'],
                    'ro_technician' => ['combine_name', 'phone', 'email'],
                ];

                foreach ($searchFields as $class => $fields) {
                    foreach ($fields as $field) {
                        if ('combine_name' === $field) {
                            $query .= "CONCAT($class.firstName , ' ' , $class.lastName) LIKE :searchTerm OR ";
                        } else {
                            $query .= "$class.$field LIKE :searchTerm OR ";
                        }
                    }
                }

                $query = substr($query, 0, strlen($query) - 4);

                $qb->andWhere($query)
                   ->setParameter('searchTerm', '%'.$searchTerm.'%');
            }

            if ($sortDirection) {
                $qb->orderBy('ro.'.$sortField, $sortDirection);

                $urlParameters['sortField'] = $sortField;
                $urlParameters['sortDirection'] = $sortDirection;
            } else {
                $qb->orderBy('ro.dateCreated', 'DESC');
            }

            return $qb;
        } catch (NonUniqueResultException $e) {
            return null;
        }
    }

    /**
     * @param User   $user
     * @param null   $startDate
     * @param null   $endDate
     * @param string $sortField
     * @param string $sortDirection
     * @param null   $searchTerm
     * @param bool   $needsVideo
     * @param array  $fields
     *
     * @return null
     */
    public function getAllItems(
        $user,
        $startDate = null,
        $endDate = null,
        $sortField = 'dateCreated',
        $sortDirection = 'DESC',
        $searchTerm = null,
        $needsVideo = false,
        $fields = []
    ) {
        try {
            $qb = $this->repo->createQueryBuilder('ro');
            $qb->andWhere('ro.deleted = 0');

            if ($user instanceof User) {
                if (in_array('ROLE_SERVICE_ADVISOR', $user->getRoles())) {
                    if (!$needsVideo) {
                        if ($user->getShareRepairOrders()) {
                            $qb->andWhere('ro.primaryAdvisor IN (:users)')
                               ->setParameter('users', $user);

                            $queryParameters['users'] = $this->userRepo->getSharedUsers();
                        } else {
                            $qb->andWhere('ro.primaryAdvisor = :user')
                               ->setParameter('user', $user);

                            $queryParameters['user'] = $user;
                        }
                    }
                } elseif ($user->isTechnician()) {
                    $qb->andWhere('ro.primaryTechnician = :user OR ro.primaryTechnician is NULL')
                       ->setParameter('user', $user);

                    $queryParameters['user'] = $user;
                }
            } else {
                throw new BadRequestHttpException('Invalid User');
            }

            if (filter_var($needsVideo, FILTER_VALIDATE_BOOLEAN)) {
                $qb->andWhere('ro.dateClosed IS NULL')->andWhere("ro.videoStatus = 'Not Started'");
            }

            $qb = $this->addFilters(
                $qb,
                $startDate,
                $endDate,
                $sortField,
                $sortDirection,
                $searchTerm,
                $fields
            );

            return $qb->getQuery()->getResult();
        } catch (NonUniqueResultException $e) {
            return null;
        }
    }
}

<?php

namespace App\Repository;

use App\Entity\RepairOrder;
use App\Entity\User;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\Persistence\ManagerRegistry;
use Exception;

/**
 * @method RepairOrder|null find($id, $lockMode = null, $lockVersion = null)
 * @method RepairOrder|null findOneBy(array $criteria, array $orderBy = null)
 * @method RepairOrder[]    findAll()
 * @method RepairOrder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RepairOrderRepository extends ServiceEntityRepository
{

    /**
     * RepairOrderRepository constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RepairOrder::class);
    }

    /**
     * @return array
     */
    public function getOpenRepairOrders(): array
    {
        //Set the number as the key to make it faster for finding.
        $results = $this->findBy(['dateClosed' => null, 'deleted' => 0]);
        $result = [];
        foreach ($results as $r) {
            $result[$r->getNumber()] = $r;
        }

        return $result;
    }


    /**
     * @param null   $start
     * @param null   $end
     * @param string $sortField
     * @param string $sortDirection
     * @param null   $searchTerm
     *
     * @return Query|null
     * @throws Exception
     */
    public function getAllItems(
        $user,
        $userRepo,
        $startDate = null,
        $endDate = null,
        $sortField = 'dateCreated',
        $sortDirection = 'DESC',
        $searchTerm = null,
        $fields = []
    ) {
        try {
            $qb = $this->createQueryBuilder('ro');
            $qb->andWhere('ro.deleted = 0');

            foreach ($fields as $name => $value) {
                if ($value !== null) {
                    if ($name === 'open') {
                        if ($value) {
                            $qb->andWhere('ro.dateClosed IS NULL');
                        } else {
                            $qb->andWhere('ro.dateClosed IS NOT NULL');
                        }
                    } else {
                        $qb->andWhere("ro.$name = :$name")
                           ->setParameter($name, $value);
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
                    $errors['date'] = 'Invalid date format';
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
                        if ($field === 'combine_name') {
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

            if ($user instanceof User) {
                if (in_array('ROLE_SERVICE_ADVISOR', $user->getRoles())) {
                    if ($user->getShareRepairOrders()) {
                        $qb->andWhere('ro.primaryAdvisor IN (:users)')
                           ->setParameter('users', $user);
                        $queryParameters['users'] = $userRepo->getSharedUsers();
                    } else {
                        $qb->andWhere('ro.primaryAdvisor = :user')
                           ->setParameter('user', $user);
                        $queryParameters['user'] = $user;
                    }
                } elseif (in_array('ROLE_TECHNICIAN', $user->getRoles())) {
                    $qb->andWhere('ro.primaryTechnician = :user  OR ro.primaryTechnician is NULL')
                       ->setParameter('user', $user);
                    $queryParameters['user'] = $user;
                }
            }
            if ($sortDirection) {
                $qb->orderBy('ro.'.$sortField, $sortDirection);

                $urlParameters['sortField'] = $sortField;
                $urlParameters['sortDirection'] = $sortDirection;
            } else {
                $qb->orderBy('ro.dateCreated', 'DESC');
            }

            return $qb->getQuery()->getResult();
        } catch (NonUniqueResultException $e) {
            return null;
        }
    }

    /**
     * @param string $uid
     *
     * @return RepairOrder|null
     */
    public function findByUID(string $uid): ?RepairOrder
    {
        try {
            $repairOrder = $this->find($uid);
            if ($repairOrder) {
                return $repairOrder;
            }

            return $this->createQueryBuilder('r')
                        ->orWhere('r.number= :uid')
                        ->orWhere('r.linkHash = :uid')
                        ->setParameter('uid', $uid)
                        ->orderBy('r.id', 'DESC')
                        ->setMaxResults(1)
                        ->getQuery()
                        ->getOneOrNullResult();
        } catch (NonUniqueResultException $e) {
            // shouldn't happen
            return null;
        }
    }

    /**
     * @param string $number
     *
     * @return RepairOrder|null
     */
    public function findByNumber(string $number): ?RepairOrder
    {
        try {
            return $this->createQueryBuilder('ro')
                        ->andWhere('ro.number = :number')
                        ->setParameter('number', $number)
                        ->getQuery()
                        ->getOneOrNullResult();
        } catch (NonUniqueResultException $e) {
            return null;
        }
    }

    /**
     * @param string $linkHash
     *
     * @return RepairOrder|null
     */
    public function findByHash(string $linkHash): ?RepairOrder
    {
        try {
            return $this->createQueryBuilder('ro')
                        ->andWhere('ro.linkHash = :hash')
                        ->setParameter('hash', $linkHash)
                        ->getQuery()
                        ->getOneOrNullResult();
        } catch (NonUniqueResultException $e) {
            return null;
        }
    }

    /**
     * @param null $sortField
     * @param null $sortDirection
     * @param null $searchTerm
     */
    public function findByNeedsVideo(User $user, $sortField = null, $sortDirection = null, $searchTerm = null)
    {
        $queryBuilder = $this->createQueryBuilder('ro');

        // If tech, only get theirs or others where tech is null
        if ($user->isTechnician()) {
            $queryBuilder->andWhere('ro.primaryTechnician IS NULL OR ro.primaryTechnician = :primaryTechnician')
                         ->setParameter('primaryTechnician', $user);
        }

        // Only non-archived, non-deleted, non-closed repair orders matter
        $queryBuilder->andWhere('ro.deleted = 0')
                     ->andWhere('ro.dateClosed IS NULL')
                     ->andWhere('ro.archived = 0');

        // They passed a search term
        if ($searchTerm) {
            $query = '';
            $queryBuilder->leftJoin('ro.primaryCustomer', 'ro_customer')
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
                    if ($field === 'combine_name') {
                        $query .= "CONCAT($class.firstName , ' ' , $class.lastName) LIKE :searchTerm OR ";
                    } else {
                        $query .= "$class.$field LIKE :searchTerm OR ";
                    }
                }
            }

            $query = substr($query, 0, strlen($query) - 4);

            $queryBuilder->andWhere($query)
                         ->setParameter('searchTerm', '%'.$searchTerm.'%');
        }

        // They passed sort data
        if ($sortDirection) {
            $queryBuilder->orderBy('ro.'.$sortField, $sortDirection);

            $urlParameters['sortField'] = $sortField;
            $urlParameters['sortDirection'] = $sortDirection;
        }

        return $queryBuilder->getQuery()->getResult();
    }

    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

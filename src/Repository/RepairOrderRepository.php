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
    /** @var UserRepository */
    private $userRepo;

    /**
     * RepairOrderRepository constructor.
     */
    public function __construct(ManagerRegistry $registry, UserRepository $userRepo)
    {
        parent::__construct($registry, RepairOrder::class);
        $this->userRepo = $userRepo;
    }

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
     * @param null $start
     * @param null $end
     *
     * @return Query|null
     *
     * @throws Exception
     */
    public function getAllArchives($start = null, $end = null, $sortField = 'dateCreated', $sortDirection = 'DESC', $searchTerm = null)
    {
        if (is_null($end)) {
            $end = new DateTime();
        } else {
            $end = new DateTime($end);
        }

        if ($start) {
            $start = new DateTime($start);
        }

        try {
            $qb = $this->createQueryBuilder('ro');
            $qb->andWhere('ro.deleted = false')->andWhere('ro.dateClosed IS NOT NULL');

            if ($start && $end) {
                $qb->andWhere('ro.dateCreated BETWEEN :start AND :end')
                    ->setParameter('start', $start->format('Y-m-d H:i'))
                    ->setParameter('end', $end->format('Y-m-d H:i'));
            } else {
                $qb->andWhere('ro.dateCreated < :end')
                    ->setParameter('end', $end->format('Y-m-d H:i'));
            }

            // for iPay reporting
            if ($searchTerm) {
                $query = '';

                $qb->leftJoin('ro.primaryCustomer', 'ro_customer')
                   ->leftJoin('ro.primaryAdvisor', 'ro_advisor');

                $searchFields = [
                    'ro' => ['number'],
                    'ro_customer' => ['name'],
                    'ro_advisor' => ['combine_name'],
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
            } else {
                $qb->orderBy('ro.dateCreated', 'DESC');
            }

            return $qb->getQuery()->getResult();
        } catch (NonUniqueResultException $e) {
            return null;
        }
    }

    public function getMpiReporting($start = null, $end = null, $sortField = 'dateCreated', $sortDirection = 'DESC', $advisorId = null, $technicianId = null)
    {
        if (is_null($end)) {
            $end = new DateTime();
        } else {
            $end = new DateTime($end);
        }

        if ($start) {
            $start = new DateTime($start);
        }

        try {
            $qb = $this->createQueryBuilder('ro');
            $qb->andWhere('ro.deleted = false')->andWhere('ro.dateClosed IS NOT NULL');

            if ($start && $end) {
                $qb->andWhere('ro.dateCreated BETWEEN :start AND :end')
                    ->setParameter('start', $start->format('Y-m-d H:i'))
                    ->setParameter('end', $end->format('Y-m-d H:i'));
            } else {
                $qb->andWhere('ro.dateCreated < :end')
                    ->setParameter('end', $end->format('Y-m-d H:i'));
            }

            if ($advisorId) {
                $qb->andWhere('ro.primaryAdvisor = :advisorId')
                   ->setParameter('advisorId', $advisorId);
            }

            if ($technicianId) {
                $qb->andWhere('ro.primaryTechnician = :technicianId')
                   ->setParameter('technicianId', $technicianId);
            }

            if ($sortDirection) {
                $qb->orderBy('ro.'.$sortField, $sortDirection);
            } else {
                $qb->orderBy('ro.dateCreated', 'DESC');
            }

            return $qb->getQuery()->getResult();
        } catch (NonUniqueResultException $e) {
            return null;
        }
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

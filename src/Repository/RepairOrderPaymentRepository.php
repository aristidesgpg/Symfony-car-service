<?php

namespace App\Repository;

use App\Entity\RepairOrderPayment;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\Persistence\ManagerRegistry;

class RepairOrderPaymentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RepairOrderPayment::class);
    }

    /**
     * @param string $sortDirection
     * @param null   $searchTerm
     */
    public function getAllPayments(
        $sortField = 'dateCreated',
        $sortDirection = 'DESC',
        $searchTerm = null
    ) {
        $qb = $this->createQueryBuilder('rop');
        $qb->andWhere('rop.deleted = false')
           ->andWhere('rop.datePaid IS NOT NULL');

        if ($searchTerm) {
            $query = '';
            $searchFields = [
                    'rop' => ['amount', 'refundedAmount'],
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
            $qb->orderBy('rop.'.$sortField, $sortDirection);
        } else {
            $qb->orderBy('rop.dateCreated', 'DESC');
        }

        return $qb->getQuery();
    }

    /**
     * TODO: Remove.
     *
     * @param null   $start
     * @param null   $end
     * @param string $sortField
     * @param string $sortDirection
     * @param null   $searchTerm
     *
     * @return Query|null
     *
     * @throws Exception
     */
    public function getAllPayments2(
        $start = null,
        $end = null,
        $sortField = 'dateCreated',
        $sortDirection = 'DESC',
        $searchTerm = null
    ) {
        if (is_null($end)) {
            $end = new DateTime();
        } else {
            $end = new DateTime($end);
        }

        if ($start) {
            $start = new DateTime($start);
        }

        try {
            $qb = $this->createQueryBuilder('rop');
            $qb->andWhere('rop.deleted = false');

            $qb->innerJoin('rop.repairOrder', 'ro');

            if ($start && $end) {
                $qb->andWhere('ro.dateClosed BETWEEN :start AND :end')
                   ->setParameter('start', $start->format('Y-m-d H:i'))
                   ->setParameter('end', $end->format('Y-m-d H:i'));
            } else {
                $qb->andWhere('ro.dateClosed < :end')
                   ->setParameter('end', $end->format('Y-m-d H:i'));
            }

            if ($searchTerm) {
                $query = '';

                $qb->leftJoin('ro.primaryCustomer', 'ro_customer')
                   ->leftJoin('ro.primaryAdvisor', 'ro_advisor');

                $searchFields = [
                    'ro' => ['number'],
                    'ro_customer' => ['name'],
                    'ro_advisor' => ['combine_name'],
                    'rop' => ['amount', 'refundedAmount'],
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
                $qb->orderBy('rop.'.$sortField, $sortDirection);
            } else {
                $qb->orderBy('rop.dateCreated', 'DESC');
            }

            return $qb->getQuery();
        } catch (NonUniqueResultException $e) {
            return null;
        }
    }
}

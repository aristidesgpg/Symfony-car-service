<?php

namespace App\Repository;

use App\Entity\RepairOrderPayment;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class RepairOrderPaymentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RepairOrderPayment::class);
    }

    /**
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
    public function getAllPayments(
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
                $fields = ['amount', 'refundedAmount'];

                foreach ($fields as $field) {
                    $query .= "rop.$field LIKE :searchTerm OR ";
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

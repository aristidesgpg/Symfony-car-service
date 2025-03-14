<?php

namespace App\Repository;

use App\Entity\CheckIn;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;
use Exception;

/**
 * @method CheckIn|null find($id, $lockMode = null, $lockVersion = null)
 * @method CheckIn|null findOneBy(array $criteria, array $orderBy = null)
 * @method CheckIn[]    findAll()
 * @method CheckIn[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CheckInRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CheckIn::class);
    }

    // /**
    //  * @return CheckIn[] Returns an array of CheckIn objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CheckIn
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

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
    public function getAllItems(
        $start = null,
        $end = null,
        $sortField = 'date',
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
            $qb = $this->createQueryBuilder('ch');
            $qb->andWhere('ch.deleted = false');

            if ($start && $end) {
                $qb->andWhere('ch.date BETWEEN :start AND :end')
                    ->setParameter('start', $start->format('Y-m-d H:i'))
                    ->setParameter('end', $end->format('Y-m-d H:i'));
            } else {
                $qb->andWhere('ch.date < :end')
                   ->setParameter('end', $end->format('Y-m-d H:i'));
            }
            if ($searchTerm) {
                $qb->andWhere('ch.identification LIKE :searchTerm')
                   ->setParameter('searchTerm', '%'.$searchTerm.'%');
            }

            if ($sortDirection) {
                $qb->orderBy('ch.'.$sortField, $sortDirection);
            } else {
                $qb->orderBy('ch.date', 'DESC');
            }

            return $qb->getQuery();
        } catch (NonUniqueResultException $e) {
            return null;
        }
    }
}

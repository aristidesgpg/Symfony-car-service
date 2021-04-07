<?php

namespace App\Repository;

use App\Entity\RepairOrderQuoteLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RepairOrderQuoteLog|null find($id, $lockMode = null, $lockVersion = null)
 * @method RepairOrderQuoteLog|null findOneBy(array $criteria, array $orderBy = null)
 * @method RepairOrderQuoteLog[]    findAll()
 * @method RepairOrderQuoteLog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RepairOrderQuoteLogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RepairOrderQuoteLog::class);
    }

    // /**
    //  * @return RepairOrderQuoteLog[] Returns an array of RepairOrderQuoteLog objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RepairOrderQuoteLog
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

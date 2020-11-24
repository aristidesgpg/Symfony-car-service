<?php

namespace App\Repository;

use App\Entity\RepairOrderQuoteService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RepairOrderQuoteService|null find($id, $lockMode = null, $lockVersion = null)
 * @method RepairOrderQuoteService|null findOneBy(array $criteria, array $orderBy = null)
 * @method RepairOrderQuoteService[]    findAll()
 * @method RepairOrderQuoteService[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RepairOrderQuoteServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RepairOrderQuoteService::class);
    }

    // /**
    //  * @return RepairOrderQuoteService[] Returns an array of RepairOrderQuoteService objects
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
    public function findOneBySomeField($value): ?RepairOrderQuoteService
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

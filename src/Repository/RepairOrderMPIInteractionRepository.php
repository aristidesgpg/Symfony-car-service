<?php

namespace App\Repository;

use App\Entity\RepairOrderMPIInteraction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RepairOrderMPIInteraction|null find($id, $lockMode = null, $lockVersion = null)
 * @method RepairOrderMPIInteraction|null findOneBy(array $criteria, array $orderBy = null)
 * @method RepairOrderMPIInteraction[]    findAll()
 * @method RepairOrderMPIInteraction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RepairOrderMPIInteractionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RepairOrderMPIInteraction::class);
    }

    // /**
    //  * @return RepairOrderMPIInteraction[] Returns an array of RepairOrderMPIInteraction objects
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
    public function findOneBySomeField($value): ?RepairOrderMPIInteraction
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

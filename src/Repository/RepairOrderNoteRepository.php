<?php

namespace App\Repository;

use App\Entity\RepairOrderNote;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RepairOrderNote|null find($id, $lockMode = null, $lockVersion = null)
 * @method RepairOrderNote|null findOneBy(array $criteria, array $orderBy = null)
 * @method RepairOrderNote[]    findAll()
 * @method RepairOrderNote[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RepairOrderNoteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RepairOrderNote::class);
    }

    // /**
    //  * @return RepairOrderNote[] Returns an array of RepairOrderNote objects
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
    public function findOneBySomeField($value): ?RepairOrderNote
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

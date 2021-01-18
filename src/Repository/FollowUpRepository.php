<?php

namespace App\Repository;

use App\Entity\FollowUp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FollowUp|null find($id, $lockMode = null, $lockVersion = null)
 * @method FollowUp|null findOneBy(array $criteria, array $orderBy = null)
 * @method FollowUp[]    findAll()
 * @method FollowUp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FollowUpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FollowUp::class);
    }

    // /**
    //  * @return FollowUp[] Returns an array of FollowUp objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FollowUp
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

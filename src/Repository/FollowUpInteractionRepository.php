<?php

namespace App\Repository;

use App\Entity\FollowUpInteraction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FollowUpInteraction|null find($id, $lockMode = null, $lockVersion = null)
 * @method FollowUpInteraction|null findOneBy(array $criteria, array $orderBy = null)
 * @method FollowUpInteraction[]    findAll()
 * @method FollowUpInteraction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FollowUpInteractionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FollowUpInteraction::class);
    }

    // /**
    //  * @return FollowUpInteraction[] Returns an array of FollowUpInteraction objects
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
    public function findOneBySomeField($value): ?FollowUpInteraction
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

<?php

namespace App\Repository;

use App\Entity\RepairOrderQuoteRecommendation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RepairOrderQuoteRecommendation|null find($id, $lockMode = null, $lockVersion = null)
 * @method RepairOrderQuoteRecommendation|null findOneBy(array $criteria, array $orderBy = null)
 * @method RepairOrderQuoteRecommendation[]    findAll()
 * @method RepairOrderQuoteRecommendation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RepairOrderQuoteRecommendationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RepairOrderQuoteRecommendation::class);
    }

    // /**
    //  * @return RepairOrderQuoteRecommendation[] Returns an array of RepairOrderQuoteRecommendation objects
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
    public function findOneBySomeField($value): ?RepairOrderQuoteRecommendation
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

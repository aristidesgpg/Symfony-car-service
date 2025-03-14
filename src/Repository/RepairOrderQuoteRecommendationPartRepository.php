<?php

namespace App\Repository;

use App\Entity\RepairOrderQuoteRecommendationPart;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RepairOrderQuoteRecommendationPart|null find($id, $lockMode = null, $lockVersion = null)
 * @method RepairOrderQuoteRecommendationPart|null findOneBy(array $criteria, array $orderBy = null)
 * @method RepairOrderQuoteRecommendationPart[]    findAll()
 * @method RepairOrderQuoteRecommendationPart[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RepairOrderQuoteRecommendationPartRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RepairOrderQuoteRecommendationPart::class);
    }

    // /**
    //  * @return RepairOrderQuoteRecommendationPart[] Returns an array of RepairOrderQuoteRecommendationPart objects
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
    public function findOneBySomeField($value): ?RepairOrderQuoteRecommendationPart
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

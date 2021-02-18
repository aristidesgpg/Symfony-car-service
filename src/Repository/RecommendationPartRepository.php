<?php

namespace App\Repository;

use App\Entity\RecommendationPart;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RecommendationPart|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecommendationPart|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecommendationPart[]    findAll()
 * @method RecommendationPart[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecommendationPartRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecommendationPart::class);
    }

    // /**
    //  * @return RecommendationPart[] Returns an array of RecommendationPart objects
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
    public function findOneBySomeField($value): ?RecommendationPart
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

<?php

namespace App\Repository;

use App\Entity\MpiGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MpiGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method MpiGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method MpiGroup[]    findAll()
 * @method MpiGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MpiGroupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MpiGroup::class);
    }

    // /**
    //  * @return MpiGroup[] Returns an array of MpiGroup objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MpiGroup
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

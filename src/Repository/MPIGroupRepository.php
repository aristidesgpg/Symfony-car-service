<?php

namespace App\Repository;

use App\Entity\MPIGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MPIGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method MPIGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method MPIGroup[]    findAll()
 * @method MPIGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MPIGroupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MPIGroup::class);
    }

    // /**
    //  * @return MPIGroup[] Returns an array of MPIGroup objects
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
    public function findOneBySomeField($value): ?MPIGroup
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

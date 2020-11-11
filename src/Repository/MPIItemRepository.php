<?php

namespace App\Repository;

use App\Entity\MpiItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MpiItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method MpiItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method MpiItem[]    findAll()
 * @method MpiItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MpiItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MpiItem::class);
    }

    // /**
    //  * @return MpiItem[] Returns an array of MpiItem objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MpiItem
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findActiveItems()
    {
        return $this->createQueryBuilder('mi')
                    ->join('mi.mpiGroup', 'mg')
                    ->join('mg.mpiTemplate', 'mt')
                    ->where('mt.active = 1')
                    ->andWhere('mt.deleted = 0')
                    ->andWhere('mg.active = 1')
                    ->andWhere('mg.deleted = 0')
                    ->andWhere('mi.deleted = 0')
                    ->getQuery()
                    ->getResult();
    }
}

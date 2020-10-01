<?php

namespace App\Repository;

use App\Entity\UpgradeSetting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UpgradeSetting|null find($id, $lockMode = null, $lockVersion = null)
 * @method UpgradeSetting|null findOneBy(array $criteria, array $orderBy = null)
 * @method UpgradeSetting[]    findAll()
 * @method UpgradeSetting[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UpgradeSettingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UpgradeSetting::class);
    }

    // /**
    //  * @return UpgradeSetting[] Returns an array of UpgradeSetting objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UpgradeSetting
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

<?php

namespace App\Repository;

use App\Entity\MpiTemplate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MpiTemplate|null find($id, $lockMode = null, $lockVersion = null)
 * @method MpiTemplate|null findOneBy(array $criteria, array $orderBy = null)
 * @method MpiTemplate[]    findAll()
 * @method MpiTemplate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MpiTemplateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MpiTemplate::class);
    }

    // /**
    //  * @return MpiTemplate[] Returns an array of MpiTemplate objects
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
    public function findOneBySomeField($value): ?MpiTemplate
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    
    public function findActiveTemplates(): ?MpiTemplate
    {
        return $this->createQueryBuilder('m')
            ->join('m.mpiGroups', 'mg')
            ->join('mg.mpiItems', 'mi')
            ->where('m.active = 1')
            ->andWhere('m.deleted = 0')
            ->andWhere('mg.active = 1')
            ->andWhere('mg.deleted = 0')
            ->andWhere('mi.deleted = 0')
            ->getQuery()
            ->getOneOrNullResult();
    }
}

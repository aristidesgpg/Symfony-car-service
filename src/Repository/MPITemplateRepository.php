<?php

namespace App\Repository;

use App\Entity\MPITemplate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MPITemplate|null find($id, $lockMode = null, $lockVersion = null)
 * @method MPITemplate|null findOneBy(array $criteria, array $orderBy = null)
 * @method MPITemplate[]    findAll()
 * @method MPITemplate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MPITemplateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MPITemplate::class);
    }

    // /**
    //  * @return MPITemplate[] Returns an array of MPITemplate objects
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
    public function findOneBySomeField($value): ?MPITemplate
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

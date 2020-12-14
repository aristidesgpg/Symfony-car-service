<?php

namespace App\Repository;

use App\Entity\InternalMessage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InternalMessage|null find($id, $lockMode = null, $lockVersion = null)
 * @method InternalMessage|null findOneBy(array $criteria, array $orderBy = null)
 * @method InternalMessage[]    findAll()
 * @method InternalMessage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InternalMessageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InternalMessage::class);
    }

    // /**
    //  * @return InternalMessage[] Returns an array of InternalMessage objects
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
    public function findOneBySomeField($value): ?InternalMessage
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

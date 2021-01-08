<?php

namespace App\Repository;

use App\Entity\OperationCode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OperationCode|null find($id, $lockMode = null, $lockVersion = null)
 * @method OperationCode|null findOneBy(array $criteria, array $orderBy = null)
 * @method OperationCode[]    findAll()
 * @method OperationCode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OperationCodeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OperationCode::class);
    }

    /**
     * @return QueryBuilder
     */
    public function getActiveOperationCodes()
    {
        return $this->createQueryBuilder('o')
                    ->andWhere('o.deleted = 0')
                    ->getQuery()
                    ->getResult();
    }

    // /**
    //  * @return OperationCode[] Returns an array of OperationCode objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OperationCode
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

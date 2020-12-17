<?php

namespace App\Repository;

use App\Entity\ThirdPartyAPILog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ThirdPartyAPILog|null find($id, $lockMode = null, $lockVersion = null)
 * @method ThirdPartyAPILog|null findOneBy(array $criteria, array $orderBy = null)
 * @method ThirdPartyAPILog[]    findAll()
 * @method ThirdPartyAPILog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ThirdPartyAPILogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ThirdPartyAPILog::class);
    }

    // /**
    //  * @return ThirdPartyAPILog[] Returns an array of ThirdPartyAPILog objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ThirdPartyAPILog
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

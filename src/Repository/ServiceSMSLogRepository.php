<?php

namespace App\Repository;

use App\Entity\ServiceSMSLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ServiceSMSLog|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceSMSLog|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceSMSLog[]    findAll()
 * @method ServiceSMSLog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceSMSLogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServiceSMSLog::class);
    }

    // /**
    //  * @return ServiceSMSLog[] Returns an array of ServiceSMSLog objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ServiceSMSLog
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

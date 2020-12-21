<?php

namespace App\Repository;

use App\Entity\ServiceSMS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ServiceSMS|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceSMS|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceSMS[]    findAll()
 * @method ServiceSMS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceSMSRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServiceSMS::class);
    }

    // /**
    //  * @return ServiceSMS[] Returns an array of ServiceSMS objects
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
    public function findOneBySomeField($value): ?ServiceSMS
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getThreads($user){
        return $this->createQueryBuilder('ss')
                    ->select('c.id, c.name, ss.message, ss.date, COUNT(case ss.is_read when 0 then 1 ELSE 0 END) AS unreads')
                    ->leftJoin('customer','c','WITH','c.id = ss.customer')
                    ->where('ss.user = :val')
                    ->setParameter('val', 65)
                    ->groupBy('ss.customer')
                    ->orderBy('ss.is_read', 'ASC')
                    ->orderBy('ss.date', 'DESC')
                    ->getQuery();
    }
}

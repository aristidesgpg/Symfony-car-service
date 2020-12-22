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
        $role              = $user->getRoles();
        $shareRepairOrders = $user->getShareRepairOrders();
        
        //check user role
        if($role[0] == "ROLE_ADMIN" || $role[0] == "ROLE_SERVICE_MANAGER"){
            return $this->createQueryBuilder('ss')
                        ->select('c.id, c.name, ss.message, ss.date, COUNT(case ss.is_read when 0 then 1 ELSE 0 END) AS unreads')
                        ->leftJoin('App\Entity\Customer','c','WITH','c.id = ss.customer')
                        ->groupBy('ss.user')
                        ->groupBy('ss.customer')
                        ->orderBy('ss.is_read', 'ASC')
                        ->orderBy('ss.date', 'DESC')
                        ->getQuery();
        }
        else if($role[0] == "ROLE_SERVICE_ADVISOR"){
            if($shareRepairOrders){
                $advisors = $this->createQueryBuilder('s')
                                 ->select('u.id')
                                 ->from('App\Entity\User','u')
                                 ->where('u.shareRepairOrders = 1')
                                 ->getQuery()
                                 ->getResult();

                return $this->createQueryBuilder('ss')
                            ->select('c.id, c.name, ss.message, ss.date, COUNT(case ss.is_read when 0 then 1 ELSE 0 END) AS unreads')
                            ->leftJoin('App\Entity\Customer','c','WITH','c.id = ss.customer')
                            ->where('ss.user IN(:advisors)')
                            ->setParameter('advisors', array_values($advisors))
                            ->groupBy('ss.customer')
                            ->orderBy('ss.is_read', 'ASC')
                            ->orderBy('ss.date', 'DESC')
                            ->getQuery();
            }
            else{
                return $this->createQueryBuilder('ss')
                            ->select('c.id, c.name, ss.message, ss.date, COUNT(case ss.is_read when 0 then 1 ELSE 0 END) AS unreads')
                            ->leftJoin('App\Entity\Customer','c','WITH','c.id = ss.customer')
                            ->where('ss.user = :val')
                            ->setParameter('val', $user->getId())
                            ->groupBy('ss.customer')
                            ->orderBy('ss.is_read', 'ASC')
                            ->orderBy('ss.date', 'DESC')
                            ->getQuery();
            }
        }

    }
}

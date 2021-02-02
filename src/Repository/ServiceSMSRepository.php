<?php

namespace App\Repository;

use App\Entity\ServiceSMS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method ServiceSMS|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceSMS|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceSMS[]    findAll()
 * @method ServiceSMS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceSMSRepository extends ServiceEntityRepository
{
    /** @var EntityManagerInterface */
    private $em;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $em)
    {
        parent::__construct($registry, ServiceSMS::class);
        $this->em = $em;
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
    public function getTrheadsByAdmin(){
        $threadQuery = "SELECT c.id, c.name,ss.date, ss.message, ss2.unread
                            FROM (select * from service_sms where date In (select max(date) from service_sms where is_read = 0 group by customer_id)) ss
                            LEFT JOIN customer c ON c.id = ss.customer_id
                            LEFT JOIN (select user_id, customer_id, SUM(CASE WHEN is_read = 0 THEN 1 ELSE 0 END) AS unread from service_sms group by customer_id) ss2 on (ss2.customer_id=ss.customer_id)
                            order by ss2.unread DESC, ss.date DESC";
         $statement   = $this->em->getConnection()->prepare($threadQuery);
         $statement->execute();
 
         $result      = $statement->fetchAll();

         return $result;
    }
    
    public function getThreadsByAdvisor($userId, $isShared)
    {
        $result      = array();

        //when there are repairOrders for the customer
        if($isShared){
            $threadQuery = "SELECT c.id, c.name,ss3.date,ss3.message, count(ss3.id) as unreads from (SELECT  * from (SELECT * from repair_order where primary_advisor_id = ".$userId." ) ss 
            LEFT JOIN (select id as s_id, primary_customer_id as s_customer_id from repair_order 
                where id in (select MAX(id) from repair_order group by primary_customer_id)) ss1 on (ss.primary_customer_id = ss1.s_customer_id) ) ss2
            LEFT JOIN (select * from service_sms where date In (select max(date) from service_sms where is_read = 0 group by customer_id))ss3  on (ss3.customer_id=ss2.primary_customer_id)
            LEFT JOIN customer c on c.id = ss2.primary_customer_id
            where ss3.date is not NULL and ss2.s_id in (select id from repair_order where id in (select MAX(id) from repair_order group by primary_customer_id) and primary_advisor_id in (select id from user where share_repair_orders=1))
            group by c.id";
        }else{
            $threadQuery = "SELECT c.id, c.name,ss3.date,ss3.message, count(ss3.id) as unreads from (SELECT  * from (SELECT * from repair_order where primary_advisor_id = ".$userId." ) ss 
                      LEFT JOIN (select id as s_id, primary_customer_id as s_customer_id, primary_advisor_id as s_advisor_id from repair_order 
                          where id in (select MAX(id) from repair_order group by primary_customer_id)) ss1 on (ss.primary_customer_id = ss1.s_customer_id) ) ss2
                      LEFT JOIN (select * from service_sms where date In (select max(date) from service_sms where is_read = 0 group by customer_id))ss3  on (ss3.customer_id=ss2.primary_customer_id)
                      LEFT JOIN customer c on c.id = ss2.primary_customer_id
                      where ss3.date is not NULL and ss2.s_advisor_id = ".$userId. " 
                      group by c.id";
        }
        
        $statement   = $this->em->getConnection()->prepare($threadQuery);
        $statement->execute();

        $result      = $statement->fetchAll();
        
        //get all customers which have unread messages
        $query       = "SELECT c.id as id, c.name as name FROM service_sms ss LEFT JOIN customer c on c.id = ss.customer_id where is_read=0  group by customer_id";
        $statement   = $this->em->getConnection()->prepare($query);
        $statement->execute();
        $customers   = $statement->fetchAll();
        
 
        foreach($customers as $customer){
            $customerId        = $customer['id'];
            $query             = "SELECT * FROM repair_order where primary_customer_id = $customerId";
            $statement         = $this->em->getConnection()->prepare($query);
            $statement->execute();
            
            //if there aren't any repairOrders
             if($statement->rowCount() ===0){
                
                $query1        = "SELECT user_id from service_sms ss where customer_id = $customerId and date in (SELECT MAX(date) FROM service_sms where incoming = 1 GROUP BY customer_id)";
                $statement     = $this->em->getConnection()->prepare($query1);
                $statement->execute();
 
                if($statement->fetch()['user_id'] == $userId){
                     $query2   = "SELECT count(ss.id) as unread, ss3.message as message, ss3.date as date from service_sms ss 
                                LEFT JOIN (select date,message,customer_id FROM service_sms ss WHERE date in (SELECT max(date) from service_sms ss2 
                                   WHERE is_read =0 group by customer_id)) ss3 on ss3.customer_id = ss.customer_id WHERE ss.customer_id = $customerId and ss.is_read =0";
                   
                   $statement  = $this->em->getConnection()->prepare($query2);
                    $statement->execute();
                    $recentSMS = $statement->fetch();
                    
                    if($recentSMS){
                        array_push($result, [
                            "id"      => $customerId,
                            "name"    => $customer['name'],
                            "date"    => $recentSMS['date'],
                            "message" => $recentSMS['message'],
                            "unreads" => $recentSMS['unread']
                        ] );
                    }
                }
            }
        }
 
        return $result;
    }
    
    
}

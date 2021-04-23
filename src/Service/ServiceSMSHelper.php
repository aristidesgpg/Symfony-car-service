<?php

namespace App\Service;

use App\Repository\ServiceSMSRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Security\Core\Security;

class ServiceSMSHelper
{
    private $em;
    private $security;
    private $serviceSMSRepo;

    public function __construct(EntityManagerInterface $em, Security $security, ServiceSMSRepository $serviceSMSRepo)
    {
        $this->em = $em;
        $this->security = $security;
        $this->serviceSMSRepo = $serviceSMSRepo;
    }

    public function getThreads(string $searchTerm)
    {
        if ($this->security->isGranted('ROLE_ADMIN') || $this->security->isGranted('ROLE_SERVICE_MANAGER')) {
            return $this->getThreadsByAdmin($searchTerm);
        } else {
            if ($this->security->isGranted('ROLE_SERVICE_ADVISOR')) {
                $user = $this->security->getUser();
                $userId = $user->getId();
                $shareRepairOrders = $user->getShareRepairOrders();

                if ($shareRepairOrders) {
                    return $this->getThreadsByAdvisor($userId, $searchTerm, true);
                } else {
                    return $this->getThreadsByAdvisor($userId, $searchTerm, false);
                }
            } else {
                throw new AccessDeniedHttpException('Permission Denied');
            }
        }
    }

    private function getThreadsByAdmin($searchTerm)
    {
        $searchQuery = '';

        if ($searchTerm) {
            $searchQuery = " where c.phone LIKE '%$searchTerm%' or c.name LIKE '%$searchTerm%' ";
        }

        $threadQuery = "SELECT c.id, c.name, c.phone, ss.date, ss.message, ss2.unread, ro.id as repairOrderID, ro.number as repairOrderNumber
                            FROM (select * from service_sms where date In (select max(date) from service_sms group by customer_id)) ss
                            LEFT JOIN customer c ON c.id = ss.customer_id
                            LEFT JOIN (select user_id, customer_id, SUM(CASE WHEN is_read = 0 THEN 1 ELSE 0 END) AS unread from service_sms group by customer_id) ss2 on (ss2.customer_id=ss.customer_id)
                            LEFT JOIN (select * from repair_order where date_created IN (select max(date_created) from repair_order ro2 group by primary_customer_id)) ro on ro.primary_customer_id = c.id 
                            $searchQuery order by unread =0 ASC , ss.date DESC";

        $statement = $this->em->getConnection()->prepare($threadQuery);
        $statement->execute();

        return $statement->fetchAllAssociative();
    }

    public function getThreadsByAdvisor($userId, $searchTerm = null, $isShared = null)
    {
        $searchQuery = '';

        if ($searchTerm) {
            $searchQuery = " and (c.phone LIKE '%$searchTerm%' or c.name LIKE '%$searchTerm%' )";
        }

        //when there are repairOrders for the customer
        if ($isShared) {
            $threadQuery = 'SELECT c.id, c.name, c.phone, ss3.date,ss3.message, ss4.unread, ss2.repairOrderID, ss2.repairOrderNumber from (SELECT  * from (SELECT * from repair_order where primary_advisor_id = '.$userId." group by primary_advisor_id ,primary_customer_id) ss 
                            LEFT JOIN (select id as repairOrderID, number as repairOrderNumber, primary_advisor_id as s_advisor_id, primary_customer_id as s_customer_id from repair_order 
                                where date_created in (select MAX(date_created) from repair_order group by primary_customer_id)) ss1 on (ss.primary_customer_id = ss1.s_customer_id) ) ss2
                            LEFT JOIN (select * from service_sms where date In (select max(date) from service_sms group by customer_id))ss3  on (ss3.customer_id=ss2.primary_customer_id)
                            LEFT JOIN customer c on c.id = ss2.primary_customer_id
                            LEFT JOIN (select SUM(CASE WHEN is_read = 0 THEN 1 ELSE 0 END) AS unread, customer_id from service_sms ss3 group by customer_id)ss4 on ss4.customer_id = ss2.primary_customer_id
                            where ss2.s_advisor_id in (select id from user where share_repair_orders=1) $searchQuery
                            ";
        } else {
            $threadQuery = 'SELECT c.id, c.name, c.phone, ss3.date,ss3.message, ss4.unread, ss2.repairOrderID, ss2.repairOrderNumber from (SELECT  * from (SELECT * from repair_order where primary_advisor_id = '.$userId.' group by primary_advisor_id ,primary_customer_id) ss 
                            LEFT JOIN (select id as repairOrderID, number as repairOrderNumber,primary_advisor_id as s_advisor_id, primary_customer_id as s_customer_id from repair_order 
                                where date_created in (select MAX(date_created) from repair_order group by primary_customer_id)) ss1 on (ss.primary_customer_id = ss1.s_customer_id) ) ss2
                            LEFT JOIN (select * from service_sms where date In (select max(date) from service_sms group by customer_id))ss3  on (ss3.customer_id=ss2.primary_customer_id)
                            LEFT JOIN customer c on c.id = ss2.primary_customer_id
                            LEFT JOIN (select SUM(CASE WHEN is_read = 0 THEN 1 ELSE 0 END) AS unread, customer_id from service_sms ss3 group by customer_id)ss4 on ss4.customer_id = ss2.primary_customer_id
                            where ss2.s_advisor_id = '.$userId.$searchQuery;
        }

        $statement = $this->em->getConnection()->prepare($threadQuery);
        $statement->execute();

        $result = $statement->fetchAllAssociative();

        //get all customers
        if ($searchTerm) {
            $searchQuery = " where (c.phone LIKE '%$searchTerm%' or c.name LIKE '%$searchTerm%' )";
        }

        $query = "SELECT c.id as id, c.name as name FROM service_sms ss LEFT JOIN customer c on c.id = ss.customer_id $searchQuery  group by customer_id";
        $statement = $this->em->getConnection()->prepare($query);
        $statement->execute();
        $customers = $statement->fetchAllAssociative();

        foreach ($customers as $customer) {
            $customerId = $customer['id'];
            $query = "SELECT * FROM repair_order where primary_customer_id = $customerId";
            $statement = $this->em->getConnection()->prepare($query);
            $statement->execute();

            //if there aren't any repairOrders
            if (0 === $statement->rowCount()) {
                $query1 = "SELECT user_id from service_sms ss where customer_id = $customerId and date in (SELECT MAX(date) FROM service_sms where incoming = 1 GROUP BY customer_id)";
                $statement = $this->em->getConnection()->prepare($query1);
                $statement->execute();

                if ($statement->fetchAssociative()['user_id'] == $userId) {
                    $query2 = "SELECT SUM(CASE WHEN is_read = 0 THEN 1 ELSE 0 END) AS unread, ss3.message as message, ss3.date as date from service_sms ss 
                                  LEFT JOIN (select date,message,customer_id FROM service_sms ss WHERE date in (SELECT max(date) from service_sms ss2 
                                  group by customer_id)) ss3 on ss3.customer_id = ss.customer_id WHERE ss.customer_id = $customerId";

                    $statement = $this->em->getConnection()->prepare($query2);
                    $statement->execute();
                    $recentSMS = $statement->fetchAssociative();

                    if ($recentSMS) {
                        array_push(
                            $result,
                            [
                                'id' => $customerId,
                                'name' => $customer['name'],
                                'date' => $recentSMS['date'],
                                'message' => $recentSMS['message'],
                                'unread' => $recentSMS['unread'],
                            ]
                        );
                    }
                }
            }
        }

        $result1 = array_filter(
            $result,
            function ($item) {
                if (0 != $item['unread']) {
                    return true;
                }
            }
        );
        $result2 = array_filter(
            $result,
            function ($item) {
                if (0 == $item['unread']) {
                    return true;
                }
            }
        );

        usort(
            $result1,
            function ($a, $b) {
                return $a['date'] < $b['date'] ? 1 : -1;
            }
        );
        usort(
            $result2,
            function ($a, $b) {
                return $a['date'] < $b['date'] ? 1 : -1;
            }
        );

        return array_merge($result1, $result2);
    }

    /**
     * @return int
     */
    public function getUnReadMessagesCount()
    {
        if ($this->security->isGranted('ROLE_ADMIN') || $this->security->isGranted('ROLE_SERVICE_MANAGER')) {
            $totalUnreadMessages = $this->serviceSMSRepo->createQueryBuilder('ss')
                                ->andWhere('ss.incoming = 1')
                                ->andWhere('ss.isRead = 0')
                                ->select('count(ss.id)')
                                ->getQuery()
                                ->getSingleScalarResult();
        } else {
            if ($this->security->isGranted('ROLE_SERVICE_ADVISOR')) {
                $user = $this->security->getUser();
                $userId = $user->getId();
                $shareRepairOrders = $user->getShareRepairOrders();

                if ($shareRepairOrders) {
                    $unreadQuery = 'select count(u.id) as count from `user` u LEFT JOIN service_sms ss on ss.user_id = u.id where u.share_repair_orders  = 1  and ss.is_read = 0 and ss.incoming  = 1';
                } else {
                    $unreadQuery = 'select count(ss.id) as count from `user` u left join repair_order ro on ro.primary_advisor_id = u.id left join service_sms ss on ss.customer_id = ro.primary_customer_id where u.id = '.$userId.' and ss.incoming = 1 and ss.is_read = 0;';
                }
                $statement = $this->em->getConnection()->prepare($unreadQuery);
                $statement->execute();

                $result = $statement->fetchAssociative();
                $totalUnreadMessages = $result['count'];
            } else {
                $totalUnreadMessages = 0;
            }
        }

        return $totalUnreadMessages;
    }

    /**
     * @return int
     */
    public function getUnReadMessagesByAdvisor($serviceAdvisorId)
    {
        /* totalUnreadMessages */
        return $this->serviceSMSRepo->createQueryBuilder('ss')
                            ->where('ss.user = :userId')
                            ->setParameter('userId', $serviceAdvisorId)
                            ->andWhere('ss.incoming = 1')
                            ->andWhere('ss.isRead = 0')
                            ->select('count(ss.id)')
                            ->getQuery()
                            ->getSingleScalarResult();
    }

    /**
     * @return int
     */
    public function getOutBoundMessagesByAdvisor($serviceAdvisorId)
    {
        /* totalOutboundMessages */
        return $this->serviceSMSRepo->createQueryBuilder('ss')
                            ->where('ss.user = :userId')
                            ->setParameter('userId', $serviceAdvisorId)
                            ->andWhere('ss.incoming = 0')
                            ->select('count(ss.id)')
                            ->getQuery()
                            ->getSingleScalarResult();
    }

    /**
     * @return int
     */
    public function getInBoundMessagesByAdvisor($serviceAdvisorId, $customerId, $created, $closed)
    {
        /* totalInboundMessages */
        return $this->serviceSMSRepo->createQueryBuilder('ss')
                            ->where('ss.user = :userId')
                            ->setParameter('userId', $serviceAdvisorId)
                            ->andWhere('ss.customer = :customerId')
                            ->setParameter('customerId', $customerId)
                            ->andWhere('ss.date BETWEEN :start AND :end')
                            ->setParameter('start', $created->format('Y-m-d H:i'))
                            ->setParameter('end', $closed->format('Y-m-d H:i'))
                            ->andWhere('ss.incoming = 1')
                            ->select('count(ss.id)')
                            ->getQuery()
                            ->getSingleScalarResult();
    }
}

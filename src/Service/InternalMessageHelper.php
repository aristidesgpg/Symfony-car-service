<?php
namespace App\Service;

use App\Entity\InternalMessage;
use App\Entity\User;
use Doctrine\DBAL\Driver\Exception as DoctrineException;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\Security\Core\Security;

/**
 * Class InternalMessageHelper
 * 
 * @package App\Service
 */
class InternalMessageHelper {
    /** @var User */
    private $user;

    /** @var EntityManagerInterface */
    private $em;

    /**
     * InternalMessageHelper constructor.
     *
     * @param Security                  $security
     * @param EntityManagerInterface    $em
     */
    public function __construct(Security $security, EntityManagerInterface $em)
    {
        $this->user = $security->getUser();
        $this->em   = $em;
    }

    /**
     * @return integer
     */
    public function getUnReadMessagesCount(){
        $internalMessageRepository  = $this->em->getRepository(InternalMessage::class);
        $userId                     = $this->user->getId();
        
        $totalUnreadMessages = $internalMessageRepository->createQueryBuilder('im')
            ->where('im.to = :userId')
            ->orWhere('im.from = :userId')
            ->setParameter('userId', $userId)
            ->andWhere('im.isRead = 0')
            ->select('count(im.id)')
            ->getQuery()
            ->getSingleScalarResult();
        
        return $totalUnreadMessages;
    }

    /**
     * @param integer $userId
     * 
     * @return array
     */
    public function getThreads ($userId) {
        $sql = "
            SELECT  u.*, i.id AS im_id, i.from_id, i.to_id, i.message, i.date, i.is_read, im.unreads
            FROM internal_message i
            INNER JOIN 
            (
                SELECT MAX(date) MaxDate,  COUNT(CASE WHEN is_read = 0 THEN 1 END) AS unreads
                FROM 
                (
                    SELECT date, to_id, from_id, is_read
                    FROM  
                    internal_message
                    WHERE from_id = {$userId} OR to_id = {$userId}
                ) jj
                GROUP BY case when jj.to_id = {$userId} then jj.from_id when jj.from_id = {$userId} then jj.to_id END
            ) im
            ON i.date = im.MaxDate
            Left JOIN user u
            ON u.id = case when i.to_id = {$userId} then i.from_id when i.from_id = {$userId} then i.to_id END
            ORDER BY i.is_read ASC, i.date DESC
        ";

        try {
            $query = $this->em->getConnection()->prepare($sql);
        } catch (Exception $e) {
            return false;
        }

        try {
            $query->execute();
            $result = $query->fetchAllAssociative();
        } catch (DoctrineException $e) {
            return false;
        }

        $threads = $this->getThreadsFromArray($result);

        return $threads;
    }
    
    /**
     * @param array $threads
     *
     * @return array
     */
    public function getThreadsFromArray ($threads) {
        $return = [];
        foreach ($threads as &$thread) {
            $return[] = [
                "user"    => [
                    "id"                => (int)$thread["id"],
                    "firstName"         => $thread["first_name"],
                    "lastName"          => $thread["last_name"],
                    "email"             => $thread["email"],
                    "phone"             => $thread["phone"],
                    "role"              => $thread["role"],
                    "certification"     => $thread["certification"],
                    "experience"        => $thread["experience"],
                    "securityQuestion"  => $thread["security_question"],
                    "lastLogin"         => $thread["last_login"],
                    "active"            => ($thread["active"] === "1"),
                    "processRefund"     => ($thread["process_refund"] === "1"),
                    "shareRepairOrders" => ($thread["share_repair_orders"] === "1")
                ],
                "message" => [
                    "id"      => $thread["im_id"],
                    "fromId"  => $thread["from_id"],
                    "toId"    => $thread["to_id"],
                    "message" => $thread["message"],
                    "date"    => $thread["date"],
                    "isRead"  => ($thread["is_read"] === "1")
                ],
                "unreads" => $thread["unreads"]
            ];
        }

        return $return;
    }
}
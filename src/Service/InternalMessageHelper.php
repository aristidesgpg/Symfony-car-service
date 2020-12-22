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
            SELECT u.*, i.*, COUNT(case i.is_read when 0 then 1 ELSE 0 END) AS unreads FROM internal_message i 
            LEFT JOIN user u
            ON u.id = case when i.to_id = {$userId} then i.from_id when i.from_id = {$userId} then i.to_id END
            WHERE i.from_id = {$userId} OR i.to_id = {$userId} 
            GROUP BY case when i.to_id = {$userId} then i.from_id when i.from_id = {$userId} then i.to_id END
            ORDER BY i.is_read ASC, i.date DESC;
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
                    "id"            => $thread["id"],
                    "firstName"     => $thread["first_name"],
                    "lastName"      => $thread["last_name"],
                    "email"         => $thread["email"],
                    "phone"         => $thread["phone"],
                    "role"          => $thread["role"],
                    "certification" => $thread["certification"],
                    "experience"    => $thread["experience"],
                    "lastLogin"     => $thread["last_login"],
                    "active"        => $thread["active"],
                    "pin"           => $thread["pin"]
                ],
                "message" => [
                    "fromId"  => $thread["from_id"],
                    "toId"    => $thread["to_id"],
                    "message" => $thread["message"],
                    "date"    => $thread["date"],
                    "isRead"  => $thread["is_read"]
                ],
                "unreads" => $thread["unreads"]
            ];
        }

        return $return;
    }
}
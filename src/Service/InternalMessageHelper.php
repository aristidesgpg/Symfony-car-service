<?php
namespace App\Service;

use App\Entity\InternalMessage;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
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
            ->setParameter('userId', $userId)
            ->andWhere('im.isRead = 0')
            ->select('count(im.id)')
            ->getQuery()
            ->getResult();
        
        return $totalUnreadMessages;
    }
}
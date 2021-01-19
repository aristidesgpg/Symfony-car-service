<?php

namespace App\Service;

use App\Entity\FollowUp;
use App\Entity\FollowUpInteraction;
use App\Entity\User;
use App\Entity\Customer;
use App\Entity\RepairOrder;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use InvalidArgumentException;
use RuntimeException;

/**
 * Class CheckInHelper
 *
 * @package App\Service
 */
class CheckInHelper {

    /** @var EntityManagerInterface */
    private $em;

    /**
     * CheckInHelper constructor.
     *
     * @param EntityManagerInterface $em
     */
    public function __construct (EntityManagerInterface $em) {
        $this->em     = $em;
    }

    /**
     * @param RepairOrder $repairOrder
     */
    public function new (RepairOrder $repairOrder): void {
       $followup = new FollowUp();
       $followup->setRepairOrder($repairOrder)
                ->setDateCreated( new \DateTime )
                ->setStatus('Sent');

       $this->em->persist($followup);
       $this->em->flush();

       $this->sendMessage();

    }
    
    /**
     * @param FollowUp $followup
     * @param User/Customer     $user
     * @param string $status
     * 
     */
    public function createFollowUpInteraction (FollowUp $followup, $user, string $status): void {
       $followupInteraction = new FollowUpInteraction();

       $followupInteraction->setFollowUp($followup)
                           ->setStatus($status);
        if($status === 'Sent'){
            $followupInteraction->setUser($user);
        }
        else {
            $followupInteraction->setCustomer($user);
        }

        $this->em->persist($followup);
        $this->em->flush();
 
    }
    
    /**
     * @param array $params
     */
    public function sendMessage (): void {
       
    }


}

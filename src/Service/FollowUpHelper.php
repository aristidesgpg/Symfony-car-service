<?php

namespace App\Service;

use App\Entity\FollowUp;
use App\Entity\User;
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

       $em->persist($followup);
       $em->flush();

       $this->sendMessage();

    }
    
    /**
     * @param array $params
     */
    public function createFollowUpInteraction (): void {
       
    }
    
    /**
     * @param array $params
     */
    public function sendMessage (): void {
       
    }


}

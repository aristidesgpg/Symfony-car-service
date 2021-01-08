<?php

namespace App\Service;

use App\Entity\RepairOrderReview;
use App\Repository\RepairOrderReviewRepository;
use App\Repository\RepairOrderReviewInteractionsRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class MyReviewHelper
 *
 * @package App\Service
 */
class MyReviewHelper {

    /** @var EntityManagerInterface */
    private $em;

    /** @var RepairOrderReviewRepository */
    private $review;
    
    /** @var RepairOrderReviewInteractionsRepository */
    private $reviewInteractions;
    
    /** @var TwilioHelper */
    private $twilioHelper;

    /** @var SettingsHelper */
    private $settingsHelper;


    /**
     * MyReviewHelper constructor.
     *
     * @param EntityManagerInterface $em
     * @param RepairOrderReviewRepository $review
     */
    public function __construct (EntityManagerInterface $em, RepairOrderReviewRepository $review, TwilioHelper $twilio, SettingsHelper $settings) {
        $this->em             = $em;
        $this->review         = $review;
        $this->twilioHelper   = $twilio;
        $this->settingsHelper   = $settings;
    }

    /**
     * @param RepairOrder $repairOrder
     */
    public function new(RepairOrder $repairOrder){
        $review->new($repairOrder, $this->$em);
        $reviewInteractions->new($review, 'Sent', $this->$em);

        $number = $repairOrder->getPrimaryCustomer()->number;
        $this->sendMessage($number);
    }

    public function sendMessage(string $number){
        $msg = $this->settingsHelper->getSetting('reviewText');
        
        $this->twilioHelper->sendSms($number, $msg);
    }
}

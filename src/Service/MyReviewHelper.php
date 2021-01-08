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
    
    /** @var ShortUrlHelper */
    private $urlHelper;

    /** @var SettingsHelper */
    private $settingsHelper;


    /**
     * MyReviewHelper constructor.
     *
     * @param EntityManagerInterface $em
     * @param RepairOrderReviewRepository $review
     */
    public function __construct (EntityManagerInterface $em, RepairOrderReviewRepository $review, ShortUrlHelper $urlHelper, SettingsHelper $settings) {
        $this->em             = $em;
        $this->review         = $review;
        $this->urlHelper      = $urlHelper;
        $this->settingsHelper = $settings;
    }

    /**
     * @param RepairOrder $repairOrder
     */
    public function new(RepairOrder $repairOrder){
        $review->new($repairOrder, $this->$em);
        $reviewInteractions->new($review, 'Sent', $this->$em);

        $this->sendMessage($repairOrder);
    }

    /**
     * @param RepairOrder $repairOrder
     */
    public function sendMessage(RepairOrder $repairOrder){
        $msg = $this->settingsHelper->getSetting('reviewText');
        $phone = $repairOrder->getNumber();
        $linkhash = $repairOrder->getLinkHash();
        
        $url = rtrim($_SERVER['CUSTOMER_URL'], '/') . '/' . $linkhash;
        
        $shortUrl = $this->urlHelper->generateShortUrl($url);
        try {
            $this->urlHelper->sendShortenedLink($phone, $msg, $shortUrl, true);
        } catch (\Exception $e) {
            return;
        }
    }
}

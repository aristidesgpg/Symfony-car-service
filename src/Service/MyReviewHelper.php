<?php

namespace App\Service;

use App\Entity\RepairOrder;
use App\Entity\RepairOrderReview;
use App\Repository\RepairOrderReviewRepository;
use App\Repository\RepairOrderReviewInteractionsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * Class MyReviewHelper
 *
 * @package App\Service
 */
class MyReviewHelper {

    /** @var EntityManagerInterface */
    private $em;

    /** @var ParameterBagInterface */
    private $params;

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
     * @param RepairOrderReviewInteractionsRepository $reviewInteractions
     * @param ShortUrlHelper $urlHelper
     * @param SettingsHelper $settings
     * @param ParameterBagInterface $params
     */
    public function __construct (EntityManagerInterface $em, RepairOrderReviewRepository $review, ShortUrlHelper $urlHelper, 
                                RepairOrderReviewInteractionsRepository $reviewInteractions, SettingsHelper $settings, ParameterBagInterface $params) {
        $this->em                 = $em;
        $this->review             = $review;
        $this->reviewInteractions = $reviewInteractions;
        $this->urlHelper          = $urlHelper;
        $this->settingsHelper     = $settings;
        $this->params             = $params;
    }

    public function new(RepairOrder $repairOrder, $user){
        $review = $this->review->new($repairOrder);
        $this->reviewInteractions->new($review, 'Sent', $user);

        $this->sendMessage($repairOrder);
    }

    /**
     * @param RepairOrder $repairOrder
     */
    public function sendMessage(RepairOrder $repairOrder){
        $msg      = $this->settingsHelper->getSetting('myReviewText');
        $phone    = $repairOrder->getPrimaryCustomer()->getPhone();
        $linkhash = $repairOrder->getLinkHash();
        
        $url      = rtrim($this->params->get('customer_url'), '/') . '/' . $linkhash;
        $shortUrl = $this->urlHelper->generateShortUrl($url);
        try {
            $this->urlHelper->sendShortenedLink($phone, $msg, $shortUrl, true);
        } catch (\Exception $e) {
            return;
        }
    }
}

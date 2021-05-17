<?php

namespace App\Service;

use App\Entity\RepairOrder;
use App\Repository\RepairOrderReviewInteractionsRepository;
use App\Repository\RepairOrderReviewRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class MyReviewHelper
{
    private $review;
    private $reviewInteractions;
    private $urlHelper;
    private $settingsHelper;
    private $twilioHelper;

    public function __construct(
        RepairOrderReviewRepository $review,
        ShortUrlHelper $urlHelper,
        RepairOrderReviewInteractionsRepository $reviewInteractions,
        SettingsHelper $settings,
        TwilioHelper $twilioHelper
    ) {
        $this->review = $review;
        $this->reviewInteractions = $reviewInteractions;
        $this->urlHelper = $urlHelper;
        $this->settingsHelper = $settings;
        $this->twilioHelper = $twilioHelper;
    }

    public function new(RepairOrder $repairOrder, $user)
    {
        $review = $this->review->new($repairOrder);
        $this->reviewInteractions->new($review, 'Sent', $user);

        $this->sendMessage($repairOrder);
    }

    public function sendMessage(RepairOrder $repairOrder)
    {
        $myReviewText = $this->settingsHelper->getSetting('myReviewText');
        $linkHash = $repairOrder->getLinkHash();
        $url = $this->settingsHelper->getSetting('customerURL') . $linkHash;
        $shortUrl = $this->urlHelper->generateShortUrl($url);
        $message = $myReviewText . ' ' . $shortUrl;

        try {
            $this->twilioHelper->sendSms($repairOrder->getPrimaryCustomer(), $message);
        } catch (Exception $e) {
            return;
        }
    }
}

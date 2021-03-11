<?php

namespace App\Service;

use App\Entity\FollowUp;
use App\Entity\FollowUpInteraction;
use App\Entity\RepairOrder;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Security\Core\Security;

/**
 * Class FollowUpHelper.
 */
class FollowUpHelper
{
    /** @var EntityManagerInterface */
    private $em;

    /** @var User */
    private $user;

    /** @var SettingsHelper */
    private $settingsHelper;

    /**
     * FollowUpHelper constructor.
     */
    public function __construct(EntityManagerInterface $em,  ShortUrlHelper $urlHelper, Security $security,
                                 SettingsHelper $settings, ParameterBagInterface $params, SettingsHelper $settingsHelper)
    {
        $this->em = $em;
        $this->urlHelper = $urlHelper;
        $this->settingsHelper = $settings;
        $this->params = $params;
        $this->user = $security->getUser();
        $this->settingsHelper = $settingsHelper;
    }

    public function new(RepairOrder $repairOrder): void
    {
        $followUp = new FollowUp();

        $followUp->setRepairOrder($repairOrder)
                ->setDateCreated(new \DateTime())
                ->setStatus('Created');

        $this->em->persist($followUp);
        $this->em->flush();

        $this->sendMessage($followUp);
    }

    private function createFollowupInteraction(FollowUp $followUp, $user, string $status)
    {
        $followUpInteraction = new FollowUpInteraction();

        $followUpInteraction->setFollowUp($followUp)
                            ->setType($status)
                            ->setDate(new \DateTime());

        if ('Sent' === $status) {
            $followUpInteraction->setUser($user);
        } else {
            $followUpInteraction->setCustomer($user);
        }

        $this->em->persist($followUpInteraction);
        $this->em->flush();
    }

    /**
     * @param User/Customer $user
     */
    public function updateFollowUp(FollowUp $followUp, $user, string $status): void
    {
        $this->createFollowupInteraction($followUp, $user, $status);

        switch ($status) {
            case 'Viewed':
                $currStatus = $followUp->getStatus();
                if ('Converted' !== $currStatus) {
                    if ('Viewed' === $currStatus) {
                        $followUp->setStatus('Sent');

                        // If the Follow Up 'date_sent' is null, set it to today's date
                        if (!$followUp->getDateSent()) {
                            $followUp->setDateSent(new \DateTime());
                        }

                        // create a FollowUpIneraction of 'sent' with the user_id of the primaryAdvisor for the repair order
                        $repairOrder = $followUp->getRepairOrder();
                        $newUser = $repairOrder->getPrimaryAdvisor();
                        $this->createFollowupInteraction($followUp, $newUser, 'Sent');

                        // if the customer's phone number 'phone_validated' is false, set it to true
                        $customer = $repairOrder->getPrimaryCustomer();
                        if (!$customer->getMobileConfirmed()) {
                            $customer->setMobileConfirmed(true);

                            $this->em->persist($customer);
                            $this->em->flush();
                        }
                    } else {
                        $followUp->setStatus('Viewed')
                                 ->setDateViewed(new \DateTime());
                    }
                }
                break;
            case 'Converted':
                $followUp->setStatus('Converted')
                         ->setDateConverted(new \DateTime());

                break;
            case 'Sent':
                $followUp->setStatus('Sent')
                         ->setDateSent(new \DateTime());

                break;
            case 'Not Delivered':
                $followUp->setStatus('Not Delivered');

                break;
        }

        $this->em->persist($followUp);
        $this->em->flush();
    }

    public function sendMessage(FollowUp $followUp)
    {
        $repairOrder = $followUp->getRepairOrder();
        $phone = $repairOrder->getPrimaryCustomer()->getPhone();
        $linkhash = $repairOrder->getLinkHash();
        $followUpTextMessage = $this->settingsHelper->getSetting('followUpTextMessage');
        $followUpScheduleURL = $this->settingsHelper->getSetting('followUpScheduleURL');

        $url = rtrim($this->params->get('customer_url'), '/').'/'.$linkhash.'/followUp';
        $shortUrl = $this->urlHelper->generateShortUrl($url);
        try {
            // $this->urlHelper->sendShortenedLink($phone, "Please check your declined work", $shortUrl, true);
            $this->urlHelper->sendShortenedLink($phone, $followUpTextMessage, $shortUrl, true);

            $this->updateFollowUp($followUp, $repairOrder->getPrimaryAdvisor(), 'Sent');
        } catch (\Exception $e) {
            $this->updateFollowUp($followUp, $this->user, 'Not Delivered');

            return;
        }
    }
}

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
 * Class FollowUpHelper
 *
 * @package App\Service
 */
class FollowUpHelper {

    /** @var EntityManagerInterface */
    private $em;

    /**
     * FollowUpHelper constructor.
     *
     * @param EntityManagerInterface $em
     * @param ShortUrlHelper         $urlHelper
     * @param SettingsHelper         $settings
     * @param ParameterBagInterface  $params
     */
    public function __construct (EntityManagerInterface $em,  ShortUrlHelper $urlHelper, 
                                 SettingsHelper $settings, ParameterBagInterface $params) {
        $this->em     = $em;
        $this->urlHelper          = $urlHelper;
        $this->settingsHelper     = $settings;
        $this->params             = $params;
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

    //    $this->sendMessage();

    }
    
    private function createFollowupInteraction(FollowUp $followup, $user, string $status){
        $followupInteraction = new FollowUpInteraction();

        $followupInteraction->setFollowUp($followup)
                            ->setType($status)
                            ->setDate(new \DateTime());
        
        if($status === 'Sent'){
            $followupInteraction->setUser($user);
        }
        else {
            $followupInteraction->setCustomer($user);
        }

        $this->em->persist($followupInteraction);
        $this->em->flush();
    }

    /**
     * @param FollowUp $followup
     * @param User/Customer     $user
     * @param string $status
     * 
     */
    public function updateFollowUp (FollowUp $followup, $user, string $status): void {
        $this->createFollowupInteraction( $followup, $user, $status);

        switch ($status){
            case 'Viewed':
                $currStatus = $followup->getStatus();
                if($currStatus !== 'Converted')
                {
                    if($currStatus === 'Viewed'){
                        $followup->setStatus('Sent');    

                        // If the Follow Up 'date_sent' is null, set it to today's date
                        if(!$followup->getDateSent()){
                            $followup->setDateSent(new \DateTime());
                        }

                        // create a FollowUpIneraction of 'sent' with the user_id of the primaryAdvisor for the repair order
                        $repairOrder = $followup->getRepairOrder();
                        $newUser     = $repairOrder->getPrimaryAdvisor();
                        $this->createFollowupInteraction( $followup, $newUser, 'Sent');

                        // if the customer's phone number 'phone_validated' is false, set it to true
                        $customer    = $repairOrder->getPrimaryCustomer();
                        if(!$customer->getMobileConfirmed()){
                            $customer->setMobileConfirmed(true);

                            $this->em->persist($customer);
                            $this->em->flush();
                        }
                    }
                    else{
                        $followup->setStatus('Viewed');    
                        $followup->setDateViewed(new \DateTime());
                    }

                }
                break;
            case 'Converted':
                $followup->setStatus('Converted');
                $followup->setDateConverted(new \DateTime());
               
                break;
            case 'Sent':
                $followup->setStatus('Sent');
                $followup->setDateSent(new \DateTime());
               
                break;
        }

        $this->em->persist($followup);
        $this->em->flush();    
       
    }

    
    /**
     * @param FollowUp $followUp
     */
    public function sendMessage(FollowUp $followUp){
        $repairOrder  = $followUp->getRepairOrder();
        $msg      = $this->settingsHelper->getSetting('reviewText');
        $phone    = $repairOrder->getPrimaryCustomer()->getPhone();
        $linkhash = $repairOrder->getLinkHash();
        
        $url      = rtrim($this->params->get('customer_url'), '/') . '/' . $linkhash;
        $shortUrl = $this->urlHelper->generateShortUrl($url);
        try {
            $this->urlHelper->sendShortenedLink($phone, $msg, $shortUrl, true);

            $this->updateFollowUp($followUp, $repairOrder->getPrimaryAdvisor(), 'Sent')
            
        } catch (\Exception $e) {
            return;
        }
    }

}

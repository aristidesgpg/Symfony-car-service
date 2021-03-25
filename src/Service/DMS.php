<?php

namespace App\Service;

use App\Entity\Customer;
use App\Entity\RepairOrder;
use App\Repository\UserRepository;
use App\Repository\CustomerRepository;
use App\Repository\RepairOrderRepository;
use App\Service\CustomerHelper;
use App\Service\TwilioHelper;
use App\Service\ShortUrlHelper;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * Class DMS
 *
 * @package App\Service
 */
class DMS {

    /**
     * @var bool|DealerTrack|AutoMate|DealerBuilt|CDK
     */
    private $integration = false;

    /**
     * @var boolean
     */
    private $activateIntegrationSms;

    /**
     * @var TwilioHelper
     */
    private $twilioHelper;

    /**
     * @var CustomerHelper
     */
    private $customerHelper;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var CustomerRepository
     */
    private $customerRepo;

    /**
     * @var RepairOrderRepository
     */
    private $repairOrderRepo;

    /**
     * @var UserRepository
     */
    private $userRepo;

    /**
     * @var string|null
     */
    private $dmsFilter;

    /**
     * @var string
     */
    private $customerURL;

    /**
     * @var URLShortener
     */
    private $shortURLHelper;

    /**
     * @var SettingsHelper
     */
    private $settingsHelper;

    /**
     * @var RepairOrderHelper
     */
    private $repairOrderHelper;

    /**
     * @var bool
     */
    public $usingAutomate;

    /**
     * @var bool
     */
    public $usingDealerBuilt;

    /**
     * @var bool
     */
    public $usingDealerTrack;

    /**
     * @var bool
     */
    public $usingCdk;
    /**
     * @var ParameterBagInterface
     */
    private $parameterBag;

    /**
     * DMS constructor.
     *
     * @param AutoMate               $automate
     * @param CDK                    $cdk
     * @param DealerTrack            $dealerTrack
     * @param DealerBuilt            $dealerBuilt
     * @param TwilioHelper           $twilioHelper
     * @param CustomerHelper         $customerHelper
     * @param EntityManagerInterface $em
     * @param ShortUrlHelper         $shortUrlHelper
     * @param CustomerRepository     $customerRepo
     * @param RepairOrderRepository  $repairOrderRepo
     * @param UserRepository         $userRepo
     * @param SettingsHelper         $settingsHelper
     * @param RepairOrderHelper      $repairOrderHelper
     * @param ParameterBagInterface  $parameterBag
     *
     * @throws Exception
     */
    public function __construct (AutoMate $automate, CDK $cdk, DealerTrack $dealerTrack, DealerBuilt $dealerBuilt,
                                 TwilioHelper $twilioHelper, CustomerHelper $customerHelper, EntityManagerInterface $em,
                                 ShortUrlHelper $shortUrlHelper, CustomerRepository $customerRepo,
                                 RepairOrderRepository $repairOrderRepo, UserRepository $userRepo,
                                 SettingsHelper $settingsHelper, RepairOrderHelper $repairOrderHelper,
                                 ParameterBagInterface $parameterBag) {
        $this->twilioHelper           = $twilioHelper;
        $this->customerHelper         = $customerHelper;
        $this->em                     = $em;
        $this->customerRepo           = $customerRepo;
        $this->repairOrderRepo        = $repairOrderRepo;
        $this->userRepo               = $userRepo;
        $this->shortURLHelper         = $shortUrlHelper;
        $this->settingsHelper         = $settingsHelper;
        $this->repairOrderHelper      = $repairOrderHelper;
        $this->parameterBag           = $parameterBag;
        $this->customerURL            = $parameterBag->get('customer_url');
        $this->dmsFilter              = $this->settingsHelper->getSetting('dmsFilter');
        $this->usingAutomate          = $this->settingsHelper->getSetting('usingAutomate') === 'true';
        $this->usingDealerTrack       = $this->settingsHelper->getSetting('usingDealerTrack') === 'true';
        $this->usingDealerBuilt       = $this->settingsHelper->getSetting('usingDealerBuilt') === 'true';
        $this->usingCdk               = $this->settingsHelper->getSetting('usingCdk') === 'true';
        $this->activateIntegrationSms = true;

        if ($this->usingAutomate) {
            $this->integration = $automate;
            return;
        }

        if ($this->usingDealerTrack) {
            $this->integration = $dealerTrack;
            return;
        }

        if ($this->usingDealerBuilt) {
            $this->integration = $dealerBuilt;
            return;
        }

        if ($this->usingCdk) {
            $this->integration = $cdk;
            return;
        }
    }

    /**
     * @return void
     * @throws Exception
     */
    public function addOpenRepairOrders () {
        // Not integrated, do nothing
        if (!$this->integration) {
            return;
        }

        $defaultTechnician   = $this->userRepo->findOneBy(['active' => 1, 'role' => 'ROLE_TECHNICIAN'], ['id' => 'ASC']);
        $defaultAdvisor      = $this->userRepo->findOneBy(['active' => 1, 'role' => 'ROLE_PARTS_ADVISOR'], ['id' => 'ASC']);
        $dmsOpenRepairOrders = $this->integration->getOpenRepairOrders();

        // Loop over found repair orders
        foreach ($dmsOpenRepairOrders as $dmsOpenRepairOrder) {
            // First check if it exists already
            $repairOrderExists = $this->repairOrderRepo->findOneBy(['number' => $dmsOpenRepairOrder->number]);
            if ($repairOrderExists) {
                continue;
            }

            $customer         = null;
            $advisor          = null;
            $phoneNumbers     = $dmsOpenRepairOrder->customer->phoneNumbers;
            $name             = $dmsOpenRepairOrder->customer->name;
            $email            = $dmsOpenRepairOrder->customer->email;
            $dmsAdvisorId     = $dmsOpenRepairOrder->advisor->id;
            $advisorFirstName = $dmsOpenRepairOrder->advisor->firstName;
            $advisorLastName  = $dmsOpenRepairOrder->advisor->lastName;
            $roKey            = isset($dmsOpenRepairOrder->roKey) ? $dmsOpenRepairOrder->roKey : null;

            // No phone numbers passed, create new customer.
            if (!$phoneNumbers) {
                $customer = new Customer();
                $this->customerHelper->commitCustomer($customer, ['name' => $name, 'email' => $email]);
            }

            // Check if the customer exists already
            if (!$customer) {
                foreach ($phoneNumbers as $phoneNumber) {
                    // Try to find the customer
                    // Check if the customer exists and use that one instead if so
                    $customer = $this->customerRepo->findOneBy(['phone' => $phoneNumber]);
                }
            }

            // Still no customer, create a new one but only use a valid phone number
            if (!$customer) {
                foreach ($phoneNumbers as $phoneNumber) {
                    // Try to validate the phone number
                    try {
                        // Phone is valid, use this one
                        $phoneValid = true;

                        // We want to skip validating the customer phone if production
                        if ($this->parameterBag->get('app_env') == 'prod') {
                            $phoneValid = $this->twilioHelper->lookupNumber($phoneNumber);
                        }

                        if ($phoneValid) {
                            $customer = new Customer();
                            $newCustomer = $this->customerHelper->commitCustomer($customer, ['phone' => $phoneNumber, 'name' => $name, 'email' => $email]);

                            dump($newCustomer);exit;
                        }
                        break;
                    } catch (Exception $e) {
                        // Nothing for now
                        continue;
                    }
                }
            }

            // STILL no customer, just used the first number we got
            if (!$customer && isset($phoneNumbers[0])) {
                $phoneNumber = $phoneNumbers[0];
                $customer    = new Customer();
                $this->customerHelper->commitCustomer($customer, ['phone' => $phoneNumber, 'name' => $name, 'email' => $email]);
            }

            // If there isn't a customer at this state, just skip the RO, something seriously weird happened
            if (!$customer || !$customer->getId()) {
                continue;
            }

            if ($dmsAdvisorId) {
                $foundAdvisor = $this->userRepo->findOneBy(['id' => $dmsAdvisorId, 'role' => 'ROLE_SERVICE_ADVISOR']);
                if ($foundAdvisor) {
                    $advisor = $foundAdvisor;
                }
            }

            if (!$advisor) {
                $foundAdvisor = $this->userRepo->findOneBy([
                    'firstName' => $advisorFirstName,
                    'lastName'  => $advisorLastName,
                    'active'    => 1,
                    'role'      => 'ROLE_SERVICE_ADVISOR'
                ]);
                if ($foundAdvisor) {
                    $advisor = $foundAdvisor;
                }
            }

            // Try to find the advisor based on first/last name
            if (!$advisor) {
                $advisor = $defaultAdvisor;
            }

            // If there is a filter, check against it and move along if it matched
            $filter = $this->dmsFilter;
            if ($filter != 'false' && $filter != false) {
                if (strncmp($dmsOpenRepairOrder->number, $filter, strlen($filter)) === 0) {
                    continue;
                }
            }

            // Must be opened in the past 5 days
            $date          = $dmsOpenRepairOrder->date;
            $openTimestamp = $date->getTimestamp();
            $fiveDaysAgo   = (new DateTime())->modify('-5 days')->getTimestamp();

            if ($fiveDaysAgo > $openTimestamp) {
                continue;
            }

            $repairOrder = new RepairOrder();
            $repairOrder->setPrimaryCustomer($customer)
                        ->setPrimaryTechnician($defaultTechnician)
                        ->setPrimaryAdvisor($advisor)
                        ->setNumber($dmsOpenRepairOrder->number)
                        ->setDmsKey($roKey)
                        ->setStartValue(0)
                        ->setDateCreated($dmsOpenRepairOrder->date)
                        ->setWaiter($dmsOpenRepairOrder->waiter)
                        ->setPickupDate($dmsOpenRepairOrder->pickupDate)
                        ->setYear($dmsOpenRepairOrder->year)
                        ->setMake($dmsOpenRepairOrder->make)
                        ->setModel($dmsOpenRepairOrder->model)
                        ->setMiles($dmsOpenRepairOrder->miles)
                        ->setVin($dmsOpenRepairOrder->vin)
                        ->setUpgradeQue(0)
                        ->setInternal(0)
                        ->setLinkHash($this->repairOrderHelper->generateLinkHash($dmsOpenRepairOrder->date->format('c')));

            // If the customer name has "INVENTORY" in it, skip as an internal
            if (strpos($name, 'INVENTORY') !== false) {
                $repairOrder->setInternal(1);
            }

            $this->em->persist($repairOrder);
            $this->em->flush();

            // No number, don't text them. Move to next RO
            if (!$customer->getPhone()) {
                continue;
            }

            // Throws an error if it's not a mobile number
            try {
                $this->twilioHelper->lookupNumber($customer->getPhone());
            } catch (Exception $e) {
                continue;
            }

            // @TODO: Fix these settings, it was running off the 'user' table which doesn't store settings anymore
            if ($this->settingsHelper->getSetting('waiverEstimateText') && $this->settingsHelper->getSetting('waiverActivateAuthMessage')) {
                $introMessage = "Welcome to " . $settings->getName() . '. Click the link below to begin your visit. ';
                if ($this->settingsHelper->getSetting('waiverIntroText')) {
                    $introMessage = $settings->getSetting('waiverIntroText') . ' ';
                }

                $textLink     = $this->customerURL . $repairOrder->getLinkHash() . '/repair-waiver';
                $textLink     = $this->shortURLHelper->shortenUrl($textLink);
                $introMessage = $introMessage . $textLink;
                if ($this->activateIntegrationSms == true) {
                    $this->twilioHelper->sendShortCode($customer->getPhone(), $introMessage);
                }
            } else {
                $introMessage = "
                    For updates on your vehicle, please reply to this number. Your video inspection will be sent to you soon.
                ";
                // if (!$settings->getTwoWayTexting()) {
                //     $introMessage = "
                //         For updates on your vehicle, contact your advisor. Your video inspection will be sent to you soon.
                //     ";
                // }

                if ($this->settingsHelper->getSetting('serviceTextIntro')) {
                    $introMessage = $this->settingsHelper->getSetting('serviceTextIntro');
                }
                if ($this->activateIntegrationSms == true) {
                    $this->twilioHelper->sendSms($customer->getPhone(), $introMessage);
                }
            }

            if ($repairOrder->getVin() && $repairOrder->getYear() && $repairOrder->getMake() && $repairOrder->getModel()) {
                $repairOrder->setUpgradeQueue(1);

                $this->em->persist($repairOrder);
                $this->em->flush();
            }
        }
    }

    /**
     * Find currently open ROs and see if they've been closed in the DMS
     */
    public function closeOpenRepairOrders () {
        // Get open repair orders
        $openRepairOrders  = $this->repairOrderRepo->findBy(['dateClosed' => null, 'deleted' => 0]);
        $checkRepairOrders = [];

        // if ($openRepairOrders) {
        //     /** @var RepairOrder $openRepairOrder */
        //     foreach ($openRepairOrders as $openRepairOrder) {
        //         // Has a closed date so don't get the data again
        //         if ($openRepairOrder->getDateClosed()) {
        //             print_r($openRepairOrder);
        //             echo PHP_EOL;
        //             continue;
        //         }

        //         $checkRepairOrders[] = $openRepairOrder;
        //     }
        // }

        if ($openRepairOrders) {
            $this->integration->getClosedRoDetails($openRepairOrders);
        }
    }

    /**
     * @param $RONumber
     *
     * @return bool
     * @throws Exception
     */
    public function addSingleRepairOrder ($RONumber) {
        $defaultTechnician = $this->userRepo->findBy(['active' => 1, 'role' => 'ROLE_TECHNICIAN'], ['id' => 'ASC'])[0];
        $defaultAdvisor    = $this->userRepo->findBy(['active' => 1, 'role' => 'ROLE_SERVICE_ADVISOR'], ['id' => 'ASC'])[0];
        $filter            = $this->dmsFilter;

        if (!$this->integration) {
            throw new Exception('You are not integrated with a DMS');
        }

        if (!method_exists($this->integration, 'addRepairOrderByNumber')) {
            throw new Exception("Your DMS hasn't been set up to pull individual repair orders");
        }

        $dmsRepairOrder = $this->integration->addRepairOrderByNumber($RONumber);
        if (!$dmsRepairOrder) {
            throw new Exception("We were unable to find that RO Number on your DMS");
        }

        $repairOrderExists = $this->repairOrderRepo->findOneBy(['number' => $dmsRepairOrder->number]);
        if ($repairOrderExists) {
            throw new Exception("This RO is already in the system");
        }

        $advisor          = null;
        $phone            = $dmsRepairOrder->customer->phone;
        $name             = $dmsRepairOrder->customer->name;
        $email            = $dmsRepairOrder->customer->email;
        $dmsAdvisorId     = $dmsRepairOrder->advisor->id;
        $advisorFirstName = $dmsRepairOrder->advisor->firstName;
        $advisorLastName  = $dmsRepairOrder->advisor->lastName;
        $roKey            = isset($dmsRepairOrder->roKey) ? $dmsRepairOrder->roKey : null;

        // Skip certain ROs w/ customer names of those shown in the skip array
        // No phone number, just create the customer and move on
        if (!$phone) {
            $customer = new Customer();
            $this->customerHelper->commitCustomer($customer, ['name' => $name, 'email' => $email]);
        } else {
            // Check if the customer exists and use that one instead if so
            $customerExists = $this->customerRepo->findOneBy(['phone' => $phone]);

            if ($customerExists) {
                $customer = $customerExists;
            } else {
                $customer = new Customer();
                $this->customerHelper->commitCustomer($customer, ['phone' => $phone, 'name' => $name, 'email' => $email]);
            }
        }

        if ($dmsAdvisorId) {
            $foundAdvisor = $this->userRepo->findOneBy(['dmsId' => $dmsAdvisorId, 'role' => 'ROLE_SERVICE_ADVISOR']);
            if ($foundAdvisor) {
                $advisor = $foundAdvisor;
            }
        }

        if (!$advisor) {
            $foundAdvisor = $this->userRepo->findOneBy([
                'firstName' => $advisorFirstName,
                'lastName'  => $advisorLastName,
                'active'    => 1,
                'role'      => 'ROLE_SERVICE_ADVISOR'
            ]);
            if ($foundAdvisor) {
                $advisor = $foundAdvisor;
            }
        }

        // Try to find the advisor based on first/last name
        if (!$advisor) {
            $advisor = $defaultAdvisor;
        }

        // If there is a filter, check against it and skip if matched
        if ($filter != 'false' && $filter != false) {
            if (strncmp($dmsRepairOrder->number, $filter, strlen($filter)) === 0) {
                return false;
            }
        }

        $repairOrder = new RepairOrder();
        $repairOrder->setPrimaryCustomer($customer)
                    ->setPrimaryTechnician($defaultTechnician)
                    ->setPrimaryAdvisor($advisor)
                    ->setNumber($dmsRepairOrder->number)
                    ->setDmsKey($roKey)
                    ->setStartValue(0)
                    ->setDateCreated($dmsRepairOrder->date)
                    ->setWaiter($dmsRepairOrder->waiter)
                    ->setPickupDate($dmsRepairOrder->pickupDate)
                    ->setYear($dmsRepairOrder->year)
                    ->setMake($dmsRepairOrder->make)
                    ->setModel($dmsRepairOrder->model)
                    ->setMiles($dmsRepairOrder->miles)
                    ->setVin($dmsRepairOrder->vin)
                    ->setInternal(0)
                    ->setLinkHash($this->repairOrderHelper->generateLinkHash($dmsOpenRepairOrder->date->format('c')->format('c')));

        // If the customer name has "INVENTORY" in it, skip as an internal
        if (strpos($name, 'INVENTORY') !== false) {
            $repairOrder->setInternal(1);
        }

        $this->em->persist($repairOrder);
        $this->em->flush();

        if ($customer->getPhone()) {
            // Don't do the rest of the script if it's not a mobile number
            try {
                $this->twilioHelper->lookupNumber($customer->getPhone());

                // @TODO: Fix these settings, it was running off the 'user' table which doesn't store settings anymore
                if ($settings->getSettings('waiverEstimateText') && $settings->getAuthorizationMessage()) {
                    $introMessage = "Welcome to " . $settings->getSetting('generalName') . '. Click the link below to begin your visit. ';
                    if ($settings->repairAuthorizationTextMessage()) {
                        $introMessage = $settings->repairAuthorizationTextMessage() . ' ';
                    }

                    $textLink     = $this->customerURL . $repairOrder->getLinkHash() . '/repair-waiver';
                    $textLink     = $this->shortURLHelper->shortenUrl($textLink);
                    $introMessage = $introMessage . $textLink;
                    if ($this->activateIntegrationSms == true) {
                        $this->twilioHelper->sendShortCode($customer->getPhone(), $introMessage);
                    }
                } else {
                    $introMessage = "
                        For updates on your vehicle, please reply to this number. Your video inspection will be sent to you soon.
                    ";
                    // if (!$settings->getTwoWayTexting()) {
                    //     $introMessage = "
                    //         For updates on your vehicle, contact your advisor. Your video inspection will be sent to you soon.
                    //     ";
                    // }

                    if ($settings->getSetting('serviceTextIntro')) {
                        $introMessage = $settings->getSetting('serviceTextIntro');
                    }

                    if ($this->activateIntegrationSms == true) {
                        $this->twilioHelper->sendSms($customer->getPhone(), $introMessage);
                    }
                }
            } catch (Exception $e) {
                return true;
            }
        }

        return true;
    }
}

<?php

namespace App\Service;

use App\Entity\Customer;
use App\Entity\RepairOrder;
use App\Repository\UserRepository;
use App\Repository\CustomerRepository;
use App\Repository\RepairOrderRepository;
use App\Service\CustomerHelper as CustomerService;
use App\Service\TwilioHelper as Twilio;
use App\Service\ShortUrlHelper as URLShortener;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

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
     * @var Twilio
     */
    private $twilio;

    /**
     * @var CustomerHelper
     */
    private $customerService;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var CustomerRepository
     */
    private $customerRepository;

    /**
     * @var RepairOrderRepository
     */
    private $repairOrderRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

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
    private $urlShortener;

    /**
     * @var SettingsHelper
     */
    private $settings;

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
     * DMS constructor.
     *
     * @param \App\Service\AutoMate       $automate
     * @param \App\Service\DealerTrack    $dealerTrack
     * @param \App\Service\DealerBuilt    $dealerBuilt
     * @param \App\Service\CDK            $cdk
     * @param TwilioHelper|null           $twilio
     * @param CustomerHelper              $customerService
     * @param EntityManagerInterface      $em
     * @param ShortUrlHelper              $URLShortener
     * @param CustomerRepository          $customerRepository
     * @param RepairOrderRepository       $repairOrderRepository
     * @param UserRepository              $userRepository
     * @param \App\Service\SettingsHelper $settings
     *
     * @throws Exception
     */
    public function __construct (AutoMate $automate, DealerTrack $dealerTrack,
                                 DealerBuilt $dealerBuilt, CDK $cdk, Twilio $twilio = null,
                                 CustomerService $customerService, EntityManagerInterface $em, URLShortener $URLShortener,
                                 CustomerRepository $customerRepository, RepairOrderRepository $repairOrderRepository,
                                 UserRepository $userRepository, SettingsHelper $settings) {
        $this->twilio                 = $twilio;
        $this->customerService        = $customerService;
        $this->em                     = $em;
        $this->customerRepository     = $customerRepository;
        $this->repairOrderRepository  = $repairOrderRepository;
        $this->userRepository         = $userRepository;
        $this->activateIntegrationSms = true;
        $this->urlShortener           = $URLShortener;
        $this->settings               = $settings;
        $this->customerURL            = $this->settings->getSetting('customerURL');
        $this->dmsFilter              = $this->settings->getSetting('dmsFilter');
        $this->usingAutomate          = $this->settings->getSetting('usingAutomate') === 'true';
        $this->usingDealerTrack       = $this->settings->getSetting('usingDealerTrack') === 'true';
        $this->usingDealerBuilt       = $this->settings->getSetting('usingDealerBuilt') === 'true';
        $this->usingCdk               = $this->settings->getSetting('usingCdk') === 'true';

        if ($this->usingAutomate) {
            $this->integration = $automate;
            return;
        }

        if ($this->usingDealerTrack) {
            $this->integration = $dealerTrack;
            $this->integration->enableDevMode();
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

        $defaultTechnician   = $this->userRepository->findOneBy(['active' => 1, 'role' => 'ROLE_TECHNICIAN'], ['id' => 'ASC']);
        $defaultAdvisor      = $this->userRepository->findOneBy(['active' => 1, 'role' => 'ROLE_PARTS_ADVISOR'], ['id' => 'ASC']);
        $dmsOpenRepairOrders = $this->integration->getOpenRepairOrders();

        // Loop over found repair orders
        foreach ($dmsOpenRepairOrders as $dmsOpenRepairOrder) {
            // First check if it exists already
            $repairOrderExists = $this->repairOrderRepository->findOneBy(['number' => $dmsOpenRepairOrder->number]);
            if ($repairOrderExists) {
                continue;
            }

            $customer         = null;
            $advisor          = null;
            $phoneNumbers     = $dmsOpenRepairOrder->customer->phone_numbers;
            $name             = $dmsOpenRepairOrder->customer->name;
            $email            = $dmsOpenRepairOrder->customer->email;
            $dmsAdvisorId     = $dmsOpenRepairOrder->advisor->id;
            $advisorFirstName = $dmsOpenRepairOrder->advisor->first_name;
            $advisorLastName  = $dmsOpenRepairOrder->advisor->last_name;
            $roKey            = isset($dmsOpenRepairOrder->ro_key) ? $dmsOpenRepairOrder->ro_key : null;

            // No phone numbers passed, create new customer
            if (!$phoneNumbers) {
                $customer = new Customer();
                $this->customerService->commitCustomer($customer, ['name' => $name, 'email' => $email]);
            }

            // If phone numbers passed, loop over them to see if they exist
            if (!$customer) {
                foreach ($phoneNumbers as $phoneNumber) {
                    // Try to find the customer
                    // Check if the customer exists and use that one instead if so
                    $customer = $this->customerRepository->findOneBy(['phone' => $phoneNumber]);
                }
            }

            // Still no customer, create a new one but only use a valid phone number
            if (!$customer) {
                foreach ($phoneNumbers as $phoneNumber) {
                    // Try to validate the phone number
                    try {
                        $phoneValid = $this->twilio->lookupNumber($phoneNumber);
                        if ($phoneValid) {
                            $customer = new Customer();
                            $this->customerService->commitCustomer($customer, ['phone' => $phoneNumber, 'name' => $name, 'email' => $email, 'skipMobileVerification' => true]);
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
                $this->customerService->commitCustomer($customer, ['phone' => $phoneNumber, 'name' => $name, 'email' => $email, 'skipMobileVerification' => true]);
            }

            // If there isn't a customer at this state, just skip the RO, something seriously weird happened
            if (!$customer) {
                continue;
            }

            if ($dmsAdvisorId) {
                $foundAdvisor = $this->userRepository->findOneBy(['id' => $dmsAdvisorId, 'role' => 'ROLE_SERVICE_ADVISOR']);
                if ($foundAdvisor) {
                    $advisor = $foundAdvisor;
                }
            }

            if (!$advisor) {
                $foundAdvisor = $this->userRepository->findOneBy([
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
                        ->setInternal(0);

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
                $this->twilio->lookupNumber($customer->getPhone());
            } catch (Exception $e) {
                continue;
            }

            // @TODO: Fix these settings, it was running off the 'user' table which doesn't store settings anymore
            exit;
            if ($settings->repairAuthorizationText() && $settings->repairAuthorization()) {
                $introMessage = "Welcome to " . $settings->getName() . '. Click the link below to begin your visit. ';
                if ($settings->repairAuthorizationTextMessage()) {
                    $introMessage = $settings->repairAuthorizationTextMessage() . ' ';
                }

                $textLink     = $this->customerURL . $repairOrder->getLinkHash() . '/repair-waiver';
                $textLink     = $this->urlShortener->shortenUrl($textLink);
                $introMessage = $introMessage . $textLink;
                if ($this->activateIntegrationSms == true) {
                    $this->twilio->sendShortCode($customer->getPhone(), $introMessage);
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

                if ($settings->serviceIntroTextMessage()) {
                    $introMessage = $settings->serviceIntroTextMessage();
                }
                if ($this->activateIntegrationSms == true) {
                    $this->twilio->sendSms($customer->getPhone(), $introMessage);
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
        $openRepairOrders  = $this->repairOrderRepository->findBy(['phase' => [0, 1, 2, 3, 4], 'inactive' => 0]);
        $checkRepairOrders = [];

        if ($openRepairOrders) {
            /** @var RepairOrder $openRepairOrder */
            foreach ($openRepairOrders as $openRepairOrder) {
                // Has a closed date so don't get the data again
                if ($openRepairOrder->getDateClosed()) {
                    continue;
                }

                $checkRepairOrders[] = $openRepairOrder;
            }
        }

        if ($checkRepairOrders) {
            $this->integration->getClosedRoDetails($checkRepairOrders);
        }
    }

    /**
     * @param $RONumber
     *
     * @return bool
     * @throws Exception
     */
    public function addSingleRepairOrder ($RONumber) {
        $defaultTechnician = $this->userRepository->findBy(['active' => 1, 'role' => 'ROLE_TECHNICIAN'], ['id' => 'ASC'])[0];
        $defaultAdvisor    = $this->userRepository->findBy(['active' => 1, 'role' => 'ROLE_SERVICE_ADVISOR'], ['id' => 'ASC'])[0];
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

        $repairOrderExists = $this->repairOrderRepository->findOneBy(['number' => $dmsRepairOrder->number]);
        if ($repairOrderExists) {
            throw new Exception("This RO is already in the system");
        }

        $advisor          = null;
        $phone            = $dmsRepairOrder->customer->phone;
        $name             = $dmsRepairOrder->customer->name;
        $email            = $dmsRepairOrder->customer->email;
        $dmsAdvisorId     = $dmsRepairOrder->advisor->id;
        $advisorFirstName = $dmsRepairOrder->advisor->first_name;
        $advisorLastName  = $dmsRepairOrder->advisor->last_name;
        $roKey            = isset($dmsRepairOrder->ro_key) ? $dmsRepairOrder->ro_key : null;

        // Skip certain ROs w/ customer names of those shown in the skip array
        // No phone number, just create the customer and move on
        if (!$phone) {
            // @TODO: Fix this
            exit;
            $customer = $this->customerService->addCustomer($phone, $name, $email);
        } else {
            // Check if the customer exists and use that one instead if so
            $customerExists = $this->customerRepository->findOneBy(['phone' => $phone]);

            if ($customerExists) {
                $customer = $customerExists;
            } else {
                $customer = new Customer();
                $this->customerService->commitCustomer($customer, ['phone' => $phone, 'name' => $name, 'email' => $email]);
            }
        }

        if ($dmsAdvisorId) {
            $foundAdvisor = $this->userRepository->findOneBy(['dmsId' => $dmsAdvisorId, 'role' => 'ROLE_SERVICE_ADVISOR']);
            if ($foundAdvisor) {
                $advisor = $foundAdvisor;
            }
        }

        if (!$advisor) {
            $foundAdvisor = $this->userRepository->findOneBy([
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
                    ->setInternal(0);

        // If the customer name has "INVENTORY" in it, skip as an internal
        if (strpos($name, 'INVENTORY') !== false) {
            $repairOrder->setInternal(1);
        }

        $this->em->persist($repairOrder);
        $this->em->flush();

        if ($customer->getPhone()) {
            // Don't do the rest of the script if it's not a mobile number
            try {
                $this->twilio->lookupNumber($customer->getPhone());

                throw new Exception();
                // @TODO: Fix these settings, it was running off the 'user' table which doesn't store settings anymore
                if ($settings->repairAuthorizationText() && $settings->repairAuthorization()) {
                    $introMessage = "Welcome to " . $settings->getName() . '. Click the link below to begin your visit. ';
                    if ($settings->repairAuthorizationTextMessage()) {
                        $introMessage = $settings->repairAuthorizationTextMessage() . ' ';
                    }

                    $textLink     = $this->customerURL . $repairOrder->getLinkHash() . '/repair-waiver';
                    $textLink     = $this->urlShortener->shortenUrl($textLink);
                    $introMessage = $introMessage . $textLink;
                    if ($this->activateIntegrationSms == true) {
                        $this->twilio->sendShortCode($customer->getPhone(), $introMessage);
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

                    if ($settings->serviceIntroTextMessage()) {
                        $introMessage = $settings->serviceIntroTextMessage();
                    }

                    if ($this->activateIntegrationSms == true) {
                        $this->twilio->sendSms($customer->getPhone(), $introMessage);
                    }
                }
            } catch (Exception $e) {
                return true;
            }
        }

        return true;
    }
}

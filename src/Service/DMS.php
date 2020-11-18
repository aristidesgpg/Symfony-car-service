<?php

namespace AppBundle\Service;

use AppBundle\Entity\Admin;
use AppBundle\Entity\Advisor;
use AppBundle\Entity\Customer;
use AppBundle\Entity\InternalRepairOrder;
use AppBundle\Entity\RepairOrder;
use AppBundle\Entity\Technician;
use AppBundle\Repository\AdminRepository;
use AppBundle\Repository\AdvisorRepository;
use AppBundle\Repository\CustomerRepository;
use AppBundle\Repository\RepairOrderRepository;
use AppBundle\Repository\TechnicianRepository;
use AppBundle\Service\Customer as CustomerService;
use DateTime;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Exception;

/**
 * Class DMS
 *
 * @package AppBundle\Service
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
     * @var \AppBundle\Service\Customer
     */
    private $customerService;

    /**
     * @var EntityManager
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
     * @var TechnicianRepository
     */
    private $technicianRepository;

    /**
     * @var AdvisorRepository
     */
    private $advisorRepository;

    /**
     * @var AdminRepository
     */
    private $adminRepository;

    /**
     * @var
     */
    private $dealertrackFilter;

    /**
     * @var
     */
    private $clientUrl;

    /**
     * @var URLShortener
     */
    private $urlShortener;

    /**
     * DMS constructor.
     *
     * @param                             $usingAutomate
     * @param                             $usingDealerTrack
     * @param                             $usingDealerBuilt
     * @param                             $usingCdk
     * @param                             $automate
     * @param                             $dealerTrack
     * @param                             $dealerBuilt
     * @param                             $cdk
     * @param                             $activateIntegrationSms
     * @param                             $dealertrackFilter
     * @param                             $clientUrl
     * @param Twilio                      $twilio
     * @param \AppBundle\Service\Customer $customerService
     * @param EntityManager               $em
     * @param URLShortener                $URLShortener
     * @param CustomerRepository          $customerRepository
     * @param RepairOrderRepository       $repairOrderRepository
     * @param TechnicianRepository        $technicianRepository
     * @param AdvisorRepository           $advisorRepository
     * @param AdminRepository             $adminRepository
     */
    public function __construct ($usingAutomate, $usingDealerTrack, $usingDealerBuilt, $usingCdk, $automate, $dealerTrack,
                                 $dealerBuilt, $cdk, $activateIntegrationSms, $dealertrackFilter, $clientUrl, Twilio $twilio,
                                 CustomerService $customerService, EntityManager $em, URLShortener $URLShortener,
                                 CustomerRepository $customerRepository, RepairOrderRepository $repairOrderRepository,
                                 TechnicianRepository $technicianRepository, AdvisorRepository $advisorRepository,
                                 AdminRepository $adminRepository) {
        $this->twilio                 = $twilio;
        $this->customerService        = $customerService;
        $this->em                     = $em;
        $this->customerRepository     = $customerRepository;
        $this->repairOrderRepository  = $repairOrderRepository;
        $this->technicianRepository   = $technicianRepository;
        $this->advisorRepository      = $advisorRepository;
        $this->adminRepository        = $adminRepository;
        $this->activateIntegrationSms = $activateIntegrationSms;
        $this->dealertrackFilter      = $dealertrackFilter;
        $this->clientUrl              = $clientUrl;
        $this->urlShortener           = $URLShortener;

        if ($usingAutomate) {
            $this->integration = $automate;

            return;
        }

        if ($usingDealerTrack) {
            $this->integration = $dealerTrack;

            return;
        }

        if ($usingDealerBuilt) {
            $this->integration = $dealerBuilt;

            return;
        }

        if ($usingCdk) {
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

        /** @var Admin $settings */
        $settings          = $this->adminRepository->find(1);
        $defaultTechnician = $this->technicianRepository->find(1);
        $defaultAdvisor    = $this->advisorRepository->findBy(['active' => 1], ['id' => 'ASC'])[0];

        $dmsOpenRepairOrders = $this->integration->getOpenRepairOrders();
        //return $dmsOpenRepairOrders;
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
                $customer = $this->customerService->addCustomer('', $name, $email, false);
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
                        $phoneValid = $this->twilio->carrierLookup($phoneNumber);
                        if ($phoneValid) {
                            $customer = $this->customerService->addCustomer($phoneNumber, $name, $email, true);
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
                $customer    = $this->customerService->addCustomer($phoneNumber, $name, $email, false);
            }

            // If there isn't a customer at this state, just skip the RO, something seriously weird happened
            if (!$customer){
                continue;
            }

            if ($dmsAdvisorId) {
                $foundAdvisor = $this->advisorRepository->findOneBy(['dmsId' => $dmsAdvisorId]);
                if ($foundAdvisor) {
                    $advisor = $foundAdvisor;
                }
            }

            if (!$advisor) {
                $foundAdvisor = $this->advisorRepository->findOneBy([
                    'firstName' => $advisorFirstName,
                    'lastName'  => $advisorLastName,
                    'active'    => 1
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
            $filter = $this->dealertrackFilter;
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
                        ->setTechnician($defaultTechnician)
                        ->setAdvisor($advisor)
                        ->setNumber($dmsOpenRepairOrder->number)
                        ->setRoKey($roKey)
                        ->setValue(0)
                        ->setDate($dmsOpenRepairOrder->date)
                        ->setPhase(1)
                        ->setWaiter($dmsOpenRepairOrder->waiter)
                        ->setPickupDate($dmsOpenRepairOrder->pickupDate)
                        ->setYear($dmsOpenRepairOrder->year)
                        ->setMake($dmsOpenRepairOrder->make)
                        ->setModel($dmsOpenRepairOrder->model)
                        ->setMiles($dmsOpenRepairOrder->miles)
                        ->setVin($dmsOpenRepairOrder->vin)
                        ->setUpgradeQueue(0)
                        ->setInactive(0);

            // @TODO: Fix this later. Need to make an admin settings. Imagine getIntegrationFilter is getInternalFilter
            // If the customer name has "INVENTORY" in it, skip as an internal UNLESS getIntegrationFilter() has any value
            if (strpos($name, 'INVENTORY') !== false && $settings->getIntegrationFilter() == null) {
                $repairOrder->setInactive(1);
            }

            try {
                $this->em->persist($repairOrder);
                $this->em->flush();
            } catch (OptimisticLockException $e) {
                continue;
            }

            // No number, don't text them. Move to next RO
            if (!$customer->getPhone()) {
                continue;
            }

            // Throws an error if it's not a mobile number
            try {
                $this->twilio->carrierLookup($customer->getPhone());
            } catch (Exception $e) {
                continue;
            }

            if ($settings->getEstimateWaiverText() && $settings->getAuthorizationMessage()) {
                $introMessage = "Welcome to " . $settings->getName() . '. Click the link below to begin your visit. ';
                if ($settings->getAuthorizationMessageText()) {
                    $introMessage = $settings->getAuthorizationMessageText() . ' ';
                }

                $textLink     = $this->clientUrl . $repairOrder->getLinkHash() . '/repair-waiver';
                $textLink     = $this->urlShortener->shortenUrl($textLink);
                $introMessage = $introMessage . $textLink;
                if ($this->activateIntegrationSms == true) {
                    $this->twilio->sendShortCode($customer->getPhone(), $introMessage);
                }
            } else {
                $introMessage = "
                    For updates on your vehicle, please reply to this number. Your video inspection will be sent to you soon.
                ";
                if (!$settings->getTwoWayTexting()) {
                    $introMessage = "
                        For updates on your vehicle, contact your advisor. Your video inspection will be sent to you soon.
                    ";
                }

                if ($settings->getIntroText()) {
                    $introMessage = $settings->getIntroText();
                }
                if ($this->activateIntegrationSms == true) {
                    $this->twilio->sendSms($customer->getPhone(), $introMessage);
                }
            }

            if($repairOrder->getVin() && $repairOrder->getYear() && $repairOrder->getMake() && $repairOrder->getModel()){
                $repairOrder->setUpgradeQueue(1);
                try {
                    $this->em->persist($repairOrder);
                    $this->em->flush();
                } catch (OptimisticLockException $e) {
                    continue;
                }
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
                if ($openRepairOrder->getClosedDate()) {
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
        $settings          = $this->adminRepository->find(1);
        $defaultTechnician = $this->technicianRepository->find(1);
        $defaultAdvisor    = $this->advisorRepository->findBy(['active' => 1], ['id' => 'ASC'])[0];
        $filter            = $this->dealertrackFilter;

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
            $customer = $this->customerService->addCustomer($phone, $name, $email);
        } else {
            // Check if the customer exists and use that one instead if so
            $customerExists = $this->customerRepository->findOneBy(['phone' => $phone]);

            if ($customerExists) {
                $customer = $customerExists;
            } else {
                $customer = $this->customerService->addCustomer($phone, $name, $email);
            }
        }

        if ($dmsAdvisorId) {
            $foundAdvisor = $this->advisorRepository->findOneBy(['dmsId' => $dmsAdvisorId]);
            if ($foundAdvisor) {
                $advisor = $foundAdvisor;
            }
        }

        if (!$advisor) {
            $foundAdvisor = $this->advisorRepository->findOneBy([
                'firstName' => $advisorFirstName,
                'lastName'  => $advisorLastName,
                'active'    => 1
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
                    ->setTechnician($defaultTechnician)
                    ->setAdvisor($advisor)
                    ->setNumber($dmsRepairOrder->number)
                    ->setRoKey($roKey)
                    ->setValue(0)
                    ->setDate($dmsRepairOrder->date)
                    ->setPhase(1)
                    ->setWaiter($dmsRepairOrder->waiter)
                    ->setPickupDate($dmsRepairOrder->pickupDate)
                    ->setYear($dmsRepairOrder->year)
                    ->setMake($dmsRepairOrder->make)
                    ->setModel($dmsRepairOrder->model)
                    ->setMiles($dmsRepairOrder->miles)
                    ->setVin($dmsRepairOrder->vin)
                    ->setInactive(0);

        // @TODO: Fix this later. Need to make an admin settings. Imagine getIntegrationFilter is getInternalFilter
        // If the customer name has "INVENTORY" in it, skip as an internal UNLESS getIntegrationFilter() has any value
        if (strpos($name, 'INVENTORY') !== false && $settings->getIntegrationFilter() == null) {
            $repairOrder->setInactive(1);
        }

        try {
            $this->em->persist($repairOrder);
            $this->em->flush();
        } catch (OptimisticLockException $e) {
            throw new Exception('Failed to save the RO to the database. Please try again later.');
        }

        if ($customer->getPhone()) {
            // Don't do the rest of the script if it's not a mobile number
            try {
                $this->twilio->carrierLookup($customer->getPhone());

                if ($settings->getEstimateWaiverText() && $settings->getAuthorizationMessage()) {
                    $introMessage = "Welcome to " . $settings->getName() . '. Click the link below to begin your visit. ';
                    if ($settings->getAuthorizationMessageText()) {
                        $introMessage = $settings->getAuthorizationMessageText() . ' ';
                    }

                    $textLink     = $this->clientUrl . $repairOrder->getLinkHash() . '/repair-waiver';
                    $textLink     = $this->urlShortener->shortenUrl($textLink);
                    $introMessage = $introMessage . $textLink;
                    if ($this->activateIntegrationSms == true) {
                        $this->twilio->sendShortCode($customer->getPhone(), $introMessage);
                    }
                } else {
                    $introMessage = "
                        For updates on your vehicle, please reply to this number. Your video inspection will be sent to you soon.
                    ";
                    if (!$settings->getTwoWayTexting()) {
                        $introMessage = "
                            For updates on your vehicle, contact your advisor. Your video inspection will be sent to you soon.
                        ";
                    }

                    if ($settings->getIntroText()) {
                        $introMessage = $settings->getIntroText();
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

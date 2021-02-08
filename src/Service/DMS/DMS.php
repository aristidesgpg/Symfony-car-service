<?php

namespace App\Service\DMS;

use App\Entity\Customer;
use App\Entity\DMSResult;
use App\Entity\RepairOrder;
use App\Entity\Settings;
use App\Entity\User;
use App\Service\CustomerHelper;
use App\Service\RepairOrderHelper;
use App\Service\SettingsHelper;
use App\Service\ShortUrlHelper;
use App\Service\TwilioHelper;
use App\Soap\dealerbuilt\src\Models\PhoneNumberType;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\DependencyInjection\ServiceLocator;

class DMS
{
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
     * @var ShortUrlHelper
     */
    private $shortUrlHelper;
    /**
     * @var SettingsHelper
     */
    private $settingsHelper;
    /**
     * @var RepairOrderHelper
     */
    private $repairOrderHelper;
    /**
     * @var ParameterBagInterface
     */
    private $parameterBag;

    private $customerRepo;
    private $repairOrderRepo;
    private $userRepo;

    private $customerURL;
    private $dmsFilter;
    private $usingAutomate;
    private $usingDealerTrack;
    private $usingDealerBuilt;
    private $usingCdk;
    /**
     * @var bool
     */
    private $activateIntegrationSms;

    /**
     * @var bool|DealerTrackClient|AutoMateClient|DealerBuiltClient|CDKClient
     */
    private $integration = false;
    /**
     * @var ServiceLocator
     */
    private $serviceLocator;

    public function __construct(ServiceLocator $serviceLocator,
                                TwilioHelper $twilioHelper,
                                CustomerHelper $customerHelper,
                                EntityManagerInterface $em,
                                ShortUrlHelper $shortUrlHelper,
                                SettingsHelper $settingsHelper,
                                RepairOrderHelper $repairOrderHelper,
                                ParameterBagInterface $parameterBag)
    {
        $this->serviceLocator = $serviceLocator;

        $this->twilioHelper = $twilioHelper;
        $this->customerHelper = $customerHelper;
        $this->em = $em;
        $this->shortUrlHelper = $shortUrlHelper;
        $this->settingsHelper = $settingsHelper;
        $this->repairOrderHelper = $repairOrderHelper;
        $this->parameterBag = $parameterBag;

        $this->customerRepo = $em->getRepository(Customer::class);
        $this->repairOrderRepo = $em->getRepository(RepairOrder::class);
        $this->userRepo = $em->getRepository(User::class);

        $this->customerURL = $this->settingsHelper->getSetting('customerURL');
        $this->dmsFilter = $this->settingsHelper->getSetting('dmsFilter');
//        $this->usingAutomate = 'true' === $this->settingsHelper->getSetting('usingAutomate');
//        $this->usingDealerTrack = 'true' === $this->settingsHelper->getSetting('usingDealerTrack');
//        $this->usingDealerBuilt = 'true' === $this->settingsHelper->getSetting('usingDealerBuilt');
//        $this->usingCdk = 'true' === $this->settingsHelper->getSetting('usingCdk');
        $this->activateIntegrationSms = true;

        //TODO This needs to be revisited after the SettingsHelper branch is merged into master.
        $activeDMS = $em->getRepository(Settings::class)->findActiveDms();
        if ($this->getServiceLocator()->has($activeDMS)) {
            $this->integration = $this->getServiceLocator()->get($activeDMS);
        }

//        if ($this->usingAutomate) {
//            $this->integration = $automate;
//            return;
//        }
//
//        if ($this->usingDealerTrack) {
//            $this->integration = $dealerTrack;
//            return;
//        }
//
//        if ($this->usingDealerBuilt) {
//            $this->integration = $dealerBuilt;
//            return;
//        }
//
//        if ($this->usingCdk) {
//            $this->integration = $cdk;
//            return;
//        }
    }

    public function addOpenRepairOrders()
    {
        // Not integrated, do nothing
        if (!$this->integration) {
            return;
        }

        //$defaultTechnician = $this->getUserRepo()->findOneBy(['active' => 1, 'role' => 'ROLE_TECHNICIAN'], ['id' => 'ASC']);

        $dmsOpenRepairOrders = $this->integration->getOpenRepairOrders();
        return $dmsOpenRepairOrders;

        // Loop over found repair orders
        /**
         * @var DMSResult $dmsOpenRepairOrder
         */
        foreach ($dmsOpenRepairOrders as $dmsOpenRepairOrder) {
            dump('here');

            $this->processRepairOrder($dmsOpenRepairOrder);
        }


        return $dmsOpenRepairOrders;
    }

    /**
     * @param $RONumber
     *
     * @throws exception
     * TODO Revisit after dms clients are done
     */
    public function addSingleRepairOrder($RONumber): bool
    {
//        $filter = $this->dmsFilter;

        if (!$this->integration) {
            throw new Exception('You are not integrated with a DMS');
        }

        if (!method_exists($this->integration, 'addRepairOrderByNumber')) {
            throw new Exception("Your DMS hasn't been set up to pull individual repair orders");
        }

        $dmsRepairOrder = $this->integration->addRepairOrderByNumber($RONumber);
        if (!$dmsRepairOrder) {
            throw new Exception('We were unable to find that RO Number on your DMS');
        }

        $repairOrderExists = $this->repairOrderRepo->findOneBy(['number' => $dmsRepairOrder->number]);
        if ($repairOrderExists) {
            throw new Exception('This RO is already in the system');
        }

        $this->processRepairOrder($dmsRepairOrder);

        //$advisor = null;
//        $phone = $dmsRepairOrder->customer->phone;
//        $name = $dmsRepairOrder->customer->name;
//        $email = $dmsRepairOrder->customer->email;
//        $dmsAdvisorId = $dmsRepairOrder->advisor->id;
//        $advisorFirstName = $dmsRepairOrder->advisor->firstName;
//        $advisorLastName = $dmsRepairOrder->advisor->lastName;
//        $roKey = isset($dmsRepairOrder->roKey) ? $dmsRepairOrder->roKey : null;

        // Skip certain ROs w/ customer names of those shown in the skip array
        // No phone number, just create the customer and move on
//        if (!$dmsRepairOrder->getCustomer()->getPhone()) {
//            $customer = new Customer();
//            $this->customerHelper->commitCustomer($customer, ['name' => $name, 'email' => $email]);
//        } else {
//            // Check if the customer exists and use that one instead if so
//            $customerExists = $this->customerRepo->findOneBy(['phone' => $phone]);
//
//            if ($customerExists) {
//                $customer = $customerExists;
//            } else {
//                $customer = new Customer();
//                $this->customerHelper->commitCustomer($customer, ['phone' => $phone, 'name' => $name, 'email' => $email]);
//            }
//        }

//        $customer = $this->customerFinder($dmsRepairOrder);
//
//        $advisor = $this->advisorFinder($dmsRepairOrder);
//        //Can't fnd an advisor, use default.
//        if (!$advisor) {
//            $advisor = $defaultAdvisor;
//        }

//        // If there is a filter, check against it and skip if matched
//        if ('false' != $filter && false != $filter) {
//            if (0 === strncmp($dmsRepairOrder->getNumber(), $filter, strlen($filter))) {
//                return false;
//            }
//        }
//
//        $repairOrder = $this->createRepairOrder($dmsRepairOrder, $customer, $advisor);

//        if ($customer->getPhone()) {
//            // Don't do the rest of the script if it's not a mobile number
//            try {
//                $this->twilioHelper->lookupNumber($customer->getPhone());
//                $this->sendCommunicationToCustomer($repairOrder, $customer);
//            } catch (Exception $e) {
//                return true;
//            }
//        }

        return true;
    }

    public function processRepairOrder(DMSResult $dmsRepairOrder)
    {

        dd($dmsRepairOrder);


        //TODO Testing, take out for prod. 111 numbers fail validation.
        foreach($dmsRepairOrder->getCustomer()->getPhoneNumbers() as $key => $number)
        {
            $dmsRepairOrder->getCustomer()->getPhoneNumbers()[$key]->setDigits(str_replace('1', '2', $number->getDigits()));
//            dump( str_replace('1', '2', $number->getDigits()));
//            dump($number);
//            dd($dmsRepairOrder);
        }
//        dd($dmsRepairOrder);
        //End TODO

        // First check if it exists already
        $repairOrderExists = $this->repairOrderRepo->findOneBy(['number' => $dmsRepairOrder->getNumber()]);
        if ($repairOrderExists) {
            dump('Already Exists');
            return;
        }

        //If there is a filter, check against it and move along if it matched
        $filter = $this->getDmsFilter();
        if ('false' != $filter && false != $filter) {
            if (0 === strncmp($dmsRepairOrder->getNumber(), $filter, strlen($filter))) {
                dump('Filter It Out');
                return;
            }
        }

        // Must be opened in the past 5 days
        $date = $dmsRepairOrder->getDate();
        $openTimestamp = $date->getTimestamp();
        $fiveDaysAgo = (new DateTime())->modify('-5 days')->getTimestamp();

        //TODO Took out for development, Uncomment for prod.
//        if ($fiveDaysAgo > $openTimestamp) {
//            dump('Greater Than 5 days ago.');
//            return;
//        }
        //TODO end
//        $customer = null;
//        $advisor = null;
//        $phoneNumbers = $dmsRepairOrder->getCustomer()->getPhoneNumbers();
//        $name = $dmsRepairOrder->getCustomer()->getName();
//        $email = $dmsRepairOrder->getCustomer()->getEmail();
//        $dmsAdvisorId = $dmsRepairOrder->getAdvisor()->getId();
//        $advisorFirstName = $dmsRepairOrder->getAdvisor()->getFirstName();
//        $advisorLastName = $dmsRepairOrder->getAdvisor()->getLastName();
//        //$roKey            = isset($dmsOpenRepairOrder->roKey) ? $dmsOpenRepairOrder->roKey : null;
//        $roKey = $dmsRepairOrder->getRoKey();

        //TODO: The customerFinder() logic needs revisited.
        $customer = $this->customerFinder($dmsRepairOrder);
        //Can't find a customer.
//        if (!$customer || !$customer->getId()) {
//            //Should never get hear since we create empty customers.
//            dump('EMpty Customer, Returning');
//            return;
//        }

        dump('Looking for advisor');
        //returns default advisor if one is not found.
        $advisor = $this->advisorFinder($dmsRepairOrder);
//        Can't fnd an advisor, use default.
//        if (!$advisor) {
//            $advisor = $defaultAdvisor;
//        }
        dump($advisor);

        $repairOrder = $this->persistRepairOrder($dmsRepairOrder, $customer, $advisor);

        // No number, don't text them. Move to next RO
        if (!$customer->getPhone()) {
            return;
        }

        // Throws an error if it's not a mobile number
        try {
            $this->twilioHelper->lookupNumber($customer->getPhone());
        } catch (\Exception $e) {
            return;
        }

        //text customer.

        //TODO Turn Back on.
        //$this->sendCommunicationToCustomer($repairOrder, $customer);
    }

    public function persistRepairOrder(DMSResult $dmsResult, Customer $customer, User $advisor): RepairOrder
    {
        $defaultTechnician = $this->userRepo->findBy(['active' => 1, 'role' => 'ROLE_TECHNICIAN'], ['id' => 'ASC'])[0];
        $repairOrder = (new RepairOrder())
            ->setPrimaryCustomer($customer)
            ->setPrimaryTechnician($defaultTechnician)
            ->setPrimaryAdvisor($advisor)
            ->setNumber($dmsResult->getNumber())
            ->setDmsKey($dmsResult->getRoKey())
            ->setStartValue(0)
            ->setDateCreated($dmsResult->getDate())
            ->setWaiter($dmsResult->getWaiter())
            ->setPickupDate($dmsResult->getPickupDate())
            ->setYear($dmsResult->getYear())
            ->setMake($dmsResult->getMake())
            ->setModel($dmsResult->getModel())
            ->setMiles($dmsResult->getMiles())
            ->setVin($dmsResult->getVin())
            ->setInternal(0)
            ->setLinkHash($this->repairOrderHelper->generateLinkHash($dmsResult->getDate()->format('c')));

        // If the customer name has "INVENTORY" in it, skip as an internal
        if (false !== strpos($dmsResult->getCustomer()->getName(), 'INVENTORY')) {
            $repairOrder->setInternal(1);
        }

        if ($repairOrder->getVin() && $repairOrder->getYear() && $repairOrder->getMake() && $repairOrder->getModel()) {
            //spelling of setUpgradeQue changed from setUpgradeQueue.
            $repairOrder->setUpgradeQue(1);
        }

        $this->em->persist($repairOrder);
        $this->em->flush();

        return $repairOrder;
    }

    /**
     * Find currently open ROs and see if they've been closed in the DMS.
     * TODO DoubleCheck after integration's are done.
     */
    public function closeOpenRepairOrders()
    {
        // Get open repair orders
        $openRepairOrders = $this->repairOrderRepo->findBy(['dateClosed' => null, 'deleted' => 0]);  ;
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
     * @throws Exception
     */
    public function sendCommunicationToCustomer(RepairOrder $repairOrder, Customer $customer)
    {
        // @TODO: Fix these settings, it was running off the 'user' table which doesn't store settings anymore
        // TODO: This method was incomplete. I tried to infer as much as possible to fix.
        if ($this->settingsHelper->getSetting('waiverEstimateText') && $this->settingsHelper->getSetting('waiverActivateAuthMessage')) {
            $introMessage = sprintf(
                'Welcome to %s. Click the link below to begin your visit. ',
                $this->settingsHelper->getSetting('generalName')
            );

            if ($this->settingsHelper->getSetting('waiverIntroText')) {
                $introMessage = $this->settingsHelper->getSetting('waiverIntroText').' ';
            }

            $textLink = $this->customerURL.$repairOrder->getLinkHash().'/repair-waiver';
            //TODO shortenUrl Does Not Exist, replaced with below? Needs checked.
            //$textLink = $this->shortUrlHelper->shortenUrl($textLink);
            $textLink = $this->shortUrlHelper->generateShortUrl($textLink);

            $introMessage = $introMessage.$textLink;
            if (true == $this->activateIntegrationSms) {
                //TODO sendShortCode Does Not Exist
                $this->twilioHelper->sendShortCode($customer->getPhone(), $introMessage);
            }
        } else {
            $introMessage = '
                    For updates on your vehicle, please reply to this number. Your video inspection will be sent to you soon.
                ';
            // if (!$settings->getTwoWayTexting()) {
            //     $introMessage = "
            //         For updates on your vehicle, contact your advisor. Your video inspection will be sent to you soon.
            //     ";
            // }

            if ($this->settingsHelper->getSetting('serviceTextIntro')) {
                $introMessage = $this->settingsHelper->getSetting('serviceTextIntro');
            }
            if (true == $this->activateIntegrationSms) {
                $this->twilioHelper->sendSms($customer->getPhone(), $introMessage);
            }
        }
    }

    /**
     * Tries to find an advisor.
     */
    public function advisorFinder(DMSResult $dmsOpenRepairOrder): ?User
    {
        //search advisor by id.
        dump('AdvisorFinder');
        if ($dmsOpenRepairOrder->getAdvisor()->getId()) {
            $foundAdvisor = $this->userRepo->findOneBy(['id' => $dmsOpenRepairOrder->getAdvisor()->getId(), 'role' => 'ROLE_SERVICE_ADVISOR']);
            if ($foundAdvisor) {
                return $foundAdvisor;
            }
        }

        //No id, search by name.
        $foundAdvisor = $this->userRepo->findOneBy([
            'firstName' => $dmsOpenRepairOrder->getAdvisor()->getFirstName(),
            'lastName' => $dmsOpenRepairOrder->getAdvisor()->getLastName(),
            'active' => 1,
            'role' => 'ROLE_SERVICE_ADVISOR',
        ]);
        if ($foundAdvisor) {
            return $foundAdvisor;
        }

        //If no advisor, set to defaultAdvisor.
        return $this->getUserRepo()->findOneBy(['active' => 1, 'role' => 'ROLE_PARTS_ADVISOR'], ['id' => 'ASC']);
    }

    /**
     * Tries to find a customer based on the phone number. If not, creates one based on name and email.
     */
    public function customerFinder(DMSResult $dmsOpenRepairOrder): ?Customer
    {
        dump('customerFinder');
        // No phone numbers passed, create new customer.
        /*
        * TODO This is weird logic. If there is no phone number, and it creates a customer based on name and email, it's possible for there to be duplicates.
        * TODO If there is no phone, it should check to see if that customer already exists, and then return that vs creating the same customer over and over if they don't
        * TODO Have a phone number.
        */
        //TODO CommitCustomer->validateParams()->email has a bug. If the email is blank, it says invalid email. Could be intentional.
        if (empty($dmsOpenRepairOrder->getCustomer()->getPhoneNumbers())) {
            dump('No PHone Number, ', $dmsOpenRepairOrder);

            return $this->customerHelper->commitCustomer(
                new Customer(),
                [
                    'name' => $dmsOpenRepairOrder->getCustomer()->getName(),
                    'email' => $dmsOpenRepairOrder->getCustomer()->getEmail(),
                ]
            );
        }

        //TODO PhoneNumberType might not be generic enough to work with all of the DMS's.
        // Check if the customer exists already
        /**
         * @var PhoneNumberType $phoneNumber
         */
        foreach ($dmsOpenRepairOrder->getCustomer()->getPhoneNumbers() as $phoneNumber) {
            // Try to find the customer
            // Check if the customer exists and use that one instead if so
            $customer = $this->customerRepo->findOneBy(['phone' => $phoneNumber->getDigits()]);
            //Found a customer so stop looping.
            if ($customer) {
                return $customer;
            }
        }

        // Still no customer, create a new one but only use a valid phone number
        //TODO PhoneNumberType might not be generic enough to work with all of the DMS's.
        // Check if the customer exists already
        // This method does not seem to be complete.
        /**
         * @var PhoneNumberType $phoneNumber
         */
        foreach ($dmsOpenRepairOrder->getCustomer()->getPhoneNumbers() as $phoneNumber) {
            // Try to validate the phone number
            try {
                // Phone is valid, use this one
                $phoneValid = true;

                // We want to skip validating the customer phone if production
                if ('prod' == $this->parameterBag->get('app_env')) {
                    $phoneValid = $this->twilioHelper->lookupNumber($phoneNumber);
                }

                if ($phoneValid) {
                    return $this->customerHelper->commitCustomer(
                        new Customer(), [
                            'phone' => $phoneNumber->getDigits(),
                            'name' => $dmsOpenRepairOrder->getCustomer()->getName(),
                            'email' => $dmsOpenRepairOrder->getCustomer()->getEmail(),
                        ]
                    );
                }
            } catch (\Exception $e) {
                // Nothing for now
                continue;
            }
        }

        // STILL no customer, just used the first number we got
        $phoneNumber = $dmsOpenRepairOrder->getCustomer()->getPhoneNumbers()[0];

        return $this->customerHelper->commitCustomer(
            new Customer(),
            [
                'phone' => $phoneNumber->getDigits(),
                'name' => $dmsOpenRepairOrder->getCustomer()->getName(),
                'email' => $dmsOpenRepairOrder->getCustomer()->getEmail(),
            ]
        );
    }

    public function getTwilioHelper(): TwilioHelper
    {
        return $this->twilioHelper;
    }

    public function setTwilioHelper(TwilioHelper $twilioHelper): void
    {
        $this->twilioHelper = $twilioHelper;
    }

    public function getCustomerHelper(): CustomerHelper
    {
        return $this->customerHelper;
    }

    public function setCustomerHelper(CustomerHelper $customerHelper): void
    {
        $this->customerHelper = $customerHelper;
    }

    public function getEm(): EntityManagerInterface
    {
        return $this->em;
    }

    public function setEm(EntityManagerInterface $em): void
    {
        $this->em = $em;
    }

    public function getShortUrlHelper(): ShortUrlHelper
    {
        return $this->shortUrlHelper;
    }

    public function setShortUrlHelper(ShortUrlHelper $shortUrlHelper): void
    {
        $this->shortUrlHelper = $shortUrlHelper;
    }

    public function getSettingsHelper(): SettingsHelper
    {
        return $this->settingsHelper;
    }

    public function setSettingsHelper(SettingsHelper $settingsHelper): void
    {
        $this->settingsHelper = $settingsHelper;
    }

    public function getRepairOrderHelper(): RepairOrderHelper
    {
        return $this->repairOrderHelper;
    }

    public function setRepairOrderHelper(RepairOrderHelper $repairOrderHelper): void
    {
        $this->repairOrderHelper = $repairOrderHelper;
    }

    public function getParameterBag(): ParameterBagInterface
    {
        return $this->parameterBag;
    }

    public function setParameterBag(ParameterBagInterface $parameterBag): void
    {
        $this->parameterBag = $parameterBag;
    }

    /**
     * @return \App\Repository\CustomerRepository|\Doctrine\Persistence\ObjectRepository
     */
    public function getCustomerRepo()
    {
        return $this->customerRepo;
    }

    /**
     * @param \App\Repository\CustomerRepository|\Doctrine\Persistence\ObjectRepository $customerRepo
     */
    public function setCustomerRepo($customerRepo): void
    {
        $this->customerRepo = $customerRepo;
    }

    /**
     * @return \App\Repository\RepairOrderRepository|\Doctrine\Persistence\ObjectRepository
     */
    public function getRepairOrderRepo()
    {
        return $this->repairOrderRepo;
    }

    /**
     * @param \App\Repository\RepairOrderRepository|\Doctrine\Persistence\ObjectRepository $repairOrderRepo
     */
    public function setRepairOrderRepo($repairOrderRepo): void
    {
        $this->repairOrderRepo = $repairOrderRepo;
    }

    /**
     * @return \App\Repository\UserRepository|\Doctrine\Persistence\ObjectRepository
     */
    public function getUserRepo()
    {
        return $this->userRepo;
    }

    /**
     * @param \App\Repository\UserRepository|\Doctrine\Persistence\ObjectRepository $userRepo
     */
    public function setUserRepo($userRepo): void
    {
        $this->userRepo = $userRepo;
    }

    public function getCustomerURL(): ?string
    {
        return $this->customerURL;
    }

    public function setCustomerURL(?string $customerURL): void
    {
        $this->customerURL = $customerURL;
    }

    public function getDmsFilter(): ?string
    {
        return $this->dmsFilter;
    }

    public function setDmsFilter(?string $dmsFilter): void
    {
        $this->dmsFilter = $dmsFilter;
    }

    public function isActivateIntegrationSms(): bool
    {
        return $this->activateIntegrationSms;
    }

    public function setActivateIntegrationSms(bool $activateIntegrationSms): void
    {
        $this->activateIntegrationSms = $activateIntegrationSms;
    }

    /**
     * @return AutoMateClient|CDKClient|DealerBuiltClient|DealerTrackClient|bool
     */
    public function getIntegration()
    {
        return $this->integration;
    }

    /**
     * @param AutoMateClient|CDKClient|DealerBuiltClient|DealerTrackClient|bool $integration
     */
    public function setIntegration($integration): void
    {
        $this->integration = $integration;
    }

    public function getServiceLocator(): ServiceLocator
    {
        return $this->serviceLocator;
    }

    public function setServiceLocator(ServiceLocator $serviceLocator): void
    {
        $this->serviceLocator = $serviceLocator;
    }
}

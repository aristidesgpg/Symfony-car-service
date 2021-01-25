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
use Doctrine\ORM\EntityManagerInterface;
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

        $defaultTechnician = $this->getUserRepo()->findOneBy(['active' => 1, 'role' => 'ROLE_TECHNICIAN'], ['id' => 'ASC']);
        $defaultAdvisor = $this->getUserRepo()->findOneBy(['active' => 1, 'role' => 'ROLE_PARTS_ADVISOR'], ['id' => 'ASC']);
        $dmsOpenRepairOrders = $this->integration->getOpenRepairOrders();
        // Loop over found repair orders
        /**
         * @var DMSResult $dmsOpenRepairOrder
         */
        foreach ($dmsOpenRepairOrders as $dmsOpenRepairOrder) {
            // First check if it exists already
            $repairOrderExists = $this->repairOrderRepo->findOneBy(['number' => $dmsOpenRepairOrder->getNumber()]);
            if ($repairOrderExists) {
                continue;
            }
            $customer = null;
            $advisor = null;
            $phoneNumbers = $dmsOpenRepairOrder->getCustomer()->getPhoneNumbers();
            $name = $dmsOpenRepairOrder->getCustomer()->getName();
            $email = $dmsOpenRepairOrder->getCustomer()->getEmail();
            $dmsAdvisorId = $dmsOpenRepairOrder->getAdvisor()->getId();
            $advisorFirstName = $dmsOpenRepairOrder->getAdvisor()->getFirstName();
            $advisorLastName = $dmsOpenRepairOrder->getAdvisor()->getLastName();
            //$roKey            = isset($dmsOpenRepairOrder->roKey) ? $dmsOpenRepairOrder->roKey : null;
            $roKey = $dmsOpenRepairOrder->getRoKey();

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
                        if ('prod' == $this->parameterBag->get('app_env')) {
                            $phoneValid = $this->twilioHelper->lookupNumber($phoneNumber);
                        }

                        if ($phoneValid) {
                            $customer = new Customer();
                            $newCustomer = $this->customerHelper->commitCustomer($customer, ['phone' => $phoneNumber, 'name' => $name, 'email' => $email]);

                            dump($newCustomer);
                            exit;
                        }
                        break;
                    } catch (Exception $e) {
                        // Nothing for now
                        continue;
                    }
                }
            }
        }
        dd($dmsOpenRepairOrders);
    }

    public function getDms(): DMSClientInterface
    {
        return $this->dms;
    }

    public function setDms(DMSClientInterface $dms): void
    {
        $this->dms = $dms;
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

<?php

namespace App\Service\DMS;

use App\Entity\Customer;
use App\Entity\DMSResult;
use App\Entity\DMSResultTechnician;
use App\Entity\OperationCode;
use App\Entity\Part;
use App\Entity\RepairOrder;
use App\Entity\Settings;
use App\Entity\User;
use App\Service\CustomerHelper;
use App\Service\PhoneValidator;
use App\Service\ROLinkHashHelper;
use App\Service\SettingsHelper;
use App\Service\ShortUrlHelper;
use App\Service\TwilioHelper;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\DependencyInjection\ServiceLocator;

/**
 * Class DMS.
 */
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
     * @var ParameterBagInterface
     */
    private $parameterBag;

    /**
     * @var \App\Repository\CustomerRepository|\Doctrine\Persistence\ObjectRepository
     */
    private $customerRepo;
    /**
     * @var \App\Repository\RepairOrderRepository|\Doctrine\Persistence\ObjectRepository
     */
    private $repairOrderRepo;
    /**
     * @var \App\Repository\UserRepository|\Doctrine\Persistence\ObjectRepository
     */
    private $userRepo;

    /**
     * @var string|null
     */
    private $customerURL;
    /**
     * @var string|null
     */
    private $dmsFilter;

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
    /**
     * @var string|null
     */
    private $activeDMS;
    /**
     * @var PhoneValidator
     */
    private $phoneValidator;

    /**
     * @var ROLinkHashHelper
     */
    private $ROLinkHashHelper;

    public function __construct(ServiceLocator $serviceLocator,
                                TwilioHelper $twilioHelper,
                                CustomerHelper $customerHelper,
                                EntityManagerInterface $em,
                                ShortUrlHelper $shortUrlHelper,
                                SettingsHelper $settingsHelper,
                                ROLinkHashHelper $ROLinkHashHelper,
                                ParameterBagInterface $parameterBag,
                                PhoneValidator $phoneValidator)
    {
        $this->serviceLocator = $serviceLocator;
        $this->twilioHelper = $twilioHelper;
        $this->customerHelper = $customerHelper;
        $this->em = $em;
        $this->shortUrlHelper = $shortUrlHelper;
        $this->settingsHelper = $settingsHelper;
        $this->ROLinkHashHelper = $ROLinkHashHelper;
        $this->parameterBag = $parameterBag;

        $this->customerRepo = $em->getRepository(Customer::class);
        $this->repairOrderRepo = $em->getRepository(RepairOrder::class);
        $this->userRepo = $em->getRepository(User::class);

        $this->customerURL = $this->settingsHelper->getSetting('customerURL');
        $this->dmsFilter = $this->settingsHelper->getSetting('dmsFilter');
        $this->activateIntegrationSms = $this->settingsHelper->getSetting('activateIntegrationSms');

        //TODO This needs to be revisited after the SettingsHelper branch is merged into master.
        $this->activeDMS = $em->getRepository(Settings::class)->findActiveDms();
        if (!empty($this->activeDMS) && $this->getServiceLocator()->has($this->activeDMS)) {
            $this->integration = $this->getServiceLocator()->get($this->activeDMS);
        }
        $this->phoneValidator = $phoneValidator;
    }

    public function addOpenRepairOrders(): ?array
    {
        // Not integrated, do nothing
        if (!$this->integration) {
            return null;
        }

        $dmsOpenRepairOrders = $this->integration->getOpenRepairOrders();
        // Loop over found repair orders
        /**
         * @var DMSResult $dmsOpenRepairOrder
         */
        foreach ($dmsOpenRepairOrders as $dmsOpenRepairOrder) {
            $this->processRepairOrder($dmsOpenRepairOrder);
        }

        return $dmsOpenRepairOrders;
    }

    /**
     * Get's a single RO and adds it to the system.
     *
     * @param $RONumber
     *
     * @throws exception
     */
    public function addSingleRepairOrder($RONumber): bool
    {
        $dmsRepairOrder = $this->getRepairOrderByNumber($RONumber);

        $repairOrderExists = $this->repairOrderRepo->findOneBy(['number' => $dmsRepairOrder->getNumber()]);
        if ($repairOrderExists) {
            throw new Exception('This RO is already in the system');
        }
        $this->processRepairOrder($dmsRepairOrder);

        return true;
    }

    /**
     * Get a single RO Number.
     *
     * @throws Exception
     */
    public function getRepairOrderByNumber(string $RONumber): DMSResult
    {
        if (!$this->integration) {
            throw new Exception('You are not integrated with a DMS');
        }

        if (!method_exists($this->integration, 'getRepairOrderByNumber')) {
            throw new Exception("Your DMS hasn't been set up to pull individual repair orders");
        }

        $dmsRepairOrder = $this->integration->getRepairOrderByNumber($RONumber);
        if (!$dmsRepairOrder) {
            throw new Exception('We were unable to find that Repair Order in your DMS');
        }

        return $dmsRepairOrder;
    }

    public function processRepairOrder(DMSResult $dmsRepairOrder)
    {
        // First check if it exists already
        $repairOrderExists = $this->repairOrderRepo->findOneBy(['number' => $dmsRepairOrder->getNumber()]);
        if ($repairOrderExists) {
            return;
        }

        //If there is a filter, check against it and move along if it matched
        $filter = $this->getDmsFilter();
        if ('false' != $filter && false != $filter) {
            if (0 === strncmp($dmsRepairOrder->getNumber(), $filter, strlen($filter))) {
                return;
            }
        }

        // Must be opened in the past 5 days
        $date = $dmsRepairOrder->getDate();
        $openTimestamp = $date->getTimestamp();
        $fiveDaysAgo = (new DateTime())->modify('-5 days')->getTimestamp();

        if ($fiveDaysAgo > $openTimestamp) {
            return;
        }

        //TODO: The customerFinder() logic needs revisited.
        $customer = $this->customerFinder($dmsRepairOrder);
        //returns default advisor if one is not found.
        $advisor = $this->advisorFinder($dmsRepairOrder);

        $repairOrder = $this->persistRepairOrder($dmsRepairOrder, $customer, $advisor);

        // No number, don't text them. Move to next RO
        if (!$customer->getPhone()) {
            return;
        }

        // Throws an error if it's not a mobile number
        //TODO, we are validating this upstream. Possibly redundant.
        try {
            $this->phoneValidator->isMobile($customer->getPhone());
        } catch (Exception $e) {
            return;
        }

        //text customer.
        try {
            if ('prod' == $this->parameterBag->get('app_env')) {
                $this->sendCommunicationToCustomer($repairOrder, $customer);
            }
        } catch (Exception $e) {
        }
    }

    /**
     * @param $dmsTechnician
     *
     * @return User|object|null
     */
    public function technicianFinder(DMSResultTechnician $dmsTechnician)
    {
        //$defaultTechnician = $this->userRepo->findBy(['active' => 1, 'role' => 'ROLE_TECHNICIAN'], ['id' => 'ASC'])[0];
        //search technician by id.
        if ($dmsTechnician->getId()) {
            $technicianRecord = $this->userRepo->findOneBy(['dmsId' => $dmsTechnician->getId(), 'role' => 'ROLE_TECHNICIAN']);
            if ($technicianRecord) {
                return $technicianRecord;
            }
        }

        $technicianRecord = $this->getEm()->getRepository('App:User')
            ->findOneBy(['firstName' => $dmsTechnician->getFirstName(), 'lastName' => $dmsTechnician->getLastName()]);

        return $technicianRecord;
    }

    public function persistRepairOrder(DMSResult $dmsResult, Customer $customer, User $advisor): RepairOrder
    {
        $defaultTechnician = $this->technicianFinder($dmsResult->getTechnician());

        $repairOrder = (new RepairOrder())
            ->setPrimaryCustomer($customer)
            ->setPrimaryTechnician($defaultTechnician)
            ->setPrimaryAdvisor($advisor)
            ->setNumber($dmsResult->getNumber())
            ->setDmsKey($dmsResult->getRoKey())
            ->setStartValue($dmsResult->getInitialROValue())
            ->setDateCreated($dmsResult->getDate())
            ->setWaiter($dmsResult->getWaiter())
            ->setPickupDate($dmsResult->getPickupDate())
            ->setYear($dmsResult->getYear())
            ->setMake($dmsResult->getMake())
            ->setModel($dmsResult->getModel())
            ->setMiles($dmsResult->getMiles())
            ->setVin($dmsResult->getVin())
            ->setInternal(0)
            ->setLinkHash($this->ROLinkHashHelper->generate($dmsResult->getDate()->format('c')))
            ->setStartValue($dmsResult->getInitialROValue());

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
     * Close a single RepairOrder.
     */
    public function closeOpenRepairOrder(RepairOrder $repairOrder)
    {
        // Not integrated, do nothing
        if (!$this->integration) {
            return null;
        }
        //TODO This should be refactored to close an individual instead of passing an array.
        $openRepairOrders[] = $repairOrder;
        try {
            $this->integration->getClosedRoDetails($openRepairOrders);
        } catch (Exception $e) {
            //do nothing.
        }
    }

    /**
     * Find currently open ROs and see if they've been closed in the DMS.
     */
    public function closeOpenRepairOrders()
    {
        // Not integrated, do nothing
        if (!$this->integration) {
            return null;
        }

        // Get open repair orders
        $openRepairOrders = $this->repairOrderRepo->getOpenRepairOrders();

        if ($openRepairOrders) {
            try {
                $this->integration->getClosedRoDetails($openRepairOrders);
            } catch (Exception $e) {
                //do nothing.
            }
        }
    }

    /**
     * @throws Exception
     */
    public function sendCommunicationToCustomer(RepairOrder $repairOrder, Customer $customer)
    {
        if ($this->settingsHelper->getSetting('waiverEstimateText') && $this->settingsHelper->getSetting('waiverActivateAuthMessage')) {
            $introMessage = sprintf(
                'Welcome to %s. Click the link below to begin your visit. ',
                $this->settingsHelper->getSetting('generalName')
            );

            if ($this->settingsHelper->getSetting('waiverIntroText')) {
                $introMessage = $this->settingsHelper->getSetting('waiverIntroText').' ';
            }

            $textLink = $this->customerURL.$repairOrder->getLinkHash().'/repair-waiver';
            $textLink = $this->shortUrlHelper->generateShortUrl($textLink);

            $introMessage = $introMessage.$textLink;
            if ($this->activateIntegrationSms) {
                $this->twilioHelper->sendSms($customer, $introMessage);
            }
        } else {
            $introMessage = '
                    For updates on your vehicle, please reply to this number. Your video inspection will be sent to you soon.
                ';

            if ($this->settingsHelper->getSetting('serviceTextIntro')) {
                $introMessage = $this->settingsHelper->getSetting('serviceTextIntro');
            }

            if ($this->activateIntegrationSms) {
                $this->twilioHelper->sendSms($customer, $introMessage);
            }
        }
    }

    /**
     * Tries to find an advisor.
     */
    public function advisorFinder(DMSResult $dmsOpenRepairOrder): ?User
    {
        //search advisor by id.
        if ($dmsOpenRepairOrder->getAdvisor()->getId()) {
            $foundAdvisor = $this->userRepo->findOneBy(['dmsId' => $dmsOpenRepairOrder->getAdvisor()->getId(), 'role' => 'ROLE_SERVICE_ADVISOR']);
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
        return $this->getUserRepo()->findOneBy(['active' => 1, 'role' => 'ROLE_SERVICE_ADVISOR'], ['id' => 'ASC']);
    }

    /**
     * Tries to find a customer based on the phone number. If not, creates one based on name and email.
     */
    public function customerFinder(DMSResult $dmsOpenRepairOrder): ?Customer
    {
        // No phone numbers passed, create new customer.
        /*
        * TODO This is weird logic. If there is no phone number, and it creates a customer based on name and email, it's possible for there to be duplicates.
        *      If there is no phone, it should check to see if that customer already exists, and then return that vs creating the same customer over and over if they don't
        *      Have a phone number.
        */
        //TODO CommitCustomer->validateParams()->email has a bug. If the email is blank, it says invalid email. Could be intentional.
        if (empty($dmsOpenRepairOrder->getCustomer()->getPhoneNumbers())) {
            return $this->customerHelper->commitCustomer(
                new Customer(),
                [
                    'name' => $dmsOpenRepairOrder->getCustomer()->getName(),
                    'email' => $dmsOpenRepairOrder->getCustomer()->getEmail(),
                ]
            );
        }

        // Check if the customer exists already
        $customer = $this->customerRepo->findOneBy(['phone' => $dmsOpenRepairOrder->getCustomer()->getPhoneNumbers()]);
        //Found a customer.
        if ($customer) {
            return $customer;
        }

        // Still no customer, create a new one but only use a valid phone number
        // Try to validate the phone number -> The phone number is validated when creating the initial RO.
        // TODO Should we move this validation to the phoneNormalizer function?
        try {
            // Phone is valid, use this one
            $phoneValid = true;

            // We want to skip validating the customer phone if production
            if ('prod' == $this->parameterBag->get('app_env')) {
                $phoneValid = $this->phoneValidator->isMobile($dmsOpenRepairOrder->getCustomer()->getPhoneNumbers());
            }

            if ($phoneValid) {
                return $this->customerHelper->commitCustomer(
                        new Customer(), [
                            'phone' => $dmsOpenRepairOrder->getCustomer()->getPhoneNumbers(),
                            'name' => $dmsOpenRepairOrder->getCustomer()->getName(),
                            'email' => $dmsOpenRepairOrder->getCustomer()->getEmail(),
                        ]
                    );
            }
        } catch (Exception $e) {
            // Nothing for now
        }

        // STILL no customer, just use the first number we got
        $phoneNumber = $dmsOpenRepairOrder->getCustomer()->getPhoneNumbers();

        return $this->customerHelper->commitCustomer(
            new Customer(),
            [
                'phone' => $phoneNumber->getDigits(),
                'name' => $dmsOpenRepairOrder->getCustomer()->getName(),
                'email' => $dmsOpenRepairOrder->getCustomer()->getEmail(),
            ]
        );
    }

    public function getParts()
    {
        // Not integrated, do nothing
        if (!$this->integration) {
            return null;
        }

        $dmsParts = $this->integration->getParts();

        if (sizeof($dmsParts) > 0) {
            try {
                $result = $this->getEm()->getConnection()->executeStatement(
                    'truncate table part'
                );
            } catch (\Doctrine\DBAL\Exception $e) {
                //do nothing.
            }
        }

//        // Loop over found parts
//        /**
//         * @var Part $dmsPart
//         */
//        foreach ($dmsParts as $dmsPart) {
//            $this->upsertPart($dmsPart);
//         }

        $batchSize = 200;
        for ($i = 0; $i < sizeof($dmsParts); ++$i) {
            $dmsPart = $dmsParts[$i];
            $this->getEm()->persist($dmsPart);
            if (($i % $batchSize) === 0) {
                $this->getEm()->flush();
                $this->getEm()->clear(); // Detaches all objects from Doctrine!
            }
        }
        $this->getEm()->flush(); //Persist objects that did not make up an entire batch
        $this->getEm()->clear();

        return $dmsParts;
    }

    public function upsertPart(Part $part)
    {
        $entityPart = $this->getEm()->getRepository(Part::class)->findOneBy(['number' => $part->getNumber()]);
        if (!$entityPart) {
            $entityPart = $part;
        }
        $entityPart->setAvailable($part->getAvailable());
        $this->getEm()->persist($entityPart);
        $this->getEm()->flush();
    }

    public function getOperationCodes()
    {
        // Not integrated, do nothing
        if (!$this->integration) {
            return null;
        }

        $operationCodes = $this->integration->getOperationCodes();
        if (sizeof($operationCodes) > 0) {
            try {
                $result = $this->getEm()->getConnection()->executeStatement(
                    "delete from operation_code where code <> 'MISC'"
                );
            } catch (\Doctrine\DBAL\Exception $e) {
                //do nothing.
            }
        }

//        // Loop over found Operation Codes
//        /**
//         * @var OperationCode $operationCode
//         */
//        foreach ($operationCodes as $operationCode) {
//            $this->upsertOperationCode($operationCode);
//        }

        $batchSize = 200;
        for ($i = 0; $i < sizeof($operationCodes); ++$i) {
            $operationCode = $operationCodes[$i];
            $this->getEm()->persist($operationCode);
            if (($i % $batchSize) === 0) {
                $this->getEm()->flush();
                $this->getEm()->clear(); // Detaches all objects from Doctrine!
            }
        }
        $this->getEm()->flush(); //Persist objects that did not make up an entire batch
        $this->getEm()->clear();

        return $operationCodes;
    }

    public function upsertOperationCode(OperationCode $operationCode)
    {
        $entityPart = $this->getEm()->getRepository(OperationCode::class)->findOneBy(['code' => $operationCode->getCode()]);
        if (!$entityPart) {
            $entityPart = $operationCode;
        }
        //Add any updates here.
        $this->getEm()->persist($entityPart);
        $this->getEm()->flush();
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

    public function getActiveDMS(): ?string
    {
        return $this->activeDMS;
    }

    /**
     * @param string|null $activeDMS
     */
    public function setActiveDMS($activeDMS): void
    {
        $this->activeDMS = $activeDMS;
    }
}

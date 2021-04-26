<?php

namespace App\Service;

use App\Entity\RepairOrderMPI;
use App\Entity\RepairOrderMPIInteraction;
use App\Helper\FalsyTrait;
use App\Helper\iServiceLoggerTrait;
use App\Repository\CustomerRepository;
use App\Repository\RepairOrderRepository;
use App\Repository\UserRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Security\Core\Security;

class RepairOrderMPIHelper
{
    use iServiceLoggerTrait;
    use FalsyTrait;

    private $em;
    private $repo;
    private $customers;
    private $users;
    private $customerHelper;
    private $settingsHelper;
    private $parameterBag;
    private $shortUrlHelper;
    private $user;
    private $twilioHelper;

    public function __construct(
        EntityManagerInterface $em,
        RepairOrderRepository $repo,
        CustomerRepository $customers,
        UserRepository $users,
        CustomerHelper $customerHelper,
        SettingsHelper $settingsHelper,
        ParameterBagInterface $parameterBag,
        ShortUrlHelper $shortUrlHelper,
        Security $security,
        TwilioHelper $twilioHelper
    ) {
        $this->em = $em;
        $this->repo = $repo;
        $this->customers = $customers;
        $this->users = $users;
        $this->customerHelper = $customerHelper;
        $this->settingsHelper = $settingsHelper;
        $this->parameterBag = $parameterBag;
        $this->shortUrlHelper = $shortUrlHelper;
        $this->user = $security->getUser();
        $this->twilioHelper = $twilioHelper;
    }

    /**
     * Validates and cleans input string json.
     * Returns a JSON string that adds 'text' to each item if successful.
     */
    public function validateMPIResultsJSON(string $results)
    {
        $results = json_decode($results);
        if (!$results) {
            throw new BadRequestHttpException('Error in results parameter. Invalid JSON.');
        }

        // Now validate content of the results
        if (!isset($results->name)) {
            throw new BadRequestHttpException('Error in results parameter. Missing Template name.');
        }

        if (!isset($results->results) || !is_array($results->results) || count($results->results) === 0) {
            throw new BadRequestHttpException('Error in results parameter. Missing or invalid results.');
        }

        $mpiGroups = $results->results;
        foreach ($mpiGroups as $groupKey => $mpiGroup) {
            if (!isset($mpiGroup->group) || !isset($mpiGroup->items)) {
                throw new BadRequestHttpException(
                    'Error in results parameter. Missing group name or group items in group '.$groupKey
                );
            }

            $items = $mpiGroup->items;
            foreach ($items as $itemKey => $item) {
                // Name value special status, if special true, value required
                if (!isset($item->name) || !isset($item->special) || !isset($item->status)) {
                    throw new BadRequestHttpException(
                        'Error in results parameter. Missing item name, special, or status in group '.$groupKey.' item '.$itemKey
                    );
                }

                // If special, we need the value
                if ($item->special && !isset($item->value)) {
                    throw new BadRequestHttpException(
                        'Error in results parameter. Missing item value when special=true in group '.$groupKey.' item '.$itemKey
                    );
                }
            }
        }

        foreach ($results->results as $index => $group) {
            $items = $group->items;
            foreach ($items as $key => $item) {
                if ($group->group == 'Brakes') {
                    $item->text = $item->value.' / 10 - '.$item->name;
                    continue;
                }

                if ($group->group == 'Tires') {
                    $item->text = $item->value.' / 32 - '.$item->name;
                    continue;
                }

                $item->text = $item->name;
            }
        }

        return json_encode($results);
    }

    public function sendMPI(RepairOrderMPI $repairOrderMPI)
    {
        $repairOrder = $repairOrderMPI->getRepairOrder();
        $dealer = $this->settingsHelper->getSetting('generalName');
        $customer = $repairOrderMPI->getRepairOrder()->getPrimaryCustomer();
        $message = 'Your Multi Point Inspection Report is ready from '.$dealer;
        $customerURL = $this->parameterBag->get('customer_url');
        $url = $customerURL.$repairOrder->getLinkHash();
        $shortURL = $this->shortUrlHelper->generateShortUrl($url);
        $message = $message.' '.$shortURL;

        // Only send sms if setting mpiSendToCustomer => TRUE
        if($this->settingsHelper->getSetting('mpiSendToCustomer'))
        {
            try {
                $this->twilioHelper->sendSms($customer, $message);
            } catch (Exception $e) {
                return;
            }
        }

        $interaction = new RepairOrderMPIInteraction();
        $interaction->setRepairOrderMPI($repairOrderMPI)
                    ->setType('Sent')
                    ->setUser($this->user);
        $repairOrderMPI->setStatus('Sent')
                       ->addRepairOrderMPIInteraction($interaction)
                       ->setDateSent(new DateTime());

        $this->em->persist($repairOrderMPI);
        $this->em->flush();
    }
}

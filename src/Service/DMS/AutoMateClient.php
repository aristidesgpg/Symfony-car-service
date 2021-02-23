<?php

namespace App\Service\DMS;

use App\Entity\DMSResult;
use App\Entity\RepairOrder;
use App\Service\PhoneValidator;
use App\Service\ThirdPartyAPILogHelper;
use App\Soap\automate\src\AuthenticationTokenType;
use App\Soap\automate\src\AutomateEnvelope;
use App\Soap\automate\src\AutomateFakeBodyType;
use App\Soap\automate\src\ProcessEvent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class AutoMateClient.
 */
class AutoMateClient extends AbstractDMSClient
{
    /**
     * @var string
     */
    private $wsdl = 'https://openmate.automate-webservices.com/OpenMateGateway/ProcessEventService?wsdl';

    /**
     * @var int
     */
    private $username = '136';

    /**
     * @var string
     */
    private $password = 'k(iabvS8en5K';

    /**
     * @var int
     */
    private $endpointID;

    /**
     * @var ProcessEvent
     */
    private $processEvent;

    public function __construct(EntityManagerInterface $entityManager, PhoneValidator $phoneValidator, ParameterBagInterface $parameterBag, ThirdPartyAPILogHelper $thirdPartyAPILogHelper)
    {
        parent::__construct($entityManager, $phoneValidator, $parameterBag, $thirdPartyAPILogHelper);

        $this->endpointID = $parameterBag->get('automate_endpoint_id');
        // Use staging credentials if in dev environment
        if ('dev' == $parameterBag->get('app_env')) {
            $this->wsdl = 'https://openmate-preprod.automate-webservices.com/OpenMateGateway/ProcessEventService?wsdl';
            $this->username = '1334';
            $this->password = '3tdVAR6nPH^d';
        }

        $this->init();
    }

    /**
     * The ProcessEvent SOAP call is duplicated except for the EventType and the Payload.
     */
    public function init(): void
    {
        $this->buildSerializer('../src/Soap/automate/metadata', 'App\Soap\automate\src');
        $this->initializeSoapClient($this->getWsdl());

        //Class specific init.
        $processEvent = (new ProcessEvent())
            ->setAuthenticationToken(
                (new AuthenticationTokenType())
                    ->setUserName($this->getUsername())
                    ->setPassword($this->getPassword())
            )
            ->setSourceThirdPartyId($this->getUsername())
            ->setDealerEndpointId($this->getEndpointID())
            ->setPayloadVersion('STAR-5.5.4');
        $this->setProcessEvent($processEvent);
    }

    /**
     * Returns all current open repair orders.
     */
    public function getOpenRepairOrders(): array
    {
        $repairOrders = [];

        if ($this->getSoapClient()) {
            //Build the soap call
            $this->getProcessEvent()
                ->setEventType('GetRepairOrderKeys')
                ->setPayload('<ExtractRequest><targets><target status="OPEN"/></targets></ExtractRequest>');

            //Get the keys of open repair orders.
            $targetNodes = $this->getRepairOrderKeys($this->getProcessEvent());
            //No open repair orders.
            if (empty($targetNodes)) {
                return $repairOrders;
            }

            $chunks = array_chunk($targetNodes, 50);
            foreach ($chunks as $chunk) {
                //Convert back to a string to send in the payload.
                $xml = implode('', $chunk);

                $this->getProcessEvent()
                    ->setEventType('GetRepairOrders')
                    ->setPayload('<ExtractRequest><targets>'.$xml.'</targets></ExtractRequest>');

                $result = $this->sendSoapCall('processEvent', $this->buildEventForSoap($this->getProcessEvent()), true);

                $response = $this->deserializeSOAPResponse($result)->getResponse();

                if (!$response) {
                    continue;
                }

                //Since this is returned as a malformed array of xml nodes, to deserialize it, add a fake body.
                $rootNode = '<?xml version="1.0" ?><body>'.$response.'</body>';
                $deserializedNodes = $this->getSerializer()->deserialize($rootNode, AutomateFakeBodyType::class, 'xml');
                foreach ($deserializedNodes->getRepairOrder() as $repairOrder) {
                    $parsed = $this->parseRepairOrderNode($repairOrder);
                    if ($parsed) {
                        $repairOrders[] = $parsed;
                    }
                }
            }
        }

        return $repairOrders;
    }

    /**
     * Parses the returned SOAP response and pulls out the relevant information.
     *
     * @return DMSResult|null
     */
    public function parseRepairOrderNode(\App\Soap\automate\src\RepairOrder $repairOrder): ?DMSResult
    {
        //This assumes that there cannot be other job types besides internal on an internal job.
        foreach ($repairOrder->getJob() as $job) {
            if ('INTERNAL' == $job->getJobTypeString()) {
                return null;
            }
        }

        $dmsResult = new DMSResult();
        $dmsResult->setRaw($repairOrder);

        //Local vars, Make things easier to read
        $ownerParty = $repairOrder->getRepairOrderHeader()->getOwnerParty();

        if ($ownerParty) {
            //Check for a person.
            if ($ownerParty->getSpecifiedPerson()) {
                $specifiedPerson = $ownerParty->getSpecifiedPerson();
                // Name
                $dmsResult->getCustomer()->setName(trim(sprintf('%s %s', $specifiedPerson->getGivenName(), $specifiedPerson->getFamilyName())));

                //phone number
                if ($specifiedPerson->getTelephoneCommunication()) {
                    $dmsResult->getCustomer()->setPhoneNumbers(
                        $this->phoneNormalizer($specifiedPerson->getTelephoneCommunication()->getCompleteNumber())
                    );
                }
            }

            //Check for organization.
            if ($ownerParty->getSpecifiedOrganization()) {
                $specifiedOrganization = $ownerParty->getSpecifiedOrganization();

                if (!$dmsResult->getCustomer()->getName()) {
                    $dmsResult->getCustomer()->setName($specifiedOrganization->getCompanyName());
                }

                //No person phone, see if there is an organization phone.
                if ($specifiedOrganization->getPrimaryContact() && !$dmsResult->getCustomer()->getPhoneNumbers()) {
                    $dmsResult->getCustomer()->setPhoneNumbers(
                        $this->phoneNormalizer($specifiedOrganization->getPrimaryContact()->getTelephoneCommunication()->getCompleteNumber())
                    );
                }
            }

            // Still no phone number, just skip
            if (!$dmsResult->getCustomer()->getPhoneNumbers()) {
                return null;
            }

            //Email is not used.

            //Vehicle Details
            $vehicle = $repairOrder->getRepairOrderHeader()->getRepairOrderVehicleLineItem()->getVehicle();
            if ($vehicle) {
                $dmsResult->setYear($vehicle->getModelYear());
                $dmsResult->setMake($vehicle->getManufacturerName());
                $dmsResult->setModel($vehicle->getModel());
                $dmsResult->setVin($vehicle->getVehicleID());
            }
            $dmsResult->setMiles($repairOrder->getRepairOrderHeader()->getInDistanceMeasure()->value());

            $dmsResult->getAdvisor()->setFirstName($repairOrder->getRepairOrderHeader()->getServiceAdvisorParty()->getSpecifiedPerson()->getGivenName());
            $dmsResult->getAdvisor()->setLastName($repairOrder->getRepairOrderHeader()->getServiceAdvisorParty()->getSpecifiedPerson()->getFamilyName());

            $dmsResult->setNumber($repairOrder->getRepairOrderHeader()->getDocumentIdentificationGroup()->getAlternateDocumentIdentification()->getDocumentID());

            try {
                $dmsResult->setDate(new \DateTime($repairOrder->getRepairOrderHeader()->getDealerParty()->getAlternatePartyDocument()->getEffectivePeriod()->getStartDateTime()));
            } catch (\Exception $e) {
                //Can't parse date.
            }

            //waiter
            $dmsResult->setWaiter(false);
            if ('WAITER' == $repairOrder->getRepairOrderHeader()->getRepairOrderPriorityCode()) {
                $dmsResult->setWaiter(true);
            }

            //pickup date
            foreach ($repairOrder->getRepairOrderHeader()->getRepairOrderStatus() as $status) {
                if (false !== strpos($status->getStatusText(), 'PICKUP_DATE')) {
                    try {
                        $dmsResult->setPickupDate(new \DateTime(explode('=', $status->getStatusText())[1]));
                    } catch (\Exception $e) {
                        // nothing
                    }
                }
            }

            if ($repairOrder->getRepairOrderHeader()->getDocumentIdentification()) {
                $dmsResult->setRoKey($repairOrder->getRepairOrderHeader()->getDocumentIdentification()->getDocumentID());
            } else {
                $dmsResult->setRoKey($repairOrder->getRepairOrderHeader()->getDocumentIdentificationGroup()->getDocumentIdentification()->getDocumentID());
            }

            $initialRoValue = 0;
            //TODO Nested for loop. Revisit
            foreach ($repairOrder->getJob() as $job) {
                if (!$job->getPricing()) {
                    continue;
                }

                foreach ($job->getPricing()->getPrice() as $price) {
                    $initialRoValue += $price->getChargeAmount()->value();
                }
            }
            $dmsResult->setInitialROValue($initialRoValue);

            return $dmsResult;
        }

        return null;
    }

    public function getRepairOrderKeys(ProcessEvent $processEvent): array
    {
        $result = $this->sendSoapCall('processEvent', $this->buildEventForSoap($processEvent), true);

        //Deserialize the soap result into objects.
        $response = $this->deserializeSOAPResponse($result)->getResponse();
        if (!$response) {
            return [];
        }

        //Since the payload needs to be xml, we don't need to deserialize the response, but break the nodes into chunks of 50.
        $crawler = new Crawler($response);

        return $crawler->filterXPath('//ExtractRequest/targets')->children()->each(
            function (Crawler $node, $i) {
                return $node->outerHtml();
            }
        );
    }

    /**
     * @param $result
     *
     * @return mixed
     */
    public function deserializeSOAPResponse($result)
    {
        $deserialized = $this->getSerializer()->deserialize($result, AutomateEnvelope::class, 'xml');
        $processEventResultType = $deserialized->getBody()->getProcessEventResponse()->getProcessEventResult();

        if (in_array($processEventResultType->getStatusCode(), ['VALIDATION_FAILURE', 'UNKNOWN_FAILURE'])) {
            $this->logError($this->getSoapClient()->__getLastRequestHeaders(), $this->getSoapClient()->__getLastResponse());

            return null;
        }

        return $processEventResultType;
    }

    /**
     * @param $processEvent
     *
     * @return array[]
     */
    public function buildEventForSoap($processEvent): array
    {
        return [[
            'authenticationToken' => $processEvent->getAuthenticationToken(),
            'sourceThirdPartyId' => $processEvent->getSourceThirdPartyId(),
            'dealerEndpointId' => $processEvent->getDealerEndpointId(),
            'eventType' => $processEvent->getEventType(),
            'payload' => $processEvent->getPayload(),
            'payloadVersion' => $processEvent->getPayloadVersion(),
        ]];
    }

    /**
     * @return array
     *
     * @throws \Exception
     */
    public function getClosedRoDetails(array $openRepairOrders): array
    {
        $closedRepairOrders = [];

        /**
         * @var RepairOrder $repairOrder
         */
        foreach ($openRepairOrders as $repairOrder) {
            $finalRoValue = 0;
            $targetXml = sprintf('<target legacyId="%s">%s</target>', $repairOrder->getNumber(), $repairOrder->getDmsKey());
            $this->getProcessEvent()
                ->setEventType('GetRepairOrders')
                ->setPayload('<ExtractRequest><targets>'.$targetXml.'</targets></ExtractRequest>');

            $result = $this->sendSoapCall('processEvent', $this->buildEventForSoap($this->getProcessEvent()), true);

            /**
             * @var AutomateEnvelope $automateEnvelope
             */
            $response = $this->deserializeSOAPResponse($result)->getResponse();
            if (!$response) {
                continue;
            }

            //Since this is returned as an array of xml nodes, to deserialize it, add a fake body.
            $rootNode = '<?xml version="1.0" ?><body>'.$response.'</body>';
            $deserializedNode = $this->getSerializer()->deserialize($rootNode, \App\Soap\automate\src\AutomateFakeBodyType::class, 'xml');

            if (!isset($deserializedNode->getRepairOrder()[0])) {
                continue;
            }

            /**
             * @var \App\Soap\automate\src\RepairOrder $resultRepairOrder
             */
            $resultRepairOrder = $deserializedNode->getRepairOrder()[0];
            if (!$resultRepairOrder) {
                continue;
            }


            if ('This RO is not retrievable through Open/Mate.' == $resultRepairOrder->getRepairOrderHeader()->getOrderNotes()) {
                continue;
            }

            $isClosed = false;
            foreach ($resultRepairOrder->getRepairOrderHeader()->getRepairOrderStatus() as $status) {
                if ('CLOSED' == $status->getStatusText()) {
                    $isClosed = true;
                    break;
                }
            }

            if (!$isClosed) {
                continue;
            }

            //TODO Nested for loop. Revisit
            foreach ($resultRepairOrder->getJob() as $job) {
                if (!$job->getPricing()) {
                    continue;
                }

                foreach ($job->getPricing()->getPrice() as $price) {
                    $type = $price->getPriceDescription();
                    if (false !== strpos($type, 'CUSTOMER_PAY')) {
                        $finalRoValue += $price->getChargeAmount()->value();
                    }
                }
            }

            $repairOrder
                ->setDateClosed(new \DateTime())
                ->setFinalValue($finalRoValue);
            $this->getEntityManager()->persist($repairOrder);
            $this->getEntityManager()->flush();

            $closedRepairOrder[] = $repairOrder;
        }

        return $closedRepairOrders;
    }

    public function getParts(): array
    {
        // TODO: Implement getParts() method.
        return [];
    }

    public function getWsdl(): string
    {
        return $this->wsdl;
    }

    public function setWsdl(string $wsdl): void
    {
        $this->wsdl = $wsdl;
    }

    /**
     * @return int
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param int $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getEndpointID(): int
    {
        return $this->endpointID;
    }

    /**
     * @param int $endpointID
     */
    public function setEndpointID(int $endpointID): void
    {
        $this->endpointID = $endpointID;
    }

    /**
     * @return mixed
     */
    public function getProcessEvent()
    {
        return $this->processEvent;
    }

    /**
     * @param mixed $processEvent
     */
    public function setProcessEvent($processEvent): void
    {
        $this->processEvent = $processEvent;
    }

    /**
     * @return string
     */
    public static function getDefaultIndexName(): string
    {
        return 'usingAutomate';
    }
}

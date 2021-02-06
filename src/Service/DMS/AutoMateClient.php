<?php

namespace App\Service\DMS;

use App\Entity\DMSResult;
use App\Service\PhoneValidator;
use App\Service\ThirdPartyAPILogHelper;
use App\Soap\automate\src\AuthenticationTokenType;
use App\Soap\automate\src\AutomateEnvelope;
use App\Soap\automate\src\Job;
use App\Soap\automate\src\ProcessEvent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\DomCrawler\Crawler;

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
        $this->buildSerializer('../src/Soap/automate/metadata', 'App\Soap\automate\src');
    }

    public function getOpenRepairOrders()
    {
        $repairOrders = [];
        $client = $this->initializeSoapClient($this->getWsdl());
        if ($client) {
            //Build the soap call
            $processEvent = (new ProcessEvent())
                ->setAuthenticationToken(
                    (new AuthenticationTokenType())
                        ->setUserName($this->getUsername())
                        ->setPassword($this->getPassword())
                )
                ->setSourceThirdPartyId($this->getUsername())
                ->setDealerEndpointId($this->getEndpointID())
                ->setEventType('GetRepairOrderKeys')
                //TODO The xsd defines this as a string. Could be converted internally to an obj.
                ->setPayload('<ExtractRequest><targets><target status="OPEN"/></targets></ExtractRequest>')
                ->setPayloadVersion('STAR-5.5.4');

            $targetNodes = $this->getRepairOrderKeys($processEvent);
            if (empty($targetNodes)) {
                return $repairOrders;
            }

            //TODO Set this to 100, and then test error handling.
            $chunks = array_chunk($targetNodes, 50);
            foreach ($chunks as $chunk) {
                //Convert back to a string to send in the payload.
                $xml = implode('', $chunk);

                $processEvent
                    ->setEventType('GetRepairOrders')
                    ->setPayload('<ExtractRequest><targets>'.$xml.'</targets></ExtractRequest>');

                $result = $this->sendSoapCall('processEvent', $this->buildEventForSoap($processEvent), true);

                /**
                 * @var AutomateEnvelope $automateEnvelope
                 */
                $automateEnvelope = $this->getSerializer()->deserialize($result, AutomateEnvelope::class, 'xml');
                //TODO Need to build the URI classes but haven't found one with one.
                $response = $automateEnvelope->getBody()->getProcessEventResponse()->getProcessEventResult()->getResponse();
                if(str_contains('URICommunication', $response)){
                    var_dump($response);
                    dd('Found URICommunication');
                }

                //Since this is returned as an array of xml nodes, to deserialize it, add a fake body.
                $rootNode = '<?xml version="1.0" ?><body>' . $response. '</body>';
                $deserializedNodes = $this->getSerializer()->deserialize($rootNode, \App\Soap\automate\src\AutomateFakeBodyType::class, 'xml');
                dump($deserializedNodes);
                foreach($deserializedNodes->getRepairOrder() as $repairOrder){
                    $repairOrders[] = $this->parseNode($repairOrder);
                }


            }
        }

        //dd($repairOrders);

        return $repairOrders;
    }


    public function parseNode($repairOrder){

        dump($repairOrder);
        //TODO There can be multiple jobs, then what?
        // Internal RO
        /**
         * @var Job $job
         */
        foreach($repairOrder->getJob() as $job){
            if('INTERNAL' == $job->getJobTypeString()){
                continue;
            }
        }


        $dmsResult = new DMSResult();
        //TODO Still need to deserialize null objects. Very time consuming.
        $customerFirstName = '';
        $customerLastName = '';

        //Local vars, Make things easier to read
        $ownerParty = $repairOrder->getRepairOrderHeader()->getOwnerParty();
        if($ownerParty){
            //Check for a person.
            if($ownerParty->getSpecifiedPerson()) {
                $specifiedPerson = $ownerParty->getSpecifiedPerson();
                // Name
                $dmsResult->getCustomer()->setName(trim(sprintf('%s %s', $specifiedPerson->getGivenName(), $specifiedPerson->getFamilyName())));

                //phone number
                if ($specifiedPerson->getTelephoneCommunication()) {
                    dump($specifiedPerson->getTelephoneCommunication());
                    $dmsResult->getCustomer()->setPhoneNumbers($specifiedPerson->getTelephoneCommunication()->getCompleteNumber());
                }
            }

            //Check for organization.
            if($ownerParty->getSpecifiedOrganization()) {
                $specifiedOrganization = $ownerParty->getSpecifiedOrganization();

                //TODO Org name, before if the first name was empty, it would put the Org Name + Last Name, do we still want that?
                if(!$dmsResult->getCustomer()->getName()){
                    $dmsResult->getCustomer()->setName($specifiedOrganization->getCompanyName());
                }

                //No phone, so see if there is an org phone.
                if ($specifiedOrganization->getPrimaryContact() && !$dmsResult->getCustomer()->getPhoneNumbers()) {
                    $dmsResult->getCustomer()->setPhoneNumbers($specifiedOrganization->getPrimaryContact()->getTelephoneCommunication()->getCompleteNumber());
                }

            }

            //TODO Turned off for testing.
//                // Still no phone number, just skip
//                if (!$dmsResult->getCustomer()->getPhoneNumbers()) {
//                    continue;
//                }

            //TODO Could not find a person with an email to generate the classes.
//                // Try to get email
//                if (isset($repairOrder->RepairOrderHeader->OwnerParty->SpecifiedPerson->URICommunication)) {
//                    $email = $repairOrder->RepairOrderHeader->OwnerParty->SpecifiedPerson->URICommunication->URIID;
//                }

            //Vehicle Details
            $vehicle = $repairOrder->getRepairOrderHeader()->getRepairOrderVehicleLineItem()->getVehicle();
            if($vehicle){
                $dmsResult->setYear($vehicle->getModelYear());
                $dmsResult->setMake($vehicle->getManufacturerName());
                $dmsResult->setModel($vehicle->getModel());
                $dmsResult->setVin($vehicle->getVehicleID());
            }
            $dmsResult->setMiles($repairOrder->getRepairOrderHeader()->getInDistanceMeasure());

            $dmsResult->getAdvisor()->setFirstName($repairOrder->getRepairOrderHeader()->getServiceAdvisorParty()->getSpecifiedPerson()->getGivenName());
            $dmsResult->getAdvisor()->setLastName($repairOrder->getRepairOrderHeader()->getServiceAdvisorParty()->getSpecifiedPerson()->getFamilyName());

            $dmsResult->setNumber($repairOrder->getRepairOrderHeader()->getDocumentIdentificationGroup()->getAlternateDocumentIdentification()->getDocumentID());
            //$createdDate = new DateTime();

//
//                try {
//                    $createdDate = new DateTime($repairOrder->RepairOrderHeader->DealerParty->AlternatePartyDocument->EffectivePeriod->StartDateTime);
//
//                } catch (Exception $e) {
//                    // nothing
//                }

            $dmsResult->setDate($repairOrder->getRepairOrderHeader()->getDealerParty()->getAlternatePartyDocument()->getEffectivePeriod()->getStartDateTime());

            //waiter
            $dmsResult->setWaiter(false);
            if('WAITER' == $repairOrder->getRepairOrderHeader()->getRepairOrderPriorityCode())
            {
                $dmsResult->setWaiter(true);
            }

            //pickup date
            foreach($repairOrder->getRepairOrderHeader()->getRepairOrderStatus() as $status){
                if (strpos($status->getStatusText(), 'PICKUP_DATE') !== false) {
                    try {
                        $dmsResult->setPickupDate(new \DateTime(explode('=', $status->getStatusText())[1]));
                    } catch (Exception $e) {
                        // nothing
                    }
                }
            }


            if($repairOrder->getRepairOrderHeader()->getDocumentIdentification()){
                $dmsResult->setRoKey($repairOrder->getRepairOrderHeader()->getDocumentIdentification()->getDocumentID());
            }else{
                $dmsResult->setRoKey($repairOrder->getRepairOrderHeader()->getDocumentIdentificationGroup()->getDocumentIdentification()->getDocumentID());
            }


        }




//
//            if ($repairOrder->getRepairOrderHeader()->getOwnerParty() && $repairOrder->getRepairOrderHeader()->getOwnerParty()->getFamilyName()) {
//                $customerLastName = $repairOrder->RepairOrderHeader->OwnerParty->SpecifiedPerson->FamilyName;
//            }
//


        return $dmsResult;
    }

    public function getRepairOrderKeys($processEvent)
    {
//        try {
//            $processEventResult = $client->__soapCall('processEvent',
//            );
//        } catch (\SoapFault $e) {
//            //Most likely a malformed request/invalid parameters were provided.
//            dump($client->__getLastRequestHeaders());
//            dd($e->getMessage());
//            $this->logError($client->__getLastRequestHeaders(), $e->getMessage());
//
//            return [];
//        }

        $result = $this->sendSoapCall('processEvent', $this->buildEventForSoap($processEvent), true);

        //Deserialize the soap result into objects.
        $automateEnvelope = $this->deserialize($result);

        //$processEventResultType = ->getBody()->getProcessEventResponse()->getProcessEventResult();
        //Since part of the post is xml, we don't need to deserialize the response, but break the nodes into chunks of 50.
        $crawler = new Crawler($automateEnvelope->getResponse());
        $targetNodes = $crawler->filterXPath('//ExtractRequest/targets')->children()->each(
            function (Crawler $node, $i) {
                return $node->outerHtml();
            }
        );

        return $targetNodes;
    }

    public function deserialize($result)
    {
        $deserialized = $this->getSerializer()->deserialize($result, AutomateEnvelope::class, 'xml');
        $processEventResultType = $deserialized->getBody()->getProcessEventResponse()->getProcessEventResult();

        if ('UNKNOWN_FAILURE' == $processEventResultType->getStatusCode()) {
            $this->logError($this->getSoapClient()->__getLastRequestHeaders(), $this->getSoapClient()->__getLastResponse());

            return [];
        }

        return $processEventResultType;
    }

    public function buildEventForSoap($processEvent)
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

    public function getClosedRoDetails()
    {
        // TODO: Implement getClosedRoDetails() method.
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

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getEndpointID(): int
    {
        return $this->endpointID;
    }

    public function setEndpointID(int $endpointID): void
    {
        $this->endpointID = $endpointID;
    }

    public static function getDefaultIndexName()
    {
        return 'usingAutomate';
    }
}

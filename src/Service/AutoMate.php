<?php

namespace App\Service;

use App\Entity\RepairOrder;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\OptimisticLockException;
use App\Service\TwilioHelper as Twilio;
use Symfony\Component\Dotenv\Dotenv;
use Exception;

/**
 * Class OpenMate
 *
 * @package App\Service
 */
class AutoMate extends SOAP {

    /**
     * @var string
     */
    private $eventServiceUrl = "https://openmate-preprod.automate-webservices.com/OpenMateGateway/ProcessEventService?wsdl";
    // private $eventServiceUrl = "https://openmate.automate-webservices.com/OpenMateGateway/ProcessEventService";

    /**
     * @var int
     */
    private $username = '1334';
    // private $username = '136';

    /**
     * @var string
     */
    private $password = '3tdVAR6nPH^d';
    // private $password = 'k(iabvS8en5K';

    /**
     * @var int
     */
    private $dealerEndpointId;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var Twilio
     */
    private $twilio;

    /**
     * AutoMate constructor.
     *
     * @param EntityManagerInterface $em
     * @param Twilio        $twilio
     */
    public function __construct (EntityManagerInterface $em, Twilio $twilio) {
        $this->em               = $em;
        $this->twilio           = $twilio;

        $dotenv = new Dotenv();
        $dotenv->load(__DIR__ . '/../../.env');
        
        $this->dealerEndpointId = $_ENV['DEALER_ENDPOINT_ID'];

        parent::__construct($em);
    }

    /**
     * @return array
     * @throws Exception
     */
    public function getOpenRepairOrders () {
        $returnResult  = [];
        $xmlPostString = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:open="http://openmate.automate-webservices.com/">
                               <soapenv:Header/>
                               <soapenv:Body>
                                  <open:processEvent>
                                     <authenticationToken>
                                        <userName>' . $this->username . '</userName>
                                        <password>' . $this->password . '</password>
                                     </authenticationToken>
                                     <sourceThirdPartyId>' . $this->username . '</sourceThirdPartyId>
                                     <dealerEndpointId>' . $this->dealerEndpointId . '</dealerEndpointId>
                                     <eventType>GetRepairOrderKeys</eventType>
                                     <payload>
                                        <![CDATA[
                                        <ExtractRequest>
                                            <targets>
                                                <target status="OPEN"/>
                                            </targets>
                                        </ExtractRequest>
                                        ]]>
                                     </payload>
                                     <payloadVersion>STAR-5.5.4</payloadVersion>
                                  </open:processEvent>
                               </soapenv:Body>
                            </soapenv:Envelope>';

        $headers = [
            "Content-Type: text/xml; charset=utf-8",
            "Content-Length: " . strlen($xmlPostString),
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36"
        ];

        $result = $this->sendRequest($headers, $this->eventServiceUrl, $xmlPostString);

        if ($result) {
            $cleanXml = str_ireplace(['S:', 'ns2:'], '', $result);
            $parsed   = simplexml_load_string($cleanXml);

            if ($parsed->Body->processEventResponse->processEventResult->statusCode == 'UNKNOWN_FAILURE') {
                $this->logError($xmlPostString, $result);

                return [];
            }

            $xml      = $parsed->Body->processEventResponse->processEventResult->response;
            $xml      = str_ireplace(['&gt;'], '>', $xml);
            $xml      = str_ireplace(['&lt;'], '<', $xml);
            $parsed   = simplexml_load_string($xml);
            $children = [];

            foreach ($parsed->targets->children() as $el) {
                array_push($children, $el->asXML());
            }

            $chunks      = array_chunk($children, 50);
            $masterArray = [];

            foreach ($chunks as $chunk) {
                $xml = '';
                foreach ($chunk as $value) {
                    $xml .= $value;
                }

                // Get details for this chunk of 50 (or less if last chunk)
                $detailsResult = $this->getRepairOrderInfo($xml);

                foreach ($detailsResult->RepairOrder as $value) {
                    array_push($masterArray, $value);
                }
            }

            foreach ($masterArray as $k => $repairOrder) {
                $customerFirstName    = '';
                $customerLastName     = '';
                $customerPhoneNumbers = [];
                $email                = null;

                // Internal RO
                if (isset($repairOrder->Job->JobTypeString)) {
                    if ($repairOrder->Job->JobTypeString == 'INTERNAL') {
                        continue;
                    }
                }

                // Try to get first name/org. name
                if (isset($repairOrder->RepairOrderHeader->OwnerParty->SpecifiedPerson->GivenName)) {
                    $customerFirstName = $repairOrder->RepairOrderHeader->OwnerParty->SpecifiedPerson->GivenName;
                } else if (empty($customerFirstName)) {
                    if (isset($repairOrder->RepairOrderHeader->OwnerParty->SpecifiedOrganization->CompanyName)) {
                        $customerFirstName = $repairOrder->RepairOrderHeader->OwnerParty->SpecifiedOrganization->CompanyName;
                    }
                }

                // Try to get last name
                if (isset($repairOrder->RepairOrderHeader->OwnerParty->SpecifiedPerson->FamilyName)) {
                    $customerLastName = $repairOrder->RepairOrderHeader->OwnerParty->SpecifiedPerson->FamilyName;
                }

                // Try to get the correct phone #
                if (isset($repairOrder->RepairOrderHeader->OwnerParty->SpecifiedPerson->TelephoneCommunication->CompleteNumber)) {
                    $customerPhoneNumbers[] = $repairOrder->RepairOrderHeader->OwnerParty->SpecifiedPerson->TelephoneCommunication->CompleteNumber;
                } else if (isset($repairOrder->RepairOrderHeader->OwnerParty->SpecifiedPerson->TelephoneCommunication) &&
                    is_array($repairOrder->RepairOrderHeader->OwnerParty->SpecifiedPerson->TelephoneCommunication)) {
                    // Loop over the #s to find a valid one
                    foreach ($repairOrder->RepairOrderHeader->OwnerParty->SpecifiedPerson->TelephoneCommunication as $phoneNumberObject) {
                        $customerPhoneNumbers[] = $phoneNumberObject->CompleteNumber;
                    }
                } else if (isset($repairOrder->RepairOrderHeader->OwnerParty->SpecifiedOrganization->PrimaryContact->TelephoneCommunication->CompleteNumber)) {
                    $customerPhoneNumbers[] = $repairOrder->RepairOrderHeader->OwnerParty->SpecifiedOrganization->PrimaryContact->TelephoneCommunication->CompleteNumber;
                } else if (isset($repairOrder->RepairOrderHeader->OwnerParty->SpecifiedOrganization->PrimaryContact->TelephoneCommunication) &&
                    is_array($repairOrder->RepairOrderHeader->OwnerParty->SpecifiedOrganization->PrimaryContact->TelephoneCommunication)) {
                    foreach ($repairOrder->RepairOrderHeader->OwnerParty->SpecifiedOrganization->PrimaryContact->TelephoneCommunication as $phoneNumberObject) {
                        $customerPhoneNumbers[] = $phoneNumberObject->CompleteNumber;
                    }
                }

                // Still no phone number, just skip
                if (!$customerPhoneNumbers) {
                    continue;
                }

                // Try to get email
                if (isset($repairOrder->RepairOrderHeader->OwnerParty->SpecifiedPerson->URICommunication)) {
                    $email = $repairOrder->RepairOrderHeader->OwnerParty->SpecifiedPerson->URICommunication->URIID;
                }

                $year  = null;
                $make  = null;
                $model = null;
                $vin   = null;
                $miles = null;

                if (isset($repairOrder->RepairOrderHeader->RepairOrderVehicleLineItem->Vehicle->ModelYear)) {
                    $year = $repairOrder->RepairOrderHeader->RepairOrderVehicleLineItem->Vehicle->ModelYear;
                }

                if (isset($repairOrder->RepairOrderHeader->RepairOrderVehicleLineItem->Vehicle->ManufacturerName)) {
                    $make = $repairOrder->RepairOrderHeader->RepairOrderVehicleLineItem->Vehicle->ManufacturerName;
                }

                if (isset($repairOrder->RepairOrderHeader->RepairOrderVehicleLineItem->Vehicle->Model)) {
                    $model = $repairOrder->RepairOrderHeader->RepairOrderVehicleLineItem->Vehicle->Model;
                }

                if (isset($repairOrder->RepairOrderHeader->RepairOrderVehicleLineItem->Vehicle->VehicleID)) {
                    $vin = $repairOrder->RepairOrderHeader->RepairOrderVehicleLineItem->Vehicle->VehicleID;
                }

                if (isset($repairOrder->RepairOrderHeader->InDistanceMeasure)) {
                    $miles = $repairOrder->RepairOrderHeader->InDistanceMeasure;
                }

                $advisorFirstName = null;
                $advisorLastName  = null;
                if (isset($repairOrder->RepairOrderHeader->ServiceAdvisorParty->SpecifiedPerson->GivenName)) {
                    $advisorFirstName = $repairOrder->RepairOrderHeader->ServiceAdvisorParty->SpecifiedPerson->GivenName;
                }

                if (isset($repairOrder->RepairOrderHeader->ServiceAdvisorParty->SpecifiedPerson->FamilyName)) {
                    $advisorLastName = $repairOrder->RepairOrderHeader->ServiceAdvisorParty->SpecifiedPerson->FamilyName;
                }

                $roNumber    = $repairOrder->RepairOrderHeader->DocumentIdentificationGroup->AlternateDocumentIdentification->DocumentID;
                $createdDate = new DateTime($repairOrder->RepairOrderHeader->DealerParty->AlternatePartyDocument->EffectivePeriod->StartDateTime);
                $waiter      = false;

                if (isset($repairOrder->RepairOrderHeader->RepairOrderPriorityCode)) {
                    $priorityCode = $repairOrder->RepairOrderHeader->RepairOrderPriorityCode;

                    if ($priorityCode == 'WAITER') {
                        $waiter = true;
                    }
                }

                $pickupDate = null;
                if (isset($repairOrder->RepairOrderHeader->RepairOrderStatus)) {
                    $statuses = $repairOrder->RepairOrderHeader->RepairOrderStatus;
                    if (is_array($statuses)) {
                        foreach ($statuses as $status) {
                            $statusText = $status->StatusText;
                            if (strpos($statusText, 'PICKUP_DATE') !== false) {
                                $pickupDate = new DateTime(explode('=', $statusText)[1]);
                            }
                        }
                    }
                }

                if (!isset($repairOrder->RepairOrderHeader->DocumentIdentification)) {
                    $roKey = $repairOrder->RepairOrderHeader->DocumentIdentificationGroup->DocumentIdentification->DocumentID;
                } else {
                    $roKey = $repairOrder->RepairOrderHeader->DocumentIdentification->DocumentID;
                }

                $returnResult[] = (object)[
                    'customer'   => (object)[
                        'name'          => $customerFirstName . ' ' . $customerLastName,
                        'phone_numbers' => $customerPhoneNumbers,
                        'email'         => $email
                    ],
                    'number'     => $roNumber,
                    'ro_key'     => $roKey,
                    'date'       => $createdDate,
                    'waiter'     => $waiter,
                    'pickupDate' => $pickupDate,
                    'year'       => $year,
                    'make'       => $make,
                    'model'      => $model,
                    'miles'      => $miles,
                    'vin'        => $vin,
                    'advisor'    => (object)[
                        'id'         => null,
                        'first_name' => $advisorFirstName,
                        'last_name'  => $advisorLastName
                    ]
                ];
            }

            return $returnResult;
        }

        return [];
    }

    /**
     * @param $targetXml
     *
     * @return mixed
     */
    public function getRepairOrderInfo ($targetXml) {
        $xmlPostString = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:open="http://openmate.automate-webservices.com/">
			   	<soapenv:Header/>
			   	<soapenv:Body>
			      	<open:processEvent>
			        	<authenticationToken>
			            	<userName>' . $this->username . '</userName>
		            		<password>' . $this->password . '</password>
			         	</authenticationToken>
			         	<sourceThirdPartyId>' . $this->username . '</sourceThirdPartyId>
		         		<dealerEndpointId>' . $this->dealerEndpointId . '</dealerEndpointId>
			         	<eventType>GetRepairOrders</eventType>
			         	<payload>
                            <![CDATA[
                            <ExtractRequest>
                                <targets>' . $targetXml . '</targets>
                            </ExtractRequest>
                            ]]>
                         </payload>
			         	<payloadVersion>STAR-5.5.4</payloadVersion>
			      	</open:processEvent>
			   	</soapenv:Body>
			</soapenv:Envelope>';

        $headers = [
            "Content-Type: text/xml; charset=utf-8",
            "Content-Length: " . strlen($xmlPostString),
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36"
        ];

        $result    = $this->sendRequest($headers, $this->eventServiceUrl, $xmlPostString);
        $clean_xml = str_ireplace(['S:', 'ns2:'], '', $result);
        $parsed    = simplexml_load_string($clean_xml);
        $raw_xml   = $parsed->Body->processEventResponse->processEventResult->response;
        $raw_xml   = str_ireplace(['&gt;'], '>', $raw_xml);
        $raw_xml   = str_ireplace(['&lt;'], '<', $raw_xml);

        // Clean out complaint description, we don't need it and they're putting <> in there
        $pattern     = '/\<ComplaintDescription\>[\s\S]*?\<\/ComplaintDescription\>/s';
        $replacement = '<ComplaintDescription></ComplaintDescription>';
        $raw_xml     = preg_replace($pattern, $replacement, $raw_xml);

        $xml         = simplexml_load_string('<data>' . $raw_xml . '</data>');

        return json_decode(json_encode($xml));
    }

    /**
     * @param $repairOrders
     */
    public function getClosedRoDetails ($repairOrders) {
        /** @var RepairOrder $repairOrder */
        foreach ($repairOrders as $repairOrder) {
            $finalRoValue = 0;

            // Can't close historical
            if (!$repairOrder->getRoKey()) {
                continue;
            }

            $targetXml = "<target legacyId='{$repairOrder->getNumber()}'>{$repairOrder->getRoKey()}</target>";
            $response  = $this->getRepairOrderInfo($targetXml);

            if (!$response) {
                continue;
            }

            if (!isset($response->RepairOrder)) {
                continue;
            }

            $repairOrderResponse = $response->RepairOrder;

            $isClosed = false;
            if (isset($repairOrderResponse->RepairOrderHeader->RepairOrderStatus)) {
                $statuses = $repairOrderResponse->RepairOrderHeader->RepairOrderStatus;
                if (is_array($statuses)) {
                    foreach ($statuses as $status) {
                        $statusText = $status->StatusText;

                        if ($statusText == 'CLOSED') {
                            $isClosed = true;
                            break;
                        }
                    }
                }
            }

            if (!$isClosed) {
                continue;
            }

            if (is_array($repairOrderResponse->Job)) {
                foreach ($repairOrderResponse->Job as $job) {
                    if (!isset($job->Pricing)) {
                        continue;
                    }

                    if (is_array($job->Pricing->Price)) {
                        foreach ($job->Pricing->Price as $priceObject) {
                            $type = $priceObject->PriceDescription;
                            if (strpos($type, 'CUSTOMER_PAY') !== false) {
                                $finalRoValue += (float)$priceObject->ChargeAmount;
                            }
                        }
                    } else {
                        $type = $job->Pricing->Price->PriceDescription;
                        if (strpos($type, 'CUSTOMER_PAY') !== false) {
                            $finalRoValue += (float)$job->Pricing->Price->ChargeAmount;
                        }
                    }
                }
            } else {
                $job = $repairOrderResponse->Job;
                if (!isset($job->Pricing)) {
                    continue;
                }

                foreach ($job->Pricing->Price as $priceObject) {

                    $type = $priceObject->PriceDescription;
                    if (strpos($type, 'CUSTOMER_PAY') !== false) {
                        $finalRoValue += (float)$priceObject->ChargeAmount;
                    }
                }
            }

            $repairOrder->setClosedDate(new DateTime())->setFinalValue($finalRoValue);

            try {
                $this->em->persist($repairOrder);
                $this->em->flush();
            } catch (OptimisticLockException $e) {
                continue;
            }
        }
    }
}

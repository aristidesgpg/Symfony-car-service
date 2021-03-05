<?php

namespace App\Service;

use App\Entity\RepairOrder;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use SimpleXMLElement;
use Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * Class DealerBuilt
 *
 * @package App\Service
 */
class DealerBuilt extends SOAP {

    /**
     * @var string
     */
    private $postUrl = "https://cdx.dealerbuilt.com/0.99a/Api.svc";

    /**
     * @var int
     */
    private $username = 'iservice';

    /**
     * @var string
     */
    private $password = 'w37B(7pDIb/FZF8(*1';

    /**
     * @var string
     */
    private $timeFrame = 'PT5M';

    /**
     * @var string
     */
    private $serviceLocationId;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var PhoneValidator
     */
    private $phoneValidator;

    /**
     * AutoMate constructor.
     *
     * @param EntityManagerInterface $em
     * @param PhoneValidator         $phoneValidator
     * @param ParameterBagInterface  $parameterBag
     *
     * @throws ParameterNotFoundException
     */
    public function __construct (EntityManagerInterface $em, PhoneValidator $phoneValidator,
                                 ParameterBagInterface $parameterBag) {
        $this->em                = $em;
        $this->phoneValidator    = $phoneValidator;
        $env                     = $parameterBag->get('app_env');
        $this->serviceLocationId = $parameterBag->get('dealerbuilt_location_id');

        // Won't grab any from dev unless we up the time frame
        if ($env == 'dev') {
            $this->timeFrame = 'PT8760H';
        }

        parent::__construct($em);
    }

    /**
     * @return array
     */
    public function getOpenRepairOrders () {
        $return  = [];
        $headers = [
            "Accept-Encoding: gzip,deflate",
            "Content-Type: text/xml; charset=UTF-8",
            "SOAPAction: http://cdx.dealerbuilt.com/Api/0.99/IStandardApi/PullRepairOrders",
            "User-Agent: Jakarta Commons-HttpClient/3.1",
            "Host: cdx.dealerbuilt.com:443"
        ];

        $xmlPostString = '<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:arr="http://schemas.microsoft.com/2003/10/Serialization/Arrays" xmlns:deal="http://schemas.datacontract.org/2004/07/DealerBuilt.BaseApi" xmlns:deal1="http://schemas.datacontract.org/2004/07/DealerBuilt.Models.Service" xmlns:ns="http://cdx.dealerbuilt.com/Api/0.99/" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
            <SOAP-ENV:Header>
                <wsse:Security xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">
                    <wsse:UsernameToken wsu:Id="UsernameToken-4F23E153EDAE16D1E3151320297535313">
                        <wsse:Username>' . $this->username . '</wsse:Username>
                        <wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">' . $this->password . '</wsse:Password>
                        <wsse:Nonce EncodingType="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-soap-message-security-1.0#Base64Binary"></wsse:Nonce>
                        <wsu:Created>2017-12-13T22:09:35.353Z</wsu:Created>
                    </wsse:UsernameToken>
                </wsse:Security>
            </SOAP-ENV:Header>
            <SOAP-ENV:Body>
                <ns:PullRepairOrders>
                    <ns:searchCriteria>
                        <deal:MaxElapsedSinceUpdate>' . $this->timeFrame . '</deal:MaxElapsedSinceUpdate>
                        <deal:ServiceLocationIds>
                            <arr:long>' . $this->serviceLocationId . '</arr:long>
                        </deal:ServiceLocationIds>
                        <Statuses>
                            <RepairOrderStatus>Open</RepairOrderStatus>
                        </Statuses>
                    </ns:searchCriteria>
                </ns:PullRepairOrders>
            </SOAP-ENV:Body>
        </SOAP-ENV:Envelope>';

        $headers[] = "Content-Length: " . strlen($xmlPostString);

        $result = $this->sendRequest($headers, $this->postUrl, $xmlPostString);

        //file_put_contents('log', $result);

        if ($result) {
            $response    = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $result);
            $xml         = new SimpleXMLElement($response);
            $body        = $xml->xpath('//sBody')[0];
            $masterArray = json_decode(json_encode((array)$body), true);

            if ($masterArray['PullRepairOrdersResponse']['PullRepairOrdersResult']) {
                foreach ($masterArray['PullRepairOrdersResponse']['PullRepairOrdersResult']['aRepairOrder'] as $repairOrder) {
                    $roObject = (object)[
                        'customer'   => (object)[
                            'name'         => null,
                            'phoneNumbers' => [],
                            'email'        => null
                        ],
                        'number'     => null,
                        'roKey'      => null,
                        'date'       => new Datetime(),
                        'waiter'     => false,
                        'pickupDate' => null,
                        'year'       => null,
                        'make'       => null,
                        'model'      => null,
                        'miles'      => null,
                        'vin'        => null,
                        'advisor'    => (object)[
                            'id'        => null,
                            'firstName' => null,
                            'lastName'  => null
                        ]
                    ];

                    if (!is_array($repairOrder)) {
                        $repairOrder = $masterArray['PullRepairOrdersResponse']['PullRepairOrdersResult']['aRepairOrder'];
                    }

                    if (array_key_exists('aAttributes', $repairOrder)) {
                        $roType = $repairOrder['aAttributes']['bType'];

                        if ($roType == 'InternalRepairOrder') {
                            continue;
                        }

                        $customer                     = $repairOrder['aReferences']['aROCustomer']['aAttributes']['bIdentity'];
                        $roObject->number             = $repairOrder['aAttributes']['bRepairOrderNumber'];
                        $vehicle                      = $repairOrder['aReferences']['aROVehicle']['aAttributes'];
                        $roObject->year               = !is_array($vehicle['bYear']) ? $vehicle['bYear'] : null;
                        $roObject->make               = !is_array($vehicle['bMake']) ? $vehicle['bMake'] : null;
                        $roObject->modeal             = !is_array($vehicle['bModel']) ? $vehicle['bModel'] : null;
                        $roObject->miles              = !is_array($repairOrder['aAttributes']['bMilesIn']) ? $repairOrder['aAttributes']['bMilesIn'] : null;
                        $roObject->vin                = !is_array($vehicle['bVin']) ? $vehicle['bVin'] : null;
                        $advisor                      = $repairOrder['aAttributes']['bServiceAdvisor'];
                        $roObject->advisor->firstName = $advisor['cPersonalName']['cFirstName'];
                        $roObject->advisor->lastName  = $advisor['cPersonalName']['cLastName'];

                        if (isset($customer['cPersonalName']['cFirstName'])) {
                            $roObject->customer->name = $customer['cPersonalName']['cFirstName'];
                        }

                        if (isset($customer['cPersonalName']['cLastName'])) {
                            if(!is_array($customer['cPersonalName']['cLastName'])){
                                $roObject->customer->name .= ' ' . $customer['cPersonalName']['cLastName'];
                            }

                        }

                        // No customer name, it's an internal RO so skip
                        if (!$roObject->customer->name) {
                            continue;
                        }

                        if ($customer['cEmailAddress']) {
                            $roObject->customer->email = $customer['cEmailAddress'];
                        }

                        $phoneNumbers = [];
                        if (isset($customer['cPhoneNumbers']['cPhoneNumber'])) {
                            $roPhoneNumbers = $customer['cPhoneNumbers']['cPhoneNumber'];

                            // Try to find a cell #
                            foreach ($roPhoneNumbers as $numberArray) {
                                // The number isn't an array, it's just a phone number so clean it and add it
                                if (!is_array($numberArray)) {
                                    try {
                                        $phoneNumbers[] = $this->phoneValidator->clean($numberArray);
                                        break;
                                    } catch (Exception $e) {
                                        continue;
                                    }
                                }

                                // Since the number
                                try {
                                    $number = $this->phoneValidator->clean($numberArray['cDigits']);
                                } catch (Exception $e) {
                                    continue;
                                }

                                $type = $numberArray['cNumberType'];

                                // It's mobile we only need this one
                                if ($type == 'Mobile' || $type == 'Cell') {
                                    $phoneNumbers = [$number];
                                    break;
                                }

                                $phoneNumbers[] = $number;
                            }
                        }

                        $roObject->customer->phoneNumbers = $phoneNumbers;

                        if (isset($repairOrder['aAttributes']['bOpenedStamp']) && !empty($repairOrder['aAttributes']['bOpenedStamp'])) {
                            try {
                                $roObject->date = new DateTime($repairOrder['aAttributes']['bOpenedStamp']);
                            } catch (Exception $e) {
                                // Nothing, handling it by default
                            }
                        }

                        if (isset($repairOrder['aROKey']) && !empty($repairOrder['aROKey'])) {
                            $roObject->roKey = $repairOrder['aROKey'];
                        }
                    }
                    $return[] = $roObject;
                }
            }

            return $return;
        }

        return [];
    }

    /**
     * @param $repairOrders array
     *
     * @return void
     */
    public function getClosedRoDetails (array $repairOrders) {
        $rosWithKeys    = [];
        $rosWithoutKeys = [];

        /** @var RepairOrder $repairOrder */
        foreach ($repairOrders as $repairOrder) {
            if ($repairOrder->getDmsKey()) {
                $rosWithKeys[] = $repairOrder;
                continue;
            }

            $rosWithoutKeys[] = $repairOrder;
        }

        if ($rosWithKeys) {
            $this->closeRosWithKeys($rosWithKeys);
            return;
        }

        if ($rosWithoutKeys) {
            $this->closeRosWithoutKeys($rosWithoutKeys);
            return;
        }
    }

    /**
     * @param $repairOrders
     *
     * @return array
     */
    public function closeRosWithKeys ($repairOrders): array {
        $closedRepairOrders = [];
        $headers            = [
            "Accept-Encoding: gzip,deflate",
            "Content-Type: text/xml; charset=UTF-8",
            "SOAPAction: http://cdx.dealerbuilt.com/Api/0.99/IStandardApi/PullRepairOrdersByKey",
            "User-Agent: Jakarta Commons-HttpClient/3.1",
            "Host: cdx.dealerbuilt.com:443"
        ];

        $repairOrderKeyString = '';
        /** @var RepairOrder $repairOrder */
        foreach ($repairOrders as $repairOrder) {
            $repairOrderKeyString .= "<arr:string>{$repairOrder->getDmsKey()}</arr:string>";
        }

        $xmlPostString = '<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:arr="http://schemas.microsoft.com/2003/10/Serialization/Arrays" xmlns:deal="http://schemas.datacontract.org/2004/07/DealerBuilt.BaseApi" xmlns:deal1="http://schemas.datacontract.org/2004/07/DealerBuilt.Models.Service" xmlns:ns="http://cdx.dealerbuilt.com/Api/0.99/" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
            <SOAP-ENV:Header>
                <wsse:Security xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">
                    <wsse:UsernameToken wsu:Id="UsernameToken-4F23E153EDAE16D1E3151320297535313">
                        <wsse:Username>' . $this->username . '</wsse:Username>
                        <wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">' . $this->password . '</wsse:Password>
                        <wsse:Nonce EncodingType="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-soap-message-security-1.0#Base64Binary"></wsse:Nonce>
                        <wsu:Created>2017-12-13T22:09:35.353Z</wsu:Created>
                    </wsse:UsernameToken>
                </wsse:Security>
              </SOAP-ENV:Header>
              <SOAP-ENV:Body>
                    <ns:PullRepairOrdersByKey>
                        <ns:repairOrderKeys>
                            ' . $repairOrderKeyString . '
                        </ns:repairOrderKeys>
                    </ns:PullRepairOrdersByKey>
                </SOAP-ENV:Body>
            </SOAP-ENV:Envelope>';

        $headers[] = "Content-Length: " . strlen($xmlPostString);

        $result = $this->sendRequest($headers, $this->postUrl, $xmlPostString);

        if ($result) {
            $response    = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $result);
            $xml         = new SimpleXMLElement($response);
            $body        = $xml->xpath('//sBody')[0];
            $masterArray = json_decode(json_encode((array)$body), true);

            if ($masterArray['PullRepairOrdersByKeyResponse']['PullRepairOrdersByKeyResult']) {
                foreach ($masterArray['PullRepairOrdersByKeyResponse']['PullRepairOrdersByKeyResult']['aRepairOrder'] as $foundRepairOrder) {
                    $technicianRecord = '';
                    $roAttributes     = $foundRepairOrder['aAttributes'];
                    $status           = $roAttributes['bStatus'];
                    $roNumber         = $roAttributes['bRepairOrderNumber'];

                    if ($status == 'Posted' || $status == 'Closed') {
                        $closedDate = new DateTime();

                        try {
                            $roClosedDate = $roAttributes['bClosedStamp'];
                            $closedDate   = new DateTime($roClosedDate);
                        } catch (Exception $e) {
                            // Nothing
                        }

                        $roValue = 0;

                        if (isset($roAttributes['bTotalAmount']['cAmount'])) {
                            $roValue = $roAttributes['bTotalAmount']['cAmount'];
                        }

                        // Try to set the technician that recorded it when closing
                        if (array_key_exists("bJobs", $roAttributes)) {
                            if (array_key_exists("bRepairOrderJob", $roAttributes['bJobs'])) {
                                if (array_key_exists("0", $roAttributes['bJobs']['bRepairOrderJob'])) {
                                    if (array_key_exists("bTechs", $roAttributes['bJobs']['bRepairOrderJob'][0])) {
                                        if (array_key_exists("bJobTechnician", $roAttributes['bJobs']['bRepairOrderJob'][0]['bTechs'])) {
                                            if (array_key_exists("bTech", $roAttributes['bJobs']['bRepairOrderJob'][0]['bTechs']['bJobTechnician'])) {
                                                if (array_key_exists("cPersonalName", $roAttributes['bJobs']['bRepairOrderJob'][0]['bTechs']['bJobTechnician']['bTech'])) {
                                                    if (array_key_exists("cFirstName", $roAttributes['bJobs']['bRepairOrderJob'][0]['bTechs']['bJobTechnician']['bTech']['cPersonalName'])) {
                                                        $technicianFirstName = $roAttributes['bJobs']['bRepairOrderJob'][0]['bTechs']['bJobTechnician']['bTech']['cPersonalName']['cFirstName'];
                                                        $technicianLastName  = $roAttributes['bJobs']['bRepairOrderJob'][0]['bTechs']['bJobTechnician']['bTech']['cPersonalName']['cLastName'];
                                                        $qb                  = $this->em->createQueryBuilder();
                                                        $qb->select('u')
                                                            ->from('AppBundle:Technician', 'u')
                                                            ->where('u.firstName = :firstName')
                                                            ->andWhere('u.lastName = :lastName')
                                                            ->setParameter('firstName', $technicianFirstName)
                                                            ->setParameter('lastName', $technicianLastName);
                                                        $technician = $qb->getQuery()->getResult();
                                                        if ($technician) {
                                                            if (array_key_exists('0', $technician)) {
                                                                $technicianRecord = $technician[0];
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }

                        // Loop over all passed ROs to get the RO in question
                        $referenceRepairOrder = null;
                        /** @var RepairOrder $repairOrder */
                        foreach ($repairOrders as $repairOrder) {
                            if ($repairOrder->getNumber() == $roNumber) {
                                $referenceRepairOrder = $repairOrder;
                                break;
                            }
                        }

                        if (!$referenceRepairOrder) {
                            continue;
                        }

                        $referenceRepairOrder->setDateClosed($closedDate)->setFinalValue($roValue);
                        if ($technicianRecord) {
                            $referenceRepairOrder->setPrimaryTechnician($technicianRecord);
                        }

                        $this->em->persist($repairOrder);
                        $this->em->flush();

                        $closedRepairOrders[] = $repairOrder;
                    }
                }
            }
        }

        return $closedRepairOrders;
    }

    /**
     * @param $repairOrders
     *
     * @return array
     */
    public function closeRosWithoutKeys ($repairOrders): array {
        $closedRepairOrders = [];

        /** @var RepairOrder $repairOrder */
        foreach ($repairOrders as $repairOrder) {
            $headers = [
                "Accept-Encoding: gzip,deflate",
                "Content-Type: text/xml; charset=UTF-8",
                "SOAPAction: http://cdx.dealerbuilt.com/Api/0.99/IStandardApi/PullRepairOrderByNumber",
                "User-Agent: Jakarta Commons-HttpClient/3.1",
                "Host: cdx.dealerbuilt.com:443"
            ];

            $xmlPostString = '<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:arr="http://schemas.microsoft.com/2003/10/Serialization/Arrays" xmlns:deal="http://schemas.datacontract.org/2004/07/DealerBuilt.BaseApi" xmlns:deal1="http://schemas.datacontract.org/2004/07/DealerBuilt.Models.Service" xmlns:ns="http://cdx.dealerbuilt.com/Api/0.99/" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
            <SOAP-ENV:Header>
                <wsse:Security xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">
                    <wsse:UsernameToken wsu:Id="UsernameToken-4F23E153EDAE16D1E3151320297535313">
                        <wsse:Username>' . $this->username . '</wsse:Username>
                        <wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">' . $this->password . '</wsse:Password>
                        <wsse:Nonce EncodingType="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-soap-message-security-1.0#Base64Binary"></wsse:Nonce>
                        <wsu:Created>2017-12-13T22:09:35.353Z</wsu:Created>
                    </wsse:UsernameToken>
                </wsse:Security>
              </SOAP-ENV:Header>
              <SOAP-ENV:Body>
                    <ns:PullRepairOrderByNumber>
                        <!--Optional:-->
                        <ns:serviceLocationId>' . $this->serviceLocationId . '</ns:serviceLocationId>
                        <!--Optional:-->
                        <ns:repairOrderNumber>' . $repairOrder->getNumber() . '</ns:repairOrderNumber>
                    </ns:PullRepairOrderByNumber>
                </SOAP-ENV:Body>
            </SOAP-ENV:Envelope>';

            $headers[] = "Content-Length: " . strlen($xmlPostString);

            $result = $this->sendRequest($headers, $this->postUrl, $xmlPostString);

            if ($result) {
                $response     = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $result);
                $xml          = new SimpleXMLElement($response);
                $body         = $xml->xpath('//sBody')[0];
                $masterArray  = json_decode(json_encode((array)$body), true);
                $roAttributes = $masterArray['PullRepairOrderByNumberResponse']['PullRepairOrderByNumberResult']['aAttributes'];
                $status       = $roAttributes['bStatus'];

                if ($status == 'Posted' || $status == 'Closed') {
                    $closedDate = new DateTime();

                    try {
                        $roClosedDate = $roAttributes['bClosedStamp'];
                        $closedDate   = new DateTime($roClosedDate);
                    } catch (Exception $e) {
                        // nothing
                    }

                    $roValue = 0;

                    if (isset($roAttributes['bTotalAmount']['cAmount'])) {
                        $roValue = $roAttributes['bTotalAmount']['cAmount'];
                    }

                    $repairOrder->setDateClosed($closedDate)->setFinalValue($roValue);

                    $this->em->persist($repairOrder);
                    $this->em->flush();

                    $closedRepairOrders[] = $repairOrder;
                }
            }
        }

        return $closedRepairOrders;
    }
}
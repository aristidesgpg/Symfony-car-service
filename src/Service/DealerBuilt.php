<?php

namespace App\Service;

use App\Entity\RepairOrder;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\OptimisticLockException;
use Exception;
use SimpleXMLElement;
use Symfony\Component\Dotenv\Dotenv;

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
    private $serviceLocationId;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * AutoMate constructor.
     *
     * @param EntityManagerInterface $em
     * @param               $username
     * @param               $password
     * @param               $serviceLocationId
     */
    public function __construct (EntityManagerInterface $em) {
        $this->em = $em;

        $dotenv =  new Dotenv();
        $dotenv->load(__DIR__ . '/../../.env');

        $this->serviceLocationId = $_ENV['DEALERBUILT_LOCATION_ID'];

        parent::__construct($em);
    }

    /**
     * @return array
     * @throws Exception
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
                        <deal:MaxElapsedSinceUpdate>PT8760H</deal:MaxElapsedSinceUpdate>
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

        if ($result) {
            $response    = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $result);
            $xml         = new SimpleXMLElement($response);
            $body        = $xml->xpath('//sBody')[0];
            $masterArray = json_decode(json_encode((array)$body), true);

            if ($masterArray['PullRepairOrdersResponse']['PullRepairOrdersResult']) {
                foreach ($masterArray['PullRepairOrdersResponse']['PullRepairOrdersResult']['aRepairOrder'] as $repairOrder) {
                    if (!is_array($repairOrder)) {
                        $repairOrder = $masterArray['PullRepairOrdersResponse']['PullRepairOrdersResult']['aRepairOrder'];
                    }

                    if (array_key_exists('aAttributes', $repairOrder)) {
                        $roType = $repairOrder['aAttributes']['bType'];

                        if ($roType == 'InternalRepairOrder') {
                            continue;
                        }

                        $firstName        = '';
                        $lastName         = '';
                        $email            = '';
                        $customer         = $repairOrder['aReferences']['aROCustomer']['aAttributes']['bIdentity'];
                        $roNumber         = $repairOrder['aAttributes']['bRepairOrderNumber'];
                        $vehicle          = $repairOrder['aReferences']['aROVehicle']['aAttributes'];
                        $year             = !is_array($vehicle['bYear']) ? $vehicle['bYear'] : null;
                        $make             = !is_array($vehicle['bMake']) ? $vehicle['bMake'] : null;
                        $model            = !is_array($vehicle['bModel']) ? $vehicle['bModel'] : null;
                        $miles            = !is_array($repairOrder['aAttributes']['bMilesIn']) ? $repairOrder['aAttributes']['bMilesIn'] : null;
                        $vin              = !is_array($vehicle['bVin']) ? $vehicle['bVin'] : null;
                        $advisor          = $repairOrder['aAttributes']['bServiceAdvisor'];
                        $advisorFirstName = $advisor['cPersonalName']['cFirstName'];
                        $advisorLastName  = $advisor['cPersonalName']['cLastName'];
                        $date             = new DateTime();
                        $customerNumber   = '';
                        $roKey            = '';

                        if (isset($customer['cPersonalName']['cFirstName'])) {
                            $firstName = $customer['cPersonalName']['cFirstName'];
                        }

                        if (isset($customer['cPersonalName']['cLastName'])) {
                            $lastName = $customer['cPersonalName']['cLastName'];
                        }

                        // No first name, it's an internal RO so skip
                        if (!$firstName) {
                            continue;
                        }

                        if (!$lastName) {
                            $lastName = '';
                        }

                        if ($customer['cEmailAddress']) {
                            $email = $customer['cEmailAddress'];
                        }

                        if (isset($customer['cPhoneNumbers']['cPhoneNumber'])) {
                            $phoneNumbers = $customer['cPhoneNumbers']['cPhoneNumber'];

                            // Try to find a cell #
                            foreach ($phoneNumbers as $numberArray) {
                                // Not an array, just a number
                                if (!is_array($numberArray)) {
                                    $customerNumber = $numberArray;
                                    break;
                                }

                                $number = $numberArray['cDigits'];
                                $type   = $numberArray['cNumberType'];

                                // An array, return a number
                                if ($type == 'Mobile' || $type == 'Cell') {
                                    $customerNumber = $number;
                                    break;
                                }
                            }

                            $customerNumber = str_replace(['(', ')', ' ', '-'], '', $customerNumber);
                        }

                        if (isset($repairOrder['aAttributes']['bOpenedStamp']) && !empty($repairOrder['aAttributes']['bOpenedStamp'])) {
                            $date = new DateTime($repairOrder['aAttributes']['bOpenedStamp']);
                        }

                        if (isset($repairOrder['aROKey']) && !empty($repairOrder['aROKey'])) {
                            $roKey = $repairOrder['aROKey'];
                        }

                        $return[] = (object)[
                            'customer'   => (object)[
                                'name'          => $firstName . ' ' . $lastName,
                                'phone_numbers' => [$customerNumber],
                                'email'         => $email
                            ],
                            'number'     => $roNumber,
                            'ro_key'     => $roKey,
                            'date'       => $date,
                            'waiter'     => true, // boolean
                            'pickupDate' => null, // null|datetime object
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
    public function getClosedRoDetails ($repairOrders) {
        $rosWithKeys    = [];
        $rosWithoutKeys = [];

        /** @var RepairOrder $repairOrder */
        foreach ($repairOrders as $repairOrder) {
            if ($repairOrder->getRoKey()) {
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
     */
    public function closeRosWithKeys ($repairOrders) {
        $headers = [
            "Accept-Encoding: gzip,deflate",
            "Content-Type: text/xml; charset=UTF-8",
            "SOAPAction: http://cdx.dealerbuilt.com/Api/0.99/IStandardApi/PullRepairOrdersByKey",
            "User-Agent: Jakarta Commons-HttpClient/3.1",
            "Host: cdx.dealerbuilt.com:443"
        ];

        $repairOrderKeyString = '';
        /** @var RepairOrder $repairOrder */
        foreach ($repairOrders as $repairOrder) {
            $repairOrderKeyString .= "<arr:string>{$repairOrder->getRoKey()}</arr:string>";
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
                        $closedDate = $roAttributes['bClosedStamp'];
                        $closedDate = new DateTime($closedDate);
                        $roValue    = 0;

                        if (isset($roAttributes['bTotalAmount']['cAmount'])) {
                            $roValue = $roAttributes['bTotalAmount']['cAmount'];
                        }

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

                        $referenceRepairOrder->setClosedDate($closedDate)->setFinalValue($roValue);
                        if ($technicianRecord) {
                            $referenceRepairOrder->setTechnician($technicianRecord);
                        }
                        $this->em->persist($repairOrder);
                        try {
                            $this->em->flush();
                        } catch (OptimisticLockException $e) {
                            continue;
                        }
                    }
                }
            }
        }
    }

    /**
     * @param $repairOrders
     */
    public function closeRosWithoutKeys ($repairOrders) {
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
                $response    = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $result);
                $xml         = new SimpleXMLElement($response);
                $body        = $xml->xpath('//sBody')[0];
                $masterArray = json_decode(json_encode((array)$body), true);

                $roAttributes = $masterArray['PullRepairOrderByNumberResponse']['PullRepairOrderByNumberResult']['aAttributes'];
                $status       = $roAttributes['bStatus'];

                if ($status == 'Posted' || $status == 'Closed') {
                    $closedDate = $roAttributes['bClosedStamp'];
                    $closedDate = new DateTime($closedDate);
                    $roValue    = 0;

                    if (isset($roAttributes['bTotalAmount']['cAmount'])) {
                        $roValue = $roAttributes['bTotalAmount']['cAmount'];
                    }

                    $repairOrder->setClosedDate($closedDate)->setFinalValue($roValue);

                    $this->em->persist($repairOrder);
                    try {
                        $this->em->flush();
                    } catch (OptimisticLockException $e) {
                        continue;
                    }
                }
            }
        }
    }
}

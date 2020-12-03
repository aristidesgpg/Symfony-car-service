<?php

namespace App\Service;

use App\Entity\RepairOrder;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\OptimisticLockException;
use Exception;
use Symfony\Component\Dotenv\Dotenv;

/**
 * Class DealerTrack
 *
 * @package App\Service
 */
class DealerTrack extends SOAP {
    /**
     * @var string
     */
    private $eventServiceUrl = "https://ot.dms.dealertrack.com/serviceapi.asmx";

    /**
     * @var string
     */
    private $username = 'iServiceau';

    /**
     * @var string
     */
    private $password = 'G2it#ST!re';

    /**
     * @var string
     */
    private $enterprise;

    /**
     * @var string
     */
    private $company;

    /**
     * @var
     */
    private $server = 'arkonap.arkona.com';

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * DealerTrack constructor.
     *
     * @param EntityManagerInterface $em
     * @param               $enterprise
     * @param               $company
     */
    public function __construct (EntityManagerInterface $em) {
        $this->em         = $em;

        $dotenv = new Dotenv();
        $dotenv->load(__DIR__ . '/../../.env');
        
        $this->company = $_ENV['DEALERTRACK_COMPANY'];
        $this->enterprise = $_ENV['DEALERTRACK_ENTERPRISE'];

        parent::__construct($em);
    }

    /**
     * Enables Dev mode. Generally will break it unless you have params set to a valid staging account
     */
    public function enableDevMode () {
        $this->eventServiceUrl = "https://otstaging.arkona.com/opentrack/serviceapi.asmx";
    }

    /**
     * @return array
     * @throws Exception
     */
    public function getOpenRepairOrders () {
        $return        = [];
        $monthAgo      = date('Y-m-d\TH:i:s\Z', strtotime('-2 month'));
        $xmlPostString = '<?xml version="1.0" encoding="utf-8"?>
                            <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                                <soap:Header>
                                    <wsse:Security soap:mustUnderstand="1" xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">
                                       <wsse:UsernameToken>
                                          <wsse:Username>' . $this->username . '</wsse:Username>
                                          <wsse:Password>' . $this->password . '</wsse:Password>
                                       </wsse:UsernameToken>
                                    </wsse:Security>
                                </soap:Header>
                              <soap:Body>
                                <OpenRepairOrderLookup xmlns="opentrack.dealertrack.com">
                                  <Dealer>
                                    <CompanyNumber>' . $this->company . '</CompanyNumber>
                                    <EnterpriseCode>' . $this->enterprise . '</EnterpriseCode>
                                    <ServerName>' . $this->server . '</ServerName>
                                  </Dealer>
                                  <LookupParms>
                                      <ModifiedAfter>' . $monthAgo . '</ModifiedAfter>
                                      <RecordStatus></RecordStatus>
                                </LookupParms>
                                </OpenRepairOrderLookup>
                              </soap:Body>
                            </soap:Envelope>';

        $headers = [
            "Content-Type: text/xml; charset=utf-8",
            "Content-Length: " . strlen($xmlPostString),
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36",
            "SOAPAction: opentrack.dealertrack.com/OpenRepairOrderLookup"
        ];

        $result = $this->sendRequest($headers, $this->eventServiceUrl, $xmlPostString);

        if (!$result) {
            return [];
        }

        $cleanXml     = str_ireplace(['S:', 'ns2:', 'soap:', 'wsa:', 'wsu:', 'wsse:'], '', $result);
        $parsed       = simplexml_load_string($cleanXml, 'SimpleXMLElement', LIBXML_NOWARNING);
        $xml          = $parsed->Body->OpenRepairOrderLookupResult;
        $repairOrders = [];

        foreach ($xml->children() as $el) {
            array_push($repairOrders, json_decode(json_encode($el)));
        }

        if ($repairOrders) {
            foreach ($repairOrders as $repairOrder) {
                $openDate = new DateTime();
                if (isset($repairOrder->OpenTransactionDate)) {
                    $openDate = $repairOrder->OpenTransactionDate;
                    $openDate = substr($openDate, 0, 4) . '-' . substr($openDate, 4, 2) . '-' . substr($openDate, 6, 2);
                    $timeIn   = $repairOrder->TimeIn;
                    $timeIn   = str_pad($timeIn, 4, "0", STR_PAD_LEFT);
                    $timeIn   = substr($timeIn, 0, 2) . ':' . substr($timeIn, 2, 2) . ':00';
                    $openDate = $openDate . " " . $timeIn;
                    $openDate = new DateTime($openDate);
                }

                $pickupDate = false;
                if (isset($repairOrder->DateToArrive)) {
                    $pickupDate = $repairOrder->DateToArrive;

                    if ($pickupDate) {
                        $pickupDate = substr($pickupDate, 0, 4) . '-' . substr($pickupDate, 4, 2) . '-' . substr($pickupDate, 6, 2);
                        $pickupDate = new DateTime($pickupDate);
                    }
                }

                $return[] = (object)[
                    'customer'   => (object)[
                        'name'          => $repairOrder->CustomerName,
                        'phone_numbers' => $repairOrder->CustomerPhoneNumber ? [$repairOrder->CustomerPhoneNumber] : null,
                        'email'         => !is_object($repairOrder->CustomerEmail) ? $repairOrder->CustomerEmail : null
                    ],
                    'number'     => $repairOrder->RepairOrderNumber,
                    'ro_key'     => null,
                    'date'       => $openDate,
                    'waiter'     => ($pickupDate) ? false : true,
                    'pickupDate' => ($pickupDate) ? $pickupDate : null,
                    'year'       => $repairOrder->ModelYear,
                    'make'       => !is_object($repairOrder->Make) ? $repairOrder->Make : null,
                    'model'      => !is_object($repairOrder->Model) ? $repairOrder->Model : null,
                    'miles'      => $repairOrder->OdometerIn,
                    'vin'        => $repairOrder->VIN,
                    'advisor'    => (object)[
                        'id'         => $repairOrder->ServiceWriterID,
                        'first_name' => null,
                        'last_name'  => null
                    ]
                ];
            }
        }

        return $return;
    }

    /**
     * @param $repairOrders
     *
     * @return void
     */
    public function getClosedRoDetails ($repairOrders) {
        /** @var RepairOrder $repairOrder */
        foreach ($repairOrders as $repairOrder) {
            $xmlPostString = '<?xml version="1.0" encoding="utf-8"?>
                            <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">                                <soap:Header>
                                <wsse:Security soap:mustUnderstand="1" xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">                                       <wsse:UsernameToken>
                                      <wsse:Username>' . $this->username . '</wsse:Username>
                                      <wsse:Password>' . $this->password . '</wsse:Password>
                                   </wsse:UsernameToken>
                                </wsse:Security>
                            </soap:Header>
                            <soap:Body>
                                <GetClosedRepairOrderDetails xmlns="opentrack.dealertrack.com">
                                    <dealer>
                                        <CompanyNumber>' . $this->company . '</CompanyNumber>
                                        <EnterpriseCode>' . $this->enterprise . '</EnterpriseCode>
                                        <ServerName>' . $this->server . '</ServerName>
                                    </dealer>
                                    <request>
                                        <RepairOrderNumber>' . $repairOrder->getNumber() . '</RepairOrderNumber>
                                    </request>
                                </GetClosedRepairOrderDetails>
                            </soap:Body>
                        </soap:Envelope>';

            $headers = [
                "Content-Type: text/xml; charset=utf-8",
                "Content-Length: " . strlen($xmlPostString),
                "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36",
                "SOAPAction: opentrack.dealertrack.com/GetClosedRepairOrderDetails"
            ];

            $result = $this->sendRequest($headers, $this->eventServiceUrl, $xmlPostString);

            // No response
            if (!$result) {
                continue;
            }

            $cleanXml = str_ireplace(['S:', 'ns2:', 'soap:', 'wsa:', 'wsu:', 'wsse:'], '', $result);
            $parsed   = simplexml_load_string($cleanXml, 'SimpleXMLElement', LIBXML_NOWARNING);
            $details  = $parsed->Body->GetClosedRepairOrderDetailsResponse->GetClosedRepairOrderDetailsResult->ClosedRepairOrder;

            // Error or not closed
            if (!$details) {
                continue;
            }

            try {
                $closedDate = new DateTime();
                if ($details->FinalCloseDate && $details->FinalCloseDate != 0) {
                    $closedDate = $details->FinalCloseDate;
                    $closedDate = substr($closedDate, 0, 4) . '-' . substr($closedDate, 4, 2) . '-' . substr($closedDate, 6, 2);
                    $closedDate = new DateTime($closedDate);
                } else if ($details->CloseDate && $details->CloseDate != 0) {
                    $closedDate = $details->CloseDate;
                    $closedDate = substr($closedDate, 0, 4) . '-' . substr($closedDate, 4, 2) . '-' . substr($closedDate, 6, 2);
                    $closedDate = new DateTime($closedDate);
                }
            } catch (Exception $e) {
                continue;
            }

            $repairOrder->setClosedDate($closedDate)->setFinalValue($details->TotalSale);

            try {
                $this->em->persist($repairOrder);
                $this->em->flush();
            } catch (OptimisticLockException $e) {
                continue;
            }
        }
    }
}

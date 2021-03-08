<?php

namespace App\Service\DMS;

use App\Entity\DMSResult;
use App\Entity\Part;
use App\Entity\RepairOrder;
use App\Service\PhoneValidator;
use App\Service\ThirdPartyAPILogHelper;
use App\Soap\dealertrack\src\DealerTrackClosedSoapEnvelope;
use App\Soap\dealertrack\src\DealerTrackPartsEnvelope;
use App\Soap\dealertrack\src\DealerTrackSoapEnvelope;
use App\Soap\dealertrack\src\PartsResult;
use App\Soap\dealertrack\src\Result;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * Class DealerTrackClient.
 */
class DealerTrackClient extends AbstractDMSClient
{
    /**
     * @var string
     */
    private $eventServiceUrl = 'https://ot.dms.dealertrack.com/serviceapi.asmx';

    /**
     * @var string
     */
    private $wsdl = 'https://otstaging.arkona.com/opentrack/serviceapi.asmx?WSDL';

    //TODO Move to .env
    /**
     * @var string
     */
    private $username = 'iServiceau';

    /**
     * @var string
     */
    private $password = 'G2it#ST!re';

    /**
     * @var
     */
    private $server = 'arkonap.arkona.com';

    /**
     * @var string
     */
    private $enterprise;

    /**
     * @var string
     */
    private $company;

    /**
     * @var string
     */
    private $partsWsdl = '../src/Soap/dealertrack/dealertrack_parts.wsdl';

    public function __construct(EntityManagerInterface $entityManager, PhoneValidator $phoneValidator, ParameterBagInterface $parameterBag, ThirdPartyAPILogHelper $thirdPartyAPILogHelper)
    {
        parent::__construct($entityManager, $phoneValidator, $parameterBag, $thirdPartyAPILogHelper);

        $this->company = $parameterBag->get('dealertrack_company');
        $this->enterprise = $parameterBag->get('dealertrack_enterprise');

        if ('dev' == $parameterBag->get('app_env')) {
            $this->company = 'ZE7';
            $this->enterprise = 'ZE';
            $this->eventServiceUrl = 'https://otstaging.arkona.com/opentrack/serviceapi.asmx';
        }

        $this->init();
    }

    public function init(): void
    {
        $this->buildSerializer('../src/Soap/dealertrack/metadata', 'App\Soap\dealertrack\src');
        $this->initializeSoapClient($this->getWsdl());
    }

    public function getOpenRepairOrders(): array
    {
        $repairOrders = [];

        if ($this->getSoapClient()) {
            $this->getSoapClient()->__setSoapHeaders($this->createWSSUsernameToken($this->getUsername(), $this->getPassword()));

            $monthAgo = (new \DateTime())->modify('-2 month')->format('Y-m-d\TH:i:s\Z');
            $monthAhead = (new \DateTime())->modify('+1 month')->format('Y-m-d\TH:i:s\Z');
            $oneYearAgo = (new \DateTime())->modify('-1 year')->format('Y-m-d\TH:i:s\Z');

            $request = [
                'Dealer' => [
                    'CompanyNumber' => $this->getCompany(),
                    'EnterpriseCode' => $this->getEnterprise(),
                    'ServerName' => $this->getServer(),
                ],
                'LookupParms' => [
                    'ModifiedAfter' => $monthAgo,
                    'CreatedDateTimeStart' => $oneYearAgo,
                    'CreatedDateTimeEnd' => $monthAhead,
                ],
            ];

            $soapResult = $this->sendSoapCall('OpenRepairOrderLookup', [$request], true);

            $response = $this->getSerializer()->deserialize($soapResult, DealerTrackSoapEnvelope::class, 'xml');
            if (!$response) {
                return $repairOrders;
            }

            /**
             * @var Result $result
             */
            foreach ($response->getBody()->getOpenRepairOrderLookupResult()->getResult() as $result) {
                $dmsResult = new DMSResult();
                $dmsResult->setRaw($result);

                $openDate = new \DateTime();
                try {
                    $openDate = new \DateTime(sprintf('%s%04d00', $result->getOpenTransactionDate(), $result->getTimeIn()));
                } catch (\Exception $e) {
                    //ignore
                }

                //TODO This needs checked on... Couldn't find any with DateToArrive != 0.
                $pickupDate = false;
                if ($result->getDateToArrive() > 0) {
                    try {
                        $openDate = new \DateTime($result->getDateToArrive());
                    } catch (\Exception $e) {
                        //ignore
                    }
                }
                //Customer
                $dmsResult->getCustomer()
                    ->setName($result->getCustomerName())
                    ->setPhoneNumbers($this->phoneNormalizer($result->getCustomerPhoneNumber()))
                    ->setEmail($result->getCustomerEmail());

                //Repair Order
                $dmsResult
                    ->setNumber($result->getRepairOrderNumber())
                    ->setDate($openDate)
                    ->setWaiter(($pickupDate) ? false : true)
                    ->setPickupDate(($pickupDate) ? $pickupDate : null)
                    ->setYear($result->getModelYear())
                    ->setMake($result->getMake())
                    ->setModel($result->getModel())
                    ->setMiles($result->getOdometerIn())
                    ->setVin($result->getVIN())
                    ->setInitialROValue($result->getTotalEstimate());

                //TODO, someitmes ServiceWriterId is a string. What should we do?
                //  -serviceWriterID: "MM"
                if (is_int($result->getServiceWriterID())) {
                    $dmsResult->getAdvisor()->setId($result->getServiceWriterID());
                }

                $repairOrders[] = $dmsResult;
            }
        }

        return $repairOrders;
    }

    public function getClosedRoDetails(array $openRepairOrders): array
    {
        $closedRepairOrders = [];
//        $monthAgo = (new \DateTime())->modify('-2 month')->format('Y-m-d\TH:i:s\Z');
//        $monthAhead = (new \DateTime())->modify('+1 month')->format('Y-m-d\TH:i:s\Z');
//        $sixYearsAgo = (new \DateTime())->modify('-6 year')->format('Y-m-d\TH:i:s\Z');
        /**
         * @var RepairOrder $repairOrder
         */
        foreach ($openRepairOrders as $repairOrder) {
            if ($this->getSoapClient()) {
                $this->getSoapClient()->__setSoapHeaders($this->createWSSUsernameToken($this->getUsername(), $this->getPassword()));

                $request = [
                    'dealer' => [
                        'CompanyNumber' => $this->getCompany(),
                        'EnterpriseCode' => $this->getEnterprise(),
                        'ServerName' => $this->getServer(),
                    ],
                    'request' => [
                        'RepairOrderNumber' => $repairOrder->getNumber(),
                    ],
//                    'request' => [
//                        'RepairOrderNumber' => 6006036,
//                    ],
//                    'request' => [
//                        'ModifiedAfter' => $monthAgo,
//                        'CreatedDateTimeStart' => $sixYearsAgo,
//                        'CreatedDateTimeEnd' => $monthAhead,
//                        'CustomerNumber' => 0,
//                        'FinalCloseDateEnd' => $monthAhead,
//                        'FinalCloseDateStart' => $sixYearsAgo,
//                    ],
                ];

                $soapResult = $this->sendSoapCall('GetClosedRepairOrderDetails', [$request], true);
                //$soapResult = $this->sendSoapCall('GetClosedRepairOrders', [$request], true);

                /**
                 * @var DealerTrackClosedSoapEnvelope $response
                 */
                $response = $this->getSerializer()->deserialize($soapResult, DealerTrackClosedSoapEnvelope::class, 'xml');
                if (!$response) {
                    continue;
                }

                $closedRepairOrder = $response->getBody()->getgetClosedRepairOrderDetailsResponse()->getGetClosedRepairOrderDetailsResult()->getClosedRepairOrder();
                if (!$closedRepairOrder) {
                    continue;
                }

                $closedDate = new \DateTime();
                try {
                    if (0 != $closedRepairOrder->getFinalCloseDate()) {
                        $closedDate = new \DateTime($closedRepairOrder->getFinalCloseDate());
                    } elseif (0 != $closedRepairOrder->getCloseDate()) {
                        $closedDate = new \DateTime($closedRepairOrder->getCloseDate());
                    }
                } catch (\Exception $e) {
                    continue;
                }
                $repairOrder->setDateClosed($closedDate)->setFinalValue($closedRepairOrder->getTotalSale());
                $this->getEntityManager()->persist($repairOrder);
                $this->getEntityManager()->flush();
                $closedRepairOrders[] = $repairOrder;
            }
        }

        return $closedRepairOrders;
    }

    public function getParts(): array
    {
        $parts = [];
        $partStatuses = [
            'A', //Active
            'C', //Core
            'P', //Phase Out
            'N', //Non Stock
            'R', //Replaced
            'O', //Obsolete
        ];

        $this->initializeSoapClient($this->getPartsWsdl());

        foreach ($partStatuses as $status) {
            $parts = array_merge($parts, $this->getPartsByStatus($status));
        }

        return $parts;
    }

    public function getPartsByStatus(string $status): array
    {
        $parts = [];

        if ($this->getSoapClient()) {
            $this->getSoapClient()->__setSoapHeaders($this->createWSSUsernameToken($this->getUsername(), $this->getPassword()));

            $request = [
                'Dealer' => [
                    'CompanyNumber' => $this->getCompany(),
                    'EnterpriseCode' => $this->getEnterprise(),
                    'ServerName' => $this->getServer(),
                ],
                'InventoryParms' => [
                    'Status' => $status,
                ],
            ];

            $soapResult = $this->sendSoapCall('PartsInventory', [$request], true);
            if (!$soapResult) {
                return $parts;
            }
            $response = $this->getSerializer()->deserialize($soapResult, DealerTrackPartsEnvelope::class, 'xml');
            if (!$response) {
                return $parts;
            }

            /**
             * @var PartsResult $result
             */
            foreach ($response->getBody()->getPartsInventoryResult()->getResult() as $result) {
                $part = (new Part())
                    ->setNumber($result->getPartNumber())
                    ->setName($result->getPartDescription())
                    ->setBin($result->getBinLocation())
                    ->setAvailable($result->getQuantity());

                $parts[] = $part;
            }
        }

        return $parts;
    }

    public function getEventServiceUrl(): string
    {
        return $this->eventServiceUrl;
    }

    public function setEventServiceUrl(string $eventServiceUrl): void
    {
        $this->eventServiceUrl = $eventServiceUrl;
    }

    public function getWsdl(): string
    {
        return $this->wsdl;
    }

    public function setWsdl(string $wsdl): void
    {
        $this->wsdl = $wsdl;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
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

    /**
     * @return mixed
     */
    public function getServer(): string
    {
        return $this->server;
    }

    /**
     * @param mixed $server
     */
    protected function setServer(string $server): void
    {
        $this->server = $server;
    }

    public function getEnterprise(): string
    {
        return $this->enterprise;
    }

    public function setEnterprise(string $enterprise): void
    {
        $this->enterprise = $enterprise;
    }

    public function getCompany(): string
    {
        return $this->company;
    }

    public function setCompany(string $company): void
    {
        $this->company = $company;
    }

    public static function getDefaultIndexName(): string
    {
        return 'usingDealerTrack';
    }

    public function getPartsWsdl(): string
    {
        return $this->partsWsdl;
    }

    public function setPartsWsdl(string $partsWsdl): void
    {
        $this->partsWsdl = $partsWsdl;
    }
}

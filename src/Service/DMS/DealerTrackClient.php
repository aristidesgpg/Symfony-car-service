<?php

namespace App\Service\DMS;

use App\Entity\DMSResult;
use App\Entity\RepairOrder;
use App\Service\PhoneValidator;
use App\Service\ThirdPartyAPILogHelper;
use App\Soap\dealertrack\src\DealerTrackRequestSoapEnvelope;
use App\Soap\dealertrack\src\DealerTrackSoapEnvelope;
use App\Soap\dealertrack\src\Result;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

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

    public function init()
    {
        $this->buildSerializer('../src/Soap/dealertrack/metadata', 'App\Soap\dealertrack\src');
        $this->initializeSoapClient($this->getWsdl());
    }

    public function getOpenRepairOrders()
    {
        $repairOrders = [];

        if ($this->getSoapClient()) {
            $this->getSoapClient()->__setSoapHeaders($this->createWSSUsernameToken($this->getUsername(), $this->getPassword()));

            $monthAgo = (new \DateTime())->modify('-2 month')->format('Y-m-d\TH:i:s\Z');
            $monthAhead = (new \DateTime())->modify('+1 month')->format('Y-m-d\TH:i:s\Z');
            //TODO Do not think we will need to go as far back for production.
            $sixYearsAgo = (new \DateTime())->modify('-6 year')->format('Y-m-d\TH:i:s\Z');

            $request = [
                'Dealer' => [
                    'CompanyNumber' => $this->getCompany(),
                    'EnterpriseCode' => $this->getEnterprise(),
                    'ServerName' => $this->getServer(),
                ],
                'LookupParms' => [
                    'ModifiedAfter' => $monthAgo,
                    'CreatedDateTimeStart' => $sixYearsAgo,
                    'CreatedDateTimeEnd' => $monthAhead,
                ],
            ];

            $soapResult = $this->sendSoapCall('OpenRepairOrderLookup', [$request], true);

            $response = $this->getSerializer()->deserialize($soapResult, DealerTrackSoapEnvelope::class, 'xml');
            if (!$response) {
                return $repairOrders;
            }

            dump($response->getBody()->getOpenRepairOrderLookupResult()->getResult());
            /**
             * @var Result $result
             */
            foreach ($response->getBody()->getOpenRepairOrderLookupResult()->getResult() as $result) {
                dump($result);
                $dmsResult = new DMSResult();

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
                        dd('Bad DateToArrive Date.');
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
                    ->setVin($result->getVIN());


                //TODO, someitmes ServiceWriterId is a string. What should we do?
                //  -serviceWriterID: "MM"
                if(is_int($result->getServiceWriterID())){
                    $dmsResult->getAdvisor()->setId($result->getServiceWriterID());
                }


                $repairOrders[] = $dmsResult;
            }
        }
        dump($repairOrders);
        return $repairOrders;
    }

    //TODO This Needs Tested. Couldn't find one not closed.
    public function getClosedRoDetails(array $openRepairOrders)
    {

        /**
         * @var RepairOrder $repairOrder
         */
        foreach($openRepairOrders as $repairOrder){
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
                ];

                $soapResult = $this->sendSoapCall('GetClosedRepairOrderDetails', [$request], true);

                dump($soapResult);
                $response = $this->getSerializer()->deserialize($soapResult, DealerTrackRequestSoapEnvelope::class, 'xml');

                dump($response);
                if (!$response) {
                    continue;
                }
                //TODO, STILL NEED TO IMPLEMENT
                /*
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

            $repairOrder->setDateClosed($closedDate)->setFinalValue($details->TotalSale);

            try {
                $this->em->persist($repairOrder);
                $this->em->flush();
            } catch (OptimisticLockException $e) {
                continue;
            }
                 */

            }
        }
    }

    public static function getDefaultIndexName(): string
    {
        return 'usingDealerTrack';
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
    public function setServer(string $server): void
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
}

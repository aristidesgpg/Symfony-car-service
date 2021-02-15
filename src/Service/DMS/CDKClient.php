<?php

namespace App\Service\DMS;

use App\Entity\DMSResult;
use App\Entity\RepairOrder;
use App\Service\PhoneValidator;
use App\Service\ThirdPartyAPILogHelper;
use App\Soap\cdk\src\ServiceRepairOrderClosed;
use App\Soap\cdk\src\ServiceRepairOrderOpen;
use App\Soap\cdk\src\ServiceRODetailClosed;
use App\Soap\cdk\src\ServiceRODetailOpen;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class CDKClient extends AbstractDMSClient
{
    /**
     * @var string
     */
    private $username = 'iserviceauto';

    /**
     * @var string
     */
    private $password = 'jSarJLFv0rkL';

    /**
     * @var string
     */
    private $authentication;

    /**
     * @var string
     */
    private $dealerID;

    /**
     * @var string
     */
    private $openROExtractURL;

    /**
     * @var string
     */
    private $singleROExtractURL;

    /**
     * @var string
     */
    private $closedROExtractURL;

    /**
     * @var string
     */
    private $baseURI;

    private $client;

    public function __construct(EntityManagerInterface $entityManager, PhoneValidator $phoneValidator, ParameterBagInterface $parameterBag, ThirdPartyAPILogHelper $thirdPartyAPILogHelper)
    {
        parent::__construct($entityManager, $phoneValidator, $parameterBag, $thirdPartyAPILogHelper);

        $this->dealerID = $parameterBag->get('cdk_dealer_id');
        $this->authentication = $this->username.':'.$this->password;
        $today = (new \DateTime())->format('m/d/Y');

        $this->baseURI = 'https://3pa.dmotorworks.com/pip-extract/';
        $this->openROExtractURL = 'service-ro-open/extract?dealerId='.$this->dealerID.'&queryId=SROD_Open_WIP';
        $this->singleROExtractURL = 'service-ro-open/extract?dealerId='.$this->dealerID.'&queryId=SROD_ByRONumber&timeoutSeconds=2700&qparamRONum=';
        $this->closedROExtractURL = 'service-ro-closed/extract?dealerId='.$this->dealerID.'&queryId=SROD_Closed_DateRange&qparamStartDate='.$today.'&qparamEndDate='.$today;

        if ('dev' == $parameterBag->get('app_env')) {
            $this->baseURI = 'https://uat-3pa.dmotorworks.com/pip-extract/';
            $this->openROExtractURL = 'service-ro-open/extract?dealerId='.$this->dealerID.'&queryId=SROD_Open_WIP';
            $this->singleROExtractURL = 'service-ro-open/extract?dealerId='.$this->dealerID.'&queryId=SROD_ByRONumber&timeoutSeconds=2700&qparamRONum=';
            $this->closedROExtractURL = 'service-ro-closed/extract?dealerId='.$this->dealerID.'&queryId=SROD_Closed_DateRange&qparamStartDate='.$today.'&qparamEndDate='.$today;

            $this->closedROExtractURL = 'service-ro-closed/extract?dealerId='.$this->dealerID.'&queryId=SROD_Closed_DateRange&qparamStartDate=1/1/2020&qparamEndDate=12/31/2020';
        }

        $this->init();
    }

    public function init()
    {
        $this->buildSerializer('../src/Soap/cdk/metadata', 'App\Soap\cdk\src');

        $options = ['auth' => [$this->getUsername(), $this->getPassword()]];
        $this->initializeGuzzleClient($this->getBaseURI(), $options);
    }

    public function getOpenRepairOrders()
    {
        $repairOrders = [];

        if ($this->getGuzzleClient()) {
            $rawResponse = $this->sendGuzzleRequest($this->getOpenROExtractURL());
            if ($rawResponse) {
                // Not an error, but logs the request/response for compliance
                // If there is an error, then we log when we do the guzzle request.
                $this->logError($this->getBaseURI().$this->getOpenROExtractURL(), $rawResponse, true);
            }
            dump($rawResponse);
            $response = $this->getSerializer()->deserialize($rawResponse, ServiceRODetailOpen::class, 'xml');
            dd($response);
            if (!$response) {
                return $repairOrders;
            }

            if (0 != $response->getErrorCode()) {
                $this->logError($this->getBaseURI().$this->getOpenROExtractURL(), $response->getErrorMessage(), true);
            }

            /**
             * @var ServiceRepairOrderOpen $repairOrder
             */
            foreach ($response->getServiceRepairOrderOpen() as $repairOrder) {
                $ro = $this->extractROInfo($repairOrder);
                if (!$ro) {
                    continue;
                }

                $repairOrders[] = $ro;
            }

            dd($response);
        }

        return $repairOrders;
    }

    public function getClosedRoDetails(array $entityRepairOrders)
    {
        // Collect all the ro numbers in an array to compare against
        $openRepairOrderNumbers = [];
        $closedRepairOrders     = [];

        /** @var RepairOrder $entityRepairOrder */
        foreach ($entityRepairOrders as $entityRepairOrder) {
            $openRepairOrderNumbers[] = $entityRepairOrder->getNumber();
        }

        if ($this->getGuzzleClient()) {
            $rawResponse = $this->sendGuzzleRequest($this->getClosedROExtractURL());
            if ($rawResponse) {
                // Not an error, but logs the request/response for compliance
                // If there is an error, then we log when we do the guzzle request.
                $this->logError($this->getBaseURI().$this->getOpenROExtractURL(), $rawResponse, true);
            }
            dump($rawResponse);
            $response = $this->getSerializer()->deserialize($rawResponse, ServiceRODetailClosed::class, 'xml');

            if (!$response) {
                return $closedRepairOrders;
            }

            if (0 != $response->getErrorCode()) {
                $this->logError($this->getBaseURI().$this->getOpenROExtractURL(), $response->getErrorMessage(), true);
            }

            /**
             * @var ServiceRepairOrderClosed $repairOrder
             */
            foreach ($response->getServiceRepairOrderClosed() as $repairOrder) {
                //$ro = $this->extractROInfo($repairOrder);
                if(!$repairOrder->getRONumber()){
                    continue;
                }

                // It's not in the list of open ROs so skip
                if (!in_array($repairOrder->getRONumber(), $openRepairOrderNumbers)) {
                    continue;
                }

                // Make sure it's closed
                if('CLOSED' != $repairOrder->getStatusDesc()){
                    continue;
                }


                $closedDate = new \DateTime();
                if($repairOrder->getClosedDate()){
                    $closedDate = $repairOrder->getClosedDate();
                }

                $entityRepairOrder = $this->getEntityManager()->getRepository(RepairOrder::class)->findOneBy(['number' => $repairOrder->getRONumber()]);
                if($entityRepairOrder){
                    $entityRepairOrder
                        ->setDateClosed($closedDate)
                        ->setFinalValue($repairOrder->getPayCPTotal());
                    $this->getEntityManager()->persist($entityRepairOrder);
                    $this->getEntityManager()->flush();
                    $closedRepairOrders[] = $repairOrder;
                }



            }

            dd($response);
        }

        return $closedRepairOrders;
    }

    /**
     * Checks if the passed RO# exists in the DMS and pulls it if it does.
     *
     * @param $RONumber
     *
     * @return false|object
     */
    public function addRepairOrderByNumber($RONumber)
    {
        $repairOrder = null;

        if ($this->getGuzzleClient()) {
            $rawResponse = $this->sendGuzzleRequest($this->getSingleROExtractURL() . $RONumber);
            if ($rawResponse) {
                // Not an error, but logs the request/response for compliance
                // If there is an error, then we log when we do the guzzle request.
                $this->logError($this->getBaseURI().$this->getOpenROExtractURL(), $rawResponse, true);
            }
            dump($rawResponse);
            $response = $this->getSerializer()->deserialize($rawResponse, ServiceRODetailOpen::class, 'xml');

            if (!$response) {
                return $repairOrder;
            }

            if (0 != $response->getErrorCode()) {
                $this->logError($this->getBaseURI().$this->getOpenROExtractURL(), $response->getErrorMessage(), true);
            }

            /**
             * @var ServiceRepairOrderOpen $repairOrder
             */
            foreach ($response->getServiceRepairOrderOpen() as $repairOrder) {
                $ro = $this->extractROInfo($repairOrder);
                if (!$ro) {
                    continue;
                }

                $repairOrder = $ro;
            }

            dd($response);
        }

        return $repairOrder;
    }

    private function extractROInfo($repairOrder)
    {
        dump($repairOrder);
        $dmsResult = new DMSResult();

        //name
        $name = $repairOrder->getName1();
        if (!$name) {
            $name = $repairOrder->getName2();
        }

        // Still no name, probably an internal RO, skip
        if (!$name) {
            return null;
        }
        $namePieces = explode(',', $name);
        // Probably an internal RO, skip
        if (!isset($namePieces[1])) {
            return null;
        }

        $dmsResult->getCustomer()->setName($namePieces[1].' '.$namePieces[0]);

        $dmsResult->getCustomer()->setPhoneNumbers($this->phoneNormalizer($repairOrder->getPhoneNumber()));

        $dmsResult->getCustomer()->setEmail($repairOrder->getContactEmailAddress());
        $dmsResult->setNumber($repairOrder->getRONumber());
        if (!$dmsResult->getNumber()) {
            return null;
        }

        try {
            $dmsResult->setDate((new \DateTime($repairOrder->getOpenDate().' '.$repairOrder->getOpenTime())));
        } catch (\Exception $e) {
            //nothing
        }

        $dmsResult->setWaiter('N' == $repairOrder->getWaiterFlag() ? false : true);

        try {
            $dmsResult->setDate((new \DateTime($repairOrder->getEstComplDate().' '.$repairOrder->getEstComplTime())));
        } catch (\Exception $e) {
            //nothing
        }

        $dmsResult
            ->setYear($repairOrder->getYear())
            ->setMake($repairOrder->getMakeDesc())
            ->setModel($repairOrder->getModelDesc())
            ->setVin($repairOrder->getVIN())
            ->setMiles($repairOrder->getMileage())
            ->getAdvisor()->setId($repairOrder->getServiceAdvisor());

        // No MakeDesc, it's preferred because this is usually an abbreviation
        if (!$dmsResult->getMake()) {
            $dmsResult->setMake($repairOrder->getMake());
        }
        // No ModelDesc, it's preferred because this is usually an abbreviation
        if (!$dmsResult->getModel()) {
            $dmsResult->setModel($repairOrder->getModel());
        }
    }

    public function phoneNormalizer($phoneNumbers)
    {
        //parent::__construct($entityManager, $phoneValidator, $parameterBag, $thirdPartyAPILogHelper);
        if (is_array($phoneNumbers)) {
            foreach ($phoneNumbers as $p) {
                $result = parent::phoneNormalizer($p->value());
                if ($result) {
                    return $result;
                }
            }
            //No valid mobile found.
            return null;
        }

        return parent::phoneNormalizer($phoneNumbers->value());
    }

    public static function getDefaultIndexName()
    {
        return 'usingCdk';
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

    public function getAuthentication(): string
    {
        return $this->authentication;
    }

    public function setAuthentication(string $authentication): void
    {
        $this->authentication = $authentication;
    }

    public function getDealerID(): string
    {
        return $this->dealerID;
    }

    public function setDealerID(string $dealerID): void
    {
        $this->dealerID = $dealerID;
    }

    public function getOpenROExtractURL(): string
    {
        return $this->openROExtractURL;
    }

    public function setOpenROExtractURL(string $openROExtractURL): void
    {
        $this->openROExtractURL = $openROExtractURL;
    }

    public function getSingleROExtractURL(): string
    {
        return $this->singleROExtractURL;
    }

    public function setSingleROExtractURL(string $singleROExtractURL): void
    {
        $this->singleROExtractURL = $singleROExtractURL;
    }

    public function getClosedROExtractURL(): string
    {
        return $this->closedROExtractURL;
    }

    public function setClosedROExtractURL(string $closedROExtractURL): void
    {
        $this->closedROExtractURL = $closedROExtractURL;
    }

    public function getBaseURI(): string
    {
        return $this->baseURI;
    }

    public function setBaseURI(string $baseURI): void
    {
        $this->baseURI = $baseURI;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client): void
    {
        $this->client = $client;
    }
}

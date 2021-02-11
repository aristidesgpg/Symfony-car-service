<?php

namespace App\Service\DMS;

use App\Entity\DMSResult;
use App\Service\PhoneValidator;
use App\Service\ThirdPartyAPILogHelper;
use App\Soap\cdk\src\ServiceRepairOrderOpen;
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
                if(!$ro){
                    continue;
                }

                $repairOrders[] = $ro;
            }

            dd($response);
        }

        return $repairOrders;
    }

    public function getClosedRoDetails(array $openRepairOrders)
    {
        // TODO: Implement getClosedRoDetails() method.
    }

    private function extractROInfo (ServiceRepairOrderOpen $repairOrder) {
        dump($repairOrder);
        $dmsResult = new DMSResult();

        //name
        $name = $repairOrder->getName1();
        if(!$name){
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

        $dmsResult->getCustomer()->setName($namePieces[1] . ' ' . $namePieces[0]);
        dd($repairOrder->getPhoneNumber());
        $dmsResult->getCustomer()->setPhoneNumbers($this->phoneNormalizer($repairOrder->getPhoneNumber()));

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

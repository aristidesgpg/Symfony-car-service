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
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Class CDKClient.
 */
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

    /**
     * @var
     */
    private $client;

    public function __construct(EntityManagerInterface $entityManager, PhoneValidator $phoneValidator, ParameterBagInterface $parameterBag, ThirdPartyAPILogHelper $thirdPartyAPILogHelper)
    {
        parent::__construct($entityManager, $phoneValidator, $parameterBag, $thirdPartyAPILogHelper);

        $this->dealerID = $parameterBag->get('cdk_dealer_id');
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

            //TODO Only used for testing.
            $this->closedROExtractURL = 'service-ro-closed/extract?dealerId='.$this->dealerID.'&queryId=SROD_Closed_DateRange&qparamStartDate=1/1/2020&qparamEndDate=12/31/2020';
        }

        $this->init();
    }

    public function init(): void
    {
        $this->buildSerializer('../src/Soap/cdk/metadata', 'App\Soap\cdk\src');

        $options = ['auth' => [$this->getUsername(), $this->getPassword()]];
        $this->initializeGuzzleClient($this->getBaseURI(), $options);
    }

    public function getOpenRepairOrders(): array
    {
        $repairOrders = [];

        if ($this->getGuzzleClient()) {
            $response = $this->sendRequest($this->getOpenROExtractURL(), ServiceRODetailOpen::class);
            if (!$response) {
                return $repairOrders;
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
        }

        return $repairOrders;
    }

    public function getClosedRoDetails(array $entityRepairOrders): array
    {
        // Collect all the ro numbers in an array to compare against
        $openRepairOrderNumbers = [];
        $closedRepairOrders = [];

        /** @var RepairOrder $entityRepairOrder */
        foreach ($entityRepairOrders as $entityRepairOrder) {
            $openRepairOrderNumbers[] = $entityRepairOrder->getNumber();
        }

        if ($this->getGuzzleClient()) {
            $response = $this->sendRequest($this->getClosedROExtractURL(), ServiceRODetailClosed::class);
            if (!$response) {
                return $closedRepairOrders;
            }

            /**
             * @var ServiceRepairOrderClosed $repairOrder
             */
            foreach ($response->getServiceRepairOrderClosed() as $repairOrder) {
                if (!$repairOrder->getRONumber()) {
                    continue;
                }

                // It's not in the list of open ROs so skip
                if (!in_array($repairOrder->getRONumber(), $openRepairOrderNumbers)) {
                    continue;
                }

                // Make sure it's closed
                if ('CLOSED' != $repairOrder->getStatusDesc()) {
                    continue;
                }

                $closedDate = new \DateTime();
                if ($repairOrder->getClosedDate()) {
                    $closedDate = $repairOrder->getClosedDate();
                }

                $entityRepairOrder = $this->getEntityManager()->getRepository(RepairOrder::class)->findOneBy(['number' => $repairOrder->getRONumber()]);
                if ($entityRepairOrder) {
                    $entityRepairOrder
                        ->setDateClosed($closedDate)
                        ->setFinalValue($repairOrder->getPayCPTotal());
                    $this->getEntityManager()->persist($entityRepairOrder);
                    $this->getEntityManager()->flush();
                    $closedRepairOrders[] = $repairOrder;
                }
            }
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
            $response = $this->sendRequest($this->getSingleROExtractURL().$RONumber, ServiceRODetailOpen::class);

            if (!$response) {
                return $repairOrder;
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
        }

        return $repairOrder;
    }

    /**
     * @param $url
     * @param $deserializationClass
     *
     * @return mixed|null
     */
    private function sendRequest($url, $deserializationClass)
    {
        $rawResponse = $this->sendGuzzleRequest($url);
        if ($rawResponse) {
            // Not an error, but logs the request/response for compliance
            // If there is an error, then we log when we do the guzzle request.
            $this->logError($this->getBaseURI().$this->getOpenROExtractURL(), $rawResponse, true);
        }

        $response = $this->getSerializer()->deserialize($rawResponse, $deserializationClass, 'xml');

        if (!$response) {
            return null;
        }

        if (0 != $response->getErrorCode()) {
            $this->logError($this->getBaseURI().$this->getOpenROExtractURL(), $response->getErrorMessage(), true);
        }

        return $response;
    }

    /**
     * @param $repairOrder
     *
     * @return null
     */
    private function extractROInfo($repairOrder): ?DMSResult
    {
        $dmsResult = new DMSResult();
        $dmsResult->setRaw($repairOrder);

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

        //Try to find a number.
        $phoneNumber = $this->phoneNormalizer($repairOrder->getPhoneNumber());

        if(!$phoneNumber){
            return null;
        }

        $dmsResult->getCustomer()->setPhoneNumbers($phoneNumber);

        $dmsResult->getCustomer()->setEmail($repairOrder->getContactEmailAddress()->value());
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

        $initialRoValue = 0;
        foreach ($repairOrder->getTotRoSalePostDed() as $value) {
            $initialRoValue += $value->value();
        }

        $dmsResult
            ->setYear($repairOrder->getYear())
            ->setMake($repairOrder->getMakeDesc())
            ->setModel($repairOrder->getModelDesc())
            ->setVin($repairOrder->getVIN())
            ->setMiles($repairOrder->getMileage())
            ->setInitialROValue($initialRoValue)
            ->getAdvisor()->setId($repairOrder->getServiceAdvisor());

        // No MakeDesc, it's preferred because this is usually an abbreviation
        if (!$dmsResult->getMake()) {
            $dmsResult->setMake($repairOrder->getMake());
        }
        // No ModelDesc, it's preferred because this is usually an abbreviation
        if (!$dmsResult->getModel()) {
            $dmsResult->setModel($repairOrder->getModel());
        }

        return $dmsResult;
    }

    /**
     * @param $phoneNumbers
     *
     * @return null
     */
    public function phoneNormalizer($phoneNumbers): ?string
    {
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

    public function getParts(): array
    {
        throw new AccessDeniedException('Not Implemented for this DMS.');
    }

    /**
     * @return string
     */
    public static function getDefaultIndexName(): string
    {
        return 'usingCdk';
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
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
     * @return string
     */
    public function getDealerID(): string
    {
        return $this->dealerID;
    }

    /**
     * @param string $dealerID
     */
    public function setDealerID(string $dealerID): void
    {
        $this->dealerID = $dealerID;
    }

    /**
     * @return string
     */
    public function getOpenROExtractURL(): string
    {
        return $this->openROExtractURL;
    }

    /**
     * @param string $openROExtractURL
     */
    public function setOpenROExtractURL(string $openROExtractURL): void
    {
        $this->openROExtractURL = $openROExtractURL;
    }

    /**
     * @return string
     */
    public function getSingleROExtractURL(): string
    {
        return $this->singleROExtractURL;
    }

    /**
     * @param string $singleROExtractURL
     */
    public function setSingleROExtractURL(string $singleROExtractURL): void
    {
        $this->singleROExtractURL = $singleROExtractURL;
    }

    /**
     * @return string
     */
    public function getClosedROExtractURL(): string
    {
        return $this->closedROExtractURL;
    }

    /**
     * @param string $closedROExtractURL
     */
    public function setClosedROExtractURL(string $closedROExtractURL): void
    {
        $this->closedROExtractURL = $closedROExtractURL;
    }

    /**
     * @return string
     */
    public function getBaseURI(): string
    {
        return $this->baseURI;
    }

    /**
     * @param string $baseURI
     */
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

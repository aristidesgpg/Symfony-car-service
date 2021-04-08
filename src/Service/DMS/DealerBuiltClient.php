<?php

namespace App\Service\DMS;

use App\Entity\DMSResult;
use App\Entity\Part;
use App\Entity\Parts;
use App\Entity\RepairOrder;
use App\Service\PhoneValidator;
use App\Service\ThirdPartyAPILogHelper;
use App\Soap\dealerbuilt\src\BaseApi\InventoryPartType;
use App\Soap\dealerbuilt\src\BaseApi\RepairOrderType;
use App\Soap\dealerbuilt\src\DealerBuiltSoapEnvelope;
use App\Soap\dealerbuilt\src\DealerBuiltSoapEnvelopeByKey;
use App\Soap\dealerbuilt\src\DealerBuiltSoapEnvelopeByNumber;
use App\Soap\dealerbuilt\src\DealerBuiltSoapEnvelopePullParts;
use App\Soap\dealerbuilt\src\Models\PhoneNumberType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * Class DealerBuiltClient.
 */
class DealerBuiltClient extends AbstractDMSClient
{
    /**
     * @var string
     */
    private $postUrl = 'https://cdx.dealerbuilt.com/0.99a/Api.svc';

    /**
     * @var string
     */
    private $wsdl = 'https://cdx.dealerbuilt.com/0.99a/Api.svc?wsdl';

    /**
     * @var string
     */
    private $timeFrame = 'PT5M';

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $serviceLocationId;

    /*
     * TODO When comparing the results of this class against the original, the original returns 10 more.
     * Didn't see anything obvious as to why. Possibly one is a little more restricted >= vs >?
     */
    public function __construct(EntityManagerInterface $entityManager, PhoneValidator $phoneValidator, ParameterBagInterface $parameterBag, ThirdPartyAPILogHelper $thirdPartyAPILogHelper)
    {
        parent::__construct($entityManager, $phoneValidator, $parameterBag, $thirdPartyAPILogHelper);
        $this->serviceLocationId = $parameterBag->get('dealerbuilt_location_id');
        //TODO These should not be hard coded. Should be a param somewhere.
        $this->username = 'iservice';
        $this->password = 'w37B(7pDIb/FZF8(*1';

        // Won't grab any from dev unless we up the time frame
        if ('dev' == $parameterBag->get('app_env')) {
            $this->timeFrame = 'PT8760H';
        }

        $this->init();
    }

    public function init(): void
    {
        $this->buildSerializer($this->getParameterBag()->get('soap_directory').'/dealerbuilt/metadata', 'App\Soap\dealerbuilt\src');
        $this->initializeSoapClient($this->getWsdl());
    }

    public function getOpenRepairOrders(): array
    {
        $repairOrders = [];
        if ($this->getSoapClient()) {
            //create authentication token
            $this->getSoapClient()->__setSoapHeaders($this->createWSSUsernameToken($this->getUsername(), $this->getPassword()));

            $searchCriteria = [
                'searchCriteria' => [
                    'MaxElapsedSinceUpdate' => $this->getTimeFrame(),
                    'ServiceLocationIds' => [$this->getServiceLocationId()],
                    'Statuses' => ['Open'],
                ],
            ];

            $result = $this->sendSoapCall('PullRepairOrders', [$searchCriteria], true);

            //Deserialize the soap result into objects.
            $deserializedNode = $this->getSerializer()->deserialize($result, DealerBuiltSoapEnvelope::class, 'xml');

            /**
             * @var RepairOrderType $repairOrder
             */
            foreach ($deserializedNode->getBody()->getPullRepairOrdersResponse()->getPullRepairOrdersResult() as $repairOrder) {
                //init result objects
                $dmsResult = new DMSResult();
                $dmsResult->setRaw($repairOrder);

                //All DealerBuilt have waiter set to false.
                $dmsResult->setWaiter(false);

                if ('InternalRepairOrder' == $repairOrder->getAttributes()->getType()) {
                    continue;
                }
                //Customer
                $customer = $repairOrder->getReferences()->getROCustomer()->getAttributes()->getIdentity();
                $customerName = sprintf('%s %s', $customer->getPersonalName()->getFirstName(), $customer->getPersonalName()->getLastName());
                // No customer name, it's an internal RO so skip
                if (!$customerName) {
                    continue;
                }

                $dmsResult->getCustomer()->setName($customerName);
                $dmsResult->getCustomer()->setEmail($customer->getEmailAddress());

                $dmsResult->getCustomer()->setPhoneNumbers(
                    $this->phoneNormalizer($customer->getPhoneNumbers())
                );

                $dmsResult->setNumber($repairOrder->getAttributes()->getRepairOrderNumber());

                $dmsResult->setMiles($repairOrder->getAttributes()->getMilesIn());
                //vehicle
                $vehicle = $repairOrder->getReferences()->getROVehicle()->getAttributes();
                $dmsResult->setYear($vehicle->getYear());
                $dmsResult->setMake($vehicle->getMake());
                $dmsResult->setModel($vehicle->getModel());
                $dmsResult->setVin($vehicle->getVin());

                //advisor
                $advisor = $repairOrder->getAttributes()->getServiceAdvisor()->getPersonalName();
                $dmsResult->getAdvisor()->setFirstName($advisor->getFirstName());
                $dmsResult->getAdvisor()->setLastName($advisor->getLastName());

                //The date is converted to a DateTime when its serialized.
                $dmsResult->setDate($repairOrder->getAttributes()->getOpenedStamp());
                $dmsResult->setRoKey($repairOrder->getROKey());
                $dmsResult->setInitialROValue($repairOrder->getAttributes()->getTotalAmount()->getAmount());

                $repairOrders[] = $dmsResult;
            }
        }

        return $repairOrders;
    }

    public function getClosedRoDetails(array $openRepairOrders): array
    {
        $rosWithKeys = [];
        $rosWithoutKeys = [];

        /** @var RepairOrder $repairOrder */
        foreach ($openRepairOrders as $repairOrder) {
            if ($repairOrder->getDmsKey()) {
                $rosWithKeys[] = $repairOrder;
                continue;
            }

            $rosWithoutKeys[] = $repairOrder;
        }

        //TODO Shouldn't we close both?
        if ($rosWithKeys) {
            $this->closeRosWithKeys($rosWithKeys);

            return [];
        }

        if ($rosWithoutKeys) {
            $this->closeRosWithoutKeys($rosWithoutKeys);

            return [];
        }
    }

    /**
     * @param $repairOrders
     */
    public function closeRosWithKeys($repairOrders): array
    {
        $closedRepairOrders = [];
        if ($this->getSoapClient()) {
            //create authentication token
            $this->getSoapClient()->__setSoapHeaders($this->createWSSUsernameToken($this->getUsername(), $this->getPassword()));

            $repairOrderKeyString = [];
            foreach ($repairOrders as $ro) {
                //$repairOrderKeyString .= "<arr:string>{$repairOrder->getDmsKey()}</arr:string>";
                $repairOrderKeyString[] = $ro->getDmsKey();
            }

            $searchCriteria = [
                'repairOrderKeys' => $repairOrderKeyString,
            ];

            $result = $this->sendSoapCall('PullRepairOrdersByKey', [$searchCriteria], true);

            if ($result) {
                //Deserialize the soap result into objects.
                $deserializedNode = $this->getSerializer()->deserialize($result, DealerBuiltSoapEnvelopeByKey::class, 'xml');

                /**
                 * @var RepairOrderType $repairOrder
                 */
                foreach ($deserializedNode->getBody()->getPullRepairOrdersByKeyResponse()->getPullRepairOrdersByKeyResult() as $repairOrder) {
                    $closed = $this->closeRo($repairOrder, $repairOrders);
                    if ($closed) {
                        $closedRepairOrders[] = $closed;
                    }
                }
            }
        }

        return $closedRepairOrders;
    }

    /**
     * @param $repairOrders
     */
    public function closeRosWithoutKeys($repairOrders): array
    {
        $closedRepairOrders = [];
        if ($this->getSoapClient()) {
            //create authentication token
            $this->getSoapClient()->__setSoapHeaders($this->createWSSUsernameToken($this->getUsername(), $this->getPassword()));

            foreach ($repairOrders as $ro) {
                $searchCriteria = [
                    'serviceLocationId' => $this->getServiceLocationId(),
                    'repairOrderNumber' => $ro->getNumber(),
                ];

                $result = $this->sendSoapCall('PullRepairOrderByNumber', [$searchCriteria], true);

                if ($result) {
                    //Deserialize the soap result into objects.
                    $deserializedNode = $this->getSerializer()->deserialize($result, DealerBuiltSoapEnvelopeByNumber::class, 'xml');

                    /**
                     * @var RepairOrderType $repairOrder
                     */
                    foreach ($deserializedNode->getBody()->getPullRepairOrderByNumberResponse()->getPullRepairOrderByNumberResult() as $repairOrder) {
                        $closed = $this->closeRo($repairOrder, $repairOrders);
                        if ($closed) {
                            $closedRepairOrders[] = $closed;
                        }
                    }
                }
            }
        }

        return $closedRepairOrders;
    }

    /**
     * @param RepairOrder[] $repairOrders
     */
    public function closeRo(RepairOrderType $repairOrder, array $repairOrders): ?RepairOrderType
    {
        $technicianRecord = null;

        if (in_array($repairOrder->getAttributes()->getStatus(), ['Posted', 'Closed'])) {
            $closedDate = new \DateTime();
            if ($repairOrder->getAttributes()->getClosedStamp()) {
                $closedDate = $repairOrder->getAttributes()->getClosedStamp();
            }

            // Try to set the technician that recorded it when closing
            if ($repairOrder->getAttributes()->getJobs()) {
                $job = $repairOrder->getAttributes()->getJobs()[0];
                if ($job->getTechs()) {
                    $firstName = $job->getTechs()[0]->getTech()->getPersonalName()->getFirstName();
                    $lastName = $job->getTechs()[0]->getTech()->getPersonalName()->getLastName();
                    $technicianRecord = $this->getEntityManager()->getRepository('App:User')
                        ->findOneBy(['firstName' => $firstName, 'lastName' => $lastName]);
                }
            }

            // Loop over all passed ROs to get the RO in question
            if (array_key_exists($repairOrder->getAttributes()->getRepairOrderNumber(), $repairOrders)) {
                $referenceRepairOrder = $repairOrders[$repairOrder->getAttributes()->getRepairOrderNumber()];
                $referenceRepairOrder
                    ->setDateClosed($closedDate)
                    ->setFinalValue($repairOrder->getAttributes()->getTotalAmount()->getAmount())
                    ->setPrimaryTechnician($technicianRecord);
                $this->getEntityManager()->persist($referenceRepairOrder);
                $this->getEntityManager()->flush();

                return $repairOrder;
            }
        }//end closed/posted if.

        return null;
    }

    /**
     * @param $phoneNumbers
     *
     * @return null
     */
    public function phoneNormalizer($phoneNumbers): ?string
    {
        /**
         * @var PhoneNumberType $phoneNumberType
         */
        foreach ($phoneNumbers as $phoneNumberType) {
            if (in_array($phoneNumberType->getNumberType(), ['Mobile', 'Cell'])) {
                try {
                    $result = parent::phoneNormalizer($phoneNumberType->getDigits());
                    if ($result) {
                        return $result;
                    }
                } catch (\Exception $e) {
                    //fail silently. We don't care if it's a bad number.
                }
            }
        }

        //No valid mobile found.
        return null;
    }

    public function getParts(): array
    {
        $parts = [];
        if ($this->getSoapClient()) {
            //create authentication token
            $this->getSoapClient()->__setSoapHeaders($this->createWSSUsernameToken($this->getUsername(), $this->getPassword()));

            $searchCriteria = [
                'searchCriteria' => [
                    'MinimumAddedDate' => '2021-01-01T00:00:00.000Z',
                    'ServiceLocationIds' => [$this->getServiceLocationId()],
                ],
            ];

            $result = $this->sendSoapCall('PullParts', [$searchCriteria], true);

            if (!$result) {
                return $parts;
            }

            //Deserialize the soap result into objects.
            $deserializedNode = $this->getSerializer()->deserialize($result, DealerBuiltSoapEnvelopePullParts::class, 'xml');
            /**
             * @var InventoryPartType $dmsPart
             */
            foreach ($deserializedNode->getBody()->getPullPartsResponse()->getPullPartsResult() as $dmsPart) {
                $part = new Part();
                $part->setNumber($dmsPart->getPartKey())
                    ->setName($dmsPart->getAttributes()->getDescription())
                    ->setBin($this->binProcessor($dmsPart->getAttributes()->getBins()))
                    ->setAvailable($dmsPart->getAttributes()->getOnHandQuantity());

                $parts[] = $part;
            }
        }

        return $parts;
    }

    /**
     * @param $bins
     */
    public function binProcessor($bins): ?string
    {
        if (is_array($bins)) {
            if (empty($bins)) {
                return null;
            }

            return implode(', ', $bins);
        }

        return $bins;
    }

    public function getPostUrl(): string
    {
        return $this->postUrl;
    }

    public function setPostUrl(string $postUrl): void
    {
        $this->postUrl = $postUrl;
    }

    public function getWsdl(): string
    {
        return $this->wsdl;
    }

    public function setWsdl(string $wsdl): void
    {
        $this->wsdl = $wsdl;
    }

    public function getTimeFrame(): string
    {
        return $this->timeFrame;
    }

    public function setTimeFrame(string $timeFrame): void
    {
        $this->timeFrame = $timeFrame;
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

    public function getServiceLocationId(): string
    {
        return $this->serviceLocationId;
    }

    public function setServiceLocationId(string $serviceLocationId): void
    {
        $this->serviceLocationId = $serviceLocationId;
    }

    public static function getDefaultIndexName(): string
    {
        return 'usingDealerBuilt';
    }
}

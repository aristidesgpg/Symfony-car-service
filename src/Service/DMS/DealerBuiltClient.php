<?php

namespace App\Service\DMS;

use App\Entity\DMSResult;
use App\Entity\DMSResultAdvisor;
use App\Entity\DMSResultCustomer;
use App\Service\PhoneValidator;
use App\Service\ThirdPartyAPILogHelper;
use App\Soap\dealerbuilt\src\BaseApi\RepairOrderType;
use App\Soap\dealerbuilt\src\DealerBuiltSoapEnvelope;
use App\Soap\dealerbuilt\src\Models\PhoneNumberType;
use Doctrine\ORM\EntityManagerInterface;
use SoapFault;
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

        $this->buildSerializer('../src/Soap/dealerbuilt/metadata', 'App\Soap\dealerbuilt\src');
    }

    public function getOpenRepairOrders(): array
    {
        $repairOrders = [];
        $client = $this->initializeSoapClient($this->getWsdl());
        if ($client) {
            //create authentication token
            $client->__setSoapHeaders($this->createWSSUsernameToken($this->getUsername(), $this->getPassword()));

            $searchCriteria = [
                'searchCriteria' => [
                    'MaxElapsedSinceUpdate' => $this->getTimeFrame(),
                    'ServiceLocationIds' => [$this->getServiceLocationId()],
                    'Statuses' => ['Open'],
                ],
            ];

            //It should validate against the wsdl before the call to make sure its correct.
            try {
                $pullRepairOrders = $client->__soapCall('PullRepairOrders', [$searchCriteria]);
            } catch (SoapFault $e) {
                //Most likely a malformed request/invalid parameters were provided.

                dd($e->getMessage());
                $this->logError($this->getWsdl(), $e->getMessage());

                return $repairOrders;
            }

            //Deserialize the soap result into objects.
            $deserializedNode = $this->getSerializer()->deserialize($client->__getLastResponse(), DealerBuiltSoapEnvelope::class, 'xml');

            /**
             * @var RepairOrderType $repairOrder
             */
            foreach ($deserializedNode->getBody()->getPullRepairOrdersResponse()->getPullRepairOrdersResult() as $repairOrder) {
                //init result objects
                $dmsResult = new DMSResult();
                $dmsResultCustomer = new DMSResultCustomer();
                $dmsResultAdvisor = new DMSResultAdvisor();

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

                $dmsResultCustomer->setName($customerName);
                $dmsResultCustomer->setEmail($customer->getEmailAddress());
                $phoneNumbers = [];
                /**
                 * @var PhoneNumberType $phoneNumberType
                 */
                foreach ($customer->getPhoneNumbers() as $phoneNumberType) {
                    if (in_array($phoneNumberType->getNumberType(), ['Mobile', 'Cell'])) {
                        try {
                            $phoneNumberType->setDigits($this->getPhoneValidator()->clean($phoneNumberType->getDigits()));
                            $phoneNumbers[] = $phoneNumberType;
                            break; // It's mobile we only need this one
                        } catch (\Exception $e) {
                            //fail silently. We don't care if it's a bad number.
                        }

                        break;
                    }
                }
                $dmsResultCustomer->setPhoneNumbers($phoneNumbers);

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
                $dmsResultAdvisor->setFirstName($advisor->getFirstName());
                $dmsResultAdvisor->setLastName($advisor->getLastName());

                //The date is converted to a DateTime when its serialized.
                $dmsResult->setDate($repairOrder->getAttributes()->getOpenedStamp());
                $dmsResult->setRoKey($repairOrder->getROKey());

                $dmsResult->setCustomer($dmsResultCustomer);
                $dmsResult->setAdvisor($dmsResultAdvisor);
                $repairOrders[] = $dmsResult;
            }
        }

        return $repairOrders;
    }

    public function getClosedRoDetails()
    {
        // TODO: Implement getClosedRoDetails() method.
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

    public static function getDefaultIndexName()
    {
        return 'usingDealerBuilt';

    }
}

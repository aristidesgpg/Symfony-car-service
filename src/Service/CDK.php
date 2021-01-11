<?php

namespace App\Service;

use App\Entity\RepairOrder;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * Class CDK
 *
 * @package App\Service
 */
class CDK extends SOAP {

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var PhoneValidator
     */
    private $phoneValidator;

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
     * CDK constructor.
     *
     * @param EntityManagerInterface $em
     * @param PhoneValidator         $phoneValidator
     * @param ParameterBagInterface  $parameterBag
     *
     * @throws ParameterNotFoundException
     */
    public function __construct (EntityManagerInterface $em, PhoneValidator $phoneValidator,
                                 ParameterBagInterface $parameterBag) {
        $this->em             = $em;
        $this->phoneValidator = $phoneValidator;
        $env                  = $parameterBag->get('app_env');
        $this->dealerID       = $parameterBag->get('cdk_dealer_id');
        $this->authentication = $this->username . ':' . $this->password;
        $today                = (new DateTime())->format('m/d/Y');

        $this->openROExtractURL   = 'https://3pa.dmotorworks.com/pip-extract/service-ro-open/extract?dealerId=' . $this->dealerID . '&queryId=SROD_Open_WIP';
        $this->singleROExtractURL = 'https://3pa.dmotorworks.com/pip-extract/service-ro-open/extract?dealerId=' . $this->dealerID . '&queryId=SROD_ByRONumber&timeoutSeconds=2700&qparamRONum=';
        $this->closedROExtractURL = 'https://3pa.dmotorworks.com/pip-extract/service-ro-closed/extract?dealerId=' . $this->dealerID . '&queryId=SROD_Closed_DateRange&qparamStartDate=' . $today . '&qparamEndDate=' . $today;

        if ($env == 'dev') {
            $this->openROExtractURL   = 'https://uat-3pa.dmotorworks.com/pip-extract/service-ro-open/extract?dealerId=' . $this->dealerID . '&queryId=SROD_Open_WIP';
            $this->singleROExtractURL = 'https://uat-3pa.dmotorworks.com/pip-extract/service-ro-open/extract?dealerId=' . $this->dealerID . '&queryId=SROD_ByRONumber&timeoutSeconds=2700&qparamRONum=';
            $this->closedROExtractURL = 'https://uat-3pa.dmotorworks.com/pip-extract/service-ro-closed/extract?dealerId=' . $this->dealerID . '&queryId=SROD_Closed_DateRange&qparamStartDate=' . $today . '&qparamEndDate=' . $today;
        }

        parent::__construct($em);
    }

    /**
     * Gets all open repair orders from CDK, parses what we need from it, then returns an array of objects
     *
     * @return array
     */
    public function getOpenRepairOrders (): array {
        $returnResult = [];
        $curlOptions  = [
            CURLOPT_URL            => $this->openROExtractURL,
            CURLOPT_POST           => true,
            CURLOPT_USERPWD        => $this->authentication,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_ENCODING       => 'UTF-8',
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false
        ];

        $ch = curl_init();
        curl_setopt_array($ch, $curlOptions);
        $response = curl_exec($ch);

        // Not an error, but logs the request/response for compliance
        $this->logError($this->openROExtractURL, $response);

        if ($curlError = curl_error($ch)) {
            return [];
        }

        $xml          = simplexml_load_string($response, 'SimpleXMLElement', LIBXML_NOWARNING);
        $xml          = json_decode(json_encode($xml), true);
        $repairOrders = $xml['service-repair-order-open'];

        foreach ($repairOrders as $repairOrder) {
            $roData = $this->extractROInfo($repairOrder);

            if (!$roData) {
                continue;
            }

            $returnResult[] = $roData;
        }

        return $returnResult;
    }

    /**
     * Checks if passed ROs are closed. If they are it closes them and returns an array of RO Objects that were closed
     *
     * @param array $repairOrders Array of RO objects
     *
     * @return array
     */
    public function getClosedRoDetails (array $repairOrders): array {
        // Collect all the ro numbers in an array to compare against
        $openRepairOrderNumbers = [];
        $closedRepairOrders     = [];

        /** @var RepairOrder $repairOrder */
        foreach ($repairOrders as $repairOrder) {
            $openRepairOrderNumbers[] = $repairOrder->getNumber();
        }

        // Check CDK for all closed today
        $curlOptions = [
            CURLOPT_URL            => $this->closedROExtractURL,
            CURLOPT_POST           => true,
            CURLOPT_USERPWD        => $this->authentication,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_ENCODING       => 'UTF-8',
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false
        ];

        $ch = curl_init();
        curl_setopt_array($ch, $curlOptions);
        $response = curl_exec($ch);

        // Not an error, but logs the request/response for compliance
        $this->logError($this->closedROExtractURL, $response);

        if ($curlError = curl_error($ch)) {
            return [];
        }

        $xml = simplexml_load_string($response, 'SimpleXMLElement', LIBXML_NOWARNING);
        $xml = json_decode(json_encode($xml), true);

        // No results means no closed ros today, return
        if (!isset($xml['service-repair-order-closed'])) {
            return [];
        }
        $dmsClosedRepairOrders = $xml['service-repair-order-closed'];

        // Loop through the results to see which ones match the open ROs in iservice
        $closedResults = [];
        foreach ($dmsClosedRepairOrders as $dmsClosedRepairOrder) {
            // RO number not found
            if (!isset($dmsClosedRepairOrder['RONumber']) || empty($dmsClosedRepairOrder['RONumber'])) {
                continue;
            }

            $roNumber = $dmsClosedRepairOrder['RONumber'];

            // It's not in the list of open ROs so skip
            if (!in_array($roNumber, $openRepairOrderNumbers)) {
                continue;
            }

            // Make sure it's closed
            if (isset($dmsClosedRepairOrder['StatusDesc']) && !empty($dmsClosedRepairOrder['StatusDesc'])) {
                $status = $dmsClosedRepairOrder['StatusDesc'];

                if ($status != 'CLOSED') {
                    continue;
                }
            }

            $closedDate = new DateTime();
            if (isset($dmsClosedRepairOrder['ClosedDate']) && !empty($dmsClosedRepairOrder['ClosedDate'])) {
                try {
                    $closedDate = new DateTime($dmsClosedRepairOrder['ClosedDate']);
                } catch (Exception $e) {
                    // Nothing
                }
            }

            $closedRoValue = 0;
            if (isset($dmsClosedRepairOrder['payCPTotal']) && !empty($dmsClosedRepairOrder['payCPTotal'])) {
                $closedRoValue = (float)$dmsClosedRepairOrder['payCPTotal'];
            }

            $closedResults[$roNumber] = [
                'ro_number'    => $roNumber,
                'closed_date'  => $closedDate,
                'closed_value' => $closedRoValue
            ];
        }

        /** @var RepairOrder $repairOrder */
        foreach ($repairOrders as $repairOrder) {
            if (!isset($closedResults[$repairOrder->getNumber()])) {
                continue;
            }

            $roClosedResults = $closedResults[$repairOrder->getNumber()];
            $closedDate      = $roClosedResults['closed_date'];
            $finalRoValue    = $roClosedResults['closed_value'];

            $repairOrder->setDateClosed($closedDate)->setFinalValue($finalRoValue);
            $this->em->persist($repairOrder);
            $this->em->flush();

            $closedRepairOrders[] = $repairOrder;
        }

        return $closedRepairOrders;
    }

    /**
     * Checks if the passed RO# exists in the DMS and pulls it if it does
     *
     * @param $RONumber
     *
     * @return false|object
     */
    public function addRepairOrderByNumber ($RONumber) {
        $postUrl     = $this->singleROExtractURL . $RONumber;
        $curlOptions = [
            CURLOPT_URL            => $postUrl,
            CURLOPT_POST           => true,
            CURLOPT_USERPWD        => $this->authentication,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_ENCODING       => 'UTF-8',
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false
        ];

        $ch = curl_init();
        curl_setopt_array($ch, $curlOptions);
        $response = curl_exec($ch);

        // Not an error, but logs the request/response for compliance
        $this->logError($postUrl, $response);

        if ($curlError = curl_error($ch)) {
            return (object)[];
        }

        $xml             = simplexml_load_string($response, 'SimpleXMLElement', LIBXML_NOWARNING);
        $xml             = json_decode(json_encode($xml), true);
        $repairOrderData = $xml['service-repair-order-open'];

        return $this->extractROInfo($repairOrderData);
    }

    /**
     * @param $repairOrder
     *
     * @return false|object
     */
    private function extractROInfo ($repairOrder) {
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

        // Try to set name
        $name = false;
        if (isset($repairOrder['Name1']) && !empty($repairOrder['Name1'])) {
            $name = $repairOrder['Name1'];
        }

        // No name, try this one
        if (!$name) {
            if (isset($repairOrder['Name2']) && !empty($repairOrder['Name2'])) {
                $name = $repairOrder['Name2'];
            }
        }

        // Still no name, probably an internal RO, skip
        if (!$name) {
            return false;
        }

        $namePieces = explode(',', $name);
        // Probably an internal RO, skip
        if (!isset($namePieces[1])) {
            return false;
        }

        $roObject->customer->name = $namePieces[1] . ' ' . $namePieces[0];

        $phoneNumbers = [];
        if (isset($repairOrder['PhoneNumber']) && !empty($repairOrder['PhoneNumber'])) {
            foreach ($repairOrder['PhoneNumber'] as $record) {
                foreach ($record as $number) {
                    try {
                        $phoneNumbers[] = $this->phoneValidator->clean($number);
                    } catch (Exception $e) {
                        continue;
                    }
                }
            }
        }

        // Only get unique numbers
        $roObject->customer->phoneNumbers = array_unique($phoneNumbers);

        if (isset($repairOrder['ContactEmailAddress']) && !empty($repairOrder['ContactEmailAddress'])) {
            $roObject->customer->email = $repairOrder['ContactEmailAddress'];
        }

        if (isset($repairOrder['RONumber']) && !empty($repairOrder['RONumber'])) {
            $roObject->number = $repairOrder['RONumber'];
        } else {
            // Couldn't find ro number
            return false;
        }

        if (isset($repairOrder['OpenDate']) && !empty($repairOrder['OpenDate'])) {
            $openDateString = $repairOrder['OpenDate']; // Formatted yyyy-mm-dd :thumbs-up:
            if (isset($repairOrder['OpenTime']) && !empty($repairOrder['OpenTime'])) {
                $openDateString .= ' ' . $repairOrder['OpenTime'];
            }

            try {
                $roObject->date = new DateTime($openDateString);
            } catch (Exception $e) {
                // Nothing
            }
        }

        if (isset($repairOrder['WaiterFlag']) && !empty($repairOrder['WaiterFlag'])) {
            $roObject->waiter = $repairOrder['WaiterFlag'] == 'N' ? false : true;
        }

        if (isset($repairOrder['EstComplDate']) && !empty($repairOrder['EstComplDate'])) {
            $pickUpDateString = $repairOrder['EstComplDate']; // Formatted yyyy-mm-dd :thumbs-up:
            if (isset($repairOrder['EstComplTime']) && !empty($repairOrder['EstComplTime'])) {
                $pickUpDateString .= ' ' . $repairOrder['EstComplTime'];
            }

            try {
                $roObject->pickupDate = new DateTime($pickUpDateString);
            } catch (Exception $e) {
                // Nothing
            }
        }

        if (isset($repairOrder['Year']) && !empty($repairOrder['Year'])) {
            $roObject->year = $repairOrder['Year'];
        }

        if (isset($repairOrder['MakeDesc']) && !empty($repairOrder['MakeDesc'])) {
            $roObject->make = $repairOrder['MakeDesc'];
        }

        // No MakeDesc, it's preferred because this is usually an abbreviation
        if (!$roObject->make) {
            if (isset($repairOrder['Make']) && !empty($repairOrder['Make'])) {
                $roObject->make = $repairOrder['Make'];
            }
        }

        if (isset($repairOrder['ModelDesc']) && !empty($repairOrder['ModelDesc'])) {
            $roObject->model = $repairOrder['ModelDesc'];
        }

        // No ModelDesc, it's preferred because this is usually an abbreviation
        if (!$roObject->model) {
            if (isset($repairOrder['Model']) && !empty($repairOrder['Model'])) {
                $roObject->model = $repairOrder['Model'];
            }
        }

        if (isset($repairOrder['VIN']) && !empty($repairOrder['VIN'])) {
            $roObject->vin = $repairOrder['VIN'];
        }

        // Can't find miles, just leave it null for now
        if (isset($repairOrder['Mileage']) && !empty($repairOrder['Mileage'])) {
            $roObject->miles = $repairOrder['Mileage'];
        }

        if (isset($repairOrder['ServiceAdvisor']) && !empty($repairOrder['ServiceAdvisor'])) {
            $roObject->advisor->id = $repairOrder['ServiceAdvisor'];
        }

        return $roObject;
    }
}

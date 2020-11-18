<?php

namespace AppBundle\Service;

use AppBundle\Entity\RepairOrder;
use DateTime;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Exception;
use SimpleXMLElement;

/**
 * Class CDK
 *
 * @package AppBundle\Service
 */
class CDK extends SOAP {

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var SOAP
     */
    private $soapService;

    /**
     * @var string
     */
    private $dealerId;

    /**
     * CDK constructor.
     *
     * @param EntityManager $em
     * @param SOAP          $soapService
     * @param               $dealerId
     */
    public function __construct (EntityManager $em, SOAP $soapService, $dealerId) {
        $this->em          = $em;
        $this->dealerId    = $dealerId;
        $this->soapService = $soapService;

        parent::__construct($em);
    }

    /**
     * @return array
     *
     * @throws Exception
     */
    public function getOpenRepairOrders () {
        $returnResult = [];
        //$postUrl      = 'https://uat-3pa.dmotorworks.com/pip-extract/service-ro-open/extract?dealerId=' . $this->dealerId . '&queryId=SROD_Open_WIP';
        $postUrl     = 'https://3pa.dmotorworks.com/pip-extract/service-ro-open/extract?dealerId=' . $this->dealerId . '&queryId=SROD_Open_WIP';
        $curlOptions = [
            CURLOPT_URL            => $postUrl,
            CURLOPT_POST           => true,
            CURLOPT_USERPWD        => 'iserviceauto:jSarJLFv0rkL',
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_ENCODING       => 'UTF-8',
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false
        ];

        $ch = curl_init();
        curl_setopt_array($ch, $curlOptions);
        $response = curl_exec($ch);

        // Not an error, but logs the request/response for compliance
        $this->soapService->logError($postUrl, $response);

        if ($curlError = curl_error($ch)) {
            return [];
        }

        $xml = simplexml_load_string($response, 'SimpleXMLElement', LIBXML_NOWARNING);
        $xml = json_decode(json_encode($xml), true);

        $repairOrders = $xml['service-repair-order-open'];
        foreach ($repairOrders as $repairOrder) {
            $name = false;

            // Try to set name
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
                continue;
            }

            $namePieces = explode(',', $name);
            // Probably an internal RO, skip
            if (!isset($namePieces[1])) {
                continue;
            }
            $firstName = $namePieces[1];
            $lastname  = $namePieces[0];

            $phoneNumber = [];
            if (isset($repairOrder['PhoneNumber']) && !empty($repairOrder['PhoneNumber'])) {
                foreach ($repairOrder['PhoneNumber'] as $record) {
                    foreach ($record as $number) {
                        $phoneNumber[] = $number;
                    }
                }
            }
            $phoneNumber = array_unique($phoneNumber);

            $email = '';
            if (isset($repairOrder['ContactEmailAddress']) && !empty($repairOrder['ContactEmailAddress'])) {
                $email = $repairOrder['ContactEmailAddress'];
            }

            if (isset($repairOrder['RONumber']) && !empty($repairOrder['RONumber'])) {
                $roNumber = $repairOrder['RONumber'];
            } else {
                // Couldn't find ro number
                continue;
            }

            $openDate = new DateTime();
            if (isset($repairOrder['OpenDate']) && !empty($repairOrder['OpenDate'])) {
                $openDateString = $repairOrder['OpenDate']; // Formatted yyyy-mm-dd :thumbs-up:
                if (isset($repairOrder['OpenTime']) && !empty($repairOrder['OpenTime'])) {
                    $openDateString .= ' ' . $repairOrder['OpenTime'];
                }
                try {
                    $openDate = new DateTime($openDateString);
                } catch (Exception $e) {
                    // Nothing
                }
            }

            $waiter = false;
            if (isset($repairOrder['WaiterFlag']) && !empty($repairOrder['WaiterFlag'])) {
                $waiter = $repairOrder['WaiterFlag'] == 'N' ? false : true;
            }

            $pickUpDate = null;
            if (isset($repairOrder['EstComplDate']) && !empty($repairOrder['EstComplDate'])) {
                $pickUpDateString = $repairOrder['EstComplDate']; // Formatted yyyy-mm-dd :thumbs-up:
                if (isset($repairOrder['EstComplTime']) && !empty($repairOrder['EstComplTime'])) {
                    $pickUpDateString .= ' ' . $repairOrder['EstComplTime'];
                }
                try {
                    $pickUpDate = new DateTime($pickUpDateString);
                } catch (Exception $e) {
                    // Nothing
                }
            }

            $year = null;
            if (isset($repairOrder['Year']) && !empty($repairOrder['Year'])) {
                $year = $repairOrder['Year'];
            }

            $make = null;
            if (isset($repairOrder['MakeDesc']) && !empty($repairOrder['MakeDesc'])) {
                $make = $repairOrder['MakeDesc'];
            }

            // No MakeDesc, it's preferred because this is usually an abbreviation
            if (!$make) {
                if (isset($repairOrder['Make']) && !empty($repairOrder['Make'])) {
                    $make = $repairOrder['Make'];
                }
            }

            $model = null;
            if (isset($repairOrder['ModelDesc']) && !empty($repairOrder['ModelDesc'])) {
                $model = $repairOrder['ModelDesc'];
            }

            // No ModelDesc, it's preferred because this is usually an abbreviation
            if (!$model) {
                if (isset($repairOrder['Model']) && !empty($repairOrder['Model'])) {
                    $model = $repairOrder['Model'];
                }
            }

            $vin = null;
            if (isset($repairOrder['VIN']) && !empty($repairOrder['VIN'])) {
                $vin = $repairOrder['VIN'];
            }

            // Can't find miles, just leave it null for now
            $miles = null;
            if (isset($repairOrder['Mileage']) && !empty($repairOrder['Mileage'])) {
                $miles = $repairOrder['Mileage'];
            }

            $advisorId        = null;
            $advisorFirstName = null; // Not passed(?)
            $advisorLastName  = null; // Not passed(?)
            if (isset($repairOrder['ServiceAdvisor']) && !empty($repairOrder['ServiceAdvisor'])) {
                $advisorId = $repairOrder['ServiceAdvisor'];
            }

            $returnResult[] = (object)[
                'customer'   => (object)[
                    'name'          => $firstName . ' ' . $lastname,
                    'phone_numbers' => $phoneNumber,
                    'email'         => $email
                ],
                'number'     => $roNumber,
                'ro_key'     => '', // Skip for now I guess
                'date'       => $openDate,
                'waiter'     => $waiter,
                'pickupDate' => $pickUpDate,
                'year'       => $year,
                'make'       => $make,
                'model'      => $model,
                'miles'      => $miles,
                'vin'        => $vin,
                'advisor'    => (object)[
                    'id'         => $advisorId,
                    'first_name' => $advisorFirstName,
                    'last_name'  => $advisorLastName
                ]
            ];
        }

        return $returnResult;
    }

    /**
     * @param $repairOrders
     *
     * @throws Exception
     */
    public function getClosedRoDetails ($repairOrders) {
        // Collect all the ro numbers in an array to compare against
        $openRepairOrderNumbers = [];

        /** @var RepairOrder $repairOrder */
        foreach ($repairOrders as $repairOrder) {
            $openRepairOrderNumbers[] = $repairOrder->getNumber();
        }

        $today = (new DateTime())->format('m/d/Y');

        // Check CDK for all closed today
        //        $postUrl     = 'https://uat-3pa.dmotorworks.com/pip-extract/service-ro-closed/extract?dealerId=' . $this->dealerId . '&queryId=SROD_Closed_DateRange&qparamStartDate=' . $today . '&qparamEndDate=' . $today;
        $postUrl     = 'https://3pa.dmotorworks.com/pip-extract/service-ro-closed/extract?dealerId=' . $this->dealerId . '&queryId=SROD_Closed_DateRange&qparamStartDate=' . $today . '&qparamEndDate=' . $today;
        $curlOptions = [
            CURLOPT_URL            => $postUrl,
            CURLOPT_POST           => true,
            CURLOPT_USERPWD        => 'iserviceauto:jSarJLFv0rkL',
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_ENCODING       => 'UTF-8',
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false
        ];

        $ch = curl_init();
        curl_setopt_array($ch, $curlOptions);
        $response = curl_exec($ch);

        // Not an error, but logs the request/response for compliance
        $this->soapService->logError($postUrl, $response);

        if ($curlError = curl_error($ch)) {
            return;
        }

        $xml = simplexml_load_string($response, 'SimpleXMLElement', LIBXML_NOWARNING);
        $xml = json_decode(json_encode($xml), true);

        // No results means no closed ros today, return
        if (!isset($xml['service-repair-order-closed'])) {
            return;
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

            $repairOrder->setClosedDate($closedDate)->setFinalValue($finalRoValue);
            $this->em->persist($repairOrder);
            try {
                $this->em->flush();
            } catch (OptimisticLockException $e) {
                continue;
            }
        }
    }

    /**
     * @param $RONumber
     *
     * @return array
     * @throws Exception
     */
    public function addRepairOrderByNumber ($RONumber) {
        //        $postUrl     = 'https://uat-3pa.dmotorworks.com/pip-extract/service-ro-open/extract?dealerId=' . $this->dealerId . '&queryId=SROD_ByRONumber&qparamRONum=' . $RONumber . '&timeoutSeconds=2700';
        $postUrl     = 'https://3pa.dmotorworks.com/pip-extract/service-ro-open/extract?dealerId=' . $this->dealerId . '&queryId=SROD_ByRONumber&qparamRONum=' . $RONumber . '&timeoutSeconds=2700';
        $curlOptions = [
            CURLOPT_URL            => $postUrl,
            CURLOPT_POST           => true,
            CURLOPT_USERPWD        => 'iserviceauto:jSarJLFv0rkL',
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_ENCODING       => 'UTF-8',
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false
        ];

        $ch = curl_init();
        curl_setopt_array($ch, $curlOptions);
        $response = curl_exec($ch);

        // Not an error, but logs the request/response for compliance
        $this->soapService->logError($postUrl, $response);

        if ($curlError = curl_error($ch)) {
            return [];
        }

        $xml = simplexml_load_string($response, 'SimpleXMLElement', LIBXML_NOWARNING);
        $xml = json_decode(json_encode($xml), true);

        $repairOrder = $xml['service-repair-order-open'];

        $name = false;

        // Try to set name
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
            return [];
        }

        $namePieces = explode(',', $name);
        // Probably an internal RO, skip
        if (!isset($namePieces[1])) {
            return [];
        }
        $firstName = $namePieces[1];
        $lastname  = $namePieces[0];

        $phoneNumber = [];
        if (isset($repairOrder['PhoneNumber']) && !empty($repairOrder['PhoneNumber'])) {
            foreach ($repairOrder['PhoneNumber'] as $record) {
                foreach ($record as $number) {
                    $phoneNumber[] = $number;
                }
            }
        }
        $phoneNumber = array_unique($phoneNumber);

        $email = '';
        if (isset($repairOrder['ContactEmailAddress']) && !empty($repairOrder['ContactEmailAddress'])) {
            $email = $repairOrder['ContactEmailAddress'];
        }

        if (isset($repairOrder['RONumber']) && !empty($repairOrder['RONumber'])) {
            $roNumber = $repairOrder['RONumber'];
        } else {
            // Couldn't find ro number
            return [];
        }

        $openDate = new DateTime();
        if (isset($repairOrder['OpenDate']) && !empty($repairOrder['OpenDate'])) {
            $openDateString = $repairOrder['OpenDate']; // Formatted yyyy-mm-dd :thumbs-up:
            if (isset($repairOrder['OpenTime']) && !empty($repairOrder['OpenTime'])) {
                $openDateString .= ' ' . $repairOrder['OpenTime'];
            }
            try {
                $openDate = new DateTime($openDateString);
            } catch (Exception $e) {
                // Nothing
            }
        }

        $waiter = false;
        if (isset($repairOrder['WaiterFlag']) && !empty($repairOrder['WaiterFlag'])) {
            $waiter = $repairOrder['WaiterFlag'] == 'N' ? false : true;
        }

        $pickUpDate = null;
        if (isset($repairOrder['EstComplDate']) && !empty($repairOrder['EstComplDate'])) {
            $pickUpDateString = $repairOrder['EstComplDate']; // Formatted yyyy-mm-dd :thumbs-up:
            if (isset($repairOrder['EstComplTime']) && !empty($repairOrder['EstComplTime'])) {
                $pickUpDateString .= ' ' . $repairOrder['EstComplTime'];
            }
            try {
                $pickUpDate = new DateTime($pickUpDateString);
            } catch (Exception $e) {
                // Nothing
            }
        }

        $year = null;
        if (isset($repairOrder['Year']) && !empty($repairOrder['Year'])) {
            $year = $repairOrder['Year'];
        }

        $make = null;
        if (isset($repairOrder['MakeDesc']) && !empty($repairOrder['MakeDesc'])) {
            $make = $repairOrder['MakeDesc'];
        }

        // No MakeDesc, it's preferred because this is usually an abbreviation
        if (!$make) {
            if (isset($repairOrder['Make']) && !empty($repairOrder['Make'])) {
                $make = $repairOrder['Make'];
            }
        }

        $model = null;
        if (isset($repairOrder['ModelDesc']) && !empty($repairOrder['ModelDesc'])) {
            $model = $repairOrder['ModelDesc'];
        }

        // No ModelDesc, it's preferred because this is usually an abbreviation
        if (!$model) {
            if (isset($repairOrder['Model']) && !empty($repairOrder['Model'])) {
                $model = $repairOrder['Model'];
            }
        }

        $vin = null;
        if (isset($repairOrder['VIN']) && !empty($repairOrder['VIN'])) {
            $vin = $repairOrder['VIN'];
        }

        // Can't find miles, just leave it null for now
        $miles = null;
        if (isset($repairOrder['Mileage']) && !empty($repairOrder['Mileage'])) {
            $miles = $repairOrder['Mileage'];
        }

        $advisorId        = null;
        $advisorFirstName = null; // Not passed(?)
        $advisorLastName  = null; // Not passed(?)
        if (isset($repairOrder['ServiceAdvisor']) && !empty($repairOrder['ServiceAdvisor'])) {
            $advisorId = $repairOrder['ServiceAdvisor'];
        }

        return (object)[
            'customer'   => (object)[
                'name'          => $firstName . ' ' . $lastname,
                'phone_numbers' => $phoneNumber,
                'email'         => $email
            ],
            'number'     => $roNumber,
            'ro_key'     => '', // Skip for now I guess
            'date'       => $openDate,
            'waiter'     => $waiter,
            'pickupDate' => $pickUpDate,
            'year'       => $year,
            'make'       => $make,
            'model'      => $model,
            'miles'      => $miles,
            'vin'        => $vin,
            'advisor'    => (object)[
                'id'         => $advisorId,
                'first_name' => $advisorFirstName,
                'last_name'  => $advisorLastName
            ]
        ];
    }
}

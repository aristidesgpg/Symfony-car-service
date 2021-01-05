<?php

namespace App\Service;

use App\Entity\Customer;
use App\Entity\RepairOrder;
use App\Entity\RepairOrderNote;
use App\Helper\FalsyTrait;
use App\Helper\iServiceLoggerTrait;
use App\Repository\RepairOrderNoteRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class RONoteHelper
 * @package App\Service
 */
class RONoteHelper {
    use iServiceLoggerTrait, FalsyTrait;

    private $em;
    private $repo;

    /**
     * RONoteHelper constructor.
     * @param EntityManagerInterface $em
     * @param RepairOrderNoteRepository  $repo
     */
    public function __construct (
        EntityManagerInterface $em,
        RepairOrderNoteRepository $repo
    ) {
        $this->em             = $em;
        $this->repo           = $repo;
    }

    /**
     * @param string $roNumber
     *
     * @return bool
     */
    public function isNumberUnique (string $roNumber): bool {
        $ro = $this->repo->findByUID($roNumber);

        return ($ro === null);
    }

    /**
     * @param array $params
     *
     * @return RepairOrderNote|array Array on validation failure
     */
    public function addRepairOrderNote (RepairOrder $repairOrder, array $params) {
        $errors   = [];
        $required = ['note'];
        foreach ($required as $k) {
            if (!isset($params[$k]) || strlen($params[$k]) === 0) {
                $errors[$k] = 'Required field missing';
            }
        }
        if (!empty($errors)) {
            return $errors;
        }
        $roNote = new RepairOrderNote();
        $roNote->setRepairOrder($repairOrder);
        if (isset($params['note'])) {
            $roNote->setNote($params['note']);
        }
        
        $this->em->persist($roNote);
        $this->commitRepairOrderNote();

        return $roNote;
    }

    private function commitRepairOrderNote (): void {
        $this->em->beginTransaction();
        try {
            $this->em->flush();
            $this->em->commit();
        } catch (\Exception $e) {
            $this->em->rollback();
            throw new \RuntimeException('Caught exception during flush', 0, $e);
        }
    }

    // /**
    //  * @param string $dateCreated
    //  *
    //  * @return string
    //  */
    // private function generateLinkHash (string $dateCreated): string {
    //     try {
    //         $hash = sha1($dateCreated . random_bytes(32));
    //     } catch (\Exception $e) { // Shouldn't ever happen
    //         throw new \RuntimeException('Could not generate random bytes. The server is broken.', 0, $e);
    //     }
    //     $ro = $this->repo->findByHash($hash);
    //     if ($ro !== null) { // Very unlikely
    //         $this->logger->warning('link hash collision');
    //         return $this->generateLinkHash($dateCreated);
    //     }

    //     return $hash;
    // }

    // /**
    //  * @param array       $params
    //  * @param RepairOrder $ro
    //  *
    //  * @return array Array on validation failure
    //  */
    // private function buildRO (array $params, RepairOrder $ro): array {
    //     $errors = [];
    //     foreach (['advisor', 'technician'] as $k) {
    //         if (!isset($params[$k]) || empty($params[$k])) {
    //             continue;
    //         }
    //         $user = $this->users->find($params[$k]);
    //         if ($user === null) {
    //             $errors[$k] = ucfirst($k) . ' not found';
    //             continue;
    //         }
    //         if ($k === 'advisor') {
    //             $ro->setPrimaryAdvisor($user);
    //         } else {
    //             $ro->setPrimaryTechnician($user);
    //         }
    //     }
    //     if (isset($params['number'])) {
    //         if ($this->isNumberUnique($params['number'])) {
    //             $ro->setNumber($params['number']);
    //         } else {
    //             $errors['number'] = 'RO# already exists';
    //         }
    //     }
    //     if (isset($params['startValue'])) {
    //         $ro->setStartValue($params['startValue']);
    //     }
    //     if (isset($params['finalValue'])) {
    //         $ro->setFinalValue($params['finalValue']);
    //     }
    //     if (isset($params['approvedValue'])) {
    //         $ro->setApprovedValue($params['approvedValue']);
    //     }
    //     if (isset($params['waiter'])) {
    //         $ro->setWaiter($this->paramToBool($params['waiter']));
    //     }
    //     if (isset($params['pickupDate'])) {
    //         try {
    //             $dt = new \DateTime($params['pickupDate']);
    //             $ro->setPickupDate($dt);
    //         } catch (\Exception $e) {
    //             $errors['pickupDate'] = 'Invalid date format';
    //         }
    //     }
    //     if (isset($params['year'])) {
    //         $ro->setYear($params['year']);
    //     }
    //     if (isset($params['make'])) {
    //         $ro->setMake($params['make']);
    //     }
    //     if (isset($params['model'])) {
    //         $ro->setModel($params['model']);
    //     }
    //     if (isset($params['miles'])) {
    //         $ro->setMiles($params['miles']);
    //     }
    //     if (isset($params['vin'])) {
    //         $ro->setVin($params['vin']);
    //     }
    //     if (isset($params['internal'])) {
    //         $ro->setInternal($this->paramToBool($params['internal']));
    //     }
    //     if (isset($params['dmsKey'])) {
    //         $ro->setDmsKey($params['dmsKey']);
    //     }
    //     if (isset($params['waiver'])) {
    //         $ro->setWaiver($params['waiver']);
    //     }
    //     if (isset($params['waiverVerbiage'])) {
    //         $ro->setWaiverVerbiage($params['waiverVerbiage']);
    //     }
    //     if (isset($params['upgradeQue'])) {
    //         $ro->setUpgradeQue($this->paramToBool($params['upgradeQue']));
    //     }
    //     if (isset($params['note'])) {
    //         $ro->setNote($params['note']);
    //     }

    //     return $errors;
    // }

    // /**
    //  * @param array $params
    //  *
    //  * @return Customer|array Array on validation failure
    //  */
    // private function handleCustomer (array $params) {
    //     $customer = $this->customers->findByPhone($params['customerPhone']);
    //     if ($customer !== null) {
    //         $customer->setName($params['customerName']);
    //         $this->customerHelper->commitCustomer($customer);

    //         return $customer;
    //     }
    //     $translated = $this->translateCustomerParams($params);
    //     $errors     = $this->customerHelper->validateParams($translated);
    //     if (!empty($errors)) {
    //         return $this->translateCustomerParams($errors, true);
    //     }
    //     $customer = new Customer();
    //     $this->customerHelper->commitCustomer($customer, $translated);

    //     return $customer;
    // }

    // private function translateCustomerParams (array $params, bool $reverse = false): array {
    //     $map    = [
    //         'customerName'           => 'name',
    //         'customerPhone'          => 'phone',
    //         'skipMobileVerification' => 'skipMobileVerification',
    //     ];
    //     $return = [];

    //     foreach ($map as $from => $to) {
    //         if ($reverse && isset($params[$to])) {
    //             $return[$from] = $params[$to];
    //         } elseif (!$reverse) {
    //             $return[$to] = $params[$from] ?? null;
    //         }
    //     }

    //     return $return;
    // }
}
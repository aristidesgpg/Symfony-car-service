<?php

namespace App\Service;

use App\Entity\Customer;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class CustomerHelper
 *
 * @package App\Service
 */
class CustomerHelper {
    /** @var string[] */
    private const REQUIRED_FIELDS = ['name', 'phone'];

    /** @var EntityManagerInterface */
    private $em;

    /** @var PhoneValidator */
    private $phoneValidator;

    /**
     * CustomerHelper constructor.
     *
     * @param EntityManagerInterface $em
     * @param PhoneValidator         $phoneValidator
     */
    public function __construct (EntityManagerInterface $em, PhoneValidator $phoneValidator) {
        $this->em             = $em;
        $this->phoneValidator = $phoneValidator;
    }

    /**
     * @param array $params
     * @param bool  $checkRequiredFields
     *
     * @return array Empty on successful validation
     */
    public function validateParams (array $params, bool $checkRequiredFields = false): array {
        $errors = [];
        if ($checkRequiredFields === true) {
            foreach (self::REQUIRED_FIELDS as $field) {
                if (!isset($params[$field])) {
                    $errors[$field] = 'Field missing';
                }
            }
        }

        foreach ($params as $k => $v) {
            $msg = null;
            switch ($k) {
                case 'name':
                    if (empty($v)) {
                        $msg = 'Cannot be blank';
                    }
                    break;
                case 'phone':
                    try {
                        $v = $this->stripPhone($v);
                    } catch (\Exception $e) {
                        $msg = 'Invalid phone number';
                        break;
                    }
                    if (!$this->skipMobileVerification($params) && !$this->phoneValidator->isMobile($v)) {
                        $msg = 'Phone number is not mobile';
                    }
                    break;
                case 'email':
                    if (strpos($v, '@') === false) {
                        $msg = 'Invalid email address';
                    }
                    break;
                case 'addedBy':
                    if (!$v instanceof User) {
                        $msg = sprintf('addedBy must be instance of "%s"', User::class);
                    }
                    break;
                case 'doNotContact':
                case 'skipMobileVerification':
                    // Do nothing
                    break;
                default:
                    $msg = 'Unknown key';
            }
            if ($msg !== null) {
                $errors[$k] = $msg;
            }
        }

        return $errors;
    }

    /**
     * @param Customer $customer
     * @param array    $params
     */
    public function commitCustomer (Customer $customer, array $params = []) {
        $errors = $this->validateParams($params);
        dump('CommitCustomer');
        dump($params, $errors);


        if (empty($errors) !== true) {
            return;
        }

        foreach ($params as $k => $v) {
            switch ($k) {
                case 'name':
                    $customer->setName($v);
                    break;
                case 'phone':
                    $customer->setPhone($this->stripPhone($v));
                    $customer->setMobileConfirmed(!$this->skipMobileVerification($params));
                    break;
                case 'email':
                    $customer->setEmail($v);
                    break;
                case 'doNotContact':
                    $customer->setDoNotContact($this->paramToBool($v));
                    break;
                case 'deleted':
                    $customer->setDeleted($this->paramToBool($v));
                    break;
                case 'addedBy':
                    $customer->setAddedBy($v);
                    break;
            }
        }

        if ($customer->getId() === null) {
            $this->em->persist($customer);
        }
        dump('Customer Created.');
        $this->em->beginTransaction();
        try {
            $this->em->flush();
            $this->em->commit();
        } catch (\Exception $e) {
            $this->em->rollback();
            throw new \RuntimeException('Caught exception during flush', 0, $e);
        }

        return $customer;
    }

    private function stripPhone (string $phone): string {
        return $this->phoneValidator->clean($phone);
    }

    private function paramToBool ($param): bool {
        return ($param !== 'false' && $param == true);
    }

    private function skipMobileVerification (array $params): bool {
        $skip = $params['skipMobileVerification'] ?? false;

        return $this->paramToBool($skip);
    }
}

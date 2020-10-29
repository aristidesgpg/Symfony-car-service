<?php

namespace App\Service;

use App\Entity\Customer;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class CustomerHelper
 * @package App\Service
 */
class CustomerHelper {
    private const REQUIRED_FIELDS = ['firstName', 'lastName', 'phone'];

    private $em;
    private $phoneValidator;

    /**
     * CustomerHelper constructor.
     * @param EntityManagerInterface $em
     * @param PhoneValidator         $phoneValidator
     */
    public function __construct(EntityManagerInterface $em, PhoneValidator $phoneValidator) {
        $this->em = $em;
        $this->phoneValidator = $phoneValidator;
    }

    /**
     * @param array $params
     * @param bool  $checkRequiredFields
     *
     * @return array Empty on successful validation
     */
    public function validateParams(array $params, bool $checkRequiredFields = false): array {
        $errors = [];
        if ($checkRequiredFields === true) {
            foreach (self::REQUIRED_FIELDS as $field) {
                if (!isset($params[$field])) {
                    $errors[$field] = 'Field missing';
                }
            }
        }

        foreach ($params as $k=>$v) {
            $msg = null;
            switch ($k) {
                case 'firstName':
                case 'lastName':
                    if (empty($v)) {
                        $msg = 'Cannot be blank';
                    }
                    break;
                case 'phone':
                    try {
                        $this->stripPhone($v);
                    } catch (\Exception $e) {
                        $msg = 'Invalid phone number';
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
                    // @TODO: Tyler H., Nothing?
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
     * @param Customer $c
     * @param array    $params
     */
    public function commitCustomer(Customer $c, array $params = []): void {
        $valid = empty($this->validateParams($params));
        if ($valid !== true) {
            throw new \InvalidArgumentException('Params did not validate. Call validateParams first.');
        }
        foreach ($params as $k=>$v) {
            switch ($k) {
                case 'firstName':
                    $c->setFirstName($v);
                    break;
                case 'lastName':
                    $c->setLastName($v);
                    break;
                case 'phone':
                    $c->setPhone($this->stripPhone($v));
                    break;
                case 'mobileConfirmed':
                    $c->setMobileConfirmed($this->paramToBool($v));
                    break;
                case 'email':
                    $c->setEmail($v);
                    break;
                case 'doNotContact':
                    $c->setDoNotContact($this->paramToBool($v));
                    break;
                case 'deleted':
                    $c->setDeleted($this->paramToBool($v));
                    break;
                case 'addedBy':
                    $c->setAddedBy($v);
                    break;
            }
        }

        if ($c->getId() === null) {
            $this->em->persist($c);
        }
        $this->em->beginTransaction();
        try {
            $this->em->flush();
            $this->em->commit();
        } catch (\Exception $e) {
            $this->em->rollback();
            throw new \RuntimeException('Caught exception during flush', 0, $e);
        }
    }

    private function stripPhone(string $phone): string {
        return $this->phoneValidator->clean($phone);
    }

    private function paramToBool($param): bool {
        return ($param !== 'false' && $param == true);
    }
}

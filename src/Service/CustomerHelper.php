<?php

namespace App\Service;

use App\Entity\Customer;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class CustomerHelper.
 */
class CustomerHelper
{
    /** @var string[] */
    private const REQUIRED_FIELDS = ['name', 'phone'];

    /** @var EntityManagerInterface */
    private $em;

    /** @var PhoneValidator */
    private $phoneValidator;

    /**
     * CustomerHelper constructor.
     */
    public function __construct(EntityManagerInterface $em, PhoneValidator $phoneValidator)
    {
        $this->em = $em;
        $this->phoneValidator = $phoneValidator;
    }

    /**
     * @return array Empty on successful validation
     */
    public function validateParams(array $params, bool $checkRequiredFields = false): array
    {
        $errors = [];
        if (true === $checkRequiredFields) {
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
                    if (false === strpos($v, '@')) {
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
                default:
                    // Do nothing
                    break;
            }
            if (null !== $msg) {
                $errors[$k] = $msg;
            }
        }

        return $errors;
    }

    public function commitCustomer(Customer $customer, array $params = [])
    {
        //$errors = $this->validateParams($params);
        $errors = [];

        if (true !== empty($errors)) {
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

        if (null === $customer->getId()) {
            $this->em->persist($customer);
        }

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

    private function stripPhone(string $phone): string
    {
        return $this->phoneValidator->clean($phone);
    }

    private function paramToBool($param): bool
    {
        return 'false' !== $param && true == $param;
    }

    private function skipMobileVerification(array $params): bool
    {
        $skip = $params['skipMobileVerification'] ?? false;

        return $this->paramToBool($skip);
    }
}

<?php

namespace App\Service;

use Exception;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Rest\Client;

/**
 * Class PhoneValidator
 *
 * @package App\Service
 */
class PhoneValidator {
    /**
     * @var Client
     */
    private $twilio;

    /**
     * PhoneValidator constructor.
     *
     * @param string $sid
     * @param string $authToken
     *
     * @throws ConfigurationException
     */
    public function __construct (string $sid, string $authToken) {
        $this->twilio = new Client($sid, $authToken);
    }

    /**
     * @param string $phone
     *
     * @return string
     * @throws Exception
     */
    public function clean (string $phone) {
        // Remove +1 if it's there. Remove non-integers
        $phone = ltrim($phone, '+1');
        $phone = preg_replace("/[^0-9]/", '', $phone);

        // Wasn't a +1, but there was an extra 1
        if (strlen($phone) > 10) {
            $phone = ltrim($phone, '1');
        }

        if ($phone > 10) {
            $phone = substr($phone, 0, 10);
        }

        // Should only be 10 chars 8475551234
        if (strlen($phone) != 10) {
            throw new Exception('Invalid Phone Number: ' . $phone);
        }

        return $phone;
    }
}

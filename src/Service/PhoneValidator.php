<?php

namespace App\Service;

use App\Entity\PhoneLookup;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;
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
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * PhoneValidator constructor.
     *
     * @param string                 $sid
     * @param string                 $authToken
     * @param EntityManagerInterface $em
     *
     * @throws ConfigurationException
     */
    public function __construct (string $sid, string $authToken, EntityManagerInterface $em) {
        $this->twilio = new Client($sid, $authToken);
        $this->em = $em;
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

    /**
     * @param string $phone
     *
     * @return bool
     */
    public function isMobile (string $phone): bool {
        $phone  = '+1' . $phone;
        $lookup = $this->em->find(PhoneLookup::class, $phone);
        if ($lookup === null) {
            $lookup = $this->lookupNumber($phone);
        }

        return ($lookup->getCarrierType() === 'mobile');
    }

    /**
     * @param string $phone
     *
     * @return PhoneLookup
     */
    private function lookupNumber (string $phone): PhoneLookup {
        try {
            $instance = $this->twilio->lookups->v1->phoneNumbers($phone)->fetch(['type' => 'carrier']);
            $lookup = new PhoneLookup($phone, $instance);
        } catch (TwilioException $e) {
            if ($e->getCode() === 20404) { // Technically a 404, can mean a bad/non-existent phone number
                $lookup = new PhoneLookup($phone);
            } else {
                throw new \RuntimeException('Caught twilio exception', 0, $e);
            }
        }
        $this->em->persist($lookup);
        $this->em->flush();

        return $lookup;
    }
}

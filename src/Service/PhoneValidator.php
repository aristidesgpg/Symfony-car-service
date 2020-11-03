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
     * @param string $mdn
     *
     * @return bool
     */
    public function isMobile (string $mdn): bool {
        $mdn = '+1' . $mdn;
        $lookup = $this->em->find(PhoneLookup::class, $mdn);
        if ($lookup === null) {
            $lookup = $this->lookupNumber($mdn);
        }

        return ($lookup->getCarrierType() === 'mobile');
    }

    private function lookupNumber (string $mdn): PhoneLookup {
        try {
            $instance = $this->twilio->lookups->v1->phoneNumbers($mdn)->fetch(['type' => 'carrier']);
        } catch (TwilioException $e) {
            throw new \RuntimeException('Caught twilio exception', 0, $e);
        }
        $lookup = new PhoneLookup($instance);
        $this->em->persist($lookup);
        $this->em->flush();

        return $lookup;
    }
}

<?php

namespace App\Service;

use App\Entity\PhoneLookup;
use App\Repository\PhoneLookupRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;

class PhoneValidator
{
    private $em;
    private $phoneLookupRepository;
    private $twilio;

    public function __construct(
        EntityManagerInterface $em,
        PhoneLookupRepository $phoneLookupRepository,
        Client $twilio
    ) {
        $this->em = $em;
        $this->phoneLookupRepository = $phoneLookupRepository;
        $this->twilio = $twilio;
    }

    /**
     * @throws Exception
     */
    public function clean(string $phone)
    {
        // Remove +1 if it's there. Remove non-integers
        $phone = ltrim($phone, '+1');
        $phone = preg_replace('/[^0-9]/', '', $phone);

        // Wasn't a +1, but there was an extra 1
        if (strlen($phone) > 10) {
            $phone = ltrim($phone, '1');
        }

        if ($phone > 10) {
            $phone = substr($phone, 0, 10);
        }

        // Should only be 10 chars 8475551234
        if (strlen($phone) != 10) {
            throw new Exception('Invalid Phone Number: '.$phone);
        }

        return $phone;
    }

    public function isMobile(string $phone): bool
    {
        try {
            $lookup = $this->lookupNumber($phone);
        } catch (Exception $e) {
            return false;
        }

        return $lookup->getCarrierType() === 'mobile';
    }

    /**
     * @throws Exception
     */
    public function lookupNumber(string $phone): PhoneLookup
    {
        $phone = '+1'.$phone;
        $lookup = $this->em->find(PhoneLookup::class, $phone);
        if ($lookup instanceof PhoneLookup) {
            return $lookup;
        }

        try {
            $instance = $this->twilio->lookups->v1->phoneNumbers($phone)->fetch(['type' => 'carrier']);
            $lookup = new PhoneLookup($phone, $instance);
        } catch (TwilioException $e) {
            if ($e->getCode() === 20404) { // Technically a 404, can mean a bad/non-existent phone number
                $lookup = new PhoneLookup($phone);
            } else {
                throw new Exception('Caught twilio exception', 0, $e);
            }
        }
        $this->em->persist($lookup);
        $this->em->flush();

        return $lookup;
    }
}

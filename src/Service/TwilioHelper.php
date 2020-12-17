<?php

namespace App\Service;

use App\Entity\PhoneLookup;
use Doctrine\ORM\EntityManagerInterface;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;

class TwilioHelper {
    /** @var Client */
    private $twilio;

    /** @var EntityManagerInterface */
    private $em;

    /** @var string */
    private $fromNumber;

    public function __construct(Client $twilio, EntityManagerInterface $em, string $fromNumber) {
        $this->twilio = $twilio;
        $this->em = $em;
        $this->fromNumber = $fromNumber;
    }

    /**
     * @param string $phone
     * @param string $msg
     *
     * @throws TwilioException
     */
    public function sendSms (string $phone, string $msg): void {
        $this->twilio->messages->create('+1' . $phone, [
            'body' => $msg,
            'from' => $this->fromNumber,
        ]);
    }

    /**
     * @param string $phone
     *
     * @return PhoneLookup
     */
    public function lookupNumber (string $phone): PhoneLookup {
        $phone = '+1' . $phone;
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
                throw new \RuntimeException('Caught twilio exception', 0, $e);
            }
        }
        $this->em->persist($lookup);
        $this->em->flush();

        return $lookup;
    }
}
<?php

namespace App\Service;

use App\Entity\PhoneLookup;
use App\Helper\iServiceLoggerTrait;
use Doctrine\ORM\EntityManagerInterface;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;

class TwilioHelper {
    use iServiceLoggerTrait;

    /** @var Client */
    private $twilio;

    /** @var EntityManagerInterface */
    private $em;

    /** @var string */
    private $fromNumber;

    /** @var PhoneValidator */
    private $phoneValidator;

    public function __construct (Client $twilio, EntityManagerInterface $em, SettingsHelper $settings, PhoneValidator $phoneValidator) {
        $this->twilio         = $twilio;
        $this->em             = $em;
        $this->fromNumber     = '+1' . $settings->getSetting('serviceTwilioFromNumber');
        $this->phoneValidator = $phoneValidator;
    }

    /**
     * @param string $phone
     * @param string $msg
     *
     * @throws \Exception
     */
    public function sendSms (string $phone, string $msg): void {
        if (preg_match('/https?:\/\//', $msg)) {
            $this->curlIsre($phone, $msg);
        } else {
            $this->twilio->messages->create('+1' . $phone, [
                'body' => $msg,
                'from' => $this->fromNumber,
            ]);
        }
    }

    /**
     * @param string $phone
     *
     * @return PhoneLookup
     */
    public function lookupNumber (string $phone): PhoneLookup {
        $phone  = '+1' . $phone;
        $lookup = $this->em->find(PhoneLookup::class, $phone);
        if ($lookup instanceof PhoneLookup) {
            return $lookup;
        }

        try {
            $instance = $this->twilio->lookups->v1->phoneNumbers($phone)->fetch(['type' => 'carrier']);
            $lookup   = new PhoneLookup($phone, $instance);
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

    /**
     * @param string $phone
     * @param string $msg
     */
    private function curlIsre (string $phone, string $msg): void {
        $endpoint = 'http://isre.us/api/twilio-short-code/send';
        $curl     = curl_init($endpoint);
        curl_setopt_array($curl, [
            CURLOPT_POST           => true,
            CURLOPT_TIMEOUT        => 10,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS     => [
                'phone'   => $phone,
                'message' => $msg,
            ],
            CURLOPT_HTTPHEADER     => [
                'Authorization: Bearer W*pmwqvH&@*2vd+w',
            ],
        ]);
        $response = json_decode(curl_exec($curl), true);
        curl_close($curl);

        if (!$response || isset($response['error'])) {
            $error = sprintf(
                'Could not send message with shortcode. Error: (%s) %s',
                $response['error'] ?? 'Unknown',
                $response['message'] ?? 'Unknown'
            );
            $this->logInfo($error);
            if($this->phoneValidator->isMobile())
                throw new \RuntimeException($error);
        }
    }
}

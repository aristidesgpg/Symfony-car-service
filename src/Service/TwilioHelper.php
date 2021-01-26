<?php

namespace App\Service;

use App\Entity\ServiceSMS;
use App\Entity\PhoneLookup;
use App\Helper\iServiceLoggerTrait;
use Doctrine\ORM\EntityManagerInterface;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class TwilioHelper {
    use iServiceLoggerTrait;

    /** @var Client */
    private $twilio;

    /** @var EntityManagerInterface */
    private $em;

    /** @var string */
    private $fromNumber;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    public function __construct (Client $twilio, EntityManagerInterface $em, SettingsHelper $settings, UrlGeneratorInterface $urlGenerator) {
        $this->twilio       = $twilio;
        $this->em           = $em;
        $this->fromNumber   = '+1' . $settings->getSetting('serviceTwilioFromNumber');
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @param string $phone
     * @param string $msg
     *
     * @throws \Exception
     */
    public function sendSms (string $phone, string $msg): string {
        $phone    = str_replace(['.', '-', '\\', '(', ')', 'x', ' ', '+'], '', $phone);
        $phone    = substr($phone, 0, 10);
        
        if (preg_match('/https?:\/\//', $msg)) {
            $message = $this->curlIsre($phone, $msg);
        } else {
            $message = $this->twilio->messages->create('+1' . $phone, [
                'body' => $msg,
                'from' => $this->fromNumber,
                'statusCallback' => $this->urlGenerator->generate('app_servicesms_statuscallback', [], UrlGeneratorInterface::ABSOLUTE_URL)
            ]);
        }
        return $message->sid;
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
    private function curlIsre (string $phone, string $msg): string {
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
            throw new \RuntimeException($error);
        }

        return $response;
    }
}

<?php

namespace App\Service;

use App\Entity\Customer;
use App\Entity\ServiceSMS;
use App\Entity\User;
use App\Helper\iServiceLoggerTrait;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Security;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;

class TwilioHelper
{
    use iServiceLoggerTrait;

    private $twilio;
    private $em;
    private $fromNumber;
    private $urlGenerator;
    private $phoneValidator;

    public function __construct(
        Client $twilio,
        EntityManagerInterface $em,
        SettingsHelper $settings,
        UrlGeneratorInterface $urlGenerator,
        PhoneValidator $phoneValidator,
        Security $security
    ) {
        $this->twilio = $twilio;
        $this->em = $em;
        $this->fromNumber = '+1'.$settings->getSetting('serviceTwilioFromNumber');
        $this->urlGenerator = $urlGenerator;
        $this->phoneValidator = $phoneValidator;
        $this->user = $security->getUser();
    }

    /**
     * @throws TwilioException|Exception
     */
    public function sendSms(Customer $customer, string $msg): bool
    {
        $phone = $customer->getPhone();

        // Try to validate the phone number
        try {
            $phone = $this->phoneValidator->clean($phone);
        } catch (Exception $e) {
            return false;
        }

        // If the message contains a link it has to come from our shortcode
        if (preg_match('/https?:\/\//', $msg)) {
            $response = $this->sendShortcode($phone, $msg);
        } else {
            $callbackURL = $this->urlGenerator->generate(
                'app_servicesms_statuscallback',
                [],
                UrlGeneratorInterface::ABSOLUTE_URL
            );

            // Doing this locally, don't set the callback so it doesn't error out
            if (strpos($callbackURL, 'localhost')) {
                $callbackURL = '';
            }

            $response = $this->twilio->messages->create(
                '+1'.$phone,
                [
                    'body' => $msg,
                    'from' => $this->fromNumber,
                    'statusCallback' => $callbackURL,
                ]
            );
        }

        // Create new record
        $serviceSMS = new ServiceSMS();
        $serviceSMS->setCustomer($customer)
                   ->setPhone($phone)
                   ->setIncoming(0)
                   ->setMessage($msg)
                   ->setIsRead(1);

        if ($this->user instanceof User) {
            $serviceSMS->setUser($this->user);
        }

        if (isset($response->sid)) {
            $serviceSMS->setSid($response->sid);
        }

        $this->em->persist($serviceSMS);
        $this->em->flush();

        return true;
    }

    /**
     * @throws Exception
     */
    private function sendShortcode(string $phone, string $msg): string
    {
        $endpoint = 'http://isre.us/api/twilio-short-code/send';
        $curl = curl_init($endpoint);
        curl_setopt_array(
            $curl,
            [
                CURLOPT_POST => true,
                CURLOPT_TIMEOUT => 10,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POSTFIELDS => [
                    'phone' => $phone,
                    'message' => $msg,
                ],
                CURLOPT_HTTPHEADER => [
                    'Authorization: Bearer W*pmwqvH&@*2vd+w',
                ],
            ]
        );
        $response = json_decode(curl_exec($curl), true);
        curl_close($curl);

        if (!$response || isset($response['error'])) {
            $error = sprintf(
                'Could not send message with shortcode. Error: (%s) %s',
                $response['error'] ?? 'Unknown',
                $response['message'] ?? 'Unknown'
            );
            $this->logInfo($error);

            throw new Exception($error);
        }

        return $response;
    }

    /**
     * Encode emoji in text
     *
     * @param string $text text to encode
     *
     * @return null|string|string[]
     */
    public function Encode($text)
    {
        return $this->convertEmoji($text, "ENCODE");
    }

    /**
     * @param $text
     * @param $op
     *
     * @return null|string|string[]
     */
    public function convertEmoji($text, $op)
    {
        if ($op == "ENCODE") {
            return preg_replace_callback(
                '/([0-9|#][\x{20E3}])|[\x{00ae}|\x{00a9}|\x{203C}|\x{2047}|\x{2048}|\x{2049}|\x{3030}|\x{303D}|\x{2139}|\x{2122}|\x{3297}|\x{3299}][\x{FE00}-\x{FEFF}]?|[\x{2190}-\x{21FF}][\x{FE00}-\x{FEFF}]?|[\x{2300}-\x{23FF}][\x{FE00}-\x{FEFF}]?|[\x{2460}-\x{24FF}][\x{FE00}-\x{FEFF}]?|[\x{25A0}-\x{25FF}][\x{FE00}-\x{FEFF}]?|[\x{2600}-\x{27BF}][\x{FE00}-\x{FEFF}]?|[\x{2600}-\x{27BF}][\x{1F000}-\x{1FEFF}]?|[\x{2900}-\x{297F}][\x{FE00}-\x{FEFF}]?|[\x{2B00}-\x{2BF0}][\x{FE00}-\x{FEFF}]?|[\x{1F000}-\x{1F9FF}][\x{FE00}-\x{FEFF}]?|[\x{1F000}-\x{1F9FF}][\x{1F000}-\x{1FEFF}]?/u',
                ['self', "encodeEmoji"],
                $text
            );
        } else {
            return preg_replace_callback('/(\\\u[0-9a-f]{4})+/', ['self', "decodeEmoji"], $text);
        }
    }

    /**
     * Decode emoji in text
     *
     * @param string $text text to decode
     *
     * @return null|string|string[]
     */
    public function Decode($text)
    {
        return $this->convertEmoji($text, "DECODE");
    }

    /**
     * @param $match
     *
     * @return mixed
     */
    public function encodeEmoji($match)
    {
        return str_replace(['[', ']', '"'], '', json_encode($match));
    }

    /**
     * @param $text
     *
     * @return mixed|string
     */

    private function decodeEmoji($text)
    {
        if (!$text) {
            return '';
        }
        $text = $text[0];
        $decode = json_decode($text, true);
        if ($decode) {
            return $decode;
        }
        $text = '["'.$text.'"]';
        $decode = json_decode($text);
        if (count($decode) == 1) {
            return $decode[0];
        }

        return $text;
    }
}

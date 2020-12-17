<?php

namespace App\Service;

use App\Entity\ServiceSMS;
use App\Entity\PhoneLookup;
use Doctrine\ORM\EntityManagerInterface;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;

class TwilioHelper {
    private const FROM_NUMBER = ''; // TODO

    /** @var Client */
    private $twilio;

    /** @var EntityManagerInterface */
    private $em;

    public function __construct(Client $twilio, EntityManagerInterface $em) {
        $this->twilio = $twilio;
        $this->em = $em;
    }

    /**
     * @param string $phone
     * @param string $msg
     *
     * @throws TwilioException
     */
    public function sendSms (string $phone, string $msg): void {
        $this->twilio->messages->create('+1' . $phone, [
            'message' => $msg,
            'from' => self::FROM_NUMBER,
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

    /**
     * @param Request $request
     *
     * @return SMS|bool
     */
    public function handleIncoming (Request $request) {
        $message    = $this->Encode($request->get('Body'));
        $userID     = $this->Encode($request->get('User'));
        $customerID = $this->Encode($request->get('Customer'));
        $number     = $request->get('From');
        
        //check if user and customer exists
        $user       = $userRepo->findBy(["id" => $userID]);
        $customer   = $customerRepo->findBy(["id" => $customerID]);
        if(!$customer || !$customer){
            return false;
        }

        $serviceSMS = new ServiceSMS();
        $serviceSMS->setUser($user)
                   ->setCustomer($customer)
                   ->setPhone($number)
                   ->setMessage($message)
                   ->setIncoming(true);

        try {
            $this->em->persist($serviceSMS);
            $this->em->flush();
        } catch (OptimisticLockException $e) {
            return false;
        } catch (ORMException $e) {
            return false;
        }

        return $serviceSMS;
    }

    /**
     * Encode emoji in text
     *
     * @param string $text text to encode
     *
     * @return null|string|string[]
     */
    public static function Encode ($text) {
        return self::convertEmoji($text, "ENCODE");
    }

    /**
     * Decode emoji in text
     *
     * @param string $text text to decode
     *
     * @return null|string|string[]
     */
    public static function Decode ($text) {
        return self::convertEmoji($text, "DECODE");
    }
    
    /**
     * @param $text
     * @param $op
     *
     * @return null|string|string[]
     */
    private static function convertEmoji ($text, $op) {
        if ($op == "ENCODE") {
            return preg_replace_callback('/([0-9|#][\x{20E3}])|[\x{00ae}|\x{00a9}|\x{203C}|\x{2047}|\x{2048}|\x{2049}|\x{3030}|\x{303D}|\x{2139}|\x{2122}|\x{3297}|\x{3299}][\x{FE00}-\x{FEFF}]?|[\x{2190}-\x{21FF}][\x{FE00}-\x{FEFF}]?|[\x{2300}-\x{23FF}][\x{FE00}-\x{FEFF}]?|[\x{2460}-\x{24FF}][\x{FE00}-\x{FEFF}]?|[\x{25A0}-\x{25FF}][\x{FE00}-\x{FEFF}]?|[\x{2600}-\x{27BF}][\x{FE00}-\x{FEFF}]?|[\x{2600}-\x{27BF}][\x{1F000}-\x{1FEFF}]?|[\x{2900}-\x{297F}][\x{FE00}-\x{FEFF}]?|[\x{2B00}-\x{2BF0}][\x{FE00}-\x{FEFF}]?|[\x{1F000}-\x{1F9FF}][\x{FE00}-\x{FEFF}]?|[\x{1F000}-\x{1F9FF}][\x{1F000}-\x{1FEFF}]?/u', ['self', "encodeEmoji"], $text);
        } else {
            return preg_replace_callback('/(\\\u[0-9a-f]{4})+/', ['self', "decodeEmoji"], $text);
        }
    }

    /**
     * @param $match
     *
     * @return mixed
     */
    private static function encodeEmoji ($match) {
        return str_replace(['[', ']', '"'], '', json_encode($match));
    }

    /**
     * @param $text
     *
     * @return mixed|string
     */
    private static function decodeEmoji ($text) {
        if (!$text) return '';
        $text   = $text[0];
        $decode = json_decode($text, true);
        if ($decode) return $decode;
        $text   = '["' . $text . '"]';
        $decode = json_decode($text);
        if (count($decode) == 1) {
            return $decode[0];
        }
        return $text;
    }
}
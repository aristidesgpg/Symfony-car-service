<?php

namespace App\Service;

use App\Controller\SettingsController;

class ShortUrlHelper
{
    public const  MAX_SMS_MSG_LEN = SettingsController::SMS_EXTRA_MAX_LENGTH;
    private const ENDPOINT = 'http://isre.us/api/create-short-url';

    /** @var string */
    private $accessToken;

    /** @var TwilioHelper */
    private $twilio;

    /**
     * ShortcodeHelper constructor.
     * @param string $accessToken
     * @param TwilioHelper $twilio
     */
    public function __construct(string $accessToken, TwilioHelper $twilio)
    {
        $this->accessToken = $accessToken;
        $this->twilio = $twilio;
    }

    /**
     * @param string $phone
     * @param string $msg
     * @param string $url
     * @param bool $urlIsShort
     * @throws \Exception
     */
    public function sendShortenedLink(string $phone, string $msg, string $url, bool $urlIsShort = false): void
    {
        $msg = rtrim($msg);
        if (strlen($msg) > self::MAX_SMS_MSG_LEN) {
            throw new \InvalidArgumentException(sprintf('$msg too long. Must be <= %d', self::MAX_SMS_MSG_LEN));
        }

        if (true === $urlIsShort) {
            $shortUrl = $url;
        } else {
            $shortUrl = $this->generateShortUrl($url);
        }

        $msg .= ' '.$shortUrl;
        $this->twilio->sendSms($phone, $msg);
    }

    public function generateShortUrl(string $url): string
    {
        if (!preg_match('/^http/', $url)) {
            $url = 'https://'.$url;
        }
        $response = $this->curl(self::ENDPOINT, [
            'access_token' => $this->accessToken,
            'url' => $url,
        ]);
        if (!isset($response['url']) || empty($response['url'])) {
            throw new \RuntimeException('Did not get short URL');
        }

        return $response['url'];
    }

    private function curl(string $url, array $post): array
    {
        $curl = curl_init($url);
        curl_setopt_array($curl, [
            CURLOPT_TIMEOUT => 20,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $post,
        ]);
        $response = curl_exec($curl);
        if (false === $response) {
            $msg = sprintf('Encountered cURL error: (%d) %s', curl_errno($curl), curl_error($curl));
            throw new \RuntimeException($msg);
        }
        curl_close($curl);

        $json = json_decode($response, true);
        if (is_array($json)) {
            return $json;
        } else {
            return [];
        }
    }
}

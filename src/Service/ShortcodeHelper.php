<?php

namespace App\Service;

use App\Controller\SettingsController;

class ShortcodeHelper {
    public const  MAX_SMS_MSG_LEN = SettingsController::SMS_EXTRA_MAX_LENGTH;
    private const ENDPOINT        = 'http://isre.us/api/create-short-url';

    private $accessToken;

    public function __construct (string $accessToken) {
        $this->accessToken = $accessToken;
    }

    public function sendShortenedLink (string $phone, string $msg, string $url, bool $urlIsShort = false): void {
        if (strlen($msg) > self::MAX_SMS_MSG_LEN) {
            throw new \InvalidArgumentException(sprintf('$msg too long. Must be <= %d', self::MAX_SMS_MSG_LEN));
        }
        if ($urlIsShort === true) {
            $shortcode = $url;
        } else {
            $shortcode = $this->generateShortcode($url);
        }
        // TODO: Twilio
    }

    public function generateShortcode (string $url): string {
        $response = $this->curl(self::ENDPOINT, [
            'access_token' => $this->accessToken,
            'url'          => $url,
        ]);
        if (!isset($response['url']) || empty($response['url'])) {
            throw new \RuntimeException('Did not get shortcode');
        }

        return $response['url'];
    }

    private function curl (string $url, array $post): array {
        $curl = curl_init($url);
        curl_setopt_array($curl, [
            CURLOPT_TIMEOUT        => 20,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $post,
        ]);
        $response = curl_exec($curl);
        if ($response === false) {
            $msg = sprintf('Encountered cURL error: (%d) %s', curl_errno($curl), curl_error($curl));
            throw new \RuntimeException($msg);
        }
        curl_close($curl);

        return json_decode($response, true);
    }
}
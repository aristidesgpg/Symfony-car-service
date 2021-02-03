<?php

namespace App\Service;

use RuntimeException;

class ShortUrlHelper
{
    private const ENDPOINT = 'http://isre.us/api/create-short-url';
    private $accessToken;
    private $twilio;
    private $phoneValidator;

    public function __construct(string $accessToken, TwilioHelper $twilio, PhoneValidator $phoneValidator)
    {
        $this->accessToken = $accessToken;
        $this->twilio = $twilio;
        $this->phoneValidator = $phoneValidator;
    }

    public function generateShortUrl(string $url): string
    {
        if (!preg_match('/^http/', $url)) {
            $url = 'https://'.$url;
        }
        $response = $this->curl(
            self::ENDPOINT,
            [
                'access_token' => $this->accessToken,
                'url' => $url,
            ]
        );
        if (!isset($response['url']) || empty($response['url'])) {
            throw new RuntimeException('Did not get short URL');
        }

        return $response['url'];
    }

    private function curl(string $url, array $post): array
    {
        $curl = curl_init($url);
        curl_setopt_array(
            $curl,
            [
                CURLOPT_TIMEOUT => 20,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $post,
            ]
        );
        $response = curl_exec($curl);
        if ($response === false) {
            $msg = sprintf('Encountered cURL error: (%d) %s', curl_errno($curl), curl_error($curl));
            throw new RuntimeException($msg);
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

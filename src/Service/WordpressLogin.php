<?php

namespace App\Service;

/**
 * Class WordpressLogin.
 */
class WordpressLogin
{
    /**
     * @var string
     */
    private $dealerWPEndpoint = 'http://iserviceauto.com/wp-json/jwt-auth/v1/token';

    /**
     * @var string
     */
    private $internalAgentWPEndpoint = ''; // TBD

    /**
     * @param bool $dealer
     */
    public function validateUserPassword(string $username, string $password, $dealer = true): bool
    {
        $endpoint = $dealer ? $this->dealerWPEndpoint : $this->internalAgentWPEndpoint;
        $data = [
            'username' => $username,
            'password' => $password,
        ];
        $curl = curl_init();

        $curlOptions = [
            CURLOPT_URL => $endpoint,
            CURLOPT_POSTFIELDS => http_build_query($data),
            CURLOPT_RETURNTRANSFER => true,
        ];

        curl_setopt_array($curl, $curlOptions);

        $response = json_decode(curl_exec($curl));
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if (200 != $httpCode) {
            return false;
        }

        return true;
    }
}

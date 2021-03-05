<?php

namespace App\Service;

use Exception;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

/**
 * Class Curl
 *
 * @package App\Service
 */
class Curl {

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Curl constructor.
     *
     * @param Logger $logger
     */
    public function __construct (Logger $logger) {
        $this->logger = $logger;
    }

    /**
     * @param string $url
     * @param array  $parameters
     * @param array  $headers
     *
     * @return bool|string
     * @throws Exception
     */
    public function curl ($url, $parameters = [], $headers = []) {
        $curlOptions = [
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false
        ];

        // Parameters were posted, so pass them as post fields
        if ($parameters) {
            $curlOptions[CURLOPT_POST]       = true;
            $curlOptions[CURLOPT_POSTFIELDS] = http_build_query($parameters);
        }

        // Custom headers were passed, add them to the request
        if ($headers) {
            $curlOptions[CURLOPT_HTTPHEADER] = $headers;
        }

        $ch = curl_init();

        curl_setopt_array($ch, $curlOptions);
        $response = curl_exec($ch);

        if ($curlError = curl_error($ch)) {
            $this->logger->critical($curlError, $curlOptions);
            throw new Exception($curlError);
        }

        curl_close($ch);

        return $response;
    }
}
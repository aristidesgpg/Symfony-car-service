<?php

namespace App\Service;

use App\Entity\SoapErrorLog;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

/**
 * Class SOAP
 *
 * @package App\Service
 */
class SOAP {
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * SOAP constructor.
     *
     * @param EntityManagerInterface $em
     */
    public function __construct (EntityManagerInterface $em) {
        $this->em = $em;
    }

    /**
     * Send SOAP Request - General function do not modify anything here unless you want to debug something
     *
     * @param         $headers
     * @param string  $url           - Endpoint url for request
     * @param string  $xmlPostString - XML request string
     *
     * @return bool
     */
    public function sendRequest ($headers, $url, $xmlPostString) {
        $curlOptions = [
            CURLOPT_URL            => $url,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $xmlPostString,
            CURLOPT_HTTPHEADER     => $headers,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_ENCODING       => 'UTF-8',
            CURLOPT_SSL_VERIFYPEER  => false // should only be done locally
        ];

        $ch = curl_init();
        curl_setopt_array($ch, $curlOptions);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        $error = curl_error($ch);

        if ($error) {
            $this->logError($xmlPostString, $error);

            return false;
        }

        if ($httpCode !== 200) {
            $this->logError($xmlPostString, $response);

            return false;
        }

        curl_close($ch);

        return $response;
    }

    /**
     * @param $request
     * @param $response
     *
     * @return bool
     */
    public function logError ($request, $response) {
        $soapErrorLog = new SoapErrorLog();
        $soapErrorLog->setRequest($request)->setResponse($response);

        try {
            $this->em->persist($soapErrorLog);
            $this->em->flush();
        } catch (OptimisticLockException $e) {
            return false;
        } catch (ORMException $e) {
            return false;
        }

        return true;
    }
}

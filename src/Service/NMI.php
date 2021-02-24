<?php

namespace App\Service;

use App\Entity\PaymentResponse;
use App\Exception\PaymentException;
use App\Helper\iServiceLoggerTrait;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class NMI.
 */
class NMI
{
    use iServiceLoggerTrait;
    private const ENDPOINT_URL = 'https://secure.networkmerchants.com/api/';

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * NMI constructor.
     */
    public function __construct(string $username, string $password, EntityManagerInterface $em)
    {
        $this->username = $username;
        $this->password = $password;
        $this->em = $em;
    }

    /**
     * @throws \Exception|PaymentException
     */
    public function makePayment(string $paymentToken, string $amount): PaymentResponse
    {
        $response = $this->curl('sale', [
            'payment_token' => $paymentToken,
            'amount' => $amount,
        ]);
        if ($response->isOk()) {
            return $response;
        }
        $reason = sprintf('Payment failed. Code: %s Reason: %s', $response->getCode(), $response->getResponseText());

        throw new PaymentException($response, $reason);
    }

    /**
     * @throws \Exception|PaymentException
     */
    public function makeRefund(string $transactionId, string $amount): PaymentResponse
    {
        $response = $this->curl('refund', [
            'transaction_id' => $transactionId,
            'amount' => $amount,
        ]);
        if ($response->isOk()) {
            return $response;
        }
        $reason = sprintf('Refund failed. Code: %s Reason: %s', $response->getCode(), $response->getResponseText());

        throw new PaymentException($response, $reason);
    }

    /**
     * @throws \Exception
     */
    public function lookupTransaction(string $transactionId): array
    {
        return $this->query($transactionId);
    }

    /**
     * @throws \Exception
     */
    protected function curl(string $type, array $data): PaymentResponse
    {
        $data = array_merge($data, [
            'type' => $type,
            'username' => $this->username,
            'password' => $this->password,
        ]);

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => self::ENDPOINT_URL.'transact.php',
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($data),
            CURLOPT_RETURNTRANSFER => true,
        ]);

        $response = curl_exec($ch);
        if (!$response) {
            $this->handleCurlError($ch, $type);
        }

        $entity = new PaymentResponse($type, $response);
        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }

    /**
     * @throws \Exception
     */
    protected function query(string $transactionId): array
    {
        $data = [
            'username' => $this->username,
            'password' => $this->password,
            'transaction_id' => $transactionId,
        ];

        $ch = curl_init(self::ENDPOINT_URL.'query.php?'.http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if (!$response) {
            $this->handleCurlError($ch, 'query');
        }

        $xml = simplexml_load_string($response);
        if (!$xml) {
            throw new \Exception('Could not parse XML');
        }

        return json_decode(json_encode($xml), true);
    }

    /**
     * @param resource $ch
     *
     * @throws \Exception
     */
    private function handleCurlError($ch, string $operation): void
    {
        $msg = sprintf('Encountered cURL error during %s: "%s"', $operation, curl_error($ch));
        $this->logger->critical($msg);

        throw new \Exception($msg, curl_errno($ch));
    }
}

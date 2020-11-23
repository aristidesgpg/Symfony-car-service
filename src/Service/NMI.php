<?php

namespace App\Service;

use App\Entity\PaymentResponse;
use App\Helper\iServiceLoggerTrait;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class NMI
 *
 * @package App\Service
 */
class NMI {
    private const ENDPOINT_URL = 'https://secure.networkmerchants.com/api/transact.php';

    use iServiceLoggerTrait;

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
    private $em;

    /**
     * NMI constructor.
     *
     * @param string                 $username
     * @param string                 $password
     * @param EntityManagerInterface $em
     */
    public function __construct (string $username, string $password, EntityManagerInterface $em) {
        $this->username = $username;
        $this->password = $password;
        $this->em       = $em;
    }

    /**
     * @param $paymentToken
     * @param $amount
     *
     * @return bool
     * @throws \Exception
     */
    public function makePayment ($paymentToken, $amount): bool {
        $response = $this->curl('sale', [
            'payment_token' => $paymentToken,
            'amount'        => $amount,
        ]);
        if ($response->isOk()) {
            return true;
        }

        switch ($response->getCode()) {
            case 300:
                $reason = 'Duplicate Transaction. If splitting the payment into two transactions, make one transaction amount different from the other in order to prevent the payment processor marking it as a duplicate.';
                break;
            default:
                $reason = "Payment failed. Reason: {$response->getResponse()}";
        }

        throw new \Exception($reason);
    }

    /**
     * @param $transactionId
     * @param $amount
     *
     * @return bool
     * @throws \Exception
     */
    public function makeRefund ($transactionId, $amount): bool {
        $response = $this->curl('refund', [
            'transaction_id' => $transactionId,
            'amount'         => $amount,
        ]);
        if ($response->isOk()) {
            return true;
        }

        switch ($response->getCode()) {
            case 300:
                $reason = "Refund amount can not surpass the original payment amount.";
                break;
            default:
                $reason = "Refund failed. Reason: {$response->getResponse()}";
        }

        throw new \Exception($reason);
    }

    /**
     * @param string $type
     * @param array  $data
     *
     * @return PaymentResponse
     * @throws \Exception
     */
    private function curl (string $type, array $data): PaymentResponse {
        $data = array_merge($data, [
            'type'     => $type,
            'username' => $this->username,
            'password' => $this->password,
        ]);

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL            => self::ENDPOINT_URL,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => http_build_query($data),
            CURLOPT_RETURNTRANSFER => true,
        ]);

        $response = curl_exec($ch);
        if (!$response) {
            $msg = sprintf('Encountered cURL error during %s: "%s"', $type, curl_error($ch));
            $this->logger->critical($msg);

            throw new \Exception($msg, curl_errno($ch));
        }

        $parsed = [];
        parse_str($response, $parsed);

        $code   = (int)$parsed['response_code'] ?? -1;
        $text   = $parsed['responsetext'] ?? 'Unknown. responsetext missing';
        $entity = new PaymentResponse($type, $code, $text);
        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }
}
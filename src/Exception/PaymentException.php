<?php

namespace App\Exception;

use App\Entity\PaymentResponse;

class PaymentException extends \RuntimeException
{
    private $response;

    public function __construct(PaymentResponse $response, ?string $message = null)
    {
        if (null === $message) {
            $message = "Transaction failed. Reason: {$response->getResponseText()}";
        }
        parent::__construct($message, $response->getCode());

        $this->response = $response;
    }

    public function getResponse(): PaymentResponse
    {
        return $this->response;
    }
}

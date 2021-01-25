<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfPaymentPushResponseType.
 *
 * XSD Type: ArrayOfPaymentPushResponse
 */
class ArrayOfPaymentPushResponseType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PaymentPushResponseType[]
     */
    private $paymentPushResponse = [
    ];

    /**
     * Adds as paymentPushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PaymentPushResponseType $paymentPushResponse
     */
    public function addToPaymentPushResponse(PaymentPushResponseType $paymentPushResponse)
    {
        $this->paymentPushResponse[] = $paymentPushResponse;

        return $this;
    }

    /**
     * isset paymentPushResponse.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPaymentPushResponse($index)
    {
        return isset($this->paymentPushResponse[$index]);
    }

    /**
     * unset paymentPushResponse.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPaymentPushResponse($index)
    {
        unset($this->paymentPushResponse[$index]);
    }

    /**
     * Gets as paymentPushResponse.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PaymentPushResponseType[]
     */
    public function getPaymentPushResponse()
    {
        return $this->paymentPushResponse;
    }

    /**
     * Sets a new paymentPushResponse.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PaymentPushResponseType[] $paymentPushResponse
     *
     * @return self
     */
    public function setPaymentPushResponse(array $paymentPushResponse)
    {
        $this->paymentPushResponse = $paymentPushResponse;

        return $this;
    }
}

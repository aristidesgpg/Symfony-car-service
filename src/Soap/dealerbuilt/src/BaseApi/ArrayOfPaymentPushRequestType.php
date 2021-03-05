<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfPaymentPushRequestType
 *
 * 
 * XSD Type: ArrayOfPaymentPushRequest
 */
class ArrayOfPaymentPushRequestType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PaymentPushRequestType[] $paymentPushRequest
     */
    private $paymentPushRequest = [
        
    ];

    /**
     * Adds as paymentPushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\PaymentPushRequestType $paymentPushRequest
     */
    public function addToPaymentPushRequest(\App\Soap\dealerbuilt\src\BaseApi\PaymentPushRequestType $paymentPushRequest)
    {
        $this->paymentPushRequest[] = $paymentPushRequest;
        return $this;
    }

    /**
     * isset paymentPushRequest
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPaymentPushRequest($index)
    {
        return isset($this->paymentPushRequest[$index]);
    }

    /**
     * unset paymentPushRequest
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPaymentPushRequest($index)
    {
        unset($this->paymentPushRequest[$index]);
    }

    /**
     * Gets as paymentPushRequest
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PaymentPushRequestType[]
     */
    public function getPaymentPushRequest()
    {
        return $this->paymentPushRequest;
    }

    /**
     * Sets a new paymentPushRequest
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PaymentPushRequestType[] $paymentPushRequest
     * @return self
     */
    public function setPaymentPushRequest(array $paymentPushRequest)
    {
        $this->paymentPushRequest = $paymentPushRequest;
        return $this;
    }


}


<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetPaymentMethodResponse
 */
class GetPaymentMethodResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PaymentMethodType[] $getPaymentMethodResult
     */
    private $getPaymentMethodResult = null;

    /**
     * Adds as paymentMethod
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\PaymentMethodType $paymentMethod
     */
    public function addToGetPaymentMethodResult(\App\Soap\dealerbuilt\src\BaseApi\PaymentMethodType $paymentMethod)
    {
        $this->getPaymentMethodResult[] = $paymentMethod;
        return $this;
    }

    /**
     * isset getPaymentMethodResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetGetPaymentMethodResult($index)
    {
        return isset($this->getPaymentMethodResult[$index]);
    }

    /**
     * unset getPaymentMethodResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetGetPaymentMethodResult($index)
    {
        unset($this->getPaymentMethodResult[$index]);
    }

    /**
     * Gets as getPaymentMethodResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PaymentMethodType[]
     */
    public function getGetPaymentMethodResult()
    {
        return $this->getPaymentMethodResult;
    }

    /**
     * Sets a new getPaymentMethodResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PaymentMethodType[] $getPaymentMethodResult
     * @return self
     */
    public function setGetPaymentMethodResult(array $getPaymentMethodResult)
    {
        $this->getPaymentMethodResult = $getPaymentMethodResult;
        return $this;
    }


}


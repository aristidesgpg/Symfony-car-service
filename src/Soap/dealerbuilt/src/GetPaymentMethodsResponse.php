<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetPaymentMethodsResponse.
 */
class GetPaymentMethodsResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PaymentMethodType[]
     */
    private $getPaymentMethodsResult = null;

    /**
     * Adds as paymentMethod.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PaymentMethodType $paymentMethod
     */
    public function addToGetPaymentMethodsResult(BaseApi\PaymentMethodType $paymentMethod)
    {
        $this->getPaymentMethodsResult[] = $paymentMethod;

        return $this;
    }

    /**
     * isset getPaymentMethodsResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetGetPaymentMethodsResult($index)
    {
        return isset($this->getPaymentMethodsResult[$index]);
    }

    /**
     * unset getPaymentMethodsResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetGetPaymentMethodsResult($index)
    {
        unset($this->getPaymentMethodsResult[$index]);
    }

    /**
     * Gets as getPaymentMethodsResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PaymentMethodType[]
     */
    public function getGetPaymentMethodsResult()
    {
        return $this->getPaymentMethodsResult;
    }

    /**
     * Sets a new getPaymentMethodsResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PaymentMethodType[] $getPaymentMethodsResult
     *
     * @return self
     */
    public function setGetPaymentMethodsResult(array $getPaymentMethodsResult)
    {
        $this->getPaymentMethodsResult = $getPaymentMethodsResult;

        return $this;
    }
}

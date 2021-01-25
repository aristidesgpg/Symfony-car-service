<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfPaymentMethodType.
 *
 * XSD Type: ArrayOfPaymentMethod
 */
class ArrayOfPaymentMethodType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PaymentMethodType[]
     */
    private $paymentMethod = [
    ];

    /**
     * Adds as paymentMethod.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PaymentMethodType $paymentMethod
     */
    public function addToPaymentMethod(PaymentMethodType $paymentMethod)
    {
        $this->paymentMethod[] = $paymentMethod;

        return $this;
    }

    /**
     * isset paymentMethod.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPaymentMethod($index)
    {
        return isset($this->paymentMethod[$index]);
    }

    /**
     * unset paymentMethod.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPaymentMethod($index)
    {
        unset($this->paymentMethod[$index]);
    }

    /**
     * Gets as paymentMethod.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PaymentMethodType[]
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * Sets a new paymentMethod.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PaymentMethodType[] $paymentMethod
     *
     * @return self
     */
    public function setPaymentMethod(array $paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }
}

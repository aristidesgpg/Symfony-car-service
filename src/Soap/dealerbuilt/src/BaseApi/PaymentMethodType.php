<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PaymentMethodType
 *
 * 
 * XSD Type: PaymentMethod
 */
class PaymentMethodType extends ApiServiceLocationItemType
{

    /**
     * @var string $code
     */
    private $code = null;

    /**
     * @var string $description
     */
    private $description = null;

    /**
     * @var string $payType
     */
    private $payType = null;

    /**
     * @var string $paymentMethodKey
     */
    private $paymentMethodKey = null;

    /**
     * Gets as code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Sets a new code
     *
     * @param string $code
     * @return self
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Gets as description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets a new description
     *
     * @param string $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Gets as payType
     *
     * @return string
     */
    public function getPayType()
    {
        return $this->payType;
    }

    /**
     * Sets a new payType
     *
     * @param string $payType
     * @return self
     */
    public function setPayType($payType)
    {
        $this->payType = $payType;
        return $this;
    }

    /**
     * Gets as paymentMethodKey
     *
     * @return string
     */
    public function getPaymentMethodKey()
    {
        return $this->paymentMethodKey;
    }

    /**
     * Sets a new paymentMethodKey
     *
     * @param string $paymentMethodKey
     * @return self
     */
    public function setPaymentMethodKey($paymentMethodKey)
    {
        $this->paymentMethodKey = $paymentMethodKey;
        return $this;
    }


}


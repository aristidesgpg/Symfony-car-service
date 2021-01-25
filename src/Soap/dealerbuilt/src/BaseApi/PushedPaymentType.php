<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PushedPaymentType.
 *
 * XSD Type: PushedPayment
 */
class PushedPaymentType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $amount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PaymentAttributesType
     */
    private $attributes = null;

    /**
     * @var string
     */
    private $description = null;

    /**
     * @var string
     */
    private $externalPaymentId = null;

    /**
     * @var bool
     */
    private $isRefund = null;

    /**
     * @var string
     */
    private $paymentMethodKey = null;

    /**
     * @var string
     */
    private $username = null;

    /**
     * Gets as amount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Sets a new amount.
     *
     * @return self
     */
    public function setAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Gets as attributes.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PaymentAttributesType
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Sets a new attributes.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PaymentAttributesType $attributes
     *
     * @return self
     */
    public function setAttributes(PaymentAttributesType $attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Gets as description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets a new description.
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets as externalPaymentId.
     *
     * @return string
     */
    public function getExternalPaymentId()
    {
        return $this->externalPaymentId;
    }

    /**
     * Sets a new externalPaymentId.
     *
     * @param string $externalPaymentId
     *
     * @return self
     */
    public function setExternalPaymentId($externalPaymentId)
    {
        $this->externalPaymentId = $externalPaymentId;

        return $this;
    }

    /**
     * Gets as isRefund.
     *
     * @return bool
     */
    public function getIsRefund()
    {
        return $this->isRefund;
    }

    /**
     * Sets a new isRefund.
     *
     * @param bool $isRefund
     *
     * @return self
     */
    public function setIsRefund($isRefund)
    {
        $this->isRefund = $isRefund;

        return $this;
    }

    /**
     * Gets as paymentMethodKey.
     *
     * @return string
     */
    public function getPaymentMethodKey()
    {
        return $this->paymentMethodKey;
    }

    /**
     * Sets a new paymentMethodKey.
     *
     * @param string $paymentMethodKey
     *
     * @return self
     */
    public function setPaymentMethodKey($paymentMethodKey)
    {
        $this->paymentMethodKey = $paymentMethodKey;

        return $this;
    }

    /**
     * Gets as username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Sets a new username.
     *
     * @param string $username
     *
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }
}

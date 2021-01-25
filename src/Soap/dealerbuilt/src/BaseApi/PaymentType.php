<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PaymentType
 *
 * 
 * XSD Type: Payment
 */
class PaymentType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $amount
     */
    private $amount = null;

    /**
     * @var \DateTime $createdStamp
     */
    private $createdStamp = null;

    /**
     * @var string $description
     */
    private $description = null;

    /**
     * @var string $glAccount
     */
    private $glAccount = null;

    /**
     * @var bool $includedInBalance
     */
    private $includedInBalance = null;

    /**
     * @var string $payType
     */
    private $payType = null;

    /**
     * @var string $paymentKey
     */
    private $paymentKey = null;

    /**
     * @var string $paymentMethodCode
     */
    private $paymentMethodCode = null;

    /**
     * @var string $username
     */
    private $username = null;

    /**
     * Gets as amount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Sets a new amount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $amount
     * @return self
     */
    public function setAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Gets as createdStamp
     *
     * @return \DateTime
     */
    public function getCreatedStamp()
    {
        return $this->createdStamp;
    }

    /**
     * Sets a new createdStamp
     *
     * @param \DateTime $createdStamp
     * @return self
     */
    public function setCreatedStamp(\DateTime $createdStamp)
    {
        $this->createdStamp = $createdStamp;
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
     * Gets as glAccount
     *
     * @return string
     */
    public function getGlAccount()
    {
        return $this->glAccount;
    }

    /**
     * Sets a new glAccount
     *
     * @param string $glAccount
     * @return self
     */
    public function setGlAccount($glAccount)
    {
        $this->glAccount = $glAccount;
        return $this;
    }

    /**
     * Gets as includedInBalance
     *
     * @return bool
     */
    public function getIncludedInBalance()
    {
        return $this->includedInBalance;
    }

    /**
     * Sets a new includedInBalance
     *
     * @param bool $includedInBalance
     * @return self
     */
    public function setIncludedInBalance($includedInBalance)
    {
        $this->includedInBalance = $includedInBalance;
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
     * Gets as paymentKey
     *
     * @return string
     */
    public function getPaymentKey()
    {
        return $this->paymentKey;
    }

    /**
     * Sets a new paymentKey
     *
     * @param string $paymentKey
     * @return self
     */
    public function setPaymentKey($paymentKey)
    {
        $this->paymentKey = $paymentKey;
        return $this;
    }

    /**
     * Gets as paymentMethodCode
     *
     * @return string
     */
    public function getPaymentMethodCode()
    {
        return $this->paymentMethodCode;
    }

    /**
     * Sets a new paymentMethodCode
     *
     * @param string $paymentMethodCode
     * @return self
     */
    public function setPaymentMethodCode($paymentMethodCode)
    {
        $this->paymentMethodCode = $paymentMethodCode;
        return $this;
    }

    /**
     * Gets as username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Sets a new username
     *
     * @param string $username
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }


}


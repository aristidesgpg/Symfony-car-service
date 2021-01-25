<?php

namespace App\Soap\dealerbuilt\src\Models\Accounting;

/**
 * Class representing PaymentType.
 *
 * XSD Type: Payment
 */
class PaymentType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $amount = null;

    /**
     * @var \DateTime
     */
    private $createdStamp = null;

    /**
     * @var string
     */
    private $description = null;

    /**
     * @var string
     */
    private $glAccount = null;

    /**
     * @var bool
     */
    private $includedInBalance = null;

    /**
     * @var string
     */
    private $payType = null;

    /**
     * @var int
     */
    private $paymentId = null;

    /**
     * @var string
     */
    private $paymentMethodCode = null;

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
     * Gets as createdStamp.
     *
     * @return \DateTime
     */
    public function getCreatedStamp()
    {
        return $this->createdStamp;
    }

    /**
     * Sets a new createdStamp.
     *
     * @return self
     */
    public function setCreatedStamp(\DateTime $createdStamp)
    {
        $this->createdStamp = $createdStamp;

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
     * Gets as glAccount.
     *
     * @return string
     */
    public function getGlAccount()
    {
        return $this->glAccount;
    }

    /**
     * Sets a new glAccount.
     *
     * @param string $glAccount
     *
     * @return self
     */
    public function setGlAccount($glAccount)
    {
        $this->glAccount = $glAccount;

        return $this;
    }

    /**
     * Gets as includedInBalance.
     *
     * @return bool
     */
    public function getIncludedInBalance()
    {
        return $this->includedInBalance;
    }

    /**
     * Sets a new includedInBalance.
     *
     * @param bool $includedInBalance
     *
     * @return self
     */
    public function setIncludedInBalance($includedInBalance)
    {
        $this->includedInBalance = $includedInBalance;

        return $this;
    }

    /**
     * Gets as payType.
     *
     * @return string
     */
    public function getPayType()
    {
        return $this->payType;
    }

    /**
     * Sets a new payType.
     *
     * @param string $payType
     *
     * @return self
     */
    public function setPayType($payType)
    {
        $this->payType = $payType;

        return $this;
    }

    /**
     * Gets as paymentId.
     *
     * @return int
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * Sets a new paymentId.
     *
     * @param int $paymentId
     *
     * @return self
     */
    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;

        return $this;
    }

    /**
     * Gets as paymentMethodCode.
     *
     * @return string
     */
    public function getPaymentMethodCode()
    {
        return $this->paymentMethodCode;
    }

    /**
     * Sets a new paymentMethodCode.
     *
     * @param string $paymentMethodCode
     *
     * @return self
     */
    public function setPaymentMethodCode($paymentMethodCode)
    {
        $this->paymentMethodCode = $paymentMethodCode;

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

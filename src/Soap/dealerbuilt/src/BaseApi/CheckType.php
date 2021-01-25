<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing CheckType.
 *
 * XSD Type: Check
 */
class CheckType extends ApiCompanyItemType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $amount = null;

    /**
     * @var \DateTime
     */
    private $checkDate = null;

    /**
     * @var string
     */
    private $checkNumber = null;

    /**
     * @var string
     */
    private $customerId = null;

    /**
     * @var string
     */
    private $customerKey = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\NameType
     */
    private $customerName = null;

    /**
     * @var string
     */
    private $payee = null;

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
     * Gets as checkDate.
     *
     * @return \DateTime
     */
    public function getCheckDate()
    {
        return $this->checkDate;
    }

    /**
     * Sets a new checkDate.
     *
     * @return self
     */
    public function setCheckDate(\DateTime $checkDate)
    {
        $this->checkDate = $checkDate;

        return $this;
    }

    /**
     * Gets as checkNumber.
     *
     * @return string
     */
    public function getCheckNumber()
    {
        return $this->checkNumber;
    }

    /**
     * Sets a new checkNumber.
     *
     * @param string $checkNumber
     *
     * @return self
     */
    public function setCheckNumber($checkNumber)
    {
        $this->checkNumber = $checkNumber;

        return $this;
    }

    /**
     * Gets as customerId.
     *
     * @return string
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Sets a new customerId.
     *
     * @param string $customerId
     *
     * @return self
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * Gets as customerKey.
     *
     * @return string
     */
    public function getCustomerKey()
    {
        return $this->customerKey;
    }

    /**
     * Sets a new customerKey.
     *
     * @param string $customerKey
     *
     * @return self
     */
    public function setCustomerKey($customerKey)
    {
        $this->customerKey = $customerKey;

        return $this;
    }

    /**
     * Gets as customerName.
     *
     * @return \App\Soap\dealerbuilt\src\Models\NameType
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * Sets a new customerName.
     *
     * @return self
     */
    public function setCustomerName(\App\Soap\dealerbuilt\src\Models\NameType $customerName)
    {
        $this->customerName = $customerName;

        return $this;
    }

    /**
     * Gets as payee.
     *
     * @return string
     */
    public function getPayee()
    {
        return $this->payee;
    }

    /**
     * Sets a new payee.
     *
     * @param string $payee
     *
     * @return self
     */
    public function setPayee($payee)
    {
        $this->payee = $payee;

        return $this;
    }
}

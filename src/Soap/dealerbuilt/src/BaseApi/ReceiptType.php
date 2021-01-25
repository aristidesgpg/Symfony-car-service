<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ReceiptType
 *
 * 
 * XSD Type: Receipt
 */
class ReceiptType extends ApiCompanyItemType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $amount
     */
    private $amount = null;

    /**
     * @var string $comments
     */
    private $comments = null;

    /**
     * @var string $customerId
     */
    private $customerId = null;

    /**
     * @var string $customerKey
     */
    private $customerKey = null;

    /**
     * @var \DateTime $receiptDate
     */
    private $receiptDate = null;

    /**
     * @var string $receiptNumber
     */
    private $receiptNumber = null;

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
     * Gets as comments
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Sets a new comments
     *
     * @param string $comments
     * @return self
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * Gets as customerId
     *
     * @return string
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Sets a new customerId
     *
     * @param string $customerId
     * @return self
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
        return $this;
    }

    /**
     * Gets as customerKey
     *
     * @return string
     */
    public function getCustomerKey()
    {
        return $this->customerKey;
    }

    /**
     * Sets a new customerKey
     *
     * @param string $customerKey
     * @return self
     */
    public function setCustomerKey($customerKey)
    {
        $this->customerKey = $customerKey;
        return $this;
    }

    /**
     * Gets as receiptDate
     *
     * @return \DateTime
     */
    public function getReceiptDate()
    {
        return $this->receiptDate;
    }

    /**
     * Sets a new receiptDate
     *
     * @param \DateTime $receiptDate
     * @return self
     */
    public function setReceiptDate(\DateTime $receiptDate)
    {
        $this->receiptDate = $receiptDate;
        return $this;
    }

    /**
     * Gets as receiptNumber
     *
     * @return string
     */
    public function getReceiptNumber()
    {
        return $this->receiptNumber;
    }

    /**
     * Sets a new receiptNumber
     *
     * @param string $receiptNumber
     * @return self
     */
    public function setReceiptNumber($receiptNumber)
    {
        $this->receiptNumber = $receiptNumber;
        return $this;
    }


}


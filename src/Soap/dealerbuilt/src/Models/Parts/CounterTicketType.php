<?php

namespace App\Soap\dealerbuilt\src\Models\Parts;

/**
 * Class representing CounterTicketType
 *
 * 
 * XSD Type: CounterTicket
 */
class CounterTicketType
{

    /**
     * @var string $correlationId
     */
    private $correlationId = null;

    /**
     * @var string $counterTicketNumber
     */
    private $counterTicketNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Parts\CounterTicketCustomerType $customer
     */
    private $customer = null;

    /**
     * @var string $customerId
     */
    private $customerId = null;

    /**
     * @var bool $isEstimate
     */
    private $isEstimate = null;

    /**
     * @var string $notes
     */
    private $notes = null;

    /**
     * @var string $pONumber
     */
    private $pONumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Parts\PartType[] $parts
     */
    private $parts = null;

    /**
     * @var string $paymentMethod
     */
    private $paymentMethod = null;

    /**
     * @var string $salesPerson1
     */
    private $salesPerson1 = null;

    /**
     * @var string $salesPerson2
     */
    private $salesPerson2 = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Parts\AddressType $shippingAddress
     */
    private $shippingAddress = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $shippingCost
     */
    private $shippingCost = null;

    /**
     * @var string $shippingMethod
     */
    private $shippingMethod = null;

    /**
     * Gets as correlationId
     *
     * @return string
     */
    public function getCorrelationId()
    {
        return $this->correlationId;
    }

    /**
     * Sets a new correlationId
     *
     * @param string $correlationId
     * @return self
     */
    public function setCorrelationId($correlationId)
    {
        $this->correlationId = $correlationId;
        return $this;
    }

    /**
     * Gets as counterTicketNumber
     *
     * @return string
     */
    public function getCounterTicketNumber()
    {
        return $this->counterTicketNumber;
    }

    /**
     * Sets a new counterTicketNumber
     *
     * @param string $counterTicketNumber
     * @return self
     */
    public function setCounterTicketNumber($counterTicketNumber)
    {
        $this->counterTicketNumber = $counterTicketNumber;
        return $this;
    }

    /**
     * Gets as customer
     *
     * @return \App\Soap\dealerbuilt\src\Models\Parts\CounterTicketCustomerType
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Sets a new customer
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\CounterTicketCustomerType $customer
     * @return self
     */
    public function setCustomer(\App\Soap\dealerbuilt\src\Models\Parts\CounterTicketCustomerType $customer)
    {
        $this->customer = $customer;
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
     * Gets as isEstimate
     *
     * @return bool
     */
    public function getIsEstimate()
    {
        return $this->isEstimate;
    }

    /**
     * Sets a new isEstimate
     *
     * @param bool $isEstimate
     * @return self
     */
    public function setIsEstimate($isEstimate)
    {
        $this->isEstimate = $isEstimate;
        return $this;
    }

    /**
     * Gets as notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Sets a new notes
     *
     * @param string $notes
     * @return self
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * Gets as pONumber
     *
     * @return string
     */
    public function getPONumber()
    {
        return $this->pONumber;
    }

    /**
     * Sets a new pONumber
     *
     * @param string $pONumber
     * @return self
     */
    public function setPONumber($pONumber)
    {
        $this->pONumber = $pONumber;
        return $this;
    }

    /**
     * Adds as part
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Parts\PartType $part
     */
    public function addToParts(\App\Soap\dealerbuilt\src\Models\Parts\PartType $part)
    {
        $this->parts[] = $part;
        return $this;
    }

    /**
     * isset parts
     *
     * @param int|string $index
     * @return bool
     */
    public function issetParts($index)
    {
        return isset($this->parts[$index]);
    }

    /**
     * unset parts
     *
     * @param int|string $index
     * @return void
     */
    public function unsetParts($index)
    {
        unset($this->parts[$index]);
    }

    /**
     * Gets as parts
     *
     * @return \App\Soap\dealerbuilt\src\Models\Parts\PartType[]
     */
    public function getParts()
    {
        return $this->parts;
    }

    /**
     * Sets a new parts
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\PartType[] $parts
     * @return self
     */
    public function setParts(array $parts)
    {
        $this->parts = $parts;
        return $this;
    }

    /**
     * Gets as paymentMethod
     *
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * Sets a new paymentMethod
     *
     * @param string $paymentMethod
     * @return self
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }

    /**
     * Gets as salesPerson1
     *
     * @return string
     */
    public function getSalesPerson1()
    {
        return $this->salesPerson1;
    }

    /**
     * Sets a new salesPerson1
     *
     * @param string $salesPerson1
     * @return self
     */
    public function setSalesPerson1($salesPerson1)
    {
        $this->salesPerson1 = $salesPerson1;
        return $this;
    }

    /**
     * Gets as salesPerson2
     *
     * @return string
     */
    public function getSalesPerson2()
    {
        return $this->salesPerson2;
    }

    /**
     * Sets a new salesPerson2
     *
     * @param string $salesPerson2
     * @return self
     */
    public function setSalesPerson2($salesPerson2)
    {
        $this->salesPerson2 = $salesPerson2;
        return $this;
    }

    /**
     * Gets as shippingAddress
     *
     * @return \App\Soap\dealerbuilt\src\Models\Parts\AddressType
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * Sets a new shippingAddress
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\AddressType $shippingAddress
     * @return self
     */
    public function setShippingAddress(\App\Soap\dealerbuilt\src\Models\Parts\AddressType $shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
        return $this;
    }

    /**
     * Gets as shippingCost
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getShippingCost()
    {
        return $this->shippingCost;
    }

    /**
     * Sets a new shippingCost
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $shippingCost
     * @return self
     */
    public function setShippingCost(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $shippingCost)
    {
        $this->shippingCost = $shippingCost;
        return $this;
    }

    /**
     * Gets as shippingMethod
     *
     * @return string
     */
    public function getShippingMethod()
    {
        return $this->shippingMethod;
    }

    /**
     * Sets a new shippingMethod
     *
     * @param string $shippingMethod
     * @return self
     */
    public function setShippingMethod($shippingMethod)
    {
        $this->shippingMethod = $shippingMethod;
        return $this;
    }


}


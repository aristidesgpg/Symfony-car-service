<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing PotentialPartType
 *
 * 
 * XSD Type: PotentialPart
 */
class PotentialPartType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $cost
     */
    private $cost = null;

    /**
     * @var string $description
     */
    private $description = null;

    /**
     * @var bool $isApproved
     */
    private $isApproved = null;

    /**
     * @var bool $isFailed
     */
    private $isFailed = null;

    /**
     * @var int $laborOperationNumber
     */
    private $laborOperationNumber = null;

    /**
     * @var string $orderNumber
     */
    private $orderNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Parts\InventoryPartType $part
     */
    private $part = null;

    /**
     * @var string $partIndex
     */
    private $partIndex = null;

    /**
     * @var string $partNumber
     */
    private $partNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $price
     */
    private $price = null;

    /**
     * @var float $quantity
     */
    private $quantity = null;

    /**
     * @var string[] $serialNumbers
     */
    private $serialNumbers = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $taxAmount
     */
    private $taxAmount = null;

    /**
     * Gets as cost
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Sets a new cost
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $cost
     * @return self
     */
    public function setCost(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $cost)
    {
        $this->cost = $cost;
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
     * Gets as isApproved
     *
     * @return bool
     */
    public function getIsApproved()
    {
        return $this->isApproved;
    }

    /**
     * Sets a new isApproved
     *
     * @param bool $isApproved
     * @return self
     */
    public function setIsApproved($isApproved)
    {
        $this->isApproved = $isApproved;
        return $this;
    }

    /**
     * Gets as isFailed
     *
     * @return bool
     */
    public function getIsFailed()
    {
        return $this->isFailed;
    }

    /**
     * Sets a new isFailed
     *
     * @param bool $isFailed
     * @return self
     */
    public function setIsFailed($isFailed)
    {
        $this->isFailed = $isFailed;
        return $this;
    }

    /**
     * Gets as laborOperationNumber
     *
     * @return int
     */
    public function getLaborOperationNumber()
    {
        return $this->laborOperationNumber;
    }

    /**
     * Sets a new laborOperationNumber
     *
     * @param int $laborOperationNumber
     * @return self
     */
    public function setLaborOperationNumber($laborOperationNumber)
    {
        $this->laborOperationNumber = $laborOperationNumber;
        return $this;
    }

    /**
     * Gets as orderNumber
     *
     * @return string
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * Sets a new orderNumber
     *
     * @param string $orderNumber
     * @return self
     */
    public function setOrderNumber($orderNumber)
    {
        $this->orderNumber = $orderNumber;
        return $this;
    }

    /**
     * Gets as part
     *
     * @return \App\Soap\dealerbuilt\src\Models\Parts\InventoryPartType
     */
    public function getPart()
    {
        return $this->part;
    }

    /**
     * Sets a new part
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\InventoryPartType $part
     * @return self
     */
    public function setPart(\App\Soap\dealerbuilt\src\Models\Parts\InventoryPartType $part)
    {
        $this->part = $part;
        return $this;
    }

    /**
     * Gets as partIndex
     *
     * @return string
     */
    public function getPartIndex()
    {
        return $this->partIndex;
    }

    /**
     * Sets a new partIndex
     *
     * @param string $partIndex
     * @return self
     */
    public function setPartIndex($partIndex)
    {
        $this->partIndex = $partIndex;
        return $this;
    }

    /**
     * Gets as partNumber
     *
     * @return string
     */
    public function getPartNumber()
    {
        return $this->partNumber;
    }

    /**
     * Sets a new partNumber
     *
     * @param string $partNumber
     * @return self
     */
    public function setPartNumber($partNumber)
    {
        $this->partNumber = $partNumber;
        return $this;
    }

    /**
     * Gets as price
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets a new price
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $price
     * @return self
     */
    public function setPrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Gets as quantity
     *
     * @return float
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Sets a new quantity
     *
     * @param float $quantity
     * @return self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Adds as string
     *
     * @return self
     * @param string $string
     */
    public function addToSerialNumbers($string)
    {
        $this->serialNumbers[] = $string;
        return $this;
    }

    /**
     * isset serialNumbers
     *
     * @param int|string $index
     * @return bool
     */
    public function issetSerialNumbers($index)
    {
        return isset($this->serialNumbers[$index]);
    }

    /**
     * unset serialNumbers
     *
     * @param int|string $index
     * @return void
     */
    public function unsetSerialNumbers($index)
    {
        unset($this->serialNumbers[$index]);
    }

    /**
     * Gets as serialNumbers
     *
     * @return string[]
     */
    public function getSerialNumbers()
    {
        return $this->serialNumbers;
    }

    /**
     * Sets a new serialNumbers
     *
     * @param string[] $serialNumbers
     * @return self
     */
    public function setSerialNumbers(array $serialNumbers)
    {
        $this->serialNumbers = $serialNumbers;
        return $this;
    }

    /**
     * Gets as taxAmount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTaxAmount()
    {
        return $this->taxAmount;
    }

    /**
     * Sets a new taxAmount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $taxAmount
     * @return self
     */
    public function setTaxAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $taxAmount)
    {
        $this->taxAmount = $taxAmount;
        return $this;
    }


}


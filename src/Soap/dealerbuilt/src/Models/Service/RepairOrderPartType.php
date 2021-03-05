<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing RepairOrderPartType
 *
 * 
 * XSD Type: RepairOrderPart
 */
class RepairOrderPartType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Parts\InventoryPartAttributesType $attributes
     */
    private $attributes = null;

    /**
     * @var int $backOrderQty
     */
    private $backOrderQty = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $cost
     */
    private $cost = null;

    /**
     * @var string $description
     */
    private $description = null;

    /**
     * @var bool $isFailed
     */
    private $isFailed = null;

    /**
     * @var int $laborItemLineNumber
     */
    private $laborItemLineNumber = null;

    /**
     * @var string $orderNumber
     */
    private $orderNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $partFreight
     */
    private $partFreight = null;

    /**
     * @var string $partIndex
     */
    private $partIndex = null;

    /**
     * @var string $partKey
     */
    private $partKey = null;

    /**
     * @var string $partNumber
     */
    private $partNumber = null;

    /**
     * @var \DateTime $partSoldDate
     */
    private $partSoldDate = null;

    /**
     * @var string $partSourceCode
     */
    private $partSourceCode = null;

    /**
     * @var float $partsTax
     */
    private $partsTax = null;

    /**
     * @var string $partsWriter
     */
    private $partsWriter = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $price
     */
    private $price = null;

    /**
     * @var string $priceCategoryCode
     */
    private $priceCategoryCode = null;

    /**
     * @var float $quantity
     */
    private $quantity = null;

    /**
     * @var string $saleType
     */
    private $saleType = null;

    /**
     * @var string[] $serialNumbers
     */
    private $serialNumbers = null;

    /**
     * @var string $sourceDescription
     */
    private $sourceDescription = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $taxAmount
     */
    private $taxAmount = null;

    /**
     * Gets as attributes
     *
     * @return \App\Soap\dealerbuilt\src\Models\Parts\InventoryPartAttributesType
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Sets a new attributes
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\InventoryPartAttributesType $attributes
     * @return self
     */
    public function setAttributes(\App\Soap\dealerbuilt\src\Models\Parts\InventoryPartAttributesType $attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * Gets as backOrderQty
     *
     * @return int
     */
    public function getBackOrderQty()
    {
        return $this->backOrderQty;
    }

    /**
     * Sets a new backOrderQty
     *
     * @param int $backOrderQty
     * @return self
     */
    public function setBackOrderQty($backOrderQty)
    {
        $this->backOrderQty = $backOrderQty;
        return $this;
    }

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
     * Gets as laborItemLineNumber
     *
     * @return int
     */
    public function getLaborItemLineNumber()
    {
        return $this->laborItemLineNumber;
    }

    /**
     * Sets a new laborItemLineNumber
     *
     * @param int $laborItemLineNumber
     * @return self
     */
    public function setLaborItemLineNumber($laborItemLineNumber)
    {
        $this->laborItemLineNumber = $laborItemLineNumber;
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
     * Gets as partFreight
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getPartFreight()
    {
        return $this->partFreight;
    }

    /**
     * Sets a new partFreight
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $partFreight
     * @return self
     */
    public function setPartFreight(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $partFreight)
    {
        $this->partFreight = $partFreight;
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
     * Gets as partKey
     *
     * @return string
     */
    public function getPartKey()
    {
        return $this->partKey;
    }

    /**
     * Sets a new partKey
     *
     * @param string $partKey
     * @return self
     */
    public function setPartKey($partKey)
    {
        $this->partKey = $partKey;
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
     * Gets as partSoldDate
     *
     * @return \DateTime
     */
    public function getPartSoldDate()
    {
        return $this->partSoldDate;
    }

    /**
     * Sets a new partSoldDate
     *
     * @param \DateTime $partSoldDate
     * @return self
     */
    public function setPartSoldDate(\DateTime $partSoldDate)
    {
        $this->partSoldDate = $partSoldDate;
        return $this;
    }

    /**
     * Gets as partSourceCode
     *
     * @return string
     */
    public function getPartSourceCode()
    {
        return $this->partSourceCode;
    }

    /**
     * Sets a new partSourceCode
     *
     * @param string $partSourceCode
     * @return self
     */
    public function setPartSourceCode($partSourceCode)
    {
        $this->partSourceCode = $partSourceCode;
        return $this;
    }

    /**
     * Gets as partsTax
     *
     * @return float
     */
    public function getPartsTax()
    {
        return $this->partsTax;
    }

    /**
     * Sets a new partsTax
     *
     * @param float $partsTax
     * @return self
     */
    public function setPartsTax($partsTax)
    {
        $this->partsTax = $partsTax;
        return $this;
    }

    /**
     * Gets as partsWriter
     *
     * @return string
     */
    public function getPartsWriter()
    {
        return $this->partsWriter;
    }

    /**
     * Sets a new partsWriter
     *
     * @param string $partsWriter
     * @return self
     */
    public function setPartsWriter($partsWriter)
    {
        $this->partsWriter = $partsWriter;
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
     * Gets as priceCategoryCode
     *
     * @return string
     */
    public function getPriceCategoryCode()
    {
        return $this->priceCategoryCode;
    }

    /**
     * Sets a new priceCategoryCode
     *
     * @param string $priceCategoryCode
     * @return self
     */
    public function setPriceCategoryCode($priceCategoryCode)
    {
        $this->priceCategoryCode = $priceCategoryCode;
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
     * Gets as saleType
     *
     * @return string
     */
    public function getSaleType()
    {
        return $this->saleType;
    }

    /**
     * Sets a new saleType
     *
     * @param string $saleType
     * @return self
     */
    public function setSaleType($saleType)
    {
        $this->saleType = $saleType;
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
     * Gets as sourceDescription
     *
     * @return string
     */
    public function getSourceDescription()
    {
        return $this->sourceDescription;
    }

    /**
     * Sets a new sourceDescription
     *
     * @param string $sourceDescription
     * @return self
     */
    public function setSourceDescription($sourceDescription)
    {
        $this->sourceDescription = $sourceDescription;
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


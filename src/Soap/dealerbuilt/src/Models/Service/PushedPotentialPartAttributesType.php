<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing PushedPotentialPartAttributesType.
 *
 * XSD Type: PushedPotentialPartAttributes
 */
class PushedPotentialPartAttributesType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $cost = null;

    /**
     * @var string
     */
    private $description = null;

    /**
     * @var string
     */
    private $externalPartId = null;

    /**
     * @var bool
     */
    private $isApproved = null;

    /**
     * @var bool
     */
    private $isFailed = null;

    /**
     * @var int
     */
    private $laborOperationNumber = null;

    /**
     * @var string
     */
    private $modifiedBy = null;

    /**
     * @var string
     */
    private $partNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $price = null;

    /**
     * @var string
     */
    private $priceCategory = null;

    /**
     * @var float
     */
    private $quantity = null;

    /**
     * @var string[]
     */
    private $serialNumbers = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $taxAmount = null;

    /**
     * @var string
     */
    private $vendor = null;

    /**
     * Gets as cost.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Sets a new cost.
     *
     * @return self
     */
    public function setCost(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $cost)
    {
        $this->cost = $cost;

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
     * Gets as externalPartId.
     *
     * @return string
     */
    public function getExternalPartId()
    {
        return $this->externalPartId;
    }

    /**
     * Sets a new externalPartId.
     *
     * @param string $externalPartId
     *
     * @return self
     */
    public function setExternalPartId($externalPartId)
    {
        $this->externalPartId = $externalPartId;

        return $this;
    }

    /**
     * Gets as isApproved.
     *
     * @return bool
     */
    public function getIsApproved()
    {
        return $this->isApproved;
    }

    /**
     * Sets a new isApproved.
     *
     * @param bool $isApproved
     *
     * @return self
     */
    public function setIsApproved($isApproved)
    {
        $this->isApproved = $isApproved;

        return $this;
    }

    /**
     * Gets as isFailed.
     *
     * @return bool
     */
    public function getIsFailed()
    {
        return $this->isFailed;
    }

    /**
     * Sets a new isFailed.
     *
     * @param bool $isFailed
     *
     * @return self
     */
    public function setIsFailed($isFailed)
    {
        $this->isFailed = $isFailed;

        return $this;
    }

    /**
     * Gets as laborOperationNumber.
     *
     * @return int
     */
    public function getLaborOperationNumber()
    {
        return $this->laborOperationNumber;
    }

    /**
     * Sets a new laborOperationNumber.
     *
     * @param int $laborOperationNumber
     *
     * @return self
     */
    public function setLaborOperationNumber($laborOperationNumber)
    {
        $this->laborOperationNumber = $laborOperationNumber;

        return $this;
    }

    /**
     * Gets as modifiedBy.
     *
     * @return string
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    /**
     * Sets a new modifiedBy.
     *
     * @param string $modifiedBy
     *
     * @return self
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;

        return $this;
    }

    /**
     * Gets as partNumber.
     *
     * @return string
     */
    public function getPartNumber()
    {
        return $this->partNumber;
    }

    /**
     * Sets a new partNumber.
     *
     * @param string $partNumber
     *
     * @return self
     */
    public function setPartNumber($partNumber)
    {
        $this->partNumber = $partNumber;

        return $this;
    }

    /**
     * Gets as price.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets a new price.
     *
     * @return self
     */
    public function setPrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Gets as priceCategory.
     *
     * @return string
     */
    public function getPriceCategory()
    {
        return $this->priceCategory;
    }

    /**
     * Sets a new priceCategory.
     *
     * @param string $priceCategory
     *
     * @return self
     */
    public function setPriceCategory($priceCategory)
    {
        $this->priceCategory = $priceCategory;

        return $this;
    }

    /**
     * Gets as quantity.
     *
     * @return float
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Sets a new quantity.
     *
     * @param float $quantity
     *
     * @return self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Adds as string.
     *
     * @return self
     *
     * @param string $string
     */
    public function addToSerialNumbers($string)
    {
        $this->serialNumbers[] = $string;

        return $this;
    }

    /**
     * isset serialNumbers.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetSerialNumbers($index)
    {
        return isset($this->serialNumbers[$index]);
    }

    /**
     * unset serialNumbers.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetSerialNumbers($index)
    {
        unset($this->serialNumbers[$index]);
    }

    /**
     * Gets as serialNumbers.
     *
     * @return string[]
     */
    public function getSerialNumbers()
    {
        return $this->serialNumbers;
    }

    /**
     * Sets a new serialNumbers.
     *
     * @param string[] $serialNumbers
     *
     * @return self
     */
    public function setSerialNumbers(array $serialNumbers)
    {
        $this->serialNumbers = $serialNumbers;

        return $this;
    }

    /**
     * Gets as taxAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTaxAmount()
    {
        return $this->taxAmount;
    }

    /**
     * Sets a new taxAmount.
     *
     * @return self
     */
    public function setTaxAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $taxAmount)
    {
        $this->taxAmount = $taxAmount;

        return $this;
    }

    /**
     * Gets as vendor.
     *
     * @return string
     */
    public function getVendor()
    {
        return $this->vendor;
    }

    /**
     * Sets a new vendor.
     *
     * @param string $vendor
     *
     * @return self
     */
    public function setVendor($vendor)
    {
        $this->vendor = $vendor;

        return $this;
    }
}

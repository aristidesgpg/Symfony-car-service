<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing PushedRepairOrderPartAttributesType.
 *
 * XSD Type: PushedRepairOrderPartAttributes
 */
class PushedRepairOrderPartAttributesType
{
    /**
     * @var string
     */
    private $description = null;

    /**
     * @var string
     */
    private $externalRepairOrderPartId = null;

    /**
     * @var bool
     */
    private $isFailed = null;

    /**
     * @var int
     */
    private $lop = null;

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
     * Gets as externalRepairOrderPartId.
     *
     * @return string
     */
    public function getExternalRepairOrderPartId()
    {
        return $this->externalRepairOrderPartId;
    }

    /**
     * Sets a new externalRepairOrderPartId.
     *
     * @param string $externalRepairOrderPartId
     *
     * @return self
     */
    public function setExternalRepairOrderPartId($externalRepairOrderPartId)
    {
        $this->externalRepairOrderPartId = $externalRepairOrderPartId;

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
     * Gets as lop.
     *
     * @return int
     */
    public function getLop()
    {
        return $this->lop;
    }

    /**
     * Sets a new lop.
     *
     * @param int $lop
     *
     * @return self
     */
    public function setLop($lop)
    {
        $this->lop = $lop;

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

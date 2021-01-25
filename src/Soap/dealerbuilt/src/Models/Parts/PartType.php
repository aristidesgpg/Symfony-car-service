<?php

namespace App\Soap\dealerbuilt\src\Models\Parts;

/**
 * Class representing PartType
 *
 * 
 * XSD Type: Part
 */
class PartType
{

    /**
     * @var string $comment
     */
    private $comment = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $core
     */
    private $core = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $cost
     */
    private $cost = null;

    /**
     * @var float $demand
     */
    private $demand = null;

    /**
     * @var string $description
     */
    private $description = null;

    /**
     * @var string $externalPartsInvoicePartId
     */
    private $externalPartsInvoicePartId = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $list
     */
    private $list = null;

    /**
     * @var string $modifiedBy
     */
    private $modifiedBy = null;

    /**
     * @var string $partsInvoicePartNumber
     */
    private $partsInvoicePartNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $price
     */
    private $price = null;

    /**
     * @var float $quantityOrdered
     */
    private $quantityOrdered = null;

    /**
     * @var float $quantityShipped
     */
    private $quantityShipped = null;

    /**
     * @var bool $remove
     */
    private $remove = null;

    /**
     * @var string $vendor
     */
    private $vendor = null;

    /**
     * Gets as comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Sets a new comment
     *
     * @param string $comment
     * @return self
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * Gets as core
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCore()
    {
        return $this->core;
    }

    /**
     * Sets a new core
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $core
     * @return self
     */
    public function setCore(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $core)
    {
        $this->core = $core;
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
     * Gets as demand
     *
     * @return float
     */
    public function getDemand()
    {
        return $this->demand;
    }

    /**
     * Sets a new demand
     *
     * @param float $demand
     * @return self
     */
    public function setDemand($demand)
    {
        $this->demand = $demand;
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
     * Gets as externalPartsInvoicePartId
     *
     * @return string
     */
    public function getExternalPartsInvoicePartId()
    {
        return $this->externalPartsInvoicePartId;
    }

    /**
     * Sets a new externalPartsInvoicePartId
     *
     * @param string $externalPartsInvoicePartId
     * @return self
     */
    public function setExternalPartsInvoicePartId($externalPartsInvoicePartId)
    {
        $this->externalPartsInvoicePartId = $externalPartsInvoicePartId;
        return $this;
    }

    /**
     * Gets as list
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * Sets a new list
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $list
     * @return self
     */
    public function setList(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $list)
    {
        $this->list = $list;
        return $this;
    }

    /**
     * Gets as modifiedBy
     *
     * @return string
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    /**
     * Sets a new modifiedBy
     *
     * @param string $modifiedBy
     * @return self
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }

    /**
     * Gets as partsInvoicePartNumber
     *
     * @return string
     */
    public function getPartsInvoicePartNumber()
    {
        return $this->partsInvoicePartNumber;
    }

    /**
     * Sets a new partsInvoicePartNumber
     *
     * @param string $partsInvoicePartNumber
     * @return self
     */
    public function setPartsInvoicePartNumber($partsInvoicePartNumber)
    {
        $this->partsInvoicePartNumber = $partsInvoicePartNumber;
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
     * Gets as quantityOrdered
     *
     * @return float
     */
    public function getQuantityOrdered()
    {
        return $this->quantityOrdered;
    }

    /**
     * Sets a new quantityOrdered
     *
     * @param float $quantityOrdered
     * @return self
     */
    public function setQuantityOrdered($quantityOrdered)
    {
        $this->quantityOrdered = $quantityOrdered;
        return $this;
    }

    /**
     * Gets as quantityShipped
     *
     * @return float
     */
    public function getQuantityShipped()
    {
        return $this->quantityShipped;
    }

    /**
     * Sets a new quantityShipped
     *
     * @param float $quantityShipped
     * @return self
     */
    public function setQuantityShipped($quantityShipped)
    {
        $this->quantityShipped = $quantityShipped;
        return $this;
    }

    /**
     * Gets as remove
     *
     * @return bool
     */
    public function getRemove()
    {
        return $this->remove;
    }

    /**
     * Sets a new remove
     *
     * @param bool $remove
     * @return self
     */
    public function setRemove($remove)
    {
        $this->remove = $remove;
        return $this;
    }

    /**
     * Gets as vendor
     *
     * @return string
     */
    public function getVendor()
    {
        return $this->vendor;
    }

    /**
     * Sets a new vendor
     *
     * @param string $vendor
     * @return self
     */
    public function setVendor($vendor)
    {
        $this->vendor = $vendor;
        return $this;
    }


}


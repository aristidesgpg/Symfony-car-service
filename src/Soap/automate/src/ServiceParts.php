<?php

namespace App\Soap\automate\src;

/**
 * Class representing ServiceParts
 */
class ServiceParts
{

    /**
     * @var string $itemID
     */
    private $itemID = null;

    /**
     * @var string $itemIdDescription
     */
    private $itemIdDescription = null;

    /**
     * @var float $itemQuantity
     */
    private $itemQuantity = null;

    /**
     * @var string $partTypeCode
     */
    private $partTypeCode = null;

    /**
     * @var \App\Soap\automate\src\Pricing[] $pricing
     */
    private $pricing = [
        
    ];

    /**
     * Gets as itemID
     *
     * @return string
     */
    public function getItemID()
    {
        return $this->itemID;
    }

    /**
     * Sets a new itemID
     *
     * @param string $itemID
     * @return self
     */
    public function setItemID($itemID)
    {
        $this->itemID = $itemID;
        return $this;
    }

    /**
     * Gets as itemIdDescription
     *
     * @return string
     */
    public function getItemIdDescription()
    {
        return $this->itemIdDescription;
    }

    /**
     * Sets a new itemIdDescription
     *
     * @param string $itemIdDescription
     * @return self
     */
    public function setItemIdDescription($itemIdDescription)
    {
        $this->itemIdDescription = $itemIdDescription;
        return $this;
    }

    /**
     * Gets as itemQuantity
     *
     * @return float
     */
    public function getItemQuantity()
    {
        return $this->itemQuantity;
    }

    /**
     * Sets a new itemQuantity
     *
     * @param float $itemQuantity
     * @return self
     */
    public function setItemQuantity($itemQuantity)
    {
        $this->itemQuantity = $itemQuantity;
        return $this;
    }

    /**
     * Gets as partTypeCode
     *
     * @return string
     */
    public function getPartTypeCode()
    {
        return $this->partTypeCode;
    }

    /**
     * Sets a new partTypeCode
     *
     * @param string $partTypeCode
     * @return self
     */
    public function setPartTypeCode($partTypeCode)
    {
        $this->partTypeCode = $partTypeCode;
        return $this;
    }

    /**
     * Adds as pricing
     *
     * @return self
     * @param \App\Soap\automate\src\Pricing $pricing
     */
    public function addToPricing(\App\Soap\automate\src\Pricing $pricing)
    {
        $this->pricing[] = $pricing;
        return $this;
    }

    /**
     * isset pricing
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPricing($index)
    {
        return isset($this->pricing[$index]);
    }

    /**
     * unset pricing
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPricing($index)
    {
        unset($this->pricing[$index]);
    }

    /**
     * Gets as pricing
     *
     * @return \App\Soap\automate\src\Pricing[]
     */
    public function getPricing()
    {
        return $this->pricing;
    }

    /**
     * Sets a new pricing
     *
     * @param \App\Soap\automate\src\Pricing[] $pricing
     * @return self
     */
    public function setPricing(array $pricing)
    {
        $this->pricing = $pricing;
        return $this;
    }


}


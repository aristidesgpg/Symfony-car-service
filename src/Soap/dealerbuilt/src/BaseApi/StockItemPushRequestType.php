<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing StockItemPushRequestType
 *
 * 
 * XSD Type: StockItemPushRequest
 */
class StockItemPushRequestType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleAttributesType $attributes
     */
    private $attributes = null;

    /**
     * @var string $externalVehicleId
     */
    private $externalVehicleId = null;

    /**
     * @var string $inventoryKey
     */
    private $inventoryKey = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Stock\StockItemAttributesType $stockAttributes
     */
    private $stockAttributes = null;

    /**
     * @var string $stockNumber
     */
    private $stockNumber = null;

    /**
     * @var int $storeId
     */
    private $storeId = null;

    /**
     * @var int $uniqueId
     */
    private $uniqueId = null;

    /**
     * Gets as attributes
     *
     * @return \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleAttributesType
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Sets a new attributes
     *
     * @param \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleAttributesType $attributes
     * @return self
     */
    public function setAttributes(\App\Soap\dealerbuilt\src\Models\Vehicles\VehicleAttributesType $attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * Gets as externalVehicleId
     *
     * @return string
     */
    public function getExternalVehicleId()
    {
        return $this->externalVehicleId;
    }

    /**
     * Sets a new externalVehicleId
     *
     * @param string $externalVehicleId
     * @return self
     */
    public function setExternalVehicleId($externalVehicleId)
    {
        $this->externalVehicleId = $externalVehicleId;
        return $this;
    }

    /**
     * Gets as inventoryKey
     *
     * @return string
     */
    public function getInventoryKey()
    {
        return $this->inventoryKey;
    }

    /**
     * Sets a new inventoryKey
     *
     * @param string $inventoryKey
     * @return self
     */
    public function setInventoryKey($inventoryKey)
    {
        $this->inventoryKey = $inventoryKey;
        return $this;
    }

    /**
     * Gets as stockAttributes
     *
     * @return \App\Soap\dealerbuilt\src\Models\Stock\StockItemAttributesType
     */
    public function getStockAttributes()
    {
        return $this->stockAttributes;
    }

    /**
     * Sets a new stockAttributes
     *
     * @param \App\Soap\dealerbuilt\src\Models\Stock\StockItemAttributesType $stockAttributes
     * @return self
     */
    public function setStockAttributes(\App\Soap\dealerbuilt\src\Models\Stock\StockItemAttributesType $stockAttributes)
    {
        $this->stockAttributes = $stockAttributes;
        return $this;
    }

    /**
     * Gets as stockNumber
     *
     * @return string
     */
    public function getStockNumber()
    {
        return $this->stockNumber;
    }

    /**
     * Sets a new stockNumber
     *
     * @param string $stockNumber
     * @return self
     */
    public function setStockNumber($stockNumber)
    {
        $this->stockNumber = $stockNumber;
        return $this;
    }

    /**
     * Gets as storeId
     *
     * @return int
     */
    public function getStoreId()
    {
        return $this->storeId;
    }

    /**
     * Sets a new storeId
     *
     * @param int $storeId
     * @return self
     */
    public function setStoreId($storeId)
    {
        $this->storeId = $storeId;
        return $this;
    }

    /**
     * Gets as uniqueId
     *
     * @return int
     */
    public function getUniqueId()
    {
        return $this->uniqueId;
    }

    /**
     * Sets a new uniqueId
     *
     * @param int $uniqueId
     * @return self
     */
    public function setUniqueId($uniqueId)
    {
        $this->uniqueId = $uniqueId;
        return $this;
    }


}


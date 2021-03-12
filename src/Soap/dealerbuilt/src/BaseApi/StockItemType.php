<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing StockItemType
 *
 * 
 * XSD Type: StockItem
 */
class StockItemType extends ApiStoreItemType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Stock\StockItemAttributesType $attributes
     */
    private $attributes = null;

    /**
     * @var string $inventoryKey
     */
    private $inventoryKey = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleAttributesType $unitAttributes
     */
    private $unitAttributes = null;

    /**
     * @var string $vehicleKey
     */
    private $vehicleKey = null;

    /**
     * Gets as attributes
     *
     * @return \App\Soap\dealerbuilt\src\Models\Stock\StockItemAttributesType
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Sets a new attributes
     *
     * @param \App\Soap\dealerbuilt\src\Models\Stock\StockItemAttributesType $attributes
     * @return self
     */
    public function setAttributes(\App\Soap\dealerbuilt\src\Models\Stock\StockItemAttributesType $attributes)
    {
        $this->attributes = $attributes;
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
     * Gets as unitAttributes
     *
     * @return \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleAttributesType
     */
    public function getUnitAttributes()
    {
        return $this->unitAttributes;
    }

    /**
     * Sets a new unitAttributes
     *
     * @param \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleAttributesType $unitAttributes
     * @return self
     */
    public function setUnitAttributes(\App\Soap\dealerbuilt\src\Models\Vehicles\VehicleAttributesType $unitAttributes)
    {
        $this->unitAttributes = $unitAttributes;
        return $this;
    }

    /**
     * Gets as vehicleKey
     *
     * @return string
     */
    public function getVehicleKey()
    {
        return $this->vehicleKey;
    }

    /**
     * Sets a new vehicleKey
     *
     * @param string $vehicleKey
     * @return self
     */
    public function setVehicleKey($vehicleKey)
    {
        $this->vehicleKey = $vehicleKey;
        return $this;
    }


}


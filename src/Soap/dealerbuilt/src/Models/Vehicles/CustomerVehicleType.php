<?php

namespace App\Soap\dealerbuilt\src\Models\Vehicles;

use App\Soap\dealerbuilt\src\Models\SourceItemType;

/**
 * Class representing CustomerVehicleType
 *
 * 
 * XSD Type: CustomerVehicle
 */
class CustomerVehicleType extends SourceItemType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleAttributesType $attributes
     */
    private $attributes = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Vehicles\CustomerVehicleReferencesType $references
     */
    private $references = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Stock\StockItemAttributesType $stockAttributes
     */
    private $stockAttributes = null;

    /**
     * @var int $vehicleId
     */
    private $vehicleId = null;

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
     * Gets as references
     *
     * @return \App\Soap\dealerbuilt\src\Models\Vehicles\CustomerVehicleReferencesType
     */
    public function getReferences()
    {
        return $this->references;
    }

    /**
     * Sets a new references
     *
     * @param \App\Soap\dealerbuilt\src\Models\Vehicles\CustomerVehicleReferencesType $references
     * @return self
     */
    public function setReferences(\App\Soap\dealerbuilt\src\Models\Vehicles\CustomerVehicleReferencesType $references)
    {
        $this->references = $references;
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
     * Gets as vehicleId
     *
     * @return int
     */
    public function getVehicleId()
    {
        return $this->vehicleId;
    }

    /**
     * Sets a new vehicleId
     *
     * @param int $vehicleId
     * @return self
     */
    public function setVehicleId($vehicleId)
    {
        $this->vehicleId = $vehicleId;
        return $this;
    }


}


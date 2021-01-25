<?php

namespace App\Soap\dealerbuilt\src\Models\Stock;

use App\Soap\dealerbuilt\src\Models\StoreItemType;

/**
 * Class representing StockItemType
 *
 * 
 * XSD Type: StockItem
 */
class StockItemType extends StoreItemType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Stock\StockItemAttributesType $attributes
     */
    private $attributes = null;

    /**
     * @var string $eventDescription
     */
    private $eventDescription = null;

    /**
     * @var string $eventID
     */
    private $eventID = null;

    /**
     * @var string $locationID
     */
    private $locationID = null;

    /**
     * @var string $locationName
     */
    private $locationName = null;

    /**
     * @var string $optionCD
     */
    private $optionCD = null;

    /**
     * @var string $optionDesc
     */
    private $optionDesc = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleAttributesType $unitAttributes
     */
    private $unitAttributes = null;

    /**
     * @var string $vehicleDealerOptionsDesc
     */
    private $vehicleDealerOptionsDesc = null;

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
     * Gets as eventDescription
     *
     * @return string
     */
    public function getEventDescription()
    {
        return $this->eventDescription;
    }

    /**
     * Sets a new eventDescription
     *
     * @param string $eventDescription
     * @return self
     */
    public function setEventDescription($eventDescription)
    {
        $this->eventDescription = $eventDescription;
        return $this;
    }

    /**
     * Gets as eventID
     *
     * @return string
     */
    public function getEventID()
    {
        return $this->eventID;
    }

    /**
     * Sets a new eventID
     *
     * @param string $eventID
     * @return self
     */
    public function setEventID($eventID)
    {
        $this->eventID = $eventID;
        return $this;
    }

    /**
     * Gets as locationID
     *
     * @return string
     */
    public function getLocationID()
    {
        return $this->locationID;
    }

    /**
     * Sets a new locationID
     *
     * @param string $locationID
     * @return self
     */
    public function setLocationID($locationID)
    {
        $this->locationID = $locationID;
        return $this;
    }

    /**
     * Gets as locationName
     *
     * @return string
     */
    public function getLocationName()
    {
        return $this->locationName;
    }

    /**
     * Sets a new locationName
     *
     * @param string $locationName
     * @return self
     */
    public function setLocationName($locationName)
    {
        $this->locationName = $locationName;
        return $this;
    }

    /**
     * Gets as optionCD
     *
     * @return string
     */
    public function getOptionCD()
    {
        return $this->optionCD;
    }

    /**
     * Sets a new optionCD
     *
     * @param string $optionCD
     * @return self
     */
    public function setOptionCD($optionCD)
    {
        $this->optionCD = $optionCD;
        return $this;
    }

    /**
     * Gets as optionDesc
     *
     * @return string
     */
    public function getOptionDesc()
    {
        return $this->optionDesc;
    }

    /**
     * Sets a new optionDesc
     *
     * @param string $optionDesc
     * @return self
     */
    public function setOptionDesc($optionDesc)
    {
        $this->optionDesc = $optionDesc;
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
     * Gets as vehicleDealerOptionsDesc
     *
     * @return string
     */
    public function getVehicleDealerOptionsDesc()
    {
        return $this->vehicleDealerOptionsDesc;
    }

    /**
     * Sets a new vehicleDealerOptionsDesc
     *
     * @param string $vehicleDealerOptionsDesc
     * @return self
     */
    public function setVehicleDealerOptionsDesc($vehicleDealerOptionsDesc)
    {
        $this->vehicleDealerOptionsDesc = $vehicleDealerOptionsDesc;
        return $this;
    }


}


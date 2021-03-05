<?php

namespace App\Soap\automate\src;

/**
 * Class representing Vehicle
 */
class Vehicle
{

    /**
     * @var string $model
     */
    private $model = null;

    /**
     * @var int $modelYear
     */
    private $modelYear = null;

    /**
     * @var \App\Soap\automate\src\ColorGroup $colorGroup
     */
    private $colorGroup = null;

    /**
     * @var string $vehicleID
     */
    private $vehicleID = null;

    /**
     * @var string $manufacturerName
     */
    private $manufacturerName = null;

    /**
     * Gets as model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Sets a new model
     *
     * @param string $model
     * @return self
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * Gets as modelYear
     *
     * @return int
     */
    public function getModelYear()
    {
        return $this->modelYear;
    }

    /**
     * Sets a new modelYear
     *
     * @param int $modelYear
     * @return self
     */
    public function setModelYear($modelYear)
    {
        $this->modelYear = $modelYear;
        return $this;
    }

    /**
     * Gets as colorGroup
     *
     * @return \App\Soap\automate\src\ColorGroup
     */
    public function getColorGroup()
    {
        return $this->colorGroup;
    }

    /**
     * Sets a new colorGroup
     *
     * @param \App\Soap\automate\src\ColorGroup $colorGroup
     * @return self
     */
    public function setColorGroup(\App\Soap\automate\src\ColorGroup $colorGroup)
    {
        $this->colorGroup = $colorGroup;
        return $this;
    }

    /**
     * Gets as vehicleID
     *
     * @return string
     */
    public function getVehicleID()
    {
        return $this->vehicleID;
    }

    /**
     * Sets a new vehicleID
     *
     * @param string $vehicleID
     * @return self
     */
    public function setVehicleID($vehicleID)
    {
        $this->vehicleID = $vehicleID;
        return $this;
    }

    /**
     * Gets as manufacturerName
     *
     * @return string
     */
    public function getManufacturerName()
    {
        return $this->manufacturerName;
    }

    /**
     * Sets a new manufacturerName
     *
     * @param string $manufacturerName
     * @return self
     */
    public function setManufacturerName($manufacturerName)
    {
        $this->manufacturerName = $manufacturerName;
        return $this;
    }


}


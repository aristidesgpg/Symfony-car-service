<?php

namespace App\Soap\dealerbuilt\src\Models\Vehicles;

/**
 * Class representing VehicleServiceVehicleDataType
 *
 * 
 * XSD Type: VehicleService.VehicleData
 */
class VehicleServiceVehicleDataType
{

    /**
     * @var string $brandingStateCode
     */
    private $brandingStateCode = null;

    /**
     * @var string $brandingStateReference
     */
    private $brandingStateReference = null;

    /**
     * @var \DateTime $brandingTitleDate
     */
    private $brandingTitleDate = null;

    /**
     * @var \DateTime $buildDate
     */
    private $buildDate = null;

    /**
     * @var \DateTime $deliveryDate
     */
    private $deliveryDate = null;

    /**
     * @var float $deliveryMileage
     */
    private $deliveryMileage = null;

    /**
     * @var string $engineNumber
     */
    private $engineNumber = null;

    /**
     * @var \DateTime $inServiceDate
     */
    private $inServiceDate = null;

    /**
     * @var float $inServiceDistanceMeasure
     */
    private $inServiceDistanceMeasure = null;

    /**
     * @var string $inServiceTypeDescription
     */
    private $inServiceTypeDescription = null;

    /**
     * @var string $make
     */
    private $make = null;

    /**
     * @var string $model
     */
    private $model = null;

    /**
     * @var string $modelDescription
     */
    private $modelDescription = null;

    /**
     * @var string $modelYear
     */
    private $modelYear = null;

    /**
     * @var bool $nonUSVehicleInd
     */
    private $nonUSVehicleInd = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleServiceVehicleDataOptionType[] $options
     */
    private $options = null;

    /**
     * @var string $trim
     */
    private $trim = null;

    /**
     * @var string $vIN
     */
    private $vIN = null;

    /**
     * Gets as brandingStateCode
     *
     * @return string
     */
    public function getBrandingStateCode()
    {
        return $this->brandingStateCode;
    }

    /**
     * Sets a new brandingStateCode
     *
     * @param string $brandingStateCode
     * @return self
     */
    public function setBrandingStateCode($brandingStateCode)
    {
        $this->brandingStateCode = $brandingStateCode;
        return $this;
    }

    /**
     * Gets as brandingStateReference
     *
     * @return string
     */
    public function getBrandingStateReference()
    {
        return $this->brandingStateReference;
    }

    /**
     * Sets a new brandingStateReference
     *
     * @param string $brandingStateReference
     * @return self
     */
    public function setBrandingStateReference($brandingStateReference)
    {
        $this->brandingStateReference = $brandingStateReference;
        return $this;
    }

    /**
     * Gets as brandingTitleDate
     *
     * @return \DateTime
     */
    public function getBrandingTitleDate()
    {
        return $this->brandingTitleDate;
    }

    /**
     * Sets a new brandingTitleDate
     *
     * @param \DateTime $brandingTitleDate
     * @return self
     */
    public function setBrandingTitleDate(\DateTime $brandingTitleDate)
    {
        $this->brandingTitleDate = $brandingTitleDate;
        return $this;
    }

    /**
     * Gets as buildDate
     *
     * @return \DateTime
     */
    public function getBuildDate()
    {
        return $this->buildDate;
    }

    /**
     * Sets a new buildDate
     *
     * @param \DateTime $buildDate
     * @return self
     */
    public function setBuildDate(\DateTime $buildDate)
    {
        $this->buildDate = $buildDate;
        return $this;
    }

    /**
     * Gets as deliveryDate
     *
     * @return \DateTime
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }

    /**
     * Sets a new deliveryDate
     *
     * @param \DateTime $deliveryDate
     * @return self
     */
    public function setDeliveryDate(\DateTime $deliveryDate)
    {
        $this->deliveryDate = $deliveryDate;
        return $this;
    }

    /**
     * Gets as deliveryMileage
     *
     * @return float
     */
    public function getDeliveryMileage()
    {
        return $this->deliveryMileage;
    }

    /**
     * Sets a new deliveryMileage
     *
     * @param float $deliveryMileage
     * @return self
     */
    public function setDeliveryMileage($deliveryMileage)
    {
        $this->deliveryMileage = $deliveryMileage;
        return $this;
    }

    /**
     * Gets as engineNumber
     *
     * @return string
     */
    public function getEngineNumber()
    {
        return $this->engineNumber;
    }

    /**
     * Sets a new engineNumber
     *
     * @param string $engineNumber
     * @return self
     */
    public function setEngineNumber($engineNumber)
    {
        $this->engineNumber = $engineNumber;
        return $this;
    }

    /**
     * Gets as inServiceDate
     *
     * @return \DateTime
     */
    public function getInServiceDate()
    {
        return $this->inServiceDate;
    }

    /**
     * Sets a new inServiceDate
     *
     * @param \DateTime $inServiceDate
     * @return self
     */
    public function setInServiceDate(\DateTime $inServiceDate)
    {
        $this->inServiceDate = $inServiceDate;
        return $this;
    }

    /**
     * Gets as inServiceDistanceMeasure
     *
     * @return float
     */
    public function getInServiceDistanceMeasure()
    {
        return $this->inServiceDistanceMeasure;
    }

    /**
     * Sets a new inServiceDistanceMeasure
     *
     * @param float $inServiceDistanceMeasure
     * @return self
     */
    public function setInServiceDistanceMeasure($inServiceDistanceMeasure)
    {
        $this->inServiceDistanceMeasure = $inServiceDistanceMeasure;
        return $this;
    }

    /**
     * Gets as inServiceTypeDescription
     *
     * @return string
     */
    public function getInServiceTypeDescription()
    {
        return $this->inServiceTypeDescription;
    }

    /**
     * Sets a new inServiceTypeDescription
     *
     * @param string $inServiceTypeDescription
     * @return self
     */
    public function setInServiceTypeDescription($inServiceTypeDescription)
    {
        $this->inServiceTypeDescription = $inServiceTypeDescription;
        return $this;
    }

    /**
     * Gets as make
     *
     * @return string
     */
    public function getMake()
    {
        return $this->make;
    }

    /**
     * Sets a new make
     *
     * @param string $make
     * @return self
     */
    public function setMake($make)
    {
        $this->make = $make;
        return $this;
    }

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
     * Gets as modelDescription
     *
     * @return string
     */
    public function getModelDescription()
    {
        return $this->modelDescription;
    }

    /**
     * Sets a new modelDescription
     *
     * @param string $modelDescription
     * @return self
     */
    public function setModelDescription($modelDescription)
    {
        $this->modelDescription = $modelDescription;
        return $this;
    }

    /**
     * Gets as modelYear
     *
     * @return string
     */
    public function getModelYear()
    {
        return $this->modelYear;
    }

    /**
     * Sets a new modelYear
     *
     * @param string $modelYear
     * @return self
     */
    public function setModelYear($modelYear)
    {
        $this->modelYear = $modelYear;
        return $this;
    }

    /**
     * Gets as nonUSVehicleInd
     *
     * @return bool
     */
    public function getNonUSVehicleInd()
    {
        return $this->nonUSVehicleInd;
    }

    /**
     * Sets a new nonUSVehicleInd
     *
     * @param bool $nonUSVehicleInd
     * @return self
     */
    public function setNonUSVehicleInd($nonUSVehicleInd)
    {
        $this->nonUSVehicleInd = $nonUSVehicleInd;
        return $this;
    }

    /**
     * Adds as vehicleServiceVehicleDataOption
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleServiceVehicleDataOptionType $vehicleServiceVehicleDataOption
     */
    public function addToOptions(\App\Soap\dealerbuilt\src\Models\Vehicles\VehicleServiceVehicleDataOptionType $vehicleServiceVehicleDataOption)
    {
        $this->options[] = $vehicleServiceVehicleDataOption;
        return $this;
    }

    /**
     * isset options
     *
     * @param int|string $index
     * @return bool
     */
    public function issetOptions($index)
    {
        return isset($this->options[$index]);
    }

    /**
     * unset options
     *
     * @param int|string $index
     * @return void
     */
    public function unsetOptions($index)
    {
        unset($this->options[$index]);
    }

    /**
     * Gets as options
     *
     * @return \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleServiceVehicleDataOptionType[]
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Sets a new options
     *
     * @param \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleServiceVehicleDataOptionType[] $options
     * @return self
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * Gets as trim
     *
     * @return string
     */
    public function getTrim()
    {
        return $this->trim;
    }

    /**
     * Sets a new trim
     *
     * @param string $trim
     * @return self
     */
    public function setTrim($trim)
    {
        $this->trim = $trim;
        return $this;
    }

    /**
     * Gets as vIN
     *
     * @return string
     */
    public function getVIN()
    {
        return $this->vIN;
    }

    /**
     * Sets a new vIN
     *
     * @param string $vIN
     * @return self
     */
    public function setVIN($vIN)
    {
        $this->vIN = $vIN;
        return $this;
    }


}


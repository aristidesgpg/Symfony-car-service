<?php

namespace App\Soap\automate\src;

/**
 * Class representing RepairOrderVehicleLineItem
 */
class RepairOrderVehicleLineItem
{

    /**
     * @var string $licenseNumberString
     */
    private $licenseNumberString = null;

    /**
     * @var \App\Soap\automate\src\Vehicle $vehicle
     */
    private $vehicle = null;

    /**
     * @var string $originalSoldDate
     */
    private $originalSoldDate = null;

    /**
     * @var int $deliveryDistanceMeasure
     */
    private $deliveryDistanceMeasure = null;

    /**
     * Gets as licenseNumberString
     *
     * @return string
     */
    public function getLicenseNumberString()
    {
        return $this->licenseNumberString;
    }

    /**
     * Sets a new licenseNumberString
     *
     * @param string $licenseNumberString
     * @return self
     */
    public function setLicenseNumberString($licenseNumberString)
    {
        $this->licenseNumberString = $licenseNumberString;
        return $this;
    }

    /**
     * Gets as vehicle
     *
     * @return \App\Soap\automate\src\Vehicle
     */
    public function getVehicle()
    {
        return $this->vehicle;
    }

    /**
     * Sets a new vehicle
     *
     * @param \App\Soap\automate\src\Vehicle $vehicle
     * @return self
     */
    public function setVehicle(\App\Soap\automate\src\Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
        return $this;
    }

    /**
     * Gets as originalSoldDate
     *
     * @return string
     */
    public function getOriginalSoldDate()
    {
        return $this->originalSoldDate;
    }

    /**
     * Sets a new originalSoldDate
     *
     * @param string $originalSoldDate
     * @return self
     */
    public function setOriginalSoldDate($originalSoldDate)
    {
        $this->originalSoldDate = $originalSoldDate;
        return $this;
    }

    /**
     * Gets as deliveryDistanceMeasure
     *
     * @return int
     */
    public function getDeliveryDistanceMeasure()
    {
        return $this->deliveryDistanceMeasure;
    }

    /**
     * Sets a new deliveryDistanceMeasure
     *
     * @param int $deliveryDistanceMeasure
     * @return self
     */
    public function setDeliveryDistanceMeasure($deliveryDistanceMeasure)
    {
        $this->deliveryDistanceMeasure = $deliveryDistanceMeasure;
        return $this;
    }


}


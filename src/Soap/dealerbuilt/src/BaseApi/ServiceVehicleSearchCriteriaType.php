<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ServiceVehicleSearchCriteriaType.
 *
 * XSD Type: ServiceVehicleSearchCriteria
 */
class ServiceVehicleSearchCriteriaType extends ServiceLocationSearchCriteriaType
{
    /**
     * @var string
     */
    private $vin = null;

    /**
     * Gets as vin.
     *
     * @return string
     */
    public function getVin()
    {
        return $this->vin;
    }

    /**
     * Sets a new vin.
     *
     * @param string $vin
     *
     * @return self
     */
    public function setVin($vin)
    {
        $this->vin = $vin;

        return $this;
    }
}

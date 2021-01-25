<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfVehicleLookupType.
 *
 * XSD Type: ArrayOfVehicleLookup
 */
class ArrayOfVehicleLookupType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\VehicleLookupType[]
     */
    private $vehicleLookup = [
    ];

    /**
     * Adds as vehicleLookup.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\VehicleLookupType $vehicleLookup
     */
    public function addToVehicleLookup(VehicleLookupType $vehicleLookup)
    {
        $this->vehicleLookup[] = $vehicleLookup;

        return $this;
    }

    /**
     * isset vehicleLookup.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetVehicleLookup($index)
    {
        return isset($this->vehicleLookup[$index]);
    }

    /**
     * unset vehicleLookup.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetVehicleLookup($index)
    {
        unset($this->vehicleLookup[$index]);
    }

    /**
     * Gets as vehicleLookup.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\VehicleLookupType[]
     */
    public function getVehicleLookup()
    {
        return $this->vehicleLookup;
    }

    /**
     * Sets a new vehicleLookup.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\VehicleLookupType[] $vehicleLookup
     *
     * @return self
     */
    public function setVehicleLookup(array $vehicleLookup)
    {
        $this->vehicleLookup = $vehicleLookup;

        return $this;
    }
}

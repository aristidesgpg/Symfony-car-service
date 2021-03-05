<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushCustomerVehicleOwners
 */
class PushCustomerVehicleOwners
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleOwnerPushRequestType[] $vehicleOwners
     */
    private $vehicleOwners = null;

    /**
     * Adds as customerVehicleOwnerPushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleOwnerPushRequestType $customerVehicleOwnerPushRequest
     */
    public function addToVehicleOwners(\App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleOwnerPushRequestType $customerVehicleOwnerPushRequest)
    {
        $this->vehicleOwners[] = $customerVehicleOwnerPushRequest;
        return $this;
    }

    /**
     * isset vehicleOwners
     *
     * @param int|string $index
     * @return bool
     */
    public function issetVehicleOwners($index)
    {
        return isset($this->vehicleOwners[$index]);
    }

    /**
     * unset vehicleOwners
     *
     * @param int|string $index
     * @return void
     */
    public function unsetVehicleOwners($index)
    {
        unset($this->vehicleOwners[$index]);
    }

    /**
     * Gets as vehicleOwners
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleOwnerPushRequestType[]
     */
    public function getVehicleOwners()
    {
        return $this->vehicleOwners;
    }

    /**
     * Sets a new vehicleOwners
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleOwnerPushRequestType[] $vehicleOwners
     * @return self
     */
    public function setVehicleOwners(array $vehicleOwners)
    {
        $this->vehicleOwners = $vehicleOwners;
        return $this;
    }


}


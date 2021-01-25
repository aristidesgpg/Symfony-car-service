<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushCustomerVehicles
 */
class PushCustomerVehicles
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerVehiclePushRequestType[] $vehicles
     */
    private $vehicles = null;

    /**
     * Adds as customerVehiclePushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehiclePushRequestType $customerVehiclePushRequest
     */
    public function addToVehicles(\App\Soap\dealerbuilt\src\BaseApi\CustomerVehiclePushRequestType $customerVehiclePushRequest)
    {
        $this->vehicles[] = $customerVehiclePushRequest;
        return $this;
    }

    /**
     * isset vehicles
     *
     * @param int|string $index
     * @return bool
     */
    public function issetVehicles($index)
    {
        return isset($this->vehicles[$index]);
    }

    /**
     * unset vehicles
     *
     * @param int|string $index
     * @return void
     */
    public function unsetVehicles($index)
    {
        unset($this->vehicles[$index]);
    }

    /**
     * Gets as vehicles
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerVehiclePushRequestType[]
     */
    public function getVehicles()
    {
        return $this->vehicles;
    }

    /**
     * Sets a new vehicles
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehiclePushRequestType[] $vehicles
     * @return self
     */
    public function setVehicles(array $vehicles)
    {
        $this->vehicles = $vehicles;
        return $this;
    }


}


<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullCustomerVehicleByKey.
 */
class PullCustomerVehicleByKey
{
    /**
     * @var string
     */
    private $vehicleKey = null;

    /**
     * Gets as vehicleKey.
     *
     * @return string
     */
    public function getVehicleKey()
    {
        return $this->vehicleKey;
    }

    /**
     * Sets a new vehicleKey.
     *
     * @param string $vehicleKey
     *
     * @return self
     */
    public function setVehicleKey($vehicleKey)
    {
        $this->vehicleKey = $vehicleKey;

        return $this;
    }
}

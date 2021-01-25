<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullCustomerVehiclesByKey.
 */
class PullCustomerVehiclesByKey
{
    /**
     * @var string[]
     */
    private $vehicleKeys = null;

    /**
     * Adds as string.
     *
     * @return self
     *
     * @param string $string
     */
    public function addToVehicleKeys($string)
    {
        $this->vehicleKeys[] = $string;

        return $this;
    }

    /**
     * isset vehicleKeys.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetVehicleKeys($index)
    {
        return isset($this->vehicleKeys[$index]);
    }

    /**
     * unset vehicleKeys.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetVehicleKeys($index)
    {
        unset($this->vehicleKeys[$index]);
    }

    /**
     * Gets as vehicleKeys.
     *
     * @return string[]
     */
    public function getVehicleKeys()
    {
        return $this->vehicleKeys;
    }

    /**
     * Sets a new vehicleKeys.
     *
     * @param string[] $vehicleKeys
     *
     * @return self
     */
    public function setVehicleKeys(array $vehicleKeys)
    {
        $this->vehicleKeys = $vehicleKeys;

        return $this;
    }
}

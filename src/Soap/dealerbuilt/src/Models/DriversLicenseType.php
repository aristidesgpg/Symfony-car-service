<?php

namespace App\Soap\dealerbuilt\src\Models;

/**
 * Class representing DriversLicenseType.
 *
 * XSD Type: DriversLicense
 */
class DriversLicenseType
{
    /**
     * @var string
     */
    private $number = null;

    /**
     * @var string
     */
    private $state = null;

    /**
     * Gets as number.
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Sets a new number.
     *
     * @param string $number
     *
     * @return self
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Gets as state.
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Sets a new state.
     *
     * @param string $state
     *
     * @return self
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }
}

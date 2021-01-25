<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing OemServiceProfileType.
 *
 * XSD Type: OemServiceProfile
 */
class OemServiceProfileType extends ApiStoreItemType
{
    /**
     * @var string
     */
    private $make = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleServiceType
     */
    private $profile = null;

    /**
     * @var string
     */
    private $vin = null;

    /**
     * Gets as make.
     *
     * @return string
     */
    public function getMake()
    {
        return $this->make;
    }

    /**
     * Sets a new make.
     *
     * @param string $make
     *
     * @return self
     */
    public function setMake($make)
    {
        $this->make = $make;

        return $this;
    }

    /**
     * Gets as profile.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleServiceType
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * Sets a new profile.
     *
     * @return self
     */
    public function setProfile(\App\Soap\dealerbuilt\src\Models\Vehicles\VehicleServiceType $profile)
    {
        $this->profile = $profile;

        return $this;
    }

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

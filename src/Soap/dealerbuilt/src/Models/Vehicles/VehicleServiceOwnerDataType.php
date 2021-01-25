<?php

namespace App\Soap\dealerbuilt\src\Models\Vehicles;

/**
 * Class representing VehicleServiceOwnerDataType.
 *
 * XSD Type: VehicleService.OwnerData
 */
class VehicleServiceOwnerDataType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\IdentityProfileType
     */
    private $identity = null;

    /**
     * @var string
     */
    private $specialRemarks = null;

    /**
     * Gets as identity.
     *
     * @return \App\Soap\dealerbuilt\src\Models\IdentityProfileType
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     * Sets a new identity.
     *
     * @return self
     */
    public function setIdentity(\App\Soap\dealerbuilt\src\Models\IdentityProfileType $identity)
    {
        $this->identity = $identity;

        return $this;
    }

    /**
     * Gets as specialRemarks.
     *
     * @return string
     */
    public function getSpecialRemarks()
    {
        return $this->specialRemarks;
    }

    /**
     * Sets a new specialRemarks.
     *
     * @param string $specialRemarks
     *
     * @return self
     */
    public function setSpecialRemarks($specialRemarks)
    {
        $this->specialRemarks = $specialRemarks;

        return $this;
    }
}

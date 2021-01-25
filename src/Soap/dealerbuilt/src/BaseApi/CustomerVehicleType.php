<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing CustomerVehicleType.
 *
 * XSD Type: CustomerVehicle
 */
class CustomerVehicleType extends ApiSourceItemType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleAttributesType
     */
    private $attributes = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleReferencesType
     */
    private $references = null;

    /**
     * @var string
     */
    private $vehicleKey = null;

    /**
     * Gets as attributes.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleAttributesType
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Sets a new attributes.
     *
     * @return self
     */
    public function setAttributes(\App\Soap\dealerbuilt\src\Models\Vehicles\VehicleAttributesType $attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Gets as references.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleReferencesType
     */
    public function getReferences()
    {
        return $this->references;
    }

    /**
     * Sets a new references.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleReferencesType $references
     *
     * @return self
     */
    public function setReferences(CustomerVehicleReferencesType $references)
    {
        $this->references = $references;

        return $this;
    }

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

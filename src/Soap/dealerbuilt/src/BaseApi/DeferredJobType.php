<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing DeferredJobType.
 *
 * XSD Type: DeferredJob
 */
class DeferredJobType extends ApiServiceLocationItemType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PotentialJobAttributesType
     */
    private $attributes = null;

    /**
     * @var string
     */
    private $customerKey = null;

    /**
     * @var string
     */
    private $deferredJobKey = null;

    /**
     * @var string
     */
    private $vehicleKey = null;

    /**
     * Gets as attributes.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PotentialJobAttributesType
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
    public function setAttributes(\App\Soap\dealerbuilt\src\Models\Service\PotentialJobAttributesType $attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Gets as customerKey.
     *
     * @return string
     */
    public function getCustomerKey()
    {
        return $this->customerKey;
    }

    /**
     * Sets a new customerKey.
     *
     * @param string $customerKey
     *
     * @return self
     */
    public function setCustomerKey($customerKey)
    {
        $this->customerKey = $customerKey;

        return $this;
    }

    /**
     * Gets as deferredJobKey.
     *
     * @return string
     */
    public function getDeferredJobKey()
    {
        return $this->deferredJobKey;
    }

    /**
     * Sets a new deferredJobKey.
     *
     * @param string $deferredJobKey
     *
     * @return self
     */
    public function setDeferredJobKey($deferredJobKey)
    {
        $this->deferredJobKey = $deferredJobKey;

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

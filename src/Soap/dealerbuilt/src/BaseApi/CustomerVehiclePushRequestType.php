<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing CustomerVehiclePushRequestType.
 *
 * XSD Type: CustomerVehiclePushRequest
 */
class CustomerVehiclePushRequestType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleAttributesType
     */
    private $attributes = null;

    /**
     * @var string
     */
    private $customerKey = null;

    /**
     * @var string
     */
    private $externalVehicleId = null;

    /**
     * @var string
     */
    private $pushMethod = null;

    /**
     * @var int
     */
    private $sourceId = null;

    /**
     * @var int
     */
    private $userStoreId = null;

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
     * Gets as externalVehicleId.
     *
     * @return string
     */
    public function getExternalVehicleId()
    {
        return $this->externalVehicleId;
    }

    /**
     * Sets a new externalVehicleId.
     *
     * @param string $externalVehicleId
     *
     * @return self
     */
    public function setExternalVehicleId($externalVehicleId)
    {
        $this->externalVehicleId = $externalVehicleId;

        return $this;
    }

    /**
     * Gets as pushMethod.
     *
     * @return string
     */
    public function getPushMethod()
    {
        return $this->pushMethod;
    }

    /**
     * Sets a new pushMethod.
     *
     * @param string $pushMethod
     *
     * @return self
     */
    public function setPushMethod($pushMethod)
    {
        $this->pushMethod = $pushMethod;

        return $this;
    }

    /**
     * Gets as sourceId.
     *
     * @return int
     */
    public function getSourceId()
    {
        return $this->sourceId;
    }

    /**
     * Sets a new sourceId.
     *
     * @param int $sourceId
     *
     * @return self
     */
    public function setSourceId($sourceId)
    {
        $this->sourceId = $sourceId;

        return $this;
    }

    /**
     * Gets as userStoreId.
     *
     * @return int
     */
    public function getUserStoreId()
    {
        return $this->userStoreId;
    }

    /**
     * Sets a new userStoreId.
     *
     * @param int $userStoreId
     *
     * @return self
     */
    public function setUserStoreId($userStoreId)
    {
        $this->userStoreId = $userStoreId;

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

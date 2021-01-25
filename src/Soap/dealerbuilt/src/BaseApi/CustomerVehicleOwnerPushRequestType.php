<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing CustomerVehicleOwnerPushRequestType.
 *
 * XSD Type: CustomerVehicleOwnerPushRequest
 */
class CustomerVehicleOwnerPushRequestType
{
    /**
     * @var string
     */
    private $customerKey = null;

    /**
     * @var string
     */
    private $externalVehicleId = null;

    /**
     * @var int
     */
    private $sourceId = null;

    /**
     * @var string
     */
    private $vehicleKey = null;

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

<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing AppointmentPushResponseType
 *
 * 
 * XSD Type: AppointmentPushResponse
 */
class AppointmentPushResponseType extends PushResponseType
{

    /**
     * @var string $customerKey
     */
    private $customerKey = null;

    /**
     * @var string $keyNumber
     */
    private $keyNumber = null;

    /**
     * @var int $serviceLocationId
     */
    private $serviceLocationId = null;

    /**
     * @var string $vehicleKey
     */
    private $vehicleKey = null;

    /**
     * Gets as customerKey
     *
     * @return string
     */
    public function getCustomerKey()
    {
        return $this->customerKey;
    }

    /**
     * Sets a new customerKey
     *
     * @param string $customerKey
     * @return self
     */
    public function setCustomerKey($customerKey)
    {
        $this->customerKey = $customerKey;
        return $this;
    }

    /**
     * Gets as keyNumber
     *
     * @return string
     */
    public function getKeyNumber()
    {
        return $this->keyNumber;
    }

    /**
     * Sets a new keyNumber
     *
     * @param string $keyNumber
     * @return self
     */
    public function setKeyNumber($keyNumber)
    {
        $this->keyNumber = $keyNumber;
        return $this;
    }

    /**
     * Gets as serviceLocationId
     *
     * @return int
     */
    public function getServiceLocationId()
    {
        return $this->serviceLocationId;
    }

    /**
     * Sets a new serviceLocationId
     *
     * @param int $serviceLocationId
     * @return self
     */
    public function setServiceLocationId($serviceLocationId)
    {
        $this->serviceLocationId = $serviceLocationId;
        return $this;
    }

    /**
     * Gets as vehicleKey
     *
     * @return string
     */
    public function getVehicleKey()
    {
        return $this->vehicleKey;
    }

    /**
     * Sets a new vehicleKey
     *
     * @param string $vehicleKey
     * @return self
     */
    public function setVehicleKey($vehicleKey)
    {
        $this->vehicleKey = $vehicleKey;
        return $this;
    }


}


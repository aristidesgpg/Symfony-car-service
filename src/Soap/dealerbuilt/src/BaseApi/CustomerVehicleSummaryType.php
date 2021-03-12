<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing CustomerVehicleSummaryType
 *
 * 
 * XSD Type: CustomerVehicleSummary
 */
class CustomerVehicleSummaryType extends ApiSourceItemType
{

    /**
     * @var string $customerKey
     */
    private $customerKey = null;

    /**
     * @var \DateTime $modifiedStamp
     */
    private $modifiedStamp = null;

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
     * Gets as modifiedStamp
     *
     * @return \DateTime
     */
    public function getModifiedStamp()
    {
        return $this->modifiedStamp;
    }

    /**
     * Sets a new modifiedStamp
     *
     * @param \DateTime $modifiedStamp
     * @return self
     */
    public function setModifiedStamp(\DateTime $modifiedStamp)
    {
        $this->modifiedStamp = $modifiedStamp;
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


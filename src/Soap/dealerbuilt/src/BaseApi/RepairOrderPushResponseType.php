<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing RepairOrderPushResponseType.
 *
 * XSD Type: RepairOrderPushResponse
 */
class RepairOrderPushResponseType extends PushResponseType
{
    /**
     * @var string
     */
    private $customerKey = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\RepairOrderJobPushResponseType[]
     */
    private $jobPushResponses = null;

    /**
     * @var string
     */
    private $repairOrderNumber = null;

    /**
     * @var int
     */
    private $serviceLocationId = null;

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
     * Adds as repairOrderJobPushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderJobPushResponseType $repairOrderJobPushResponse
     */
    public function addToJobPushResponses(RepairOrderJobPushResponseType $repairOrderJobPushResponse)
    {
        $this->jobPushResponses[] = $repairOrderJobPushResponse;

        return $this;
    }

    /**
     * isset jobPushResponses.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetJobPushResponses($index)
    {
        return isset($this->jobPushResponses[$index]);
    }

    /**
     * unset jobPushResponses.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetJobPushResponses($index)
    {
        unset($this->jobPushResponses[$index]);
    }

    /**
     * Gets as jobPushResponses.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\RepairOrderJobPushResponseType[]
     */
    public function getJobPushResponses()
    {
        return $this->jobPushResponses;
    }

    /**
     * Sets a new jobPushResponses.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderJobPushResponseType[] $jobPushResponses
     *
     * @return self
     */
    public function setJobPushResponses(array $jobPushResponses)
    {
        $this->jobPushResponses = $jobPushResponses;

        return $this;
    }

    /**
     * Gets as repairOrderNumber.
     *
     * @return string
     */
    public function getRepairOrderNumber()
    {
        return $this->repairOrderNumber;
    }

    /**
     * Sets a new repairOrderNumber.
     *
     * @param string $repairOrderNumber
     *
     * @return self
     */
    public function setRepairOrderNumber($repairOrderNumber)
    {
        $this->repairOrderNumber = $repairOrderNumber;

        return $this;
    }

    /**
     * Gets as serviceLocationId.
     *
     * @return int
     */
    public function getServiceLocationId()
    {
        return $this->serviceLocationId;
    }

    /**
     * Sets a new serviceLocationId.
     *
     * @param int $serviceLocationId
     *
     * @return self
     */
    public function setServiceLocationId($serviceLocationId)
    {
        $this->serviceLocationId = $serviceLocationId;

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

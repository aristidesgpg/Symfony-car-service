<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing EstimatePushResponseType
 *
 * 
 * XSD Type: EstimatePushResponse
 */
class EstimatePushResponseType extends PushResponseType
{

    /**
     * @var string $customerKey
     */
    private $customerKey = null;

    /**
     * @var string $estimateNumber
     */
    private $estimateNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PotentialJobPushResponseType[] $jobPushResponses
     */
    private $jobPushResponses = null;

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
     * Gets as estimateNumber
     *
     * @return string
     */
    public function getEstimateNumber()
    {
        return $this->estimateNumber;
    }

    /**
     * Sets a new estimateNumber
     *
     * @param string $estimateNumber
     * @return self
     */
    public function setEstimateNumber($estimateNumber)
    {
        $this->estimateNumber = $estimateNumber;
        return $this;
    }

    /**
     * Adds as potentialJobPushResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialJobPushResponseType $potentialJobPushResponse
     */
    public function addToJobPushResponses(\App\Soap\dealerbuilt\src\BaseApi\PotentialJobPushResponseType $potentialJobPushResponse)
    {
        $this->jobPushResponses[] = $potentialJobPushResponse;
        return $this;
    }

    /**
     * isset jobPushResponses
     *
     * @param int|string $index
     * @return bool
     */
    public function issetJobPushResponses($index)
    {
        return isset($this->jobPushResponses[$index]);
    }

    /**
     * unset jobPushResponses
     *
     * @param int|string $index
     * @return void
     */
    public function unsetJobPushResponses($index)
    {
        unset($this->jobPushResponses[$index]);
    }

    /**
     * Gets as jobPushResponses
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PotentialJobPushResponseType[]
     */
    public function getJobPushResponses()
    {
        return $this->jobPushResponses;
    }

    /**
     * Sets a new jobPushResponses
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialJobPushResponseType[] $jobPushResponses
     * @return self
     */
    public function setJobPushResponses(array $jobPushResponses)
    {
        $this->jobPushResponses = $jobPushResponses;
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


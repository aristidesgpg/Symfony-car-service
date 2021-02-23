<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing EstimatePushRequestType
 *
 * 
 * XSD Type: EstimatePushRequest
 */
class EstimatePushRequestType
{

    /**
     * @var string $customerKey
     */
    private $customerKey = null;

    /**
     * @var string $estimateKey
     */
    private $estimateKey = null;

    /**
     * @var string $externalEstimateId
     */
    private $externalEstimateId = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialJobAttributesType[] $jobs
     */
    private $jobs = null;

    /**
     * @var string $repairOrderNumber
     */
    private $repairOrderNumber = null;

    /**
     * @var int $serviceLocationId
     */
    private $serviceLocationId = null;

    /**
     * @var string $vehicleKey
     */
    private $vehicleKey = null;

    /**
     * @var string $vin
     */
    private $vin = null;

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
     * Gets as estimateKey
     *
     * @return string
     */
    public function getEstimateKey()
    {
        return $this->estimateKey;
    }

    /**
     * Sets a new estimateKey
     *
     * @param string $estimateKey
     * @return self
     */
    public function setEstimateKey($estimateKey)
    {
        $this->estimateKey = $estimateKey;
        return $this;
    }

    /**
     * Gets as externalEstimateId
     *
     * @return string
     */
    public function getExternalEstimateId()
    {
        return $this->externalEstimateId;
    }

    /**
     * Sets a new externalEstimateId
     *
     * @param string $externalEstimateId
     * @return self
     */
    public function setExternalEstimateId($externalEstimateId)
    {
        $this->externalEstimateId = $externalEstimateId;
        return $this;
    }

    /**
     * Adds as pushedPotentialJobAttributes
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialJobAttributesType $pushedPotentialJobAttributes
     */
    public function addToJobs(\App\Soap\dealerbuilt\src\Models\Service\PushedPotentialJobAttributesType $pushedPotentialJobAttributes)
    {
        $this->jobs[] = $pushedPotentialJobAttributes;
        return $this;
    }

    /**
     * isset jobs
     *
     * @param int|string $index
     * @return bool
     */
    public function issetJobs($index)
    {
        return isset($this->jobs[$index]);
    }

    /**
     * unset jobs
     *
     * @param int|string $index
     * @return void
     */
    public function unsetJobs($index)
    {
        unset($this->jobs[$index]);
    }

    /**
     * Gets as jobs
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialJobAttributesType[]
     */
    public function getJobs()
    {
        return $this->jobs;
    }

    /**
     * Sets a new jobs
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialJobAttributesType[] $jobs
     * @return self
     */
    public function setJobs(array $jobs)
    {
        $this->jobs = $jobs;
        return $this;
    }

    /**
     * Gets as repairOrderNumber
     *
     * @return string
     */
    public function getRepairOrderNumber()
    {
        return $this->repairOrderNumber;
    }

    /**
     * Sets a new repairOrderNumber
     *
     * @param string $repairOrderNumber
     * @return self
     */
    public function setRepairOrderNumber($repairOrderNumber)
    {
        $this->repairOrderNumber = $repairOrderNumber;
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

    /**
     * Gets as vin
     *
     * @return string
     */
    public function getVin()
    {
        return $this->vin;
    }

    /**
     * Sets a new vin
     *
     * @param string $vin
     * @return self
     */
    public function setVin($vin)
    {
        $this->vin = $vin;
        return $this;
    }


}


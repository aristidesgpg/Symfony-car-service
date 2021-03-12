<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing RepairOrderPushRequestType
 *
 * 
 * XSD Type: RepairOrderPushRequest
 */
class RepairOrderPushRequestType
{

    /**
     * @var string $color
     */
    private $color = null;

    /**
     * @var string $customerKey
     */
    private $customerKey = null;

    /**
     * @var string $externalRepairOrderId
     */
    private $externalRepairOrderId = null;

    /**
     * @var bool $forceRepairOrderCreation
     */
    private $forceRepairOrderCreation = null;

    /**
     * @var string $hat
     */
    private $hat = null;

    /**
     * @var string $internalNotes
     */
    private $internalNotes = null;

    /**
     * @var bool $isWaiter
     */
    private $isWaiter = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderJobAttributesType[] $jobs
     */
    private $jobs = null;

    /**
     * @var int $milesIn
     */
    private $milesIn = null;

    /**
     * @var int $milesOut
     */
    private $milesOut = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $originalEstimate
     */
    private $originalEstimate = null;

    /**
     * @var int $priority
     */
    private $priority = null;

    /**
     * @var \DateTime $promisedTime
     */
    private $promisedTime = null;

    /**
     * @var string $repairOrderKey
     */
    private $repairOrderKey = null;

    /**
     * @var string $serviceAdvisorNumber
     */
    private $serviceAdvisorNumber = null;

    /**
     * @var int $serviceLocationId
     */
    private $serviceLocationId = null;

    /**
     * @var string $status
     */
    private $status = null;

    /**
     * @var string $vehicleKey
     */
    private $vehicleKey = null;

    /**
     * @var string $vin
     */
    private $vin = null;

    /**
     * Gets as color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Sets a new color
     *
     * @param string $color
     * @return self
     */
    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

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
     * Gets as externalRepairOrderId
     *
     * @return string
     */
    public function getExternalRepairOrderId()
    {
        return $this->externalRepairOrderId;
    }

    /**
     * Sets a new externalRepairOrderId
     *
     * @param string $externalRepairOrderId
     * @return self
     */
    public function setExternalRepairOrderId($externalRepairOrderId)
    {
        $this->externalRepairOrderId = $externalRepairOrderId;
        return $this;
    }

    /**
     * Gets as forceRepairOrderCreation
     *
     * @return bool
     */
    public function getForceRepairOrderCreation()
    {
        return $this->forceRepairOrderCreation;
    }

    /**
     * Sets a new forceRepairOrderCreation
     *
     * @param bool $forceRepairOrderCreation
     * @return self
     */
    public function setForceRepairOrderCreation($forceRepairOrderCreation)
    {
        $this->forceRepairOrderCreation = $forceRepairOrderCreation;
        return $this;
    }

    /**
     * Gets as hat
     *
     * @return string
     */
    public function getHat()
    {
        return $this->hat;
    }

    /**
     * Sets a new hat
     *
     * @param string $hat
     * @return self
     */
    public function setHat($hat)
    {
        $this->hat = $hat;
        return $this;
    }

    /**
     * Gets as internalNotes
     *
     * @return string
     */
    public function getInternalNotes()
    {
        return $this->internalNotes;
    }

    /**
     * Sets a new internalNotes
     *
     * @param string $internalNotes
     * @return self
     */
    public function setInternalNotes($internalNotes)
    {
        $this->internalNotes = $internalNotes;
        return $this;
    }

    /**
     * Gets as isWaiter
     *
     * @return bool
     */
    public function getIsWaiter()
    {
        return $this->isWaiter;
    }

    /**
     * Sets a new isWaiter
     *
     * @param bool $isWaiter
     * @return self
     */
    public function setIsWaiter($isWaiter)
    {
        $this->isWaiter = $isWaiter;
        return $this;
    }

    /**
     * Adds as pushedRepairOrderJobAttributes
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderJobAttributesType $pushedRepairOrderJobAttributes
     */
    public function addToJobs(\App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderJobAttributesType $pushedRepairOrderJobAttributes)
    {
        $this->jobs[] = $pushedRepairOrderJobAttributes;
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
     * @return \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderJobAttributesType[]
     */
    public function getJobs()
    {
        return $this->jobs;
    }

    /**
     * Sets a new jobs
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderJobAttributesType[] $jobs
     * @return self
     */
    public function setJobs(array $jobs)
    {
        $this->jobs = $jobs;
        return $this;
    }

    /**
     * Gets as milesIn
     *
     * @return int
     */
    public function getMilesIn()
    {
        return $this->milesIn;
    }

    /**
     * Sets a new milesIn
     *
     * @param int $milesIn
     * @return self
     */
    public function setMilesIn($milesIn)
    {
        $this->milesIn = $milesIn;
        return $this;
    }

    /**
     * Gets as milesOut
     *
     * @return int
     */
    public function getMilesOut()
    {
        return $this->milesOut;
    }

    /**
     * Sets a new milesOut
     *
     * @param int $milesOut
     * @return self
     */
    public function setMilesOut($milesOut)
    {
        $this->milesOut = $milesOut;
        return $this;
    }

    /**
     * Gets as originalEstimate
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getOriginalEstimate()
    {
        return $this->originalEstimate;
    }

    /**
     * Sets a new originalEstimate
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $originalEstimate
     * @return self
     */
    public function setOriginalEstimate(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $originalEstimate)
    {
        $this->originalEstimate = $originalEstimate;
        return $this;
    }

    /**
     * Gets as priority
     *
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Sets a new priority
     *
     * @param int $priority
     * @return self
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * Gets as promisedTime
     *
     * @return \DateTime
     */
    public function getPromisedTime()
    {
        return $this->promisedTime;
    }

    /**
     * Sets a new promisedTime
     *
     * @param \DateTime $promisedTime
     * @return self
     */
    public function setPromisedTime(\DateTime $promisedTime)
    {
        $this->promisedTime = $promisedTime;
        return $this;
    }

    /**
     * Gets as repairOrderKey
     *
     * @return string
     */
    public function getRepairOrderKey()
    {
        return $this->repairOrderKey;
    }

    /**
     * Sets a new repairOrderKey
     *
     * @param string $repairOrderKey
     * @return self
     */
    public function setRepairOrderKey($repairOrderKey)
    {
        $this->repairOrderKey = $repairOrderKey;
        return $this;
    }

    /**
     * Gets as serviceAdvisorNumber
     *
     * @return string
     */
    public function getServiceAdvisorNumber()
    {
        return $this->serviceAdvisorNumber;
    }

    /**
     * Sets a new serviceAdvisorNumber
     *
     * @param string $serviceAdvisorNumber
     * @return self
     */
    public function setServiceAdvisorNumber($serviceAdvisorNumber)
    {
        $this->serviceAdvisorNumber = $serviceAdvisorNumber;
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
     * Gets as status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets a new status
     *
     * @param string $status
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;
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


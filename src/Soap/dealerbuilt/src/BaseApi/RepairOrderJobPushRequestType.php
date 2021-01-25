<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing RepairOrderJobPushRequestType
 *
 * 
 * XSD Type: RepairOrderJobPushRequest
 */
class RepairOrderJobPushRequestType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderJobAttributesType $job
     */
    private $job = null;

    /**
     * @var int $jobNumber
     */
    private $jobNumber = null;

    /**
     * @var string $repairOrderKey
     */
    private $repairOrderKey = null;

    /**
     * @var int $serviceLocationId
     */
    private $serviceLocationId = null;

    /**
     * Gets as job
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderJobAttributesType
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Sets a new job
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderJobAttributesType $job
     * @return self
     */
    public function setJob(\App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderJobAttributesType $job)
    {
        $this->job = $job;
        return $this;
    }

    /**
     * Gets as jobNumber
     *
     * @return int
     */
    public function getJobNumber()
    {
        return $this->jobNumber;
    }

    /**
     * Sets a new jobNumber
     *
     * @param int $jobNumber
     * @return self
     */
    public function setJobNumber($jobNumber)
    {
        $this->jobNumber = $jobNumber;
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


}


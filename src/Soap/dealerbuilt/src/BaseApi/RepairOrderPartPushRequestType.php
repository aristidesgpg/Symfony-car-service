<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing RepairOrderPartPushRequestType
 *
 * 
 * XSD Type: RepairOrderPartPushRequest
 */
class RepairOrderPartPushRequestType
{

    /**
     * @var int $jobNumber
     */
    private $jobNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderPartAttributesType $part
     */
    private $part = null;

    /**
     * @var string $repairOrderKey
     */
    private $repairOrderKey = null;

    /**
     * @var int $serviceLocationId
     */
    private $serviceLocationId = null;

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
     * Gets as part
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderPartAttributesType
     */
    public function getPart()
    {
        return $this->part;
    }

    /**
     * Sets a new part
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderPartAttributesType $part
     * @return self
     */
    public function setPart(\App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderPartAttributesType $part)
    {
        $this->part = $part;
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


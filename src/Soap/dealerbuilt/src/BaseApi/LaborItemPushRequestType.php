<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing LaborItemPushRequestType.
 *
 * XSD Type: LaborItemPushRequest
 */
class LaborItemPushRequestType
{
    /**
     * @var int
     */
    private $jobNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PushedLaborItemType
     */
    private $laborItem = null;

    /**
     * @var string
     */
    private $laborItemKey = null;

    /**
     * @var string
     */
    private $repairOrderKey = null;

    /**
     * @var int
     */
    private $serviceLocationId = null;

    /**
     * Gets as jobNumber.
     *
     * @return int
     */
    public function getJobNumber()
    {
        return $this->jobNumber;
    }

    /**
     * Sets a new jobNumber.
     *
     * @param int $jobNumber
     *
     * @return self
     */
    public function setJobNumber($jobNumber)
    {
        $this->jobNumber = $jobNumber;

        return $this;
    }

    /**
     * Gets as laborItem.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PushedLaborItemType
     */
    public function getLaborItem()
    {
        return $this->laborItem;
    }

    /**
     * Sets a new laborItem.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PushedLaborItemType $laborItem
     *
     * @return self
     */
    public function setLaborItem(PushedLaborItemType $laborItem)
    {
        $this->laborItem = $laborItem;

        return $this;
    }

    /**
     * Gets as laborItemKey.
     *
     * @return string
     */
    public function getLaborItemKey()
    {
        return $this->laborItemKey;
    }

    /**
     * Sets a new laborItemKey.
     *
     * @param string $laborItemKey
     *
     * @return self
     */
    public function setLaborItemKey($laborItemKey)
    {
        $this->laborItemKey = $laborItemKey;

        return $this;
    }

    /**
     * Gets as repairOrderKey.
     *
     * @return string
     */
    public function getRepairOrderKey()
    {
        return $this->repairOrderKey;
    }

    /**
     * Sets a new repairOrderKey.
     *
     * @param string $repairOrderKey
     *
     * @return self
     */
    public function setRepairOrderKey($repairOrderKey)
    {
        $this->repairOrderKey = $repairOrderKey;

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
}

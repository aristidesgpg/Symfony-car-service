<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullRepairOrderByNumber
 */
class PullRepairOrderByNumber
{

    /**
     * @var int $serviceLocationId
     */
    private $serviceLocationId = null;

    /**
     * @var string $repairOrderNumber
     */
    private $repairOrderNumber = null;

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


}


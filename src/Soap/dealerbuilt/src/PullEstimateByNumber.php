<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullEstimateByNumber
 */
class PullEstimateByNumber
{

    /**
     * @var int $serviceLocationId
     */
    private $serviceLocationId = null;

    /**
     * @var string $estimateNumber
     */
    private $estimateNumber = null;

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


}


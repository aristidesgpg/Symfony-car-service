<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullPartsOrdersByNumber.
 */
class PullPartsOrdersByNumber
{
    /**
     * @var int
     */
    private $serviceLocationId = null;

    /**
     * @var string
     */
    private $partsOrderNumber = null;

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
     * Gets as partsOrderNumber.
     *
     * @return string
     */
    public function getPartsOrderNumber()
    {
        return $this->partsOrderNumber;
    }

    /**
     * Sets a new partsOrderNumber.
     *
     * @param string $partsOrderNumber
     *
     * @return self
     */
    public function setPartsOrderNumber($partsOrderNumber)
    {
        $this->partsOrderNumber = $partsOrderNumber;

        return $this;
    }
}

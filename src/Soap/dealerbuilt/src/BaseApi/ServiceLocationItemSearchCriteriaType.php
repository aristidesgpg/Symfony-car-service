<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ServiceLocationItemSearchCriteriaType.
 *
 * XSD Type: ServiceLocationItemSearchCriteria
 */
class ServiceLocationItemSearchCriteriaType
{
    /**
     * @var \DateInterval
     */
    private $maxElapsedSinceUpdate = null;

    /**
     * @var int
     */
    private $serviceLocationId = null;

    /**
     * Gets as maxElapsedSinceUpdate.
     *
     * @return \DateInterval
     */
    public function getMaxElapsedSinceUpdate()
    {
        return $this->maxElapsedSinceUpdate;
    }

    /**
     * Sets a new maxElapsedSinceUpdate.
     *
     * @return self
     */
    public function setMaxElapsedSinceUpdate(\DateInterval $maxElapsedSinceUpdate)
    {
        $this->maxElapsedSinceUpdate = $maxElapsedSinceUpdate;

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

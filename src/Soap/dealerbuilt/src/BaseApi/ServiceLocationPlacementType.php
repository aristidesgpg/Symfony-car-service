<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ServiceLocationPlacementType.
 *
 * XSD Type: ServiceLocationPlacement
 */
class ServiceLocationPlacementType extends StorePlacementType
{
    /**
     * @var int
     */
    private $serviceLocationId = null;

    /**
     * @var string
     */
    private $serviceLocationName = null;

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
     * Gets as serviceLocationName.
     *
     * @return string
     */
    public function getServiceLocationName()
    {
        return $this->serviceLocationName;
    }

    /**
     * Sets a new serviceLocationName.
     *
     * @param string $serviceLocationName
     *
     * @return self
     */
    public function setServiceLocationName($serviceLocationName)
    {
        $this->serviceLocationName = $serviceLocationName;

        return $this;
    }
}

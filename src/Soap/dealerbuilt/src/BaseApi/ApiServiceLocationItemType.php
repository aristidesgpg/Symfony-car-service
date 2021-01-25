<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ApiServiceLocationItemType.
 *
 * XSD Type: ApiServiceLocationItem
 */
class ApiServiceLocationItemType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPlacementType
     */
    private $placement = null;

    /**
     * Gets as placement.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPlacementType
     */
    public function getPlacement()
    {
        return $this->placement;
    }

    /**
     * Sets a new placement.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPlacementType $placement
     *
     * @return self
     */
    public function setPlacement(ServiceLocationPlacementType $placement)
    {
        $this->placement = $placement;

        return $this;
    }
}

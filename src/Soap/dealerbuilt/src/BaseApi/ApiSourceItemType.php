<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ApiSourceItemType.
 *
 * XSD Type: ApiSourceItem
 */
class ApiSourceItemType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\SourcePlacementType
     */
    private $placement = null;

    /**
     * Gets as placement.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\SourcePlacementType
     */
    public function getPlacement()
    {
        return $this->placement;
    }

    /**
     * Sets a new placement.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\SourcePlacementType $placement
     *
     * @return self
     */
    public function setPlacement(SourcePlacementType $placement)
    {
        $this->placement = $placement;

        return $this;
    }
}

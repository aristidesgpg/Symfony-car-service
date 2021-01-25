<?php

namespace App\Soap\dealerbuilt\src\Models;

/**
 * Class representing SourceItemType.
 *
 * XSD Type: SourceItem
 */
class SourceItemType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\SourcePlacementType
     */
    private $placement = null;

    /**
     * Gets as placement.
     *
     * @return \App\Soap\dealerbuilt\src\Models\SourcePlacementType
     */
    public function getPlacement()
    {
        return $this->placement;
    }

    /**
     * Sets a new placement.
     *
     * @param \App\Soap\dealerbuilt\src\Models\SourcePlacementType $placement
     *
     * @return self
     */
    public function setPlacement(SourcePlacementType $placement)
    {
        $this->placement = $placement;

        return $this;
    }
}

<?php

namespace App\Soap\dealerbuilt\src\Models;

/**
 * Class representing StoreItemType
 *
 * 
 * XSD Type: StoreItem
 */
class StoreItemType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\StorePlacementType $placement
     */
    private $placement = null;

    /**
     * Gets as placement
     *
     * @return \App\Soap\dealerbuilt\src\Models\StorePlacementType
     */
    public function getPlacement()
    {
        return $this->placement;
    }

    /**
     * Sets a new placement
     *
     * @param \App\Soap\dealerbuilt\src\Models\StorePlacementType $placement
     * @return self
     */
    public function setPlacement(\App\Soap\dealerbuilt\src\Models\StorePlacementType $placement)
    {
        $this->placement = $placement;
        return $this;
    }


}


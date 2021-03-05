<?php

namespace App\Soap\dealerbuilt\src\Models;

/**
 * Class representing ServiceLocationItemType
 *
 * 
 * XSD Type: ServiceLocationItem
 */
class ServiceLocationItemType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\ServiceLocationPlacementType $placement
     */
    private $placement = null;

    /**
     * Gets as placement
     *
     * @return \App\Soap\dealerbuilt\src\Models\ServiceLocationPlacementType
     */
    public function getPlacement()
    {
        return $this->placement;
    }

    /**
     * Sets a new placement
     *
     * @param \App\Soap\dealerbuilt\src\Models\ServiceLocationPlacementType $placement
     * @return self
     */
    public function setPlacement(\App\Soap\dealerbuilt\src\Models\ServiceLocationPlacementType $placement)
    {
        $this->placement = $placement;
        return $this;
    }


}


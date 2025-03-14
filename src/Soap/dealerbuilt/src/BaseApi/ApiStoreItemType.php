<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ApiStoreItemType
 *
 * 
 * XSD Type: ApiStoreItem
 */
class ApiStoreItemType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\StorePlacementType $placement
     */
    private $placement = null;

    /**
     * Gets as placement
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\StorePlacementType
     */
    public function getPlacement()
    {
        return $this->placement;
    }

    /**
     * Sets a new placement
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StorePlacementType $placement
     * @return self
     */
    public function setPlacement(\App\Soap\dealerbuilt\src\BaseApi\StorePlacementType $placement)
    {
        $this->placement = $placement;
        return $this;
    }


}


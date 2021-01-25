<?php

namespace App\Soap\dealerbuilt\src\Models;

/**
 * Class representing ServiceLocationPlacementType
 *
 * 
 * XSD Type: ServiceLocationPlacement
 */
class ServiceLocationPlacementType extends StorePlacementType
{

    /**
     * @var int $slSetupLocationId
     */
    private $slSetupLocationId = null;

    /**
     * Gets as slSetupLocationId
     *
     * @return int
     */
    public function getSlSetupLocationId()
    {
        return $this->slSetupLocationId;
    }

    /**
     * Sets a new slSetupLocationId
     *
     * @param int $slSetupLocationId
     * @return self
     */
    public function setSlSetupLocationId($slSetupLocationId)
    {
        $this->slSetupLocationId = $slSetupLocationId;
        return $this;
    }


}


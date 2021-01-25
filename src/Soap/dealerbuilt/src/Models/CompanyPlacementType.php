<?php

namespace App\Soap\dealerbuilt\src\Models;

/**
 * Class representing CompanyPlacementType
 *
 * 
 * XSD Type: CompanyPlacement
 */
class CompanyPlacementType extends SourcePlacementType
{

    /**
     * @var int $acSetupLocationId
     */
    private $acSetupLocationId = null;

    /**
     * Gets as acSetupLocationId
     *
     * @return int
     */
    public function getAcSetupLocationId()
    {
        return $this->acSetupLocationId;
    }

    /**
     * Sets a new acSetupLocationId
     *
     * @param int $acSetupLocationId
     * @return self
     */
    public function setAcSetupLocationId($acSetupLocationId)
    {
        $this->acSetupLocationId = $acSetupLocationId;
        return $this;
    }


}


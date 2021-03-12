<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ApiCompanyItemType
 *
 * 
 * XSD Type: ApiCompanyItem
 */
class ApiCompanyItemType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CompanyPlacementType $placement
     */
    private $placement = null;

    /**
     * Gets as placement
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CompanyPlacementType
     */
    public function getPlacement()
    {
        return $this->placement;
    }

    /**
     * Sets a new placement
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CompanyPlacementType $placement
     * @return self
     */
    public function setPlacement(\App\Soap\dealerbuilt\src\BaseApi\CompanyPlacementType $placement)
    {
        $this->placement = $placement;
        return $this;
    }


}


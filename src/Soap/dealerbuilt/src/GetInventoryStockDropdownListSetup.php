<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetInventoryStockDropdownListSetup
 */
class GetInventoryStockDropdownListSetup
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DropdownListSearchCriteriaType $searchCriteria
     */
    private $searchCriteria = null;

    /**
     * Gets as searchCriteria
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DropdownListSearchCriteriaType
     */
    public function getSearchCriteria()
    {
        return $this->searchCriteria;
    }

    /**
     * Sets a new searchCriteria
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DropdownListSearchCriteriaType $searchCriteria
     * @return self
     */
    public function setSearchCriteria(\App\Soap\dealerbuilt\src\BaseApi\DropdownListSearchCriteriaType $searchCriteria)
    {
        $this->searchCriteria = $searchCriteria;
        return $this;
    }


}


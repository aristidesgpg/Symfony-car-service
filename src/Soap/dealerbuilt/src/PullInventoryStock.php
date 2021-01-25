<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullInventoryStock.
 */
class PullInventoryStock
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\InventorySearchCriteriaType
     */
    private $searchCriteria = null;

    /**
     * Gets as searchCriteria.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\InventorySearchCriteriaType
     */
    public function getSearchCriteria()
    {
        return $this->searchCriteria;
    }

    /**
     * Sets a new searchCriteria.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\InventorySearchCriteriaType $searchCriteria
     *
     * @return self
     */
    public function setSearchCriteria(BaseApi\InventorySearchCriteriaType $searchCriteria)
    {
        $this->searchCriteria = $searchCriteria;

        return $this;
    }
}

<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullDeals.
 */
class PullDeals
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DealSearchCriteriaType
     */
    private $searchCriteria = null;

    /**
     * Gets as searchCriteria.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DealSearchCriteriaType
     */
    public function getSearchCriteria()
    {
        return $this->searchCriteria;
    }

    /**
     * Sets a new searchCriteria.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DealSearchCriteriaType $searchCriteria
     *
     * @return self
     */
    public function setSearchCriteria(BaseApi\DealSearchCriteriaType $searchCriteria)
    {
        $this->searchCriteria = $searchCriteria;

        return $this;
    }
}

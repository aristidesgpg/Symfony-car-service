<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullPartsOrders
 */
class PullPartsOrders
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PartsOrderSearchCriteriaType $searchCriteria
     */
    private $searchCriteria = null;

    /**
     * Gets as searchCriteria
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PartsOrderSearchCriteriaType
     */
    public function getSearchCriteria()
    {
        return $this->searchCriteria;
    }

    /**
     * Sets a new searchCriteria
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsOrderSearchCriteriaType $searchCriteria
     * @return self
     */
    public function setSearchCriteria(\App\Soap\dealerbuilt\src\BaseApi\PartsOrderSearchCriteriaType $searchCriteria)
    {
        $this->searchCriteria = $searchCriteria;
        return $this;
    }


}


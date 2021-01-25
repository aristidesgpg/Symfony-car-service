<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullArchivedCustomers
 */
class PullArchivedCustomers
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerSearchCriteriaType $searchCriteria
     */
    private $searchCriteria = null;

    /**
     * Gets as searchCriteria
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerSearchCriteriaType
     */
    public function getSearchCriteria()
    {
        return $this->searchCriteria;
    }

    /**
     * Sets a new searchCriteria
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerSearchCriteriaType $searchCriteria
     * @return self
     */
    public function setSearchCriteria(\App\Soap\dealerbuilt\src\BaseApi\CustomerSearchCriteriaType $searchCriteria)
    {
        $this->searchCriteria = $searchCriteria;
        return $this;
    }


}


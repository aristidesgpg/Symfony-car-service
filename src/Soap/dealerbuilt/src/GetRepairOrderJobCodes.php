<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetRepairOrderJobCodes
 */
class GetRepairOrderJobCodes
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationItemSearchCriteriaType $searchCriteria
     */
    private $searchCriteria = null;

    /**
     * Gets as searchCriteria
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationItemSearchCriteriaType
     */
    public function getSearchCriteria()
    {
        return $this->searchCriteria;
    }

    /**
     * Sets a new searchCriteria
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationItemSearchCriteriaType $searchCriteria
     * @return self
     */
    public function setSearchCriteria(\App\Soap\dealerbuilt\src\BaseApi\ServiceLocationItemSearchCriteriaType $searchCriteria)
    {
        $this->searchCriteria = $searchCriteria;
        return $this;
    }


}


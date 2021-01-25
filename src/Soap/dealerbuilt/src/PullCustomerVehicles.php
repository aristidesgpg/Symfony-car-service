<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullCustomerVehicles
 */
class PullCustomerVehicles
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleSearchCriteriaType $searchCriteria
     */
    private $searchCriteria = null;

    /**
     * Gets as searchCriteria
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleSearchCriteriaType
     */
    public function getSearchCriteria()
    {
        return $this->searchCriteria;
    }

    /**
     * Sets a new searchCriteria
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleSearchCriteriaType $searchCriteria
     * @return self
     */
    public function setSearchCriteria(\App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleSearchCriteriaType $searchCriteria)
    {
        $this->searchCriteria = $searchCriteria;
        return $this;
    }


}


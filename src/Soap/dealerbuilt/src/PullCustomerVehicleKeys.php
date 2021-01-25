<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullCustomerVehicleKeys.
 */
class PullCustomerVehicleKeys
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleSearchCriteriaType
     */
    private $searchCriteria = null;

    /**
     * Gets as searchCriteria.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleSearchCriteriaType
     */
    public function getSearchCriteria()
    {
        return $this->searchCriteria;
    }

    /**
     * Sets a new searchCriteria.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleSearchCriteriaType $searchCriteria
     *
     * @return self
     */
    public function setSearchCriteria(BaseApi\CustomerVehicleSearchCriteriaType $searchCriteria)
    {
        $this->searchCriteria = $searchCriteria;

        return $this;
    }
}

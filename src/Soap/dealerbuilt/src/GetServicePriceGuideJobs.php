<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetServicePriceGuideJobs.
 */
class GetServicePriceGuideJobs
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceVehicleSearchCriteriaType
     */
    private $searchCriteria = null;

    /**
     * Gets as searchCriteria.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceVehicleSearchCriteriaType
     */
    public function getSearchCriteria()
    {
        return $this->searchCriteria;
    }

    /**
     * Sets a new searchCriteria.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceVehicleSearchCriteriaType $searchCriteria
     *
     * @return self
     */
    public function setSearchCriteria(BaseApi\ServiceVehicleSearchCriteriaType $searchCriteria)
    {
        $this->searchCriteria = $searchCriteria;

        return $this;
    }
}

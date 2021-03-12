<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullEstimates
 */
class PullEstimates
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\EstimateSearchCriteriaType $apiSearchCriteria
     */
    private $apiSearchCriteria = null;

    /**
     * Gets as apiSearchCriteria
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\EstimateSearchCriteriaType
     */
    public function getApiSearchCriteria()
    {
        return $this->apiSearchCriteria;
    }

    /**
     * Sets a new apiSearchCriteria
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\EstimateSearchCriteriaType $apiSearchCriteria
     * @return self
     */
    public function setApiSearchCriteria(\App\Soap\dealerbuilt\src\BaseApi\EstimateSearchCriteriaType $apiSearchCriteria)
    {
        $this->apiSearchCriteria = $apiSearchCriteria;
        return $this;
    }


}


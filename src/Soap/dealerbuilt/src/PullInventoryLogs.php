<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullInventoryLogs
 */
class PullInventoryLogs
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ApiLogSearchCriteriaType $apiSearchCriteria
     */
    private $apiSearchCriteria = null;

    /**
     * Gets as apiSearchCriteria
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ApiLogSearchCriteriaType
     */
    public function getApiSearchCriteria()
    {
        return $this->apiSearchCriteria;
    }

    /**
     * Sets a new apiSearchCriteria
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ApiLogSearchCriteriaType $apiSearchCriteria
     * @return self
     */
    public function setApiSearchCriteria(\App\Soap\dealerbuilt\src\BaseApi\ApiLogSearchCriteriaType $apiSearchCriteria)
    {
        $this->apiSearchCriteria = $apiSearchCriteria;
        return $this;
    }


}


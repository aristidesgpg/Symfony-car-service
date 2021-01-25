<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullChecks.
 */
class PullChecks
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CheckSearchCriteriaType
     */
    private $apiSearchCriteria = null;

    /**
     * Gets as apiSearchCriteria.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CheckSearchCriteriaType
     */
    public function getApiSearchCriteria()
    {
        return $this->apiSearchCriteria;
    }

    /**
     * Sets a new apiSearchCriteria.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CheckSearchCriteriaType $apiSearchCriteria
     *
     * @return self
     */
    public function setApiSearchCriteria(BaseApi\CheckSearchCriteriaType $apiSearchCriteria)
    {
        $this->apiSearchCriteria = $apiSearchCriteria;

        return $this;
    }
}

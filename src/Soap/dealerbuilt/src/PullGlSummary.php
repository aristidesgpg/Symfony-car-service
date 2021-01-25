<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullGlSummary
 */
class PullGlSummary
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\GlSummarySearchCriteriaType $searchCriteria
     */
    private $searchCriteria = null;

    /**
     * Gets as searchCriteria
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\GlSummarySearchCriteriaType
     */
    public function getSearchCriteria()
    {
        return $this->searchCriteria;
    }

    /**
     * Sets a new searchCriteria
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\GlSummarySearchCriteriaType $searchCriteria
     * @return self
     */
    public function setSearchCriteria(\App\Soap\dealerbuilt\src\BaseApi\GlSummarySearchCriteriaType $searchCriteria)
    {
        $this->searchCriteria = $searchCriteria;
        return $this;
    }


}


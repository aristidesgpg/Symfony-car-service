<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullChart
 */
class PullChart
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ChartSearchCriteriaType $searchCriteria
     */
    private $searchCriteria = null;

    /**
     * Gets as searchCriteria
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ChartSearchCriteriaType
     */
    public function getSearchCriteria()
    {
        return $this->searchCriteria;
    }

    /**
     * Sets a new searchCriteria
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ChartSearchCriteriaType $searchCriteria
     * @return self
     */
    public function setSearchCriteria(\App\Soap\dealerbuilt\src\BaseApi\ChartSearchCriteriaType $searchCriteria)
    {
        $this->searchCriteria = $searchCriteria;
        return $this;
    }


}


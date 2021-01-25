<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullGlDetail
 */
class PullGlDetail
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\GlDetailSearchCriteriaType $searchCriteria
     */
    private $searchCriteria = null;

    /**
     * Gets as searchCriteria
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\GlDetailSearchCriteriaType
     */
    public function getSearchCriteria()
    {
        return $this->searchCriteria;
    }

    /**
     * Sets a new searchCriteria
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\GlDetailSearchCriteriaType $searchCriteria
     * @return self
     */
    public function setSearchCriteria(\App\Soap\dealerbuilt\src\BaseApi\GlDetailSearchCriteriaType $searchCriteria)
    {
        $this->searchCriteria = $searchCriteria;
        return $this;
    }


}


<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetTechnicians.
 */
class GetTechnicians
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServicePersonSearchCriteriaType
     */
    private $searchCriteria = null;

    /**
     * Gets as searchCriteria.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServicePersonSearchCriteriaType
     */
    public function getSearchCriteria()
    {
        return $this->searchCriteria;
    }

    /**
     * Sets a new searchCriteria.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServicePersonSearchCriteriaType $searchCriteria
     *
     * @return self
     */
    public function setSearchCriteria(BaseApi\ServicePersonSearchCriteriaType $searchCriteria)
    {
        $this->searchCriteria = $searchCriteria;

        return $this;
    }
}

<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetDeferredJobCodes.
 */
class GetDeferredJobCodes
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationItemSearchCriteriaType
     */
    private $searchCriteria = null;

    /**
     * Gets as searchCriteria.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationItemSearchCriteriaType
     */
    public function getSearchCriteria()
    {
        return $this->searchCriteria;
    }

    /**
     * Sets a new searchCriteria.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationItemSearchCriteriaType $searchCriteria
     *
     * @return self
     */
    public function setSearchCriteria(BaseApi\ServiceLocationItemSearchCriteriaType $searchCriteria)
    {
        $this->searchCriteria = $searchCriteria;

        return $this;
    }
}

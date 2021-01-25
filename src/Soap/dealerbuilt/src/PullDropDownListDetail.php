<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullDropDownListDetail.
 */
class PullDropDownListDetail
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DropdownListSearchCriteriaType
     */
    private $apiSearchCriteria = null;

    /**
     * Gets as apiSearchCriteria.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DropdownListSearchCriteriaType
     */
    public function getApiSearchCriteria()
    {
        return $this->apiSearchCriteria;
    }

    /**
     * Sets a new apiSearchCriteria.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DropdownListSearchCriteriaType $apiSearchCriteria
     *
     * @return self
     */
    public function setApiSearchCriteria(BaseApi\DropdownListSearchCriteriaType $apiSearchCriteria)
    {
        $this->apiSearchCriteria = $apiSearchCriteria;

        return $this;
    }
}

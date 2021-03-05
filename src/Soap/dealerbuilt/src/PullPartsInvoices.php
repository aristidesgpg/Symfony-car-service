<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullPartsInvoices
 */
class PullPartsInvoices
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PartsInvoiceSearchCriteriaType $searchCriteria
     */
    private $searchCriteria = null;

    /**
     * Gets as searchCriteria
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PartsInvoiceSearchCriteriaType
     */
    public function getSearchCriteria()
    {
        return $this->searchCriteria;
    }

    /**
     * Sets a new searchCriteria
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsInvoiceSearchCriteriaType $searchCriteria
     * @return self
     */
    public function setSearchCriteria(\App\Soap\dealerbuilt\src\BaseApi\PartsInvoiceSearchCriteriaType $searchCriteria)
    {
        $this->searchCriteria = $searchCriteria;
        return $this;
    }


}


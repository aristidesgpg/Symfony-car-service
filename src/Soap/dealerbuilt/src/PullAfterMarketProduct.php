<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullAfterMarketProduct.
 */
class PullAfterMarketProduct
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\AfterMarketProductsSearchCriteriaType
     */
    private $searchCriteria = null;

    /**
     * Gets as searchCriteria.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\AfterMarketProductsSearchCriteriaType
     */
    public function getSearchCriteria()
    {
        return $this->searchCriteria;
    }

    /**
     * Sets a new searchCriteria.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\AfterMarketProductsSearchCriteriaType $searchCriteria
     *
     * @return self
     */
    public function setSearchCriteria(BaseApi\AfterMarketProductsSearchCriteriaType $searchCriteria)
    {
        $this->searchCriteria = $searchCriteria;

        return $this;
    }
}

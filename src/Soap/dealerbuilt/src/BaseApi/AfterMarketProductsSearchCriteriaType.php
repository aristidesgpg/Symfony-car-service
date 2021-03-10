<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing AfterMarketProductsSearchCriteriaType
 *
 * 
 * XSD Type: AfterMarketProductsSearchCriteria
 */
class AfterMarketProductsSearchCriteriaType extends StoreSearchCriteriaType
{

    /**
     * @var string $exactVin
     */
    private $exactVin = null;

    /**
     * Gets as exactVin
     *
     * @return string
     */
    public function getExactVin()
    {
        return $this->exactVin;
    }

    /**
     * Sets a new exactVin
     *
     * @param string $exactVin
     * @return self
     */
    public function setExactVin($exactVin)
    {
        $this->exactVin = $exactVin;
        return $this;
    }


}


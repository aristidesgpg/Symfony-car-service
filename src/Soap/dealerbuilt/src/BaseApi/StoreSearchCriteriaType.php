<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing StoreSearchCriteriaType
 *
 * 
 * XSD Type: StoreSearchCriteria
 */
class StoreSearchCriteriaType extends SearchCriteriaType
{

    /**
     * @var int $storeId
     */
    private $storeId = null;

    /**
     * Gets as storeId
     *
     * @return int
     */
    public function getStoreId()
    {
        return $this->storeId;
    }

    /**
     * Sets a new storeId
     *
     * @param int $storeId
     * @return self
     */
    public function setStoreId($storeId)
    {
        $this->storeId = $storeId;
        return $this;
    }


}


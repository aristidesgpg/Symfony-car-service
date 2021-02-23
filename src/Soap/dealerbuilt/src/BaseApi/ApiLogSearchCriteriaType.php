<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ApiLogSearchCriteriaType
 *
 * 
 * XSD Type: ApiLogSearchCriteria
 */
class ApiLogSearchCriteriaType extends SearchCriteriaType
{

    /**
     * @var string $inventoryKey
     */
    private $inventoryKey = null;

    /**
     * Gets as inventoryKey
     *
     * @return string
     */
    public function getInventoryKey()
    {
        return $this->inventoryKey;
    }

    /**
     * Sets a new inventoryKey
     *
     * @param string $inventoryKey
     * @return self
     */
    public function setInventoryKey($inventoryKey)
    {
        $this->inventoryKey = $inventoryKey;
        return $this;
    }


}


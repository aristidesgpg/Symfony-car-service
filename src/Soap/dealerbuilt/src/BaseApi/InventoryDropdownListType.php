<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing InventoryDropdownListType
 *
 * 
 * XSD Type: InventoryDropdownList
 */
class InventoryDropdownListType extends ApiStoreItemType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Stock\InventoryDropdownListResponseType $inventoryDropdownListResponse
     */
    private $inventoryDropdownListResponse = null;

    /**
     * Gets as inventoryDropdownListResponse
     *
     * @return \App\Soap\dealerbuilt\src\Models\Stock\InventoryDropdownListResponseType
     */
    public function getInventoryDropdownListResponse()
    {
        return $this->inventoryDropdownListResponse;
    }

    /**
     * Sets a new inventoryDropdownListResponse
     *
     * @param \App\Soap\dealerbuilt\src\Models\Stock\InventoryDropdownListResponseType $inventoryDropdownListResponse
     * @return self
     */
    public function setInventoryDropdownListResponse(\App\Soap\dealerbuilt\src\Models\Stock\InventoryDropdownListResponseType $inventoryDropdownListResponse)
    {
        $this->inventoryDropdownListResponse = $inventoryDropdownListResponse;
        return $this;
    }


}


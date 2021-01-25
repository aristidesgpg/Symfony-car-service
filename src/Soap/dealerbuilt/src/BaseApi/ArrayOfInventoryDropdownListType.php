<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfInventoryDropdownListType
 *
 * 
 * XSD Type: ArrayOfInventoryDropdownList
 */
class ArrayOfInventoryDropdownListType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\InventoryDropdownListType[] $inventoryDropdownList
     */
    private $inventoryDropdownList = [
        
    ];

    /**
     * Adds as inventoryDropdownList
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\InventoryDropdownListType $inventoryDropdownList
     */
    public function addToInventoryDropdownList(\App\Soap\dealerbuilt\src\BaseApi\InventoryDropdownListType $inventoryDropdownList)
    {
        $this->inventoryDropdownList[] = $inventoryDropdownList;
        return $this;
    }

    /**
     * isset inventoryDropdownList
     *
     * @param int|string $index
     * @return bool
     */
    public function issetInventoryDropdownList($index)
    {
        return isset($this->inventoryDropdownList[$index]);
    }

    /**
     * unset inventoryDropdownList
     *
     * @param int|string $index
     * @return void
     */
    public function unsetInventoryDropdownList($index)
    {
        unset($this->inventoryDropdownList[$index]);
    }

    /**
     * Gets as inventoryDropdownList
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\InventoryDropdownListType[]
     */
    public function getInventoryDropdownList()
    {
        return $this->inventoryDropdownList;
    }

    /**
     * Sets a new inventoryDropdownList
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\InventoryDropdownListType[] $inventoryDropdownList
     * @return self
     */
    public function setInventoryDropdownList(array $inventoryDropdownList)
    {
        $this->inventoryDropdownList = $inventoryDropdownList;
        return $this;
    }


}


<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfInventoryPartType
 *
 * 
 * XSD Type: ArrayOfInventoryPart
 */
class ArrayOfInventoryPartType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\InventoryPartType[] $inventoryPart
     */
    private $inventoryPart = [
        
    ];

    /**
     * Adds as inventoryPart
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\InventoryPartType $inventoryPart
     */
    public function addToInventoryPart(\App\Soap\dealerbuilt\src\BaseApi\InventoryPartType $inventoryPart)
    {
        $this->inventoryPart[] = $inventoryPart;
        return $this;
    }

    /**
     * isset inventoryPart
     *
     * @param int|string $index
     * @return bool
     */
    public function issetInventoryPart($index)
    {
        return isset($this->inventoryPart[$index]);
    }

    /**
     * unset inventoryPart
     *
     * @param int|string $index
     * @return void
     */
    public function unsetInventoryPart($index)
    {
        unset($this->inventoryPart[$index]);
    }

    /**
     * Gets as inventoryPart
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\InventoryPartType[]
     */
    public function getInventoryPart()
    {
        return $this->inventoryPart;
    }

    /**
     * Sets a new inventoryPart
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\InventoryPartType[] $inventoryPart
     * @return self
     */
    public function setInventoryPart(array $inventoryPart)
    {
        $this->inventoryPart = $inventoryPart;
        return $this;
    }


}


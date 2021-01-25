<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushInventory.
 */
class PushInventory
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\StockItemPushRequestType[]
     */
    private $inventoryItems = null;

    /**
     * Adds as stockItemPushRequest.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StockItemPushRequestType $stockItemPushRequest
     */
    public function addToInventoryItems(BaseApi\StockItemPushRequestType $stockItemPushRequest)
    {
        $this->inventoryItems[] = $stockItemPushRequest;

        return $this;
    }

    /**
     * isset inventoryItems.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetInventoryItems($index)
    {
        return isset($this->inventoryItems[$index]);
    }

    /**
     * unset inventoryItems.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetInventoryItems($index)
    {
        unset($this->inventoryItems[$index]);
    }

    /**
     * Gets as inventoryItems.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\StockItemPushRequestType[]
     */
    public function getInventoryItems()
    {
        return $this->inventoryItems;
    }

    /**
     * Sets a new inventoryItems.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StockItemPushRequestType[] $inventoryItems
     *
     * @return self
     */
    public function setInventoryItems(array $inventoryItems)
    {
        $this->inventoryItems = $inventoryItems;

        return $this;
    }
}

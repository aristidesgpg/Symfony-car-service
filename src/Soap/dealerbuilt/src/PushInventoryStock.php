<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushInventoryStock.
 */
class PushInventoryStock
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\StockItemPushRequestV2Type[]
     */
    private $inventoryItems = null;

    /**
     * Adds as stockItemPushRequestV2.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StockItemPushRequestV2Type $stockItemPushRequestV2
     */
    public function addToInventoryItems(BaseApi\StockItemPushRequestV2Type $stockItemPushRequestV2)
    {
        $this->inventoryItems[] = $stockItemPushRequestV2;

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
     * @return \App\Soap\dealerbuilt\src\BaseApi\StockItemPushRequestV2Type[]
     */
    public function getInventoryItems()
    {
        return $this->inventoryItems;
    }

    /**
     * Sets a new inventoryItems.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StockItemPushRequestV2Type[] $inventoryItems
     *
     * @return self
     */
    public function setInventoryItems(array $inventoryItems)
    {
        $this->inventoryItems = $inventoryItems;

        return $this;
    }
}

<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushSalesPrice.
 */
class PushSalesPrice
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\SalesPricePushRequestType[]
     */
    private $inventoryItems = null;

    /**
     * Adds as salesPricePushRequest.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\SalesPricePushRequestType $salesPricePushRequest
     */
    public function addToInventoryItems(BaseApi\SalesPricePushRequestType $salesPricePushRequest)
    {
        $this->inventoryItems[] = $salesPricePushRequest;

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
     * @return \App\Soap\dealerbuilt\src\BaseApi\SalesPricePushRequestType[]
     */
    public function getInventoryItems()
    {
        return $this->inventoryItems;
    }

    /**
     * Sets a new inventoryItems.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\SalesPricePushRequestType[] $inventoryItems
     *
     * @return self
     */
    public function setInventoryItems(array $inventoryItems)
    {
        $this->inventoryItems = $inventoryItems;

        return $this;
    }
}

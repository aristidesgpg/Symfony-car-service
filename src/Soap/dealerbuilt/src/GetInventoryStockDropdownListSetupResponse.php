<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetInventoryStockDropdownListSetupResponse.
 */
class GetInventoryStockDropdownListSetupResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\InventoryDropdownListType[]
     */
    private $getInventoryStockDropdownListSetupResult = null;

    /**
     * Adds as inventoryDropdownList.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\InventoryDropdownListType $inventoryDropdownList
     */
    public function addToGetInventoryStockDropdownListSetupResult(BaseApi\InventoryDropdownListType $inventoryDropdownList)
    {
        $this->getInventoryStockDropdownListSetupResult[] = $inventoryDropdownList;

        return $this;
    }

    /**
     * isset getInventoryStockDropdownListSetupResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetGetInventoryStockDropdownListSetupResult($index)
    {
        return isset($this->getInventoryStockDropdownListSetupResult[$index]);
    }

    /**
     * unset getInventoryStockDropdownListSetupResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetGetInventoryStockDropdownListSetupResult($index)
    {
        unset($this->getInventoryStockDropdownListSetupResult[$index]);
    }

    /**
     * Gets as getInventoryStockDropdownListSetupResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\InventoryDropdownListType[]
     */
    public function getGetInventoryStockDropdownListSetupResult()
    {
        return $this->getInventoryStockDropdownListSetupResult;
    }

    /**
     * Sets a new getInventoryStockDropdownListSetupResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\InventoryDropdownListType[] $getInventoryStockDropdownListSetupResult
     *
     * @return self
     */
    public function setGetInventoryStockDropdownListSetupResult(array $getInventoryStockDropdownListSetupResult)
    {
        $this->getInventoryStockDropdownListSetupResult = $getInventoryStockDropdownListSetupResult;

        return $this;
    }
}

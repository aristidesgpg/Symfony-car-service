<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullInventoryItemsByKeyResponse
 */
class PullInventoryItemsByKeyResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\StockItemType[] $pullInventoryItemsByKeyResult
     */
    private $pullInventoryItemsByKeyResult = null;

    /**
     * Adds as stockItem
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\StockItemType $stockItem
     */
    public function addToPullInventoryItemsByKeyResult(\App\Soap\dealerbuilt\src\BaseApi\StockItemType $stockItem)
    {
        $this->pullInventoryItemsByKeyResult[] = $stockItem;
        return $this;
    }

    /**
     * isset pullInventoryItemsByKeyResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullInventoryItemsByKeyResult($index)
    {
        return isset($this->pullInventoryItemsByKeyResult[$index]);
    }

    /**
     * unset pullInventoryItemsByKeyResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullInventoryItemsByKeyResult($index)
    {
        unset($this->pullInventoryItemsByKeyResult[$index]);
    }

    /**
     * Gets as pullInventoryItemsByKeyResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\StockItemType[]
     */
    public function getPullInventoryItemsByKeyResult()
    {
        return $this->pullInventoryItemsByKeyResult;
    }

    /**
     * Sets a new pullInventoryItemsByKeyResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StockItemType[] $pullInventoryItemsByKeyResult
     * @return self
     */
    public function setPullInventoryItemsByKeyResult(array $pullInventoryItemsByKeyResult)
    {
        $this->pullInventoryItemsByKeyResult = $pullInventoryItemsByKeyResult;
        return $this;
    }


}


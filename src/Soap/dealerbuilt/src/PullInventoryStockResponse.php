<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullInventoryStockResponse.
 */
class PullInventoryStockResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\StockItemType[]
     */
    private $pullInventoryStockResult = null;

    /**
     * Adds as stockItem.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StockItemType $stockItem
     */
    public function addToPullInventoryStockResult(BaseApi\StockItemType $stockItem)
    {
        $this->pullInventoryStockResult[] = $stockItem;

        return $this;
    }

    /**
     * isset pullInventoryStockResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPullInventoryStockResult($index)
    {
        return isset($this->pullInventoryStockResult[$index]);
    }

    /**
     * unset pullInventoryStockResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPullInventoryStockResult($index)
    {
        unset($this->pullInventoryStockResult[$index]);
    }

    /**
     * Gets as pullInventoryStockResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\StockItemType[]
     */
    public function getPullInventoryStockResult()
    {
        return $this->pullInventoryStockResult;
    }

    /**
     * Sets a new pullInventoryStockResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StockItemType[] $pullInventoryStockResult
     *
     * @return self
     */
    public function setPullInventoryStockResult(array $pullInventoryStockResult)
    {
        $this->pullInventoryStockResult = $pullInventoryStockResult;

        return $this;
    }
}

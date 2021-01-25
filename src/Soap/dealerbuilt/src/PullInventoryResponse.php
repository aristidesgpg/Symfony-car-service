<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullInventoryResponse
 */
class PullInventoryResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\StockItemType[] $pullInventoryResult
     */
    private $pullInventoryResult = null;

    /**
     * Adds as stockItem
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\StockItemType $stockItem
     */
    public function addToPullInventoryResult(\App\Soap\dealerbuilt\src\BaseApi\StockItemType $stockItem)
    {
        $this->pullInventoryResult[] = $stockItem;
        return $this;
    }

    /**
     * isset pullInventoryResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullInventoryResult($index)
    {
        return isset($this->pullInventoryResult[$index]);
    }

    /**
     * unset pullInventoryResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullInventoryResult($index)
    {
        unset($this->pullInventoryResult[$index]);
    }

    /**
     * Gets as pullInventoryResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\StockItemType[]
     */
    public function getPullInventoryResult()
    {
        return $this->pullInventoryResult;
    }

    /**
     * Sets a new pullInventoryResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StockItemType[] $pullInventoryResult
     * @return self
     */
    public function setPullInventoryResult(array $pullInventoryResult)
    {
        $this->pullInventoryResult = $pullInventoryResult;
        return $this;
    }


}


<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullInventoryByVinResponse
 */
class PullInventoryByVinResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\StockItemType[] $pullInventoryByVinResult
     */
    private $pullInventoryByVinResult = null;

    /**
     * Adds as stockItem
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\StockItemType $stockItem
     */
    public function addToPullInventoryByVinResult(\App\Soap\dealerbuilt\src\BaseApi\StockItemType $stockItem)
    {
        $this->pullInventoryByVinResult[] = $stockItem;
        return $this;
    }

    /**
     * isset pullInventoryByVinResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullInventoryByVinResult($index)
    {
        return isset($this->pullInventoryByVinResult[$index]);
    }

    /**
     * unset pullInventoryByVinResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullInventoryByVinResult($index)
    {
        unset($this->pullInventoryByVinResult[$index]);
    }

    /**
     * Gets as pullInventoryByVinResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\StockItemType[]
     */
    public function getPullInventoryByVinResult()
    {
        return $this->pullInventoryByVinResult;
    }

    /**
     * Sets a new pullInventoryByVinResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StockItemType[] $pullInventoryByVinResult
     * @return self
     */
    public function setPullInventoryByVinResult(array $pullInventoryByVinResult)
    {
        $this->pullInventoryByVinResult = $pullInventoryByVinResult;
        return $this;
    }


}


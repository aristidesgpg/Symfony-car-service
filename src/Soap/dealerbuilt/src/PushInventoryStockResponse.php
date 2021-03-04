<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushInventoryStockResponse
 */
class PushInventoryStockResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\StockItemPushResponseType[] $pushInventoryStockResult
     */
    private $pushInventoryStockResult = null;

    /**
     * Adds as stockItemPushResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\StockItemPushResponseType $stockItemPushResponse
     */
    public function addToPushInventoryStockResult(\App\Soap\dealerbuilt\src\BaseApi\StockItemPushResponseType $stockItemPushResponse)
    {
        $this->pushInventoryStockResult[] = $stockItemPushResponse;
        return $this;
    }

    /**
     * isset pushInventoryStockResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPushInventoryStockResult($index)
    {
        return isset($this->pushInventoryStockResult[$index]);
    }

    /**
     * unset pushInventoryStockResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPushInventoryStockResult($index)
    {
        unset($this->pushInventoryStockResult[$index]);
    }

    /**
     * Gets as pushInventoryStockResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\StockItemPushResponseType[]
     */
    public function getPushInventoryStockResult()
    {
        return $this->pushInventoryStockResult;
    }

    /**
     * Sets a new pushInventoryStockResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StockItemPushResponseType[] $pushInventoryStockResult
     * @return self
     */
    public function setPushInventoryStockResult(array $pushInventoryStockResult)
    {
        $this->pushInventoryStockResult = $pushInventoryStockResult;
        return $this;
    }


}


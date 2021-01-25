<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushSalesPriceResponse
 */
class PushSalesPriceResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\StockItemPushResponseType[] $pushSalesPriceResult
     */
    private $pushSalesPriceResult = null;

    /**
     * Adds as stockItemPushResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\StockItemPushResponseType $stockItemPushResponse
     */
    public function addToPushSalesPriceResult(\App\Soap\dealerbuilt\src\BaseApi\StockItemPushResponseType $stockItemPushResponse)
    {
        $this->pushSalesPriceResult[] = $stockItemPushResponse;
        return $this;
    }

    /**
     * isset pushSalesPriceResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPushSalesPriceResult($index)
    {
        return isset($this->pushSalesPriceResult[$index]);
    }

    /**
     * unset pushSalesPriceResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPushSalesPriceResult($index)
    {
        unset($this->pushSalesPriceResult[$index]);
    }

    /**
     * Gets as pushSalesPriceResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\StockItemPushResponseType[]
     */
    public function getPushSalesPriceResult()
    {
        return $this->pushSalesPriceResult;
    }

    /**
     * Sets a new pushSalesPriceResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StockItemPushResponseType[] $pushSalesPriceResult
     * @return self
     */
    public function setPushSalesPriceResult(array $pushSalesPriceResult)
    {
        $this->pushSalesPriceResult = $pushSalesPriceResult;
        return $this;
    }


}


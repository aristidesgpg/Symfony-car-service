<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushInventoryResponse.
 */
class PushInventoryResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\StockItemPushResponseType[]
     */
    private $pushInventoryResult = null;

    /**
     * Adds as stockItemPushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StockItemPushResponseType $stockItemPushResponse
     */
    public function addToPushInventoryResult(BaseApi\StockItemPushResponseType $stockItemPushResponse)
    {
        $this->pushInventoryResult[] = $stockItemPushResponse;

        return $this;
    }

    /**
     * isset pushInventoryResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPushInventoryResult($index)
    {
        return isset($this->pushInventoryResult[$index]);
    }

    /**
     * unset pushInventoryResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPushInventoryResult($index)
    {
        unset($this->pushInventoryResult[$index]);
    }

    /**
     * Gets as pushInventoryResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\StockItemPushResponseType[]
     */
    public function getPushInventoryResult()
    {
        return $this->pushInventoryResult;
    }

    /**
     * Sets a new pushInventoryResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StockItemPushResponseType[] $pushInventoryResult
     *
     * @return self
     */
    public function setPushInventoryResult(array $pushInventoryResult)
    {
        $this->pushInventoryResult = $pushInventoryResult;

        return $this;
    }
}

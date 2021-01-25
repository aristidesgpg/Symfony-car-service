<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfTradeInPushRequestType.
 *
 * XSD Type: ArrayOfTradeInPushRequest
 */
class ArrayOfTradeInPushRequestType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\TradeInPushRequestType[]
     */
    private $tradeInPushRequest = [
    ];

    /**
     * Adds as tradeInPushRequest.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\TradeInPushRequestType $tradeInPushRequest
     */
    public function addToTradeInPushRequest(TradeInPushRequestType $tradeInPushRequest)
    {
        $this->tradeInPushRequest[] = $tradeInPushRequest;

        return $this;
    }

    /**
     * isset tradeInPushRequest.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetTradeInPushRequest($index)
    {
        return isset($this->tradeInPushRequest[$index]);
    }

    /**
     * unset tradeInPushRequest.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetTradeInPushRequest($index)
    {
        unset($this->tradeInPushRequest[$index]);
    }

    /**
     * Gets as tradeInPushRequest.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\TradeInPushRequestType[]
     */
    public function getTradeInPushRequest()
    {
        return $this->tradeInPushRequest;
    }

    /**
     * Sets a new tradeInPushRequest.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\TradeInPushRequestType[] $tradeInPushRequest
     *
     * @return self
     */
    public function setTradeInPushRequest(array $tradeInPushRequest)
    {
        $this->tradeInPushRequest = $tradeInPushRequest;

        return $this;
    }
}

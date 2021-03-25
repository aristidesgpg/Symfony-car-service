<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfTradeInType
 *
 * 
 * XSD Type: ArrayOfTradeIn
 */
class ArrayOfTradeInType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\TradeInType[] $tradeIn
     */
    private $tradeIn = [
        
    ];

    /**
     * Adds as tradeIn
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\TradeInType $tradeIn
     */
    public function addToTradeIn(\App\Soap\dealerbuilt\src\BaseApi\TradeInType $tradeIn)
    {
        $this->tradeIn[] = $tradeIn;
        return $this;
    }

    /**
     * isset tradeIn
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTradeIn($index)
    {
        return isset($this->tradeIn[$index]);
    }

    /**
     * unset tradeIn
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTradeIn($index)
    {
        unset($this->tradeIn[$index]);
    }

    /**
     * Gets as tradeIn
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\TradeInType[]
     */
    public function getTradeIn()
    {
        return $this->tradeIn;
    }

    /**
     * Sets a new tradeIn
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\TradeInType[] $tradeIn
     * @return self
     */
    public function setTradeIn(array $tradeIn)
    {
        $this->tradeIn = $tradeIn;
        return $this;
    }


}


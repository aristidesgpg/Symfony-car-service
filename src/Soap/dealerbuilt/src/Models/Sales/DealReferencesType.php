<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing DealReferencesType
 *
 * 
 * XSD Type: DealReferences
 */
class DealReferencesType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\TradeInType[] $tradeIns
     */
    private $tradeIns = null;

    /**
     * Adds as tradeIn
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Sales\TradeInType $tradeIn
     */
    public function addToTradeIns(\App\Soap\dealerbuilt\src\Models\Sales\TradeInType $tradeIn)
    {
        $this->tradeIns[] = $tradeIn;
        return $this;
    }

    /**
     * isset tradeIns
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTradeIns($index)
    {
        return isset($this->tradeIns[$index]);
    }

    /**
     * unset tradeIns
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTradeIns($index)
    {
        unset($this->tradeIns[$index]);
    }

    /**
     * Gets as tradeIns
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\TradeInType[]
     */
    public function getTradeIns()
    {
        return $this->tradeIns;
    }

    /**
     * Sets a new tradeIns
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\TradeInType[] $tradeIns
     * @return self
     */
    public function setTradeIns(array $tradeIns)
    {
        $this->tradeIns = $tradeIns;
        return $this;
    }


}


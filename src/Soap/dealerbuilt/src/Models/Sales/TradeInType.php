<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing TradeInType
 *
 * 
 * XSD Type: TradeIn
 */
class TradeInType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\TradeInAttributesType $attributes
     */
    private $attributes = null;

    /**
     * @var int $tradeInSequence
     */
    private $tradeInSequence = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Stock\StockItemType $vehicle
     */
    private $vehicle = null;

    /**
     * Gets as attributes
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\TradeInAttributesType
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Sets a new attributes
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\TradeInAttributesType $attributes
     * @return self
     */
    public function setAttributes(\App\Soap\dealerbuilt\src\Models\Sales\TradeInAttributesType $attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * Gets as tradeInSequence
     *
     * @return int
     */
    public function getTradeInSequence()
    {
        return $this->tradeInSequence;
    }

    /**
     * Sets a new tradeInSequence
     *
     * @param int $tradeInSequence
     * @return self
     */
    public function setTradeInSequence($tradeInSequence)
    {
        $this->tradeInSequence = $tradeInSequence;
        return $this;
    }

    /**
     * Gets as vehicle
     *
     * @return \App\Soap\dealerbuilt\src\Models\Stock\StockItemType
     */
    public function getVehicle()
    {
        return $this->vehicle;
    }

    /**
     * Sets a new vehicle
     *
     * @param \App\Soap\dealerbuilt\src\Models\Stock\StockItemType $vehicle
     * @return self
     */
    public function setVehicle(\App\Soap\dealerbuilt\src\Models\Stock\StockItemType $vehicle)
    {
        $this->vehicle = $vehicle;
        return $this;
    }


}


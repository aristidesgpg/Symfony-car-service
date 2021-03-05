<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing TradeInPushRequestType
 *
 * 
 * XSD Type: TradeInPushRequest
 */
class TradeInPushRequestType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\TradeInAttributesType $attributes
     */
    private $attributes = null;

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


}


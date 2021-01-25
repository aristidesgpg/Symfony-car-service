<?php

namespace App\Soap\dealerbuilt\src\Models;

/**
 * Class representing MonetaryValueType
 *
 * 
 * XSD Type: MonetaryValue
 */
class MonetaryValueType
{

    /**
     * @var float $amount
     */
    private $amount = null;

    /**
     * @var string $currency
     */
    private $currency = null;

    /**
     * Gets as amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Sets a new amount
     *
     * @param float $amount
     * @return self
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Gets as currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Sets a new currency
     *
     * @param string $currency
     * @return self
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }


}


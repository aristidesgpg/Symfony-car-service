<?php

namespace App\Soap\automate\src;

/**
 * Class representing Price
 */
class Price
{

    /**
     * @var \App\Soap\automate\src\ChargeAmount $chargeAmount
     */
    private $chargeAmount = null;

    /**
     * @var string $priceDescription
     */
    private $priceDescription = null;

    /**
     * Gets as chargeAmount
     *
     * @return \App\Soap\automate\src\ChargeAmount
     */
    public function getChargeAmount()
    {
        return $this->chargeAmount;
    }

    /**
     * Sets a new chargeAmount
     *
     * @param \App\Soap\automate\src\ChargeAmount $chargeAmount
     * @return self
     */
    public function setChargeAmount(\App\Soap\automate\src\ChargeAmount $chargeAmount)
    {
        $this->chargeAmount = $chargeAmount;
        return $this;
    }

    /**
     * Gets as priceDescription
     *
     * @return string
     */
    public function getPriceDescription()
    {
        return $this->priceDescription;
    }

    /**
     * Sets a new priceDescription
     *
     * @param string $priceDescription
     * @return self
     */
    public function setPriceDescription($priceDescription)
    {
        $this->priceDescription = $priceDescription;
        return $this;
    }


}


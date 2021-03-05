<?php

namespace App\Soap\automate\src;

/**
 * Class representing Pricing
 */
class Pricing
{

    /**
     * @var string $priceSourceCode
     */
    private $priceSourceCode = null;

    /**
     * @var \App\Soap\automate\src\Price[] $price
     */
    private $price = [
        
    ];

    /**
     * Gets as priceSourceCode
     *
     * @return string
     */
    public function getPriceSourceCode()
    {
        return $this->priceSourceCode;
    }

    /**
     * Sets a new priceSourceCode
     *
     * @param string $priceSourceCode
     * @return self
     */
    public function setPriceSourceCode($priceSourceCode)
    {
        $this->priceSourceCode = $priceSourceCode;
        return $this;
    }

    /**
     * Adds as price
     *
     * @return self
     * @param \App\Soap\automate\src\Price $price
     */
    public function addToPrice(\App\Soap\automate\src\Price $price)
    {
        $this->price[] = $price;
        return $this;
    }

    /**
     * isset price
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPrice($index)
    {
        return isset($this->price[$index]);
    }

    /**
     * unset price
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPrice($index)
    {
        unset($this->price[$index]);
    }

    /**
     * Gets as price
     *
     * @return \App\Soap\automate\src\Price[]
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets a new price
     *
     * @param \App\Soap\automate\src\Price[] $price
     * @return self
     */
    public function setPrice(array $price)
    {
        $this->price = $price;
        return $this;
    }


}


<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing DealerTaxType
 *
 * 
 * XSD Type: DealerTax
 */
class DealerTaxType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $amount
     */
    private $amount = null;

    /**
     * @var string $description
     */
    private $description = null;

    /**
     * @var bool $isAddedToMonthlyUseTax
     */
    private $isAddedToMonthlyUseTax = null;

    /**
     * @var bool $isCapitalized
     */
    private $isCapitalized = null;

    /**
     * @var bool $isPaidUpFront
     */
    private $isPaidUpFront = null;

    /**
     * @var float $rate
     */
    private $rate = null;

    /**
     * @var string $taxType
     */
    private $taxType = null;

    /**
     * Gets as amount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Sets a new amount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $amount
     * @return self
     */
    public function setAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Gets as description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets a new description
     *
     * @param string $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Gets as isAddedToMonthlyUseTax
     *
     * @return bool
     */
    public function getIsAddedToMonthlyUseTax()
    {
        return $this->isAddedToMonthlyUseTax;
    }

    /**
     * Sets a new isAddedToMonthlyUseTax
     *
     * @param bool $isAddedToMonthlyUseTax
     * @return self
     */
    public function setIsAddedToMonthlyUseTax($isAddedToMonthlyUseTax)
    {
        $this->isAddedToMonthlyUseTax = $isAddedToMonthlyUseTax;
        return $this;
    }

    /**
     * Gets as isCapitalized
     *
     * @return bool
     */
    public function getIsCapitalized()
    {
        return $this->isCapitalized;
    }

    /**
     * Sets a new isCapitalized
     *
     * @param bool $isCapitalized
     * @return self
     */
    public function setIsCapitalized($isCapitalized)
    {
        $this->isCapitalized = $isCapitalized;
        return $this;
    }

    /**
     * Gets as isPaidUpFront
     *
     * @return bool
     */
    public function getIsPaidUpFront()
    {
        return $this->isPaidUpFront;
    }

    /**
     * Sets a new isPaidUpFront
     *
     * @param bool $isPaidUpFront
     * @return self
     */
    public function setIsPaidUpFront($isPaidUpFront)
    {
        $this->isPaidUpFront = $isPaidUpFront;
        return $this;
    }

    /**
     * Gets as rate
     *
     * @return float
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Sets a new rate
     *
     * @param float $rate
     * @return self
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
        return $this;
    }

    /**
     * Gets as taxType
     *
     * @return string
     */
    public function getTaxType()
    {
        return $this->taxType;
    }

    /**
     * Sets a new taxType
     *
     * @param string $taxType
     * @return self
     */
    public function setTaxType($taxType)
    {
        $this->taxType = $taxType;
        return $this;
    }


}


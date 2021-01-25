<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing PotentialServiceComponentType.
 *
 * XSD Type: PotentialServiceComponent
 */
class PotentialServiceComponentType
{
    /**
     * @var string
     */
    private $controlNumber = null;

    /**
     * @var bool
     */
    private $isDiscount = null;

    /**
     * @var float
     */
    private $percent = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $price = null;

    /**
     * @var string
     */
    private $serviceCode = null;

    /**
     * @var string
     */
    private $serviceCodeDescription = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $tax = null;

    /**
     * @var bool
     */
    private $taxable = null;

    /**
     * Gets as controlNumber.
     *
     * @return string
     */
    public function getControlNumber()
    {
        return $this->controlNumber;
    }

    /**
     * Sets a new controlNumber.
     *
     * @param string $controlNumber
     *
     * @return self
     */
    public function setControlNumber($controlNumber)
    {
        $this->controlNumber = $controlNumber;

        return $this;
    }

    /**
     * Gets as isDiscount.
     *
     * @return bool
     */
    public function getIsDiscount()
    {
        return $this->isDiscount;
    }

    /**
     * Sets a new isDiscount.
     *
     * @param bool $isDiscount
     *
     * @return self
     */
    public function setIsDiscount($isDiscount)
    {
        $this->isDiscount = $isDiscount;

        return $this;
    }

    /**
     * Gets as percent.
     *
     * @return float
     */
    public function getPercent()
    {
        return $this->percent;
    }

    /**
     * Sets a new percent.
     *
     * @param float $percent
     *
     * @return self
     */
    public function setPercent($percent)
    {
        $this->percent = $percent;

        return $this;
    }

    /**
     * Gets as price.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets a new price.
     *
     * @return self
     */
    public function setPrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Gets as serviceCode.
     *
     * @return string
     */
    public function getServiceCode()
    {
        return $this->serviceCode;
    }

    /**
     * Sets a new serviceCode.
     *
     * @param string $serviceCode
     *
     * @return self
     */
    public function setServiceCode($serviceCode)
    {
        $this->serviceCode = $serviceCode;

        return $this;
    }

    /**
     * Gets as serviceCodeDescription.
     *
     * @return string
     */
    public function getServiceCodeDescription()
    {
        return $this->serviceCodeDescription;
    }

    /**
     * Sets a new serviceCodeDescription.
     *
     * @param string $serviceCodeDescription
     *
     * @return self
     */
    public function setServiceCodeDescription($serviceCodeDescription)
    {
        $this->serviceCodeDescription = $serviceCodeDescription;

        return $this;
    }

    /**
     * Gets as tax.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Sets a new tax.
     *
     * @return self
     */
    public function setTax(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $tax)
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     * Gets as taxable.
     *
     * @return bool
     */
    public function getTaxable()
    {
        return $this->taxable;
    }

    /**
     * Sets a new taxable.
     *
     * @param bool $taxable
     *
     * @return self
     */
    public function setTaxable($taxable)
    {
        $this->taxable = $taxable;

        return $this;
    }
}

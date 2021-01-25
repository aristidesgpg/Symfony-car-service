<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing LeaseTaxCollectionType.
 *
 * XSD Type: LeaseTaxCollection
 */
class LeaseTaxCollectionType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\DealerTaxType[]
     */
    private $dealerTaxes = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $monthlyUse = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $property = null;

    /**
     * Adds as dealerTax.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\DealerTaxType $dealerTax
     */
    public function addToDealerTaxes(DealerTaxType $dealerTax)
    {
        $this->dealerTaxes[] = $dealerTax;

        return $this;
    }

    /**
     * isset dealerTaxes.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetDealerTaxes($index)
    {
        return isset($this->dealerTaxes[$index]);
    }

    /**
     * unset dealerTaxes.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetDealerTaxes($index)
    {
        unset($this->dealerTaxes[$index]);
    }

    /**
     * Gets as dealerTaxes.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\DealerTaxType[]
     */
    public function getDealerTaxes()
    {
        return $this->dealerTaxes;
    }

    /**
     * Sets a new dealerTaxes.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\DealerTaxType[] $dealerTaxes
     *
     * @return self
     */
    public function setDealerTaxes(array $dealerTaxes)
    {
        $this->dealerTaxes = $dealerTaxes;

        return $this;
    }

    /**
     * Gets as monthlyUse.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getMonthlyUse()
    {
        return $this->monthlyUse;
    }

    /**
     * Sets a new monthlyUse.
     *
     * @return self
     */
    public function setMonthlyUse(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $monthlyUse)
    {
        $this->monthlyUse = $monthlyUse;

        return $this;
    }

    /**
     * Gets as property.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * Sets a new property.
     *
     * @return self
     */
    public function setProperty(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $property)
    {
        $this->property = $property;

        return $this;
    }
}

<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing ArrayOfDealerTaxType.
 *
 * XSD Type: ArrayOfDealerTax
 */
class ArrayOfDealerTaxType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\DealerTaxType[]
     */
    private $dealerTax = [
    ];

    /**
     * Adds as dealerTax.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\DealerTaxType $dealerTax
     */
    public function addToDealerTax(DealerTaxType $dealerTax)
    {
        $this->dealerTax[] = $dealerTax;

        return $this;
    }

    /**
     * isset dealerTax.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetDealerTax($index)
    {
        return isset($this->dealerTax[$index]);
    }

    /**
     * unset dealerTax.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetDealerTax($index)
    {
        unset($this->dealerTax[$index]);
    }

    /**
     * Gets as dealerTax.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\DealerTaxType[]
     */
    public function getDealerTax()
    {
        return $this->dealerTax;
    }

    /**
     * Sets a new dealerTax.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\DealerTaxType[] $dealerTax
     *
     * @return self
     */
    public function setDealerTax(array $dealerTax)
    {
        $this->dealerTax = $dealerTax;

        return $this;
    }
}

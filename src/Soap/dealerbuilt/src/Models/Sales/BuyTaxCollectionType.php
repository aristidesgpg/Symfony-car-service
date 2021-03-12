<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing BuyTaxCollectionType
 *
 * 
 * XSD Type: BuyTaxCollection
 */
class BuyTaxCollectionType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\DealerTaxType[] $dealerTaxes
     */
    private $dealerTaxes = null;

    /**
     * Adds as dealerTax
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Sales\DealerTaxType $dealerTax
     */
    public function addToDealerTaxes(\App\Soap\dealerbuilt\src\Models\Sales\DealerTaxType $dealerTax)
    {
        $this->dealerTaxes[] = $dealerTax;
        return $this;
    }

    /**
     * isset dealerTaxes
     *
     * @param int|string $index
     * @return bool
     */
    public function issetDealerTaxes($index)
    {
        return isset($this->dealerTaxes[$index]);
    }

    /**
     * unset dealerTaxes
     *
     * @param int|string $index
     * @return void
     */
    public function unsetDealerTaxes($index)
    {
        unset($this->dealerTaxes[$index]);
    }

    /**
     * Gets as dealerTaxes
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\DealerTaxType[]
     */
    public function getDealerTaxes()
    {
        return $this->dealerTaxes;
    }

    /**
     * Sets a new dealerTaxes
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\DealerTaxType[] $dealerTaxes
     * @return self
     */
    public function setDealerTaxes(array $dealerTaxes)
    {
        $this->dealerTaxes = $dealerTaxes;
        return $this;
    }


}


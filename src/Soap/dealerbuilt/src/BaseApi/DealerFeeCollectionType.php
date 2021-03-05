<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing DealerFeeCollectionType
 *
 * 
 * XSD Type: DealerFeeCollection
 */
class DealerFeeCollectionType extends ApiStoreItemType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\DealerFeeType[] $dealerFees
     */
    private $dealerFees = null;

    /**
     * Adds as dealerFee
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Sales\DealerFeeType $dealerFee
     */
    public function addToDealerFees(\App\Soap\dealerbuilt\src\Models\Sales\DealerFeeType $dealerFee)
    {
        $this->dealerFees[] = $dealerFee;
        return $this;
    }

    /**
     * isset dealerFees
     *
     * @param int|string $index
     * @return bool
     */
    public function issetDealerFees($index)
    {
        return isset($this->dealerFees[$index]);
    }

    /**
     * unset dealerFees
     *
     * @param int|string $index
     * @return void
     */
    public function unsetDealerFees($index)
    {
        unset($this->dealerFees[$index]);
    }

    /**
     * Gets as dealerFees
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\DealerFeeType[]
     */
    public function getDealerFees()
    {
        return $this->dealerFees;
    }

    /**
     * Sets a new dealerFees
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\DealerFeeType[] $dealerFees
     * @return self
     */
    public function setDealerFees(array $dealerFees)
    {
        $this->dealerFees = $dealerFees;
        return $this;
    }


}


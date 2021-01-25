<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing ArrayOfDealerFeeType.
 *
 * XSD Type: ArrayOfDealerFee
 */
class ArrayOfDealerFeeType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\DealerFeeType[]
     */
    private $dealerFee = [
    ];

    /**
     * Adds as dealerFee.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\DealerFeeType $dealerFee
     */
    public function addToDealerFee(DealerFeeType $dealerFee)
    {
        $this->dealerFee[] = $dealerFee;

        return $this;
    }

    /**
     * isset dealerFee.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetDealerFee($index)
    {
        return isset($this->dealerFee[$index]);
    }

    /**
     * unset dealerFee.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetDealerFee($index)
    {
        unset($this->dealerFee[$index]);
    }

    /**
     * Gets as dealerFee.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\DealerFeeType[]
     */
    public function getDealerFee()
    {
        return $this->dealerFee;
    }

    /**
     * Sets a new dealerFee.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\DealerFeeType[] $dealerFee
     *
     * @return self
     */
    public function setDealerFee(array $dealerFee)
    {
        $this->dealerFee = $dealerFee;

        return $this;
    }
}

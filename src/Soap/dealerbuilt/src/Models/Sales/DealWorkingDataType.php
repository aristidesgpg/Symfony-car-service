<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing DealWorkingDataType.
 *
 * XSD Type: DealWorkingData
 */
class DealWorkingDataType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $gapPremium = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $totalTradeAcv = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $totalTradePayoff = null;

    /**
     * Gets as gapPremium.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getGapPremium()
    {
        return $this->gapPremium;
    }

    /**
     * Sets a new gapPremium.
     *
     * @return self
     */
    public function setGapPremium(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $gapPremium)
    {
        $this->gapPremium = $gapPremium;

        return $this;
    }

    /**
     * Gets as totalTradeAcv.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTotalTradeAcv()
    {
        return $this->totalTradeAcv;
    }

    /**
     * Sets a new totalTradeAcv.
     *
     * @return self
     */
    public function setTotalTradeAcv(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalTradeAcv)
    {
        $this->totalTradeAcv = $totalTradeAcv;

        return $this;
    }

    /**
     * Gets as totalTradePayoff.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTotalTradePayoff()
    {
        return $this->totalTradePayoff;
    }

    /**
     * Sets a new totalTradePayoff.
     *
     * @return self
     */
    public function setTotalTradePayoff(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalTradePayoff)
    {
        $this->totalTradePayoff = $totalTradePayoff;

        return $this;
    }
}

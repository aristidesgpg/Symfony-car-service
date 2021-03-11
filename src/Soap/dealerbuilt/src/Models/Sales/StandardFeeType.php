<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing StandardFeeType
 *
 * 
 * XSD Type: StandardFee
 */
class StandardFeeType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $fee
     */
    private $fee = null;

    /**
     * Gets as fee
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * Sets a new fee
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $fee
     * @return self
     */
    public function setFee(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $fee)
    {
        $this->fee = $fee;
        return $this;
    }


}


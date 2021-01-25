<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing LeaseLicensingFeeType.
 *
 * XSD Type: LeaseLicensingFee
 */
class LeaseLicensingFeeType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $fee = null;

    /**
     * @var string
     */
    private $feeType = null;

    /**
     * Gets as fee.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * Sets a new fee.
     *
     * @return self
     */
    public function setFee(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $fee)
    {
        $this->fee = $fee;

        return $this;
    }

    /**
     * Gets as feeType.
     *
     * @return string
     */
    public function getFeeType()
    {
        return $this->feeType;
    }

    /**
     * Sets a new feeType.
     *
     * @param string $feeType
     *
     * @return self
     */
    public function setFeeType($feeType)
    {
        $this->feeType = $feeType;

        return $this;
    }
}

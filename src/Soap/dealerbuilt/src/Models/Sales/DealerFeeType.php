<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing DealerFeeType
 *
 * 
 * XSD Type: DealerFee
 */
class DealerFeeType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $feeAmount
     */
    private $feeAmount = null;

    /**
     * @var string $feeDescription
     */
    private $feeDescription = null;

    /**
     * @var string $feeHandlingType
     */
    private $feeHandlingType = null;

    /**
     * @var string $feeType
     */
    private $feeType = null;

    /**
     * Gets as feeAmount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getFeeAmount()
    {
        return $this->feeAmount;
    }

    /**
     * Sets a new feeAmount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $feeAmount
     * @return self
     */
    public function setFeeAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $feeAmount)
    {
        $this->feeAmount = $feeAmount;
        return $this;
    }

    /**
     * Gets as feeDescription
     *
     * @return string
     */
    public function getFeeDescription()
    {
        return $this->feeDescription;
    }

    /**
     * Sets a new feeDescription
     *
     * @param string $feeDescription
     * @return self
     */
    public function setFeeDescription($feeDescription)
    {
        $this->feeDescription = $feeDescription;
        return $this;
    }

    /**
     * Gets as feeHandlingType
     *
     * @return string
     */
    public function getFeeHandlingType()
    {
        return $this->feeHandlingType;
    }

    /**
     * Sets a new feeHandlingType
     *
     * @param string $feeHandlingType
     * @return self
     */
    public function setFeeHandlingType($feeHandlingType)
    {
        $this->feeHandlingType = $feeHandlingType;
        return $this;
    }

    /**
     * Gets as feeType
     *
     * @return string
     */
    public function getFeeType()
    {
        return $this->feeType;
    }

    /**
     * Sets a new feeType
     *
     * @param string $feeType
     * @return self
     */
    public function setFeeType($feeType)
    {
        $this->feeType = $feeType;
        return $this;
    }


}


<?php

namespace App\Soap\dealerbuilt\src\Models\Accounting;

/**
 * Class representing PayTypeStatusType.
 *
 * XSD Type: PayTypeStatus
 */
class PayTypeStatusType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $balanceDue = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $originalAmount = null;

    /**
     * @var string
     */
    private $payType = null;

    /**
     * Gets as balanceDue.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getBalanceDue()
    {
        return $this->balanceDue;
    }

    /**
     * Sets a new balanceDue.
     *
     * @return self
     */
    public function setBalanceDue(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $balanceDue)
    {
        $this->balanceDue = $balanceDue;

        return $this;
    }

    /**
     * Gets as originalAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getOriginalAmount()
    {
        return $this->originalAmount;
    }

    /**
     * Sets a new originalAmount.
     *
     * @return self
     */
    public function setOriginalAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $originalAmount)
    {
        $this->originalAmount = $originalAmount;

        return $this;
    }

    /**
     * Gets as payType.
     *
     * @return string
     */
    public function getPayType()
    {
        return $this->payType;
    }

    /**
     * Sets a new payType.
     *
     * @param string $payType
     *
     * @return self
     */
    public function setPayType($payType)
    {
        $this->payType = $payType;

        return $this;
    }
}

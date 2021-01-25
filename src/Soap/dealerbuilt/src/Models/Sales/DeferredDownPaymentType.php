<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing DeferredDownPaymentType.
 *
 * XSD Type: DeferredDownPayment
 */
class DeferredDownPaymentType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $amount = null;

    /**
     * @var \DateTime
     */
    private $paymentDate = null;

    /**
     * Gets as amount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Sets a new amount.
     *
     * @return self
     */
    public function setAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Gets as paymentDate.
     *
     * @return \DateTime
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * Sets a new paymentDate.
     *
     * @return self
     */
    public function setPaymentDate(\DateTime $paymentDate)
    {
        $this->paymentDate = $paymentDate;

        return $this;
    }
}

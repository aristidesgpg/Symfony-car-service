<?php

namespace App\Soap\dealerbuilt\src\Models\Accounting;

/**
 * Class representing ArrayOfPaymentType
 *
 * 
 * XSD Type: ArrayOfPayment
 */
class ArrayOfPaymentType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Accounting\PaymentType[] $payment
     */
    private $payment = [
        
    ];

    /**
     * Adds as payment
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Accounting\PaymentType $payment
     */
    public function addToPayment(\App\Soap\dealerbuilt\src\Models\Accounting\PaymentType $payment)
    {
        $this->payment[] = $payment;
        return $this;
    }

    /**
     * isset payment
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPayment($index)
    {
        return isset($this->payment[$index]);
    }

    /**
     * unset payment
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPayment($index)
    {
        unset($this->payment[$index]);
    }

    /**
     * Gets as payment
     *
     * @return \App\Soap\dealerbuilt\src\Models\Accounting\PaymentType[]
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * Sets a new payment
     *
     * @param \App\Soap\dealerbuilt\src\Models\Accounting\PaymentType[] $payment
     * @return self
     */
    public function setPayment(array $payment)
    {
        $this->payment = $payment;
        return $this;
    }


}


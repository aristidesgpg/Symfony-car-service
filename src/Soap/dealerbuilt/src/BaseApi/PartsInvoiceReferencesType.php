<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PartsInvoiceReferencesType
 *
 * 
 * XSD Type: PartsInvoiceReferences
 */
class PartsInvoiceReferencesType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PaymentType[] $payments
     */
    private $payments = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerType $soldToCustomer
     */
    private $soldToCustomer = null;

    /**
     * Adds as payment
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\PaymentType $payment
     */
    public function addToPayments(\App\Soap\dealerbuilt\src\BaseApi\PaymentType $payment)
    {
        $this->payments[] = $payment;
        return $this;
    }

    /**
     * isset payments
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPayments($index)
    {
        return isset($this->payments[$index]);
    }

    /**
     * unset payments
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPayments($index)
    {
        unset($this->payments[$index]);
    }

    /**
     * Gets as payments
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PaymentType[]
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * Sets a new payments
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PaymentType[] $payments
     * @return self
     */
    public function setPayments(array $payments)
    {
        $this->payments = $payments;
        return $this;
    }

    /**
     * Gets as soldToCustomer
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerType
     */
    public function getSoldToCustomer()
    {
        return $this->soldToCustomer;
    }

    /**
     * Sets a new soldToCustomer
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerType $soldToCustomer
     * @return self
     */
    public function setSoldToCustomer(\App\Soap\dealerbuilt\src\BaseApi\CustomerType $soldToCustomer)
    {
        $this->soldToCustomer = $soldToCustomer;
        return $this;
    }


}


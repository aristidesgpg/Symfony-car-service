<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfPaymentStatusType
 *
 * 
 * XSD Type: ArrayOfPaymentStatus
 */
class ArrayOfPaymentStatusType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PaymentStatusType[] $paymentStatus
     */
    private $paymentStatus = [
        
    ];

    /**
     * Adds as paymentStatus
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\PaymentStatusType $paymentStatus
     */
    public function addToPaymentStatus(\App\Soap\dealerbuilt\src\BaseApi\PaymentStatusType $paymentStatus)
    {
        $this->paymentStatus[] = $paymentStatus;
        return $this;
    }

    /**
     * isset paymentStatus
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPaymentStatus($index)
    {
        return isset($this->paymentStatus[$index]);
    }

    /**
     * unset paymentStatus
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPaymentStatus($index)
    {
        unset($this->paymentStatus[$index]);
    }

    /**
     * Gets as paymentStatus
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PaymentStatusType[]
     */
    public function getPaymentStatus()
    {
        return $this->paymentStatus;
    }

    /**
     * Sets a new paymentStatus
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PaymentStatusType[] $paymentStatus
     * @return self
     */
    public function setPaymentStatus(array $paymentStatus)
    {
        $this->paymentStatus = $paymentStatus;
        return $this;
    }


}


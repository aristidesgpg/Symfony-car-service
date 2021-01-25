<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing RepairOrderReferencesType.
 *
 * XSD Type: RepairOrderReferences
 */
class RepairOrderReferencesType
{
    /**
     * @var string
     */
    private $appointmentKey = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PaymentType[]
     */
    private $payments = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerType
     */
    private $rOCustomer = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType
     */
    private $rOVehicle = null;

    /**
     * Gets as appointmentKey.
     *
     * @return string
     */
    public function getAppointmentKey()
    {
        return $this->appointmentKey;
    }

    /**
     * Sets a new appointmentKey.
     *
     * @param string $appointmentKey
     *
     * @return self
     */
    public function setAppointmentKey($appointmentKey)
    {
        $this->appointmentKey = $appointmentKey;

        return $this;
    }

    /**
     * Adds as payment.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PaymentType $payment
     */
    public function addToPayments(PaymentType $payment)
    {
        $this->payments[] = $payment;

        return $this;
    }

    /**
     * isset payments.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPayments($index)
    {
        return isset($this->payments[$index]);
    }

    /**
     * unset payments.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPayments($index)
    {
        unset($this->payments[$index]);
    }

    /**
     * Gets as payments.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PaymentType[]
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * Sets a new payments.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PaymentType[] $payments
     *
     * @return self
     */
    public function setPayments(array $payments)
    {
        $this->payments = $payments;

        return $this;
    }

    /**
     * Gets as rOCustomer.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerType
     */
    public function getROCustomer()
    {
        return $this->rOCustomer;
    }

    /**
     * Sets a new rOCustomer.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerType $rOCustomer
     *
     * @return self
     */
    public function setROCustomer(CustomerType $rOCustomer)
    {
        $this->rOCustomer = $rOCustomer;

        return $this;
    }

    /**
     * Gets as rOVehicle.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType
     */
    public function getROVehicle()
    {
        return $this->rOVehicle;
    }

    /**
     * Sets a new rOVehicle.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType $rOVehicle
     *
     * @return self
     */
    public function setROVehicle(CustomerVehicleType $rOVehicle)
    {
        $this->rOVehicle = $rOVehicle;

        return $this;
    }
}

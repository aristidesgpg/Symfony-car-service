<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing RepairOrderReferencesType
 *
 * 
 * XSD Type: RepairOrderReferences
 */
class RepairOrderReferencesType
{

    /**
     * @var int $appointmentId
     */
    private $appointmentId = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Accounting\PaymentType[] $payments
     */
    private $payments = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Customers\CustomerType $rOCustomer
     */
    private $rOCustomer = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Vehicles\CustomerVehicleType $rOVehicle
     */
    private $rOVehicle = null;

    /**
     * Gets as appointmentId
     *
     * @return int
     */
    public function getAppointmentId()
    {
        return $this->appointmentId;
    }

    /**
     * Sets a new appointmentId
     *
     * @param int $appointmentId
     * @return self
     */
    public function setAppointmentId($appointmentId)
    {
        $this->appointmentId = $appointmentId;
        return $this;
    }

    /**
     * Adds as payment
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Accounting\PaymentType $payment
     */
    public function addToPayments(\App\Soap\dealerbuilt\src\Models\Accounting\PaymentType $payment)
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
     * @return \App\Soap\dealerbuilt\src\Models\Accounting\PaymentType[]
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * Sets a new payments
     *
     * @param \App\Soap\dealerbuilt\src\Models\Accounting\PaymentType[] $payments
     * @return self
     */
    public function setPayments(array $payments)
    {
        $this->payments = $payments;
        return $this;
    }

    /**
     * Gets as rOCustomer
     *
     * @return \App\Soap\dealerbuilt\src\Models\Customers\CustomerType
     */
    public function getROCustomer()
    {
        return $this->rOCustomer;
    }

    /**
     * Sets a new rOCustomer
     *
     * @param \App\Soap\dealerbuilt\src\Models\Customers\CustomerType $rOCustomer
     * @return self
     */
    public function setROCustomer(\App\Soap\dealerbuilt\src\Models\Customers\CustomerType $rOCustomer)
    {
        $this->rOCustomer = $rOCustomer;
        return $this;
    }

    /**
     * Gets as rOVehicle
     *
     * @return \App\Soap\dealerbuilt\src\Models\Vehicles\CustomerVehicleType
     */
    public function getROVehicle()
    {
        return $this->rOVehicle;
    }

    /**
     * Sets a new rOVehicle
     *
     * @param \App\Soap\dealerbuilt\src\Models\Vehicles\CustomerVehicleType $rOVehicle
     * @return self
     */
    public function setROVehicle(\App\Soap\dealerbuilt\src\Models\Vehicles\CustomerVehicleType $rOVehicle)
    {
        $this->rOVehicle = $rOVehicle;
        return $this;
    }


}


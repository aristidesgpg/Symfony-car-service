<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing AppointmentReferencesType.
 *
 * XSD Type: AppointmentReferences
 */
class AppointmentReferencesType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerType
     */
    private $appointmentCustomer = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType
     */
    private $appointmentVehicle = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\RepairOrderType
     */
    private $rO = null;

    /**
     * Gets as appointmentCustomer.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerType
     */
    public function getAppointmentCustomer()
    {
        return $this->appointmentCustomer;
    }

    /**
     * Sets a new appointmentCustomer.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerType $appointmentCustomer
     *
     * @return self
     */
    public function setAppointmentCustomer(CustomerType $appointmentCustomer)
    {
        $this->appointmentCustomer = $appointmentCustomer;

        return $this;
    }

    /**
     * Gets as appointmentVehicle.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType
     */
    public function getAppointmentVehicle()
    {
        return $this->appointmentVehicle;
    }

    /**
     * Sets a new appointmentVehicle.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType $appointmentVehicle
     *
     * @return self
     */
    public function setAppointmentVehicle(CustomerVehicleType $appointmentVehicle)
    {
        $this->appointmentVehicle = $appointmentVehicle;

        return $this;
    }

    /**
     * Gets as rO.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\RepairOrderType
     */
    public function getRO()
    {
        return $this->rO;
    }

    /**
     * Sets a new rO.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderType $rO
     *
     * @return self
     */
    public function setRO(RepairOrderType $rO)
    {
        $this->rO = $rO;

        return $this;
    }
}

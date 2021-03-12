<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushAppointments
 */
class PushAppointments
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\AppointmentPushRequestType[] $appointment
     */
    private $appointment = null;

    /**
     * Adds as appointmentPushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\AppointmentPushRequestType $appointmentPushRequest
     */
    public function addToAppointment(\App\Soap\dealerbuilt\src\BaseApi\AppointmentPushRequestType $appointmentPushRequest)
    {
        $this->appointment[] = $appointmentPushRequest;
        return $this;
    }

    /**
     * isset appointment
     *
     * @param int|string $index
     * @return bool
     */
    public function issetAppointment($index)
    {
        return isset($this->appointment[$index]);
    }

    /**
     * unset appointment
     *
     * @param int|string $index
     * @return void
     */
    public function unsetAppointment($index)
    {
        unset($this->appointment[$index]);
    }

    /**
     * Gets as appointment
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\AppointmentPushRequestType[]
     */
    public function getAppointment()
    {
        return $this->appointment;
    }

    /**
     * Sets a new appointment
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\AppointmentPushRequestType[] $appointment
     * @return self
     */
    public function setAppointment(array $appointment)
    {
        $this->appointment = $appointment;
        return $this;
    }


}


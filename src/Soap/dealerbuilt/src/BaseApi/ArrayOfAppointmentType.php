<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfAppointmentType
 *
 * 
 * XSD Type: ArrayOfAppointment
 */
class ArrayOfAppointmentType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\AppointmentType[] $appointment
     */
    private $appointment = [
        
    ];

    /**
     * Adds as appointment
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\AppointmentType $appointment
     */
    public function addToAppointment(\App\Soap\dealerbuilt\src\BaseApi\AppointmentType $appointment)
    {
        $this->appointment[] = $appointment;
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
     * @return \App\Soap\dealerbuilt\src\BaseApi\AppointmentType[]
     */
    public function getAppointment()
    {
        return $this->appointment;
    }

    /**
     * Sets a new appointment
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\AppointmentType[] $appointment
     * @return self
     */
    public function setAppointment(array $appointment)
    {
        $this->appointment = $appointment;
        return $this;
    }


}


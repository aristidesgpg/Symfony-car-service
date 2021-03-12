<?php

namespace App\Soap\dealerbuilt\src\Models\Appointments;

/**
 * Class representing ArrayOfAppointmentStatusType
 *
 * 
 * XSD Type: ArrayOfAppointmentStatus
 */
class ArrayOfAppointmentStatusType
{

    /**
     * @var string[] $appointmentStatus
     */
    private $appointmentStatus = [
        
    ];

    /**
     * Adds as appointmentStatus
     *
     * @return self
     * @param string $appointmentStatus
     */
    public function addToAppointmentStatus($appointmentStatus)
    {
        $this->appointmentStatus[] = $appointmentStatus;
        return $this;
    }

    /**
     * isset appointmentStatus
     *
     * @param int|string $index
     * @return bool
     */
    public function issetAppointmentStatus($index)
    {
        return isset($this->appointmentStatus[$index]);
    }

    /**
     * unset appointmentStatus
     *
     * @param int|string $index
     * @return void
     */
    public function unsetAppointmentStatus($index)
    {
        unset($this->appointmentStatus[$index]);
    }

    /**
     * Gets as appointmentStatus
     *
     * @return string[]
     */
    public function getAppointmentStatus()
    {
        return $this->appointmentStatus;
    }

    /**
     * Sets a new appointmentStatus
     *
     * @param string $appointmentStatus
     * @return self
     */
    public function setAppointmentStatus(array $appointmentStatus)
    {
        $this->appointmentStatus = $appointmentStatus;
        return $this;
    }


}


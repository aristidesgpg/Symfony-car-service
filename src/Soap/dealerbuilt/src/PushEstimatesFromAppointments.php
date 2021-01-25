<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushEstimatesFromAppointments
 */
class PushEstimatesFromAppointments
{

    /**
     * @var string[] $appointmentKeys
     */
    private $appointmentKeys = null;

    /**
     * Adds as string
     *
     * @return self
     * @param string $string
     */
    public function addToAppointmentKeys($string)
    {
        $this->appointmentKeys[] = $string;
        return $this;
    }

    /**
     * isset appointmentKeys
     *
     * @param int|string $index
     * @return bool
     */
    public function issetAppointmentKeys($index)
    {
        return isset($this->appointmentKeys[$index]);
    }

    /**
     * unset appointmentKeys
     *
     * @param int|string $index
     * @return void
     */
    public function unsetAppointmentKeys($index)
    {
        unset($this->appointmentKeys[$index]);
    }

    /**
     * Gets as appointmentKeys
     *
     * @return string[]
     */
    public function getAppointmentKeys()
    {
        return $this->appointmentKeys;
    }

    /**
     * Sets a new appointmentKeys
     *
     * @param string[] $appointmentKeys
     * @return self
     */
    public function setAppointmentKeys(array $appointmentKeys)
    {
        $this->appointmentKeys = $appointmentKeys;
        return $this;
    }


}


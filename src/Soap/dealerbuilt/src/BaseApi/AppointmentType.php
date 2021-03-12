<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing AppointmentType
 *
 * 
 * XSD Type: Appointment
 */
class AppointmentType extends ApiServiceLocationItemType
{

    /**
     * @var string $appointmentKey
     */
    private $appointmentKey = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Appointments\AppointmentAttributesType $attributes
     */
    private $attributes = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\AppointmentReferencesType $references
     */
    private $references = null;

    /**
     * Gets as appointmentKey
     *
     * @return string
     */
    public function getAppointmentKey()
    {
        return $this->appointmentKey;
    }

    /**
     * Sets a new appointmentKey
     *
     * @param string $appointmentKey
     * @return self
     */
    public function setAppointmentKey($appointmentKey)
    {
        $this->appointmentKey = $appointmentKey;
        return $this;
    }

    /**
     * Gets as attributes
     *
     * @return \App\Soap\dealerbuilt\src\Models\Appointments\AppointmentAttributesType
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Sets a new attributes
     *
     * @param \App\Soap\dealerbuilt\src\Models\Appointments\AppointmentAttributesType $attributes
     * @return self
     */
    public function setAttributes(\App\Soap\dealerbuilt\src\Models\Appointments\AppointmentAttributesType $attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * Gets as references
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\AppointmentReferencesType
     */
    public function getReferences()
    {
        return $this->references;
    }

    /**
     * Sets a new references
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\AppointmentReferencesType $references
     * @return self
     */
    public function setReferences(\App\Soap\dealerbuilt\src\BaseApi\AppointmentReferencesType $references)
    {
        $this->references = $references;
        return $this;
    }


}


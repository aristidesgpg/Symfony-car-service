<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfAppointmentPushRequestType.
 *
 * XSD Type: ArrayOfAppointmentPushRequest
 */
class ArrayOfAppointmentPushRequestType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\AppointmentPushRequestType[]
     */
    private $appointmentPushRequest = [
    ];

    /**
     * Adds as appointmentPushRequest.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\AppointmentPushRequestType $appointmentPushRequest
     */
    public function addToAppointmentPushRequest(AppointmentPushRequestType $appointmentPushRequest)
    {
        $this->appointmentPushRequest[] = $appointmentPushRequest;

        return $this;
    }

    /**
     * isset appointmentPushRequest.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetAppointmentPushRequest($index)
    {
        return isset($this->appointmentPushRequest[$index]);
    }

    /**
     * unset appointmentPushRequest.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetAppointmentPushRequest($index)
    {
        unset($this->appointmentPushRequest[$index]);
    }

    /**
     * Gets as appointmentPushRequest.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\AppointmentPushRequestType[]
     */
    public function getAppointmentPushRequest()
    {
        return $this->appointmentPushRequest;
    }

    /**
     * Sets a new appointmentPushRequest.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\AppointmentPushRequestType[] $appointmentPushRequest
     *
     * @return self
     */
    public function setAppointmentPushRequest(array $appointmentPushRequest)
    {
        $this->appointmentPushRequest = $appointmentPushRequest;

        return $this;
    }
}

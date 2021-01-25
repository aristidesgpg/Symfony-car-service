<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfAppointmentPushResponseType.
 *
 * XSD Type: ArrayOfAppointmentPushResponse
 */
class ArrayOfAppointmentPushResponseType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\AppointmentPushResponseType[]
     */
    private $appointmentPushResponse = [
    ];

    /**
     * Adds as appointmentPushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\AppointmentPushResponseType $appointmentPushResponse
     */
    public function addToAppointmentPushResponse(AppointmentPushResponseType $appointmentPushResponse)
    {
        $this->appointmentPushResponse[] = $appointmentPushResponse;

        return $this;
    }

    /**
     * isset appointmentPushResponse.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetAppointmentPushResponse($index)
    {
        return isset($this->appointmentPushResponse[$index]);
    }

    /**
     * unset appointmentPushResponse.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetAppointmentPushResponse($index)
    {
        unset($this->appointmentPushResponse[$index]);
    }

    /**
     * Gets as appointmentPushResponse.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\AppointmentPushResponseType[]
     */
    public function getAppointmentPushResponse()
    {
        return $this->appointmentPushResponse;
    }

    /**
     * Sets a new appointmentPushResponse.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\AppointmentPushResponseType[] $appointmentPushResponse
     *
     * @return self
     */
    public function setAppointmentPushResponse(array $appointmentPushResponse)
    {
        $this->appointmentPushResponse = $appointmentPushResponse;

        return $this;
    }
}

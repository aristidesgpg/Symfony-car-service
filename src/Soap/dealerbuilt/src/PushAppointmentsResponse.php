<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushAppointmentsResponse.
 */
class PushAppointmentsResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\AppointmentPushResponseType[]
     */
    private $pushAppointmentsResult = null;

    /**
     * Adds as appointmentPushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\AppointmentPushResponseType $appointmentPushResponse
     */
    public function addToPushAppointmentsResult(BaseApi\AppointmentPushResponseType $appointmentPushResponse)
    {
        $this->pushAppointmentsResult[] = $appointmentPushResponse;

        return $this;
    }

    /**
     * isset pushAppointmentsResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPushAppointmentsResult($index)
    {
        return isset($this->pushAppointmentsResult[$index]);
    }

    /**
     * unset pushAppointmentsResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPushAppointmentsResult($index)
    {
        unset($this->pushAppointmentsResult[$index]);
    }

    /**
     * Gets as pushAppointmentsResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\AppointmentPushResponseType[]
     */
    public function getPushAppointmentsResult()
    {
        return $this->pushAppointmentsResult;
    }

    /**
     * Sets a new pushAppointmentsResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\AppointmentPushResponseType[] $pushAppointmentsResult
     *
     * @return self
     */
    public function setPushAppointmentsResult(array $pushAppointmentsResult)
    {
        $this->pushAppointmentsResult = $pushAppointmentsResult;

        return $this;
    }
}

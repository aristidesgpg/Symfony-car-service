<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullAppointmentsResponse.
 */
class PullAppointmentsResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\AppointmentType[]
     */
    private $pullAppointmentsResult = null;

    /**
     * Adds as appointment.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\AppointmentType $appointment
     */
    public function addToPullAppointmentsResult(BaseApi\AppointmentType $appointment)
    {
        $this->pullAppointmentsResult[] = $appointment;

        return $this;
    }

    /**
     * isset pullAppointmentsResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPullAppointmentsResult($index)
    {
        return isset($this->pullAppointmentsResult[$index]);
    }

    /**
     * unset pullAppointmentsResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPullAppointmentsResult($index)
    {
        unset($this->pullAppointmentsResult[$index]);
    }

    /**
     * Gets as pullAppointmentsResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\AppointmentType[]
     */
    public function getPullAppointmentsResult()
    {
        return $this->pullAppointmentsResult;
    }

    /**
     * Sets a new pullAppointmentsResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\AppointmentType[] $pullAppointmentsResult
     *
     * @return self
     */
    public function setPullAppointmentsResult(array $pullAppointmentsResult)
    {
        $this->pullAppointmentsResult = $pullAppointmentsResult;

        return $this;
    }
}

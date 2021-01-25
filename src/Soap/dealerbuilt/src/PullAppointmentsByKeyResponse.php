<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullAppointmentsByKeyResponse
 */
class PullAppointmentsByKeyResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\AppointmentType[] $pullAppointmentsByKeyResult
     */
    private $pullAppointmentsByKeyResult = null;

    /**
     * Adds as appointment
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\AppointmentType $appointment
     */
    public function addToPullAppointmentsByKeyResult(\App\Soap\dealerbuilt\src\BaseApi\AppointmentType $appointment)
    {
        $this->pullAppointmentsByKeyResult[] = $appointment;
        return $this;
    }

    /**
     * isset pullAppointmentsByKeyResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullAppointmentsByKeyResult($index)
    {
        return isset($this->pullAppointmentsByKeyResult[$index]);
    }

    /**
     * unset pullAppointmentsByKeyResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullAppointmentsByKeyResult($index)
    {
        unset($this->pullAppointmentsByKeyResult[$index]);
    }

    /**
     * Gets as pullAppointmentsByKeyResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\AppointmentType[]
     */
    public function getPullAppointmentsByKeyResult()
    {
        return $this->pullAppointmentsByKeyResult;
    }

    /**
     * Sets a new pullAppointmentsByKeyResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\AppointmentType[] $pullAppointmentsByKeyResult
     * @return self
     */
    public function setPullAppointmentsByKeyResult(array $pullAppointmentsByKeyResult)
    {
        $this->pullAppointmentsByKeyResult = $pullAppointmentsByKeyResult;
        return $this;
    }


}


<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushEstimatesFromAppointmentsResponse.
 */
class PushEstimatesFromAppointmentsResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[]
     */
    private $pushEstimatesFromAppointmentsResult = null;

    /**
     * Adds as serviceLocationPushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType $serviceLocationPushResponse
     */
    public function addToPushEstimatesFromAppointmentsResult(BaseApi\ServiceLocationPushResponseType $serviceLocationPushResponse)
    {
        $this->pushEstimatesFromAppointmentsResult[] = $serviceLocationPushResponse;

        return $this;
    }

    /**
     * isset pushEstimatesFromAppointmentsResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPushEstimatesFromAppointmentsResult($index)
    {
        return isset($this->pushEstimatesFromAppointmentsResult[$index]);
    }

    /**
     * unset pushEstimatesFromAppointmentsResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPushEstimatesFromAppointmentsResult($index)
    {
        unset($this->pushEstimatesFromAppointmentsResult[$index]);
    }

    /**
     * Gets as pushEstimatesFromAppointmentsResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[]
     */
    public function getPushEstimatesFromAppointmentsResult()
    {
        return $this->pushEstimatesFromAppointmentsResult;
    }

    /**
     * Sets a new pushEstimatesFromAppointmentsResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[] $pushEstimatesFromAppointmentsResult
     *
     * @return self
     */
    public function setPushEstimatesFromAppointmentsResult(array $pushEstimatesFromAppointmentsResult)
    {
        $this->pushEstimatesFromAppointmentsResult = $pushEstimatesFromAppointmentsResult;

        return $this;
    }
}

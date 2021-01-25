<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing ClearAppointmentConcernsResponse
 */
class ClearAppointmentConcernsResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationTransactionResponseType[] $clearAppointmentConcernsResult
     */
    private $clearAppointmentConcernsResult = null;

    /**
     * Adds as serviceLocationTransactionResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationTransactionResponseType $serviceLocationTransactionResponse
     */
    public function addToClearAppointmentConcernsResult(\App\Soap\dealerbuilt\src\BaseApi\ServiceLocationTransactionResponseType $serviceLocationTransactionResponse)
    {
        $this->clearAppointmentConcernsResult[] = $serviceLocationTransactionResponse;
        return $this;
    }

    /**
     * isset clearAppointmentConcernsResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetClearAppointmentConcernsResult($index)
    {
        return isset($this->clearAppointmentConcernsResult[$index]);
    }

    /**
     * unset clearAppointmentConcernsResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetClearAppointmentConcernsResult($index)
    {
        unset($this->clearAppointmentConcernsResult[$index]);
    }

    /**
     * Gets as clearAppointmentConcernsResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationTransactionResponseType[]
     */
    public function getClearAppointmentConcernsResult()
    {
        return $this->clearAppointmentConcernsResult;
    }

    /**
     * Sets a new clearAppointmentConcernsResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationTransactionResponseType[] $clearAppointmentConcernsResult
     * @return self
     */
    public function setClearAppointmentConcernsResult(array $clearAppointmentConcernsResult)
    {
        $this->clearAppointmentConcernsResult = $clearAppointmentConcernsResult;
        return $this;
    }


}


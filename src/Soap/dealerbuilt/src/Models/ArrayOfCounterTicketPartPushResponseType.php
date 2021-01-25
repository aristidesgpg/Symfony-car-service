<?php

namespace App\Soap\dealerbuilt\src\Models;

/**
 * Class representing ArrayOfCounterTicketPartPushResponseType.
 *
 * XSD Type: ArrayOfCounterTicketPartPushResponse
 */
class ArrayOfCounterTicketPartPushResponseType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\CounterTicketPartPushResponseType[]
     */
    private $counterTicketPartPushResponse = [
    ];

    /**
     * Adds as counterTicketPartPushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\CounterTicketPartPushResponseType $counterTicketPartPushResponse
     */
    public function addToCounterTicketPartPushResponse(CounterTicketPartPushResponseType $counterTicketPartPushResponse)
    {
        $this->counterTicketPartPushResponse[] = $counterTicketPartPushResponse;

        return $this;
    }

    /**
     * isset counterTicketPartPushResponse.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetCounterTicketPartPushResponse($index)
    {
        return isset($this->counterTicketPartPushResponse[$index]);
    }

    /**
     * unset counterTicketPartPushResponse.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetCounterTicketPartPushResponse($index)
    {
        unset($this->counterTicketPartPushResponse[$index]);
    }

    /**
     * Gets as counterTicketPartPushResponse.
     *
     * @return \App\Soap\dealerbuilt\src\Models\CounterTicketPartPushResponseType[]
     */
    public function getCounterTicketPartPushResponse()
    {
        return $this->counterTicketPartPushResponse;
    }

    /**
     * Sets a new counterTicketPartPushResponse.
     *
     * @param \App\Soap\dealerbuilt\src\Models\CounterTicketPartPushResponseType[] $counterTicketPartPushResponse
     *
     * @return self
     */
    public function setCounterTicketPartPushResponse(array $counterTicketPartPushResponse)
    {
        $this->counterTicketPartPushResponse = $counterTicketPartPushResponse;

        return $this;
    }
}

<?php

namespace App\Soap\dealerbuilt\src\Models\Parts;

/**
 * Class representing PushCounterTicketResponseType.
 *
 * XSD Type: PushCounterTicketResponse
 */
class PushCounterTicketResponseType
{
    /**
     * @var string
     */
    private $correlationId = null;

    /**
     * @var string
     */
    private $counterTicketNumber = null;

    /**
     * @var string
     */
    private $key = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\CounterTicketPartPushResponseType[]
     */
    private $partsResponses = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\PushResponseType
     */
    private $response = null;

    /**
     * Gets as correlationId.
     *
     * @return string
     */
    public function getCorrelationId()
    {
        return $this->correlationId;
    }

    /**
     * Sets a new correlationId.
     *
     * @param string $correlationId
     *
     * @return self
     */
    public function setCorrelationId($correlationId)
    {
        $this->correlationId = $correlationId;

        return $this;
    }

    /**
     * Gets as counterTicketNumber.
     *
     * @return string
     */
    public function getCounterTicketNumber()
    {
        return $this->counterTicketNumber;
    }

    /**
     * Sets a new counterTicketNumber.
     *
     * @param string $counterTicketNumber
     *
     * @return self
     */
    public function setCounterTicketNumber($counterTicketNumber)
    {
        $this->counterTicketNumber = $counterTicketNumber;

        return $this;
    }

    /**
     * Gets as key.
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Sets a new key.
     *
     * @param string $key
     *
     * @return self
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Adds as counterTicketPartPushResponse.
     *
     * @return self
     */
    public function addToPartsResponses(\App\Soap\dealerbuilt\src\Models\CounterTicketPartPushResponseType $counterTicketPartPushResponse)
    {
        $this->partsResponses[] = $counterTicketPartPushResponse;

        return $this;
    }

    /**
     * isset partsResponses.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPartsResponses($index)
    {
        return isset($this->partsResponses[$index]);
    }

    /**
     * unset partsResponses.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPartsResponses($index)
    {
        unset($this->partsResponses[$index]);
    }

    /**
     * Gets as partsResponses.
     *
     * @return \App\Soap\dealerbuilt\src\Models\CounterTicketPartPushResponseType[]
     */
    public function getPartsResponses()
    {
        return $this->partsResponses;
    }

    /**
     * Sets a new partsResponses.
     *
     * @param \App\Soap\dealerbuilt\src\Models\CounterTicketPartPushResponseType[] $partsResponses
     *
     * @return self
     */
    public function setPartsResponses(array $partsResponses)
    {
        $this->partsResponses = $partsResponses;

        return $this;
    }

    /**
     * Gets as response.
     *
     * @return \App\Soap\dealerbuilt\src\Models\PushResponseType
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Sets a new response.
     *
     * @return self
     */
    public function setResponse(\App\Soap\dealerbuilt\src\Models\PushResponseType $response)
    {
        $this->response = $response;

        return $this;
    }
}

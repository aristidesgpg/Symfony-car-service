<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PushCounterTicketRequestType.
 *
 * XSD Type: PushCounterTicketRequest
 */
class PushCounterTicketRequestType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Parts\CounterTicketType[]
     */
    private $counterTickets = null;

    /**
     * @var int
     */
    private $serviceLocationId = null;

    /**
     * Adds as counterTicket.
     *
     * @return self
     */
    public function addToCounterTickets(\App\Soap\dealerbuilt\src\Models\Parts\CounterTicketType $counterTicket)
    {
        $this->counterTickets[] = $counterTicket;

        return $this;
    }

    /**
     * isset counterTickets.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetCounterTickets($index)
    {
        return isset($this->counterTickets[$index]);
    }

    /**
     * unset counterTickets.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetCounterTickets($index)
    {
        unset($this->counterTickets[$index]);
    }

    /**
     * Gets as counterTickets.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Parts\CounterTicketType[]
     */
    public function getCounterTickets()
    {
        return $this->counterTickets;
    }

    /**
     * Sets a new counterTickets.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\CounterTicketType[] $counterTickets
     *
     * @return self
     */
    public function setCounterTickets(array $counterTickets)
    {
        $this->counterTickets = $counterTickets;

        return $this;
    }

    /**
     * Gets as serviceLocationId.
     *
     * @return int
     */
    public function getServiceLocationId()
    {
        return $this->serviceLocationId;
    }

    /**
     * Sets a new serviceLocationId.
     *
     * @param int $serviceLocationId
     *
     * @return self
     */
    public function setServiceLocationId($serviceLocationId)
    {
        $this->serviceLocationId = $serviceLocationId;

        return $this;
    }
}

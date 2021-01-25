<?php

namespace App\Soap\dealerbuilt\src\Models\Parts;

/**
 * Class representing ArrayOfCounterTicketType.
 *
 * XSD Type: ArrayOfCounterTicket
 */
class ArrayOfCounterTicketType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Parts\CounterTicketType[]
     */
    private $counterTicket = [
    ];

    /**
     * Adds as counterTicket.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\CounterTicketType $counterTicket
     */
    public function addToCounterTicket(CounterTicketType $counterTicket)
    {
        $this->counterTicket[] = $counterTicket;

        return $this;
    }

    /**
     * isset counterTicket.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetCounterTicket($index)
    {
        return isset($this->counterTicket[$index]);
    }

    /**
     * unset counterTicket.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetCounterTicket($index)
    {
        unset($this->counterTicket[$index]);
    }

    /**
     * Gets as counterTicket.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Parts\CounterTicketType[]
     */
    public function getCounterTicket()
    {
        return $this->counterTicket;
    }

    /**
     * Sets a new counterTicket.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\CounterTicketType[] $counterTicket
     *
     * @return self
     */
    public function setCounterTicket(array $counterTicket)
    {
        $this->counterTicket = $counterTicket;

        return $this;
    }
}

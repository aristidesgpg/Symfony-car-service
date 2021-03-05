<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing VoidCounterTickets
 */
class VoidCounterTickets
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\VoidCounterTicketApiRequestType[] $voidCounterTicketRequests
     */
    private $voidCounterTicketRequests = null;

    /**
     * Adds as voidCounterTicketApiRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\VoidCounterTicketApiRequestType $voidCounterTicketApiRequest
     */
    public function addToVoidCounterTicketRequests(\App\Soap\dealerbuilt\src\BaseApi\VoidCounterTicketApiRequestType $voidCounterTicketApiRequest)
    {
        $this->voidCounterTicketRequests[] = $voidCounterTicketApiRequest;
        return $this;
    }

    /**
     * isset voidCounterTicketRequests
     *
     * @param int|string $index
     * @return bool
     */
    public function issetVoidCounterTicketRequests($index)
    {
        return isset($this->voidCounterTicketRequests[$index]);
    }

    /**
     * unset voidCounterTicketRequests
     *
     * @param int|string $index
     * @return void
     */
    public function unsetVoidCounterTicketRequests($index)
    {
        unset($this->voidCounterTicketRequests[$index]);
    }

    /**
     * Gets as voidCounterTicketRequests
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\VoidCounterTicketApiRequestType[]
     */
    public function getVoidCounterTicketRequests()
    {
        return $this->voidCounterTicketRequests;
    }

    /**
     * Sets a new voidCounterTicketRequests
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\VoidCounterTicketApiRequestType[] $voidCounterTicketRequests
     * @return self
     */
    public function setVoidCounterTicketRequests(array $voidCounterTicketRequests)
    {
        $this->voidCounterTicketRequests = $voidCounterTicketRequests;
        return $this;
    }


}


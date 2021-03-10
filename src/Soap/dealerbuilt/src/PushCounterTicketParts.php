<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushCounterTicketParts
 */
class PushCounterTicketParts
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PartsInvoicePartPushRequestType[] $counterTicketParts
     */
    private $counterTicketParts = null;

    /**
     * Adds as partsInvoicePartPushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsInvoicePartPushRequestType $partsInvoicePartPushRequest
     */
    public function addToCounterTicketParts(\App\Soap\dealerbuilt\src\BaseApi\PartsInvoicePartPushRequestType $partsInvoicePartPushRequest)
    {
        $this->counterTicketParts[] = $partsInvoicePartPushRequest;
        return $this;
    }

    /**
     * isset counterTicketParts
     *
     * @param int|string $index
     * @return bool
     */
    public function issetCounterTicketParts($index)
    {
        return isset($this->counterTicketParts[$index]);
    }

    /**
     * unset counterTicketParts
     *
     * @param int|string $index
     * @return void
     */
    public function unsetCounterTicketParts($index)
    {
        unset($this->counterTicketParts[$index]);
    }

    /**
     * Gets as counterTicketParts
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PartsInvoicePartPushRequestType[]
     */
    public function getCounterTicketParts()
    {
        return $this->counterTicketParts;
    }

    /**
     * Sets a new counterTicketParts
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsInvoicePartPushRequestType[] $counterTicketParts
     * @return self
     */
    public function setCounterTicketParts(array $counterTicketParts)
    {
        $this->counterTicketParts = $counterTicketParts;
        return $this;
    }


}


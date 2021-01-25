<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushCounterTickets
 */
class PushCounterTickets
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PushCounterTicketRequestType $request
     */
    private $request = null;

    /**
     * Gets as request
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PushCounterTicketRequestType
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Sets a new request
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PushCounterTicketRequestType $request
     * @return self
     */
    public function setRequest(\App\Soap\dealerbuilt\src\BaseApi\PushCounterTicketRequestType $request)
    {
        $this->request = $request;
        return $this;
    }


}


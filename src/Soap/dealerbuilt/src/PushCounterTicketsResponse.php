<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushCounterTicketsResponse
 */
class PushCounterTicketsResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PushCounterTicketApiResponseType $pushCounterTicketsResult
     */
    private $pushCounterTicketsResult = null;

    /**
     * Gets as pushCounterTicketsResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PushCounterTicketApiResponseType
     */
    public function getPushCounterTicketsResult()
    {
        return $this->pushCounterTicketsResult;
    }

    /**
     * Sets a new pushCounterTicketsResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PushCounterTicketApiResponseType $pushCounterTicketsResult
     * @return self
     */
    public function setPushCounterTicketsResult(\App\Soap\dealerbuilt\src\BaseApi\PushCounterTicketApiResponseType $pushCounterTicketsResult)
    {
        $this->pushCounterTicketsResult = $pushCounterTicketsResult;
        return $this;
    }


}


<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushCounterTicketPartsResponse
 */
class PushCounterTicketPartsResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[] $pushCounterTicketPartsResult
     */
    private $pushCounterTicketPartsResult = null;

    /**
     * Adds as serviceLocationPushResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType $serviceLocationPushResponse
     */
    public function addToPushCounterTicketPartsResult(\App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType $serviceLocationPushResponse)
    {
        $this->pushCounterTicketPartsResult[] = $serviceLocationPushResponse;
        return $this;
    }

    /**
     * isset pushCounterTicketPartsResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPushCounterTicketPartsResult($index)
    {
        return isset($this->pushCounterTicketPartsResult[$index]);
    }

    /**
     * unset pushCounterTicketPartsResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPushCounterTicketPartsResult($index)
    {
        unset($this->pushCounterTicketPartsResult[$index]);
    }

    /**
     * Gets as pushCounterTicketPartsResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[]
     */
    public function getPushCounterTicketPartsResult()
    {
        return $this->pushCounterTicketPartsResult;
    }

    /**
     * Sets a new pushCounterTicketPartsResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[] $pushCounterTicketPartsResult
     * @return self
     */
    public function setPushCounterTicketPartsResult(array $pushCounterTicketPartsResult)
    {
        $this->pushCounterTicketPartsResult = $pushCounterTicketPartsResult;
        return $this;
    }


}


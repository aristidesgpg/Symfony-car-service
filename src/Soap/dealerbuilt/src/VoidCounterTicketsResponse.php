<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing VoidCounterTicketsResponse
 */
class VoidCounterTicketsResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[] $voidCounterTicketsResult
     */
    private $voidCounterTicketsResult = null;

    /**
     * Adds as serviceLocationPushResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType $serviceLocationPushResponse
     */
    public function addToVoidCounterTicketsResult(\App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType $serviceLocationPushResponse)
    {
        $this->voidCounterTicketsResult[] = $serviceLocationPushResponse;
        return $this;
    }

    /**
     * isset voidCounterTicketsResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetVoidCounterTicketsResult($index)
    {
        return isset($this->voidCounterTicketsResult[$index]);
    }

    /**
     * unset voidCounterTicketsResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetVoidCounterTicketsResult($index)
    {
        unset($this->voidCounterTicketsResult[$index]);
    }

    /**
     * Gets as voidCounterTicketsResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[]
     */
    public function getVoidCounterTicketsResult()
    {
        return $this->voidCounterTicketsResult;
    }

    /**
     * Sets a new voidCounterTicketsResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[] $voidCounterTicketsResult
     * @return self
     */
    public function setVoidCounterTicketsResult(array $voidCounterTicketsResult)
    {
        $this->voidCounterTicketsResult = $voidCounterTicketsResult;
        return $this;
    }


}


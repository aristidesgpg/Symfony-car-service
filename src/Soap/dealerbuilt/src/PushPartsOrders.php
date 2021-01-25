<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushPartsOrders.
 */
class PushPartsOrders
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PartsOrderPushRequestType[]
     */
    private $partsOrders = null;

    /**
     * Adds as partsOrderPushRequest.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsOrderPushRequestType $partsOrderPushRequest
     */
    public function addToPartsOrders(BaseApi\PartsOrderPushRequestType $partsOrderPushRequest)
    {
        $this->partsOrders[] = $partsOrderPushRequest;

        return $this;
    }

    /**
     * isset partsOrders.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPartsOrders($index)
    {
        return isset($this->partsOrders[$index]);
    }

    /**
     * unset partsOrders.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPartsOrders($index)
    {
        unset($this->partsOrders[$index]);
    }

    /**
     * Gets as partsOrders.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PartsOrderPushRequestType[]
     */
    public function getPartsOrders()
    {
        return $this->partsOrders;
    }

    /**
     * Sets a new partsOrders.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsOrderPushRequestType[] $partsOrders
     *
     * @return self
     */
    public function setPartsOrders(array $partsOrders)
    {
        $this->partsOrders = $partsOrders;

        return $this;
    }
}

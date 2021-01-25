<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushDeals
 */
class PushDeals
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DealPushRequestType[] $deals
     */
    private $deals = null;

    /**
     * Adds as dealPushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\DealPushRequestType $dealPushRequest
     */
    public function addToDeals(\App\Soap\dealerbuilt\src\BaseApi\DealPushRequestType $dealPushRequest)
    {
        $this->deals[] = $dealPushRequest;
        return $this;
    }

    /**
     * isset deals
     *
     * @param int|string $index
     * @return bool
     */
    public function issetDeals($index)
    {
        return isset($this->deals[$index]);
    }

    /**
     * unset deals
     *
     * @param int|string $index
     * @return void
     */
    public function unsetDeals($index)
    {
        unset($this->deals[$index]);
    }

    /**
     * Gets as deals
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DealPushRequestType[]
     */
    public function getDeals()
    {
        return $this->deals;
    }

    /**
     * Sets a new deals
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DealPushRequestType[] $deals
     * @return self
     */
    public function setDeals(array $deals)
    {
        $this->deals = $deals;
        return $this;
    }


}


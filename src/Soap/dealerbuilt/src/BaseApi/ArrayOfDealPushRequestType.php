<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfDealPushRequestType
 *
 * 
 * XSD Type: ArrayOfDealPushRequest
 */
class ArrayOfDealPushRequestType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DealPushRequestType[] $dealPushRequest
     */
    private $dealPushRequest = [
        
    ];

    /**
     * Adds as dealPushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\DealPushRequestType $dealPushRequest
     */
    public function addToDealPushRequest(\App\Soap\dealerbuilt\src\BaseApi\DealPushRequestType $dealPushRequest)
    {
        $this->dealPushRequest[] = $dealPushRequest;
        return $this;
    }

    /**
     * isset dealPushRequest
     *
     * @param int|string $index
     * @return bool
     */
    public function issetDealPushRequest($index)
    {
        return isset($this->dealPushRequest[$index]);
    }

    /**
     * unset dealPushRequest
     *
     * @param int|string $index
     * @return void
     */
    public function unsetDealPushRequest($index)
    {
        unset($this->dealPushRequest[$index]);
    }

    /**
     * Gets as dealPushRequest
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DealPushRequestType[]
     */
    public function getDealPushRequest()
    {
        return $this->dealPushRequest;
    }

    /**
     * Sets a new dealPushRequest
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DealPushRequestType[] $dealPushRequest
     * @return self
     */
    public function setDealPushRequest(array $dealPushRequest)
    {
        $this->dealPushRequest = $dealPushRequest;
        return $this;
    }


}


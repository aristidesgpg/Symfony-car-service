<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfPartsOrderPushRequestType.
 *
 * XSD Type: ArrayOfPartsOrderPushRequest
 */
class ArrayOfPartsOrderPushRequestType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PartsOrderPushRequestType[]
     */
    private $partsOrderPushRequest = [
    ];

    /**
     * Adds as partsOrderPushRequest.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsOrderPushRequestType $partsOrderPushRequest
     */
    public function addToPartsOrderPushRequest(PartsOrderPushRequestType $partsOrderPushRequest)
    {
        $this->partsOrderPushRequest[] = $partsOrderPushRequest;

        return $this;
    }

    /**
     * isset partsOrderPushRequest.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPartsOrderPushRequest($index)
    {
        return isset($this->partsOrderPushRequest[$index]);
    }

    /**
     * unset partsOrderPushRequest.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPartsOrderPushRequest($index)
    {
        unset($this->partsOrderPushRequest[$index]);
    }

    /**
     * Gets as partsOrderPushRequest.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PartsOrderPushRequestType[]
     */
    public function getPartsOrderPushRequest()
    {
        return $this->partsOrderPushRequest;
    }

    /**
     * Sets a new partsOrderPushRequest.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsOrderPushRequestType[] $partsOrderPushRequest
     *
     * @return self
     */
    public function setPartsOrderPushRequest(array $partsOrderPushRequest)
    {
        $this->partsOrderPushRequest = $partsOrderPushRequest;

        return $this;
    }
}

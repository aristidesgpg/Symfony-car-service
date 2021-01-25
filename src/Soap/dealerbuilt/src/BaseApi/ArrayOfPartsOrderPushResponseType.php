<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfPartsOrderPushResponseType
 *
 * 
 * XSD Type: ArrayOfPartsOrderPushResponse
 */
class ArrayOfPartsOrderPushResponseType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PartsOrderPushResponseType[] $partsOrderPushResponse
     */
    private $partsOrderPushResponse = [
        
    ];

    /**
     * Adds as partsOrderPushResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsOrderPushResponseType $partsOrderPushResponse
     */
    public function addToPartsOrderPushResponse(\App\Soap\dealerbuilt\src\BaseApi\PartsOrderPushResponseType $partsOrderPushResponse)
    {
        $this->partsOrderPushResponse[] = $partsOrderPushResponse;
        return $this;
    }

    /**
     * isset partsOrderPushResponse
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPartsOrderPushResponse($index)
    {
        return isset($this->partsOrderPushResponse[$index]);
    }

    /**
     * unset partsOrderPushResponse
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPartsOrderPushResponse($index)
    {
        unset($this->partsOrderPushResponse[$index]);
    }

    /**
     * Gets as partsOrderPushResponse
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PartsOrderPushResponseType[]
     */
    public function getPartsOrderPushResponse()
    {
        return $this->partsOrderPushResponse;
    }

    /**
     * Sets a new partsOrderPushResponse
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsOrderPushResponseType[] $partsOrderPushResponse
     * @return self
     */
    public function setPartsOrderPushResponse(array $partsOrderPushResponse)
    {
        $this->partsOrderPushResponse = $partsOrderPushResponse;
        return $this;
    }


}


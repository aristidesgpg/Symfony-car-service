<?php

namespace App\Soap\dealerbuilt\src\Models\Parts;

/**
 * Class representing ArrayOfPartsOrderLinePushRequestType
 *
 * 
 * XSD Type: ArrayOfPartsOrderLinePushRequest
 */
class ArrayOfPartsOrderLinePushRequestType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Parts\PartsOrderLinePushRequestType[] $partsOrderLinePushRequest
     */
    private $partsOrderLinePushRequest = [
        
    ];

    /**
     * Adds as partsOrderLinePushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Parts\PartsOrderLinePushRequestType $partsOrderLinePushRequest
     */
    public function addToPartsOrderLinePushRequest(\App\Soap\dealerbuilt\src\Models\Parts\PartsOrderLinePushRequestType $partsOrderLinePushRequest)
    {
        $this->partsOrderLinePushRequest[] = $partsOrderLinePushRequest;
        return $this;
    }

    /**
     * isset partsOrderLinePushRequest
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPartsOrderLinePushRequest($index)
    {
        return isset($this->partsOrderLinePushRequest[$index]);
    }

    /**
     * unset partsOrderLinePushRequest
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPartsOrderLinePushRequest($index)
    {
        unset($this->partsOrderLinePushRequest[$index]);
    }

    /**
     * Gets as partsOrderLinePushRequest
     *
     * @return \App\Soap\dealerbuilt\src\Models\Parts\PartsOrderLinePushRequestType[]
     */
    public function getPartsOrderLinePushRequest()
    {
        return $this->partsOrderLinePushRequest;
    }

    /**
     * Sets a new partsOrderLinePushRequest
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\PartsOrderLinePushRequestType[] $partsOrderLinePushRequest
     * @return self
     */
    public function setPartsOrderLinePushRequest(array $partsOrderLinePushRequest)
    {
        $this->partsOrderLinePushRequest = $partsOrderLinePushRequest;
        return $this;
    }


}


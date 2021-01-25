<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfLaborOperationSubletPushRequestType.
 *
 * XSD Type: ArrayOfLaborOperationSubletPushRequest
 */
class ArrayOfLaborOperationSubletPushRequestType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\LaborOperationSubletPushRequestType[]
     */
    private $laborOperationSubletPushRequest = [
    ];

    /**
     * Adds as laborOperationSubletPushRequest.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\LaborOperationSubletPushRequestType $laborOperationSubletPushRequest
     */
    public function addToLaborOperationSubletPushRequest(LaborOperationSubletPushRequestType $laborOperationSubletPushRequest)
    {
        $this->laborOperationSubletPushRequest[] = $laborOperationSubletPushRequest;

        return $this;
    }

    /**
     * isset laborOperationSubletPushRequest.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetLaborOperationSubletPushRequest($index)
    {
        return isset($this->laborOperationSubletPushRequest[$index]);
    }

    /**
     * unset laborOperationSubletPushRequest.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetLaborOperationSubletPushRequest($index)
    {
        unset($this->laborOperationSubletPushRequest[$index]);
    }

    /**
     * Gets as laborOperationSubletPushRequest.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\LaborOperationSubletPushRequestType[]
     */
    public function getLaborOperationSubletPushRequest()
    {
        return $this->laborOperationSubletPushRequest;
    }

    /**
     * Sets a new laborOperationSubletPushRequest.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\LaborOperationSubletPushRequestType[] $laborOperationSubletPushRequest
     *
     * @return self
     */
    public function setLaborOperationSubletPushRequest(array $laborOperationSubletPushRequest)
    {
        $this->laborOperationSubletPushRequest = $laborOperationSubletPushRequest;

        return $this;
    }
}

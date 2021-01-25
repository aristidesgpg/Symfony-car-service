<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfEstimatePushRequestType.
 *
 * XSD Type: ArrayOfEstimatePushRequest
 */
class ArrayOfEstimatePushRequestType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\EstimatePushRequestType[]
     */
    private $estimatePushRequest = [
    ];

    /**
     * Adds as estimatePushRequest.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\EstimatePushRequestType $estimatePushRequest
     */
    public function addToEstimatePushRequest(EstimatePushRequestType $estimatePushRequest)
    {
        $this->estimatePushRequest[] = $estimatePushRequest;

        return $this;
    }

    /**
     * isset estimatePushRequest.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetEstimatePushRequest($index)
    {
        return isset($this->estimatePushRequest[$index]);
    }

    /**
     * unset estimatePushRequest.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetEstimatePushRequest($index)
    {
        unset($this->estimatePushRequest[$index]);
    }

    /**
     * Gets as estimatePushRequest.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\EstimatePushRequestType[]
     */
    public function getEstimatePushRequest()
    {
        return $this->estimatePushRequest;
    }

    /**
     * Sets a new estimatePushRequest.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\EstimatePushRequestType[] $estimatePushRequest
     *
     * @return self
     */
    public function setEstimatePushRequest(array $estimatePushRequest)
    {
        $this->estimatePushRequest = $estimatePushRequest;

        return $this;
    }
}

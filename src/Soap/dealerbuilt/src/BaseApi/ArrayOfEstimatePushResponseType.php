<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfEstimatePushResponseType
 *
 * 
 * XSD Type: ArrayOfEstimatePushResponse
 */
class ArrayOfEstimatePushResponseType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\EstimatePushResponseType[] $estimatePushResponse
     */
    private $estimatePushResponse = [
        
    ];

    /**
     * Adds as estimatePushResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\EstimatePushResponseType $estimatePushResponse
     */
    public function addToEstimatePushResponse(\App\Soap\dealerbuilt\src\BaseApi\EstimatePushResponseType $estimatePushResponse)
    {
        $this->estimatePushResponse[] = $estimatePushResponse;
        return $this;
    }

    /**
     * isset estimatePushResponse
     *
     * @param int|string $index
     * @return bool
     */
    public function issetEstimatePushResponse($index)
    {
        return isset($this->estimatePushResponse[$index]);
    }

    /**
     * unset estimatePushResponse
     *
     * @param int|string $index
     * @return void
     */
    public function unsetEstimatePushResponse($index)
    {
        unset($this->estimatePushResponse[$index]);
    }

    /**
     * Gets as estimatePushResponse
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\EstimatePushResponseType[]
     */
    public function getEstimatePushResponse()
    {
        return $this->estimatePushResponse;
    }

    /**
     * Sets a new estimatePushResponse
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\EstimatePushResponseType[] $estimatePushResponse
     * @return self
     */
    public function setEstimatePushResponse(array $estimatePushResponse)
    {
        $this->estimatePushResponse = $estimatePushResponse;
        return $this;
    }


}


<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushEstimates
 */
class PushEstimates
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\EstimatePushRequestType[] $apiEstimates
     */
    private $apiEstimates = null;

    /**
     * Adds as estimatePushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\EstimatePushRequestType $estimatePushRequest
     */
    public function addToApiEstimates(\App\Soap\dealerbuilt\src\BaseApi\EstimatePushRequestType $estimatePushRequest)
    {
        $this->apiEstimates[] = $estimatePushRequest;
        return $this;
    }

    /**
     * isset apiEstimates
     *
     * @param int|string $index
     * @return bool
     */
    public function issetApiEstimates($index)
    {
        return isset($this->apiEstimates[$index]);
    }

    /**
     * unset apiEstimates
     *
     * @param int|string $index
     * @return void
     */
    public function unsetApiEstimates($index)
    {
        unset($this->apiEstimates[$index]);
    }

    /**
     * Gets as apiEstimates
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\EstimatePushRequestType[]
     */
    public function getApiEstimates()
    {
        return $this->apiEstimates;
    }

    /**
     * Sets a new apiEstimates
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\EstimatePushRequestType[] $apiEstimates
     * @return self
     */
    public function setApiEstimates(array $apiEstimates)
    {
        $this->apiEstimates = $apiEstimates;
        return $this;
    }


}


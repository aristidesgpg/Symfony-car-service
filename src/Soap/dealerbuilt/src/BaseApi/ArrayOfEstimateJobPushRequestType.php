<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfEstimateJobPushRequestType
 *
 * 
 * XSD Type: ArrayOfEstimateJobPushRequest
 */
class ArrayOfEstimateJobPushRequestType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\EstimateJobPushRequestType[] $estimateJobPushRequest
     */
    private $estimateJobPushRequest = [
        
    ];

    /**
     * Adds as estimateJobPushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\EstimateJobPushRequestType $estimateJobPushRequest
     */
    public function addToEstimateJobPushRequest(\App\Soap\dealerbuilt\src\BaseApi\EstimateJobPushRequestType $estimateJobPushRequest)
    {
        $this->estimateJobPushRequest[] = $estimateJobPushRequest;
        return $this;
    }

    /**
     * isset estimateJobPushRequest
     *
     * @param int|string $index
     * @return bool
     */
    public function issetEstimateJobPushRequest($index)
    {
        return isset($this->estimateJobPushRequest[$index]);
    }

    /**
     * unset estimateJobPushRequest
     *
     * @param int|string $index
     * @return void
     */
    public function unsetEstimateJobPushRequest($index)
    {
        unset($this->estimateJobPushRequest[$index]);
    }

    /**
     * Gets as estimateJobPushRequest
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\EstimateJobPushRequestType[]
     */
    public function getEstimateJobPushRequest()
    {
        return $this->estimateJobPushRequest;
    }

    /**
     * Sets a new estimateJobPushRequest
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\EstimateJobPushRequestType[] $estimateJobPushRequest
     * @return self
     */
    public function setEstimateJobPushRequest(array $estimateJobPushRequest)
    {
        $this->estimateJobPushRequest = $estimateJobPushRequest;
        return $this;
    }


}


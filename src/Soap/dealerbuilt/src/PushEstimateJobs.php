<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushEstimateJobs
 */
class PushEstimateJobs
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\EstimateJobPushRequestType[] $requests
     */
    private $requests = null;

    /**
     * Adds as estimateJobPushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\EstimateJobPushRequestType $estimateJobPushRequest
     */
    public function addToRequests(\App\Soap\dealerbuilt\src\BaseApi\EstimateJobPushRequestType $estimateJobPushRequest)
    {
        $this->requests[] = $estimateJobPushRequest;
        return $this;
    }

    /**
     * isset requests
     *
     * @param int|string $index
     * @return bool
     */
    public function issetRequests($index)
    {
        return isset($this->requests[$index]);
    }

    /**
     * unset requests
     *
     * @param int|string $index
     * @return void
     */
    public function unsetRequests($index)
    {
        unset($this->requests[$index]);
    }

    /**
     * Gets as requests
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\EstimateJobPushRequestType[]
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * Sets a new requests
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\EstimateJobPushRequestType[] $requests
     * @return self
     */
    public function setRequests(array $requests)
    {
        $this->requests = $requests;
        return $this;
    }


}


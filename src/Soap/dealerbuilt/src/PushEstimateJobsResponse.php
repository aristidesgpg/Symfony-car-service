<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushEstimateJobsResponse
 */
class PushEstimateJobsResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PotentialJobPushResponseType[] $pushEstimateJobsResult
     */
    private $pushEstimateJobsResult = null;

    /**
     * Adds as potentialJobPushResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialJobPushResponseType $potentialJobPushResponse
     */
    public function addToPushEstimateJobsResult(\App\Soap\dealerbuilt\src\BaseApi\PotentialJobPushResponseType $potentialJobPushResponse)
    {
        $this->pushEstimateJobsResult[] = $potentialJobPushResponse;
        return $this;
    }

    /**
     * isset pushEstimateJobsResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPushEstimateJobsResult($index)
    {
        return isset($this->pushEstimateJobsResult[$index]);
    }

    /**
     * unset pushEstimateJobsResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPushEstimateJobsResult($index)
    {
        unset($this->pushEstimateJobsResult[$index]);
    }

    /**
     * Gets as pushEstimateJobsResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PotentialJobPushResponseType[]
     */
    public function getPushEstimateJobsResult()
    {
        return $this->pushEstimateJobsResult;
    }

    /**
     * Sets a new pushEstimateJobsResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialJobPushResponseType[] $pushEstimateJobsResult
     * @return self
     */
    public function setPushEstimateJobsResult(array $pushEstimateJobsResult)
    {
        $this->pushEstimateJobsResult = $pushEstimateJobsResult;
        return $this;
    }


}


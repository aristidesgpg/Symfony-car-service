<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushDeferredJobsResponse
 */
class PushDeferredJobsResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PotentialJobPushResponseType[] $pushDeferredJobsResult
     */
    private $pushDeferredJobsResult = null;

    /**
     * Adds as potentialJobPushResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialJobPushResponseType $potentialJobPushResponse
     */
    public function addToPushDeferredJobsResult(\App\Soap\dealerbuilt\src\BaseApi\PotentialJobPushResponseType $potentialJobPushResponse)
    {
        $this->pushDeferredJobsResult[] = $potentialJobPushResponse;
        return $this;
    }

    /**
     * isset pushDeferredJobsResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPushDeferredJobsResult($index)
    {
        return isset($this->pushDeferredJobsResult[$index]);
    }

    /**
     * unset pushDeferredJobsResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPushDeferredJobsResult($index)
    {
        unset($this->pushDeferredJobsResult[$index]);
    }

    /**
     * Gets as pushDeferredJobsResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PotentialJobPushResponseType[]
     */
    public function getPushDeferredJobsResult()
    {
        return $this->pushDeferredJobsResult;
    }

    /**
     * Sets a new pushDeferredJobsResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialJobPushResponseType[] $pushDeferredJobsResult
     * @return self
     */
    public function setPushDeferredJobsResult(array $pushDeferredJobsResult)
    {
        $this->pushDeferredJobsResult = $pushDeferredJobsResult;
        return $this;
    }


}


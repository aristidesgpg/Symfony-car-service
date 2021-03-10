<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushDeferredJobs
 */
class PushDeferredJobs
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DeferredJobPushRequestType[] $requests
     */
    private $requests = null;

    /**
     * Adds as deferredJobPushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\DeferredJobPushRequestType $deferredJobPushRequest
     */
    public function addToRequests(\App\Soap\dealerbuilt\src\BaseApi\DeferredJobPushRequestType $deferredJobPushRequest)
    {
        $this->requests[] = $deferredJobPushRequest;
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
     * @return \App\Soap\dealerbuilt\src\BaseApi\DeferredJobPushRequestType[]
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * Sets a new requests
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DeferredJobPushRequestType[] $requests
     * @return self
     */
    public function setRequests(array $requests)
    {
        $this->requests = $requests;
        return $this;
    }


}


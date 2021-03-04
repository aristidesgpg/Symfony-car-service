<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushDeferredLaborOperationSublets
 */
class PushDeferredLaborOperationSublets
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborOperationSubletPushRequestType[] $requests
     */
    private $requests = null;

    /**
     * Adds as potentialLaborOperationSubletPushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborOperationSubletPushRequestType $potentialLaborOperationSubletPushRequest
     */
    public function addToRequests(\App\Soap\dealerbuilt\src\BaseApi\PotentialLaborOperationSubletPushRequestType $potentialLaborOperationSubletPushRequest)
    {
        $this->requests[] = $potentialLaborOperationSubletPushRequest;
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
     * @return \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborOperationSubletPushRequestType[]
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * Sets a new requests
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborOperationSubletPushRequestType[] $requests
     * @return self
     */
    public function setRequests(array $requests)
    {
        $this->requests = $requests;
        return $this;
    }


}


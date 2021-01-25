<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushDeferredParts.
 */
class PushDeferredParts
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PotentialPartPushRequestType[]
     */
    private $requests = null;

    /**
     * Adds as potentialPartPushRequest.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialPartPushRequestType $potentialPartPushRequest
     */
    public function addToRequests(BaseApi\PotentialPartPushRequestType $potentialPartPushRequest)
    {
        $this->requests[] = $potentialPartPushRequest;

        return $this;
    }

    /**
     * isset requests.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetRequests($index)
    {
        return isset($this->requests[$index]);
    }

    /**
     * unset requests.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetRequests($index)
    {
        unset($this->requests[$index]);
    }

    /**
     * Gets as requests.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PotentialPartPushRequestType[]
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * Sets a new requests.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialPartPushRequestType[] $requests
     *
     * @return self
     */
    public function setRequests(array $requests)
    {
        $this->requests = $requests;

        return $this;
    }
}

<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushDeferredLaborItems.
 */
class PushDeferredLaborItems
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborItemPushRequestType[]
     */
    private $requests = null;

    /**
     * Adds as potentialLaborItemPushRequest.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborItemPushRequestType $potentialLaborItemPushRequest
     */
    public function addToRequests(BaseApi\PotentialLaborItemPushRequestType $potentialLaborItemPushRequest)
    {
        $this->requests[] = $potentialLaborItemPushRequest;

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
     * @return \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborItemPushRequestType[]
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * Sets a new requests.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborItemPushRequestType[] $requests
     *
     * @return self
     */
    public function setRequests(array $requests)
    {
        $this->requests = $requests;

        return $this;
    }
}

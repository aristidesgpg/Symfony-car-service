<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushRepairOrderLaborOperationSublets.
 */
class PushRepairOrderLaborOperationSublets
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\LaborOperationSubletPushRequestType[]
     */
    private $requests = null;

    /**
     * Adds as laborOperationSubletPushRequest.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\LaborOperationSubletPushRequestType $laborOperationSubletPushRequest
     */
    public function addToRequests(BaseApi\LaborOperationSubletPushRequestType $laborOperationSubletPushRequest)
    {
        $this->requests[] = $laborOperationSubletPushRequest;

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
     * @return \App\Soap\dealerbuilt\src\BaseApi\LaborOperationSubletPushRequestType[]
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * Sets a new requests.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\LaborOperationSubletPushRequestType[] $requests
     *
     * @return self
     */
    public function setRequests(array $requests)
    {
        $this->requests = $requests;

        return $this;
    }
}

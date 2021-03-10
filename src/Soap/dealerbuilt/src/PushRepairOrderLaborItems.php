<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushRepairOrderLaborItems
 */
class PushRepairOrderLaborItems
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\LaborItemPushRequestType[] $requests
     */
    private $requests = null;

    /**
     * Adds as laborItemPushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\LaborItemPushRequestType $laborItemPushRequest
     */
    public function addToRequests(\App\Soap\dealerbuilt\src\BaseApi\LaborItemPushRequestType $laborItemPushRequest)
    {
        $this->requests[] = $laborItemPushRequest;
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
     * @return \App\Soap\dealerbuilt\src\BaseApi\LaborItemPushRequestType[]
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * Sets a new requests
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\LaborItemPushRequestType[] $requests
     * @return self
     */
    public function setRequests(array $requests)
    {
        $this->requests = $requests;
        return $this;
    }


}


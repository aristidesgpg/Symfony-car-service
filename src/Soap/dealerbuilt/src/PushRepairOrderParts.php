<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushRepairOrderParts
 */
class PushRepairOrderParts
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPartPushRequestType[] $requests
     */
    private $requests = null;

    /**
     * Adds as repairOrderPartPushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPartPushRequestType $repairOrderPartPushRequest
     */
    public function addToRequests(\App\Soap\dealerbuilt\src\BaseApi\RepairOrderPartPushRequestType $repairOrderPartPushRequest)
    {
        $this->requests[] = $repairOrderPartPushRequest;
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
     * @return \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPartPushRequestType[]
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * Sets a new requests
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPartPushRequestType[] $requests
     * @return self
     */
    public function setRequests(array $requests)
    {
        $this->requests = $requests;
        return $this;
    }


}


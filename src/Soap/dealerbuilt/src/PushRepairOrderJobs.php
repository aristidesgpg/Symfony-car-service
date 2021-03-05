<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushRepairOrderJobs
 */
class PushRepairOrderJobs
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\RepairOrderJobPushRequestType[] $requests
     */
    private $requests = null;

    /**
     * Adds as repairOrderJobPushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderJobPushRequestType $repairOrderJobPushRequest
     */
    public function addToRequests(\App\Soap\dealerbuilt\src\BaseApi\RepairOrderJobPushRequestType $repairOrderJobPushRequest)
    {
        $this->requests[] = $repairOrderJobPushRequest;
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
     * @return \App\Soap\dealerbuilt\src\BaseApi\RepairOrderJobPushRequestType[]
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * Sets a new requests
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderJobPushRequestType[] $requests
     * @return self
     */
    public function setRequests(array $requests)
    {
        $this->requests = $requests;
        return $this;
    }


}


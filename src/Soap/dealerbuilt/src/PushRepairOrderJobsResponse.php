<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushRepairOrderJobsResponse.
 */
class PushRepairOrderJobsResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\RepairOrderJobPushResponseType[]
     */
    private $pushRepairOrderJobsResult = null;

    /**
     * Adds as repairOrderJobPushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderJobPushResponseType $repairOrderJobPushResponse
     */
    public function addToPushRepairOrderJobsResult(BaseApi\RepairOrderJobPushResponseType $repairOrderJobPushResponse)
    {
        $this->pushRepairOrderJobsResult[] = $repairOrderJobPushResponse;

        return $this;
    }

    /**
     * isset pushRepairOrderJobsResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPushRepairOrderJobsResult($index)
    {
        return isset($this->pushRepairOrderJobsResult[$index]);
    }

    /**
     * unset pushRepairOrderJobsResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPushRepairOrderJobsResult($index)
    {
        unset($this->pushRepairOrderJobsResult[$index]);
    }

    /**
     * Gets as pushRepairOrderJobsResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\RepairOrderJobPushResponseType[]
     */
    public function getPushRepairOrderJobsResult()
    {
        return $this->pushRepairOrderJobsResult;
    }

    /**
     * Sets a new pushRepairOrderJobsResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderJobPushResponseType[] $pushRepairOrderJobsResult
     *
     * @return self
     */
    public function setPushRepairOrderJobsResult(array $pushRepairOrderJobsResult)
    {
        $this->pushRepairOrderJobsResult = $pushRepairOrderJobsResult;

        return $this;
    }
}

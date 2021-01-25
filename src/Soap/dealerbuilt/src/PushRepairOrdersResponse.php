<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushRepairOrdersResponse.
 */
class PushRepairOrdersResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPushResponseType[]
     */
    private $pushRepairOrdersResult = null;

    /**
     * Adds as repairOrderPushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPushResponseType $repairOrderPushResponse
     */
    public function addToPushRepairOrdersResult(BaseApi\RepairOrderPushResponseType $repairOrderPushResponse)
    {
        $this->pushRepairOrdersResult[] = $repairOrderPushResponse;

        return $this;
    }

    /**
     * isset pushRepairOrdersResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPushRepairOrdersResult($index)
    {
        return isset($this->pushRepairOrdersResult[$index]);
    }

    /**
     * unset pushRepairOrdersResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPushRepairOrdersResult($index)
    {
        unset($this->pushRepairOrdersResult[$index]);
    }

    /**
     * Gets as pushRepairOrdersResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPushResponseType[]
     */
    public function getPushRepairOrdersResult()
    {
        return $this->pushRepairOrdersResult;
    }

    /**
     * Sets a new pushRepairOrdersResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPushResponseType[] $pushRepairOrdersResult
     *
     * @return self
     */
    public function setPushRepairOrdersResult(array $pushRepairOrdersResult)
    {
        $this->pushRepairOrdersResult = $pushRepairOrdersResult;

        return $this;
    }
}

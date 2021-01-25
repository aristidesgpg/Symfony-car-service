<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullRepairOrdersResponse.
 */
class PullRepairOrdersResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\RepairOrderType[]
     */
    private $pullRepairOrdersResult = null;

    /**
     * Adds as repairOrder.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderType $repairOrder
     */
    public function addToPullRepairOrdersResult(BaseApi\RepairOrderType $repairOrder)
    {
        $this->pullRepairOrdersResult[] = $repairOrder;

        return $this;
    }

    /**
     * isset pullRepairOrdersResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPullRepairOrdersResult($index)
    {
        return isset($this->pullRepairOrdersResult[$index]);
    }

    /**
     * unset pullRepairOrdersResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPullRepairOrdersResult($index)
    {
        unset($this->pullRepairOrdersResult[$index]);
    }

    /**
     * Gets as pullRepairOrdersResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\RepairOrderType[]
     */
    public function getPullRepairOrdersResult()
    {
        return $this->pullRepairOrdersResult;
    }

    /**
     * Sets a new pullRepairOrdersResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderType[] $pullRepairOrdersResult
     *
     * @return self
     */
    public function setPullRepairOrdersResult(array $pullRepairOrdersResult)
    {
        $this->pullRepairOrdersResult = $pullRepairOrdersResult;

        return $this;
    }
}

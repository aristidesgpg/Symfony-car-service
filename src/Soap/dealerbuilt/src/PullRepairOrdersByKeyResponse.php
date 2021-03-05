<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullRepairOrdersByKeyResponse
 */
class PullRepairOrdersByKeyResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\RepairOrderType[] $pullRepairOrdersByKeyResult
     */
    private $pullRepairOrdersByKeyResult = null;

    /**
     * Adds as repairOrder
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderType $repairOrder
     */
    public function addToPullRepairOrdersByKeyResult(\App\Soap\dealerbuilt\src\BaseApi\RepairOrderType $repairOrder)
    {
        $this->pullRepairOrdersByKeyResult[] = $repairOrder;
        return $this;
    }

    /**
     * isset pullRepairOrdersByKeyResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullRepairOrdersByKeyResult($index)
    {
        return isset($this->pullRepairOrdersByKeyResult[$index]);
    }

    /**
     * unset pullRepairOrdersByKeyResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullRepairOrdersByKeyResult($index)
    {
        unset($this->pullRepairOrdersByKeyResult[$index]);
    }

    /**
     * Gets as pullRepairOrdersByKeyResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\RepairOrderType[]
     */
    public function getPullRepairOrdersByKeyResult()
    {
        return $this->pullRepairOrdersByKeyResult;
    }

    /**
     * Sets a new pullRepairOrdersByKeyResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderType[] $pullRepairOrdersByKeyResult
     * @return self
     */
    public function setPullRepairOrdersByKeyResult(array $pullRepairOrdersByKeyResult)
    {
        $this->pullRepairOrdersByKeyResult = $pullRepairOrdersByKeyResult;
        return $this;
    }


}


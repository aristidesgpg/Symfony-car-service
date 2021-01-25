<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullRepairOrderKeysResponse.
 */
class PullRepairOrderKeysResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\RepairOrderSummaryType[]
     */
    private $pullRepairOrderKeysResult = null;

    /**
     * Adds as repairOrderSummary.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderSummaryType $repairOrderSummary
     */
    public function addToPullRepairOrderKeysResult(BaseApi\RepairOrderSummaryType $repairOrderSummary)
    {
        $this->pullRepairOrderKeysResult[] = $repairOrderSummary;

        return $this;
    }

    /**
     * isset pullRepairOrderKeysResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPullRepairOrderKeysResult($index)
    {
        return isset($this->pullRepairOrderKeysResult[$index]);
    }

    /**
     * unset pullRepairOrderKeysResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPullRepairOrderKeysResult($index)
    {
        unset($this->pullRepairOrderKeysResult[$index]);
    }

    /**
     * Gets as pullRepairOrderKeysResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\RepairOrderSummaryType[]
     */
    public function getPullRepairOrderKeysResult()
    {
        return $this->pullRepairOrderKeysResult;
    }

    /**
     * Sets a new pullRepairOrderKeysResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderSummaryType[] $pullRepairOrderKeysResult
     *
     * @return self
     */
    public function setPullRepairOrderKeysResult(array $pullRepairOrderKeysResult)
    {
        $this->pullRepairOrderKeysResult = $pullRepairOrderKeysResult;

        return $this;
    }
}

<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullRepairOrderByNumberResponse.
 */
class PullRepairOrderByNumberResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\RepairOrderType
     */
    private $pullRepairOrderByNumberResult = null;

    /**
     * Gets as pullRepairOrderByNumberResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\RepairOrderType
     */
    public function getPullRepairOrderByNumberResult()
    {
        return $this->pullRepairOrderByNumberResult;
    }

    /**
     * Sets a new pullRepairOrderByNumberResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderType $pullRepairOrderByNumberResult
     *
     * @return self
     */
    public function setPullRepairOrderByNumberResult(BaseApi\RepairOrderType $pullRepairOrderByNumberResult)
    {
        $this->pullRepairOrderByNumberResult = $pullRepairOrderByNumberResult;

        return $this;
    }
}

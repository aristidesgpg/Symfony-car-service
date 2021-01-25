<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullRepairOrderByKeyResponse
 */
class PullRepairOrderByKeyResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\RepairOrderType $pullRepairOrderByKeyResult
     */
    private $pullRepairOrderByKeyResult = null;

    /**
     * Gets as pullRepairOrderByKeyResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\RepairOrderType
     */
    public function getPullRepairOrderByKeyResult()
    {
        return $this->pullRepairOrderByKeyResult;
    }

    /**
     * Sets a new pullRepairOrderByKeyResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderType $pullRepairOrderByKeyResult
     * @return self
     */
    public function setPullRepairOrderByKeyResult(\App\Soap\dealerbuilt\src\BaseApi\RepairOrderType $pullRepairOrderByKeyResult)
    {
        $this->pullRepairOrderByKeyResult = $pullRepairOrderByKeyResult;
        return $this;
    }


}


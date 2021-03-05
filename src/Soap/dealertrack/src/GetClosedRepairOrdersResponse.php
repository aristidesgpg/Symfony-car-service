<?php

namespace App\Soap\dealertrack\src;

/**
 * Class representing GetClosedRepairOrdersResponse
 */
class GetClosedRepairOrdersResponse
{

    /**
     * @var \App\Soap\dealertrack\src\GetClosedRepairOrdersResult $getClosedRepairOrdersResult
     */
    private $getClosedRepairOrdersResult = null;

    /**
     * Gets as getClosedRepairOrdersResult
     *
     * @return \App\Soap\dealertrack\src\GetClosedRepairOrdersResult
     */
    public function getGetClosedRepairOrdersResult()
    {
        return $this->getClosedRepairOrdersResult;
    }

    /**
     * Sets a new getClosedRepairOrdersResult
     *
     * @param \App\Soap\dealertrack\src\GetClosedRepairOrdersResult $getClosedRepairOrdersResult
     * @return self
     */
    public function setGetClosedRepairOrdersResult(\App\Soap\dealertrack\src\GetClosedRepairOrdersResult $getClosedRepairOrdersResult)
    {
        $this->getClosedRepairOrdersResult = $getClosedRepairOrdersResult;
        return $this;
    }


}


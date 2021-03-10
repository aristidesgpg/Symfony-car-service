<?php

namespace App\Soap\dealertrack\src;

/**
 * Class representing GetClosedRepairOrderDetailsResponse
 */
class GetClosedRepairOrderDetailsResponse
{

    /**
     * @var \App\Soap\dealertrack\src\GetClosedRepairOrderDetailsResult $getClosedRepairOrderDetailsResult
     */
    private $getClosedRepairOrderDetailsResult = null;

    /**
     * Gets as getClosedRepairOrderDetailsResult
     *
     * @return \App\Soap\dealertrack\src\GetClosedRepairOrderDetailsResult
     */
    public function getGetClosedRepairOrderDetailsResult()
    {
        return $this->getClosedRepairOrderDetailsResult;
    }

    /**
     * Sets a new getClosedRepairOrderDetailsResult
     *
     * @param \App\Soap\dealertrack\src\GetClosedRepairOrderDetailsResult $getClosedRepairOrderDetailsResult
     * @return self
     */
    public function setGetClosedRepairOrderDetailsResult(\App\Soap\dealertrack\src\GetClosedRepairOrderDetailsResult $getClosedRepairOrderDetailsResult)
    {
        $this->getClosedRepairOrderDetailsResult = $getClosedRepairOrderDetailsResult;
        return $this;
    }


}


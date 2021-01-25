<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetRepairOrderJobCodesResponse.
 */
class GetRepairOrderJobCodesResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationJobCodesType
     */
    private $getRepairOrderJobCodesResult = null;

    /**
     * Gets as getRepairOrderJobCodesResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationJobCodesType
     */
    public function getGetRepairOrderJobCodesResult()
    {
        return $this->getRepairOrderJobCodesResult;
    }

    /**
     * Sets a new getRepairOrderJobCodesResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationJobCodesType $getRepairOrderJobCodesResult
     *
     * @return self
     */
    public function setGetRepairOrderJobCodesResult(BaseApi\ServiceLocationJobCodesType $getRepairOrderJobCodesResult)
    {
        $this->getRepairOrderJobCodesResult = $getRepairOrderJobCodesResult;

        return $this;
    }
}

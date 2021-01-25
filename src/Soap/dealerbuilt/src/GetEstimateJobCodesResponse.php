<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetEstimateJobCodesResponse
 */
class GetEstimateJobCodesResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPotentialJobCodesType $getEstimateJobCodesResult
     */
    private $getEstimateJobCodesResult = null;

    /**
     * Gets as getEstimateJobCodesResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPotentialJobCodesType
     */
    public function getGetEstimateJobCodesResult()
    {
        return $this->getEstimateJobCodesResult;
    }

    /**
     * Sets a new getEstimateJobCodesResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPotentialJobCodesType $getEstimateJobCodesResult
     * @return self
     */
    public function setGetEstimateJobCodesResult(\App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPotentialJobCodesType $getEstimateJobCodesResult)
    {
        $this->getEstimateJobCodesResult = $getEstimateJobCodesResult;
        return $this;
    }


}


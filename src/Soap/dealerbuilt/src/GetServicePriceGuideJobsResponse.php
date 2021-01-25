<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetServicePriceGuideJobsResponse.
 */
class GetServicePriceGuideJobsResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPotentialJobCodesType
     */
    private $getServicePriceGuideJobsResult = null;

    /**
     * Gets as getServicePriceGuideJobsResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPotentialJobCodesType
     */
    public function getGetServicePriceGuideJobsResult()
    {
        return $this->getServicePriceGuideJobsResult;
    }

    /**
     * Sets a new getServicePriceGuideJobsResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPotentialJobCodesType $getServicePriceGuideJobsResult
     *
     * @return self
     */
    public function setGetServicePriceGuideJobsResult(BaseApi\ServiceLocationPotentialJobCodesType $getServicePriceGuideJobsResult)
    {
        $this->getServicePriceGuideJobsResult = $getServicePriceGuideJobsResult;

        return $this;
    }
}

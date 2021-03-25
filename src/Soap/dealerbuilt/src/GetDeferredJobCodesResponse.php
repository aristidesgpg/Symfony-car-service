<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetDeferredJobCodesResponse
 */
class GetDeferredJobCodesResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPotentialJobCodesType $getDeferredJobCodesResult
     */
    private $getDeferredJobCodesResult = null;

    /**
     * Gets as getDeferredJobCodesResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPotentialJobCodesType
     */
    public function getGetDeferredJobCodesResult()
    {
        return $this->getDeferredJobCodesResult;
    }

    /**
     * Sets a new getDeferredJobCodesResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPotentialJobCodesType $getDeferredJobCodesResult
     * @return self
     */
    public function setGetDeferredJobCodesResult(\App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPotentialJobCodesType $getDeferredJobCodesResult)
    {
        $this->getDeferredJobCodesResult = $getDeferredJobCodesResult;
        return $this;
    }


}


<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetDealerFeesResponse
 */
class GetDealerFeesResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DealerFeeCollectionType $getDealerFeesResult
     */
    private $getDealerFeesResult = null;

    /**
     * Gets as getDealerFeesResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DealerFeeCollectionType
     */
    public function getGetDealerFeesResult()
    {
        return $this->getDealerFeesResult;
    }

    /**
     * Sets a new getDealerFeesResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DealerFeeCollectionType $getDealerFeesResult
     * @return self
     */
    public function setGetDealerFeesResult(\App\Soap\dealerbuilt\src\BaseApi\DealerFeeCollectionType $getDealerFeesResult)
    {
        $this->getDealerFeesResult = $getDealerFeesResult;
        return $this;
    }


}


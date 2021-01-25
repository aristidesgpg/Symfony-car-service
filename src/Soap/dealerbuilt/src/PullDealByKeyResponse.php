<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullDealByKeyResponse.
 */
class PullDealByKeyResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DealType
     */
    private $pullDealByKeyResult = null;

    /**
     * Gets as pullDealByKeyResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DealType
     */
    public function getPullDealByKeyResult()
    {
        return $this->pullDealByKeyResult;
    }

    /**
     * Sets a new pullDealByKeyResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DealType $pullDealByKeyResult
     *
     * @return self
     */
    public function setPullDealByKeyResult(BaseApi\DealType $pullDealByKeyResult)
    {
        $this->pullDealByKeyResult = $pullDealByKeyResult;

        return $this;
    }
}

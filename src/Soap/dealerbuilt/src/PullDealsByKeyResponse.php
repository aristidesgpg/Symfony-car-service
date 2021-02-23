<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullDealsByKeyResponse
 */
class PullDealsByKeyResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DealType[] $pullDealsByKeyResult
     */
    private $pullDealsByKeyResult = null;

    /**
     * Adds as deal
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\DealType $deal
     */
    public function addToPullDealsByKeyResult(\App\Soap\dealerbuilt\src\BaseApi\DealType $deal)
    {
        $this->pullDealsByKeyResult[] = $deal;
        return $this;
    }

    /**
     * isset pullDealsByKeyResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullDealsByKeyResult($index)
    {
        return isset($this->pullDealsByKeyResult[$index]);
    }

    /**
     * unset pullDealsByKeyResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullDealsByKeyResult($index)
    {
        unset($this->pullDealsByKeyResult[$index]);
    }

    /**
     * Gets as pullDealsByKeyResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DealType[]
     */
    public function getPullDealsByKeyResult()
    {
        return $this->pullDealsByKeyResult;
    }

    /**
     * Sets a new pullDealsByKeyResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DealType[] $pullDealsByKeyResult
     * @return self
     */
    public function setPullDealsByKeyResult(array $pullDealsByKeyResult)
    {
        $this->pullDealsByKeyResult = $pullDealsByKeyResult;
        return $this;
    }


}


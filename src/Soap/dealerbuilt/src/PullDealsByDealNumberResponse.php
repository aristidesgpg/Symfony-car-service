<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullDealsByDealNumberResponse.
 */
class PullDealsByDealNumberResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DealType[]
     */
    private $pullDealsByDealNumberResult = null;

    /**
     * Adds as deal.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DealType $deal
     */
    public function addToPullDealsByDealNumberResult(BaseApi\DealType $deal)
    {
        $this->pullDealsByDealNumberResult[] = $deal;

        return $this;
    }

    /**
     * isset pullDealsByDealNumberResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPullDealsByDealNumberResult($index)
    {
        return isset($this->pullDealsByDealNumberResult[$index]);
    }

    /**
     * unset pullDealsByDealNumberResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPullDealsByDealNumberResult($index)
    {
        unset($this->pullDealsByDealNumberResult[$index]);
    }

    /**
     * Gets as pullDealsByDealNumberResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DealType[]
     */
    public function getPullDealsByDealNumberResult()
    {
        return $this->pullDealsByDealNumberResult;
    }

    /**
     * Sets a new pullDealsByDealNumberResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DealType[] $pullDealsByDealNumberResult
     *
     * @return self
     */
    public function setPullDealsByDealNumberResult(array $pullDealsByDealNumberResult)
    {
        $this->pullDealsByDealNumberResult = $pullDealsByDealNumberResult;

        return $this;
    }
}

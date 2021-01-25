<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullDealsFullResponse.
 */
class PullDealsFullResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DealType[]
     */
    private $pullDealsFullResult = null;

    /**
     * Adds as deal.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DealType $deal
     */
    public function addToPullDealsFullResult(BaseApi\DealType $deal)
    {
        $this->pullDealsFullResult[] = $deal;

        return $this;
    }

    /**
     * isset pullDealsFullResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPullDealsFullResult($index)
    {
        return isset($this->pullDealsFullResult[$index]);
    }

    /**
     * unset pullDealsFullResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPullDealsFullResult($index)
    {
        unset($this->pullDealsFullResult[$index]);
    }

    /**
     * Gets as pullDealsFullResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DealType[]
     */
    public function getPullDealsFullResult()
    {
        return $this->pullDealsFullResult;
    }

    /**
     * Sets a new pullDealsFullResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DealType[] $pullDealsFullResult
     *
     * @return self
     */
    public function setPullDealsFullResult(array $pullDealsFullResult)
    {
        $this->pullDealsFullResult = $pullDealsFullResult;

        return $this;
    }
}

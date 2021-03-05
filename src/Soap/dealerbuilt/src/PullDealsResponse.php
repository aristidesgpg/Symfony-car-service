<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullDealsResponse
 */
class PullDealsResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DealType[] $pullDealsResult
     */
    private $pullDealsResult = null;

    /**
     * Adds as deal
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\DealType $deal
     */
    public function addToPullDealsResult(\App\Soap\dealerbuilt\src\BaseApi\DealType $deal)
    {
        $this->pullDealsResult[] = $deal;
        return $this;
    }

    /**
     * isset pullDealsResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullDealsResult($index)
    {
        return isset($this->pullDealsResult[$index]);
    }

    /**
     * unset pullDealsResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullDealsResult($index)
    {
        unset($this->pullDealsResult[$index]);
    }

    /**
     * Gets as pullDealsResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DealType[]
     */
    public function getPullDealsResult()
    {
        return $this->pullDealsResult;
    }

    /**
     * Sets a new pullDealsResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DealType[] $pullDealsResult
     * @return self
     */
    public function setPullDealsResult(array $pullDealsResult)
    {
        $this->pullDealsResult = $pullDealsResult;
        return $this;
    }


}


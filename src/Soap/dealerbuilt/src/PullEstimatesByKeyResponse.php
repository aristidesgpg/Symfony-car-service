<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullEstimatesByKeyResponse.
 */
class PullEstimatesByKeyResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\EstimateType[]
     */
    private $pullEstimatesByKeyResult = null;

    /**
     * Adds as estimate.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\EstimateType $estimate
     */
    public function addToPullEstimatesByKeyResult(BaseApi\EstimateType $estimate)
    {
        $this->pullEstimatesByKeyResult[] = $estimate;

        return $this;
    }

    /**
     * isset pullEstimatesByKeyResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPullEstimatesByKeyResult($index)
    {
        return isset($this->pullEstimatesByKeyResult[$index]);
    }

    /**
     * unset pullEstimatesByKeyResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPullEstimatesByKeyResult($index)
    {
        unset($this->pullEstimatesByKeyResult[$index]);
    }

    /**
     * Gets as pullEstimatesByKeyResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\EstimateType[]
     */
    public function getPullEstimatesByKeyResult()
    {
        return $this->pullEstimatesByKeyResult;
    }

    /**
     * Sets a new pullEstimatesByKeyResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\EstimateType[] $pullEstimatesByKeyResult
     *
     * @return self
     */
    public function setPullEstimatesByKeyResult(array $pullEstimatesByKeyResult)
    {
        $this->pullEstimatesByKeyResult = $pullEstimatesByKeyResult;

        return $this;
    }
}

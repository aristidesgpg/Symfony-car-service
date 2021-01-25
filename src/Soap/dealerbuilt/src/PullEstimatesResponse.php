<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullEstimatesResponse
 */
class PullEstimatesResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\EstimateType[] $pullEstimatesResult
     */
    private $pullEstimatesResult = null;

    /**
     * Adds as estimate
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\EstimateType $estimate
     */
    public function addToPullEstimatesResult(\App\Soap\dealerbuilt\src\BaseApi\EstimateType $estimate)
    {
        $this->pullEstimatesResult[] = $estimate;
        return $this;
    }

    /**
     * isset pullEstimatesResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullEstimatesResult($index)
    {
        return isset($this->pullEstimatesResult[$index]);
    }

    /**
     * unset pullEstimatesResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullEstimatesResult($index)
    {
        unset($this->pullEstimatesResult[$index]);
    }

    /**
     * Gets as pullEstimatesResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\EstimateType[]
     */
    public function getPullEstimatesResult()
    {
        return $this->pullEstimatesResult;
    }

    /**
     * Sets a new pullEstimatesResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\EstimateType[] $pullEstimatesResult
     * @return self
     */
    public function setPullEstimatesResult(array $pullEstimatesResult)
    {
        $this->pullEstimatesResult = $pullEstimatesResult;
        return $this;
    }


}


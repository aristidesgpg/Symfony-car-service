<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullEstimateByKeyResponse.
 */
class PullEstimateByKeyResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\EstimateType
     */
    private $pullEstimateByKeyResult = null;

    /**
     * Gets as pullEstimateByKeyResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\EstimateType
     */
    public function getPullEstimateByKeyResult()
    {
        return $this->pullEstimateByKeyResult;
    }

    /**
     * Sets a new pullEstimateByKeyResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\EstimateType $pullEstimateByKeyResult
     *
     * @return self
     */
    public function setPullEstimateByKeyResult(BaseApi\EstimateType $pullEstimateByKeyResult)
    {
        $this->pullEstimateByKeyResult = $pullEstimateByKeyResult;

        return $this;
    }
}

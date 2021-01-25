<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullEstimateByNumberResponse
 */
class PullEstimateByNumberResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\EstimateType $pullEstimateByNumberResult
     */
    private $pullEstimateByNumberResult = null;

    /**
     * Gets as pullEstimateByNumberResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\EstimateType
     */
    public function getPullEstimateByNumberResult()
    {
        return $this->pullEstimateByNumberResult;
    }

    /**
     * Sets a new pullEstimateByNumberResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\EstimateType $pullEstimateByNumberResult
     * @return self
     */
    public function setPullEstimateByNumberResult(\App\Soap\dealerbuilt\src\BaseApi\EstimateType $pullEstimateByNumberResult)
    {
        $this->pullEstimateByNumberResult = $pullEstimateByNumberResult;
        return $this;
    }


}


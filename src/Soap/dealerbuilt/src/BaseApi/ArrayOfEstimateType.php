<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfEstimateType.
 *
 * XSD Type: ArrayOfEstimate
 */
class ArrayOfEstimateType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\EstimateType[]
     */
    private $estimate = [
    ];

    /**
     * Adds as estimate.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\EstimateType $estimate
     */
    public function addToEstimate(EstimateType $estimate)
    {
        $this->estimate[] = $estimate;

        return $this;
    }

    /**
     * isset estimate.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetEstimate($index)
    {
        return isset($this->estimate[$index]);
    }

    /**
     * unset estimate.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetEstimate($index)
    {
        unset($this->estimate[$index]);
    }

    /**
     * Gets as estimate.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\EstimateType[]
     */
    public function getEstimate()
    {
        return $this->estimate;
    }

    /**
     * Sets a new estimate.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\EstimateType[] $estimate
     *
     * @return self
     */
    public function setEstimate(array $estimate)
    {
        $this->estimate = $estimate;

        return $this;
    }
}

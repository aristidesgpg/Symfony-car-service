<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfEstimateJobType.
 *
 * XSD Type: ArrayOfEstimateJob
 */
class ArrayOfEstimateJobType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\EstimateJobType[]
     */
    private $estimateJob = [
    ];

    /**
     * Adds as estimateJob.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\EstimateJobType $estimateJob
     */
    public function addToEstimateJob(EstimateJobType $estimateJob)
    {
        $this->estimateJob[] = $estimateJob;

        return $this;
    }

    /**
     * isset estimateJob.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetEstimateJob($index)
    {
        return isset($this->estimateJob[$index]);
    }

    /**
     * unset estimateJob.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetEstimateJob($index)
    {
        unset($this->estimateJob[$index]);
    }

    /**
     * Gets as estimateJob.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\EstimateJobType[]
     */
    public function getEstimateJob()
    {
        return $this->estimateJob;
    }

    /**
     * Sets a new estimateJob.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\EstimateJobType[] $estimateJob
     *
     * @return self
     */
    public function setEstimateJob(array $estimateJob)
    {
        $this->estimateJob = $estimateJob;

        return $this;
    }
}

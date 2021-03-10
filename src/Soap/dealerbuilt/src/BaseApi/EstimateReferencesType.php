<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing EstimateReferencesType
 *
 * 
 * XSD Type: EstimateReferences
 */
class EstimateReferencesType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerType $estimateCustomer
     */
    private $estimateCustomer = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType $estimateVehicle
     */
    private $estimateVehicle = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\EstimateJobType[] $jobs
     */
    private $jobs = null;

    /**
     * Gets as estimateCustomer
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerType
     */
    public function getEstimateCustomer()
    {
        return $this->estimateCustomer;
    }

    /**
     * Sets a new estimateCustomer
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerType $estimateCustomer
     * @return self
     */
    public function setEstimateCustomer(\App\Soap\dealerbuilt\src\BaseApi\CustomerType $estimateCustomer)
    {
        $this->estimateCustomer = $estimateCustomer;
        return $this;
    }

    /**
     * Gets as estimateVehicle
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType
     */
    public function getEstimateVehicle()
    {
        return $this->estimateVehicle;
    }

    /**
     * Sets a new estimateVehicle
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType $estimateVehicle
     * @return self
     */
    public function setEstimateVehicle(\App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType $estimateVehicle)
    {
        $this->estimateVehicle = $estimateVehicle;
        return $this;
    }

    /**
     * Adds as estimateJob
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\EstimateJobType $estimateJob
     */
    public function addToJobs(\App\Soap\dealerbuilt\src\BaseApi\EstimateJobType $estimateJob)
    {
        $this->jobs[] = $estimateJob;
        return $this;
    }

    /**
     * isset jobs
     *
     * @param int|string $index
     * @return bool
     */
    public function issetJobs($index)
    {
        return isset($this->jobs[$index]);
    }

    /**
     * unset jobs
     *
     * @param int|string $index
     * @return void
     */
    public function unsetJobs($index)
    {
        unset($this->jobs[$index]);
    }

    /**
     * Gets as jobs
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\EstimateJobType[]
     */
    public function getJobs()
    {
        return $this->jobs;
    }

    /**
     * Sets a new jobs
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\EstimateJobType[] $jobs
     * @return self
     */
    public function setJobs(array $jobs)
    {
        $this->jobs = $jobs;
        return $this;
    }


}


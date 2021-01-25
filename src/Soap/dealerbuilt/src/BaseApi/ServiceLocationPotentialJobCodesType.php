<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ServiceLocationPotentialJobCodesType.
 *
 * XSD Type: ServiceLocationPotentialJobCodes
 */
class ServiceLocationPotentialJobCodesType extends ApiServiceLocationItemType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialJobAttributesType[]
     */
    private $jobs = null;

    /**
     * Adds as pushedPotentialJobAttributes.
     *
     * @return self
     */
    public function addToJobs(\App\Soap\dealerbuilt\src\Models\Service\PushedPotentialJobAttributesType $pushedPotentialJobAttributes)
    {
        $this->jobs[] = $pushedPotentialJobAttributes;

        return $this;
    }

    /**
     * isset jobs.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetJobs($index)
    {
        return isset($this->jobs[$index]);
    }

    /**
     * unset jobs.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetJobs($index)
    {
        unset($this->jobs[$index]);
    }

    /**
     * Gets as jobs.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialJobAttributesType[]
     */
    public function getJobs()
    {
        return $this->jobs;
    }

    /**
     * Sets a new jobs.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialJobAttributesType[] $jobs
     *
     * @return self
     */
    public function setJobs(array $jobs)
    {
        $this->jobs = $jobs;

        return $this;
    }
}

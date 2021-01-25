<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PotentialJobPushRequestType.
 *
 * XSD Type: PotentialJobPushRequest
 */
class PotentialJobPushRequestType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialJobAttributesType
     */
    private $job = null;

    /**
     * @var string
     */
    private $jobKey = null;

    /**
     * @var int
     */
    private $serviceLocationId = null;

    /**
     * Gets as job.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialJobAttributesType
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Sets a new job.
     *
     * @return self
     */
    public function setJob(\App\Soap\dealerbuilt\src\Models\Service\PushedPotentialJobAttributesType $job)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * Gets as jobKey.
     *
     * @return string
     */
    public function getJobKey()
    {
        return $this->jobKey;
    }

    /**
     * Sets a new jobKey.
     *
     * @param string $jobKey
     *
     * @return self
     */
    public function setJobKey($jobKey)
    {
        $this->jobKey = $jobKey;

        return $this;
    }

    /**
     * Gets as serviceLocationId.
     *
     * @return int
     */
    public function getServiceLocationId()
    {
        return $this->serviceLocationId;
    }

    /**
     * Sets a new serviceLocationId.
     *
     * @param int $serviceLocationId
     *
     * @return self
     */
    public function setServiceLocationId($serviceLocationId)
    {
        $this->serviceLocationId = $serviceLocationId;

        return $this;
    }
}

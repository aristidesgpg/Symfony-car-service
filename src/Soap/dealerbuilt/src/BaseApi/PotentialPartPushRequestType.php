<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PotentialPartPushRequestType.
 *
 * XSD Type: PotentialPartPushRequest
 */
class PotentialPartPushRequestType
{
    /**
     * @var string
     */
    private $jobKey = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialPartAttributesType
     */
    private $part = null;

    /**
     * @var int
     */
    private $serviceLocationId = null;

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
     * Gets as part.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialPartAttributesType
     */
    public function getPart()
    {
        return $this->part;
    }

    /**
     * Sets a new part.
     *
     * @return self
     */
    public function setPart(\App\Soap\dealerbuilt\src\Models\Service\PushedPotentialPartAttributesType $part)
    {
        $this->part = $part;

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

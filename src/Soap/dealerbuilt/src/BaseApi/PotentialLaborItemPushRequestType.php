<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PotentialLaborItemPushRequestType
 *
 * 
 * XSD Type: PotentialLaborItemPushRequest
 */
class PotentialLaborItemPushRequestType
{

    /**
     * @var string $jobKey
     */
    private $jobKey = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PushedPotentialLaborItemType $laborItem
     */
    private $laborItem = null;

    /**
     * @var int $serviceLocationId
     */
    private $serviceLocationId = null;

    /**
     * Gets as jobKey
     *
     * @return string
     */
    public function getJobKey()
    {
        return $this->jobKey;
    }

    /**
     * Sets a new jobKey
     *
     * @param string $jobKey
     * @return self
     */
    public function setJobKey($jobKey)
    {
        $this->jobKey = $jobKey;
        return $this;
    }

    /**
     * Gets as laborItem
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PushedPotentialLaborItemType
     */
    public function getLaborItem()
    {
        return $this->laborItem;
    }

    /**
     * Sets a new laborItem
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PushedPotentialLaborItemType $laborItem
     * @return self
     */
    public function setLaborItem(\App\Soap\dealerbuilt\src\BaseApi\PushedPotentialLaborItemType $laborItem)
    {
        $this->laborItem = $laborItem;
        return $this;
    }

    /**
     * Gets as serviceLocationId
     *
     * @return int
     */
    public function getServiceLocationId()
    {
        return $this->serviceLocationId;
    }

    /**
     * Sets a new serviceLocationId
     *
     * @param int $serviceLocationId
     * @return self
     */
    public function setServiceLocationId($serviceLocationId)
    {
        $this->serviceLocationId = $serviceLocationId;
        return $this;
    }


}


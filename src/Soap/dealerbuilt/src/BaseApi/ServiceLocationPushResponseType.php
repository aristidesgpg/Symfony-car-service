<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ServiceLocationPushResponseType
 *
 * 
 * XSD Type: ServiceLocationPushResponse
 */
class ServiceLocationPushResponseType extends PushResponseType
{

    /**
     * @var int $serviceLocationId
     */
    private $serviceLocationId = null;

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


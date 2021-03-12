<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PartsOrderPushResponseType
 *
 * 
 * XSD Type: PartsOrderPushResponse
 */
class PartsOrderPushResponseType extends PushResponseType
{

    /**
     * @var string $partsOrderNumber
     */
    private $partsOrderNumber = null;

    /**
     * @var int $serviceLocationId
     */
    private $serviceLocationId = null;

    /**
     * Gets as partsOrderNumber
     *
     * @return string
     */
    public function getPartsOrderNumber()
    {
        return $this->partsOrderNumber;
    }

    /**
     * Sets a new partsOrderNumber
     *
     * @param string $partsOrderNumber
     * @return self
     */
    public function setPartsOrderNumber($partsOrderNumber)
    {
        $this->partsOrderNumber = $partsOrderNumber;
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


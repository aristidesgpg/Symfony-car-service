<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PotentialLaborOperationSubletPushRequestType.
 *
 * XSD Type: PotentialLaborOperationSubletPushRequest
 */
class PotentialLaborOperationSubletPushRequestType
{
    /**
     * @var string
     */
    private $laborItemKey = null;

    /**
     * @var int
     */
    private $serviceLocationId = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PushedPotentialLaborOperationSubletType
     */
    private $sublet = null;

    /**
     * @var string
     */
    private $subletKey = null;

    /**
     * Gets as laborItemKey.
     *
     * @return string
     */
    public function getLaborItemKey()
    {
        return $this->laborItemKey;
    }

    /**
     * Sets a new laborItemKey.
     *
     * @param string $laborItemKey
     *
     * @return self
     */
    public function setLaborItemKey($laborItemKey)
    {
        $this->laborItemKey = $laborItemKey;

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

    /**
     * Gets as sublet.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PushedPotentialLaborOperationSubletType
     */
    public function getSublet()
    {
        return $this->sublet;
    }

    /**
     * Sets a new sublet.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PushedPotentialLaborOperationSubletType $sublet
     *
     * @return self
     */
    public function setSublet(PushedPotentialLaborOperationSubletType $sublet)
    {
        $this->sublet = $sublet;

        return $this;
    }

    /**
     * Gets as subletKey.
     *
     * @return string
     */
    public function getSubletKey()
    {
        return $this->subletKey;
    }

    /**
     * Sets a new subletKey.
     *
     * @param string $subletKey
     *
     * @return self
     */
    public function setSubletKey($subletKey)
    {
        $this->subletKey = $subletKey;

        return $this;
    }
}

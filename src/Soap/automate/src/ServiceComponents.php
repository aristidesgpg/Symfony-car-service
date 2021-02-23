<?php

namespace App\Soap\automate\src;

/**
 * Class representing ServiceComponents
 */
class ServiceComponents
{

    /**
     * @var string $componentTypeCode
     */
    private $componentTypeCode = null;

    /**
     * @var string $serviceDescription
     */
    private $serviceDescription = null;

    /**
     * @var \App\Soap\automate\src\Pricing $pricing
     */
    private $pricing = null;

    /**
     * @var float $itemQuantity
     */
    private $itemQuantity = null;

    /**
     * Gets as componentTypeCode
     *
     * @return string
     */
    public function getComponentTypeCode()
    {
        return $this->componentTypeCode;
    }

    /**
     * Sets a new componentTypeCode
     *
     * @param string $componentTypeCode
     * @return self
     */
    public function setComponentTypeCode($componentTypeCode)
    {
        $this->componentTypeCode = $componentTypeCode;
        return $this;
    }

    /**
     * Gets as serviceDescription
     *
     * @return string
     */
    public function getServiceDescription()
    {
        return $this->serviceDescription;
    }

    /**
     * Sets a new serviceDescription
     *
     * @param string $serviceDescription
     * @return self
     */
    public function setServiceDescription($serviceDescription)
    {
        $this->serviceDescription = $serviceDescription;
        return $this;
    }

    /**
     * Gets as pricing
     *
     * @return \App\Soap\automate\src\Pricing
     */
    public function getPricing()
    {
        return $this->pricing;
    }

    /**
     * Sets a new pricing
     *
     * @param \App\Soap\automate\src\Pricing $pricing
     * @return self
     */
    public function setPricing(\App\Soap\automate\src\Pricing $pricing)
    {
        $this->pricing = $pricing;
        return $this;
    }

    /**
     * Gets as itemQuantity
     *
     * @return float
     */
    public function getItemQuantity()
    {
        return $this->itemQuantity;
    }

    /**
     * Sets a new itemQuantity
     *
     * @param float $itemQuantity
     * @return self
     */
    public function setItemQuantity($itemQuantity)
    {
        $this->itemQuantity = $itemQuantity;
        return $this;
    }


}


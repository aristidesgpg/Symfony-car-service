<?php

namespace App\Soap\automate\src;

/**
 * Class representing Sublet
 */
class Sublet
{

    /**
     * @var \App\Soap\automate\src\Pricing[] $pricing
     */
    private $pricing = [
        
    ];

    /**
     * @var \App\Soap\automate\src\SubletCode $subletCode
     */
    private $subletCode = null;

    /**
     * @var string $subletWorkDescription
     */
    private $subletWorkDescription = null;

    /**
     * @var string $providerName
     */
    private $providerName = null;

    /**
     * Adds as pricing
     *
     * @return self
     * @param \App\Soap\automate\src\Pricing $pricing
     */
    public function addToPricing(\App\Soap\automate\src\Pricing $pricing)
    {
        $this->pricing[] = $pricing;
        return $this;
    }

    /**
     * isset pricing
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPricing($index)
    {
        return isset($this->pricing[$index]);
    }

    /**
     * unset pricing
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPricing($index)
    {
        unset($this->pricing[$index]);
    }

    /**
     * Gets as pricing
     *
     * @return \App\Soap\automate\src\Pricing[]
     */
    public function getPricing()
    {
        return $this->pricing;
    }

    /**
     * Sets a new pricing
     *
     * @param \App\Soap\automate\src\Pricing[] $pricing
     * @return self
     */
    public function setPricing(array $pricing)
    {
        $this->pricing = $pricing;
        return $this;
    }

    /**
     * Gets as subletCode
     *
     * @return \App\Soap\automate\src\SubletCode
     */
    public function getSubletCode()
    {
        return $this->subletCode;
    }

    /**
     * Sets a new subletCode
     *
     * @param \App\Soap\automate\src\SubletCode $subletCode
     * @return self
     */
    public function setSubletCode(\App\Soap\automate\src\SubletCode $subletCode)
    {
        $this->subletCode = $subletCode;
        return $this;
    }

    /**
     * Gets as subletWorkDescription
     *
     * @return string
     */
    public function getSubletWorkDescription()
    {
        return $this->subletWorkDescription;
    }

    /**
     * Sets a new subletWorkDescription
     *
     * @param string $subletWorkDescription
     * @return self
     */
    public function setSubletWorkDescription($subletWorkDescription)
    {
        $this->subletWorkDescription = $subletWorkDescription;
        return $this;
    }

    /**
     * Gets as providerName
     *
     * @return string
     */
    public function getProviderName()
    {
        return $this->providerName;
    }

    /**
     * Sets a new providerName
     *
     * @param string $providerName
     * @return self
     */
    public function setProviderName($providerName)
    {
        $this->providerName = $providerName;
        return $this;
    }


}


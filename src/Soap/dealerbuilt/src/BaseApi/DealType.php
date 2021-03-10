<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing DealType
 *
 * 
 * XSD Type: Deal
 */
class DealType extends ApiStoreItemType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\DealAttributesType $attributes
     */
    private $attributes = null;

    /**
     * @var string $dealKey
     */
    private $dealKey = null;

    /**
     * @var int $dealNumber
     */
    private $dealNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ApiDealReferencesType $references
     */
    private $references = null;

    /**
     * Gets as attributes
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\DealAttributesType
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Sets a new attributes
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\DealAttributesType $attributes
     * @return self
     */
    public function setAttributes(\App\Soap\dealerbuilt\src\Models\Sales\DealAttributesType $attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * Gets as dealKey
     *
     * @return string
     */
    public function getDealKey()
    {
        return $this->dealKey;
    }

    /**
     * Sets a new dealKey
     *
     * @param string $dealKey
     * @return self
     */
    public function setDealKey($dealKey)
    {
        $this->dealKey = $dealKey;
        return $this;
    }

    /**
     * Gets as dealNumber
     *
     * @return int
     */
    public function getDealNumber()
    {
        return $this->dealNumber;
    }

    /**
     * Sets a new dealNumber
     *
     * @param int $dealNumber
     * @return self
     */
    public function setDealNumber($dealNumber)
    {
        $this->dealNumber = $dealNumber;
        return $this;
    }

    /**
     * Gets as references
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ApiDealReferencesType
     */
    public function getReferences()
    {
        return $this->references;
    }

    /**
     * Sets a new references
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ApiDealReferencesType $references
     * @return self
     */
    public function setReferences(\App\Soap\dealerbuilt\src\BaseApi\ApiDealReferencesType $references)
    {
        $this->references = $references;
        return $this;
    }


}


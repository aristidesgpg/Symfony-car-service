<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PartsOrderType
 *
 * 
 * XSD Type: PartsOrder
 */
class PartsOrderType extends ApiServiceLocationItemType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Parts\PartsOrderAttributesType $attributes
     */
    private $attributes = null;

    /**
     * @var string $partsOrderKey
     */
    private $partsOrderKey = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PartsOrderReferencesType $references
     */
    private $references = null;

    /**
     * Gets as attributes
     *
     * @return \App\Soap\dealerbuilt\src\Models\Parts\PartsOrderAttributesType
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Sets a new attributes
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\PartsOrderAttributesType $attributes
     * @return self
     */
    public function setAttributes(\App\Soap\dealerbuilt\src\Models\Parts\PartsOrderAttributesType $attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * Gets as partsOrderKey
     *
     * @return string
     */
    public function getPartsOrderKey()
    {
        return $this->partsOrderKey;
    }

    /**
     * Sets a new partsOrderKey
     *
     * @param string $partsOrderKey
     * @return self
     */
    public function setPartsOrderKey($partsOrderKey)
    {
        $this->partsOrderKey = $partsOrderKey;
        return $this;
    }

    /**
     * Gets as references
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PartsOrderReferencesType
     */
    public function getReferences()
    {
        return $this->references;
    }

    /**
     * Sets a new references
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsOrderReferencesType $references
     * @return self
     */
    public function setReferences(\App\Soap\dealerbuilt\src\BaseApi\PartsOrderReferencesType $references)
    {
        $this->references = $references;
        return $this;
    }


}


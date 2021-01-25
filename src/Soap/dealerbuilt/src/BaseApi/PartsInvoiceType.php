<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PartsInvoiceType
 *
 * 
 * XSD Type: PartsInvoice
 */
class PartsInvoiceType extends ApiServiceLocationItemType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Parts\PartsInvoiceAttributesType $attributes
     */
    private $attributes = null;

    /**
     * @var string $partsInvoiceKey
     */
    private $partsInvoiceKey = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PartsInvoiceReferencesType $references
     */
    private $references = null;

    /**
     * Gets as attributes
     *
     * @return \App\Soap\dealerbuilt\src\Models\Parts\PartsInvoiceAttributesType
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Sets a new attributes
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\PartsInvoiceAttributesType $attributes
     * @return self
     */
    public function setAttributes(\App\Soap\dealerbuilt\src\Models\Parts\PartsInvoiceAttributesType $attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * Gets as partsInvoiceKey
     *
     * @return string
     */
    public function getPartsInvoiceKey()
    {
        return $this->partsInvoiceKey;
    }

    /**
     * Sets a new partsInvoiceKey
     *
     * @param string $partsInvoiceKey
     * @return self
     */
    public function setPartsInvoiceKey($partsInvoiceKey)
    {
        $this->partsInvoiceKey = $partsInvoiceKey;
        return $this;
    }

    /**
     * Gets as references
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PartsInvoiceReferencesType
     */
    public function getReferences()
    {
        return $this->references;
    }

    /**
     * Sets a new references
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsInvoiceReferencesType $references
     * @return self
     */
    public function setReferences(\App\Soap\dealerbuilt\src\BaseApi\PartsInvoiceReferencesType $references)
    {
        $this->references = $references;
        return $this;
    }


}


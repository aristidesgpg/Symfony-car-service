<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing EstimateType.
 *
 * XSD Type: Estimate
 */
class EstimateType extends ApiServiceLocationItemType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\EstimateAttributesType
     */
    private $attributes = null;

    /**
     * @var string
     */
    private $estimateKey = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\EstimateReferencesType
     */
    private $references = null;

    /**
     * Gets as attributes.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\EstimateAttributesType
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Sets a new attributes.
     *
     * @return self
     */
    public function setAttributes(\App\Soap\dealerbuilt\src\Models\Service\EstimateAttributesType $attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Gets as estimateKey.
     *
     * @return string
     */
    public function getEstimateKey()
    {
        return $this->estimateKey;
    }

    /**
     * Sets a new estimateKey.
     *
     * @param string $estimateKey
     *
     * @return self
     */
    public function setEstimateKey($estimateKey)
    {
        $this->estimateKey = $estimateKey;

        return $this;
    }

    /**
     * Gets as references.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\EstimateReferencesType
     */
    public function getReferences()
    {
        return $this->references;
    }

    /**
     * Sets a new references.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\EstimateReferencesType $references
     *
     * @return self
     */
    public function setReferences(EstimateReferencesType $references)
    {
        $this->references = $references;

        return $this;
    }
}

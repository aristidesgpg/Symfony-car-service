<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing RepairOrderType
 *
 * 
 * XSD Type: RepairOrder
 */
class RepairOrderType extends ApiServiceLocationItemType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\RepairOrderAttributesType $attributes
     */
    private $attributes = null;

    /**
     * @var string $rOKey
     */
    private $rOKey = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\RepairOrderReferencesType $references
     */
    private $references = null;

    /**
     * Gets as attributes
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\RepairOrderAttributesType
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Sets a new attributes
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\RepairOrderAttributesType $attributes
     * @return self
     */
    public function setAttributes(\App\Soap\dealerbuilt\src\Models\Service\RepairOrderAttributesType $attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * Gets as rOKey
     *
     * @return string
     */
    public function getROKey()
    {
        return $this->rOKey;
    }

    /**
     * Sets a new rOKey
     *
     * @param string $rOKey
     * @return self
     */
    public function setROKey($rOKey)
    {
        $this->rOKey = $rOKey;
        return $this;
    }

    /**
     * Gets as references
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\RepairOrderReferencesType
     */
    public function getReferences()
    {
        return $this->references;
    }

    /**
     * Sets a new references
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderReferencesType $references
     * @return self
     */
    public function setReferences(\App\Soap\dealerbuilt\src\BaseApi\RepairOrderReferencesType $references)
    {
        $this->references = $references;
        return $this;
    }


}


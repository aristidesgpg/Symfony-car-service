<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

use App\Soap\dealerbuilt\src\Models\ServiceLocationItemType;

/**
 * Class representing RepairOrderType.
 *
 * XSD Type: RepairOrder
 */
class RepairOrderType extends ServiceLocationItemType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\RepairOrderAttributesType
     */
    private $attributes = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\RepairOrderReferencesType
     */
    private $references = null;

    /**
     * Gets as attributes.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\RepairOrderAttributesType
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Sets a new attributes.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\RepairOrderAttributesType $attributes
     *
     * @return self
     */
    public function setAttributes(RepairOrderAttributesType $attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Gets as references.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\RepairOrderReferencesType
     */
    public function getReferences()
    {
        return $this->references;
    }

    /**
     * Sets a new references.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\RepairOrderReferencesType $references
     *
     * @return self
     */
    public function setReferences(RepairOrderReferencesType $references)
    {
        $this->references = $references;

        return $this;
    }
}

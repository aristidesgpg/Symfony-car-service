<?php

namespace App\Soap\dealerbuilt\src\Models\Parts;

use App\Soap\dealerbuilt\src\Models\ServiceLocationItemType;

/**
 * Class representing InventoryPartType
 *
 * 
 * XSD Type: InventoryPart
 */
class InventoryPartType extends ServiceLocationItemType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Parts\InventoryPartAttributesType $attributes
     */
    private $attributes = null;

    /**
     * Gets as attributes
     *
     * @return \App\Soap\dealerbuilt\src\Models\Parts\InventoryPartAttributesType
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Sets a new attributes
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\InventoryPartAttributesType $attributes
     * @return self
     */
    public function setAttributes(\App\Soap\dealerbuilt\src\Models\Parts\InventoryPartAttributesType $attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }


}


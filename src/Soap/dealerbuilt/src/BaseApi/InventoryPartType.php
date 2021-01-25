<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing InventoryPartType
 *
 * 
 * XSD Type: InventoryPart
 */
class InventoryPartType extends ApiServiceLocationItemType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Parts\InventoryPartAttributesType $attributes
     */
    private $attributes = null;

    /**
     * @var string $partKey
     */
    private $partKey = null;

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

    /**
     * Gets as partKey
     *
     * @return string
     */
    public function getPartKey()
    {
        return $this->partKey;
    }

    /**
     * Sets a new partKey
     *
     * @param string $partKey
     * @return self
     */
    public function setPartKey($partKey)
    {
        $this->partKey = $partKey;
        return $this;
    }


}


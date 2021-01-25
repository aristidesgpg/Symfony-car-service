<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing LoggingType.
 *
 * XSD Type: Logging
 */
class LoggingType extends ApiSourceItemType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Logging\LogAttributesType
     */
    private $attributes = null;

    /**
     * @var string
     */
    private $inventoryKey = null;

    /**
     * Gets as attributes.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Logging\LogAttributesType
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
    public function setAttributes(\App\Soap\dealerbuilt\src\Models\Logging\LogAttributesType $attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Gets as inventoryKey.
     *
     * @return string
     */
    public function getInventoryKey()
    {
        return $this->inventoryKey;
    }

    /**
     * Sets a new inventoryKey.
     *
     * @param string $inventoryKey
     *
     * @return self
     */
    public function setInventoryKey($inventoryKey)
    {
        $this->inventoryKey = $inventoryKey;

        return $this;
    }
}

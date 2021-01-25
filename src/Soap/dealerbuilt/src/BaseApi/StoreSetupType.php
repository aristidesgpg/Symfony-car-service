<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing StoreSetupType.
 *
 * XSD Type: StoreSetup
 */
class StoreSetupType extends ApiStoreItemType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\StoreSetupAttributesType
     */
    private $attributes = null;

    /**
     * Gets as attributes.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\StoreSetupAttributesType
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
    public function setAttributes(\App\Soap\dealerbuilt\src\Models\Sales\StoreSetupAttributesType $attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }
}

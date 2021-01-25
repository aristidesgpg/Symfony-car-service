<?php

namespace App\Soap\dealerbuilt\src\Models\Customers;

use App\Soap\dealerbuilt\src\Models\SourceItemType;

/**
 * Class representing CustomerType.
 *
 * XSD Type: Customer
 */
class CustomerType extends SourceItemType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Customers\CustomerAttributesType
     */
    private $attributes = null;

    /**
     * @var int
     */
    private $customerId = null;

    /**
     * Gets as attributes.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Customers\CustomerAttributesType
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Sets a new attributes.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Customers\CustomerAttributesType $attributes
     *
     * @return self
     */
    public function setAttributes(CustomerAttributesType $attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Gets as customerId.
     *
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Sets a new customerId.
     *
     * @param int $customerId
     *
     * @return self
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }
}

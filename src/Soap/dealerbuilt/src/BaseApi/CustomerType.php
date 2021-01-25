<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing CustomerType
 *
 * 
 * XSD Type: Customer
 */
class CustomerType extends ApiSourceItemType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Customers\CustomerAttributesType $attributes
     */
    private $attributes = null;

    /**
     * @var string $customerId
     */
    private $customerId = null;

    /**
     * @var string $customerKey
     */
    private $customerKey = null;

    /**
     * Gets as attributes
     *
     * @return \App\Soap\dealerbuilt\src\Models\Customers\CustomerAttributesType
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Sets a new attributes
     *
     * @param \App\Soap\dealerbuilt\src\Models\Customers\CustomerAttributesType $attributes
     * @return self
     */
    public function setAttributes(\App\Soap\dealerbuilt\src\Models\Customers\CustomerAttributesType $attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * Gets as customerId
     *
     * @return string
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Sets a new customerId
     *
     * @param string $customerId
     * @return self
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
        return $this;
    }

    /**
     * Gets as customerKey
     *
     * @return string
     */
    public function getCustomerKey()
    {
        return $this->customerKey;
    }

    /**
     * Sets a new customerKey
     *
     * @param string $customerKey
     * @return self
     */
    public function setCustomerKey($customerKey)
    {
        $this->customerKey = $customerKey;
        return $this;
    }


}


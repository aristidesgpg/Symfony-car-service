<?php

namespace App\Soap\dealerbuilt\src\Models\Vehicles;

/**
 * Class representing CustomerVehicleReferencesType
 *
 * 
 * XSD Type: CustomerVehicleReferences
 */
class CustomerVehicleReferencesType
{

    /**
     * @var int $customerId
     */
    private $customerId = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Customers\CustomerType $owner
     */
    private $owner = null;

    /**
     * Gets as customerId
     *
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Sets a new customerId
     *
     * @param int $customerId
     * @return self
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
        return $this;
    }

    /**
     * Gets as owner
     *
     * @return \App\Soap\dealerbuilt\src\Models\Customers\CustomerType
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Sets a new owner
     *
     * @param \App\Soap\dealerbuilt\src\Models\Customers\CustomerType $owner
     * @return self
     */
    public function setOwner(\App\Soap\dealerbuilt\src\Models\Customers\CustomerType $owner)
    {
        $this->owner = $owner;
        return $this;
    }


}


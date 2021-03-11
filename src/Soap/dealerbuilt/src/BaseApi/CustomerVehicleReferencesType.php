<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing CustomerVehicleReferencesType
 *
 * 
 * XSD Type: CustomerVehicleReferences
 */
class CustomerVehicleReferencesType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerType $owner
     */
    private $owner = null;

    /**
     * @var string $stockNumber
     */
    private $stockNumber = null;

    /**
     * Gets as owner
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerType
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Sets a new owner
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerType $owner
     * @return self
     */
    public function setOwner(\App\Soap\dealerbuilt\src\BaseApi\CustomerType $owner)
    {
        $this->owner = $owner;
        return $this;
    }

    /**
     * Gets as stockNumber
     *
     * @return string
     */
    public function getStockNumber()
    {
        return $this->stockNumber;
    }

    /**
     * Sets a new stockNumber
     *
     * @param string $stockNumber
     * @return self
     */
    public function setStockNumber($stockNumber)
    {
        $this->stockNumber = $stockNumber;
        return $this;
    }


}


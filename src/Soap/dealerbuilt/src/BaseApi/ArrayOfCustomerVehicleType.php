<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfCustomerVehicleType
 *
 * 
 * XSD Type: ArrayOfCustomerVehicle
 */
class ArrayOfCustomerVehicleType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType[] $customerVehicle
     */
    private $customerVehicle = [
        
    ];

    /**
     * Adds as customerVehicle
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType $customerVehicle
     */
    public function addToCustomerVehicle(\App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType $customerVehicle)
    {
        $this->customerVehicle[] = $customerVehicle;
        return $this;
    }

    /**
     * isset customerVehicle
     *
     * @param int|string $index
     * @return bool
     */
    public function issetCustomerVehicle($index)
    {
        return isset($this->customerVehicle[$index]);
    }

    /**
     * unset customerVehicle
     *
     * @param int|string $index
     * @return void
     */
    public function unsetCustomerVehicle($index)
    {
        unset($this->customerVehicle[$index]);
    }

    /**
     * Gets as customerVehicle
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType[]
     */
    public function getCustomerVehicle()
    {
        return $this->customerVehicle;
    }

    /**
     * Sets a new customerVehicle
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType[] $customerVehicle
     * @return self
     */
    public function setCustomerVehicle(array $customerVehicle)
    {
        $this->customerVehicle = $customerVehicle;
        return $this;
    }


}


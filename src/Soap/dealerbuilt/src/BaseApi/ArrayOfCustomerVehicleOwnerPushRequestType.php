<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfCustomerVehicleOwnerPushRequestType
 *
 * 
 * XSD Type: ArrayOfCustomerVehicleOwnerPushRequest
 */
class ArrayOfCustomerVehicleOwnerPushRequestType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleOwnerPushRequestType[] $customerVehicleOwnerPushRequest
     */
    private $customerVehicleOwnerPushRequest = [
        
    ];

    /**
     * Adds as customerVehicleOwnerPushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleOwnerPushRequestType $customerVehicleOwnerPushRequest
     */
    public function addToCustomerVehicleOwnerPushRequest(\App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleOwnerPushRequestType $customerVehicleOwnerPushRequest)
    {
        $this->customerVehicleOwnerPushRequest[] = $customerVehicleOwnerPushRequest;
        return $this;
    }

    /**
     * isset customerVehicleOwnerPushRequest
     *
     * @param int|string $index
     * @return bool
     */
    public function issetCustomerVehicleOwnerPushRequest($index)
    {
        return isset($this->customerVehicleOwnerPushRequest[$index]);
    }

    /**
     * unset customerVehicleOwnerPushRequest
     *
     * @param int|string $index
     * @return void
     */
    public function unsetCustomerVehicleOwnerPushRequest($index)
    {
        unset($this->customerVehicleOwnerPushRequest[$index]);
    }

    /**
     * Gets as customerVehicleOwnerPushRequest
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleOwnerPushRequestType[]
     */
    public function getCustomerVehicleOwnerPushRequest()
    {
        return $this->customerVehicleOwnerPushRequest;
    }

    /**
     * Sets a new customerVehicleOwnerPushRequest
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleOwnerPushRequestType[] $customerVehicleOwnerPushRequest
     * @return self
     */
    public function setCustomerVehicleOwnerPushRequest(array $customerVehicleOwnerPushRequest)
    {
        $this->customerVehicleOwnerPushRequest = $customerVehicleOwnerPushRequest;
        return $this;
    }


}


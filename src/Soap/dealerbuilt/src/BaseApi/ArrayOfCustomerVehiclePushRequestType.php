<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfCustomerVehiclePushRequestType.
 *
 * XSD Type: ArrayOfCustomerVehiclePushRequest
 */
class ArrayOfCustomerVehiclePushRequestType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerVehiclePushRequestType[]
     */
    private $customerVehiclePushRequest = [
    ];

    /**
     * Adds as customerVehiclePushRequest.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehiclePushRequestType $customerVehiclePushRequest
     */
    public function addToCustomerVehiclePushRequest(CustomerVehiclePushRequestType $customerVehiclePushRequest)
    {
        $this->customerVehiclePushRequest[] = $customerVehiclePushRequest;

        return $this;
    }

    /**
     * isset customerVehiclePushRequest.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetCustomerVehiclePushRequest($index)
    {
        return isset($this->customerVehiclePushRequest[$index]);
    }

    /**
     * unset customerVehiclePushRequest.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetCustomerVehiclePushRequest($index)
    {
        unset($this->customerVehiclePushRequest[$index]);
    }

    /**
     * Gets as customerVehiclePushRequest.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerVehiclePushRequestType[]
     */
    public function getCustomerVehiclePushRequest()
    {
        return $this->customerVehiclePushRequest;
    }

    /**
     * Sets a new customerVehiclePushRequest.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehiclePushRequestType[] $customerVehiclePushRequest
     *
     * @return self
     */
    public function setCustomerVehiclePushRequest(array $customerVehiclePushRequest)
    {
        $this->customerVehiclePushRequest = $customerVehiclePushRequest;

        return $this;
    }
}

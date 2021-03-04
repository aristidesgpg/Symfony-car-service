<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfCustomerPushRequestType
 *
 * 
 * XSD Type: ArrayOfCustomerPushRequest
 */
class ArrayOfCustomerPushRequestType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerPushRequestType[] $customerPushRequest
     */
    private $customerPushRequest = [
        
    ];

    /**
     * Adds as customerPushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerPushRequestType $customerPushRequest
     */
    public function addToCustomerPushRequest(\App\Soap\dealerbuilt\src\BaseApi\CustomerPushRequestType $customerPushRequest)
    {
        $this->customerPushRequest[] = $customerPushRequest;
        return $this;
    }

    /**
     * isset customerPushRequest
     *
     * @param int|string $index
     * @return bool
     */
    public function issetCustomerPushRequest($index)
    {
        return isset($this->customerPushRequest[$index]);
    }

    /**
     * unset customerPushRequest
     *
     * @param int|string $index
     * @return void
     */
    public function unsetCustomerPushRequest($index)
    {
        unset($this->customerPushRequest[$index]);
    }

    /**
     * Gets as customerPushRequest
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerPushRequestType[]
     */
    public function getCustomerPushRequest()
    {
        return $this->customerPushRequest;
    }

    /**
     * Sets a new customerPushRequest
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerPushRequestType[] $customerPushRequest
     * @return self
     */
    public function setCustomerPushRequest(array $customerPushRequest)
    {
        $this->customerPushRequest = $customerPushRequest;
        return $this;
    }


}


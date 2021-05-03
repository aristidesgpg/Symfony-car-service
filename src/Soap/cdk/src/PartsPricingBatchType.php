<?php

namespace App\Soap\cdk\src;

/**
 * Class representing PartsPricingBatchType
 *
 * 
 * XSD Type: partsPricingBatch
 */
class PartsPricingBatchType
{

    /**
     * @var \App\Soap\cdk\src\AuthenticationTokenType $authToken
     */
    private $authToken = null;

    /**
     * @var \App\Soap\cdk\src\PartsInventoryPricingBatchRequestType[] $requests
     */
    private $requests = [
        
    ];

    /**
     * Gets as authToken
     *
     * @return \App\Soap\cdk\src\AuthenticationTokenType
     */
    public function getAuthToken()
    {
        return $this->authToken;
    }

    /**
     * Sets a new authToken
     *
     * @param \App\Soap\cdk\src\AuthenticationTokenType $authToken
     * @return self
     */
    public function setAuthToken(\App\Soap\cdk\src\AuthenticationTokenType $authToken)
    {
        $this->authToken = $authToken;
        return $this;
    }

    /**
     * Adds as requests
     *
     * @return self
     * @param \App\Soap\cdk\src\PartsInventoryPricingBatchRequestType $requests
     */
    public function addToRequests(\App\Soap\cdk\src\PartsInventoryPricingBatchRequestType $requests)
    {
        $this->requests[] = $requests;
        return $this;
    }

    /**
     * isset requests
     *
     * @param int|string $index
     * @return bool
     */
    public function issetRequests($index)
    {
        return isset($this->requests[$index]);
    }

    /**
     * unset requests
     *
     * @param int|string $index
     * @return void
     */
    public function unsetRequests($index)
    {
        unset($this->requests[$index]);
    }

    /**
     * Gets as requests
     *
     * @return \App\Soap\cdk\src\PartsInventoryPricingBatchRequestType[]
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * Sets a new requests
     *
     * @param \App\Soap\cdk\src\PartsInventoryPricingBatchRequestType[] $requests
     * @return self
     */
    public function setRequests(array $requests)
    {
        $this->requests = $requests;
        return $this;
    }


}


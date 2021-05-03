<?php

namespace App\Soap\cdk\src;

/**
 * Class representing PartsPricingType
 *
 * 
 * XSD Type: partsPricing
 */
class PartsPricingType
{

    /**
     * @var \App\Soap\cdk\src\AuthenticationTokenType $authToken
     */
    private $authToken = null;

    /**
     * @var \App\Soap\cdk\src\DealerIdType $dealerId
     */
    private $dealerId = null;

    /**
     * @var \App\Soap\cdk\src\PartsInventoryPricingRequestType $request
     */
    private $request = null;

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
     * Gets as dealerId
     *
     * @return \App\Soap\cdk\src\DealerIdType
     */
    public function getDealerId()
    {
        return $this->dealerId;
    }

    /**
     * Sets a new dealerId
     *
     * @param \App\Soap\cdk\src\DealerIdType $dealerId
     * @return self
     */
    public function setDealerId(\App\Soap\cdk\src\DealerIdType $dealerId)
    {
        $this->dealerId = $dealerId;
        return $this;
    }

    /**
     * Gets as request
     *
     * @return \App\Soap\cdk\src\PartsInventoryPricingRequestType
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Sets a new request
     *
     * @param \App\Soap\cdk\src\PartsInventoryPricingRequestType $request
     * @return self
     */
    public function setRequest(\App\Soap\cdk\src\PartsInventoryPricingRequestType $request)
    {
        $this->request = $request;
        return $this;
    }


}


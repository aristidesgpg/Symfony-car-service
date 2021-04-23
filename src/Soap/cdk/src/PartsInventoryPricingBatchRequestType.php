<?php

namespace App\Soap\cdk\src;

/**
 * Class representing PartsInventoryPricingBatchRequestType
 *
 * 
 * XSD Type: partsInventoryPricingBatchRequest
 */
class PartsInventoryPricingBatchRequestType extends PartsInventoryPricingRequestType
{

    /**
     * @var \App\Soap\cdk\src\DealerIdType $dealerId
     */
    private $dealerId = null;

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


}


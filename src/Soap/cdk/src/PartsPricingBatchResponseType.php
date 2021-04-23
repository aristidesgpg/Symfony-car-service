<?php

namespace App\Soap\cdk\src;

/**
 * Class representing PartsPricingBatchResponseType
 *
 * 
 * XSD Type: partsPricingBatchResponse
 */
class PartsPricingBatchResponseType
{

    /**
     * @var \App\Soap\cdk\src\PartsInventoryPricingResultContainerType $return
     */
    private $return = null;

    /**
     * Gets as return
     *
     * @return \App\Soap\cdk\src\PartsInventoryPricingResultContainerType
     */
    public function getReturn()
    {
        return $this->return;
    }

    /**
     * Sets a new return
     *
     * @param \App\Soap\cdk\src\PartsInventoryPricingResultContainerType $return
     * @return self
     */
    public function setReturn(\App\Soap\cdk\src\PartsInventoryPricingResultContainerType $return)
    {
        $this->return = $return;
        return $this;
    }


}


<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PartsOrderReferencesType
 *
 * 
 * XSD Type: PartsOrderReferences
 */
class PartsOrderReferencesType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerType $lineCustomer
     */
    private $lineCustomer = null;

    /**
     * Gets as lineCustomer
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerType
     */
    public function getLineCustomer()
    {
        return $this->lineCustomer;
    }

    /**
     * Sets a new lineCustomer
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerType $lineCustomer
     * @return self
     */
    public function setLineCustomer(\App\Soap\dealerbuilt\src\BaseApi\CustomerType $lineCustomer)
    {
        $this->lineCustomer = $lineCustomer;
        return $this;
    }


}


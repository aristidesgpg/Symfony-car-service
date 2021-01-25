<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullCustomerByKeyResponse
 */
class PullCustomerByKeyResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerType $pullCustomerByKeyResult
     */
    private $pullCustomerByKeyResult = null;

    /**
     * Gets as pullCustomerByKeyResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerType
     */
    public function getPullCustomerByKeyResult()
    {
        return $this->pullCustomerByKeyResult;
    }

    /**
     * Sets a new pullCustomerByKeyResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerType $pullCustomerByKeyResult
     * @return self
     */
    public function setPullCustomerByKeyResult(\App\Soap\dealerbuilt\src\BaseApi\CustomerType $pullCustomerByKeyResult)
    {
        $this->pullCustomerByKeyResult = $pullCustomerByKeyResult;
        return $this;
    }


}


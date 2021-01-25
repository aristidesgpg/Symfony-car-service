<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullCustomersByKeyResponse.
 */
class PullCustomersByKeyResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerType[]
     */
    private $pullCustomersByKeyResult = null;

    /**
     * Adds as customer.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerType $customer
     */
    public function addToPullCustomersByKeyResult(BaseApi\CustomerType $customer)
    {
        $this->pullCustomersByKeyResult[] = $customer;

        return $this;
    }

    /**
     * isset pullCustomersByKeyResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPullCustomersByKeyResult($index)
    {
        return isset($this->pullCustomersByKeyResult[$index]);
    }

    /**
     * unset pullCustomersByKeyResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPullCustomersByKeyResult($index)
    {
        unset($this->pullCustomersByKeyResult[$index]);
    }

    /**
     * Gets as pullCustomersByKeyResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerType[]
     */
    public function getPullCustomersByKeyResult()
    {
        return $this->pullCustomersByKeyResult;
    }

    /**
     * Sets a new pullCustomersByKeyResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerType[] $pullCustomersByKeyResult
     *
     * @return self
     */
    public function setPullCustomersByKeyResult(array $pullCustomersByKeyResult)
    {
        $this->pullCustomersByKeyResult = $pullCustomersByKeyResult;

        return $this;
    }
}

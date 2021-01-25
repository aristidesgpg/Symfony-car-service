<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullCustomersResponse.
 */
class PullCustomersResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerType[]
     */
    private $pullCustomersResult = null;

    /**
     * Adds as customer.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerType $customer
     */
    public function addToPullCustomersResult(BaseApi\CustomerType $customer)
    {
        $this->pullCustomersResult[] = $customer;

        return $this;
    }

    /**
     * isset pullCustomersResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPullCustomersResult($index)
    {
        return isset($this->pullCustomersResult[$index]);
    }

    /**
     * unset pullCustomersResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPullCustomersResult($index)
    {
        unset($this->pullCustomersResult[$index]);
    }

    /**
     * Gets as pullCustomersResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerType[]
     */
    public function getPullCustomersResult()
    {
        return $this->pullCustomersResult;
    }

    /**
     * Sets a new pullCustomersResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerType[] $pullCustomersResult
     *
     * @return self
     */
    public function setPullCustomersResult(array $pullCustomersResult)
    {
        $this->pullCustomersResult = $pullCustomersResult;

        return $this;
    }
}

<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullArchivedCustomersResponse
 */
class PullArchivedCustomersResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerType[] $pullArchivedCustomersResult
     */
    private $pullArchivedCustomersResult = null;

    /**
     * Adds as customer
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerType $customer
     */
    public function addToPullArchivedCustomersResult(\App\Soap\dealerbuilt\src\BaseApi\CustomerType $customer)
    {
        $this->pullArchivedCustomersResult[] = $customer;
        return $this;
    }

    /**
     * isset pullArchivedCustomersResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullArchivedCustomersResult($index)
    {
        return isset($this->pullArchivedCustomersResult[$index]);
    }

    /**
     * unset pullArchivedCustomersResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullArchivedCustomersResult($index)
    {
        unset($this->pullArchivedCustomersResult[$index]);
    }

    /**
     * Gets as pullArchivedCustomersResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerType[]
     */
    public function getPullArchivedCustomersResult()
    {
        return $this->pullArchivedCustomersResult;
    }

    /**
     * Sets a new pullArchivedCustomersResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerType[] $pullArchivedCustomersResult
     * @return self
     */
    public function setPullArchivedCustomersResult(array $pullArchivedCustomersResult)
    {
        $this->pullArchivedCustomersResult = $pullArchivedCustomersResult;
        return $this;
    }


}


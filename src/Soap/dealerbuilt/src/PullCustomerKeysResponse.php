<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullCustomerKeysResponse
 */
class PullCustomerKeysResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerSummaryType[] $pullCustomerKeysResult
     */
    private $pullCustomerKeysResult = null;

    /**
     * Adds as customerSummary
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerSummaryType $customerSummary
     */
    public function addToPullCustomerKeysResult(\App\Soap\dealerbuilt\src\BaseApi\CustomerSummaryType $customerSummary)
    {
        $this->pullCustomerKeysResult[] = $customerSummary;
        return $this;
    }

    /**
     * isset pullCustomerKeysResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullCustomerKeysResult($index)
    {
        return isset($this->pullCustomerKeysResult[$index]);
    }

    /**
     * unset pullCustomerKeysResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullCustomerKeysResult($index)
    {
        unset($this->pullCustomerKeysResult[$index]);
    }

    /**
     * Gets as pullCustomerKeysResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerSummaryType[]
     */
    public function getPullCustomerKeysResult()
    {
        return $this->pullCustomerKeysResult;
    }

    /**
     * Sets a new pullCustomerKeysResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerSummaryType[] $pullCustomerKeysResult
     * @return self
     */
    public function setPullCustomerKeysResult(array $pullCustomerKeysResult)
    {
        $this->pullCustomerKeysResult = $pullCustomerKeysResult;
        return $this;
    }


}


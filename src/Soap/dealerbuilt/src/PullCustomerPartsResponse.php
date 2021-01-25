<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullCustomerPartsResponse.
 */
class PullCustomerPartsResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerPartType[]
     */
    private $pullCustomerPartsResult = null;

    /**
     * Adds as customerPart.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerPartType $customerPart
     */
    public function addToPullCustomerPartsResult(BaseApi\CustomerPartType $customerPart)
    {
        $this->pullCustomerPartsResult[] = $customerPart;

        return $this;
    }

    /**
     * isset pullCustomerPartsResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPullCustomerPartsResult($index)
    {
        return isset($this->pullCustomerPartsResult[$index]);
    }

    /**
     * unset pullCustomerPartsResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPullCustomerPartsResult($index)
    {
        unset($this->pullCustomerPartsResult[$index]);
    }

    /**
     * Gets as pullCustomerPartsResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerPartType[]
     */
    public function getPullCustomerPartsResult()
    {
        return $this->pullCustomerPartsResult;
    }

    /**
     * Sets a new pullCustomerPartsResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerPartType[] $pullCustomerPartsResult
     *
     * @return self
     */
    public function setPullCustomerPartsResult(array $pullCustomerPartsResult)
    {
        $this->pullCustomerPartsResult = $pullCustomerPartsResult;

        return $this;
    }
}

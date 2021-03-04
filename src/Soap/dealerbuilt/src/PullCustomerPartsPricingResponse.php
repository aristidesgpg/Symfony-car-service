<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullCustomerPartsPricingResponse
 */
class PullCustomerPartsPricingResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerPartType[] $pullCustomerPartsPricingResult
     */
    private $pullCustomerPartsPricingResult = null;

    /**
     * Adds as customerPart
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerPartType $customerPart
     */
    public function addToPullCustomerPartsPricingResult(\App\Soap\dealerbuilt\src\BaseApi\CustomerPartType $customerPart)
    {
        $this->pullCustomerPartsPricingResult[] = $customerPart;
        return $this;
    }

    /**
     * isset pullCustomerPartsPricingResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullCustomerPartsPricingResult($index)
    {
        return isset($this->pullCustomerPartsPricingResult[$index]);
    }

    /**
     * unset pullCustomerPartsPricingResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullCustomerPartsPricingResult($index)
    {
        unset($this->pullCustomerPartsPricingResult[$index]);
    }

    /**
     * Gets as pullCustomerPartsPricingResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerPartType[]
     */
    public function getPullCustomerPartsPricingResult()
    {
        return $this->pullCustomerPartsPricingResult;
    }

    /**
     * Sets a new pullCustomerPartsPricingResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerPartType[] $pullCustomerPartsPricingResult
     * @return self
     */
    public function setPullCustomerPartsPricingResult(array $pullCustomerPartsPricingResult)
    {
        $this->pullCustomerPartsPricingResult = $pullCustomerPartsPricingResult;
        return $this;
    }


}


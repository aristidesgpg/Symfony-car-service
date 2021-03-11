<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfCustomerSummaryType
 *
 * 
 * XSD Type: ArrayOfCustomerSummary
 */
class ArrayOfCustomerSummaryType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerSummaryType[] $customerSummary
     */
    private $customerSummary = [
        
    ];

    /**
     * Adds as customerSummary
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerSummaryType $customerSummary
     */
    public function addToCustomerSummary(\App\Soap\dealerbuilt\src\BaseApi\CustomerSummaryType $customerSummary)
    {
        $this->customerSummary[] = $customerSummary;
        return $this;
    }

    /**
     * isset customerSummary
     *
     * @param int|string $index
     * @return bool
     */
    public function issetCustomerSummary($index)
    {
        return isset($this->customerSummary[$index]);
    }

    /**
     * unset customerSummary
     *
     * @param int|string $index
     * @return void
     */
    public function unsetCustomerSummary($index)
    {
        unset($this->customerSummary[$index]);
    }

    /**
     * Gets as customerSummary
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerSummaryType[]
     */
    public function getCustomerSummary()
    {
        return $this->customerSummary;
    }

    /**
     * Sets a new customerSummary
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerSummaryType[] $customerSummary
     * @return self
     */
    public function setCustomerSummary(array $customerSummary)
    {
        $this->customerSummary = $customerSummary;
        return $this;
    }


}


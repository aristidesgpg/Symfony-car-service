<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfCustomerPartType.
 *
 * XSD Type: ArrayOfCustomerPart
 */
class ArrayOfCustomerPartType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerPartType[]
     */
    private $customerPart = [
    ];

    /**
     * Adds as customerPart.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerPartType $customerPart
     */
    public function addToCustomerPart(CustomerPartType $customerPart)
    {
        $this->customerPart[] = $customerPart;

        return $this;
    }

    /**
     * isset customerPart.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetCustomerPart($index)
    {
        return isset($this->customerPart[$index]);
    }

    /**
     * unset customerPart.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetCustomerPart($index)
    {
        unset($this->customerPart[$index]);
    }

    /**
     * Gets as customerPart.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerPartType[]
     */
    public function getCustomerPart()
    {
        return $this->customerPart;
    }

    /**
     * Sets a new customerPart.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerPartType[] $customerPart
     *
     * @return self
     */
    public function setCustomerPart(array $customerPart)
    {
        $this->customerPart = $customerPart;

        return $this;
    }
}

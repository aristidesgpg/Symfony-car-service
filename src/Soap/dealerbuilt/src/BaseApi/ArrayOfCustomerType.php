<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfCustomerType.
 *
 * XSD Type: ArrayOfCustomer
 */
class ArrayOfCustomerType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerType[]
     */
    private $customer = [
    ];

    /**
     * Adds as customer.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerType $customer
     */
    public function addToCustomer(CustomerType $customer)
    {
        $this->customer[] = $customer;

        return $this;
    }

    /**
     * isset customer.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetCustomer($index)
    {
        return isset($this->customer[$index]);
    }

    /**
     * unset customer.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetCustomer($index)
    {
        unset($this->customer[$index]);
    }

    /**
     * Gets as customer.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerType[]
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Sets a new customer.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerType[] $customer
     *
     * @return self
     */
    public function setCustomer(array $customer)
    {
        $this->customer = $customer;

        return $this;
    }
}

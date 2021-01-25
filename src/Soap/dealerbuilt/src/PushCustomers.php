<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushCustomers.
 */
class PushCustomers
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerPushRequestType[]
     */
    private $customers = null;

    /**
     * Adds as customerPushRequest.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerPushRequestType $customerPushRequest
     */
    public function addToCustomers(BaseApi\CustomerPushRequestType $customerPushRequest)
    {
        $this->customers[] = $customerPushRequest;

        return $this;
    }

    /**
     * isset customers.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetCustomers($index)
    {
        return isset($this->customers[$index]);
    }

    /**
     * unset customers.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetCustomers($index)
    {
        unset($this->customers[$index]);
    }

    /**
     * Gets as customers.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerPushRequestType[]
     */
    public function getCustomers()
    {
        return $this->customers;
    }

    /**
     * Sets a new customers.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerPushRequestType[] $customers
     *
     * @return self
     */
    public function setCustomers(array $customers)
    {
        $this->customers = $customers;

        return $this;
    }
}

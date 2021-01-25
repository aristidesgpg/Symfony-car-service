<?php

namespace App\Soap\dealerbuilt\src\Models\Parts;

/**
 * Class representing CounterTicketCustomerType
 *
 * 
 * XSD Type: CounterTicketCustomer
 */
class CounterTicketCustomerType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Parts\AddressType $billingAddress
     */
    private $billingAddress = null;

    /**
     * @var string $homePhone
     */
    private $homePhone = null;

    /**
     * @var string $otherPhone
     */
    private $otherPhone = null;

    /**
     * @var string $workPhone
     */
    private $workPhone = null;

    /**
     * Gets as billingAddress
     *
     * @return \App\Soap\dealerbuilt\src\Models\Parts\AddressType
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * Sets a new billingAddress
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\AddressType $billingAddress
     * @return self
     */
    public function setBillingAddress(\App\Soap\dealerbuilt\src\Models\Parts\AddressType $billingAddress)
    {
        $this->billingAddress = $billingAddress;
        return $this;
    }

    /**
     * Gets as homePhone
     *
     * @return string
     */
    public function getHomePhone()
    {
        return $this->homePhone;
    }

    /**
     * Sets a new homePhone
     *
     * @param string $homePhone
     * @return self
     */
    public function setHomePhone($homePhone)
    {
        $this->homePhone = $homePhone;
        return $this;
    }

    /**
     * Gets as otherPhone
     *
     * @return string
     */
    public function getOtherPhone()
    {
        return $this->otherPhone;
    }

    /**
     * Sets a new otherPhone
     *
     * @param string $otherPhone
     * @return self
     */
    public function setOtherPhone($otherPhone)
    {
        $this->otherPhone = $otherPhone;
        return $this;
    }

    /**
     * Gets as workPhone
     *
     * @return string
     */
    public function getWorkPhone()
    {
        return $this->workPhone;
    }

    /**
     * Sets a new workPhone
     *
     * @param string $workPhone
     * @return self
     */
    public function setWorkPhone($workPhone)
    {
        $this->workPhone = $workPhone;
        return $this;
    }


}


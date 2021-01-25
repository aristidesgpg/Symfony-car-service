<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PartsInvoicePartPushRequestType
 *
 * 
 * XSD Type: PartsInvoicePartPushRequest
 */
class PartsInvoicePartPushRequestType
{

    /**
     * @var string $counterTicketNumber
     */
    private $counterTicketNumber = null;

    /**
     * @var string $customerId
     */
    private $customerId = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Parts\PartType $part
     */
    private $part = null;

    /**
     * @var int $serviceLocationId
     */
    private $serviceLocationId = null;

    /**
     * Gets as counterTicketNumber
     *
     * @return string
     */
    public function getCounterTicketNumber()
    {
        return $this->counterTicketNumber;
    }

    /**
     * Sets a new counterTicketNumber
     *
     * @param string $counterTicketNumber
     * @return self
     */
    public function setCounterTicketNumber($counterTicketNumber)
    {
        $this->counterTicketNumber = $counterTicketNumber;
        return $this;
    }

    /**
     * Gets as customerId
     *
     * @return string
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Sets a new customerId
     *
     * @param string $customerId
     * @return self
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
        return $this;
    }

    /**
     * Gets as part
     *
     * @return \App\Soap\dealerbuilt\src\Models\Parts\PartType
     */
    public function getPart()
    {
        return $this->part;
    }

    /**
     * Sets a new part
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\PartType $part
     * @return self
     */
    public function setPart(\App\Soap\dealerbuilt\src\Models\Parts\PartType $part)
    {
        $this->part = $part;
        return $this;
    }

    /**
     * Gets as serviceLocationId
     *
     * @return int
     */
    public function getServiceLocationId()
    {
        return $this->serviceLocationId;
    }

    /**
     * Sets a new serviceLocationId
     *
     * @param int $serviceLocationId
     * @return self
     */
    public function setServiceLocationId($serviceLocationId)
    {
        $this->serviceLocationId = $serviceLocationId;
        return $this;
    }


}


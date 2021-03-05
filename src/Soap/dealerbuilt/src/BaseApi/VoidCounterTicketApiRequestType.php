<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing VoidCounterTicketApiRequestType
 *
 * 
 * XSD Type: VoidCounterTicketApiRequest
 */
class VoidCounterTicketApiRequestType
{

    /**
     * @var string $counterTicketNumber
     */
    private $counterTicketNumber = null;

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


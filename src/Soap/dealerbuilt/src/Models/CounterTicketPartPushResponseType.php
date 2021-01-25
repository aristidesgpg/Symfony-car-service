<?php

namespace App\Soap\dealerbuilt\src\Models;

/**
 * Class representing CounterTicketPartPushResponseType.
 *
 * XSD Type: CounterTicketPartPushResponse
 */
class CounterTicketPartPushResponseType extends ServiceLocationPushResponseType
{
    /**
     * @var string
     */
    private $partNumber = null;

    /**
     * Gets as partNumber.
     *
     * @return string
     */
    public function getPartNumber()
    {
        return $this->partNumber;
    }

    /**
     * Sets a new partNumber.
     *
     * @param string $partNumber
     *
     * @return self
     */
    public function setPartNumber($partNumber)
    {
        $this->partNumber = $partNumber;

        return $this;
    }
}

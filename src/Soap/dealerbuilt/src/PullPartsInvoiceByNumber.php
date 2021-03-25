<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullPartsInvoiceByNumber
 */
class PullPartsInvoiceByNumber
{

    /**
     * @var int $serviceLocationId
     */
    private $serviceLocationId = null;

    /**
     * @var string $partsInvoiceNumber
     */
    private $partsInvoiceNumber = null;

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

    /**
     * Gets as partsInvoiceNumber
     *
     * @return string
     */
    public function getPartsInvoiceNumber()
    {
        return $this->partsInvoiceNumber;
    }

    /**
     * Sets a new partsInvoiceNumber
     *
     * @param string $partsInvoiceNumber
     * @return self
     */
    public function setPartsInvoiceNumber($partsInvoiceNumber)
    {
        $this->partsInvoiceNumber = $partsInvoiceNumber;
        return $this;
    }


}


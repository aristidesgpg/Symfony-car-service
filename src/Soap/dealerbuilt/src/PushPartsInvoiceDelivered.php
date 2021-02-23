<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushPartsInvoiceDelivered
 */
class PushPartsInvoiceDelivered
{

    /**
     * @var string[] $partsInvoiceKeys
     */
    private $partsInvoiceKeys = null;

    /**
     * @var bool $isDelivered
     */
    private $isDelivered = null;

    /**
     * Adds as string
     *
     * @return self
     * @param string $string
     */
    public function addToPartsInvoiceKeys($string)
    {
        $this->partsInvoiceKeys[] = $string;
        return $this;
    }

    /**
     * isset partsInvoiceKeys
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPartsInvoiceKeys($index)
    {
        return isset($this->partsInvoiceKeys[$index]);
    }

    /**
     * unset partsInvoiceKeys
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPartsInvoiceKeys($index)
    {
        unset($this->partsInvoiceKeys[$index]);
    }

    /**
     * Gets as partsInvoiceKeys
     *
     * @return string[]
     */
    public function getPartsInvoiceKeys()
    {
        return $this->partsInvoiceKeys;
    }

    /**
     * Sets a new partsInvoiceKeys
     *
     * @param string[] $partsInvoiceKeys
     * @return self
     */
    public function setPartsInvoiceKeys(array $partsInvoiceKeys)
    {
        $this->partsInvoiceKeys = $partsInvoiceKeys;
        return $this;
    }

    /**
     * Gets as isDelivered
     *
     * @return bool
     */
    public function getIsDelivered()
    {
        return $this->isDelivered;
    }

    /**
     * Sets a new isDelivered
     *
     * @param bool $isDelivered
     * @return self
     */
    public function setIsDelivered($isDelivered)
    {
        $this->isDelivered = $isDelivered;
        return $this;
    }


}


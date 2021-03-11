<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullPartsInvoicesByKey
 */
class PullPartsInvoicesByKey
{

    /**
     * @var string[] $partsInvoiceKeys
     */
    private $partsInvoiceKeys = null;

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


}


<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfPartsInvoiceType
 *
 * 
 * XSD Type: ArrayOfPartsInvoice
 */
class ArrayOfPartsInvoiceType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PartsInvoiceType[] $partsInvoice
     */
    private $partsInvoice = [
        
    ];

    /**
     * Adds as partsInvoice
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsInvoiceType $partsInvoice
     */
    public function addToPartsInvoice(\App\Soap\dealerbuilt\src\BaseApi\PartsInvoiceType $partsInvoice)
    {
        $this->partsInvoice[] = $partsInvoice;
        return $this;
    }

    /**
     * isset partsInvoice
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPartsInvoice($index)
    {
        return isset($this->partsInvoice[$index]);
    }

    /**
     * unset partsInvoice
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPartsInvoice($index)
    {
        unset($this->partsInvoice[$index]);
    }

    /**
     * Gets as partsInvoice
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PartsInvoiceType[]
     */
    public function getPartsInvoice()
    {
        return $this->partsInvoice;
    }

    /**
     * Sets a new partsInvoice
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsInvoiceType[] $partsInvoice
     * @return self
     */
    public function setPartsInvoice(array $partsInvoice)
    {
        $this->partsInvoice = $partsInvoice;
        return $this;
    }


}


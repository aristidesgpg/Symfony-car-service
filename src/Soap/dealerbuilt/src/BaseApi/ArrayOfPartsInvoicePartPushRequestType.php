<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfPartsInvoicePartPushRequestType
 *
 * 
 * XSD Type: ArrayOfPartsInvoicePartPushRequest
 */
class ArrayOfPartsInvoicePartPushRequestType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PartsInvoicePartPushRequestType[] $partsInvoicePartPushRequest
     */
    private $partsInvoicePartPushRequest = [
        
    ];

    /**
     * Adds as partsInvoicePartPushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsInvoicePartPushRequestType $partsInvoicePartPushRequest
     */
    public function addToPartsInvoicePartPushRequest(\App\Soap\dealerbuilt\src\BaseApi\PartsInvoicePartPushRequestType $partsInvoicePartPushRequest)
    {
        $this->partsInvoicePartPushRequest[] = $partsInvoicePartPushRequest;
        return $this;
    }

    /**
     * isset partsInvoicePartPushRequest
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPartsInvoicePartPushRequest($index)
    {
        return isset($this->partsInvoicePartPushRequest[$index]);
    }

    /**
     * unset partsInvoicePartPushRequest
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPartsInvoicePartPushRequest($index)
    {
        unset($this->partsInvoicePartPushRequest[$index]);
    }

    /**
     * Gets as partsInvoicePartPushRequest
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PartsInvoicePartPushRequestType[]
     */
    public function getPartsInvoicePartPushRequest()
    {
        return $this->partsInvoicePartPushRequest;
    }

    /**
     * Sets a new partsInvoicePartPushRequest
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsInvoicePartPushRequestType[] $partsInvoicePartPushRequest
     * @return self
     */
    public function setPartsInvoicePartPushRequest(array $partsInvoicePartPushRequest)
    {
        $this->partsInvoicePartPushRequest = $partsInvoicePartPushRequest;
        return $this;
    }


}


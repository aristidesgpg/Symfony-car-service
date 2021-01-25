<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushPartsInvoiceDeliveredResponse.
 */
class PushPartsInvoiceDeliveredResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationTransactionResponseType[]
     */
    private $pushPartsInvoiceDeliveredResult = null;

    /**
     * Adds as serviceLocationTransactionResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationTransactionResponseType $serviceLocationTransactionResponse
     */
    public function addToPushPartsInvoiceDeliveredResult(BaseApi\ServiceLocationTransactionResponseType $serviceLocationTransactionResponse)
    {
        $this->pushPartsInvoiceDeliveredResult[] = $serviceLocationTransactionResponse;

        return $this;
    }

    /**
     * isset pushPartsInvoiceDeliveredResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPushPartsInvoiceDeliveredResult($index)
    {
        return isset($this->pushPartsInvoiceDeliveredResult[$index]);
    }

    /**
     * unset pushPartsInvoiceDeliveredResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPushPartsInvoiceDeliveredResult($index)
    {
        unset($this->pushPartsInvoiceDeliveredResult[$index]);
    }

    /**
     * Gets as pushPartsInvoiceDeliveredResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationTransactionResponseType[]
     */
    public function getPushPartsInvoiceDeliveredResult()
    {
        return $this->pushPartsInvoiceDeliveredResult;
    }

    /**
     * Sets a new pushPartsInvoiceDeliveredResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationTransactionResponseType[] $pushPartsInvoiceDeliveredResult
     *
     * @return self
     */
    public function setPushPartsInvoiceDeliveredResult(array $pushPartsInvoiceDeliveredResult)
    {
        $this->pushPartsInvoiceDeliveredResult = $pushPartsInvoiceDeliveredResult;

        return $this;
    }
}

<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullPartsInvoiceByNumberResponse.
 */
class PullPartsInvoiceByNumberResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PartsInvoiceType
     */
    private $pullPartsInvoiceByNumberResult = null;

    /**
     * Gets as pullPartsInvoiceByNumberResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PartsInvoiceType
     */
    public function getPullPartsInvoiceByNumberResult()
    {
        return $this->pullPartsInvoiceByNumberResult;
    }

    /**
     * Sets a new pullPartsInvoiceByNumberResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsInvoiceType $pullPartsInvoiceByNumberResult
     *
     * @return self
     */
    public function setPullPartsInvoiceByNumberResult(BaseApi\PartsInvoiceType $pullPartsInvoiceByNumberResult)
    {
        $this->pullPartsInvoiceByNumberResult = $pullPartsInvoiceByNumberResult;

        return $this;
    }
}

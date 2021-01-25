<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullPartsInvoicesByKeyResponse.
 */
class PullPartsInvoicesByKeyResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PartsInvoiceType[]
     */
    private $pullPartsInvoicesByKeyResult = null;

    /**
     * Adds as partsInvoice.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsInvoiceType $partsInvoice
     */
    public function addToPullPartsInvoicesByKeyResult(BaseApi\PartsInvoiceType $partsInvoice)
    {
        $this->pullPartsInvoicesByKeyResult[] = $partsInvoice;

        return $this;
    }

    /**
     * isset pullPartsInvoicesByKeyResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPullPartsInvoicesByKeyResult($index)
    {
        return isset($this->pullPartsInvoicesByKeyResult[$index]);
    }

    /**
     * unset pullPartsInvoicesByKeyResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPullPartsInvoicesByKeyResult($index)
    {
        unset($this->pullPartsInvoicesByKeyResult[$index]);
    }

    /**
     * Gets as pullPartsInvoicesByKeyResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PartsInvoiceType[]
     */
    public function getPullPartsInvoicesByKeyResult()
    {
        return $this->pullPartsInvoicesByKeyResult;
    }

    /**
     * Sets a new pullPartsInvoicesByKeyResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsInvoiceType[] $pullPartsInvoicesByKeyResult
     *
     * @return self
     */
    public function setPullPartsInvoicesByKeyResult(array $pullPartsInvoicesByKeyResult)
    {
        $this->pullPartsInvoicesByKeyResult = $pullPartsInvoicesByKeyResult;

        return $this;
    }
}

<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullPartsInvoicesResponse.
 */
class PullPartsInvoicesResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PartsInvoiceType[]
     */
    private $pullPartsInvoicesResult = null;

    /**
     * Adds as partsInvoice.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsInvoiceType $partsInvoice
     */
    public function addToPullPartsInvoicesResult(BaseApi\PartsInvoiceType $partsInvoice)
    {
        $this->pullPartsInvoicesResult[] = $partsInvoice;

        return $this;
    }

    /**
     * isset pullPartsInvoicesResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPullPartsInvoicesResult($index)
    {
        return isset($this->pullPartsInvoicesResult[$index]);
    }

    /**
     * unset pullPartsInvoicesResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPullPartsInvoicesResult($index)
    {
        unset($this->pullPartsInvoicesResult[$index]);
    }

    /**
     * Gets as pullPartsInvoicesResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PartsInvoiceType[]
     */
    public function getPullPartsInvoicesResult()
    {
        return $this->pullPartsInvoicesResult;
    }

    /**
     * Sets a new pullPartsInvoicesResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsInvoiceType[] $pullPartsInvoicesResult
     *
     * @return self
     */
    public function setPullPartsInvoicesResult(array $pullPartsInvoicesResult)
    {
        $this->pullPartsInvoicesResult = $pullPartsInvoicesResult;

        return $this;
    }
}

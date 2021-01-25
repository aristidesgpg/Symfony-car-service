<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing ClosePartsInvoicesResponse
 */
class ClosePartsInvoicesResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationTransactionResponseType[] $closePartsInvoicesResult
     */
    private $closePartsInvoicesResult = null;

    /**
     * Adds as serviceLocationTransactionResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationTransactionResponseType $serviceLocationTransactionResponse
     */
    public function addToClosePartsInvoicesResult(\App\Soap\dealerbuilt\src\BaseApi\ServiceLocationTransactionResponseType $serviceLocationTransactionResponse)
    {
        $this->closePartsInvoicesResult[] = $serviceLocationTransactionResponse;
        return $this;
    }

    /**
     * isset closePartsInvoicesResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetClosePartsInvoicesResult($index)
    {
        return isset($this->closePartsInvoicesResult[$index]);
    }

    /**
     * unset closePartsInvoicesResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetClosePartsInvoicesResult($index)
    {
        unset($this->closePartsInvoicesResult[$index]);
    }

    /**
     * Gets as closePartsInvoicesResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationTransactionResponseType[]
     */
    public function getClosePartsInvoicesResult()
    {
        return $this->closePartsInvoicesResult;
    }

    /**
     * Sets a new closePartsInvoicesResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationTransactionResponseType[] $closePartsInvoicesResult
     * @return self
     */
    public function setClosePartsInvoicesResult(array $closePartsInvoicesResult)
    {
        $this->closePartsInvoicesResult = $closePartsInvoicesResult;
        return $this;
    }


}


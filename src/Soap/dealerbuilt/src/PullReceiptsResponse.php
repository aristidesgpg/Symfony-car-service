<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullReceiptsResponse.
 */
class PullReceiptsResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ReceiptType[]
     */
    private $pullReceiptsResult = null;

    /**
     * Adds as receipt.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ReceiptType $receipt
     */
    public function addToPullReceiptsResult(BaseApi\ReceiptType $receipt)
    {
        $this->pullReceiptsResult[] = $receipt;

        return $this;
    }

    /**
     * isset pullReceiptsResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPullReceiptsResult($index)
    {
        return isset($this->pullReceiptsResult[$index]);
    }

    /**
     * unset pullReceiptsResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPullReceiptsResult($index)
    {
        unset($this->pullReceiptsResult[$index]);
    }

    /**
     * Gets as pullReceiptsResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ReceiptType[]
     */
    public function getPullReceiptsResult()
    {
        return $this->pullReceiptsResult;
    }

    /**
     * Sets a new pullReceiptsResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ReceiptType[] $pullReceiptsResult
     *
     * @return self
     */
    public function setPullReceiptsResult(array $pullReceiptsResult)
    {
        $this->pullReceiptsResult = $pullReceiptsResult;

        return $this;
    }
}

<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfReceiptType.
 *
 * XSD Type: ArrayOfReceipt
 */
class ArrayOfReceiptType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ReceiptType[]
     */
    private $receipt = [
    ];

    /**
     * Adds as receipt.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ReceiptType $receipt
     */
    public function addToReceipt(ReceiptType $receipt)
    {
        $this->receipt[] = $receipt;

        return $this;
    }

    /**
     * isset receipt.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetReceipt($index)
    {
        return isset($this->receipt[$index]);
    }

    /**
     * unset receipt.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetReceipt($index)
    {
        unset($this->receipt[$index]);
    }

    /**
     * Gets as receipt.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ReceiptType[]
     */
    public function getReceipt()
    {
        return $this->receipt;
    }

    /**
     * Sets a new receipt.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ReceiptType[] $receipt
     *
     * @return self
     */
    public function setReceipt(array $receipt)
    {
        $this->receipt = $receipt;

        return $this;
    }
}

<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ReceiptSearchCriteriaType.
 *
 * XSD Type: ReceiptSearchCriteria
 */
class ReceiptSearchCriteriaType extends CompaniesSearchCriteriaType
{
    /**
     * @var \DateInterval
     */
    private $maxElapsedSinceUpdate = null;

    /**
     * @var string[]
     */
    private $receiptNumbers = null;

    /**
     * Gets as maxElapsedSinceUpdate.
     *
     * @return \DateInterval
     */
    public function getMaxElapsedSinceUpdate()
    {
        return $this->maxElapsedSinceUpdate;
    }

    /**
     * Sets a new maxElapsedSinceUpdate.
     *
     * @return self
     */
    public function setMaxElapsedSinceUpdate(\DateInterval $maxElapsedSinceUpdate)
    {
        $this->maxElapsedSinceUpdate = $maxElapsedSinceUpdate;

        return $this;
    }

    /**
     * Adds as string.
     *
     * @return self
     *
     * @param string $string
     */
    public function addToReceiptNumbers($string)
    {
        $this->receiptNumbers[] = $string;

        return $this;
    }

    /**
     * isset receiptNumbers.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetReceiptNumbers($index)
    {
        return isset($this->receiptNumbers[$index]);
    }

    /**
     * unset receiptNumbers.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetReceiptNumbers($index)
    {
        unset($this->receiptNumbers[$index]);
    }

    /**
     * Gets as receiptNumbers.
     *
     * @return string[]
     */
    public function getReceiptNumbers()
    {
        return $this->receiptNumbers;
    }

    /**
     * Sets a new receiptNumbers.
     *
     * @param string[] $receiptNumbers
     *
     * @return self
     */
    public function setReceiptNumbers(array $receiptNumbers)
    {
        $this->receiptNumbers = $receiptNumbers;

        return $this;
    }
}

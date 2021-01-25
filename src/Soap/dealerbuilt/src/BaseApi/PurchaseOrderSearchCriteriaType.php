<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PurchaseOrderSearchCriteriaType.
 *
 * XSD Type: PurchaseOrderSearchCriteria
 */
class PurchaseOrderSearchCriteriaType extends CompaniesSearchCriteriaType
{
    /**
     * @var \DateInterval
     */
    private $maxElapsedSinceUpdate = null;

    /**
     * @var string[]
     */
    private $purchaseOrderNumbers = null;

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
    public function addToPurchaseOrderNumbers($string)
    {
        $this->purchaseOrderNumbers[] = $string;

        return $this;
    }

    /**
     * isset purchaseOrderNumbers.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPurchaseOrderNumbers($index)
    {
        return isset($this->purchaseOrderNumbers[$index]);
    }

    /**
     * unset purchaseOrderNumbers.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPurchaseOrderNumbers($index)
    {
        unset($this->purchaseOrderNumbers[$index]);
    }

    /**
     * Gets as purchaseOrderNumbers.
     *
     * @return string[]
     */
    public function getPurchaseOrderNumbers()
    {
        return $this->purchaseOrderNumbers;
    }

    /**
     * Sets a new purchaseOrderNumbers.
     *
     * @param string[] $purchaseOrderNumbers
     *
     * @return self
     */
    public function setPurchaseOrderNumbers(array $purchaseOrderNumbers)
    {
        $this->purchaseOrderNumbers = $purchaseOrderNumbers;

        return $this;
    }
}

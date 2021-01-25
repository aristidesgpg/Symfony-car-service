<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullDealsByDealNumber.
 */
class PullDealsByDealNumber
{
    /**
     * @var int
     */
    private $storeId = null;

    /**
     * @var int[]
     */
    private $dealNumbers = null;

    /**
     * Gets as storeId.
     *
     * @return int
     */
    public function getStoreId()
    {
        return $this->storeId;
    }

    /**
     * Sets a new storeId.
     *
     * @param int $storeId
     *
     * @return self
     */
    public function setStoreId($storeId)
    {
        $this->storeId = $storeId;

        return $this;
    }

    /**
     * Adds as long.
     *
     * @return self
     *
     * @param int $long
     */
    public function addToDealNumbers($long)
    {
        $this->dealNumbers[] = $long;

        return $this;
    }

    /**
     * isset dealNumbers.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetDealNumbers($index)
    {
        return isset($this->dealNumbers[$index]);
    }

    /**
     * unset dealNumbers.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetDealNumbers($index)
    {
        unset($this->dealNumbers[$index]);
    }

    /**
     * Gets as dealNumbers.
     *
     * @return int[]
     */
    public function getDealNumbers()
    {
        return $this->dealNumbers;
    }

    /**
     * Sets a new dealNumbers.
     *
     * @param int[] $dealNumbers
     *
     * @return self
     */
    public function setDealNumbers(array $dealNumbers)
    {
        $this->dealNumbers = $dealNumbers;

        return $this;
    }
}

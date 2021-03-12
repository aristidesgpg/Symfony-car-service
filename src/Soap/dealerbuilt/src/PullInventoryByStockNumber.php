<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullInventoryByStockNumber
 */
class PullInventoryByStockNumber
{

    /**
     * @var int $storeId
     */
    private $storeId = null;

    /**
     * @var string $stockNumber
     */
    private $stockNumber = null;

    /**
     * Gets as storeId
     *
     * @return int
     */
    public function getStoreId()
    {
        return $this->storeId;
    }

    /**
     * Sets a new storeId
     *
     * @param int $storeId
     * @return self
     */
    public function setStoreId($storeId)
    {
        $this->storeId = $storeId;
        return $this;
    }

    /**
     * Gets as stockNumber
     *
     * @return string
     */
    public function getStockNumber()
    {
        return $this->stockNumber;
    }

    /**
     * Sets a new stockNumber
     *
     * @param string $stockNumber
     * @return self
     */
    public function setStockNumber($stockNumber)
    {
        $this->stockNumber = $stockNumber;
        return $this;
    }


}


<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullInventoryByVin
 */
class PullInventoryByVin
{

    /**
     * @var int $storeId
     */
    private $storeId = null;

    /**
     * @var string $vin
     */
    private $vin = null;

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
     * Gets as vin
     *
     * @return string
     */
    public function getVin()
    {
        return $this->vin;
    }

    /**
     * Sets a new vin
     *
     * @param string $vin
     * @return self
     */
    public function setVin($vin)
    {
        $this->vin = $vin;
        return $this;
    }


}


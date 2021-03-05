<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullProspectByDealNumber
 */
class PullProspectByDealNumber
{

    /**
     * @var int $storeId
     */
    private $storeId = null;

    /**
     * @var int $dealNumber
     */
    private $dealNumber = null;

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
     * Gets as dealNumber
     *
     * @return int
     */
    public function getDealNumber()
    {
        return $this->dealNumber;
    }

    /**
     * Sets a new dealNumber
     *
     * @param int $dealNumber
     * @return self
     */
    public function setDealNumber($dealNumber)
    {
        $this->dealNumber = $dealNumber;
        return $this;
    }


}


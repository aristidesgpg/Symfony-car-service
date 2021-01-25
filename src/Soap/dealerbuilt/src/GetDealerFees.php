<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetDealerFees.
 */
class GetDealerFees
{
    /**
     * @var int
     */
    private $storeId = null;

    /**
     * @var string
     */
    private $guestState = null;

    /**
     * @var string
     */
    private $dealType = null;

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
     * Gets as guestState.
     *
     * @return string
     */
    public function getGuestState()
    {
        return $this->guestState;
    }

    /**
     * Sets a new guestState.
     *
     * @param string $guestState
     *
     * @return self
     */
    public function setGuestState($guestState)
    {
        $this->guestState = $guestState;

        return $this;
    }

    /**
     * Gets as dealType.
     *
     * @return string
     */
    public function getDealType()
    {
        return $this->dealType;
    }

    /**
     * Sets a new dealType.
     *
     * @param string $dealType
     *
     * @return self
     */
    public function setDealType($dealType)
    {
        $this->dealType = $dealType;

        return $this;
    }
}

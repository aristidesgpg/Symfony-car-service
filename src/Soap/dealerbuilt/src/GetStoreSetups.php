<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetStoreSetups.
 */
class GetStoreSetups
{
    /**
     * @var int[]
     */
    private $storeIds = null;

    /**
     * Adds as long.
     *
     * @return self
     *
     * @param int $long
     */
    public function addToStoreIds($long)
    {
        $this->storeIds[] = $long;

        return $this;
    }

    /**
     * isset storeIds.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetStoreIds($index)
    {
        return isset($this->storeIds[$index]);
    }

    /**
     * unset storeIds.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetStoreIds($index)
    {
        unset($this->storeIds[$index]);
    }

    /**
     * Gets as storeIds.
     *
     * @return int[]
     */
    public function getStoreIds()
    {
        return $this->storeIds;
    }

    /**
     * Sets a new storeIds.
     *
     * @param int[] $storeIds
     *
     * @return self
     */
    public function setStoreIds(array $storeIds)
    {
        $this->storeIds = $storeIds;

        return $this;
    }
}

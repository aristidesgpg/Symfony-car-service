<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullInventoryItemsByKey.
 */
class PullInventoryItemsByKey
{
    /**
     * @var string[]
     */
    private $inventoryKeys = null;

    /**
     * Adds as string.
     *
     * @return self
     *
     * @param string $string
     */
    public function addToInventoryKeys($string)
    {
        $this->inventoryKeys[] = $string;

        return $this;
    }

    /**
     * isset inventoryKeys.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetInventoryKeys($index)
    {
        return isset($this->inventoryKeys[$index]);
    }

    /**
     * unset inventoryKeys.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetInventoryKeys($index)
    {
        unset($this->inventoryKeys[$index]);
    }

    /**
     * Gets as inventoryKeys.
     *
     * @return string[]
     */
    public function getInventoryKeys()
    {
        return $this->inventoryKeys;
    }

    /**
     * Sets a new inventoryKeys.
     *
     * @param string[] $inventoryKeys
     *
     * @return self
     */
    public function setInventoryKeys(array $inventoryKeys)
    {
        $this->inventoryKeys = $inventoryKeys;

        return $this;
    }
}

<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullDealsByKey
 */
class PullDealsByKey
{

    /**
     * @var string[] $dealKeys
     */
    private $dealKeys = null;

    /**
     * Adds as string
     *
     * @return self
     * @param string $string
     */
    public function addToDealKeys($string)
    {
        $this->dealKeys[] = $string;
        return $this;
    }

    /**
     * isset dealKeys
     *
     * @param int|string $index
     * @return bool
     */
    public function issetDealKeys($index)
    {
        return isset($this->dealKeys[$index]);
    }

    /**
     * unset dealKeys
     *
     * @param int|string $index
     * @return void
     */
    public function unsetDealKeys($index)
    {
        unset($this->dealKeys[$index]);
    }

    /**
     * Gets as dealKeys
     *
     * @return string[]
     */
    public function getDealKeys()
    {
        return $this->dealKeys;
    }

    /**
     * Sets a new dealKeys
     *
     * @param string[] $dealKeys
     * @return self
     */
    public function setDealKeys(array $dealKeys)
    {
        $this->dealKeys = $dealKeys;
        return $this;
    }


}


<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullEstimatesByKey.
 */
class PullEstimatesByKey
{
    /**
     * @var string[]
     */
    private $estimateKeys = null;

    /**
     * Adds as string.
     *
     * @return self
     *
     * @param string $string
     */
    public function addToEstimateKeys($string)
    {
        $this->estimateKeys[] = $string;

        return $this;
    }

    /**
     * isset estimateKeys.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetEstimateKeys($index)
    {
        return isset($this->estimateKeys[$index]);
    }

    /**
     * unset estimateKeys.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetEstimateKeys($index)
    {
        unset($this->estimateKeys[$index]);
    }

    /**
     * Gets as estimateKeys.
     *
     * @return string[]
     */
    public function getEstimateKeys()
    {
        return $this->estimateKeys;
    }

    /**
     * Sets a new estimateKeys.
     *
     * @param string[] $estimateKeys
     *
     * @return self
     */
    public function setEstimateKeys(array $estimateKeys)
    {
        $this->estimateKeys = $estimateKeys;

        return $this;
    }
}

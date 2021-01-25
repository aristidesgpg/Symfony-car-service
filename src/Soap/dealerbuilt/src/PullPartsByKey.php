<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullPartsByKey.
 */
class PullPartsByKey
{
    /**
     * @var string[]
     */
    private $partKeys = null;

    /**
     * Adds as string.
     *
     * @return self
     *
     * @param string $string
     */
    public function addToPartKeys($string)
    {
        $this->partKeys[] = $string;

        return $this;
    }

    /**
     * isset partKeys.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPartKeys($index)
    {
        return isset($this->partKeys[$index]);
    }

    /**
     * unset partKeys.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPartKeys($index)
    {
        unset($this->partKeys[$index]);
    }

    /**
     * Gets as partKeys.
     *
     * @return string[]
     */
    public function getPartKeys()
    {
        return $this->partKeys;
    }

    /**
     * Sets a new partKeys.
     *
     * @param string[] $partKeys
     *
     * @return self
     */
    public function setPartKeys(array $partKeys)
    {
        $this->partKeys = $partKeys;

        return $this;
    }
}

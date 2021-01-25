<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullDealByKey.
 */
class PullDealByKey
{
    /**
     * @var string
     */
    private $dealKey = null;

    /**
     * Gets as dealKey.
     *
     * @return string
     */
    public function getDealKey()
    {
        return $this->dealKey;
    }

    /**
     * Sets a new dealKey.
     *
     * @param string $dealKey
     *
     * @return self
     */
    public function setDealKey($dealKey)
    {
        $this->dealKey = $dealKey;

        return $this;
    }
}

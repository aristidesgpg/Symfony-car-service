<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullDealerLocations.
 */
class PullDealerLocations
{
    /**
     * @var int
     */
    private $dealerNumber = null;

    /**
     * Gets as dealerNumber.
     *
     * @return int
     */
    public function getDealerNumber()
    {
        return $this->dealerNumber;
    }

    /**
     * Sets a new dealerNumber.
     *
     * @param int $dealerNumber
     *
     * @return self
     */
    public function setDealerNumber($dealerNumber)
    {
        $this->dealerNumber = $dealerNumber;

        return $this;
    }
}

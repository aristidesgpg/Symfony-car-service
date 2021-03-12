<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullEstimateByKey
 */
class PullEstimateByKey
{

    /**
     * @var string $estimateKey
     */
    private $estimateKey = null;

    /**
     * Gets as estimateKey
     *
     * @return string
     */
    public function getEstimateKey()
    {
        return $this->estimateKey;
    }

    /**
     * Sets a new estimateKey
     *
     * @param string $estimateKey
     * @return self
     */
    public function setEstimateKey($estimateKey)
    {
        $this->estimateKey = $estimateKey;
        return $this;
    }


}


<?php

namespace App\Soap\cdk\src;

/**
 * Class representing DealerIdType
 *
 * 
 * XSD Type: dealerId
 */
class DealerIdType
{

    /**
     * @var string $dealerId
     */
    private $dealerId = null;

    /**
     * Gets as dealerId
     *
     * @return string
     */
    public function getDealerId()
    {
        return $this->dealerId;
    }

    /**
     * Sets a new dealerId
     *
     * @param string $dealerId
     * @return self
     */
    public function setDealerId($dealerId)
    {
        $this->dealerId = $dealerId;
        return $this;
    }


}


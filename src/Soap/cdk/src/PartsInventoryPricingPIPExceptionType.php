<?php

namespace App\Soap\cdk\src;

/**
 * Class representing PartsInventoryPricingPIPExceptionType
 *
 * 
 * XSD Type: PartsInventoryPricingPIPException
 */
class PartsInventoryPricingPIPExceptionType
{

    /**
     * @var string $message
     */
    private $message = null;

    /**
     * Gets as message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Sets a new message
     *
     * @param string $message
     * @return self
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }


}


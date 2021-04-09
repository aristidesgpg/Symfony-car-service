<?php

namespace App\Soap\cdk\src;

/**
 * Class representing CheckServiceHealthResponseType
 *
 * 
 * XSD Type: checkServiceHealthResponse
 */
class CheckServiceHealthResponseType
{

    /**
     * @var string $return
     */
    private $return = null;

    /**
     * Gets as return
     *
     * @return string
     */
    public function getReturn()
    {
        return $this->return;
    }

    /**
     * Sets a new return
     *
     * @param string $return
     * @return self
     */
    public function setReturn($return)
    {
        $this->return = $return;
        return $this;
    }


}


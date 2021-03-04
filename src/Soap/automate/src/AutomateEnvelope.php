<?php

namespace App\Soap\automate\src;

/**
 * Class representing AutomateEnvelope
 */
class AutomateEnvelope
{

    /**
     * @var \App\Soap\automate\src\AutomateBodyType $body
     */
    private $body = null;

    /**
     * Gets as body
     *
     * @return \App\Soap\automate\src\AutomateBodyType
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Sets a new body
     *
     * @param \App\Soap\automate\src\AutomateBodyType $body
     * @return self
     */
    public function setBody(\App\Soap\automate\src\AutomateBodyType $body)
    {
        $this->body = $body;
        return $this;
    }


}


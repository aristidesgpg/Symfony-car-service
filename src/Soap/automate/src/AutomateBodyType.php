<?php

namespace App\Soap\automate\src;

/**
 * Class representing AutomateBodyType
 */
class AutomateBodyType
{

    /**
     * @var \App\Soap\automate\src\ProcessEventResponseType $processEventResponse
     */
    private $processEventResponse = null;

    /**
     * Gets as processEventResponse
     *
     * @return \App\Soap\automate\src\ProcessEventResponseType
     */
    public function getProcessEventResponse()
    {
        return $this->processEventResponse;
    }

    /**
     * Sets a new processEventResponse
     *
     * @param \App\Soap\automate\src\ProcessEventResponseType $processEventResponse
     * @return self
     */
    public function setProcessEventResponse(\App\Soap\automate\src\ProcessEventResponseType $processEventResponse)
    {
        $this->processEventResponse = $processEventResponse;
        return $this;
    }


}


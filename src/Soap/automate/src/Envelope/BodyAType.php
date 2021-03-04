<?php

namespace App\Soap\automate\src\Envelope;

/**
 * Class representing BodyAType
 */
class BodyAType
{

    /**
     * @var \App\Soap\automate\src\Envelope\BodyAType\ProcessEventResponseAType $processEventResponse
     */
    private $processEventResponse = null;

    /**
     * Gets as processEventResponse
     *
     * @return \App\Soap\automate\src\Envelope\BodyAType\ProcessEventResponseAType
     */
    public function getProcessEventResponse()
    {
        return $this->processEventResponse;
    }

    /**
     * Sets a new processEventResponse
     *
     * @param \App\Soap\automate\src\Envelope\BodyAType\ProcessEventResponseAType $processEventResponse
     * @return self
     */
    public function setProcessEventResponse(\App\Soap\automate\src\Envelope\BodyAType\ProcessEventResponseAType $processEventResponse)
    {
        $this->processEventResponse = $processEventResponse;
        return $this;
    }


}


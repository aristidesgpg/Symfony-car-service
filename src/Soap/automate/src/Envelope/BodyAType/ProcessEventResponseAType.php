<?php

namespace App\Soap\automate\src\Envelope\BodyAType;

/**
 * Class representing ProcessEventResponseAType
 */
class ProcessEventResponseAType
{

    /**
     * @var \App\Soap\automate\src\Envelope\BodyAType\ProcessEventResponseAType\ProcessEventResultAType $processEventResult
     */
    private $processEventResult = null;

    /**
     * Gets as processEventResult
     *
     * @return \App\Soap\automate\src\Envelope\BodyAType\ProcessEventResponseAType\ProcessEventResultAType
     */
    public function getProcessEventResult()
    {
        return $this->processEventResult;
    }

    /**
     * Sets a new processEventResult
     *
     * @param \App\Soap\automate\src\Envelope\BodyAType\ProcessEventResponseAType\ProcessEventResultAType $processEventResult
     * @return self
     */
    public function setProcessEventResult(\App\Soap\automate\src\Envelope\BodyAType\ProcessEventResponseAType\ProcessEventResultAType $processEventResult)
    {
        $this->processEventResult = $processEventResult;
        return $this;
    }


}


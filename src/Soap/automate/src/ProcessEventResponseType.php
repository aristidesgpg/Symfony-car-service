<?php

namespace App\Soap\automate\src;

/**
 * Class representing ProcessEventResponseType
 *
 * 
 * XSD Type: processEventResponse
 */
class ProcessEventResponseType
{

    /**
     * @var \App\Soap\automate\src\ProcessEventResultType $processEventResult
     */
    private $processEventResult = null;

    /**
     * Gets as processEventResult
     *
     * @return \App\Soap\automate\src\ProcessEventResultType
     */
    public function getProcessEventResult()
    {
        return $this->processEventResult;
    }

    /**
     * Sets a new processEventResult
     *
     * @param \App\Soap\automate\src\ProcessEventResultType $processEventResult
     * @return self
     */
    public function setProcessEventResult(\App\Soap\automate\src\ProcessEventResultType $processEventResult)
    {
        $this->processEventResult = $processEventResult;
        return $this;
    }


}


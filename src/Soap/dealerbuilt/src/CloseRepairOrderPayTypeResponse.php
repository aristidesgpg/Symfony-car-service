<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing CloseRepairOrderPayTypeResponse.
 */
class CloseRepairOrderPayTypeResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationTransactionResponseType
     */
    private $closeRepairOrderPayTypeResult = null;

    /**
     * Gets as closeRepairOrderPayTypeResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationTransactionResponseType
     */
    public function getCloseRepairOrderPayTypeResult()
    {
        return $this->closeRepairOrderPayTypeResult;
    }

    /**
     * Sets a new closeRepairOrderPayTypeResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationTransactionResponseType $closeRepairOrderPayTypeResult
     *
     * @return self
     */
    public function setCloseRepairOrderPayTypeResult(BaseApi\ServiceLocationTransactionResponseType $closeRepairOrderPayTypeResult)
    {
        $this->closeRepairOrderPayTypeResult = $closeRepairOrderPayTypeResult;

        return $this;
    }
}

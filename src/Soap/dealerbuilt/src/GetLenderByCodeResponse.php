<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetLenderByCodeResponse.
 */
class GetLenderByCodeResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\LenderType
     */
    private $getLenderByCodeResult = null;

    /**
     * Gets as getLenderByCodeResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\LenderType
     */
    public function getGetLenderByCodeResult()
    {
        return $this->getLenderByCodeResult;
    }

    /**
     * Sets a new getLenderByCodeResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\LenderType $getLenderByCodeResult
     *
     * @return self
     */
    public function setGetLenderByCodeResult(BaseApi\LenderType $getLenderByCodeResult)
    {
        $this->getLenderByCodeResult = $getLenderByCodeResult;

        return $this;
    }
}

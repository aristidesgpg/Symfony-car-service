<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetLendersResponse.
 */
class GetLendersResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\LenderType[]
     */
    private $getLendersResult = null;

    /**
     * Adds as lender.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\LenderType $lender
     */
    public function addToGetLendersResult(BaseApi\LenderType $lender)
    {
        $this->getLendersResult[] = $lender;

        return $this;
    }

    /**
     * isset getLendersResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetGetLendersResult($index)
    {
        return isset($this->getLendersResult[$index]);
    }

    /**
     * unset getLendersResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetGetLendersResult($index)
    {
        unset($this->getLendersResult[$index]);
    }

    /**
     * Gets as getLendersResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\LenderType[]
     */
    public function getGetLendersResult()
    {
        return $this->getLendersResult;
    }

    /**
     * Sets a new getLendersResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\LenderType[] $getLendersResult
     *
     * @return self
     */
    public function setGetLendersResult(array $getLendersResult)
    {
        $this->getLendersResult = $getLendersResult;

        return $this;
    }
}

<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetDivisionsResponse.
 */
class GetDivisionsResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DivisionType[]
     */
    private $getDivisionsResult = null;

    /**
     * Adds as division.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DivisionType $division
     */
    public function addToGetDivisionsResult(BaseApi\DivisionType $division)
    {
        $this->getDivisionsResult[] = $division;

        return $this;
    }

    /**
     * isset getDivisionsResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetGetDivisionsResult($index)
    {
        return isset($this->getDivisionsResult[$index]);
    }

    /**
     * unset getDivisionsResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetGetDivisionsResult($index)
    {
        unset($this->getDivisionsResult[$index]);
    }

    /**
     * Gets as getDivisionsResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DivisionType[]
     */
    public function getGetDivisionsResult()
    {
        return $this->getDivisionsResult;
    }

    /**
     * Sets a new getDivisionsResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DivisionType[] $getDivisionsResult
     *
     * @return self
     */
    public function setGetDivisionsResult(array $getDivisionsResult)
    {
        $this->getDivisionsResult = $getDivisionsResult;

        return $this;
    }
}

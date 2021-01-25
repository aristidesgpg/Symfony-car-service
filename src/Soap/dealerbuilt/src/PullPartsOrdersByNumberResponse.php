<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullPartsOrdersByNumberResponse.
 */
class PullPartsOrdersByNumberResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PartsOrderType[]
     */
    private $pullPartsOrdersByNumberResult = null;

    /**
     * Adds as partsOrder.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsOrderType $partsOrder
     */
    public function addToPullPartsOrdersByNumberResult(BaseApi\PartsOrderType $partsOrder)
    {
        $this->pullPartsOrdersByNumberResult[] = $partsOrder;

        return $this;
    }

    /**
     * isset pullPartsOrdersByNumberResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPullPartsOrdersByNumberResult($index)
    {
        return isset($this->pullPartsOrdersByNumberResult[$index]);
    }

    /**
     * unset pullPartsOrdersByNumberResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPullPartsOrdersByNumberResult($index)
    {
        unset($this->pullPartsOrdersByNumberResult[$index]);
    }

    /**
     * Gets as pullPartsOrdersByNumberResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PartsOrderType[]
     */
    public function getPullPartsOrdersByNumberResult()
    {
        return $this->pullPartsOrdersByNumberResult;
    }

    /**
     * Sets a new pullPartsOrdersByNumberResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsOrderType[] $pullPartsOrdersByNumberResult
     *
     * @return self
     */
    public function setPullPartsOrdersByNumberResult(array $pullPartsOrdersByNumberResult)
    {
        $this->pullPartsOrdersByNumberResult = $pullPartsOrdersByNumberResult;

        return $this;
    }
}

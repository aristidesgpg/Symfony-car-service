<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullPartsOrdersResponse
 */
class PullPartsOrdersResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PartsOrderType[] $pullPartsOrdersResult
     */
    private $pullPartsOrdersResult = null;

    /**
     * Adds as partsOrder
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsOrderType $partsOrder
     */
    public function addToPullPartsOrdersResult(\App\Soap\dealerbuilt\src\BaseApi\PartsOrderType $partsOrder)
    {
        $this->pullPartsOrdersResult[] = $partsOrder;
        return $this;
    }

    /**
     * isset pullPartsOrdersResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullPartsOrdersResult($index)
    {
        return isset($this->pullPartsOrdersResult[$index]);
    }

    /**
     * unset pullPartsOrdersResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullPartsOrdersResult($index)
    {
        unset($this->pullPartsOrdersResult[$index]);
    }

    /**
     * Gets as pullPartsOrdersResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PartsOrderType[]
     */
    public function getPullPartsOrdersResult()
    {
        return $this->pullPartsOrdersResult;
    }

    /**
     * Sets a new pullPartsOrdersResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsOrderType[] $pullPartsOrdersResult
     * @return self
     */
    public function setPullPartsOrdersResult(array $pullPartsOrdersResult)
    {
        $this->pullPartsOrdersResult = $pullPartsOrdersResult;
        return $this;
    }


}


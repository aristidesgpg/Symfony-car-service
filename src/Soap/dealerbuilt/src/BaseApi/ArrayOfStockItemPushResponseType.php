<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfStockItemPushResponseType
 *
 * 
 * XSD Type: ArrayOfStockItemPushResponse
 */
class ArrayOfStockItemPushResponseType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\StockItemPushResponseType[] $stockItemPushResponse
     */
    private $stockItemPushResponse = [
        
    ];

    /**
     * Adds as stockItemPushResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\StockItemPushResponseType $stockItemPushResponse
     */
    public function addToStockItemPushResponse(\App\Soap\dealerbuilt\src\BaseApi\StockItemPushResponseType $stockItemPushResponse)
    {
        $this->stockItemPushResponse[] = $stockItemPushResponse;
        return $this;
    }

    /**
     * isset stockItemPushResponse
     *
     * @param int|string $index
     * @return bool
     */
    public function issetStockItemPushResponse($index)
    {
        return isset($this->stockItemPushResponse[$index]);
    }

    /**
     * unset stockItemPushResponse
     *
     * @param int|string $index
     * @return void
     */
    public function unsetStockItemPushResponse($index)
    {
        unset($this->stockItemPushResponse[$index]);
    }

    /**
     * Gets as stockItemPushResponse
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\StockItemPushResponseType[]
     */
    public function getStockItemPushResponse()
    {
        return $this->stockItemPushResponse;
    }

    /**
     * Sets a new stockItemPushResponse
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StockItemPushResponseType[] $stockItemPushResponse
     * @return self
     */
    public function setStockItemPushResponse(array $stockItemPushResponse)
    {
        $this->stockItemPushResponse = $stockItemPushResponse;
        return $this;
    }


}


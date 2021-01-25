<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfStockItemPushRequestType
 *
 * 
 * XSD Type: ArrayOfStockItemPushRequest
 */
class ArrayOfStockItemPushRequestType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\StockItemPushRequestType[] $stockItemPushRequest
     */
    private $stockItemPushRequest = [
        
    ];

    /**
     * Adds as stockItemPushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\StockItemPushRequestType $stockItemPushRequest
     */
    public function addToStockItemPushRequest(\App\Soap\dealerbuilt\src\BaseApi\StockItemPushRequestType $stockItemPushRequest)
    {
        $this->stockItemPushRequest[] = $stockItemPushRequest;
        return $this;
    }

    /**
     * isset stockItemPushRequest
     *
     * @param int|string $index
     * @return bool
     */
    public function issetStockItemPushRequest($index)
    {
        return isset($this->stockItemPushRequest[$index]);
    }

    /**
     * unset stockItemPushRequest
     *
     * @param int|string $index
     * @return void
     */
    public function unsetStockItemPushRequest($index)
    {
        unset($this->stockItemPushRequest[$index]);
    }

    /**
     * Gets as stockItemPushRequest
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\StockItemPushRequestType[]
     */
    public function getStockItemPushRequest()
    {
        return $this->stockItemPushRequest;
    }

    /**
     * Sets a new stockItemPushRequest
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StockItemPushRequestType[] $stockItemPushRequest
     * @return self
     */
    public function setStockItemPushRequest(array $stockItemPushRequest)
    {
        $this->stockItemPushRequest = $stockItemPushRequest;
        return $this;
    }


}


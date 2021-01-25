<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfStockItemPushRequestV2Type
 *
 * 
 * XSD Type: ArrayOfStockItemPushRequestV2
 */
class ArrayOfStockItemPushRequestV2Type
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\StockItemPushRequestV2Type[] $stockItemPushRequestV2
     */
    private $stockItemPushRequestV2 = [
        
    ];

    /**
     * Adds as stockItemPushRequestV2
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\StockItemPushRequestV2Type $stockItemPushRequestV2
     */
    public function addToStockItemPushRequestV2(\App\Soap\dealerbuilt\src\BaseApi\StockItemPushRequestV2Type $stockItemPushRequestV2)
    {
        $this->stockItemPushRequestV2[] = $stockItemPushRequestV2;
        return $this;
    }

    /**
     * isset stockItemPushRequestV2
     *
     * @param int|string $index
     * @return bool
     */
    public function issetStockItemPushRequestV2($index)
    {
        return isset($this->stockItemPushRequestV2[$index]);
    }

    /**
     * unset stockItemPushRequestV2
     *
     * @param int|string $index
     * @return void
     */
    public function unsetStockItemPushRequestV2($index)
    {
        unset($this->stockItemPushRequestV2[$index]);
    }

    /**
     * Gets as stockItemPushRequestV2
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\StockItemPushRequestV2Type[]
     */
    public function getStockItemPushRequestV2()
    {
        return $this->stockItemPushRequestV2;
    }

    /**
     * Sets a new stockItemPushRequestV2
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StockItemPushRequestV2Type[] $stockItemPushRequestV2
     * @return self
     */
    public function setStockItemPushRequestV2(array $stockItemPushRequestV2)
    {
        $this->stockItemPushRequestV2 = $stockItemPushRequestV2;
        return $this;
    }


}


<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfStockItemType
 *
 * 
 * XSD Type: ArrayOfStockItem
 */
class ArrayOfStockItemType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\StockItemType[] $stockItem
     */
    private $stockItem = [
        
    ];

    /**
     * Adds as stockItem
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\StockItemType $stockItem
     */
    public function addToStockItem(\App\Soap\dealerbuilt\src\BaseApi\StockItemType $stockItem)
    {
        $this->stockItem[] = $stockItem;
        return $this;
    }

    /**
     * isset stockItem
     *
     * @param int|string $index
     * @return bool
     */
    public function issetStockItem($index)
    {
        return isset($this->stockItem[$index]);
    }

    /**
     * unset stockItem
     *
     * @param int|string $index
     * @return void
     */
    public function unsetStockItem($index)
    {
        unset($this->stockItem[$index]);
    }

    /**
     * Gets as stockItem
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\StockItemType[]
     */
    public function getStockItem()
    {
        return $this->stockItem;
    }

    /**
     * Sets a new stockItem
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StockItemType[] $stockItem
     * @return self
     */
    public function setStockItem(array $stockItem)
    {
        $this->stockItem = $stockItem;
        return $this;
    }


}


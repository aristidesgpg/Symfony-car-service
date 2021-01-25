<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullInventoryByStockNumberResponse
 */
class PullInventoryByStockNumberResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\StockItemType $pullInventoryByStockNumberResult
     */
    private $pullInventoryByStockNumberResult = null;

    /**
     * Gets as pullInventoryByStockNumberResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\StockItemType
     */
    public function getPullInventoryByStockNumberResult()
    {
        return $this->pullInventoryByStockNumberResult;
    }

    /**
     * Sets a new pullInventoryByStockNumberResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StockItemType $pullInventoryByStockNumberResult
     * @return self
     */
    public function setPullInventoryByStockNumberResult(\App\Soap\dealerbuilt\src\BaseApi\StockItemType $pullInventoryByStockNumberResult)
    {
        $this->pullInventoryByStockNumberResult = $pullInventoryByStockNumberResult;
        return $this;
    }


}


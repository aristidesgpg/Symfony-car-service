<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetProductsResponse.
 */
class GetProductsResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ProductListType[]
     */
    private $getProductsResult = null;

    /**
     * Adds as productList.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ProductListType $productList
     */
    public function addToGetProductsResult(BaseApi\ProductListType $productList)
    {
        $this->getProductsResult[] = $productList;

        return $this;
    }

    /**
     * isset getProductsResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetGetProductsResult($index)
    {
        return isset($this->getProductsResult[$index]);
    }

    /**
     * unset getProductsResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetGetProductsResult($index)
    {
        unset($this->getProductsResult[$index]);
    }

    /**
     * Gets as getProductsResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ProductListType[]
     */
    public function getGetProductsResult()
    {
        return $this->getProductsResult;
    }

    /**
     * Sets a new getProductsResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ProductListType[] $getProductsResult
     *
     * @return self
     */
    public function setGetProductsResult(array $getProductsResult)
    {
        $this->getProductsResult = $getProductsResult;

        return $this;
    }
}

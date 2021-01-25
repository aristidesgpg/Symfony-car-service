<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfProductListType
 *
 * 
 * XSD Type: ArrayOfProductList
 */
class ArrayOfProductListType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ProductListType[] $productList
     */
    private $productList = [
        
    ];

    /**
     * Adds as productList
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\ProductListType $productList
     */
    public function addToProductList(\App\Soap\dealerbuilt\src\BaseApi\ProductListType $productList)
    {
        $this->productList[] = $productList;
        return $this;
    }

    /**
     * isset productList
     *
     * @param int|string $index
     * @return bool
     */
    public function issetProductList($index)
    {
        return isset($this->productList[$index]);
    }

    /**
     * unset productList
     *
     * @param int|string $index
     * @return void
     */
    public function unsetProductList($index)
    {
        unset($this->productList[$index]);
    }

    /**
     * Gets as productList
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ProductListType[]
     */
    public function getProductList()
    {
        return $this->productList;
    }

    /**
     * Sets a new productList
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ProductListType[] $productList
     * @return self
     */
    public function setProductList(array $productList)
    {
        $this->productList = $productList;
        return $this;
    }


}


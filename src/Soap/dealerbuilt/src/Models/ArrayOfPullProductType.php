<?php

namespace App\Soap\dealerbuilt\src\Models;

/**
 * Class representing ArrayOfPullProductType
 *
 * 
 * XSD Type: ArrayOfPullProduct
 */
class ArrayOfPullProductType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\PullProductType[] $pullProduct
     */
    private $pullProduct = [
        
    ];

    /**
     * Adds as pullProduct
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\PullProductType $pullProduct
     */
    public function addToPullProduct(\App\Soap\dealerbuilt\src\Models\PullProductType $pullProduct)
    {
        $this->pullProduct[] = $pullProduct;
        return $this;
    }

    /**
     * isset pullProduct
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullProduct($index)
    {
        return isset($this->pullProduct[$index]);
    }

    /**
     * unset pullProduct
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullProduct($index)
    {
        unset($this->pullProduct[$index]);
    }

    /**
     * Gets as pullProduct
     *
     * @return \App\Soap\dealerbuilt\src\Models\PullProductType[]
     */
    public function getPullProduct()
    {
        return $this->pullProduct;
    }

    /**
     * Sets a new pullProduct
     *
     * @param \App\Soap\dealerbuilt\src\Models\PullProductType[] $pullProduct
     * @return self
     */
    public function setPullProduct(array $pullProduct)
    {
        $this->pullProduct = $pullProduct;
        return $this;
    }


}


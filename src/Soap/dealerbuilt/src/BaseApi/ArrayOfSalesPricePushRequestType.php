<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfSalesPricePushRequestType.
 *
 * XSD Type: ArrayOfSalesPricePushRequest
 */
class ArrayOfSalesPricePushRequestType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\SalesPricePushRequestType[]
     */
    private $salesPricePushRequest = [
    ];

    /**
     * Adds as salesPricePushRequest.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\SalesPricePushRequestType $salesPricePushRequest
     */
    public function addToSalesPricePushRequest(SalesPricePushRequestType $salesPricePushRequest)
    {
        $this->salesPricePushRequest[] = $salesPricePushRequest;

        return $this;
    }

    /**
     * isset salesPricePushRequest.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetSalesPricePushRequest($index)
    {
        return isset($this->salesPricePushRequest[$index]);
    }

    /**
     * unset salesPricePushRequest.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetSalesPricePushRequest($index)
    {
        unset($this->salesPricePushRequest[$index]);
    }

    /**
     * Gets as salesPricePushRequest.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\SalesPricePushRequestType[]
     */
    public function getSalesPricePushRequest()
    {
        return $this->salesPricePushRequest;
    }

    /**
     * Sets a new salesPricePushRequest.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\SalesPricePushRequestType[] $salesPricePushRequest
     *
     * @return self
     */
    public function setSalesPricePushRequest(array $salesPricePushRequest)
    {
        $this->salesPricePushRequest = $salesPricePushRequest;

        return $this;
    }
}

<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetSalesPersonsResponse.
 */
class GetSalesPersonsResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\StorePersonsType[]
     */
    private $getSalesPersonsResult = null;

    /**
     * Adds as storePersons.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StorePersonsType $storePersons
     */
    public function addToGetSalesPersonsResult(BaseApi\StorePersonsType $storePersons)
    {
        $this->getSalesPersonsResult[] = $storePersons;

        return $this;
    }

    /**
     * isset getSalesPersonsResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetGetSalesPersonsResult($index)
    {
        return isset($this->getSalesPersonsResult[$index]);
    }

    /**
     * unset getSalesPersonsResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetGetSalesPersonsResult($index)
    {
        unset($this->getSalesPersonsResult[$index]);
    }

    /**
     * Gets as getSalesPersonsResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\StorePersonsType[]
     */
    public function getGetSalesPersonsResult()
    {
        return $this->getSalesPersonsResult;
    }

    /**
     * Sets a new getSalesPersonsResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StorePersonsType[] $getSalesPersonsResult
     *
     * @return self
     */
    public function setGetSalesPersonsResult(array $getSalesPersonsResult)
    {
        $this->getSalesPersonsResult = $getSalesPersonsResult;

        return $this;
    }
}

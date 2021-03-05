<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfSalesPersonType
 *
 * 
 * XSD Type: ArrayOfSalesPerson
 */
class ArrayOfSalesPersonType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\SalesPersonType[] $salesPerson
     */
    private $salesPerson = [
        
    ];

    /**
     * Adds as salesPerson
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\SalesPersonType $salesPerson
     */
    public function addToSalesPerson(\App\Soap\dealerbuilt\src\BaseApi\SalesPersonType $salesPerson)
    {
        $this->salesPerson[] = $salesPerson;
        return $this;
    }

    /**
     * isset salesPerson
     *
     * @param int|string $index
     * @return bool
     */
    public function issetSalesPerson($index)
    {
        return isset($this->salesPerson[$index]);
    }

    /**
     * unset salesPerson
     *
     * @param int|string $index
     * @return void
     */
    public function unsetSalesPerson($index)
    {
        unset($this->salesPerson[$index]);
    }

    /**
     * Gets as salesPerson
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\SalesPersonType[]
     */
    public function getSalesPerson()
    {
        return $this->salesPerson;
    }

    /**
     * Sets a new salesPerson
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\SalesPersonType[] $salesPerson
     * @return self
     */
    public function setSalesPerson(array $salesPerson)
    {
        $this->salesPerson = $salesPerson;
        return $this;
    }


}


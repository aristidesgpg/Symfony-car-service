<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfStorePersonsType
 *
 * 
 * XSD Type: ArrayOfStorePersons
 */
class ArrayOfStorePersonsType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\StorePersonsType[] $storePersons
     */
    private $storePersons = [
        
    ];

    /**
     * Adds as storePersons
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\StorePersonsType $storePersons
     */
    public function addToStorePersons(\App\Soap\dealerbuilt\src\BaseApi\StorePersonsType $storePersons)
    {
        $this->storePersons[] = $storePersons;
        return $this;
    }

    /**
     * isset storePersons
     *
     * @param int|string $index
     * @return bool
     */
    public function issetStorePersons($index)
    {
        return isset($this->storePersons[$index]);
    }

    /**
     * unset storePersons
     *
     * @param int|string $index
     * @return void
     */
    public function unsetStorePersons($index)
    {
        unset($this->storePersons[$index]);
    }

    /**
     * Gets as storePersons
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\StorePersonsType[]
     */
    public function getStorePersons()
    {
        return $this->storePersons;
    }

    /**
     * Sets a new storePersons
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StorePersonsType[] $storePersons
     * @return self
     */
    public function setStorePersons(array $storePersons)
    {
        $this->storePersons = $storePersons;
        return $this;
    }


}


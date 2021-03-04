<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfStoreSetupType
 *
 * 
 * XSD Type: ArrayOfStoreSetup
 */
class ArrayOfStoreSetupType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\StoreSetupType[] $storeSetup
     */
    private $storeSetup = [
        
    ];

    /**
     * Adds as storeSetup
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\StoreSetupType $storeSetup
     */
    public function addToStoreSetup(\App\Soap\dealerbuilt\src\BaseApi\StoreSetupType $storeSetup)
    {
        $this->storeSetup[] = $storeSetup;
        return $this;
    }

    /**
     * isset storeSetup
     *
     * @param int|string $index
     * @return bool
     */
    public function issetStoreSetup($index)
    {
        return isset($this->storeSetup[$index]);
    }

    /**
     * unset storeSetup
     *
     * @param int|string $index
     * @return void
     */
    public function unsetStoreSetup($index)
    {
        unset($this->storeSetup[$index]);
    }

    /**
     * Gets as storeSetup
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\StoreSetupType[]
     */
    public function getStoreSetup()
    {
        return $this->storeSetup;
    }

    /**
     * Sets a new storeSetup
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StoreSetupType[] $storeSetup
     * @return self
     */
    public function setStoreSetup(array $storeSetup)
    {
        $this->storeSetup = $storeSetup;
        return $this;
    }


}


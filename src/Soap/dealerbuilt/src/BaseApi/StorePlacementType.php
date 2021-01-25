<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing StorePlacementType
 *
 * 
 * XSD Type: StorePlacement
 */
class StorePlacementType extends CompanyPlacementType
{

    /**
     * @var int $storeId
     */
    private $storeId = null;

    /**
     * @var string $storeName
     */
    private $storeName = null;

    /**
     * Gets as storeId
     *
     * @return int
     */
    public function getStoreId()
    {
        return $this->storeId;
    }

    /**
     * Sets a new storeId
     *
     * @param int $storeId
     * @return self
     */
    public function setStoreId($storeId)
    {
        $this->storeId = $storeId;
        return $this;
    }

    /**
     * Gets as storeName
     *
     * @return string
     */
    public function getStoreName()
    {
        return $this->storeName;
    }

    /**
     * Sets a new storeName
     *
     * @param string $storeName
     * @return self
     */
    public function setStoreName($storeName)
    {
        $this->storeName = $storeName;
        return $this;
    }


}


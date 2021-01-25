<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing SalesPricePushRequestType.
 *
 * XSD Type: SalesPricePushRequest
 */
class SalesPricePushRequestType
{
    /**
     * @var string
     */
    private $externalVehicleId = null;

    /**
     * @var string
     */
    private $inventoryKey = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Stock\SalesPriceAttributesType
     */
    private $salesPriceAttributes = null;

    /**
     * @var string
     */
    private $stockNumber = null;

    /**
     * @var int
     */
    private $storeId = null;

    /**
     * @var int
     */
    private $uniqueId = null;

    /**
     * @var string
     */
    private $vin = null;

    /**
     * Gets as externalVehicleId.
     *
     * @return string
     */
    public function getExternalVehicleId()
    {
        return $this->externalVehicleId;
    }

    /**
     * Sets a new externalVehicleId.
     *
     * @param string $externalVehicleId
     *
     * @return self
     */
    public function setExternalVehicleId($externalVehicleId)
    {
        $this->externalVehicleId = $externalVehicleId;

        return $this;
    }

    /**
     * Gets as inventoryKey.
     *
     * @return string
     */
    public function getInventoryKey()
    {
        return $this->inventoryKey;
    }

    /**
     * Sets a new inventoryKey.
     *
     * @param string $inventoryKey
     *
     * @return self
     */
    public function setInventoryKey($inventoryKey)
    {
        $this->inventoryKey = $inventoryKey;

        return $this;
    }

    /**
     * Gets as salesPriceAttributes.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Stock\SalesPriceAttributesType
     */
    public function getSalesPriceAttributes()
    {
        return $this->salesPriceAttributes;
    }

    /**
     * Sets a new salesPriceAttributes.
     *
     * @return self
     */
    public function setSalesPriceAttributes(\App\Soap\dealerbuilt\src\Models\Stock\SalesPriceAttributesType $salesPriceAttributes)
    {
        $this->salesPriceAttributes = $salesPriceAttributes;

        return $this;
    }

    /**
     * Gets as stockNumber.
     *
     * @return string
     */
    public function getStockNumber()
    {
        return $this->stockNumber;
    }

    /**
     * Sets a new stockNumber.
     *
     * @param string $stockNumber
     *
     * @return self
     */
    public function setStockNumber($stockNumber)
    {
        $this->stockNumber = $stockNumber;

        return $this;
    }

    /**
     * Gets as storeId.
     *
     * @return int
     */
    public function getStoreId()
    {
        return $this->storeId;
    }

    /**
     * Sets a new storeId.
     *
     * @param int $storeId
     *
     * @return self
     */
    public function setStoreId($storeId)
    {
        $this->storeId = $storeId;

        return $this;
    }

    /**
     * Gets as uniqueId.
     *
     * @return int
     */
    public function getUniqueId()
    {
        return $this->uniqueId;
    }

    /**
     * Sets a new uniqueId.
     *
     * @param int $uniqueId
     *
     * @return self
     */
    public function setUniqueId($uniqueId)
    {
        $this->uniqueId = $uniqueId;

        return $this;
    }

    /**
     * Gets as vin.
     *
     * @return string
     */
    public function getVin()
    {
        return $this->vin;
    }

    /**
     * Sets a new vin.
     *
     * @param string $vin
     *
     * @return self
     */
    public function setVin($vin)
    {
        $this->vin = $vin;

        return $this;
    }
}

<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing StockItemPushResponseType
 *
 * 
 * XSD Type: StockItemPushResponse
 */
class StockItemPushResponseType extends StorePushResponseType
{

    /**
     * @var string $inventoryKey
     */
    private $inventoryKey = null;

    /**
     * @var string $stockNumber
     */
    private $stockNumber = null;

    /**
     * @var string $vehicleKey
     */
    private $vehicleKey = null;

    /**
     * Gets as inventoryKey
     *
     * @return string
     */
    public function getInventoryKey()
    {
        return $this->inventoryKey;
    }

    /**
     * Sets a new inventoryKey
     *
     * @param string $inventoryKey
     * @return self
     */
    public function setInventoryKey($inventoryKey)
    {
        $this->inventoryKey = $inventoryKey;
        return $this;
    }

    /**
     * Gets as stockNumber
     *
     * @return string
     */
    public function getStockNumber()
    {
        return $this->stockNumber;
    }

    /**
     * Sets a new stockNumber
     *
     * @param string $stockNumber
     * @return self
     */
    public function setStockNumber($stockNumber)
    {
        $this->stockNumber = $stockNumber;
        return $this;
    }

    /**
     * Gets as vehicleKey
     *
     * @return string
     */
    public function getVehicleKey()
    {
        return $this->vehicleKey;
    }

    /**
     * Sets a new vehicleKey
     *
     * @param string $vehicleKey
     * @return self
     */
    public function setVehicleKey($vehicleKey)
    {
        $this->vehicleKey = $vehicleKey;
        return $this;
    }


}


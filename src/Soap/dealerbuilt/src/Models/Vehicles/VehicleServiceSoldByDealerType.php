<?php

namespace App\Soap\dealerbuilt\src\Models\Vehicles;

/**
 * Class representing VehicleServiceSoldByDealerType
 *
 * 
 * XSD Type: VehicleService.SoldByDealer
 */
class VehicleServiceSoldByDealerType
{

    /**
     * @var string $dealerCity
     */
    private $dealerCity = null;

    /**
     * @var string $dealerCode
     */
    private $dealerCode = null;

    /**
     * @var string $dealerName
     */
    private $dealerName = null;

    /**
     * @var string $dealerState
     */
    private $dealerState = null;

    /**
     * Gets as dealerCity
     *
     * @return string
     */
    public function getDealerCity()
    {
        return $this->dealerCity;
    }

    /**
     * Sets a new dealerCity
     *
     * @param string $dealerCity
     * @return self
     */
    public function setDealerCity($dealerCity)
    {
        $this->dealerCity = $dealerCity;
        return $this;
    }

    /**
     * Gets as dealerCode
     *
     * @return string
     */
    public function getDealerCode()
    {
        return $this->dealerCode;
    }

    /**
     * Sets a new dealerCode
     *
     * @param string $dealerCode
     * @return self
     */
    public function setDealerCode($dealerCode)
    {
        $this->dealerCode = $dealerCode;
        return $this;
    }

    /**
     * Gets as dealerName
     *
     * @return string
     */
    public function getDealerName()
    {
        return $this->dealerName;
    }

    /**
     * Sets a new dealerName
     *
     * @param string $dealerName
     * @return self
     */
    public function setDealerName($dealerName)
    {
        $this->dealerName = $dealerName;
        return $this;
    }

    /**
     * Gets as dealerState
     *
     * @return string
     */
    public function getDealerState()
    {
        return $this->dealerState;
    }

    /**
     * Sets a new dealerState
     *
     * @param string $dealerState
     * @return self
     */
    public function setDealerState($dealerState)
    {
        $this->dealerState = $dealerState;
        return $this;
    }


}


<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing PushedRepairOrderTechsAttributesType
 *
 * 
 * XSD Type: PushedRepairOrderTechsAttributes
 */
class PushedRepairOrderTechsAttributesType
{

    /**
     * @var float $actualHours
     */
    private $actualHours = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $cost
     */
    private $cost = null;

    /**
     * @var float $estimatedHours
     */
    private $estimatedHours = null;

    /**
     * @var string $factoryId
     */
    private $factoryId = null;

    /**
     * @var float $flatRateHours
     */
    private $flatRateHours = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $laborAmount
     */
    private $laborAmount = null;

    /**
     * @var string $modifiedBy
     */
    private $modifiedBy = null;

    /**
     * @var string $payType
     */
    private $payType = null;

    /**
     * @var string $techId
     */
    private $techId = null;

    /**
     * Gets as actualHours
     *
     * @return float
     */
    public function getActualHours()
    {
        return $this->actualHours;
    }

    /**
     * Sets a new actualHours
     *
     * @param float $actualHours
     * @return self
     */
    public function setActualHours($actualHours)
    {
        $this->actualHours = $actualHours;
        return $this;
    }

    /**
     * Gets as cost
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Sets a new cost
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $cost
     * @return self
     */
    public function setCost(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $cost)
    {
        $this->cost = $cost;
        return $this;
    }

    /**
     * Gets as estimatedHours
     *
     * @return float
     */
    public function getEstimatedHours()
    {
        return $this->estimatedHours;
    }

    /**
     * Sets a new estimatedHours
     *
     * @param float $estimatedHours
     * @return self
     */
    public function setEstimatedHours($estimatedHours)
    {
        $this->estimatedHours = $estimatedHours;
        return $this;
    }

    /**
     * Gets as factoryId
     *
     * @return string
     */
    public function getFactoryId()
    {
        return $this->factoryId;
    }

    /**
     * Sets a new factoryId
     *
     * @param string $factoryId
     * @return self
     */
    public function setFactoryId($factoryId)
    {
        $this->factoryId = $factoryId;
        return $this;
    }

    /**
     * Gets as flatRateHours
     *
     * @return float
     */
    public function getFlatRateHours()
    {
        return $this->flatRateHours;
    }

    /**
     * Sets a new flatRateHours
     *
     * @param float $flatRateHours
     * @return self
     */
    public function setFlatRateHours($flatRateHours)
    {
        $this->flatRateHours = $flatRateHours;
        return $this;
    }

    /**
     * Gets as laborAmount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getLaborAmount()
    {
        return $this->laborAmount;
    }

    /**
     * Sets a new laborAmount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $laborAmount
     * @return self
     */
    public function setLaborAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $laborAmount)
    {
        $this->laborAmount = $laborAmount;
        return $this;
    }

    /**
     * Gets as modifiedBy
     *
     * @return string
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    /**
     * Sets a new modifiedBy
     *
     * @param string $modifiedBy
     * @return self
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }

    /**
     * Gets as payType
     *
     * @return string
     */
    public function getPayType()
    {
        return $this->payType;
    }

    /**
     * Sets a new payType
     *
     * @param string $payType
     * @return self
     */
    public function setPayType($payType)
    {
        $this->payType = $payType;
        return $this;
    }

    /**
     * Gets as techId
     *
     * @return string
     */
    public function getTechId()
    {
        return $this->techId;
    }

    /**
     * Sets a new techId
     *
     * @param string $techId
     * @return self
     */
    public function setTechId($techId)
    {
        $this->techId = $techId;
        return $this;
    }


}


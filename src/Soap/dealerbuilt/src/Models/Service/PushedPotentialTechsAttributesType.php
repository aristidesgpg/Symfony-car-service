<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing PushedPotentialTechsAttributesType
 *
 * 
 * XSD Type: PushedPotentialTechsAttributes
 */
class PushedPotentialTechsAttributesType
{

    /**
     * @var float $actualHours
     */
    private $actualHours = null;

    /**
     * @var float $cost
     */
    private $cost = null;

    /**
     * @var float $estimatedHours
     */
    private $estimatedHours = null;

    /**
     * @var float $flatRateHours
     */
    private $flatRateHours = null;

    /**
     * @var float $laborAmount
     */
    private $laborAmount = null;

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
     * @return float
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Sets a new cost
     *
     * @param float $cost
     * @return self
     */
    public function setCost($cost)
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
     * @return float
     */
    public function getLaborAmount()
    {
        return $this->laborAmount;
    }

    /**
     * Sets a new laborAmount
     *
     * @param float $laborAmount
     * @return self
     */
    public function setLaborAmount($laborAmount)
    {
        $this->laborAmount = $laborAmount;
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


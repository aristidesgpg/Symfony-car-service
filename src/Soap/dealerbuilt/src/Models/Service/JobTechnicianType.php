<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing JobTechnicianType.
 *
 * XSD Type: JobTechnician
 */
class JobTechnicianType
{
    /**
     * @var float
     */
    private $actualHours = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $cost = null;

    /**
     * @var float
     */
    private $estimatedHours = null;

    /**
     * @var float
     */
    private $flatRateHours = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $laborAmount = null;

    /**
     * @var string
     */
    private $payType = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType
     */
    private $tech = null;

    /**
     * Gets as actualHours.
     *
     * @return float
     */
    public function getActualHours()
    {
        return $this->actualHours;
    }

    /**
     * Sets a new actualHours.
     *
     * @param float $actualHours
     *
     * @return self
     */
    public function setActualHours($actualHours)
    {
        $this->actualHours = $actualHours;

        return $this;
    }

    /**
     * Gets as cost.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Sets a new cost.
     *
     * @return self
     */
    public function setCost(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Gets as estimatedHours.
     *
     * @return float
     */
    public function getEstimatedHours()
    {
        return $this->estimatedHours;
    }

    /**
     * Sets a new estimatedHours.
     *
     * @param float $estimatedHours
     *
     * @return self
     */
    public function setEstimatedHours($estimatedHours)
    {
        $this->estimatedHours = $estimatedHours;

        return $this;
    }

    /**
     * Gets as flatRateHours.
     *
     * @return float
     */
    public function getFlatRateHours()
    {
        return $this->flatRateHours;
    }

    /**
     * Sets a new flatRateHours.
     *
     * @param float $flatRateHours
     *
     * @return self
     */
    public function setFlatRateHours($flatRateHours)
    {
        $this->flatRateHours = $flatRateHours;

        return $this;
    }

    /**
     * Gets as laborAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getLaborAmount()
    {
        return $this->laborAmount;
    }

    /**
     * Sets a new laborAmount.
     *
     * @return self
     */
    public function setLaborAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $laborAmount)
    {
        $this->laborAmount = $laborAmount;

        return $this;
    }

    /**
     * Gets as payType.
     *
     * @return string
     */
    public function getPayType()
    {
        return $this->payType;
    }

    /**
     * Sets a new payType.
     *
     * @param string $payType
     *
     * @return self
     */
    public function setPayType($payType)
    {
        $this->payType = $payType;

        return $this;
    }

    /**
     * Gets as tech.
     *
     * @return \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType
     */
    public function getTech()
    {
        return $this->tech;
    }

    /**
     * Sets a new tech.
     *
     * @return self
     */
    public function setTech(\App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType $tech)
    {
        $this->tech = $tech;

        return $this;
    }
}

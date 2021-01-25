<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing RentalVehicleType.
 *
 * XSD Type: RentalVehicle
 */
class RentalVehicleType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $dailyRate = null;

    /**
     * @var \DateTime
     */
    private $inStamp = null;

    /**
     * @var string
     */
    private $licensePlate = null;

    /**
     * @var \DateTime
     */
    private $outStamp = null;

    /**
     * @var string
     */
    private $payType = null;

    /**
     * @var float
     */
    private $rentalDays = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $totalAmountCharged = null;

    /**
     * @var string
     */
    private $vin = null;

    /**
     * Gets as dailyRate.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getDailyRate()
    {
        return $this->dailyRate;
    }

    /**
     * Sets a new dailyRate.
     *
     * @return self
     */
    public function setDailyRate(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $dailyRate)
    {
        $this->dailyRate = $dailyRate;

        return $this;
    }

    /**
     * Gets as inStamp.
     *
     * @return \DateTime
     */
    public function getInStamp()
    {
        return $this->inStamp;
    }

    /**
     * Sets a new inStamp.
     *
     * @return self
     */
    public function setInStamp(\DateTime $inStamp)
    {
        $this->inStamp = $inStamp;

        return $this;
    }

    /**
     * Gets as licensePlate.
     *
     * @return string
     */
    public function getLicensePlate()
    {
        return $this->licensePlate;
    }

    /**
     * Sets a new licensePlate.
     *
     * @param string $licensePlate
     *
     * @return self
     */
    public function setLicensePlate($licensePlate)
    {
        $this->licensePlate = $licensePlate;

        return $this;
    }

    /**
     * Gets as outStamp.
     *
     * @return \DateTime
     */
    public function getOutStamp()
    {
        return $this->outStamp;
    }

    /**
     * Sets a new outStamp.
     *
     * @return self
     */
    public function setOutStamp(\DateTime $outStamp)
    {
        $this->outStamp = $outStamp;

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
     * Gets as rentalDays.
     *
     * @return float
     */
    public function getRentalDays()
    {
        return $this->rentalDays;
    }

    /**
     * Sets a new rentalDays.
     *
     * @param float $rentalDays
     *
     * @return self
     */
    public function setRentalDays($rentalDays)
    {
        $this->rentalDays = $rentalDays;

        return $this;
    }

    /**
     * Gets as totalAmountCharged.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTotalAmountCharged()
    {
        return $this->totalAmountCharged;
    }

    /**
     * Sets a new totalAmountCharged.
     *
     * @return self
     */
    public function setTotalAmountCharged(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalAmountCharged)
    {
        $this->totalAmountCharged = $totalAmountCharged;

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

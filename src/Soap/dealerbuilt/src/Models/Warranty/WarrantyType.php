<?php

namespace App\Soap\dealerbuilt\src\Models\Warranty;

/**
 * Class representing WarrantyType.
 *
 * XSD Type: Warranty
 */
class WarrantyType
{
    /**
     * @var string
     */
    private $factoryExtWarrantyCode = null;

    /**
     * @var \DateTime
     */
    private $factoryExtWarrantyDate = null;

    /**
     * @var int
     */
    private $factoryExtWarrantyMileage = null;

    /**
     * @var string
     */
    private $factoryExtWarrantyMileageUOM = null;

    /**
     * @var int
     */
    private $factoryExtWarrantyRemaining = null;

    /**
     * @var float
     */
    private $termMeasure = null;

    /**
     * @var string
     */
    private $warrantyCancelCode = null;

    /**
     * @var \DateTime
     */
    private $warrantyCancelDate = null;

    /**
     * @var float
     */
    private $warrantyEndDistanceMeasure = null;

    /**
     * @var \DateTime
     */
    private $warrantyExpirationDate = null;

    /**
     * @var \DateTime
     */
    private $warrantyStartDate = null;

    /**
     * @var string
     */
    private $warrantyStatus = null;

    /**
     * @var string
     */
    private $warrantyStatusType = null;

    /**
     * @var string
     */
    private $warrantyTypeDescription = null;

    /**
     * Gets as factoryExtWarrantyCode.
     *
     * @return string
     */
    public function getFactoryExtWarrantyCode()
    {
        return $this->factoryExtWarrantyCode;
    }

    /**
     * Sets a new factoryExtWarrantyCode.
     *
     * @param string $factoryExtWarrantyCode
     *
     * @return self
     */
    public function setFactoryExtWarrantyCode($factoryExtWarrantyCode)
    {
        $this->factoryExtWarrantyCode = $factoryExtWarrantyCode;

        return $this;
    }

    /**
     * Gets as factoryExtWarrantyDate.
     *
     * @return \DateTime
     */
    public function getFactoryExtWarrantyDate()
    {
        return $this->factoryExtWarrantyDate;
    }

    /**
     * Sets a new factoryExtWarrantyDate.
     *
     * @return self
     */
    public function setFactoryExtWarrantyDate(\DateTime $factoryExtWarrantyDate)
    {
        $this->factoryExtWarrantyDate = $factoryExtWarrantyDate;

        return $this;
    }

    /**
     * Gets as factoryExtWarrantyMileage.
     *
     * @return int
     */
    public function getFactoryExtWarrantyMileage()
    {
        return $this->factoryExtWarrantyMileage;
    }

    /**
     * Sets a new factoryExtWarrantyMileage.
     *
     * @param int $factoryExtWarrantyMileage
     *
     * @return self
     */
    public function setFactoryExtWarrantyMileage($factoryExtWarrantyMileage)
    {
        $this->factoryExtWarrantyMileage = $factoryExtWarrantyMileage;

        return $this;
    }

    /**
     * Gets as factoryExtWarrantyMileageUOM.
     *
     * @return string
     */
    public function getFactoryExtWarrantyMileageUOM()
    {
        return $this->factoryExtWarrantyMileageUOM;
    }

    /**
     * Sets a new factoryExtWarrantyMileageUOM.
     *
     * @param string $factoryExtWarrantyMileageUOM
     *
     * @return self
     */
    public function setFactoryExtWarrantyMileageUOM($factoryExtWarrantyMileageUOM)
    {
        $this->factoryExtWarrantyMileageUOM = $factoryExtWarrantyMileageUOM;

        return $this;
    }

    /**
     * Gets as factoryExtWarrantyRemaining.
     *
     * @return int
     */
    public function getFactoryExtWarrantyRemaining()
    {
        return $this->factoryExtWarrantyRemaining;
    }

    /**
     * Sets a new factoryExtWarrantyRemaining.
     *
     * @param int $factoryExtWarrantyRemaining
     *
     * @return self
     */
    public function setFactoryExtWarrantyRemaining($factoryExtWarrantyRemaining)
    {
        $this->factoryExtWarrantyRemaining = $factoryExtWarrantyRemaining;

        return $this;
    }

    /**
     * Gets as termMeasure.
     *
     * @return float
     */
    public function getTermMeasure()
    {
        return $this->termMeasure;
    }

    /**
     * Sets a new termMeasure.
     *
     * @param float $termMeasure
     *
     * @return self
     */
    public function setTermMeasure($termMeasure)
    {
        $this->termMeasure = $termMeasure;

        return $this;
    }

    /**
     * Gets as warrantyCancelCode.
     *
     * @return string
     */
    public function getWarrantyCancelCode()
    {
        return $this->warrantyCancelCode;
    }

    /**
     * Sets a new warrantyCancelCode.
     *
     * @param string $warrantyCancelCode
     *
     * @return self
     */
    public function setWarrantyCancelCode($warrantyCancelCode)
    {
        $this->warrantyCancelCode = $warrantyCancelCode;

        return $this;
    }

    /**
     * Gets as warrantyCancelDate.
     *
     * @return \DateTime
     */
    public function getWarrantyCancelDate()
    {
        return $this->warrantyCancelDate;
    }

    /**
     * Sets a new warrantyCancelDate.
     *
     * @return self
     */
    public function setWarrantyCancelDate(\DateTime $warrantyCancelDate)
    {
        $this->warrantyCancelDate = $warrantyCancelDate;

        return $this;
    }

    /**
     * Gets as warrantyEndDistanceMeasure.
     *
     * @return float
     */
    public function getWarrantyEndDistanceMeasure()
    {
        return $this->warrantyEndDistanceMeasure;
    }

    /**
     * Sets a new warrantyEndDistanceMeasure.
     *
     * @param float $warrantyEndDistanceMeasure
     *
     * @return self
     */
    public function setWarrantyEndDistanceMeasure($warrantyEndDistanceMeasure)
    {
        $this->warrantyEndDistanceMeasure = $warrantyEndDistanceMeasure;

        return $this;
    }

    /**
     * Gets as warrantyExpirationDate.
     *
     * @return \DateTime
     */
    public function getWarrantyExpirationDate()
    {
        return $this->warrantyExpirationDate;
    }

    /**
     * Sets a new warrantyExpirationDate.
     *
     * @return self
     */
    public function setWarrantyExpirationDate(\DateTime $warrantyExpirationDate)
    {
        $this->warrantyExpirationDate = $warrantyExpirationDate;

        return $this;
    }

    /**
     * Gets as warrantyStartDate.
     *
     * @return \DateTime
     */
    public function getWarrantyStartDate()
    {
        return $this->warrantyStartDate;
    }

    /**
     * Sets a new warrantyStartDate.
     *
     * @return self
     */
    public function setWarrantyStartDate(\DateTime $warrantyStartDate)
    {
        $this->warrantyStartDate = $warrantyStartDate;

        return $this;
    }

    /**
     * Gets as warrantyStatus.
     *
     * @return string
     */
    public function getWarrantyStatus()
    {
        return $this->warrantyStatus;
    }

    /**
     * Sets a new warrantyStatus.
     *
     * @param string $warrantyStatus
     *
     * @return self
     */
    public function setWarrantyStatus($warrantyStatus)
    {
        $this->warrantyStatus = $warrantyStatus;

        return $this;
    }

    /**
     * Gets as warrantyStatusType.
     *
     * @return string
     */
    public function getWarrantyStatusType()
    {
        return $this->warrantyStatusType;
    }

    /**
     * Sets a new warrantyStatusType.
     *
     * @param string $warrantyStatusType
     *
     * @return self
     */
    public function setWarrantyStatusType($warrantyStatusType)
    {
        $this->warrantyStatusType = $warrantyStatusType;

        return $this;
    }

    /**
     * Gets as warrantyTypeDescription.
     *
     * @return string
     */
    public function getWarrantyTypeDescription()
    {
        return $this->warrantyTypeDescription;
    }

    /**
     * Sets a new warrantyTypeDescription.
     *
     * @param string $warrantyTypeDescription
     *
     * @return self
     */
    public function setWarrantyTypeDescription($warrantyTypeDescription)
    {
        $this->warrantyTypeDescription = $warrantyTypeDescription;

        return $this;
    }
}

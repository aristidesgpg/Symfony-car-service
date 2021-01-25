<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing ServiceContractType.
 *
 * XSD Type: ServiceContract
 */
class ServiceContractType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\IdentityProfileType
     */
    private $company = null;

    /**
     * @var string
     */
    private $contractId = null;

    /**
     * @var int
     */
    private $contractRemaining = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $cost = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $deductible = null;

    /**
     * @var bool
     */
    private $deleteFlag = null;

    /**
     * @var string
     */
    private $department = null;

    /**
     * @var \DateTime
     */
    private $effectiveDate = null;

    /**
     * @var \DateTime
     */
    private $expirationDate = null;

    /**
     * @var int
     */
    private $inServiceMiles = null;

    /**
     * @var string
     */
    private $itemCode = null;

    /**
     * @var int
     */
    private $itemizationId = null;

    /**
     * @var string
     */
    private $name = null;

    /**
     * @var string
     */
    private $planCode = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $premium = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $price = null;

    /**
     * @var \DateTime
     */
    private $purchaseDate = null;

    /**
     * @var string
     */
    private $status = null;

    /**
     * @var int
     */
    private $termMileage = null;

    /**
     * @var int
     */
    private $termMonths = null;

    /**
     * @var bool
     */
    private $transferred = null;

    /**
     * Gets as company.
     *
     * @return \App\Soap\dealerbuilt\src\Models\IdentityProfileType
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Sets a new company.
     *
     * @return self
     */
    public function setCompany(\App\Soap\dealerbuilt\src\Models\IdentityProfileType $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Gets as contractId.
     *
     * @return string
     */
    public function getContractId()
    {
        return $this->contractId;
    }

    /**
     * Sets a new contractId.
     *
     * @param string $contractId
     *
     * @return self
     */
    public function setContractId($contractId)
    {
        $this->contractId = $contractId;

        return $this;
    }

    /**
     * Gets as contractRemaining.
     *
     * @return int
     */
    public function getContractRemaining()
    {
        return $this->contractRemaining;
    }

    /**
     * Sets a new contractRemaining.
     *
     * @param int $contractRemaining
     *
     * @return self
     */
    public function setContractRemaining($contractRemaining)
    {
        $this->contractRemaining = $contractRemaining;

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
     * Gets as deductible.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getDeductible()
    {
        return $this->deductible;
    }

    /**
     * Sets a new deductible.
     *
     * @return self
     */
    public function setDeductible(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $deductible)
    {
        $this->deductible = $deductible;

        return $this;
    }

    /**
     * Gets as deleteFlag.
     *
     * @return bool
     */
    public function getDeleteFlag()
    {
        return $this->deleteFlag;
    }

    /**
     * Sets a new deleteFlag.
     *
     * @param bool $deleteFlag
     *
     * @return self
     */
    public function setDeleteFlag($deleteFlag)
    {
        $this->deleteFlag = $deleteFlag;

        return $this;
    }

    /**
     * Gets as department.
     *
     * @return string
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Sets a new department.
     *
     * @param string $department
     *
     * @return self
     */
    public function setDepartment($department)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Gets as effectiveDate.
     *
     * @return \DateTime
     */
    public function getEffectiveDate()
    {
        return $this->effectiveDate;
    }

    /**
     * Sets a new effectiveDate.
     *
     * @return self
     */
    public function setEffectiveDate(\DateTime $effectiveDate)
    {
        $this->effectiveDate = $effectiveDate;

        return $this;
    }

    /**
     * Gets as expirationDate.
     *
     * @return \DateTime
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * Sets a new expirationDate.
     *
     * @return self
     */
    public function setExpirationDate(\DateTime $expirationDate)
    {
        $this->expirationDate = $expirationDate;

        return $this;
    }

    /**
     * Gets as inServiceMiles.
     *
     * @return int
     */
    public function getInServiceMiles()
    {
        return $this->inServiceMiles;
    }

    /**
     * Sets a new inServiceMiles.
     *
     * @param int $inServiceMiles
     *
     * @return self
     */
    public function setInServiceMiles($inServiceMiles)
    {
        $this->inServiceMiles = $inServiceMiles;

        return $this;
    }

    /**
     * Gets as itemCode.
     *
     * @return string
     */
    public function getItemCode()
    {
        return $this->itemCode;
    }

    /**
     * Sets a new itemCode.
     *
     * @param string $itemCode
     *
     * @return self
     */
    public function setItemCode($itemCode)
    {
        $this->itemCode = $itemCode;

        return $this;
    }

    /**
     * Gets as itemizationId.
     *
     * @return int
     */
    public function getItemizationId()
    {
        return $this->itemizationId;
    }

    /**
     * Sets a new itemizationId.
     *
     * @param int $itemizationId
     *
     * @return self
     */
    public function setItemizationId($itemizationId)
    {
        $this->itemizationId = $itemizationId;

        return $this;
    }

    /**
     * Gets as name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets a new name.
     *
     * @param string $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets as planCode.
     *
     * @return string
     */
    public function getPlanCode()
    {
        return $this->planCode;
    }

    /**
     * Sets a new planCode.
     *
     * @param string $planCode
     *
     * @return self
     */
    public function setPlanCode($planCode)
    {
        $this->planCode = $planCode;

        return $this;
    }

    /**
     * Gets as premium.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getPremium()
    {
        return $this->premium;
    }

    /**
     * Sets a new premium.
     *
     * @return self
     */
    public function setPremium(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $premium)
    {
        $this->premium = $premium;

        return $this;
    }

    /**
     * Gets as price.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets a new price.
     *
     * @return self
     */
    public function setPrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Gets as purchaseDate.
     *
     * @return \DateTime
     */
    public function getPurchaseDate()
    {
        return $this->purchaseDate;
    }

    /**
     * Sets a new purchaseDate.
     *
     * @return self
     */
    public function setPurchaseDate(\DateTime $purchaseDate)
    {
        $this->purchaseDate = $purchaseDate;

        return $this;
    }

    /**
     * Gets as status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets a new status.
     *
     * @param string $status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Gets as termMileage.
     *
     * @return int
     */
    public function getTermMileage()
    {
        return $this->termMileage;
    }

    /**
     * Sets a new termMileage.
     *
     * @param int $termMileage
     *
     * @return self
     */
    public function setTermMileage($termMileage)
    {
        $this->termMileage = $termMileage;

        return $this;
    }

    /**
     * Gets as termMonths.
     *
     * @return int
     */
    public function getTermMonths()
    {
        return $this->termMonths;
    }

    /**
     * Sets a new termMonths.
     *
     * @param int $termMonths
     *
     * @return self
     */
    public function setTermMonths($termMonths)
    {
        $this->termMonths = $termMonths;

        return $this;
    }

    /**
     * Gets as transferred.
     *
     * @return bool
     */
    public function getTransferred()
    {
        return $this->transferred;
    }

    /**
     * Sets a new transferred.
     *
     * @param bool $transferred
     *
     * @return self
     */
    public function setTransferred($transferred)
    {
        $this->transferred = $transferred;

        return $this;
    }
}

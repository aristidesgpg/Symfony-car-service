<?php

namespace App\Soap\dealerbuilt\src\Models\ServiceContracts;

/**
 * Class representing ServiceContractType
 *
 * 
 * XSD Type: ServiceContract
 */
class ServiceContractType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\IdentityProfileType $companyIdentity
     */
    private $companyIdentity = null;

    /**
     * @var string $contractId
     */
    private $contractId = null;

    /**
     * @var string $contractPlanCode
     */
    private $contractPlanCode = null;

    /**
     * @var int $contractRemaining
     */
    private $contractRemaining = null;

    /**
     * @var string $contractStatus
     */
    private $contractStatus = null;

    /**
     * @var string $contractStatusType
     */
    private $contractStatusType = null;

    /**
     * @var float $contractTermDistanceMeasure
     */
    private $contractTermDistanceMeasure = null;

    /**
     * @var int $contractTermMileage
     */
    private $contractTermMileage = null;

    /**
     * @var string $contractTermMileageUOM
     */
    private $contractTermMileageUOM = null;

    /**
     * @var int $contractTermMonths
     */
    private $contractTermMonths = null;

    /**
     * @var bool $contractTransferredInd
     */
    private $contractTransferredInd = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $customerSalePrice
     */
    private $customerSalePrice = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $dealerCost
     */
    private $dealerCost = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $deductible
     */
    private $deductible = null;

    /**
     * @var string $department
     */
    private $department = null;

    /**
     * @var string $description
     */
    private $description = null;

    /**
     * @var \DateTime $effectiveDate
     */
    private $effectiveDate = null;

    /**
     * @var \DateTime $expirationDate
     */
    private $expirationDate = null;

    /**
     * @var string $inServiceMileageUOM
     */
    private $inServiceMileageUOM = null;

    /**
     * @var int $inServiceMiles
     */
    private $inServiceMiles = null;

    /**
     * @var string $itemType
     */
    private $itemType = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\IdentityProfileType $ownerIdentity
     */
    private $ownerIdentity = null;

    /**
     * @var \DateTime $purchaseDate
     */
    private $purchaseDate = null;

    /**
     * @var int $serviceContractId
     */
    private $serviceContractId = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalContractAmount
     */
    private $totalContractAmount = null;

    /**
     * @var string $type
     */
    private $type = null;

    /**
     * Gets as companyIdentity
     *
     * @return \App\Soap\dealerbuilt\src\Models\IdentityProfileType
     */
    public function getCompanyIdentity()
    {
        return $this->companyIdentity;
    }

    /**
     * Sets a new companyIdentity
     *
     * @param \App\Soap\dealerbuilt\src\Models\IdentityProfileType $companyIdentity
     * @return self
     */
    public function setCompanyIdentity(\App\Soap\dealerbuilt\src\Models\IdentityProfileType $companyIdentity)
    {
        $this->companyIdentity = $companyIdentity;
        return $this;
    }

    /**
     * Gets as contractId
     *
     * @return string
     */
    public function getContractId()
    {
        return $this->contractId;
    }

    /**
     * Sets a new contractId
     *
     * @param string $contractId
     * @return self
     */
    public function setContractId($contractId)
    {
        $this->contractId = $contractId;
        return $this;
    }

    /**
     * Gets as contractPlanCode
     *
     * @return string
     */
    public function getContractPlanCode()
    {
        return $this->contractPlanCode;
    }

    /**
     * Sets a new contractPlanCode
     *
     * @param string $contractPlanCode
     * @return self
     */
    public function setContractPlanCode($contractPlanCode)
    {
        $this->contractPlanCode = $contractPlanCode;
        return $this;
    }

    /**
     * Gets as contractRemaining
     *
     * @return int
     */
    public function getContractRemaining()
    {
        return $this->contractRemaining;
    }

    /**
     * Sets a new contractRemaining
     *
     * @param int $contractRemaining
     * @return self
     */
    public function setContractRemaining($contractRemaining)
    {
        $this->contractRemaining = $contractRemaining;
        return $this;
    }

    /**
     * Gets as contractStatus
     *
     * @return string
     */
    public function getContractStatus()
    {
        return $this->contractStatus;
    }

    /**
     * Sets a new contractStatus
     *
     * @param string $contractStatus
     * @return self
     */
    public function setContractStatus($contractStatus)
    {
        $this->contractStatus = $contractStatus;
        return $this;
    }

    /**
     * Gets as contractStatusType
     *
     * @return string
     */
    public function getContractStatusType()
    {
        return $this->contractStatusType;
    }

    /**
     * Sets a new contractStatusType
     *
     * @param string $contractStatusType
     * @return self
     */
    public function setContractStatusType($contractStatusType)
    {
        $this->contractStatusType = $contractStatusType;
        return $this;
    }

    /**
     * Gets as contractTermDistanceMeasure
     *
     * @return float
     */
    public function getContractTermDistanceMeasure()
    {
        return $this->contractTermDistanceMeasure;
    }

    /**
     * Sets a new contractTermDistanceMeasure
     *
     * @param float $contractTermDistanceMeasure
     * @return self
     */
    public function setContractTermDistanceMeasure($contractTermDistanceMeasure)
    {
        $this->contractTermDistanceMeasure = $contractTermDistanceMeasure;
        return $this;
    }

    /**
     * Gets as contractTermMileage
     *
     * @return int
     */
    public function getContractTermMileage()
    {
        return $this->contractTermMileage;
    }

    /**
     * Sets a new contractTermMileage
     *
     * @param int $contractTermMileage
     * @return self
     */
    public function setContractTermMileage($contractTermMileage)
    {
        $this->contractTermMileage = $contractTermMileage;
        return $this;
    }

    /**
     * Gets as contractTermMileageUOM
     *
     * @return string
     */
    public function getContractTermMileageUOM()
    {
        return $this->contractTermMileageUOM;
    }

    /**
     * Sets a new contractTermMileageUOM
     *
     * @param string $contractTermMileageUOM
     * @return self
     */
    public function setContractTermMileageUOM($contractTermMileageUOM)
    {
        $this->contractTermMileageUOM = $contractTermMileageUOM;
        return $this;
    }

    /**
     * Gets as contractTermMonths
     *
     * @return int
     */
    public function getContractTermMonths()
    {
        return $this->contractTermMonths;
    }

    /**
     * Sets a new contractTermMonths
     *
     * @param int $contractTermMonths
     * @return self
     */
    public function setContractTermMonths($contractTermMonths)
    {
        $this->contractTermMonths = $contractTermMonths;
        return $this;
    }

    /**
     * Gets as contractTransferredInd
     *
     * @return bool
     */
    public function getContractTransferredInd()
    {
        return $this->contractTransferredInd;
    }

    /**
     * Sets a new contractTransferredInd
     *
     * @param bool $contractTransferredInd
     * @return self
     */
    public function setContractTransferredInd($contractTransferredInd)
    {
        $this->contractTransferredInd = $contractTransferredInd;
        return $this;
    }

    /**
     * Gets as customerSalePrice
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCustomerSalePrice()
    {
        return $this->customerSalePrice;
    }

    /**
     * Sets a new customerSalePrice
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $customerSalePrice
     * @return self
     */
    public function setCustomerSalePrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $customerSalePrice)
    {
        $this->customerSalePrice = $customerSalePrice;
        return $this;
    }

    /**
     * Gets as dealerCost
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getDealerCost()
    {
        return $this->dealerCost;
    }

    /**
     * Sets a new dealerCost
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $dealerCost
     * @return self
     */
    public function setDealerCost(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $dealerCost)
    {
        $this->dealerCost = $dealerCost;
        return $this;
    }

    /**
     * Gets as deductible
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getDeductible()
    {
        return $this->deductible;
    }

    /**
     * Sets a new deductible
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $deductible
     * @return self
     */
    public function setDeductible(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $deductible)
    {
        $this->deductible = $deductible;
        return $this;
    }

    /**
     * Gets as department
     *
     * @return string
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Sets a new department
     *
     * @param string $department
     * @return self
     */
    public function setDepartment($department)
    {
        $this->department = $department;
        return $this;
    }

    /**
     * Gets as description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets a new description
     *
     * @param string $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Gets as effectiveDate
     *
     * @return \DateTime
     */
    public function getEffectiveDate()
    {
        return $this->effectiveDate;
    }

    /**
     * Sets a new effectiveDate
     *
     * @param \DateTime $effectiveDate
     * @return self
     */
    public function setEffectiveDate(\DateTime $effectiveDate)
    {
        $this->effectiveDate = $effectiveDate;
        return $this;
    }

    /**
     * Gets as expirationDate
     *
     * @return \DateTime
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * Sets a new expirationDate
     *
     * @param \DateTime $expirationDate
     * @return self
     */
    public function setExpirationDate(\DateTime $expirationDate)
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }

    /**
     * Gets as inServiceMileageUOM
     *
     * @return string
     */
    public function getInServiceMileageUOM()
    {
        return $this->inServiceMileageUOM;
    }

    /**
     * Sets a new inServiceMileageUOM
     *
     * @param string $inServiceMileageUOM
     * @return self
     */
    public function setInServiceMileageUOM($inServiceMileageUOM)
    {
        $this->inServiceMileageUOM = $inServiceMileageUOM;
        return $this;
    }

    /**
     * Gets as inServiceMiles
     *
     * @return int
     */
    public function getInServiceMiles()
    {
        return $this->inServiceMiles;
    }

    /**
     * Sets a new inServiceMiles
     *
     * @param int $inServiceMiles
     * @return self
     */
    public function setInServiceMiles($inServiceMiles)
    {
        $this->inServiceMiles = $inServiceMiles;
        return $this;
    }

    /**
     * Gets as itemType
     *
     * @return string
     */
    public function getItemType()
    {
        return $this->itemType;
    }

    /**
     * Sets a new itemType
     *
     * @param string $itemType
     * @return self
     */
    public function setItemType($itemType)
    {
        $this->itemType = $itemType;
        return $this;
    }

    /**
     * Gets as ownerIdentity
     *
     * @return \App\Soap\dealerbuilt\src\Models\IdentityProfileType
     */
    public function getOwnerIdentity()
    {
        return $this->ownerIdentity;
    }

    /**
     * Sets a new ownerIdentity
     *
     * @param \App\Soap\dealerbuilt\src\Models\IdentityProfileType $ownerIdentity
     * @return self
     */
    public function setOwnerIdentity(\App\Soap\dealerbuilt\src\Models\IdentityProfileType $ownerIdentity)
    {
        $this->ownerIdentity = $ownerIdentity;
        return $this;
    }

    /**
     * Gets as purchaseDate
     *
     * @return \DateTime
     */
    public function getPurchaseDate()
    {
        return $this->purchaseDate;
    }

    /**
     * Sets a new purchaseDate
     *
     * @param \DateTime $purchaseDate
     * @return self
     */
    public function setPurchaseDate(\DateTime $purchaseDate)
    {
        $this->purchaseDate = $purchaseDate;
        return $this;
    }

    /**
     * Gets as serviceContractId
     *
     * @return int
     */
    public function getServiceContractId()
    {
        return $this->serviceContractId;
    }

    /**
     * Sets a new serviceContractId
     *
     * @param int $serviceContractId
     * @return self
     */
    public function setServiceContractId($serviceContractId)
    {
        $this->serviceContractId = $serviceContractId;
        return $this;
    }

    /**
     * Gets as totalContractAmount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTotalContractAmount()
    {
        return $this->totalContractAmount;
    }

    /**
     * Sets a new totalContractAmount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalContractAmount
     * @return self
     */
    public function setTotalContractAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalContractAmount)
    {
        $this->totalContractAmount = $totalContractAmount;
        return $this;
    }

    /**
     * Gets as type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets a new type
     *
     * @param string $type
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }


}


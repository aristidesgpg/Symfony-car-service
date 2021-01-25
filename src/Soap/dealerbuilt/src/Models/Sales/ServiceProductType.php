<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing ServiceProductType
 *
 * 
 * XSD Type: ServiceProduct
 */
class ServiceProductType
{

    /**
     * @var string $contractNumber
     */
    private $contractNumber = null;

    /**
     * @var int $contractStatus
     */
    private $contractStatus = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $cost
     */
    private $cost = null;

    /**
     * @var string $coverageMiles
     */
    private $coverageMiles = null;

    /**
     * @var int $coverageMilesUnlimited
     */
    private $coverageMilesUnlimited = null;

    /**
     * @var int $coverageMonth
     */
    private $coverageMonth = null;

    /**
     * @var int $coverageMonthsUnlimited
     */
    private $coverageMonthsUnlimited = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $deductible
     */
    private $deductible = null;

    /**
     * @var string $description
     */
    private $description = null;

    /**
     * @var \DateTime $expireDate
     */
    private $expireDate = null;

    /**
     * @var string $expireMiles
     */
    private $expireMiles = null;

    /**
     * @var string $factoryDesc
     */
    private $factoryDesc = null;

    /**
     * @var \DateTime $inserviceDate
     */
    private $inserviceDate = null;

    /**
     * @var string $inserviceMiles
     */
    private $inserviceMiles = null;

    /**
     * @var string $memo
     */
    private $memo = null;

    /**
     * @var string $providerCode
     */
    private $providerCode = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $retail
     */
    private $retail = null;

    /**
     * @var \DateTime $saleDate
     */
    private $saleDate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $transferCost
     */
    private $transferCost = null;

    /**
     * Gets as contractNumber
     *
     * @return string
     */
    public function getContractNumber()
    {
        return $this->contractNumber;
    }

    /**
     * Sets a new contractNumber
     *
     * @param string $contractNumber
     * @return self
     */
    public function setContractNumber($contractNumber)
    {
        $this->contractNumber = $contractNumber;
        return $this;
    }

    /**
     * Gets as contractStatus
     *
     * @return int
     */
    public function getContractStatus()
    {
        return $this->contractStatus;
    }

    /**
     * Sets a new contractStatus
     *
     * @param int $contractStatus
     * @return self
     */
    public function setContractStatus($contractStatus)
    {
        $this->contractStatus = $contractStatus;
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
     * Gets as coverageMiles
     *
     * @return string
     */
    public function getCoverageMiles()
    {
        return $this->coverageMiles;
    }

    /**
     * Sets a new coverageMiles
     *
     * @param string $coverageMiles
     * @return self
     */
    public function setCoverageMiles($coverageMiles)
    {
        $this->coverageMiles = $coverageMiles;
        return $this;
    }

    /**
     * Gets as coverageMilesUnlimited
     *
     * @return int
     */
    public function getCoverageMilesUnlimited()
    {
        return $this->coverageMilesUnlimited;
    }

    /**
     * Sets a new coverageMilesUnlimited
     *
     * @param int $coverageMilesUnlimited
     * @return self
     */
    public function setCoverageMilesUnlimited($coverageMilesUnlimited)
    {
        $this->coverageMilesUnlimited = $coverageMilesUnlimited;
        return $this;
    }

    /**
     * Gets as coverageMonth
     *
     * @return int
     */
    public function getCoverageMonth()
    {
        return $this->coverageMonth;
    }

    /**
     * Sets a new coverageMonth
     *
     * @param int $coverageMonth
     * @return self
     */
    public function setCoverageMonth($coverageMonth)
    {
        $this->coverageMonth = $coverageMonth;
        return $this;
    }

    /**
     * Gets as coverageMonthsUnlimited
     *
     * @return int
     */
    public function getCoverageMonthsUnlimited()
    {
        return $this->coverageMonthsUnlimited;
    }

    /**
     * Sets a new coverageMonthsUnlimited
     *
     * @param int $coverageMonthsUnlimited
     * @return self
     */
    public function setCoverageMonthsUnlimited($coverageMonthsUnlimited)
    {
        $this->coverageMonthsUnlimited = $coverageMonthsUnlimited;
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
     * Gets as expireDate
     *
     * @return \DateTime
     */
    public function getExpireDate()
    {
        return $this->expireDate;
    }

    /**
     * Sets a new expireDate
     *
     * @param \DateTime $expireDate
     * @return self
     */
    public function setExpireDate(\DateTime $expireDate)
    {
        $this->expireDate = $expireDate;
        return $this;
    }

    /**
     * Gets as expireMiles
     *
     * @return string
     */
    public function getExpireMiles()
    {
        return $this->expireMiles;
    }

    /**
     * Sets a new expireMiles
     *
     * @param string $expireMiles
     * @return self
     */
    public function setExpireMiles($expireMiles)
    {
        $this->expireMiles = $expireMiles;
        return $this;
    }

    /**
     * Gets as factoryDesc
     *
     * @return string
     */
    public function getFactoryDesc()
    {
        return $this->factoryDesc;
    }

    /**
     * Sets a new factoryDesc
     *
     * @param string $factoryDesc
     * @return self
     */
    public function setFactoryDesc($factoryDesc)
    {
        $this->factoryDesc = $factoryDesc;
        return $this;
    }

    /**
     * Gets as inserviceDate
     *
     * @return \DateTime
     */
    public function getInserviceDate()
    {
        return $this->inserviceDate;
    }

    /**
     * Sets a new inserviceDate
     *
     * @param \DateTime $inserviceDate
     * @return self
     */
    public function setInserviceDate(\DateTime $inserviceDate)
    {
        $this->inserviceDate = $inserviceDate;
        return $this;
    }

    /**
     * Gets as inserviceMiles
     *
     * @return string
     */
    public function getInserviceMiles()
    {
        return $this->inserviceMiles;
    }

    /**
     * Sets a new inserviceMiles
     *
     * @param string $inserviceMiles
     * @return self
     */
    public function setInserviceMiles($inserviceMiles)
    {
        $this->inserviceMiles = $inserviceMiles;
        return $this;
    }

    /**
     * Gets as memo
     *
     * @return string
     */
    public function getMemo()
    {
        return $this->memo;
    }

    /**
     * Sets a new memo
     *
     * @param string $memo
     * @return self
     */
    public function setMemo($memo)
    {
        $this->memo = $memo;
        return $this;
    }

    /**
     * Gets as providerCode
     *
     * @return string
     */
    public function getProviderCode()
    {
        return $this->providerCode;
    }

    /**
     * Sets a new providerCode
     *
     * @param string $providerCode
     * @return self
     */
    public function setProviderCode($providerCode)
    {
        $this->providerCode = $providerCode;
        return $this;
    }

    /**
     * Gets as retail
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getRetail()
    {
        return $this->retail;
    }

    /**
     * Sets a new retail
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $retail
     * @return self
     */
    public function setRetail(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $retail)
    {
        $this->retail = $retail;
        return $this;
    }

    /**
     * Gets as saleDate
     *
     * @return \DateTime
     */
    public function getSaleDate()
    {
        return $this->saleDate;
    }

    /**
     * Sets a new saleDate
     *
     * @param \DateTime $saleDate
     * @return self
     */
    public function setSaleDate(\DateTime $saleDate)
    {
        $this->saleDate = $saleDate;
        return $this;
    }

    /**
     * Gets as transferCost
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTransferCost()
    {
        return $this->transferCost;
    }

    /**
     * Sets a new transferCost
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $transferCost
     * @return self
     */
    public function setTransferCost(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $transferCost)
    {
        $this->transferCost = $transferCost;
        return $this;
    }


}


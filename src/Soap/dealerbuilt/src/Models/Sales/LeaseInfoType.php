<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing LeaseInfoType.
 *
 * XSD Type: LeaseInfo
 */
class LeaseInfoType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $baseResidualAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $capCostReduction = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $cashCapReductionAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $cashRequired = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $estimatedOfficialFeeTax = null;

    /**
     * @var string
     */
    private $factorInterestType = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $feeAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\LeaseFeeCollectionType
     */
    private $fees = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $grossCapCost = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $hardAddsResidualAmount = null;

    /**
     * @var float
     */
    private $hardAddsResidualPercentage = null;

    /**
     * @var bool
     */
    private $isOnePayLease = null;

    /**
     * @var int
     */
    private $mileageActual = null;

    /**
     * @var int
     */
    private $mileageAllowance = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $mileageDollarsPerMileLeaseEnd = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $mileageDollarsPerMileUpFront = null;

    /**
     * @var int
     */
    private $mileageEstimate = null;

    /**
     * @var int
     */
    private $milesUpFront = null;

    /**
     * @var float
     */
    private $moneyFactor = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $monthlyDepreciationAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $monthlyServiceCharge = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $netCapCost = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $otherMonthlyCharges = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $packageDiscounts = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $rebateCapReductionAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $residualAmount = null;

    /**
     * @var float
     */
    private $residualPercentage = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $securityDeposit = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\LeaseTaxCollectionType
     */
    private $taxes = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $totalDueAtSigning = null;

    /**
     * @var bool
     */
    private $tracLease = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $tradeTaxCredit = null;

    /**
     * Gets as baseResidualAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getBaseResidualAmount()
    {
        return $this->baseResidualAmount;
    }

    /**
     * Sets a new baseResidualAmount.
     *
     * @return self
     */
    public function setBaseResidualAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $baseResidualAmount)
    {
        $this->baseResidualAmount = $baseResidualAmount;

        return $this;
    }

    /**
     * Gets as capCostReduction.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCapCostReduction()
    {
        return $this->capCostReduction;
    }

    /**
     * Sets a new capCostReduction.
     *
     * @return self
     */
    public function setCapCostReduction(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $capCostReduction)
    {
        $this->capCostReduction = $capCostReduction;

        return $this;
    }

    /**
     * Gets as cashCapReductionAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCashCapReductionAmount()
    {
        return $this->cashCapReductionAmount;
    }

    /**
     * Sets a new cashCapReductionAmount.
     *
     * @return self
     */
    public function setCashCapReductionAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $cashCapReductionAmount)
    {
        $this->cashCapReductionAmount = $cashCapReductionAmount;

        return $this;
    }

    /**
     * Gets as cashRequired.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCashRequired()
    {
        return $this->cashRequired;
    }

    /**
     * Sets a new cashRequired.
     *
     * @return self
     */
    public function setCashRequired(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $cashRequired)
    {
        $this->cashRequired = $cashRequired;

        return $this;
    }

    /**
     * Gets as estimatedOfficialFeeTax.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getEstimatedOfficialFeeTax()
    {
        return $this->estimatedOfficialFeeTax;
    }

    /**
     * Sets a new estimatedOfficialFeeTax.
     *
     * @return self
     */
    public function setEstimatedOfficialFeeTax(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $estimatedOfficialFeeTax)
    {
        $this->estimatedOfficialFeeTax = $estimatedOfficialFeeTax;

        return $this;
    }

    /**
     * Gets as factorInterestType.
     *
     * @return string
     */
    public function getFactorInterestType()
    {
        return $this->factorInterestType;
    }

    /**
     * Sets a new factorInterestType.
     *
     * @param string $factorInterestType
     *
     * @return self
     */
    public function setFactorInterestType($factorInterestType)
    {
        $this->factorInterestType = $factorInterestType;

        return $this;
    }

    /**
     * Gets as feeAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getFeeAmount()
    {
        return $this->feeAmount;
    }

    /**
     * Sets a new feeAmount.
     *
     * @return self
     */
    public function setFeeAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $feeAmount)
    {
        $this->feeAmount = $feeAmount;

        return $this;
    }

    /**
     * Gets as fees.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\LeaseFeeCollectionType
     */
    public function getFees()
    {
        return $this->fees;
    }

    /**
     * Sets a new fees.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\LeaseFeeCollectionType $fees
     *
     * @return self
     */
    public function setFees(LeaseFeeCollectionType $fees)
    {
        $this->fees = $fees;

        return $this;
    }

    /**
     * Gets as grossCapCost.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getGrossCapCost()
    {
        return $this->grossCapCost;
    }

    /**
     * Sets a new grossCapCost.
     *
     * @return self
     */
    public function setGrossCapCost(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $grossCapCost)
    {
        $this->grossCapCost = $grossCapCost;

        return $this;
    }

    /**
     * Gets as hardAddsResidualAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getHardAddsResidualAmount()
    {
        return $this->hardAddsResidualAmount;
    }

    /**
     * Sets a new hardAddsResidualAmount.
     *
     * @return self
     */
    public function setHardAddsResidualAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $hardAddsResidualAmount)
    {
        $this->hardAddsResidualAmount = $hardAddsResidualAmount;

        return $this;
    }

    /**
     * Gets as hardAddsResidualPercentage.
     *
     * @return float
     */
    public function getHardAddsResidualPercentage()
    {
        return $this->hardAddsResidualPercentage;
    }

    /**
     * Sets a new hardAddsResidualPercentage.
     *
     * @param float $hardAddsResidualPercentage
     *
     * @return self
     */
    public function setHardAddsResidualPercentage($hardAddsResidualPercentage)
    {
        $this->hardAddsResidualPercentage = $hardAddsResidualPercentage;

        return $this;
    }

    /**
     * Gets as isOnePayLease.
     *
     * @return bool
     */
    public function getIsOnePayLease()
    {
        return $this->isOnePayLease;
    }

    /**
     * Sets a new isOnePayLease.
     *
     * @param bool $isOnePayLease
     *
     * @return self
     */
    public function setIsOnePayLease($isOnePayLease)
    {
        $this->isOnePayLease = $isOnePayLease;

        return $this;
    }

    /**
     * Gets as mileageActual.
     *
     * @return int
     */
    public function getMileageActual()
    {
        return $this->mileageActual;
    }

    /**
     * Sets a new mileageActual.
     *
     * @param int $mileageActual
     *
     * @return self
     */
    public function setMileageActual($mileageActual)
    {
        $this->mileageActual = $mileageActual;

        return $this;
    }

    /**
     * Gets as mileageAllowance.
     *
     * @return int
     */
    public function getMileageAllowance()
    {
        return $this->mileageAllowance;
    }

    /**
     * Sets a new mileageAllowance.
     *
     * @param int $mileageAllowance
     *
     * @return self
     */
    public function setMileageAllowance($mileageAllowance)
    {
        $this->mileageAllowance = $mileageAllowance;

        return $this;
    }

    /**
     * Gets as mileageDollarsPerMileLeaseEnd.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getMileageDollarsPerMileLeaseEnd()
    {
        return $this->mileageDollarsPerMileLeaseEnd;
    }

    /**
     * Sets a new mileageDollarsPerMileLeaseEnd.
     *
     * @return self
     */
    public function setMileageDollarsPerMileLeaseEnd(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $mileageDollarsPerMileLeaseEnd)
    {
        $this->mileageDollarsPerMileLeaseEnd = $mileageDollarsPerMileLeaseEnd;

        return $this;
    }

    /**
     * Gets as mileageDollarsPerMileUpFront.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getMileageDollarsPerMileUpFront()
    {
        return $this->mileageDollarsPerMileUpFront;
    }

    /**
     * Sets a new mileageDollarsPerMileUpFront.
     *
     * @return self
     */
    public function setMileageDollarsPerMileUpFront(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $mileageDollarsPerMileUpFront)
    {
        $this->mileageDollarsPerMileUpFront = $mileageDollarsPerMileUpFront;

        return $this;
    }

    /**
     * Gets as mileageEstimate.
     *
     * @return int
     */
    public function getMileageEstimate()
    {
        return $this->mileageEstimate;
    }

    /**
     * Sets a new mileageEstimate.
     *
     * @param int $mileageEstimate
     *
     * @return self
     */
    public function setMileageEstimate($mileageEstimate)
    {
        $this->mileageEstimate = $mileageEstimate;

        return $this;
    }

    /**
     * Gets as milesUpFront.
     *
     * @return int
     */
    public function getMilesUpFront()
    {
        return $this->milesUpFront;
    }

    /**
     * Sets a new milesUpFront.
     *
     * @param int $milesUpFront
     *
     * @return self
     */
    public function setMilesUpFront($milesUpFront)
    {
        $this->milesUpFront = $milesUpFront;

        return $this;
    }

    /**
     * Gets as moneyFactor.
     *
     * @return float
     */
    public function getMoneyFactor()
    {
        return $this->moneyFactor;
    }

    /**
     * Sets a new moneyFactor.
     *
     * @param float $moneyFactor
     *
     * @return self
     */
    public function setMoneyFactor($moneyFactor)
    {
        $this->moneyFactor = $moneyFactor;

        return $this;
    }

    /**
     * Gets as monthlyDepreciationAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getMonthlyDepreciationAmount()
    {
        return $this->monthlyDepreciationAmount;
    }

    /**
     * Sets a new monthlyDepreciationAmount.
     *
     * @return self
     */
    public function setMonthlyDepreciationAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $monthlyDepreciationAmount)
    {
        $this->monthlyDepreciationAmount = $monthlyDepreciationAmount;

        return $this;
    }

    /**
     * Gets as monthlyServiceCharge.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getMonthlyServiceCharge()
    {
        return $this->monthlyServiceCharge;
    }

    /**
     * Sets a new monthlyServiceCharge.
     *
     * @return self
     */
    public function setMonthlyServiceCharge(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $monthlyServiceCharge)
    {
        $this->monthlyServiceCharge = $monthlyServiceCharge;

        return $this;
    }

    /**
     * Gets as netCapCost.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getNetCapCost()
    {
        return $this->netCapCost;
    }

    /**
     * Sets a new netCapCost.
     *
     * @return self
     */
    public function setNetCapCost(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $netCapCost)
    {
        $this->netCapCost = $netCapCost;

        return $this;
    }

    /**
     * Gets as otherMonthlyCharges.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getOtherMonthlyCharges()
    {
        return $this->otherMonthlyCharges;
    }

    /**
     * Sets a new otherMonthlyCharges.
     *
     * @return self
     */
    public function setOtherMonthlyCharges(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $otherMonthlyCharges)
    {
        $this->otherMonthlyCharges = $otherMonthlyCharges;

        return $this;
    }

    /**
     * Gets as packageDiscounts.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getPackageDiscounts()
    {
        return $this->packageDiscounts;
    }

    /**
     * Sets a new packageDiscounts.
     *
     * @return self
     */
    public function setPackageDiscounts(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $packageDiscounts)
    {
        $this->packageDiscounts = $packageDiscounts;

        return $this;
    }

    /**
     * Gets as rebateCapReductionAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getRebateCapReductionAmount()
    {
        return $this->rebateCapReductionAmount;
    }

    /**
     * Sets a new rebateCapReductionAmount.
     *
     * @return self
     */
    public function setRebateCapReductionAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $rebateCapReductionAmount)
    {
        $this->rebateCapReductionAmount = $rebateCapReductionAmount;

        return $this;
    }

    /**
     * Gets as residualAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getResidualAmount()
    {
        return $this->residualAmount;
    }

    /**
     * Sets a new residualAmount.
     *
     * @return self
     */
    public function setResidualAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $residualAmount)
    {
        $this->residualAmount = $residualAmount;

        return $this;
    }

    /**
     * Gets as residualPercentage.
     *
     * @return float
     */
    public function getResidualPercentage()
    {
        return $this->residualPercentage;
    }

    /**
     * Sets a new residualPercentage.
     *
     * @param float $residualPercentage
     *
     * @return self
     */
    public function setResidualPercentage($residualPercentage)
    {
        $this->residualPercentage = $residualPercentage;

        return $this;
    }

    /**
     * Gets as securityDeposit.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getSecurityDeposit()
    {
        return $this->securityDeposit;
    }

    /**
     * Sets a new securityDeposit.
     *
     * @return self
     */
    public function setSecurityDeposit(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $securityDeposit)
    {
        $this->securityDeposit = $securityDeposit;

        return $this;
    }

    /**
     * Gets as taxes.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\LeaseTaxCollectionType
     */
    public function getTaxes()
    {
        return $this->taxes;
    }

    /**
     * Sets a new taxes.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\LeaseTaxCollectionType $taxes
     *
     * @return self
     */
    public function setTaxes(LeaseTaxCollectionType $taxes)
    {
        $this->taxes = $taxes;

        return $this;
    }

    /**
     * Gets as totalDueAtSigning.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTotalDueAtSigning()
    {
        return $this->totalDueAtSigning;
    }

    /**
     * Sets a new totalDueAtSigning.
     *
     * @return self
     */
    public function setTotalDueAtSigning(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalDueAtSigning)
    {
        $this->totalDueAtSigning = $totalDueAtSigning;

        return $this;
    }

    /**
     * Gets as tracLease.
     *
     * @return bool
     */
    public function getTracLease()
    {
        return $this->tracLease;
    }

    /**
     * Sets a new tracLease.
     *
     * @param bool $tracLease
     *
     * @return self
     */
    public function setTracLease($tracLease)
    {
        $this->tracLease = $tracLease;

        return $this;
    }

    /**
     * Gets as tradeTaxCredit.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTradeTaxCredit()
    {
        return $this->tradeTaxCredit;
    }

    /**
     * Sets a new tradeTaxCredit.
     *
     * @return self
     */
    public function setTradeTaxCredit(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $tradeTaxCredit)
    {
        $this->tradeTaxCredit = $tradeTaxCredit;

        return $this;
    }
}

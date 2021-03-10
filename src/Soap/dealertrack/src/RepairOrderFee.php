<?php

namespace App\Soap\dealertrack\src;

/**
 * Class representing RepairOrderFee
 */
class RepairOrderFee
{

    /**
     * @var int $serviceLineNumber
     */
    private $serviceLineNumber = null;

    /**
     * @var string $feeCode
     */
    private $feeCode = null;

    /**
     * @var string $linePaymentMethod
     */
    private $linePaymentMethod = null;

    /**
     * @var float $totalFeesAmount
     */
    private $totalFeesAmount = null;

    /**
     * @var float $customerFeesAmount
     */
    private $customerFeesAmount = null;

    /**
     * @var float $customerPartsAmount
     */
    private $customerPartsAmount = null;

    /**
     * @var float $customerLaborAmount
     */
    private $customerLaborAmount = null;

    /**
     * @var float $internalFeesAmount
     */
    private $internalFeesAmount = null;

    /**
     * @var float $internalPartsAmount
     */
    private $internalPartsAmount = null;

    /**
     * @var float $internalLaborAmount
     */
    private $internalLaborAmount = null;

    /**
     * @var float $serviceFeesAmount
     */
    private $serviceFeesAmount = null;

    /**
     * @var float $servicePartsAmount
     */
    private $servicePartsAmount = null;

    /**
     * @var float $serviceLaborAmount
     */
    private $serviceLaborAmount = null;

    /**
     * @var float $warrantyFeesAmount
     */
    private $warrantyFeesAmount = null;

    /**
     * @var float $warrantyPartsAmount
     */
    private $warrantyPartsAmount = null;

    /**
     * @var float $warrantyLaborAmount
     */
    private $warrantyLaborAmount = null;

    /**
     * @var string $feeDescription
     */
    private $feeDescription = null;

    /**
     * @var string $feeType
     */
    private $feeType = null;

    /**
     * @var string $validFrom
     */
    private $validFrom = null;

    /**
     * @var string $validTill
     */
    private $validTill = null;

    /**
     * @var string $paymentMethods
     */
    private $paymentMethods = null;

    /**
     * @var string $amountType
     */
    private $amountType = null;

    /**
     * @var float $minimumAmount
     */
    private $minimumAmount = null;

    /**
     * @var float $maximumAmount
     */
    private $maximumAmount = null;

    /**
     * @var \App\Soap\dealertrack\src\CalculationBasis $calculationBasis
     */
    private $calculationBasis = null;

    /**
     * @var string $partsAccount
     */
    private $partsAccount = null;

    /**
     * @var float $partsPercentage
     */
    private $partsPercentage = null;

    /**
     * @var \App\Soap\dealertrack\src\LaborAccount $laborAccount
     */
    private $laborAccount = null;

    /**
     * @var float $laborPercentage
     */
    private $laborPercentage = null;

    /**
     * @var string $taxable
     */
    private $taxable = null;

    /**
     * Gets as serviceLineNumber
     *
     * @return int
     */
    public function getServiceLineNumber()
    {
        return $this->serviceLineNumber;
    }

    /**
     * Sets a new serviceLineNumber
     *
     * @param int $serviceLineNumber
     * @return self
     */
    public function setServiceLineNumber($serviceLineNumber)
    {
        $this->serviceLineNumber = $serviceLineNumber;
        return $this;
    }

    /**
     * Gets as feeCode
     *
     * @return string
     */
    public function getFeeCode()
    {
        return $this->feeCode;
    }

    /**
     * Sets a new feeCode
     *
     * @param string $feeCode
     * @return self
     */
    public function setFeeCode($feeCode)
    {
        $this->feeCode = $feeCode;
        return $this;
    }

    /**
     * Gets as linePaymentMethod
     *
     * @return string
     */
    public function getLinePaymentMethod()
    {
        return $this->linePaymentMethod;
    }

    /**
     * Sets a new linePaymentMethod
     *
     * @param string $linePaymentMethod
     * @return self
     */
    public function setLinePaymentMethod($linePaymentMethod)
    {
        $this->linePaymentMethod = $linePaymentMethod;
        return $this;
    }

    /**
     * Gets as totalFeesAmount
     *
     * @return float
     */
    public function getTotalFeesAmount()
    {
        return $this->totalFeesAmount;
    }

    /**
     * Sets a new totalFeesAmount
     *
     * @param float $totalFeesAmount
     * @return self
     */
    public function setTotalFeesAmount($totalFeesAmount)
    {
        $this->totalFeesAmount = $totalFeesAmount;
        return $this;
    }

    /**
     * Gets as customerFeesAmount
     *
     * @return float
     */
    public function getCustomerFeesAmount()
    {
        return $this->customerFeesAmount;
    }

    /**
     * Sets a new customerFeesAmount
     *
     * @param float $customerFeesAmount
     * @return self
     */
    public function setCustomerFeesAmount($customerFeesAmount)
    {
        $this->customerFeesAmount = $customerFeesAmount;
        return $this;
    }

    /**
     * Gets as customerPartsAmount
     *
     * @return float
     */
    public function getCustomerPartsAmount()
    {
        return $this->customerPartsAmount;
    }

    /**
     * Sets a new customerPartsAmount
     *
     * @param float $customerPartsAmount
     * @return self
     */
    public function setCustomerPartsAmount($customerPartsAmount)
    {
        $this->customerPartsAmount = $customerPartsAmount;
        return $this;
    }

    /**
     * Gets as customerLaborAmount
     *
     * @return float
     */
    public function getCustomerLaborAmount()
    {
        return $this->customerLaborAmount;
    }

    /**
     * Sets a new customerLaborAmount
     *
     * @param float $customerLaborAmount
     * @return self
     */
    public function setCustomerLaborAmount($customerLaborAmount)
    {
        $this->customerLaborAmount = $customerLaborAmount;
        return $this;
    }

    /**
     * Gets as internalFeesAmount
     *
     * @return float
     */
    public function getInternalFeesAmount()
    {
        return $this->internalFeesAmount;
    }

    /**
     * Sets a new internalFeesAmount
     *
     * @param float $internalFeesAmount
     * @return self
     */
    public function setInternalFeesAmount($internalFeesAmount)
    {
        $this->internalFeesAmount = $internalFeesAmount;
        return $this;
    }

    /**
     * Gets as internalPartsAmount
     *
     * @return float
     */
    public function getInternalPartsAmount()
    {
        return $this->internalPartsAmount;
    }

    /**
     * Sets a new internalPartsAmount
     *
     * @param float $internalPartsAmount
     * @return self
     */
    public function setInternalPartsAmount($internalPartsAmount)
    {
        $this->internalPartsAmount = $internalPartsAmount;
        return $this;
    }

    /**
     * Gets as internalLaborAmount
     *
     * @return float
     */
    public function getInternalLaborAmount()
    {
        return $this->internalLaborAmount;
    }

    /**
     * Sets a new internalLaborAmount
     *
     * @param float $internalLaborAmount
     * @return self
     */
    public function setInternalLaborAmount($internalLaborAmount)
    {
        $this->internalLaborAmount = $internalLaborAmount;
        return $this;
    }

    /**
     * Gets as serviceFeesAmount
     *
     * @return float
     */
    public function getServiceFeesAmount()
    {
        return $this->serviceFeesAmount;
    }

    /**
     * Sets a new serviceFeesAmount
     *
     * @param float $serviceFeesAmount
     * @return self
     */
    public function setServiceFeesAmount($serviceFeesAmount)
    {
        $this->serviceFeesAmount = $serviceFeesAmount;
        return $this;
    }

    /**
     * Gets as servicePartsAmount
     *
     * @return float
     */
    public function getServicePartsAmount()
    {
        return $this->servicePartsAmount;
    }

    /**
     * Sets a new servicePartsAmount
     *
     * @param float $servicePartsAmount
     * @return self
     */
    public function setServicePartsAmount($servicePartsAmount)
    {
        $this->servicePartsAmount = $servicePartsAmount;
        return $this;
    }

    /**
     * Gets as serviceLaborAmount
     *
     * @return float
     */
    public function getServiceLaborAmount()
    {
        return $this->serviceLaborAmount;
    }

    /**
     * Sets a new serviceLaborAmount
     *
     * @param float $serviceLaborAmount
     * @return self
     */
    public function setServiceLaborAmount($serviceLaborAmount)
    {
        $this->serviceLaborAmount = $serviceLaborAmount;
        return $this;
    }

    /**
     * Gets as warrantyFeesAmount
     *
     * @return float
     */
    public function getWarrantyFeesAmount()
    {
        return $this->warrantyFeesAmount;
    }

    /**
     * Sets a new warrantyFeesAmount
     *
     * @param float $warrantyFeesAmount
     * @return self
     */
    public function setWarrantyFeesAmount($warrantyFeesAmount)
    {
        $this->warrantyFeesAmount = $warrantyFeesAmount;
        return $this;
    }

    /**
     * Gets as warrantyPartsAmount
     *
     * @return float
     */
    public function getWarrantyPartsAmount()
    {
        return $this->warrantyPartsAmount;
    }

    /**
     * Sets a new warrantyPartsAmount
     *
     * @param float $warrantyPartsAmount
     * @return self
     */
    public function setWarrantyPartsAmount($warrantyPartsAmount)
    {
        $this->warrantyPartsAmount = $warrantyPartsAmount;
        return $this;
    }

    /**
     * Gets as warrantyLaborAmount
     *
     * @return float
     */
    public function getWarrantyLaborAmount()
    {
        return $this->warrantyLaborAmount;
    }

    /**
     * Sets a new warrantyLaborAmount
     *
     * @param float $warrantyLaborAmount
     * @return self
     */
    public function setWarrantyLaborAmount($warrantyLaborAmount)
    {
        $this->warrantyLaborAmount = $warrantyLaborAmount;
        return $this;
    }

    /**
     * Gets as feeDescription
     *
     * @return string
     */
    public function getFeeDescription()
    {
        return $this->feeDescription;
    }

    /**
     * Sets a new feeDescription
     *
     * @param string $feeDescription
     * @return self
     */
    public function setFeeDescription($feeDescription)
    {
        $this->feeDescription = $feeDescription;
        return $this;
    }

    /**
     * Gets as feeType
     *
     * @return string
     */
    public function getFeeType()
    {
        return $this->feeType;
    }

    /**
     * Sets a new feeType
     *
     * @param string $feeType
     * @return self
     */
    public function setFeeType($feeType)
    {
        $this->feeType = $feeType;
        return $this;
    }

    /**
     * Gets as validFrom
     *
     * @return string
     */
    public function getValidFrom()
    {
        return $this->validFrom;
    }

    /**
     * Sets a new validFrom
     *
     * @param string $validFrom
     * @return self
     */
    public function setValidFrom($validFrom)
    {
        $this->validFrom = $validFrom;
        return $this;
    }

    /**
     * Gets as validTill
     *
     * @return string
     */
    public function getValidTill()
    {
        return $this->validTill;
    }

    /**
     * Sets a new validTill
     *
     * @param string $validTill
     * @return self
     */
    public function setValidTill($validTill)
    {
        $this->validTill = $validTill;
        return $this;
    }

    /**
     * Gets as paymentMethods
     *
     * @return string
     */
    public function getPaymentMethods()
    {
        return $this->paymentMethods;
    }

    /**
     * Sets a new paymentMethods
     *
     * @param string $paymentMethods
     * @return self
     */
    public function setPaymentMethods($paymentMethods)
    {
        $this->paymentMethods = $paymentMethods;
        return $this;
    }

    /**
     * Gets as amountType
     *
     * @return string
     */
    public function getAmountType()
    {
        return $this->amountType;
    }

    /**
     * Sets a new amountType
     *
     * @param string $amountType
     * @return self
     */
    public function setAmountType($amountType)
    {
        $this->amountType = $amountType;
        return $this;
    }

    /**
     * Gets as minimumAmount
     *
     * @return float
     */
    public function getMinimumAmount()
    {
        return $this->minimumAmount;
    }

    /**
     * Sets a new minimumAmount
     *
     * @param float $minimumAmount
     * @return self
     */
    public function setMinimumAmount($minimumAmount)
    {
        $this->minimumAmount = $minimumAmount;
        return $this;
    }

    /**
     * Gets as maximumAmount
     *
     * @return float
     */
    public function getMaximumAmount()
    {
        return $this->maximumAmount;
    }

    /**
     * Sets a new maximumAmount
     *
     * @param float $maximumAmount
     * @return self
     */
    public function setMaximumAmount($maximumAmount)
    {
        $this->maximumAmount = $maximumAmount;
        return $this;
    }

    /**
     * Gets as calculationBasis
     *
     * @return \App\Soap\dealertrack\src\CalculationBasis
     */
    public function getCalculationBasis()
    {
        return $this->calculationBasis;
    }

    /**
     * Sets a new calculationBasis
     *
     * @param \App\Soap\dealertrack\src\CalculationBasis $calculationBasis
     * @return self
     */
    public function setCalculationBasis(\App\Soap\dealertrack\src\CalculationBasis $calculationBasis)
    {
        $this->calculationBasis = $calculationBasis;
        return $this;
    }

    /**
     * Gets as partsAccount
     *
     * @return string
     */
    public function getPartsAccount()
    {
        return $this->partsAccount;
    }

    /**
     * Sets a new partsAccount
     *
     * @param string $partsAccount
     * @return self
     */
    public function setPartsAccount($partsAccount)
    {
        $this->partsAccount = $partsAccount;
        return $this;
    }

    /**
     * Gets as partsPercentage
     *
     * @return float
     */
    public function getPartsPercentage()
    {
        return $this->partsPercentage;
    }

    /**
     * Sets a new partsPercentage
     *
     * @param float $partsPercentage
     * @return self
     */
    public function setPartsPercentage($partsPercentage)
    {
        $this->partsPercentage = $partsPercentage;
        return $this;
    }

    /**
     * Gets as laborAccount
     *
     * @return \App\Soap\dealertrack\src\LaborAccount
     */
    public function getLaborAccount()
    {
        return $this->laborAccount;
    }

    /**
     * Sets a new laborAccount
     *
     * @param \App\Soap\dealertrack\src\LaborAccount $laborAccount
     * @return self
     */
    public function setLaborAccount(\App\Soap\dealertrack\src\LaborAccount $laborAccount)
    {
        $this->laborAccount = $laborAccount;
        return $this;
    }

    /**
     * Gets as laborPercentage
     *
     * @return float
     */
    public function getLaborPercentage()
    {
        return $this->laborPercentage;
    }

    /**
     * Sets a new laborPercentage
     *
     * @param float $laborPercentage
     * @return self
     */
    public function setLaborPercentage($laborPercentage)
    {
        $this->laborPercentage = $laborPercentage;
        return $this;
    }

    /**
     * Gets as taxable
     *
     * @return string
     */
    public function getTaxable()
    {
        return $this->taxable;
    }

    /**
     * Sets a new taxable
     *
     * @param string $taxable
     * @return self
     */
    public function setTaxable($taxable)
    {
        $this->taxable = $taxable;
        return $this;
    }


}


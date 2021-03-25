<?php

namespace App\Soap\dealertrack\src;

/**
 * Class representing Labor
 */
class Labor
{

    /**
     * @var string $lineType
     */
    private $lineType = null;

    /**
     * @var int $lineSeqNumber
     */
    private $lineSeqNumber = null;

    /**
     * @var string $transactionCode
     */
    private $transactionCode = null;

    /**
     * @var int $transactionDate
     */
    private $transactionDate = null;

    /**
     * @var string $linePaymentMethod
     */
    private $linePaymentMethod = null;

    /**
     * @var string $serviceType
     */
    private $serviceType = null;

    /**
     * @var \App\Soap\dealertrack\src\PolicyAdjustment $policyAdjustment
     */
    private $policyAdjustment = null;

    /**
     * @var string $technicianID
     */
    private $technicianID = null;

    /**
     * @var string $laborOpCode
     */
    private $laborOpCode = null;

    /**
     * @var \App\Soap\dealertrack\src\CorrLaborOpCode $corrLaborOpCode
     */
    private $corrLaborOpCode = null;

    /**
     * @var float $laborHours
     */
    private $laborHours = null;

    /**
     * @var float $laborAmount
     */
    private $laborAmount = null;

    /**
     * @var float $laborCost
     */
    private $laborCost = null;

    /**
     * @var string $actualRetailFlag
     */
    private $actualRetailFlag = null;

    /**
     * @var string $failureCode
     */
    private $failureCode = null;

    /**
     * @var \App\Soap\dealertrack\src\SubletVendorNumber $subletVendorNumber
     */
    private $subletVendorNumber = null;

    /**
     * @var \App\Soap\dealertrack\src\SubletInvoiceNumber $subletInvoiceNumber
     */
    private $subletInvoiceNumber = null;

    /**
     * @var int $couponNumber
     */
    private $couponNumber = null;

    /**
     * @var \App\Soap\dealertrack\src\CouponDiscountBasis $couponDiscountBasis
     */
    private $couponDiscountBasis = null;

    /**
     * @var \App\Soap\dealertrack\src\VATCode $vATCode
     */
    private $vATCode = null;

    /**
     * @var float $vATAmount
     */
    private $vATAmount = null;

    /**
     * Gets as lineType
     *
     * @return string
     */
    public function getLineType()
    {
        return $this->lineType;
    }

    /**
     * Sets a new lineType
     *
     * @param string $lineType
     * @return self
     */
    public function setLineType($lineType)
    {
        $this->lineType = $lineType;
        return $this;
    }

    /**
     * Gets as lineSeqNumber
     *
     * @return int
     */
    public function getLineSeqNumber()
    {
        return $this->lineSeqNumber;
    }

    /**
     * Sets a new lineSeqNumber
     *
     * @param int $lineSeqNumber
     * @return self
     */
    public function setLineSeqNumber($lineSeqNumber)
    {
        $this->lineSeqNumber = $lineSeqNumber;
        return $this;
    }

    /**
     * Gets as transactionCode
     *
     * @return string
     */
    public function getTransactionCode()
    {
        return $this->transactionCode;
    }

    /**
     * Sets a new transactionCode
     *
     * @param string $transactionCode
     * @return self
     */
    public function setTransactionCode($transactionCode)
    {
        $this->transactionCode = $transactionCode;
        return $this;
    }

    /**
     * Gets as transactionDate
     *
     * @return int
     */
    public function getTransactionDate()
    {
        return $this->transactionDate;
    }

    /**
     * Sets a new transactionDate
     *
     * @param int $transactionDate
     * @return self
     */
    public function setTransactionDate($transactionDate)
    {
        $this->transactionDate = $transactionDate;
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
     * Gets as serviceType
     *
     * @return string
     */
    public function getServiceType()
    {
        return $this->serviceType;
    }

    /**
     * Sets a new serviceType
     *
     * @param string $serviceType
     * @return self
     */
    public function setServiceType($serviceType)
    {
        $this->serviceType = $serviceType;
        return $this;
    }

    /**
     * Gets as policyAdjustment
     *
     * @return \App\Soap\dealertrack\src\PolicyAdjustment
     */
    public function getPolicyAdjustment()
    {
        return $this->policyAdjustment;
    }

    /**
     * Sets a new policyAdjustment
     *
     * @param \App\Soap\dealertrack\src\PolicyAdjustment $policyAdjustment
     * @return self
     */
    public function setPolicyAdjustment(\App\Soap\dealertrack\src\PolicyAdjustment $policyAdjustment)
    {
        $this->policyAdjustment = $policyAdjustment;
        return $this;
    }

    /**
     * Gets as technicianID
     *
     * @return string
     */
    public function getTechnicianID()
    {
        return $this->technicianID;
    }

    /**
     * Sets a new technicianID
     *
     * @param string $technicianID
     * @return self
     */
    public function setTechnicianID($technicianID)
    {
        $this->technicianID = $technicianID;
        return $this;
    }

    /**
     * Gets as laborOpCode
     *
     * @return string
     */
    public function getLaborOpCode()
    {
        return $this->laborOpCode;
    }

    /**
     * Sets a new laborOpCode
     *
     * @param string $laborOpCode
     * @return self
     */
    public function setLaborOpCode($laborOpCode)
    {
        $this->laborOpCode = $laborOpCode;
        return $this;
    }

    /**
     * Gets as corrLaborOpCode
     *
     * @return \App\Soap\dealertrack\src\CorrLaborOpCode
     */
    public function getCorrLaborOpCode()
    {
        return $this->corrLaborOpCode;
    }

    /**
     * Sets a new corrLaborOpCode
     *
     * @param \App\Soap\dealertrack\src\CorrLaborOpCode $corrLaborOpCode
     * @return self
     */
    public function setCorrLaborOpCode(\App\Soap\dealertrack\src\CorrLaborOpCode $corrLaborOpCode)
    {
        $this->corrLaborOpCode = $corrLaborOpCode;
        return $this;
    }

    /**
     * Gets as laborHours
     *
     * @return float
     */
    public function getLaborHours()
    {
        return $this->laborHours;
    }

    /**
     * Sets a new laborHours
     *
     * @param float $laborHours
     * @return self
     */
    public function setLaborHours($laborHours)
    {
        $this->laborHours = $laborHours;
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
     * Gets as laborCost
     *
     * @return float
     */
    public function getLaborCost()
    {
        return $this->laborCost;
    }

    /**
     * Sets a new laborCost
     *
     * @param float $laborCost
     * @return self
     */
    public function setLaborCost($laborCost)
    {
        $this->laborCost = $laborCost;
        return $this;
    }

    /**
     * Gets as actualRetailFlag
     *
     * @return string
     */
    public function getActualRetailFlag()
    {
        return $this->actualRetailFlag;
    }

    /**
     * Sets a new actualRetailFlag
     *
     * @param string $actualRetailFlag
     * @return self
     */
    public function setActualRetailFlag($actualRetailFlag)
    {
        $this->actualRetailFlag = $actualRetailFlag;
        return $this;
    }

    /**
     * Gets as failureCode
     *
     * @return string
     */
    public function getFailureCode()
    {
        return $this->failureCode;
    }

    /**
     * Sets a new failureCode
     *
     * @param string $failureCode
     * @return self
     */
    public function setFailureCode($failureCode)
    {
        $this->failureCode = $failureCode;
        return $this;
    }

    /**
     * Gets as subletVendorNumber
     *
     * @return \App\Soap\dealertrack\src\SubletVendorNumber
     */
    public function getSubletVendorNumber()
    {
        return $this->subletVendorNumber;
    }

    /**
     * Sets a new subletVendorNumber
     *
     * @param \App\Soap\dealertrack\src\SubletVendorNumber $subletVendorNumber
     * @return self
     */
    public function setSubletVendorNumber(\App\Soap\dealertrack\src\SubletVendorNumber $subletVendorNumber)
    {
        $this->subletVendorNumber = $subletVendorNumber;
        return $this;
    }

    /**
     * Gets as subletInvoiceNumber
     *
     * @return \App\Soap\dealertrack\src\SubletInvoiceNumber
     */
    public function getSubletInvoiceNumber()
    {
        return $this->subletInvoiceNumber;
    }

    /**
     * Sets a new subletInvoiceNumber
     *
     * @param \App\Soap\dealertrack\src\SubletInvoiceNumber $subletInvoiceNumber
     * @return self
     */
    public function setSubletInvoiceNumber(\App\Soap\dealertrack\src\SubletInvoiceNumber $subletInvoiceNumber)
    {
        $this->subletInvoiceNumber = $subletInvoiceNumber;
        return $this;
    }

    /**
     * Gets as couponNumber
     *
     * @return int
     */
    public function getCouponNumber()
    {
        return $this->couponNumber;
    }

    /**
     * Sets a new couponNumber
     *
     * @param int $couponNumber
     * @return self
     */
    public function setCouponNumber($couponNumber)
    {
        $this->couponNumber = $couponNumber;
        return $this;
    }

    /**
     * Gets as couponDiscountBasis
     *
     * @return \App\Soap\dealertrack\src\CouponDiscountBasis
     */
    public function getCouponDiscountBasis()
    {
        return $this->couponDiscountBasis;
    }

    /**
     * Sets a new couponDiscountBasis
     *
     * @param \App\Soap\dealertrack\src\CouponDiscountBasis $couponDiscountBasis
     * @return self
     */
    public function setCouponDiscountBasis(\App\Soap\dealertrack\src\CouponDiscountBasis $couponDiscountBasis)
    {
        $this->couponDiscountBasis = $couponDiscountBasis;
        return $this;
    }

    /**
     * Gets as vATCode
     *
     * @return \App\Soap\dealertrack\src\VATCode
     */
    public function getVATCode()
    {
        return $this->vATCode;
    }

    /**
     * Sets a new vATCode
     *
     * @param \App\Soap\dealertrack\src\VATCode $vATCode
     * @return self
     */
    public function setVATCode(\App\Soap\dealertrack\src\VATCode $vATCode)
    {
        $this->vATCode = $vATCode;
        return $this;
    }

    /**
     * Gets as vATAmount
     *
     * @return float
     */
    public function getVATAmount()
    {
        return $this->vATAmount;
    }

    /**
     * Sets a new vATAmount
     *
     * @param float $vATAmount
     * @return self
     */
    public function setVATAmount($vATAmount)
    {
        $this->vATAmount = $vATAmount;
        return $this;
    }


}


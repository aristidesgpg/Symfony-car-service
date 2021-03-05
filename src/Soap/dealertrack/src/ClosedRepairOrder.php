<?php

namespace App\Soap\dealertrack\src;

/**
 * Class representing ClosedRepairOrder
 */
class ClosedRepairOrder
{

    /**
     * @var string $companyNumber
     */
    private $companyNumber = null;

    /**
     * @var int $repairOrderNumber
     */
    private $repairOrderNumber = null;

    /**
     * @var \App\Soap\dealertrack\src\RepairOrderType $repairOrderType
     */
    private $repairOrderType = null;

    /**
     * @var int $warrantyRONumber
     */
    private $warrantyRONumber = null;

    /**
     * @var string $serviceWriterID
     */
    private $serviceWriterID = null;

    /**
     * @var string $rOTechnicianID
     */
    private $rOTechnicianID = null;

    /**
     * @var int $customerKey
     */
    private $customerKey = null;

    /**
     * @var string $customerName
     */
    private $customerName = null;

    /**
     * @var \App\Soap\dealertrack\src\CustomerAddress1 $customerAddress1
     */
    private $customerAddress1 = null;

    /**
     * @var \App\Soap\dealertrack\src\CustomerAddress2 $customerAddress2
     */
    private $customerAddress2 = null;

    /**
     * @var \App\Soap\dealertrack\src\CustomerCity $customerCity
     */
    private $customerCity = null;

    /**
     * @var \App\Soap\dealertrack\src\CustomerState $customerState
     */
    private $customerState = null;

    /**
     * @var int $customerZipCode
     */
    private $customerZipCode = null;

    /**
     * @var int $aRCustomerKey
     */
    private $aRCustomerKey = null;

    /**
     * @var \App\Soap\dealertrack\src\PaymentMethod $paymentMethod
     */
    private $paymentMethod = null;

    /**
     * @var int $openDate
     */
    private $openDate = null;

    /**
     * @var int $closeDate
     */
    private $closeDate = null;

    /**
     * @var int $finalCloseDate
     */
    private $finalCloseDate = null;

    /**
     * @var string $vIN
     */
    private $vIN = null;

    /**
     * @var float $totalEstimate
     */
    private $totalEstimate = null;

    /**
     * @var int $serviceContractComp
     */
    private $serviceContractComp = null;

    /**
     * @var int $serviceContractComp2
     */
    private $serviceContractComp2 = null;

    /**
     * @var float $serviceContractDeduct
     */
    private $serviceContractDeduct = null;

    /**
     * @var float $serviceContractDeduct2
     */
    private $serviceContractDeduct2 = null;

    /**
     * @var float $warrantyDeduct
     */
    private $warrantyDeduct = null;

    /**
     * @var string $franchiseCode
     */
    private $franchiseCode = null;

    /**
     * @var int $odometerIn
     */
    private $odometerIn = null;

    /**
     * @var int $odometerOut
     */
    private $odometerOut = null;

    /**
     * @var \App\Soap\dealertrack\src\CheckNumber $checkNumber
     */
    private $checkNumber = null;

    /**
     * @var \App\Soap\dealertrack\src\PurchaseOrderNumber $purchaseOrderNumber
     */
    private $purchaseOrderNumber = null;

    /**
     * @var int $receiptNumber
     */
    private $receiptNumber = null;

    /**
     * @var float $partsTotal
     */
    private $partsTotal = null;

    /**
     * @var float $laborTotal
     */
    private $laborTotal = null;

    /**
     * @var float $subletTotal
     */
    private $subletTotal = null;

    /**
     * @var float $serviceContractDeductPaid
     */
    private $serviceContractDeductPaid = null;

    /**
     * @var float $serviceContractTotal
     */
    private $serviceContractTotal = null;

    /**
     * @var float $specialOrderDeposits
     */
    private $specialOrderDeposits = null;

    /**
     * @var float $customerPayHazardousMaterials
     */
    private $customerPayHazardousMaterials = null;

    /**
     * @var float $customerPaySaleTax
     */
    private $customerPaySaleTax = null;

    /**
     * @var float $customerPaySaleTax2
     */
    private $customerPaySaleTax2 = null;

    /**
     * @var float $customerPaySaleTax3
     */
    private $customerPaySaleTax3 = null;

    /**
     * @var float $customerPaySaleTax4
     */
    private $customerPaySaleTax4 = null;

    /**
     * @var float $warrantySaleTax
     */
    private $warrantySaleTax = null;

    /**
     * @var float $warrantySaleTax2
     */
    private $warrantySaleTax2 = null;

    /**
     * @var float $warrantySaleTax3
     */
    private $warrantySaleTax3 = null;

    /**
     * @var float $warrantySaleTax4
     */
    private $warrantySaleTax4 = null;

    /**
     * @var float $internalSaleTax
     */
    private $internalSaleTax = null;

    /**
     * @var float $internalSaleTax2
     */
    private $internalSaleTax2 = null;

    /**
     * @var float $internalSaleTax3
     */
    private $internalSaleTax3 = null;

    /**
     * @var float $internalSaleTax4
     */
    private $internalSaleTax4 = null;

    /**
     * @var float $serviceContractSaleTax
     */
    private $serviceContractSaleTax = null;

    /**
     * @var float $serviceContractSaleTax2
     */
    private $serviceContractSaleTax2 = null;

    /**
     * @var float $serviceContractSaleTax3
     */
    private $serviceContractSaleTax3 = null;

    /**
     * @var float $serviceContractSaleTax4
     */
    private $serviceContractSaleTax4 = null;

    /**
     * @var float $customerPayShopSup
     */
    private $customerPayShopSup = null;

    /**
     * @var float $warrantyShopSup
     */
    private $warrantyShopSup = null;

    /**
     * @var float $internalShopSup
     */
    private $internalShopSup = null;

    /**
     * @var float $serviceContractShopSup
     */
    private $serviceContractShopSup = null;

    /**
     * @var int $couponNumber
     */
    private $couponNumber = null;

    /**
     * @var float $couponDiscount
     */
    private $couponDiscount = null;

    /**
     * @var float $totalCouponDiscount
     */
    private $totalCouponDiscount = null;

    /**
     * @var float $totalSale
     */
    private $totalSale = null;

    /**
     * @var float $totalGross
     */
    private $totalGross = null;

    /**
     * @var \App\Soap\dealertrack\src\InternalAuthBy $internalAuthBy
     */
    private $internalAuthBy = null;

    /**
     * @var \App\Soap\dealertrack\src\TagNumber $tagNumber
     */
    private $tagNumber = null;

    /**
     * @var int $dateTimeOfAppointment
     */
    private $dateTimeOfAppointment = null;

    /**
     * @var int $dateTimeLastLineComplete
     */
    private $dateTimeLastLineComplete = null;

    /**
     * @var int $dateTimePreInvoiced
     */
    private $dateTimePreInvoiced = null;

    /**
     * @var \App\Soap\dealertrack\src\TowedInIndicator $towedInIndicator
     */
    private $towedInIndicator = null;

    /**
     * @var \App\Soap\dealertrack\src\ClosedRepairOrderDetail[] $details
     */
    private $details = null;

    /**
     * @var \App\Soap\dealertrack\src\Fees $fees
     */
    private $fees = null;

    /**
     * Gets as companyNumber
     *
     * @return string
     */
    public function getCompanyNumber()
    {
        return $this->companyNumber;
    }

    /**
     * Sets a new companyNumber
     *
     * @param string $companyNumber
     * @return self
     */
    public function setCompanyNumber($companyNumber)
    {
        $this->companyNumber = $companyNumber;
        return $this;
    }

    /**
     * Gets as repairOrderNumber
     *
     * @return int
     */
    public function getRepairOrderNumber()
    {
        return $this->repairOrderNumber;
    }

    /**
     * Sets a new repairOrderNumber
     *
     * @param int $repairOrderNumber
     * @return self
     */
    public function setRepairOrderNumber($repairOrderNumber)
    {
        $this->repairOrderNumber = $repairOrderNumber;
        return $this;
    }

    /**
     * Gets as repairOrderType
     *
     * @return \App\Soap\dealertrack\src\RepairOrderType
     */
    public function getRepairOrderType()
    {
        return $this->repairOrderType;
    }

    /**
     * Sets a new repairOrderType
     *
     * @param \App\Soap\dealertrack\src\RepairOrderType $repairOrderType
     * @return self
     */
    public function setRepairOrderType(\App\Soap\dealertrack\src\RepairOrderType $repairOrderType)
    {
        $this->repairOrderType = $repairOrderType;
        return $this;
    }

    /**
     * Gets as warrantyRONumber
     *
     * @return int
     */
    public function getWarrantyRONumber()
    {
        return $this->warrantyRONumber;
    }

    /**
     * Sets a new warrantyRONumber
     *
     * @param int $warrantyRONumber
     * @return self
     */
    public function setWarrantyRONumber($warrantyRONumber)
    {
        $this->warrantyRONumber = $warrantyRONumber;
        return $this;
    }

    /**
     * Gets as serviceWriterID
     *
     * @return string
     */
    public function getServiceWriterID()
    {
        return $this->serviceWriterID;
    }

    /**
     * Sets a new serviceWriterID
     *
     * @param string $serviceWriterID
     * @return self
     */
    public function setServiceWriterID($serviceWriterID)
    {
        $this->serviceWriterID = $serviceWriterID;
        return $this;
    }

    /**
     * Gets as rOTechnicianID
     *
     * @return string
     */
    public function getROTechnicianID()
    {
        return $this->rOTechnicianID;
    }

    /**
     * Sets a new rOTechnicianID
     *
     * @param string $rOTechnicianID
     * @return self
     */
    public function setROTechnicianID($rOTechnicianID)
    {
        $this->rOTechnicianID = $rOTechnicianID;
        return $this;
    }

    /**
     * Gets as customerKey
     *
     * @return int
     */
    public function getCustomerKey()
    {
        return $this->customerKey;
    }

    /**
     * Sets a new customerKey
     *
     * @param int $customerKey
     * @return self
     */
    public function setCustomerKey($customerKey)
    {
        $this->customerKey = $customerKey;
        return $this;
    }

    /**
     * Gets as customerName
     *
     * @return string
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * Sets a new customerName
     *
     * @param string $customerName
     * @return self
     */
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;
        return $this;
    }

    /**
     * Gets as customerAddress1
     *
     * @return \App\Soap\dealertrack\src\CustomerAddress1
     */
    public function getCustomerAddress1()
    {
        return $this->customerAddress1;
    }

    /**
     * Sets a new customerAddress1
     *
     * @param \App\Soap\dealertrack\src\CustomerAddress1 $customerAddress1
     * @return self
     */
    public function setCustomerAddress1(\App\Soap\dealertrack\src\CustomerAddress1 $customerAddress1)
    {
        $this->customerAddress1 = $customerAddress1;
        return $this;
    }

    /**
     * Gets as customerAddress2
     *
     * @return \App\Soap\dealertrack\src\CustomerAddress2
     */
    public function getCustomerAddress2()
    {
        return $this->customerAddress2;
    }

    /**
     * Sets a new customerAddress2
     *
     * @param \App\Soap\dealertrack\src\CustomerAddress2 $customerAddress2
     * @return self
     */
    public function setCustomerAddress2(\App\Soap\dealertrack\src\CustomerAddress2 $customerAddress2)
    {
        $this->customerAddress2 = $customerAddress2;
        return $this;
    }

    /**
     * Gets as customerCity
     *
     * @return \App\Soap\dealertrack\src\CustomerCity
     */
    public function getCustomerCity()
    {
        return $this->customerCity;
    }

    /**
     * Sets a new customerCity
     *
     * @param \App\Soap\dealertrack\src\CustomerCity $customerCity
     * @return self
     */
    public function setCustomerCity(\App\Soap\dealertrack\src\CustomerCity $customerCity)
    {
        $this->customerCity = $customerCity;
        return $this;
    }

    /**
     * Gets as customerState
     *
     * @return \App\Soap\dealertrack\src\CustomerState
     */
    public function getCustomerState()
    {
        return $this->customerState;
    }

    /**
     * Sets a new customerState
     *
     * @param \App\Soap\dealertrack\src\CustomerState $customerState
     * @return self
     */
    public function setCustomerState(\App\Soap\dealertrack\src\CustomerState $customerState)
    {
        $this->customerState = $customerState;
        return $this;
    }

    /**
     * Gets as customerZipCode
     *
     * @return int
     */
    public function getCustomerZipCode()
    {
        return $this->customerZipCode;
    }

    /**
     * Sets a new customerZipCode
     *
     * @param int $customerZipCode
     * @return self
     */
    public function setCustomerZipCode($customerZipCode)
    {
        $this->customerZipCode = $customerZipCode;
        return $this;
    }

    /**
     * Gets as aRCustomerKey
     *
     * @return int
     */
    public function getARCustomerKey()
    {
        return $this->aRCustomerKey;
    }

    /**
     * Sets a new aRCustomerKey
     *
     * @param int $aRCustomerKey
     * @return self
     */
    public function setARCustomerKey($aRCustomerKey)
    {
        $this->aRCustomerKey = $aRCustomerKey;
        return $this;
    }

    /**
     * Gets as paymentMethod
     *
     * @return \App\Soap\dealertrack\src\PaymentMethod
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * Sets a new paymentMethod
     *
     * @param \App\Soap\dealertrack\src\PaymentMethod $paymentMethod
     * @return self
     */
    public function setPaymentMethod(\App\Soap\dealertrack\src\PaymentMethod $paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }

    /**
     * Gets as openDate
     *
     * @return int
     */
    public function getOpenDate()
    {
        return $this->openDate;
    }

    /**
     * Sets a new openDate
     *
     * @param int $openDate
     * @return self
     */
    public function setOpenDate($openDate)
    {
        $this->openDate = $openDate;
        return $this;
    }

    /**
     * Gets as closeDate
     *
     * @return int
     */
    public function getCloseDate()
    {
        return $this->closeDate;
    }

    /**
     * Sets a new closeDate
     *
     * @param int $closeDate
     * @return self
     */
    public function setCloseDate($closeDate)
    {
        $this->closeDate = $closeDate;
        return $this;
    }

    /**
     * Gets as finalCloseDate
     *
     * @return int
     */
    public function getFinalCloseDate()
    {
        return $this->finalCloseDate;
    }

    /**
     * Sets a new finalCloseDate
     *
     * @param int $finalCloseDate
     * @return self
     */
    public function setFinalCloseDate($finalCloseDate)
    {
        $this->finalCloseDate = $finalCloseDate;
        return $this;
    }

    /**
     * Gets as vIN
     *
     * @return string
     */
    public function getVIN()
    {
        return $this->vIN;
    }

    /**
     * Sets a new vIN
     *
     * @param string $vIN
     * @return self
     */
    public function setVIN($vIN)
    {
        $this->vIN = $vIN;
        return $this;
    }

    /**
     * Gets as totalEstimate
     *
     * @return float
     */
    public function getTotalEstimate()
    {
        return $this->totalEstimate;
    }

    /**
     * Sets a new totalEstimate
     *
     * @param float $totalEstimate
     * @return self
     */
    public function setTotalEstimate($totalEstimate)
    {
        $this->totalEstimate = $totalEstimate;
        return $this;
    }

    /**
     * Gets as serviceContractComp
     *
     * @return int
     */
    public function getServiceContractComp()
    {
        return $this->serviceContractComp;
    }

    /**
     * Sets a new serviceContractComp
     *
     * @param int $serviceContractComp
     * @return self
     */
    public function setServiceContractComp($serviceContractComp)
    {
        $this->serviceContractComp = $serviceContractComp;
        return $this;
    }

    /**
     * Gets as serviceContractComp2
     *
     * @return int
     */
    public function getServiceContractComp2()
    {
        return $this->serviceContractComp2;
    }

    /**
     * Sets a new serviceContractComp2
     *
     * @param int $serviceContractComp2
     * @return self
     */
    public function setServiceContractComp2($serviceContractComp2)
    {
        $this->serviceContractComp2 = $serviceContractComp2;
        return $this;
    }

    /**
     * Gets as serviceContractDeduct
     *
     * @return float
     */
    public function getServiceContractDeduct()
    {
        return $this->serviceContractDeduct;
    }

    /**
     * Sets a new serviceContractDeduct
     *
     * @param float $serviceContractDeduct
     * @return self
     */
    public function setServiceContractDeduct($serviceContractDeduct)
    {
        $this->serviceContractDeduct = $serviceContractDeduct;
        return $this;
    }

    /**
     * Gets as serviceContractDeduct2
     *
     * @return float
     */
    public function getServiceContractDeduct2()
    {
        return $this->serviceContractDeduct2;
    }

    /**
     * Sets a new serviceContractDeduct2
     *
     * @param float $serviceContractDeduct2
     * @return self
     */
    public function setServiceContractDeduct2($serviceContractDeduct2)
    {
        $this->serviceContractDeduct2 = $serviceContractDeduct2;
        return $this;
    }

    /**
     * Gets as warrantyDeduct
     *
     * @return float
     */
    public function getWarrantyDeduct()
    {
        return $this->warrantyDeduct;
    }

    /**
     * Sets a new warrantyDeduct
     *
     * @param float $warrantyDeduct
     * @return self
     */
    public function setWarrantyDeduct($warrantyDeduct)
    {
        $this->warrantyDeduct = $warrantyDeduct;
        return $this;
    }

    /**
     * Gets as franchiseCode
     *
     * @return string
     */
    public function getFranchiseCode()
    {
        return $this->franchiseCode;
    }

    /**
     * Sets a new franchiseCode
     *
     * @param string $franchiseCode
     * @return self
     */
    public function setFranchiseCode($franchiseCode)
    {
        $this->franchiseCode = $franchiseCode;
        return $this;
    }

    /**
     * Gets as odometerIn
     *
     * @return int
     */
    public function getOdometerIn()
    {
        return $this->odometerIn;
    }

    /**
     * Sets a new odometerIn
     *
     * @param int $odometerIn
     * @return self
     */
    public function setOdometerIn($odometerIn)
    {
        $this->odometerIn = $odometerIn;
        return $this;
    }

    /**
     * Gets as odometerOut
     *
     * @return int
     */
    public function getOdometerOut()
    {
        return $this->odometerOut;
    }

    /**
     * Sets a new odometerOut
     *
     * @param int $odometerOut
     * @return self
     */
    public function setOdometerOut($odometerOut)
    {
        $this->odometerOut = $odometerOut;
        return $this;
    }

    /**
     * Gets as checkNumber
     *
     * @return \App\Soap\dealertrack\src\CheckNumber
     */
    public function getCheckNumber()
    {
        return $this->checkNumber;
    }

    /**
     * Sets a new checkNumber
     *
     * @param \App\Soap\dealertrack\src\CheckNumber $checkNumber
     * @return self
     */
    public function setCheckNumber(\App\Soap\dealertrack\src\CheckNumber $checkNumber)
    {
        $this->checkNumber = $checkNumber;
        return $this;
    }

    /**
     * Gets as purchaseOrderNumber
     *
     * @return \App\Soap\dealertrack\src\PurchaseOrderNumber
     */
    public function getPurchaseOrderNumber()
    {
        return $this->purchaseOrderNumber;
    }

    /**
     * Sets a new purchaseOrderNumber
     *
     * @param \App\Soap\dealertrack\src\PurchaseOrderNumber $purchaseOrderNumber
     * @return self
     */
    public function setPurchaseOrderNumber(\App\Soap\dealertrack\src\PurchaseOrderNumber $purchaseOrderNumber)
    {
        $this->purchaseOrderNumber = $purchaseOrderNumber;
        return $this;
    }

    /**
     * Gets as receiptNumber
     *
     * @return int
     */
    public function getReceiptNumber()
    {
        return $this->receiptNumber;
    }

    /**
     * Sets a new receiptNumber
     *
     * @param int $receiptNumber
     * @return self
     */
    public function setReceiptNumber($receiptNumber)
    {
        $this->receiptNumber = $receiptNumber;
        return $this;
    }

    /**
     * Gets as partsTotal
     *
     * @return float
     */
    public function getPartsTotal()
    {
        return $this->partsTotal;
    }

    /**
     * Sets a new partsTotal
     *
     * @param float $partsTotal
     * @return self
     */
    public function setPartsTotal($partsTotal)
    {
        $this->partsTotal = $partsTotal;
        return $this;
    }

    /**
     * Gets as laborTotal
     *
     * @return float
     */
    public function getLaborTotal()
    {
        return $this->laborTotal;
    }

    /**
     * Sets a new laborTotal
     *
     * @param float $laborTotal
     * @return self
     */
    public function setLaborTotal($laborTotal)
    {
        $this->laborTotal = $laborTotal;
        return $this;
    }

    /**
     * Gets as subletTotal
     *
     * @return float
     */
    public function getSubletTotal()
    {
        return $this->subletTotal;
    }

    /**
     * Sets a new subletTotal
     *
     * @param float $subletTotal
     * @return self
     */
    public function setSubletTotal($subletTotal)
    {
        $this->subletTotal = $subletTotal;
        return $this;
    }

    /**
     * Gets as serviceContractDeductPaid
     *
     * @return float
     */
    public function getServiceContractDeductPaid()
    {
        return $this->serviceContractDeductPaid;
    }

    /**
     * Sets a new serviceContractDeductPaid
     *
     * @param float $serviceContractDeductPaid
     * @return self
     */
    public function setServiceContractDeductPaid($serviceContractDeductPaid)
    {
        $this->serviceContractDeductPaid = $serviceContractDeductPaid;
        return $this;
    }

    /**
     * Gets as serviceContractTotal
     *
     * @return float
     */
    public function getServiceContractTotal()
    {
        return $this->serviceContractTotal;
    }

    /**
     * Sets a new serviceContractTotal
     *
     * @param float $serviceContractTotal
     * @return self
     */
    public function setServiceContractTotal($serviceContractTotal)
    {
        $this->serviceContractTotal = $serviceContractTotal;
        return $this;
    }

    /**
     * Gets as specialOrderDeposits
     *
     * @return float
     */
    public function getSpecialOrderDeposits()
    {
        return $this->specialOrderDeposits;
    }

    /**
     * Sets a new specialOrderDeposits
     *
     * @param float $specialOrderDeposits
     * @return self
     */
    public function setSpecialOrderDeposits($specialOrderDeposits)
    {
        $this->specialOrderDeposits = $specialOrderDeposits;
        return $this;
    }

    /**
     * Gets as customerPayHazardousMaterials
     *
     * @return float
     */
    public function getCustomerPayHazardousMaterials()
    {
        return $this->customerPayHazardousMaterials;
    }

    /**
     * Sets a new customerPayHazardousMaterials
     *
     * @param float $customerPayHazardousMaterials
     * @return self
     */
    public function setCustomerPayHazardousMaterials($customerPayHazardousMaterials)
    {
        $this->customerPayHazardousMaterials = $customerPayHazardousMaterials;
        return $this;
    }

    /**
     * Gets as customerPaySaleTax
     *
     * @return float
     */
    public function getCustomerPaySaleTax()
    {
        return $this->customerPaySaleTax;
    }

    /**
     * Sets a new customerPaySaleTax
     *
     * @param float $customerPaySaleTax
     * @return self
     */
    public function setCustomerPaySaleTax($customerPaySaleTax)
    {
        $this->customerPaySaleTax = $customerPaySaleTax;
        return $this;
    }

    /**
     * Gets as customerPaySaleTax2
     *
     * @return float
     */
    public function getCustomerPaySaleTax2()
    {
        return $this->customerPaySaleTax2;
    }

    /**
     * Sets a new customerPaySaleTax2
     *
     * @param float $customerPaySaleTax2
     * @return self
     */
    public function setCustomerPaySaleTax2($customerPaySaleTax2)
    {
        $this->customerPaySaleTax2 = $customerPaySaleTax2;
        return $this;
    }

    /**
     * Gets as customerPaySaleTax3
     *
     * @return float
     */
    public function getCustomerPaySaleTax3()
    {
        return $this->customerPaySaleTax3;
    }

    /**
     * Sets a new customerPaySaleTax3
     *
     * @param float $customerPaySaleTax3
     * @return self
     */
    public function setCustomerPaySaleTax3($customerPaySaleTax3)
    {
        $this->customerPaySaleTax3 = $customerPaySaleTax3;
        return $this;
    }

    /**
     * Gets as customerPaySaleTax4
     *
     * @return float
     */
    public function getCustomerPaySaleTax4()
    {
        return $this->customerPaySaleTax4;
    }

    /**
     * Sets a new customerPaySaleTax4
     *
     * @param float $customerPaySaleTax4
     * @return self
     */
    public function setCustomerPaySaleTax4($customerPaySaleTax4)
    {
        $this->customerPaySaleTax4 = $customerPaySaleTax4;
        return $this;
    }

    /**
     * Gets as warrantySaleTax
     *
     * @return float
     */
    public function getWarrantySaleTax()
    {
        return $this->warrantySaleTax;
    }

    /**
     * Sets a new warrantySaleTax
     *
     * @param float $warrantySaleTax
     * @return self
     */
    public function setWarrantySaleTax($warrantySaleTax)
    {
        $this->warrantySaleTax = $warrantySaleTax;
        return $this;
    }

    /**
     * Gets as warrantySaleTax2
     *
     * @return float
     */
    public function getWarrantySaleTax2()
    {
        return $this->warrantySaleTax2;
    }

    /**
     * Sets a new warrantySaleTax2
     *
     * @param float $warrantySaleTax2
     * @return self
     */
    public function setWarrantySaleTax2($warrantySaleTax2)
    {
        $this->warrantySaleTax2 = $warrantySaleTax2;
        return $this;
    }

    /**
     * Gets as warrantySaleTax3
     *
     * @return float
     */
    public function getWarrantySaleTax3()
    {
        return $this->warrantySaleTax3;
    }

    /**
     * Sets a new warrantySaleTax3
     *
     * @param float $warrantySaleTax3
     * @return self
     */
    public function setWarrantySaleTax3($warrantySaleTax3)
    {
        $this->warrantySaleTax3 = $warrantySaleTax3;
        return $this;
    }

    /**
     * Gets as warrantySaleTax4
     *
     * @return float
     */
    public function getWarrantySaleTax4()
    {
        return $this->warrantySaleTax4;
    }

    /**
     * Sets a new warrantySaleTax4
     *
     * @param float $warrantySaleTax4
     * @return self
     */
    public function setWarrantySaleTax4($warrantySaleTax4)
    {
        $this->warrantySaleTax4 = $warrantySaleTax4;
        return $this;
    }

    /**
     * Gets as internalSaleTax
     *
     * @return float
     */
    public function getInternalSaleTax()
    {
        return $this->internalSaleTax;
    }

    /**
     * Sets a new internalSaleTax
     *
     * @param float $internalSaleTax
     * @return self
     */
    public function setInternalSaleTax($internalSaleTax)
    {
        $this->internalSaleTax = $internalSaleTax;
        return $this;
    }

    /**
     * Gets as internalSaleTax2
     *
     * @return float
     */
    public function getInternalSaleTax2()
    {
        return $this->internalSaleTax2;
    }

    /**
     * Sets a new internalSaleTax2
     *
     * @param float $internalSaleTax2
     * @return self
     */
    public function setInternalSaleTax2($internalSaleTax2)
    {
        $this->internalSaleTax2 = $internalSaleTax2;
        return $this;
    }

    /**
     * Gets as internalSaleTax3
     *
     * @return float
     */
    public function getInternalSaleTax3()
    {
        return $this->internalSaleTax3;
    }

    /**
     * Sets a new internalSaleTax3
     *
     * @param float $internalSaleTax3
     * @return self
     */
    public function setInternalSaleTax3($internalSaleTax3)
    {
        $this->internalSaleTax3 = $internalSaleTax3;
        return $this;
    }

    /**
     * Gets as internalSaleTax4
     *
     * @return float
     */
    public function getInternalSaleTax4()
    {
        return $this->internalSaleTax4;
    }

    /**
     * Sets a new internalSaleTax4
     *
     * @param float $internalSaleTax4
     * @return self
     */
    public function setInternalSaleTax4($internalSaleTax4)
    {
        $this->internalSaleTax4 = $internalSaleTax4;
        return $this;
    }

    /**
     * Gets as serviceContractSaleTax
     *
     * @return float
     */
    public function getServiceContractSaleTax()
    {
        return $this->serviceContractSaleTax;
    }

    /**
     * Sets a new serviceContractSaleTax
     *
     * @param float $serviceContractSaleTax
     * @return self
     */
    public function setServiceContractSaleTax($serviceContractSaleTax)
    {
        $this->serviceContractSaleTax = $serviceContractSaleTax;
        return $this;
    }

    /**
     * Gets as serviceContractSaleTax2
     *
     * @return float
     */
    public function getServiceContractSaleTax2()
    {
        return $this->serviceContractSaleTax2;
    }

    /**
     * Sets a new serviceContractSaleTax2
     *
     * @param float $serviceContractSaleTax2
     * @return self
     */
    public function setServiceContractSaleTax2($serviceContractSaleTax2)
    {
        $this->serviceContractSaleTax2 = $serviceContractSaleTax2;
        return $this;
    }

    /**
     * Gets as serviceContractSaleTax3
     *
     * @return float
     */
    public function getServiceContractSaleTax3()
    {
        return $this->serviceContractSaleTax3;
    }

    /**
     * Sets a new serviceContractSaleTax3
     *
     * @param float $serviceContractSaleTax3
     * @return self
     */
    public function setServiceContractSaleTax3($serviceContractSaleTax3)
    {
        $this->serviceContractSaleTax3 = $serviceContractSaleTax3;
        return $this;
    }

    /**
     * Gets as serviceContractSaleTax4
     *
     * @return float
     */
    public function getServiceContractSaleTax4()
    {
        return $this->serviceContractSaleTax4;
    }

    /**
     * Sets a new serviceContractSaleTax4
     *
     * @param float $serviceContractSaleTax4
     * @return self
     */
    public function setServiceContractSaleTax4($serviceContractSaleTax4)
    {
        $this->serviceContractSaleTax4 = $serviceContractSaleTax4;
        return $this;
    }

    /**
     * Gets as customerPayShopSup
     *
     * @return float
     */
    public function getCustomerPayShopSup()
    {
        return $this->customerPayShopSup;
    }

    /**
     * Sets a new customerPayShopSup
     *
     * @param float $customerPayShopSup
     * @return self
     */
    public function setCustomerPayShopSup($customerPayShopSup)
    {
        $this->customerPayShopSup = $customerPayShopSup;
        return $this;
    }

    /**
     * Gets as warrantyShopSup
     *
     * @return float
     */
    public function getWarrantyShopSup()
    {
        return $this->warrantyShopSup;
    }

    /**
     * Sets a new warrantyShopSup
     *
     * @param float $warrantyShopSup
     * @return self
     */
    public function setWarrantyShopSup($warrantyShopSup)
    {
        $this->warrantyShopSup = $warrantyShopSup;
        return $this;
    }

    /**
     * Gets as internalShopSup
     *
     * @return float
     */
    public function getInternalShopSup()
    {
        return $this->internalShopSup;
    }

    /**
     * Sets a new internalShopSup
     *
     * @param float $internalShopSup
     * @return self
     */
    public function setInternalShopSup($internalShopSup)
    {
        $this->internalShopSup = $internalShopSup;
        return $this;
    }

    /**
     * Gets as serviceContractShopSup
     *
     * @return float
     */
    public function getServiceContractShopSup()
    {
        return $this->serviceContractShopSup;
    }

    /**
     * Sets a new serviceContractShopSup
     *
     * @param float $serviceContractShopSup
     * @return self
     */
    public function setServiceContractShopSup($serviceContractShopSup)
    {
        $this->serviceContractShopSup = $serviceContractShopSup;
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
     * Gets as couponDiscount
     *
     * @return float
     */
    public function getCouponDiscount()
    {
        return $this->couponDiscount;
    }

    /**
     * Sets a new couponDiscount
     *
     * @param float $couponDiscount
     * @return self
     */
    public function setCouponDiscount($couponDiscount)
    {
        $this->couponDiscount = $couponDiscount;
        return $this;
    }

    /**
     * Gets as totalCouponDiscount
     *
     * @return float
     */
    public function getTotalCouponDiscount()
    {
        return $this->totalCouponDiscount;
    }

    /**
     * Sets a new totalCouponDiscount
     *
     * @param float $totalCouponDiscount
     * @return self
     */
    public function setTotalCouponDiscount($totalCouponDiscount)
    {
        $this->totalCouponDiscount = $totalCouponDiscount;
        return $this;
    }

    /**
     * Gets as totalSale
     *
     * @return float
     */
    public function getTotalSale()
    {
        return $this->totalSale;
    }

    /**
     * Sets a new totalSale
     *
     * @param float $totalSale
     * @return self
     */
    public function setTotalSale($totalSale)
    {
        $this->totalSale = $totalSale;
        return $this;
    }

    /**
     * Gets as totalGross
     *
     * @return float
     */
    public function getTotalGross()
    {
        return $this->totalGross;
    }

    /**
     * Sets a new totalGross
     *
     * @param float $totalGross
     * @return self
     */
    public function setTotalGross($totalGross)
    {
        $this->totalGross = $totalGross;
        return $this;
    }

    /**
     * Gets as internalAuthBy
     *
     * @return \App\Soap\dealertrack\src\InternalAuthBy
     */
    public function getInternalAuthBy()
    {
        return $this->internalAuthBy;
    }

    /**
     * Sets a new internalAuthBy
     *
     * @param \App\Soap\dealertrack\src\InternalAuthBy $internalAuthBy
     * @return self
     */
    public function setInternalAuthBy(\App\Soap\dealertrack\src\InternalAuthBy $internalAuthBy)
    {
        $this->internalAuthBy = $internalAuthBy;
        return $this;
    }

    /**
     * Gets as tagNumber
     *
     * @return \App\Soap\dealertrack\src\TagNumber
     */
    public function getTagNumber()
    {
        return $this->tagNumber;
    }

    /**
     * Sets a new tagNumber
     *
     * @param \App\Soap\dealertrack\src\TagNumber $tagNumber
     * @return self
     */
    public function setTagNumber(\App\Soap\dealertrack\src\TagNumber $tagNumber)
    {
        $this->tagNumber = $tagNumber;
        return $this;
    }

    /**
     * Gets as dateTimeOfAppointment
     *
     * @return int
     */
    public function getDateTimeOfAppointment()
    {
        return $this->dateTimeOfAppointment;
    }

    /**
     * Sets a new dateTimeOfAppointment
     *
     * @param int $dateTimeOfAppointment
     * @return self
     */
    public function setDateTimeOfAppointment($dateTimeOfAppointment)
    {
        $this->dateTimeOfAppointment = $dateTimeOfAppointment;
        return $this;
    }

    /**
     * Gets as dateTimeLastLineComplete
     *
     * @return int
     */
    public function getDateTimeLastLineComplete()
    {
        return $this->dateTimeLastLineComplete;
    }

    /**
     * Sets a new dateTimeLastLineComplete
     *
     * @param int $dateTimeLastLineComplete
     * @return self
     */
    public function setDateTimeLastLineComplete($dateTimeLastLineComplete)
    {
        $this->dateTimeLastLineComplete = $dateTimeLastLineComplete;
        return $this;
    }

    /**
     * Gets as dateTimePreInvoiced
     *
     * @return int
     */
    public function getDateTimePreInvoiced()
    {
        return $this->dateTimePreInvoiced;
    }

    /**
     * Sets a new dateTimePreInvoiced
     *
     * @param int $dateTimePreInvoiced
     * @return self
     */
    public function setDateTimePreInvoiced($dateTimePreInvoiced)
    {
        $this->dateTimePreInvoiced = $dateTimePreInvoiced;
        return $this;
    }

    /**
     * Gets as towedInIndicator
     *
     * @return \App\Soap\dealertrack\src\TowedInIndicator
     */
    public function getTowedInIndicator()
    {
        return $this->towedInIndicator;
    }

    /**
     * Sets a new towedInIndicator
     *
     * @param \App\Soap\dealertrack\src\TowedInIndicator $towedInIndicator
     * @return self
     */
    public function setTowedInIndicator(\App\Soap\dealertrack\src\TowedInIndicator $towedInIndicator)
    {
        $this->towedInIndicator = $towedInIndicator;
        return $this;
    }

    /**
     * Adds as closedRepairOrderDetail
     *
     * @return self
     * @param \App\Soap\dealertrack\src\ClosedRepairOrderDetail $closedRepairOrderDetail
     */
    public function addToDetails(\App\Soap\dealertrack\src\ClosedRepairOrderDetail $closedRepairOrderDetail)
    {
        $this->details[] = $closedRepairOrderDetail;
        return $this;
    }

    /**
     * isset details
     *
     * @param int|string $index
     * @return bool
     */
    public function issetDetails($index)
    {
        return isset($this->details[$index]);
    }

    /**
     * unset details
     *
     * @param int|string $index
     * @return void
     */
    public function unsetDetails($index)
    {
        unset($this->details[$index]);
    }

    /**
     * Gets as details
     *
     * @return \App\Soap\dealertrack\src\ClosedRepairOrderDetail[]
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Sets a new details
     *
     * @param \App\Soap\dealertrack\src\ClosedRepairOrderDetail[] $details
     * @return self
     */
    public function setDetails(array $details)
    {
        $this->details = $details;
        return $this;
    }

    /**
     * Gets as fees
     *
     * @return \App\Soap\dealertrack\src\Fees
     */
    public function getFees()
    {
        return $this->fees;
    }

    /**
     * Sets a new fees
     *
     * @param \App\Soap\dealertrack\src\Fees $fees
     * @return self
     */
    public function setFees(\App\Soap\dealertrack\src\Fees $fees)
    {
        $this->fees = $fees;
        return $this;
    }


}


<?php

namespace App\Soap\dealertrack\src;

/**
 * Class representing Result
 */
class Result
{

    /**
     * @var string $companyNumber
     */
    private $companyNumber = null;

    /**
     * @var int $internalKey
     */
    private $internalKey = null;

    /**
     * @var \App\Soap\dealertrack\src\CounterPersonID $counterPersonID
     */
    private $counterPersonID = null;

    /**
     * @var \App\Soap\dealertrack\src\RecordStatus $recordStatus
     */
    private $recordStatus = null;

    /**
     * @var string $documentType
     */
    private $documentType = null;

    /**
     * @var int $transactionType
     */
    private $transactionType = null;

    /**
     * @var int $openTransactionDate
     */
    private $openTransactionDate = null;

    /**
     * @var int $repairOrderNumber
     */
    private $repairOrderNumber = null;

    /**
     * @var \App\Soap\dealertrack\src\CustomerNumber $customerNumber
     */
    private $customerNumber = null;

    /**
     * @var int $customerKey
     */
    private $customerKey = null;

    /**
     * @var string $customerName
     */
    private $customerName = null;

    /**
     * @var int $customerPhoneNumber
     */
    private $customerPhoneNumber = null;

    /**
     * @var string $customerAddress1
     */
    private $customerAddress1 = null;

    /**
     * @var \App\Soap\dealertrack\src\CustomerAddress2 $customerAddress2
     */
    private $customerAddress2 = null;

    /**
     * @var string $customerCity
     */
    private $customerCity = null;

    /**
     * @var string $customerState
     */
    private $customerState = null;

    /**
     * @var int $customerZipCode
     */
    private $customerZipCode = null;

    /**
     * @var string $customerEmail
     */
    private $customerEmail = null;

    /**
     * @var int $shipToKey
     */
    private $shipToKey = null;

    /**
     * @var \App\Soap\dealertrack\src\PaymentMethod $paymentMethod
     */
    private $paymentMethod = null;

    /**
     * @var \App\Soap\dealertrack\src\SaleType $saleType
     */
    private $saleType = null;

    /**
     * @var int $priceLevel
     */
    private $priceLevel = null;

    /**
     * @var \App\Soap\dealertrack\src\TaxExempt $taxExempt
     */
    private $taxExempt = null;

    /**
     * @var float $partsTotal
     */
    private $partsTotal = null;

    /**
     * @var float $shippingTotal
     */
    private $shippingTotal = null;

    /**
     * @var float $specialOrderDeposit
     */
    private $specialOrderDeposit = null;

    /**
     * @var float $specialOrderDepositCR
     */
    private $specialOrderDepositCR = null;

    /**
     * @var int $specialOrderDepositPercent
     */
    private $specialOrderDepositPercent = null;

    /**
     * @var \App\Soap\dealertrack\src\SpecialOrderDepositOverride $specialOrderDepositOverride
     */
    private $specialOrderDepositOverride = null;

    /**
     * @var \App\Soap\dealertrack\src\SpecialOrderOnHold $specialOrderOnHold
     */
    private $specialOrderOnHold = null;

    /**
     * @var float $partsSalesTax1
     */
    private $partsSalesTax1 = null;

    /**
     * @var float $partsSalesTax2
     */
    private $partsSalesTax2 = null;

    /**
     * @var float $partsSalesTax3
     */
    private $partsSalesTax3 = null;

    /**
     * @var float $partsSalesTax4
     */
    private $partsSalesTax4 = null;

    /**
     * @var \App\Soap\dealertrack\src\CounterPersonName $counterPersonName
     */
    private $counterPersonName = null;

    /**
     * @var int $sortKey
     */
    private $sortKey = null;

    /**
     * @var \App\Soap\dealertrack\src\AuthorizeCounterPersonID $authorizeCounterPersonID
     */
    private $authorizeCounterPersonID = null;

    /**
     * @var \App\Soap\dealertrack\src\CreditCardARCustomerNumber $creditCardARCustomerNumber
     */
    private $creditCardARCustomerNumber = null;

    /**
     * @var \App\Soap\dealertrack\src\PurchaseOrderNumber $purchaseOrderNumber
     */
    private $purchaseOrderNumber = null;

    /**
     * @var int $receiptNumber
     */
    private $receiptNumber = null;

    /**
     * @var \App\Soap\dealertrack\src\OriginalDocNumber $originalDocNumber
     */
    private $originalDocNumber = null;

    /**
     * @var \App\Soap\dealertrack\src\InternalAccountNumber $internalAccountNumber
     */
    private $internalAccountNumber = null;

    /**
     * @var \App\Soap\dealertrack\src\ROType $rOType
     */
    private $rOType = null;

    /**
     * @var int $rOStatus
     */
    private $rOStatus = null;

    /**
     * @var \App\Soap\dealertrack\src\WarrantyRO $warrantyRO
     */
    private $warrantyRO = null;

    /**
     * @var string $partsApproved
     */
    private $partsApproved = null;

    /**
     * @var \App\Soap\dealertrack\src\ServiceApproved $serviceApproved
     */
    private $serviceApproved = null;

    /**
     * @var string $serviceWriterID
     */
    private $serviceWriterID = null;

    /**
     * @var \App\Soap\dealertrack\src\ROTechnicianID $rOTechnicianID
     */
    private $rOTechnicianID = null;

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
     * @var string $vIN
     */
    private $vIN = null;

    /**
     * @var \App\Soap\dealertrack\src\StockNumber $stockNumber
     */
    private $stockNumber = null;

    /**
     * @var string $make
     */
    private $make = null;

    /**
     * @var string $model
     */
    private $model = null;

    /**
     * @var int $modelYear
     */
    private $modelYear = null;

    /**
     * @var \App\Soap\dealertrack\src\Truck $truck
     */
    private $truck = null;

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
     * @var int $timeIn
     */
    private $timeIn = null;

    /**
     * @var int $promisedDateTime
     */
    private $promisedDateTime = null;

    /**
     * @var float $remainingTime
     */
    private $remainingTime = null;

    /**
     * @var \App\Soap\dealertrack\src\TagNumber $tagNumber
     */
    private $tagNumber = null;

    /**
     * @var \App\Soap\dealertrack\src\CheckNumber $checkNumber
     */
    private $checkNumber = null;

    /**
     * @var \App\Soap\dealertrack\src\HeaderComments $headerComments
     */
    private $headerComments = null;

    /**
     * @var \App\Soap\dealertrack\src\ShopSupplyOverride $shopSupplyOverride
     */
    private $shopSupplyOverride = null;

    /**
     * @var \App\Soap\dealertrack\src\HazardousMaterialOverride $hazardousMaterialOverride
     */
    private $hazardousMaterialOverride = null;

    /**
     * @var float $laborTotal
     */
    private $laborTotal = null;

    /**
     * @var float $subletTotal
     */
    private $subletTotal = null;

    /**
     * @var float $sCDeductPaid
     */
    private $sCDeductPaid = null;

    /**
     * @var float $customerPayHazardousMaterial
     */
    private $customerPayHazardousMaterial = null;

    /**
     * @var float $customerPayTax1
     */
    private $customerPayTax1 = null;

    /**
     * @var float $customerPayTax2
     */
    private $customerPayTax2 = null;

    /**
     * @var float $customerPayTax3
     */
    private $customerPayTax3 = null;

    /**
     * @var float $customerPayTax4
     */
    private $customerPayTax4 = null;

    /**
     * @var float $warrantyTax1
     */
    private $warrantyTax1 = null;

    /**
     * @var float $warrantyTax2
     */
    private $warrantyTax2 = null;

    /**
     * @var float $warrantyTax3
     */
    private $warrantyTax3 = null;

    /**
     * @var float $warrantyTax4
     */
    private $warrantyTax4 = null;

    /**
     * @var float $internalTax1
     */
    private $internalTax1 = null;

    /**
     * @var float $internalTax2
     */
    private $internalTax2 = null;

    /**
     * @var float $internalTax3
     */
    private $internalTax3 = null;

    /**
     * @var float $internalTax4
     */
    private $internalTax4 = null;

    /**
     * @var float $serviceContractTax1
     */
    private $serviceContractTax1 = null;

    /**
     * @var float $serviceContractTax2
     */
    private $serviceContractTax2 = null;

    /**
     * @var float $serviceContractTax3
     */
    private $serviceContractTax3 = null;

    /**
     * @var float $serviceContractTax4
     */
    private $serviceContractTax4 = null;

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
     * @var float $paidByManufacturer
     */
    private $paidByManufacturer = null;

    /**
     * @var float $paidByDealer
     */
    private $paidByDealer = null;

    /**
     * @var float $customerPayTotalDue
     */
    private $customerPayTotalDue = null;

    /**
     * @var \App\Soap\dealertrack\src\OrderStatus $orderStatus
     */
    private $orderStatus = null;

    /**
     * @var int $dateToArrive
     */
    private $dateToArrive = null;

    /**
     * @var int $aRCustomerKey
     */
    private $aRCustomerKey = null;

    /**
     * @var int $warrantyRONumber
     */
    private $warrantyRONumber = null;

    /**
     * @var \App\Soap\dealertrack\src\WorkStationID $workStationID
     */
    private $workStationID = null;

    /**
     * @var \App\Soap\dealertrack\src\InternalAuthorizedBy $internalAuthorizedBy
     */
    private $internalAuthorizedBy = null;

    /**
     * @var int $appointmentDateTime
     */
    private $appointmentDateTime = null;

    /**
     * @var int $dateTimeLastLineComplete
     */
    private $dateTimeLastLineComplete = null;

    /**
     * @var int $dateTimePreInvoiced
     */
    private $dateTimePreInvoiced = null;

    /**
     * @var \App\Soap\dealertrack\src\InternalPayType $internalPayType
     */
    private $internalPayType = null;

    /**
     * @var \App\Soap\dealertrack\src\RepairOrderPriority $repairOrderPriority
     */
    private $repairOrderPriority = null;

    /**
     * @var int $dailyRentalAgreementNumber
     */
    private $dailyRentalAgreementNumber = null;

    /**
     * @var \App\Soap\dealertrack\src\TowedInIndicator $towedInIndicator
     */
    private $towedInIndicator = null;

    /**
     * @var \App\Soap\dealertrack\src\AppointmentId $appointmentId
     */
    private $appointmentId = null;

    /**
     * @var \App\Soap\dealertrack\src\OpenRepairOrderDetail[] $details
     */
    private $details = null;

    /**
     * @var string $lastModified
     */
    private $lastModified = null;

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
     * Gets as internalKey
     *
     * @return int
     */
    public function getInternalKey()
    {
        return $this->internalKey;
    }

    /**
     * Sets a new internalKey
     *
     * @param int $internalKey
     * @return self
     */
    public function setInternalKey($internalKey)
    {
        $this->internalKey = $internalKey;
        return $this;
    }

    /**
     * Gets as counterPersonID
     *
     * @return \App\Soap\dealertrack\src\CounterPersonID
     */
    public function getCounterPersonID()
    {
        return $this->counterPersonID;
    }

    /**
     * Sets a new counterPersonID
     *
     * @param \App\Soap\dealertrack\src\CounterPersonID $counterPersonID
     * @return self
     */
    public function setCounterPersonID(\App\Soap\dealertrack\src\CounterPersonID $counterPersonID)
    {
        $this->counterPersonID = $counterPersonID;
        return $this;
    }

    /**
     * Gets as recordStatus
     *
     * @return \App\Soap\dealertrack\src\RecordStatus
     */
    public function getRecordStatus()
    {
        return $this->recordStatus;
    }

    /**
     * Sets a new recordStatus
     *
     * @param \App\Soap\dealertrack\src\RecordStatus $recordStatus
     * @return self
     */
    public function setRecordStatus(\App\Soap\dealertrack\src\RecordStatus $recordStatus)
    {
        $this->recordStatus = $recordStatus;
        return $this;
    }

    /**
     * Gets as documentType
     *
     * @return string
     */
    public function getDocumentType()
    {
        return $this->documentType;
    }

    /**
     * Sets a new documentType
     *
     * @param string $documentType
     * @return self
     */
    public function setDocumentType($documentType)
    {
        $this->documentType = $documentType;
        return $this;
    }

    /**
     * Gets as transactionType
     *
     * @return int
     */
    public function getTransactionType()
    {
        return $this->transactionType;
    }

    /**
     * Sets a new transactionType
     *
     * @param int $transactionType
     * @return self
     */
    public function setTransactionType($transactionType)
    {
        $this->transactionType = $transactionType;
        return $this;
    }

    /**
     * Gets as openTransactionDate
     *
     * @return int
     */
    public function getOpenTransactionDate()
    {
        return $this->openTransactionDate;
    }

    /**
     * Sets a new openTransactionDate
     *
     * @param int $openTransactionDate
     * @return self
     */
    public function setOpenTransactionDate($openTransactionDate)
    {
        $this->openTransactionDate = $openTransactionDate;
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
     * Gets as customerNumber
     *
     * @return \App\Soap\dealertrack\src\CustomerNumber
     */
    public function getCustomerNumber()
    {
        return $this->customerNumber;
    }

    /**
     * Sets a new customerNumber
     *
     * @param \App\Soap\dealertrack\src\CustomerNumber $customerNumber
     * @return self
     */
    public function setCustomerNumber(\App\Soap\dealertrack\src\CustomerNumber $customerNumber)
    {
        $this->customerNumber = $customerNumber;
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
     * Gets as customerPhoneNumber
     *
     * @return int
     */
    public function getCustomerPhoneNumber()
    {
        return $this->customerPhoneNumber;
    }

    /**
     * Sets a new customerPhoneNumber
     *
     * @param int $customerPhoneNumber
     * @return self
     */
    public function setCustomerPhoneNumber($customerPhoneNumber)
    {
        $this->customerPhoneNumber = $customerPhoneNumber;
        return $this;
    }

    /**
     * Gets as customerAddress1
     *
     * @return string
     */
    public function getCustomerAddress1()
    {
        return $this->customerAddress1;
    }

    /**
     * Sets a new customerAddress1
     *
     * @param string $customerAddress1
     * @return self
     */
    public function setCustomerAddress1($customerAddress1)
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
     * @return string
     */
    public function getCustomerCity()
    {
        return $this->customerCity;
    }

    /**
     * Sets a new customerCity
     *
     * @param string $customerCity
     * @return self
     */
    public function setCustomerCity($customerCity)
    {
        $this->customerCity = $customerCity;
        return $this;
    }

    /**
     * Gets as customerState
     *
     * @return string
     */
    public function getCustomerState()
    {
        return $this->customerState;
    }

    /**
     * Sets a new customerState
     *
     * @param string $customerState
     * @return self
     */
    public function setCustomerState($customerState)
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
     * Gets as customerEmail
     *
     * @return string
     */
    public function getCustomerEmail()
    {
        return $this->customerEmail;
    }

    /**
     * Sets a new customerEmail
     *
     * @param string $customerEmail
     * @return self
     */
    public function setCustomerEmail($customerEmail)
    {
        $this->customerEmail = $customerEmail;
        return $this;
    }

    /**
     * Gets as shipToKey
     *
     * @return int
     */
    public function getShipToKey()
    {
        return $this->shipToKey;
    }

    /**
     * Sets a new shipToKey
     *
     * @param int $shipToKey
     * @return self
     */
    public function setShipToKey($shipToKey)
    {
        $this->shipToKey = $shipToKey;
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
     * Gets as saleType
     *
     * @return \App\Soap\dealertrack\src\SaleType
     */
    public function getSaleType()
    {
        return $this->saleType;
    }

    /**
     * Sets a new saleType
     *
     * @param \App\Soap\dealertrack\src\SaleType $saleType
     * @return self
     */
    public function setSaleType(\App\Soap\dealertrack\src\SaleType $saleType)
    {
        $this->saleType = $saleType;
        return $this;
    }

    /**
     * Gets as priceLevel
     *
     * @return int
     */
    public function getPriceLevel()
    {
        return $this->priceLevel;
    }

    /**
     * Sets a new priceLevel
     *
     * @param int $priceLevel
     * @return self
     */
    public function setPriceLevel($priceLevel)
    {
        $this->priceLevel = $priceLevel;
        return $this;
    }

    /**
     * Gets as taxExempt
     *
     * @return \App\Soap\dealertrack\src\TaxExempt
     */
    public function getTaxExempt()
    {
        return $this->taxExempt;
    }

    /**
     * Sets a new taxExempt
     *
     * @param \App\Soap\dealertrack\src\TaxExempt $taxExempt
     * @return self
     */
    public function setTaxExempt(\App\Soap\dealertrack\src\TaxExempt $taxExempt)
    {
        $this->taxExempt = $taxExempt;
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
     * Gets as shippingTotal
     *
     * @return float
     */
    public function getShippingTotal()
    {
        return $this->shippingTotal;
    }

    /**
     * Sets a new shippingTotal
     *
     * @param float $shippingTotal
     * @return self
     */
    public function setShippingTotal($shippingTotal)
    {
        $this->shippingTotal = $shippingTotal;
        return $this;
    }

    /**
     * Gets as specialOrderDeposit
     *
     * @return float
     */
    public function getSpecialOrderDeposit()
    {
        return $this->specialOrderDeposit;
    }

    /**
     * Sets a new specialOrderDeposit
     *
     * @param float $specialOrderDeposit
     * @return self
     */
    public function setSpecialOrderDeposit($specialOrderDeposit)
    {
        $this->specialOrderDeposit = $specialOrderDeposit;
        return $this;
    }

    /**
     * Gets as specialOrderDepositCR
     *
     * @return float
     */
    public function getSpecialOrderDepositCR()
    {
        return $this->specialOrderDepositCR;
    }

    /**
     * Sets a new specialOrderDepositCR
     *
     * @param float $specialOrderDepositCR
     * @return self
     */
    public function setSpecialOrderDepositCR($specialOrderDepositCR)
    {
        $this->specialOrderDepositCR = $specialOrderDepositCR;
        return $this;
    }

    /**
     * Gets as specialOrderDepositPercent
     *
     * @return int
     */
    public function getSpecialOrderDepositPercent()
    {
        return $this->specialOrderDepositPercent;
    }

    /**
     * Sets a new specialOrderDepositPercent
     *
     * @param int $specialOrderDepositPercent
     * @return self
     */
    public function setSpecialOrderDepositPercent($specialOrderDepositPercent)
    {
        $this->specialOrderDepositPercent = $specialOrderDepositPercent;
        return $this;
    }

    /**
     * Gets as specialOrderDepositOverride
     *
     * @return \App\Soap\dealertrack\src\SpecialOrderDepositOverride
     */
    public function getSpecialOrderDepositOverride()
    {
        return $this->specialOrderDepositOverride;
    }

    /**
     * Sets a new specialOrderDepositOverride
     *
     * @param \App\Soap\dealertrack\src\SpecialOrderDepositOverride $specialOrderDepositOverride
     * @return self
     */
    public function setSpecialOrderDepositOverride(\App\Soap\dealertrack\src\SpecialOrderDepositOverride $specialOrderDepositOverride)
    {
        $this->specialOrderDepositOverride = $specialOrderDepositOverride;
        return $this;
    }

    /**
     * Gets as specialOrderOnHold
     *
     * @return \App\Soap\dealertrack\src\SpecialOrderOnHold
     */
    public function getSpecialOrderOnHold()
    {
        return $this->specialOrderOnHold;
    }

    /**
     * Sets a new specialOrderOnHold
     *
     * @param \App\Soap\dealertrack\src\SpecialOrderOnHold $specialOrderOnHold
     * @return self
     */
    public function setSpecialOrderOnHold(\App\Soap\dealertrack\src\SpecialOrderOnHold $specialOrderOnHold)
    {
        $this->specialOrderOnHold = $specialOrderOnHold;
        return $this;
    }

    /**
     * Gets as partsSalesTax1
     *
     * @return float
     */
    public function getPartsSalesTax1()
    {
        return $this->partsSalesTax1;
    }

    /**
     * Sets a new partsSalesTax1
     *
     * @param float $partsSalesTax1
     * @return self
     */
    public function setPartsSalesTax1($partsSalesTax1)
    {
        $this->partsSalesTax1 = $partsSalesTax1;
        return $this;
    }

    /**
     * Gets as partsSalesTax2
     *
     * @return float
     */
    public function getPartsSalesTax2()
    {
        return $this->partsSalesTax2;
    }

    /**
     * Sets a new partsSalesTax2
     *
     * @param float $partsSalesTax2
     * @return self
     */
    public function setPartsSalesTax2($partsSalesTax2)
    {
        $this->partsSalesTax2 = $partsSalesTax2;
        return $this;
    }

    /**
     * Gets as partsSalesTax3
     *
     * @return float
     */
    public function getPartsSalesTax3()
    {
        return $this->partsSalesTax3;
    }

    /**
     * Sets a new partsSalesTax3
     *
     * @param float $partsSalesTax3
     * @return self
     */
    public function setPartsSalesTax3($partsSalesTax3)
    {
        $this->partsSalesTax3 = $partsSalesTax3;
        return $this;
    }

    /**
     * Gets as partsSalesTax4
     *
     * @return float
     */
    public function getPartsSalesTax4()
    {
        return $this->partsSalesTax4;
    }

    /**
     * Sets a new partsSalesTax4
     *
     * @param float $partsSalesTax4
     * @return self
     */
    public function setPartsSalesTax4($partsSalesTax4)
    {
        $this->partsSalesTax4 = $partsSalesTax4;
        return $this;
    }

    /**
     * Gets as counterPersonName
     *
     * @return \App\Soap\dealertrack\src\CounterPersonName
     */
    public function getCounterPersonName()
    {
        return $this->counterPersonName;
    }

    /**
     * Sets a new counterPersonName
     *
     * @param \App\Soap\dealertrack\src\CounterPersonName $counterPersonName
     * @return self
     */
    public function setCounterPersonName(\App\Soap\dealertrack\src\CounterPersonName $counterPersonName)
    {
        $this->counterPersonName = $counterPersonName;
        return $this;
    }

    /**
     * Gets as sortKey
     *
     * @return int
     */
    public function getSortKey()
    {
        return $this->sortKey;
    }

    /**
     * Sets a new sortKey
     *
     * @param int $sortKey
     * @return self
     */
    public function setSortKey($sortKey)
    {
        $this->sortKey = $sortKey;
        return $this;
    }

    /**
     * Gets as authorizeCounterPersonID
     *
     * @return \App\Soap\dealertrack\src\AuthorizeCounterPersonID
     */
    public function getAuthorizeCounterPersonID()
    {
        return $this->authorizeCounterPersonID;
    }

    /**
     * Sets a new authorizeCounterPersonID
     *
     * @param \App\Soap\dealertrack\src\AuthorizeCounterPersonID $authorizeCounterPersonID
     * @return self
     */
    public function setAuthorizeCounterPersonID(\App\Soap\dealertrack\src\AuthorizeCounterPersonID $authorizeCounterPersonID)
    {
        $this->authorizeCounterPersonID = $authorizeCounterPersonID;
        return $this;
    }

    /**
     * Gets as creditCardARCustomerNumber
     *
     * @return \App\Soap\dealertrack\src\CreditCardARCustomerNumber
     */
    public function getCreditCardARCustomerNumber()
    {
        return $this->creditCardARCustomerNumber;
    }

    /**
     * Sets a new creditCardARCustomerNumber
     *
     * @param \App\Soap\dealertrack\src\CreditCardARCustomerNumber $creditCardARCustomerNumber
     * @return self
     */
    public function setCreditCardARCustomerNumber(\App\Soap\dealertrack\src\CreditCardARCustomerNumber $creditCardARCustomerNumber)
    {
        $this->creditCardARCustomerNumber = $creditCardARCustomerNumber;
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
     * Gets as originalDocNumber
     *
     * @return \App\Soap\dealertrack\src\OriginalDocNumber
     */
    public function getOriginalDocNumber()
    {
        return $this->originalDocNumber;
    }

    /**
     * Sets a new originalDocNumber
     *
     * @param \App\Soap\dealertrack\src\OriginalDocNumber $originalDocNumber
     * @return self
     */
    public function setOriginalDocNumber(\App\Soap\dealertrack\src\OriginalDocNumber $originalDocNumber)
    {
        $this->originalDocNumber = $originalDocNumber;
        return $this;
    }

    /**
     * Gets as internalAccountNumber
     *
     * @return \App\Soap\dealertrack\src\InternalAccountNumber
     */
    public function getInternalAccountNumber()
    {
        return $this->internalAccountNumber;
    }

    /**
     * Sets a new internalAccountNumber
     *
     * @param \App\Soap\dealertrack\src\InternalAccountNumber $internalAccountNumber
     * @return self
     */
    public function setInternalAccountNumber(\App\Soap\dealertrack\src\InternalAccountNumber $internalAccountNumber)
    {
        $this->internalAccountNumber = $internalAccountNumber;
        return $this;
    }

    /**
     * Gets as rOType
     *
     * @return \App\Soap\dealertrack\src\ROType
     */
    public function getROType()
    {
        return $this->rOType;
    }

    /**
     * Sets a new rOType
     *
     * @param \App\Soap\dealertrack\src\ROType $rOType
     * @return self
     */
    public function setROType(\App\Soap\dealertrack\src\ROType $rOType)
    {
        $this->rOType = $rOType;
        return $this;
    }

    /**
     * Gets as rOStatus
     *
     * @return int
     */
    public function getROStatus()
    {
        return $this->rOStatus;
    }

    /**
     * Sets a new rOStatus
     *
     * @param int $rOStatus
     * @return self
     */
    public function setROStatus($rOStatus)
    {
        $this->rOStatus = $rOStatus;
        return $this;
    }

    /**
     * Gets as warrantyRO
     *
     * @return \App\Soap\dealertrack\src\WarrantyRO
     */
    public function getWarrantyRO()
    {
        return $this->warrantyRO;
    }

    /**
     * Sets a new warrantyRO
     *
     * @param \App\Soap\dealertrack\src\WarrantyRO $warrantyRO
     * @return self
     */
    public function setWarrantyRO(\App\Soap\dealertrack\src\WarrantyRO $warrantyRO)
    {
        $this->warrantyRO = $warrantyRO;
        return $this;
    }

    /**
     * Gets as partsApproved
     *
     * @return string
     */
    public function getPartsApproved()
    {
        return $this->partsApproved;
    }

    /**
     * Sets a new partsApproved
     *
     * @param string $partsApproved
     * @return self
     */
    public function setPartsApproved($partsApproved)
    {
        $this->partsApproved = $partsApproved;
        return $this;
    }

    /**
     * Gets as serviceApproved
     *
     * @return \App\Soap\dealertrack\src\ServiceApproved
     */
    public function getServiceApproved()
    {
        return $this->serviceApproved;
    }

    /**
     * Sets a new serviceApproved
     *
     * @param \App\Soap\dealertrack\src\ServiceApproved $serviceApproved
     * @return self
     */
    public function setServiceApproved(\App\Soap\dealertrack\src\ServiceApproved $serviceApproved)
    {
        $this->serviceApproved = $serviceApproved;
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
     * @return \App\Soap\dealertrack\src\ROTechnicianID
     */
    public function getROTechnicianID()
    {
        return $this->rOTechnicianID;
    }

    /**
     * Sets a new rOTechnicianID
     *
     * @param \App\Soap\dealertrack\src\ROTechnicianID $rOTechnicianID
     * @return self
     */
    public function setROTechnicianID(\App\Soap\dealertrack\src\ROTechnicianID $rOTechnicianID)
    {
        $this->rOTechnicianID = $rOTechnicianID;
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
     * Gets as stockNumber
     *
     * @return \App\Soap\dealertrack\src\StockNumber
     */
    public function getStockNumber()
    {
        return $this->stockNumber;
    }

    /**
     * Sets a new stockNumber
     *
     * @param \App\Soap\dealertrack\src\StockNumber $stockNumber
     * @return self
     */
    public function setStockNumber(\App\Soap\dealertrack\src\StockNumber $stockNumber)
    {
        $this->stockNumber = $stockNumber;
        return $this;
    }

    /**
     * Gets as make
     *
     * @return string
     */
    public function getMake()
    {
        return $this->make;
    }

    /**
     * Sets a new make
     *
     * @param string $make
     * @return self
     */
    public function setMake($make)
    {
        $this->make = $make;
        return $this;
    }

    /**
     * Gets as model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Sets a new model
     *
     * @param string $model
     * @return self
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * Gets as modelYear
     *
     * @return int
     */
    public function getModelYear()
    {
        return $this->modelYear;
    }

    /**
     * Sets a new modelYear
     *
     * @param int $modelYear
     * @return self
     */
    public function setModelYear($modelYear)
    {
        $this->modelYear = $modelYear;
        return $this;
    }

    /**
     * Gets as truck
     *
     * @return \App\Soap\dealertrack\src\Truck
     */
    public function getTruck()
    {
        return $this->truck;
    }

    /**
     * Sets a new truck
     *
     * @param \App\Soap\dealertrack\src\Truck $truck
     * @return self
     */
    public function setTruck(\App\Soap\dealertrack\src\Truck $truck)
    {
        $this->truck = $truck;
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
     * Gets as timeIn
     *
     * @return int
     */
    public function getTimeIn()
    {
        return $this->timeIn;
    }

    /**
     * Sets a new timeIn
     *
     * @param int $timeIn
     * @return self
     */
    public function setTimeIn($timeIn)
    {
        $this->timeIn = $timeIn;
        return $this;
    }

    /**
     * Gets as promisedDateTime
     *
     * @return int
     */
    public function getPromisedDateTime()
    {
        return $this->promisedDateTime;
    }

    /**
     * Sets a new promisedDateTime
     *
     * @param int $promisedDateTime
     * @return self
     */
    public function setPromisedDateTime($promisedDateTime)
    {
        $this->promisedDateTime = $promisedDateTime;
        return $this;
    }

    /**
     * Gets as remainingTime
     *
     * @return float
     */
    public function getRemainingTime()
    {
        return $this->remainingTime;
    }

    /**
     * Sets a new remainingTime
     *
     * @param float $remainingTime
     * @return self
     */
    public function setRemainingTime($remainingTime)
    {
        $this->remainingTime = $remainingTime;
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
     * Gets as headerComments
     *
     * @return \App\Soap\dealertrack\src\HeaderComments
     */
    public function getHeaderComments()
    {
        return $this->headerComments;
    }

    /**
     * Sets a new headerComments
     *
     * @param \App\Soap\dealertrack\src\HeaderComments $headerComments
     * @return self
     */
    public function setHeaderComments(\App\Soap\dealertrack\src\HeaderComments $headerComments)
    {
        $this->headerComments = $headerComments;
        return $this;
    }

    /**
     * Gets as shopSupplyOverride
     *
     * @return \App\Soap\dealertrack\src\ShopSupplyOverride
     */
    public function getShopSupplyOverride()
    {
        return $this->shopSupplyOverride;
    }

    /**
     * Sets a new shopSupplyOverride
     *
     * @param \App\Soap\dealertrack\src\ShopSupplyOverride $shopSupplyOverride
     * @return self
     */
    public function setShopSupplyOverride(\App\Soap\dealertrack\src\ShopSupplyOverride $shopSupplyOverride)
    {
        $this->shopSupplyOverride = $shopSupplyOverride;
        return $this;
    }

    /**
     * Gets as hazardousMaterialOverride
     *
     * @return \App\Soap\dealertrack\src\HazardousMaterialOverride
     */
    public function getHazardousMaterialOverride()
    {
        return $this->hazardousMaterialOverride;
    }

    /**
     * Sets a new hazardousMaterialOverride
     *
     * @param \App\Soap\dealertrack\src\HazardousMaterialOverride $hazardousMaterialOverride
     * @return self
     */
    public function setHazardousMaterialOverride(\App\Soap\dealertrack\src\HazardousMaterialOverride $hazardousMaterialOverride)
    {
        $this->hazardousMaterialOverride = $hazardousMaterialOverride;
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
     * Gets as sCDeductPaid
     *
     * @return float
     */
    public function getSCDeductPaid()
    {
        return $this->sCDeductPaid;
    }

    /**
     * Sets a new sCDeductPaid
     *
     * @param float $sCDeductPaid
     * @return self
     */
    public function setSCDeductPaid($sCDeductPaid)
    {
        $this->sCDeductPaid = $sCDeductPaid;
        return $this;
    }

    /**
     * Gets as customerPayHazardousMaterial
     *
     * @return float
     */
    public function getCustomerPayHazardousMaterial()
    {
        return $this->customerPayHazardousMaterial;
    }

    /**
     * Sets a new customerPayHazardousMaterial
     *
     * @param float $customerPayHazardousMaterial
     * @return self
     */
    public function setCustomerPayHazardousMaterial($customerPayHazardousMaterial)
    {
        $this->customerPayHazardousMaterial = $customerPayHazardousMaterial;
        return $this;
    }

    /**
     * Gets as customerPayTax1
     *
     * @return float
     */
    public function getCustomerPayTax1()
    {
        return $this->customerPayTax1;
    }

    /**
     * Sets a new customerPayTax1
     *
     * @param float $customerPayTax1
     * @return self
     */
    public function setCustomerPayTax1($customerPayTax1)
    {
        $this->customerPayTax1 = $customerPayTax1;
        return $this;
    }

    /**
     * Gets as customerPayTax2
     *
     * @return float
     */
    public function getCustomerPayTax2()
    {
        return $this->customerPayTax2;
    }

    /**
     * Sets a new customerPayTax2
     *
     * @param float $customerPayTax2
     * @return self
     */
    public function setCustomerPayTax2($customerPayTax2)
    {
        $this->customerPayTax2 = $customerPayTax2;
        return $this;
    }

    /**
     * Gets as customerPayTax3
     *
     * @return float
     */
    public function getCustomerPayTax3()
    {
        return $this->customerPayTax3;
    }

    /**
     * Sets a new customerPayTax3
     *
     * @param float $customerPayTax3
     * @return self
     */
    public function setCustomerPayTax3($customerPayTax3)
    {
        $this->customerPayTax3 = $customerPayTax3;
        return $this;
    }

    /**
     * Gets as customerPayTax4
     *
     * @return float
     */
    public function getCustomerPayTax4()
    {
        return $this->customerPayTax4;
    }

    /**
     * Sets a new customerPayTax4
     *
     * @param float $customerPayTax4
     * @return self
     */
    public function setCustomerPayTax4($customerPayTax4)
    {
        $this->customerPayTax4 = $customerPayTax4;
        return $this;
    }

    /**
     * Gets as warrantyTax1
     *
     * @return float
     */
    public function getWarrantyTax1()
    {
        return $this->warrantyTax1;
    }

    /**
     * Sets a new warrantyTax1
     *
     * @param float $warrantyTax1
     * @return self
     */
    public function setWarrantyTax1($warrantyTax1)
    {
        $this->warrantyTax1 = $warrantyTax1;
        return $this;
    }

    /**
     * Gets as warrantyTax2
     *
     * @return float
     */
    public function getWarrantyTax2()
    {
        return $this->warrantyTax2;
    }

    /**
     * Sets a new warrantyTax2
     *
     * @param float $warrantyTax2
     * @return self
     */
    public function setWarrantyTax2($warrantyTax2)
    {
        $this->warrantyTax2 = $warrantyTax2;
        return $this;
    }

    /**
     * Gets as warrantyTax3
     *
     * @return float
     */
    public function getWarrantyTax3()
    {
        return $this->warrantyTax3;
    }

    /**
     * Sets a new warrantyTax3
     *
     * @param float $warrantyTax3
     * @return self
     */
    public function setWarrantyTax3($warrantyTax3)
    {
        $this->warrantyTax3 = $warrantyTax3;
        return $this;
    }

    /**
     * Gets as warrantyTax4
     *
     * @return float
     */
    public function getWarrantyTax4()
    {
        return $this->warrantyTax4;
    }

    /**
     * Sets a new warrantyTax4
     *
     * @param float $warrantyTax4
     * @return self
     */
    public function setWarrantyTax4($warrantyTax4)
    {
        $this->warrantyTax4 = $warrantyTax4;
        return $this;
    }

    /**
     * Gets as internalTax1
     *
     * @return float
     */
    public function getInternalTax1()
    {
        return $this->internalTax1;
    }

    /**
     * Sets a new internalTax1
     *
     * @param float $internalTax1
     * @return self
     */
    public function setInternalTax1($internalTax1)
    {
        $this->internalTax1 = $internalTax1;
        return $this;
    }

    /**
     * Gets as internalTax2
     *
     * @return float
     */
    public function getInternalTax2()
    {
        return $this->internalTax2;
    }

    /**
     * Sets a new internalTax2
     *
     * @param float $internalTax2
     * @return self
     */
    public function setInternalTax2($internalTax2)
    {
        $this->internalTax2 = $internalTax2;
        return $this;
    }

    /**
     * Gets as internalTax3
     *
     * @return float
     */
    public function getInternalTax3()
    {
        return $this->internalTax3;
    }

    /**
     * Sets a new internalTax3
     *
     * @param float $internalTax3
     * @return self
     */
    public function setInternalTax3($internalTax3)
    {
        $this->internalTax3 = $internalTax3;
        return $this;
    }

    /**
     * Gets as internalTax4
     *
     * @return float
     */
    public function getInternalTax4()
    {
        return $this->internalTax4;
    }

    /**
     * Sets a new internalTax4
     *
     * @param float $internalTax4
     * @return self
     */
    public function setInternalTax4($internalTax4)
    {
        $this->internalTax4 = $internalTax4;
        return $this;
    }

    /**
     * Gets as serviceContractTax1
     *
     * @return float
     */
    public function getServiceContractTax1()
    {
        return $this->serviceContractTax1;
    }

    /**
     * Sets a new serviceContractTax1
     *
     * @param float $serviceContractTax1
     * @return self
     */
    public function setServiceContractTax1($serviceContractTax1)
    {
        $this->serviceContractTax1 = $serviceContractTax1;
        return $this;
    }

    /**
     * Gets as serviceContractTax2
     *
     * @return float
     */
    public function getServiceContractTax2()
    {
        return $this->serviceContractTax2;
    }

    /**
     * Sets a new serviceContractTax2
     *
     * @param float $serviceContractTax2
     * @return self
     */
    public function setServiceContractTax2($serviceContractTax2)
    {
        $this->serviceContractTax2 = $serviceContractTax2;
        return $this;
    }

    /**
     * Gets as serviceContractTax3
     *
     * @return float
     */
    public function getServiceContractTax3()
    {
        return $this->serviceContractTax3;
    }

    /**
     * Sets a new serviceContractTax3
     *
     * @param float $serviceContractTax3
     * @return self
     */
    public function setServiceContractTax3($serviceContractTax3)
    {
        $this->serviceContractTax3 = $serviceContractTax3;
        return $this;
    }

    /**
     * Gets as serviceContractTax4
     *
     * @return float
     */
    public function getServiceContractTax4()
    {
        return $this->serviceContractTax4;
    }

    /**
     * Sets a new serviceContractTax4
     *
     * @param float $serviceContractTax4
     * @return self
     */
    public function setServiceContractTax4($serviceContractTax4)
    {
        $this->serviceContractTax4 = $serviceContractTax4;
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
     * Gets as paidByManufacturer
     *
     * @return float
     */
    public function getPaidByManufacturer()
    {
        return $this->paidByManufacturer;
    }

    /**
     * Sets a new paidByManufacturer
     *
     * @param float $paidByManufacturer
     * @return self
     */
    public function setPaidByManufacturer($paidByManufacturer)
    {
        $this->paidByManufacturer = $paidByManufacturer;
        return $this;
    }

    /**
     * Gets as paidByDealer
     *
     * @return float
     */
    public function getPaidByDealer()
    {
        return $this->paidByDealer;
    }

    /**
     * Sets a new paidByDealer
     *
     * @param float $paidByDealer
     * @return self
     */
    public function setPaidByDealer($paidByDealer)
    {
        $this->paidByDealer = $paidByDealer;
        return $this;
    }

    /**
     * Gets as customerPayTotalDue
     *
     * @return float
     */
    public function getCustomerPayTotalDue()
    {
        return $this->customerPayTotalDue;
    }

    /**
     * Sets a new customerPayTotalDue
     *
     * @param float $customerPayTotalDue
     * @return self
     */
    public function setCustomerPayTotalDue($customerPayTotalDue)
    {
        $this->customerPayTotalDue = $customerPayTotalDue;
        return $this;
    }

    /**
     * Gets as orderStatus
     *
     * @return \App\Soap\dealertrack\src\OrderStatus
     */
    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    /**
     * Sets a new orderStatus
     *
     * @param \App\Soap\dealertrack\src\OrderStatus $orderStatus
     * @return self
     */
    public function setOrderStatus(\App\Soap\dealertrack\src\OrderStatus $orderStatus)
    {
        $this->orderStatus = $orderStatus;
        return $this;
    }

    /**
     * Gets as dateToArrive
     *
     * @return int
     */
    public function getDateToArrive()
    {
        return $this->dateToArrive;
    }

    /**
     * Sets a new dateToArrive
     *
     * @param int $dateToArrive
     * @return self
     */
    public function setDateToArrive($dateToArrive)
    {
        $this->dateToArrive = $dateToArrive;
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
     * Gets as workStationID
     *
     * @return \App\Soap\dealertrack\src\WorkStationID
     */
    public function getWorkStationID()
    {
        return $this->workStationID;
    }

    /**
     * Sets a new workStationID
     *
     * @param \App\Soap\dealertrack\src\WorkStationID $workStationID
     * @return self
     */
    public function setWorkStationID(\App\Soap\dealertrack\src\WorkStationID $workStationID)
    {
        $this->workStationID = $workStationID;
        return $this;
    }

    /**
     * Gets as internalAuthorizedBy
     *
     * @return \App\Soap\dealertrack\src\InternalAuthorizedBy
     */
    public function getInternalAuthorizedBy()
    {
        return $this->internalAuthorizedBy;
    }

    /**
     * Sets a new internalAuthorizedBy
     *
     * @param \App\Soap\dealertrack\src\InternalAuthorizedBy $internalAuthorizedBy
     * @return self
     */
    public function setInternalAuthorizedBy(\App\Soap\dealertrack\src\InternalAuthorizedBy $internalAuthorizedBy)
    {
        $this->internalAuthorizedBy = $internalAuthorizedBy;
        return $this;
    }

    /**
     * Gets as appointmentDateTime
     *
     * @return int
     */
    public function getAppointmentDateTime()
    {
        return $this->appointmentDateTime;
    }

    /**
     * Sets a new appointmentDateTime
     *
     * @param int $appointmentDateTime
     * @return self
     */
    public function setAppointmentDateTime($appointmentDateTime)
    {
        $this->appointmentDateTime = $appointmentDateTime;
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
     * Gets as internalPayType
     *
     * @return \App\Soap\dealertrack\src\InternalPayType
     */
    public function getInternalPayType()
    {
        return $this->internalPayType;
    }

    /**
     * Sets a new internalPayType
     *
     * @param \App\Soap\dealertrack\src\InternalPayType $internalPayType
     * @return self
     */
    public function setInternalPayType(\App\Soap\dealertrack\src\InternalPayType $internalPayType)
    {
        $this->internalPayType = $internalPayType;
        return $this;
    }

    /**
     * Gets as repairOrderPriority
     *
     * @return \App\Soap\dealertrack\src\RepairOrderPriority
     */
    public function getRepairOrderPriority()
    {
        return $this->repairOrderPriority;
    }

    /**
     * Sets a new repairOrderPriority
     *
     * @param \App\Soap\dealertrack\src\RepairOrderPriority $repairOrderPriority
     * @return self
     */
    public function setRepairOrderPriority(\App\Soap\dealertrack\src\RepairOrderPriority $repairOrderPriority)
    {
        $this->repairOrderPriority = $repairOrderPriority;
        return $this;
    }

    /**
     * Gets as dailyRentalAgreementNumber
     *
     * @return int
     */
    public function getDailyRentalAgreementNumber()
    {
        return $this->dailyRentalAgreementNumber;
    }

    /**
     * Sets a new dailyRentalAgreementNumber
     *
     * @param int $dailyRentalAgreementNumber
     * @return self
     */
    public function setDailyRentalAgreementNumber($dailyRentalAgreementNumber)
    {
        $this->dailyRentalAgreementNumber = $dailyRentalAgreementNumber;
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
     * Gets as appointmentId
     *
     * @return \App\Soap\dealertrack\src\AppointmentId
     */
    public function getAppointmentId()
    {
        return $this->appointmentId;
    }

    /**
     * Sets a new appointmentId
     *
     * @param \App\Soap\dealertrack\src\AppointmentId $appointmentId
     * @return self
     */
    public function setAppointmentId(\App\Soap\dealertrack\src\AppointmentId $appointmentId)
    {
        $this->appointmentId = $appointmentId;
        return $this;
    }

    /**
     * Adds as openRepairOrderDetail
     *
     * @return self
     * @param \App\Soap\dealertrack\src\OpenRepairOrderDetail $openRepairOrderDetail
     */
    public function addToDetails(\App\Soap\dealertrack\src\OpenRepairOrderDetail $openRepairOrderDetail)
    {
        $this->details[] = $openRepairOrderDetail;
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
     * @return \App\Soap\dealertrack\src\OpenRepairOrderDetail[]
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Sets a new details
     *
     * @param \App\Soap\dealertrack\src\OpenRepairOrderDetail[] $details
     * @return self
     */
    public function setDetails(array $details)
    {
        $this->details = $details;
        return $this;
    }

    /**
     * Gets as lastModified
     *
     * @return string
     */
    public function getLastModified()
    {
        return $this->lastModified;
    }

    /**
     * Sets a new lastModified
     *
     * @param string $lastModified
     * @return self
     */
    public function setLastModified($lastModified)
    {
        $this->lastModified = $lastModified;
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


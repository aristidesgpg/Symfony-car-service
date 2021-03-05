<?php

namespace App\Soap\dealertrack\src;

/**
 * Class representing OpenRepairOrderDetail
 */
class OpenRepairOrderDetail
{

    /**
     * @var int $serviceLineNumber
     */
    private $serviceLineNumber = null;

    /**
     * @var string $lineType
     */
    private $lineType = null;

    /**
     * @var int $sequenceNumber
     */
    private $sequenceNumber = null;

    /**
     * @var \App\Soap\dealertrack\src\CounterPersonID $counterPersonID
     */
    private $counterPersonID = null;

    /**
     * @var string $transCode
     */
    private $transCode = null;

    /**
     * @var \App\Soap\dealertrack\src\SpecialOrderEmergencyPurchase $specialOrderEmergencyPurchase
     */
    private $specialOrderEmergencyPurchase = null;

    /**
     * @var int $transDate
     */
    private $transDate = null;

    /**
     * @var \App\Soap\dealertrack\src\Manufacturer $manufacturer
     */
    private $manufacturer = null;

    /**
     * @var \App\Soap\dealertrack\src\PartNumber $partNumber
     */
    private $partNumber = null;

    /**
     * @var int $partNoLength
     */
    private $partNoLength = null;

    /**
     * @var \App\Soap\dealertrack\src\StockGroup $stockGroup
     */
    private $stockGroup = null;

    /**
     * @var \App\Soap\dealertrack\src\BinLocation $binLocation
     */
    private $binLocation = null;

    /**
     * @var int $quantity
     */
    private $quantity = null;

    /**
     * @var float $cost
     */
    private $cost = null;

    /**
     * @var float $listPrice
     */
    private $listPrice = null;

    /**
     * @var float $tradePrice
     */
    private $tradePrice = null;

    /**
     * @var float $flatPrice
     */
    private $flatPrice = null;

    /**
     * @var float $netPrice
     */
    private $netPrice = null;

    /**
     * @var float $bookList
     */
    private $bookList = null;

    /**
     * @var \App\Soap\dealertrack\src\PriceMethod $priceMethod
     */
    private $priceMethod = null;

    /**
     * @var int $pricePercent
     */
    private $pricePercent = null;

    /**
     * @var \App\Soap\dealertrack\src\PriceBase $priceBase
     */
    private $priceBase = null;

    /**
     * @var \App\Soap\dealertrack\src\SpecialCode $specialCode
     */
    private $specialCode = null;

    /**
     * @var \App\Soap\dealertrack\src\PriceOverride $priceOverride
     */
    private $priceOverride = null;

    /**
     * @var \App\Soap\dealertrack\src\GroupPrice $groupPrice
     */
    private $groupPrice = null;

    /**
     * @var \App\Soap\dealertrack\src\IsCorePart $isCorePart
     */
    private $isCorePart = null;

    /**
     * @var \App\Soap\dealertrack\src\AddNSPart $addNSPart
     */
    private $addNSPart = null;

    /**
     * @var int $specialOrderPriority
     */
    private $specialOrderPriority = null;

    /**
     * @var \App\Soap\dealertrack\src\OriginalSpecialOrder $originalSpecialOrder
     */
    private $originalSpecialOrder = null;

    /**
     * @var \App\Soap\dealertrack\src\ExcludeFromHistory $excludeFromHistory
     */
    private $excludeFromHistory = null;

    /**
     * @var string $comments
     */
    private $comments = null;

    /**
     * @var string $lineStatus
     */
    private $lineStatus = null;

    /**
     * @var string $serviceType
     */
    private $serviceType = null;

    /**
     * @var string $linePaymentMethod
     */
    private $linePaymentMethod = null;

    /**
     * @var \App\Soap\dealertrack\src\PolicyAdjustment $policyAdjustment
     */
    private $policyAdjustment = null;

    /**
     * @var \App\Soap\dealertrack\src\TechnicianID $technicianID
     */
    private $technicianID = null;

    /**
     * @var string $laborOpCode
     */
    private $laborOpCode = null;

    /**
     * @var \App\Soap\dealertrack\src\CorrectionLaborOpCode $correctionLaborOpCode
     */
    private $correctionLaborOpCode = null;

    /**
     * @var float $laborHours
     */
    private $laborHours = null;

    /**
     * @var float $laborCostHours
     */
    private $laborCostHours = null;

    /**
     * @var float $actualRetailAmount
     */
    private $actualRetailAmount = null;

    /**
     * @var \App\Soap\dealertrack\src\FailureCode $failureCode
     */
    private $failureCode = null;

    /**
     * @var int $priceLevel
     */
    private $priceLevel = null;

    /**
     * @var int $priceStrategyAssignment
     */
    private $priceStrategyAssignment = null;

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
     * @var float $factoryLaborHours
     */
    private $factoryLaborHours = null;

    /**
     * @var \App\Soap\dealertrack\src\AuthorizationCode $authorizationCode
     */
    private $authorizationCode = null;

    /**
     * @var \App\Soap\dealertrack\src\BatteryWarrantyCode $batteryWarrantyCode
     */
    private $batteryWarrantyCode = null;

    /**
     * @var int $dateTimeLineCompleted
     */
    private $dateTimeLineCompleted = null;

    /**
     * @var \App\Soap\dealertrack\src\InternalAccount $internalAccount
     */
    private $internalAccount = null;

    /**
     * @var \App\Soap\dealertrack\src\Authorizer $authorizer
     */
    private $authorizer = null;

    /**
     * @var float $netItemTotal
     */
    private $netItemTotal = null;

    /**
     * @var float $administrativeLaborAmount
     */
    private $administrativeLaborAmount = null;

    /**
     * @var float $administrativeHours
     */
    private $administrativeHours = null;

    /**
     * @var float $paintAndMaterialsCost
     */
    private $paintAndMaterialsCost = null;

    /**
     * @var float $paintAndMaterialsRetail
     */
    private $paintAndMaterialsRetail = null;

    /**
     * @var \App\Soap\dealertrack\src\RepeatRepairFlag $repeatRepairFlag
     */
    private $repeatRepairFlag = null;

    /**
     * @var \App\Soap\dealertrack\src\TaxableInternalLine $taxableInternalLine
     */
    private $taxableInternalLine = null;

    /**
     * @var \App\Soap\dealertrack\src\UpsellFlag $upsellFlag
     */
    private $upsellFlag = null;

    /**
     * @var \App\Soap\dealertrack\src\WarrantyClaimType $warrantyClaimType
     */
    private $warrantyClaimType = null;

    /**
     * @var \App\Soap\dealertrack\src\VATCode $vATCode
     */
    private $vATCode = null;

    /**
     * @var float $vATAmount
     */
    private $vATAmount = null;

    /**
     * @var \App\Soap\dealertrack\src\ReturnToInventoryFlag $returnToInventoryFlag
     */
    private $returnToInventoryFlag = null;

    /**
     * @var \App\Soap\dealertrack\src\SkillLevel $skillLevel
     */
    private $skillLevel = null;

    /**
     * @var \App\Soap\dealertrack\src\OEMReplacementFlag $oEMReplacementFlag
     */
    private $oEMReplacementFlag = null;

    /**
     * @var float $costDifferential
     */
    private $costDifferential = null;

    /**
     * @var int $optionSequenceNumber
     */
    private $optionSequenceNumber = null;

    /**
     * @var string $dispatchStartTime
     */
    private $dispatchStartTime = null;

    /**
     * @var float $totalDiscountLabor
     */
    private $totalDiscountLabor = null;

    /**
     * @var float $totalDiscountParts
     */
    private $totalDiscountParts = null;

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
     * Gets as sequenceNumber
     *
     * @return int
     */
    public function getSequenceNumber()
    {
        return $this->sequenceNumber;
    }

    /**
     * Sets a new sequenceNumber
     *
     * @param int $sequenceNumber
     * @return self
     */
    public function setSequenceNumber($sequenceNumber)
    {
        $this->sequenceNumber = $sequenceNumber;
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
     * Gets as transCode
     *
     * @return string
     */
    public function getTransCode()
    {
        return $this->transCode;
    }

    /**
     * Sets a new transCode
     *
     * @param string $transCode
     * @return self
     */
    public function setTransCode($transCode)
    {
        $this->transCode = $transCode;
        return $this;
    }

    /**
     * Gets as specialOrderEmergencyPurchase
     *
     * @return \App\Soap\dealertrack\src\SpecialOrderEmergencyPurchase
     */
    public function getSpecialOrderEmergencyPurchase()
    {
        return $this->specialOrderEmergencyPurchase;
    }

    /**
     * Sets a new specialOrderEmergencyPurchase
     *
     * @param \App\Soap\dealertrack\src\SpecialOrderEmergencyPurchase $specialOrderEmergencyPurchase
     * @return self
     */
    public function setSpecialOrderEmergencyPurchase(\App\Soap\dealertrack\src\SpecialOrderEmergencyPurchase $specialOrderEmergencyPurchase)
    {
        $this->specialOrderEmergencyPurchase = $specialOrderEmergencyPurchase;
        return $this;
    }

    /**
     * Gets as transDate
     *
     * @return int
     */
    public function getTransDate()
    {
        return $this->transDate;
    }

    /**
     * Sets a new transDate
     *
     * @param int $transDate
     * @return self
     */
    public function setTransDate($transDate)
    {
        $this->transDate = $transDate;
        return $this;
    }

    /**
     * Gets as manufacturer
     *
     * @return \App\Soap\dealertrack\src\Manufacturer
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Sets a new manufacturer
     *
     * @param \App\Soap\dealertrack\src\Manufacturer $manufacturer
     * @return self
     */
    public function setManufacturer(\App\Soap\dealertrack\src\Manufacturer $manufacturer)
    {
        $this->manufacturer = $manufacturer;
        return $this;
    }

    /**
     * Gets as partNumber
     *
     * @return \App\Soap\dealertrack\src\PartNumber
     */
    public function getPartNumber()
    {
        return $this->partNumber;
    }

    /**
     * Sets a new partNumber
     *
     * @param \App\Soap\dealertrack\src\PartNumber $partNumber
     * @return self
     */
    public function setPartNumber(\App\Soap\dealertrack\src\PartNumber $partNumber)
    {
        $this->partNumber = $partNumber;
        return $this;
    }

    /**
     * Gets as partNoLength
     *
     * @return int
     */
    public function getPartNoLength()
    {
        return $this->partNoLength;
    }

    /**
     * Sets a new partNoLength
     *
     * @param int $partNoLength
     * @return self
     */
    public function setPartNoLength($partNoLength)
    {
        $this->partNoLength = $partNoLength;
        return $this;
    }

    /**
     * Gets as stockGroup
     *
     * @return \App\Soap\dealertrack\src\StockGroup
     */
    public function getStockGroup()
    {
        return $this->stockGroup;
    }

    /**
     * Sets a new stockGroup
     *
     * @param \App\Soap\dealertrack\src\StockGroup $stockGroup
     * @return self
     */
    public function setStockGroup(\App\Soap\dealertrack\src\StockGroup $stockGroup)
    {
        $this->stockGroup = $stockGroup;
        return $this;
    }

    /**
     * Gets as binLocation
     *
     * @return \App\Soap\dealertrack\src\BinLocation
     */
    public function getBinLocation()
    {
        return $this->binLocation;
    }

    /**
     * Sets a new binLocation
     *
     * @param \App\Soap\dealertrack\src\BinLocation $binLocation
     * @return self
     */
    public function setBinLocation(\App\Soap\dealertrack\src\BinLocation $binLocation)
    {
        $this->binLocation = $binLocation;
        return $this;
    }

    /**
     * Gets as quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Sets a new quantity
     *
     * @param int $quantity
     * @return self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Gets as cost
     *
     * @return float
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Sets a new cost
     *
     * @param float $cost
     * @return self
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
        return $this;
    }

    /**
     * Gets as listPrice
     *
     * @return float
     */
    public function getListPrice()
    {
        return $this->listPrice;
    }

    /**
     * Sets a new listPrice
     *
     * @param float $listPrice
     * @return self
     */
    public function setListPrice($listPrice)
    {
        $this->listPrice = $listPrice;
        return $this;
    }

    /**
     * Gets as tradePrice
     *
     * @return float
     */
    public function getTradePrice()
    {
        return $this->tradePrice;
    }

    /**
     * Sets a new tradePrice
     *
     * @param float $tradePrice
     * @return self
     */
    public function setTradePrice($tradePrice)
    {
        $this->tradePrice = $tradePrice;
        return $this;
    }

    /**
     * Gets as flatPrice
     *
     * @return float
     */
    public function getFlatPrice()
    {
        return $this->flatPrice;
    }

    /**
     * Sets a new flatPrice
     *
     * @param float $flatPrice
     * @return self
     */
    public function setFlatPrice($flatPrice)
    {
        $this->flatPrice = $flatPrice;
        return $this;
    }

    /**
     * Gets as netPrice
     *
     * @return float
     */
    public function getNetPrice()
    {
        return $this->netPrice;
    }

    /**
     * Sets a new netPrice
     *
     * @param float $netPrice
     * @return self
     */
    public function setNetPrice($netPrice)
    {
        $this->netPrice = $netPrice;
        return $this;
    }

    /**
     * Gets as bookList
     *
     * @return float
     */
    public function getBookList()
    {
        return $this->bookList;
    }

    /**
     * Sets a new bookList
     *
     * @param float $bookList
     * @return self
     */
    public function setBookList($bookList)
    {
        $this->bookList = $bookList;
        return $this;
    }

    /**
     * Gets as priceMethod
     *
     * @return \App\Soap\dealertrack\src\PriceMethod
     */
    public function getPriceMethod()
    {
        return $this->priceMethod;
    }

    /**
     * Sets a new priceMethod
     *
     * @param \App\Soap\dealertrack\src\PriceMethod $priceMethod
     * @return self
     */
    public function setPriceMethod(\App\Soap\dealertrack\src\PriceMethod $priceMethod)
    {
        $this->priceMethod = $priceMethod;
        return $this;
    }

    /**
     * Gets as pricePercent
     *
     * @return int
     */
    public function getPricePercent()
    {
        return $this->pricePercent;
    }

    /**
     * Sets a new pricePercent
     *
     * @param int $pricePercent
     * @return self
     */
    public function setPricePercent($pricePercent)
    {
        $this->pricePercent = $pricePercent;
        return $this;
    }

    /**
     * Gets as priceBase
     *
     * @return \App\Soap\dealertrack\src\PriceBase
     */
    public function getPriceBase()
    {
        return $this->priceBase;
    }

    /**
     * Sets a new priceBase
     *
     * @param \App\Soap\dealertrack\src\PriceBase $priceBase
     * @return self
     */
    public function setPriceBase(\App\Soap\dealertrack\src\PriceBase $priceBase)
    {
        $this->priceBase = $priceBase;
        return $this;
    }

    /**
     * Gets as specialCode
     *
     * @return \App\Soap\dealertrack\src\SpecialCode
     */
    public function getSpecialCode()
    {
        return $this->specialCode;
    }

    /**
     * Sets a new specialCode
     *
     * @param \App\Soap\dealertrack\src\SpecialCode $specialCode
     * @return self
     */
    public function setSpecialCode(\App\Soap\dealertrack\src\SpecialCode $specialCode)
    {
        $this->specialCode = $specialCode;
        return $this;
    }

    /**
     * Gets as priceOverride
     *
     * @return \App\Soap\dealertrack\src\PriceOverride
     */
    public function getPriceOverride()
    {
        return $this->priceOverride;
    }

    /**
     * Sets a new priceOverride
     *
     * @param \App\Soap\dealertrack\src\PriceOverride $priceOverride
     * @return self
     */
    public function setPriceOverride(\App\Soap\dealertrack\src\PriceOverride $priceOverride)
    {
        $this->priceOverride = $priceOverride;
        return $this;
    }

    /**
     * Gets as groupPrice
     *
     * @return \App\Soap\dealertrack\src\GroupPrice
     */
    public function getGroupPrice()
    {
        return $this->groupPrice;
    }

    /**
     * Sets a new groupPrice
     *
     * @param \App\Soap\dealertrack\src\GroupPrice $groupPrice
     * @return self
     */
    public function setGroupPrice(\App\Soap\dealertrack\src\GroupPrice $groupPrice)
    {
        $this->groupPrice = $groupPrice;
        return $this;
    }

    /**
     * Gets as isCorePart
     *
     * @return \App\Soap\dealertrack\src\IsCorePart
     */
    public function getIsCorePart()
    {
        return $this->isCorePart;
    }

    /**
     * Sets a new isCorePart
     *
     * @param \App\Soap\dealertrack\src\IsCorePart $isCorePart
     * @return self
     */
    public function setIsCorePart(\App\Soap\dealertrack\src\IsCorePart $isCorePart)
    {
        $this->isCorePart = $isCorePart;
        return $this;
    }

    /**
     * Gets as addNSPart
     *
     * @return \App\Soap\dealertrack\src\AddNSPart
     */
    public function getAddNSPart()
    {
        return $this->addNSPart;
    }

    /**
     * Sets a new addNSPart
     *
     * @param \App\Soap\dealertrack\src\AddNSPart $addNSPart
     * @return self
     */
    public function setAddNSPart(\App\Soap\dealertrack\src\AddNSPart $addNSPart)
    {
        $this->addNSPart = $addNSPart;
        return $this;
    }

    /**
     * Gets as specialOrderPriority
     *
     * @return int
     */
    public function getSpecialOrderPriority()
    {
        return $this->specialOrderPriority;
    }

    /**
     * Sets a new specialOrderPriority
     *
     * @param int $specialOrderPriority
     * @return self
     */
    public function setSpecialOrderPriority($specialOrderPriority)
    {
        $this->specialOrderPriority = $specialOrderPriority;
        return $this;
    }

    /**
     * Gets as originalSpecialOrder
     *
     * @return \App\Soap\dealertrack\src\OriginalSpecialOrder
     */
    public function getOriginalSpecialOrder()
    {
        return $this->originalSpecialOrder;
    }

    /**
     * Sets a new originalSpecialOrder
     *
     * @param \App\Soap\dealertrack\src\OriginalSpecialOrder $originalSpecialOrder
     * @return self
     */
    public function setOriginalSpecialOrder(\App\Soap\dealertrack\src\OriginalSpecialOrder $originalSpecialOrder)
    {
        $this->originalSpecialOrder = $originalSpecialOrder;
        return $this;
    }

    /**
     * Gets as excludeFromHistory
     *
     * @return \App\Soap\dealertrack\src\ExcludeFromHistory
     */
    public function getExcludeFromHistory()
    {
        return $this->excludeFromHistory;
    }

    /**
     * Sets a new excludeFromHistory
     *
     * @param \App\Soap\dealertrack\src\ExcludeFromHistory $excludeFromHistory
     * @return self
     */
    public function setExcludeFromHistory(\App\Soap\dealertrack\src\ExcludeFromHistory $excludeFromHistory)
    {
        $this->excludeFromHistory = $excludeFromHistory;
        return $this;
    }

    /**
     * Gets as comments
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Sets a new comments
     *
     * @param string $comments
     * @return self
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * Gets as lineStatus
     *
     * @return string
     */
    public function getLineStatus()
    {
        return $this->lineStatus;
    }

    /**
     * Sets a new lineStatus
     *
     * @param string $lineStatus
     * @return self
     */
    public function setLineStatus($lineStatus)
    {
        $this->lineStatus = $lineStatus;
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
     * @return \App\Soap\dealertrack\src\TechnicianID
     */
    public function getTechnicianID()
    {
        return $this->technicianID;
    }

    /**
     * Sets a new technicianID
     *
     * @param \App\Soap\dealertrack\src\TechnicianID $technicianID
     * @return self
     */
    public function setTechnicianID(\App\Soap\dealertrack\src\TechnicianID $technicianID)
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
     * Gets as correctionLaborOpCode
     *
     * @return \App\Soap\dealertrack\src\CorrectionLaborOpCode
     */
    public function getCorrectionLaborOpCode()
    {
        return $this->correctionLaborOpCode;
    }

    /**
     * Sets a new correctionLaborOpCode
     *
     * @param \App\Soap\dealertrack\src\CorrectionLaborOpCode $correctionLaborOpCode
     * @return self
     */
    public function setCorrectionLaborOpCode(\App\Soap\dealertrack\src\CorrectionLaborOpCode $correctionLaborOpCode)
    {
        $this->correctionLaborOpCode = $correctionLaborOpCode;
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
     * Gets as laborCostHours
     *
     * @return float
     */
    public function getLaborCostHours()
    {
        return $this->laborCostHours;
    }

    /**
     * Sets a new laborCostHours
     *
     * @param float $laborCostHours
     * @return self
     */
    public function setLaborCostHours($laborCostHours)
    {
        $this->laborCostHours = $laborCostHours;
        return $this;
    }

    /**
     * Gets as actualRetailAmount
     *
     * @return float
     */
    public function getActualRetailAmount()
    {
        return $this->actualRetailAmount;
    }

    /**
     * Sets a new actualRetailAmount
     *
     * @param float $actualRetailAmount
     * @return self
     */
    public function setActualRetailAmount($actualRetailAmount)
    {
        $this->actualRetailAmount = $actualRetailAmount;
        return $this;
    }

    /**
     * Gets as failureCode
     *
     * @return \App\Soap\dealertrack\src\FailureCode
     */
    public function getFailureCode()
    {
        return $this->failureCode;
    }

    /**
     * Sets a new failureCode
     *
     * @param \App\Soap\dealertrack\src\FailureCode $failureCode
     * @return self
     */
    public function setFailureCode(\App\Soap\dealertrack\src\FailureCode $failureCode)
    {
        $this->failureCode = $failureCode;
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
     * Gets as priceStrategyAssignment
     *
     * @return int
     */
    public function getPriceStrategyAssignment()
    {
        return $this->priceStrategyAssignment;
    }

    /**
     * Sets a new priceStrategyAssignment
     *
     * @param int $priceStrategyAssignment
     * @return self
     */
    public function setPriceStrategyAssignment($priceStrategyAssignment)
    {
        $this->priceStrategyAssignment = $priceStrategyAssignment;
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
     * Gets as factoryLaborHours
     *
     * @return float
     */
    public function getFactoryLaborHours()
    {
        return $this->factoryLaborHours;
    }

    /**
     * Sets a new factoryLaborHours
     *
     * @param float $factoryLaborHours
     * @return self
     */
    public function setFactoryLaborHours($factoryLaborHours)
    {
        $this->factoryLaborHours = $factoryLaborHours;
        return $this;
    }

    /**
     * Gets as authorizationCode
     *
     * @return \App\Soap\dealertrack\src\AuthorizationCode
     */
    public function getAuthorizationCode()
    {
        return $this->authorizationCode;
    }

    /**
     * Sets a new authorizationCode
     *
     * @param \App\Soap\dealertrack\src\AuthorizationCode $authorizationCode
     * @return self
     */
    public function setAuthorizationCode(\App\Soap\dealertrack\src\AuthorizationCode $authorizationCode)
    {
        $this->authorizationCode = $authorizationCode;
        return $this;
    }

    /**
     * Gets as batteryWarrantyCode
     *
     * @return \App\Soap\dealertrack\src\BatteryWarrantyCode
     */
    public function getBatteryWarrantyCode()
    {
        return $this->batteryWarrantyCode;
    }

    /**
     * Sets a new batteryWarrantyCode
     *
     * @param \App\Soap\dealertrack\src\BatteryWarrantyCode $batteryWarrantyCode
     * @return self
     */
    public function setBatteryWarrantyCode(\App\Soap\dealertrack\src\BatteryWarrantyCode $batteryWarrantyCode)
    {
        $this->batteryWarrantyCode = $batteryWarrantyCode;
        return $this;
    }

    /**
     * Gets as dateTimeLineCompleted
     *
     * @return int
     */
    public function getDateTimeLineCompleted()
    {
        return $this->dateTimeLineCompleted;
    }

    /**
     * Sets a new dateTimeLineCompleted
     *
     * @param int $dateTimeLineCompleted
     * @return self
     */
    public function setDateTimeLineCompleted($dateTimeLineCompleted)
    {
        $this->dateTimeLineCompleted = $dateTimeLineCompleted;
        return $this;
    }

    /**
     * Gets as internalAccount
     *
     * @return \App\Soap\dealertrack\src\InternalAccount
     */
    public function getInternalAccount()
    {
        return $this->internalAccount;
    }

    /**
     * Sets a new internalAccount
     *
     * @param \App\Soap\dealertrack\src\InternalAccount $internalAccount
     * @return self
     */
    public function setInternalAccount(\App\Soap\dealertrack\src\InternalAccount $internalAccount)
    {
        $this->internalAccount = $internalAccount;
        return $this;
    }

    /**
     * Gets as authorizer
     *
     * @return \App\Soap\dealertrack\src\Authorizer
     */
    public function getAuthorizer()
    {
        return $this->authorizer;
    }

    /**
     * Sets a new authorizer
     *
     * @param \App\Soap\dealertrack\src\Authorizer $authorizer
     * @return self
     */
    public function setAuthorizer(\App\Soap\dealertrack\src\Authorizer $authorizer)
    {
        $this->authorizer = $authorizer;
        return $this;
    }

    /**
     * Gets as netItemTotal
     *
     * @return float
     */
    public function getNetItemTotal()
    {
        return $this->netItemTotal;
    }

    /**
     * Sets a new netItemTotal
     *
     * @param float $netItemTotal
     * @return self
     */
    public function setNetItemTotal($netItemTotal)
    {
        $this->netItemTotal = $netItemTotal;
        return $this;
    }

    /**
     * Gets as administrativeLaborAmount
     *
     * @return float
     */
    public function getAdministrativeLaborAmount()
    {
        return $this->administrativeLaborAmount;
    }

    /**
     * Sets a new administrativeLaborAmount
     *
     * @param float $administrativeLaborAmount
     * @return self
     */
    public function setAdministrativeLaborAmount($administrativeLaborAmount)
    {
        $this->administrativeLaborAmount = $administrativeLaborAmount;
        return $this;
    }

    /**
     * Gets as administrativeHours
     *
     * @return float
     */
    public function getAdministrativeHours()
    {
        return $this->administrativeHours;
    }

    /**
     * Sets a new administrativeHours
     *
     * @param float $administrativeHours
     * @return self
     */
    public function setAdministrativeHours($administrativeHours)
    {
        $this->administrativeHours = $administrativeHours;
        return $this;
    }

    /**
     * Gets as paintAndMaterialsCost
     *
     * @return float
     */
    public function getPaintAndMaterialsCost()
    {
        return $this->paintAndMaterialsCost;
    }

    /**
     * Sets a new paintAndMaterialsCost
     *
     * @param float $paintAndMaterialsCost
     * @return self
     */
    public function setPaintAndMaterialsCost($paintAndMaterialsCost)
    {
        $this->paintAndMaterialsCost = $paintAndMaterialsCost;
        return $this;
    }

    /**
     * Gets as paintAndMaterialsRetail
     *
     * @return float
     */
    public function getPaintAndMaterialsRetail()
    {
        return $this->paintAndMaterialsRetail;
    }

    /**
     * Sets a new paintAndMaterialsRetail
     *
     * @param float $paintAndMaterialsRetail
     * @return self
     */
    public function setPaintAndMaterialsRetail($paintAndMaterialsRetail)
    {
        $this->paintAndMaterialsRetail = $paintAndMaterialsRetail;
        return $this;
    }

    /**
     * Gets as repeatRepairFlag
     *
     * @return \App\Soap\dealertrack\src\RepeatRepairFlag
     */
    public function getRepeatRepairFlag()
    {
        return $this->repeatRepairFlag;
    }

    /**
     * Sets a new repeatRepairFlag
     *
     * @param \App\Soap\dealertrack\src\RepeatRepairFlag $repeatRepairFlag
     * @return self
     */
    public function setRepeatRepairFlag(\App\Soap\dealertrack\src\RepeatRepairFlag $repeatRepairFlag)
    {
        $this->repeatRepairFlag = $repeatRepairFlag;
        return $this;
    }

    /**
     * Gets as taxableInternalLine
     *
     * @return \App\Soap\dealertrack\src\TaxableInternalLine
     */
    public function getTaxableInternalLine()
    {
        return $this->taxableInternalLine;
    }

    /**
     * Sets a new taxableInternalLine
     *
     * @param \App\Soap\dealertrack\src\TaxableInternalLine $taxableInternalLine
     * @return self
     */
    public function setTaxableInternalLine(\App\Soap\dealertrack\src\TaxableInternalLine $taxableInternalLine)
    {
        $this->taxableInternalLine = $taxableInternalLine;
        return $this;
    }

    /**
     * Gets as upsellFlag
     *
     * @return \App\Soap\dealertrack\src\UpsellFlag
     */
    public function getUpsellFlag()
    {
        return $this->upsellFlag;
    }

    /**
     * Sets a new upsellFlag
     *
     * @param \App\Soap\dealertrack\src\UpsellFlag $upsellFlag
     * @return self
     */
    public function setUpsellFlag(\App\Soap\dealertrack\src\UpsellFlag $upsellFlag)
    {
        $this->upsellFlag = $upsellFlag;
        return $this;
    }

    /**
     * Gets as warrantyClaimType
     *
     * @return \App\Soap\dealertrack\src\WarrantyClaimType
     */
    public function getWarrantyClaimType()
    {
        return $this->warrantyClaimType;
    }

    /**
     * Sets a new warrantyClaimType
     *
     * @param \App\Soap\dealertrack\src\WarrantyClaimType $warrantyClaimType
     * @return self
     */
    public function setWarrantyClaimType(\App\Soap\dealertrack\src\WarrantyClaimType $warrantyClaimType)
    {
        $this->warrantyClaimType = $warrantyClaimType;
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

    /**
     * Gets as returnToInventoryFlag
     *
     * @return \App\Soap\dealertrack\src\ReturnToInventoryFlag
     */
    public function getReturnToInventoryFlag()
    {
        return $this->returnToInventoryFlag;
    }

    /**
     * Sets a new returnToInventoryFlag
     *
     * @param \App\Soap\dealertrack\src\ReturnToInventoryFlag $returnToInventoryFlag
     * @return self
     */
    public function setReturnToInventoryFlag(\App\Soap\dealertrack\src\ReturnToInventoryFlag $returnToInventoryFlag)
    {
        $this->returnToInventoryFlag = $returnToInventoryFlag;
        return $this;
    }

    /**
     * Gets as skillLevel
     *
     * @return \App\Soap\dealertrack\src\SkillLevel
     */
    public function getSkillLevel()
    {
        return $this->skillLevel;
    }

    /**
     * Sets a new skillLevel
     *
     * @param \App\Soap\dealertrack\src\SkillLevel $skillLevel
     * @return self
     */
    public function setSkillLevel(\App\Soap\dealertrack\src\SkillLevel $skillLevel)
    {
        $this->skillLevel = $skillLevel;
        return $this;
    }

    /**
     * Gets as oEMReplacementFlag
     *
     * @return \App\Soap\dealertrack\src\OEMReplacementFlag
     */
    public function getOEMReplacementFlag()
    {
        return $this->oEMReplacementFlag;
    }

    /**
     * Sets a new oEMReplacementFlag
     *
     * @param \App\Soap\dealertrack\src\OEMReplacementFlag $oEMReplacementFlag
     * @return self
     */
    public function setOEMReplacementFlag(\App\Soap\dealertrack\src\OEMReplacementFlag $oEMReplacementFlag)
    {
        $this->oEMReplacementFlag = $oEMReplacementFlag;
        return $this;
    }

    /**
     * Gets as costDifferential
     *
     * @return float
     */
    public function getCostDifferential()
    {
        return $this->costDifferential;
    }

    /**
     * Sets a new costDifferential
     *
     * @param float $costDifferential
     * @return self
     */
    public function setCostDifferential($costDifferential)
    {
        $this->costDifferential = $costDifferential;
        return $this;
    }

    /**
     * Gets as optionSequenceNumber
     *
     * @return int
     */
    public function getOptionSequenceNumber()
    {
        return $this->optionSequenceNumber;
    }

    /**
     * Sets a new optionSequenceNumber
     *
     * @param int $optionSequenceNumber
     * @return self
     */
    public function setOptionSequenceNumber($optionSequenceNumber)
    {
        $this->optionSequenceNumber = $optionSequenceNumber;
        return $this;
    }

    /**
     * Gets as dispatchStartTime
     *
     * @return string
     */
    public function getDispatchStartTime()
    {
        return $this->dispatchStartTime;
    }

    /**
     * Sets a new dispatchStartTime
     *
     * @param string $dispatchStartTime
     * @return self
     */
    public function setDispatchStartTime($dispatchStartTime)
    {
        $this->dispatchStartTime = $dispatchStartTime;
        return $this;
    }

    /**
     * Gets as totalDiscountLabor
     *
     * @return float
     */
    public function getTotalDiscountLabor()
    {
        return $this->totalDiscountLabor;
    }

    /**
     * Sets a new totalDiscountLabor
     *
     * @param float $totalDiscountLabor
     * @return self
     */
    public function setTotalDiscountLabor($totalDiscountLabor)
    {
        $this->totalDiscountLabor = $totalDiscountLabor;
        return $this;
    }

    /**
     * Gets as totalDiscountParts
     *
     * @return float
     */
    public function getTotalDiscountParts()
    {
        return $this->totalDiscountParts;
    }

    /**
     * Sets a new totalDiscountParts
     *
     * @param float $totalDiscountParts
     * @return self
     */
    public function setTotalDiscountParts($totalDiscountParts)
    {
        $this->totalDiscountParts = $totalDiscountParts;
        return $this;
    }


}


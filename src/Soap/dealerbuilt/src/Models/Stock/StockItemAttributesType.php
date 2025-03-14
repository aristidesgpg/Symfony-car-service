<?php

namespace App\Soap\dealerbuilt\src\Models\Stock;

/**
 * Class representing StockItemAttributesType
 *
 * 
 * XSD Type: StockItemAttributes
 */
class StockItemAttributesType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $accumulatedBalance
     */
    private $accumulatedBalance = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $advertisedSalePrice
     */
    private $advertisedSalePrice = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $advertisingCost
     */
    private $advertisingCost = null;

    /**
     * @var string $advertisingDescription
     */
    private $advertisingDescription = null;

    /**
     * @var string $availability
     */
    private $availability = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $baseMsrp
     */
    private $baseMsrp = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $baseRetailPrice
     */
    private $baseRetailPrice = null;

    /**
     * @var string $bodyStyle
     */
    private $bodyStyle = null;

    /**
     * @var string $bodyStyleCode
     */
    private $bodyStyleCode = null;

    /**
     * @var string $colorCode
     */
    private $colorCode = null;

    /**
     * @var string $comments
     */
    private $comments = null;

    /**
     * @var string $condition
     */
    private $condition = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $cost
     */
    private $cost = null;

    /**
     * @var \DateTime $dateCleared
     */
    private $dateCleared = null;

    /**
     * @var \DateTime $dateInspected
     */
    private $dateInspected = null;

    /**
     * @var \DateTime $datePosted
     */
    private $datePosted = null;

    /**
     * @var \DateTime $dateReceived
     */
    private $dateReceived = null;

    /**
     * @var \DateTime $dateSold
     */
    private $dateSold = null;

    /**
     * @var bool $dealerDefinedBoolean1
     */
    private $dealerDefinedBoolean1 = null;

    /**
     * @var bool $dealerDefinedBoolean2
     */
    private $dealerDefinedBoolean2 = null;

    /**
     * @var bool $dealerDefinedBoolean3
     */
    private $dealerDefinedBoolean3 = null;

    /**
     * @var bool $dealerDefinedBoolean4
     */
    private $dealerDefinedBoolean4 = null;

    /**
     * @var string $dealerDefinedField1
     */
    private $dealerDefinedField1 = null;

    /**
     * @var string $dealerDefinedField2
     */
    private $dealerDefinedField2 = null;

    /**
     * @var string $dealerDefinedField3
     */
    private $dealerDefinedField3 = null;

    /**
     * @var string $dealerDefinedField4
     */
    private $dealerDefinedField4 = null;

    /**
     * @var string $dealerDefinedField5
     */
    private $dealerDefinedField5 = null;

    /**
     * @var string $dealerDefinedField6
     */
    private $dealerDefinedField6 = null;

    /**
     * @var string $dealerDefinedField7
     */
    private $dealerDefinedField7 = null;

    /**
     * @var string $dealerDefinedField8
     */
    private $dealerDefinedField8 = null;

    /**
     * @var string $dealerDefinedOption
     */
    private $dealerDefinedOption = null;

    /**
     * @var string $dealerDefinedStatus
     */
    private $dealerDefinedStatus = null;

    /**
     * @var string $dealerDefinedStatusDescription
     */
    private $dealerDefinedStatusDescription = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $dealerInventoryBalance
     */
    private $dealerInventoryBalance = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $dealerOptionsTotal
     */
    private $dealerOptionsTotal = null;

    /**
     * @var \DateTime $deliveryDate
     */
    private $deliveryDate = null;

    /**
     * @var int $deliveryMileage
     */
    private $deliveryMileage = null;

    /**
     * @var \DateTime $demoEndDate
     */
    private $demoEndDate = null;

    /**
     * @var string $demoPlate
     */
    private $demoPlate = null;

    /**
     * @var \DateTime $demoStartDate
     */
    private $demoStartDate = null;

    /**
     * @var string $description
     */
    private $description = null;

    /**
     * @var bool $doesBaseCostIncludeHoldback
     */
    private $doesBaseCostIncludeHoldback = null;

    /**
     * @var string $doorKeyNumber
     */
    private $doorKeyNumber = null;

    /**
     * @var string $doorUnlockCode
     */
    private $doorUnlockCode = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $downPayment
     */
    private $downPayment = null;

    /**
     * @var string $editedFrom
     */
    private $editedFrom = null;

    /**
     * @var string $engineSerialString
     */
    private $engineSerialString = null;

    /**
     * @var bool $explodeVin
     */
    private $explodeVin = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $floorAmount
     */
    private $floorAmount = null;

    /**
     * @var string $fuelType
     */
    private $fuelType = null;

    /**
     * @var string $gLAccount
     */
    private $gLAccount = null;

    /**
     * @var string $gLSaleAccount
     */
    private $gLSaleAccount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $generalJournalAdjustments
     */
    private $generalJournalAdjustments = null;

    /**
     * @var float $grossVehicleWeight
     */
    private $grossVehicleWeight = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $holdback
     */
    private $holdback = null;

    /**
     * @var int $iMilesExceedMechLimit
     */
    private $iMilesExceedMechLimit = null;

    /**
     * @var int $iMilesExempt
     */
    private $iMilesExempt = null;

    /**
     * @var string $importedFrom
     */
    private $importedFrom = null;

    /**
     * @var \DateTime $inServiceDate
     */
    private $inServiceDate = null;

    /**
     * @var string $interiorColorCode
     */
    private $interiorColorCode = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $internalROCost
     */
    private $internalROCost = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $invoiceBalance
     */
    private $invoiceBalance = null;

    /**
     * @var \DateTime $invoiceDate
     */
    private $invoiceDate = null;

    /**
     * @var string $invoiceNumber
     */
    private $invoiceNumber = null;

    /**
     * @var string $invoiceNumberString
     */
    private $invoiceNumberString = null;

    /**
     * @var bool $isCertifiedPreOwned
     */
    private $isCertifiedPreOwned = null;

    /**
     * @var bool $isDamaged
     */
    private $isDamaged = null;

    /**
     * @var bool $isDemo
     */
    private $isDemo = null;

    /**
     * @var bool $isNew
     */
    private $isNew = null;

    /**
     * @var bool $isSalvaged
     */
    private $isSalvaged = null;

    /**
     * @var string $keyNumber
     */
    private $keyNumber = null;

    /**
     * @var string $licenseNumberString
     */
    private $licenseNumberString = null;

    /**
     * @var string $licensePlateState
     */
    private $licensePlateState = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $licensingFee
     */
    private $licensingFee = null;

    /**
     * @var string $makeString
     */
    private $makeString = null;

    /**
     * @var string $modelCode
     */
    private $modelCode = null;

    /**
     * @var string $modifiedBy
     */
    private $modifiedBy = null;

    /**
     * @var \DateTime $modifiedStamp
     */
    private $modifiedStamp = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $msrp
     */
    private $msrp = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $msrpe
     */
    private $msrpe = null;

    /**
     * @var int $numberOfAxles
     */
    private $numberOfAxles = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Stock\OptionType[] $options
     */
    private $options = null;

    /**
     * @var string $otherOptions
     */
    private $otherOptions = null;

    /**
     * @var \DateTime $pDIDate
     */
    private $pDIDate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType $pDITechnician
     */
    private $pDITechnician = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $packageDiscount
     */
    private $packageDiscount = null;

    /**
     * @var string $payoffLenderName
     */
    private $payoffLenderName = null;

    /**
     * @var \DateTime $postedDate
     */
    private $postedDate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $price
     */
    private $price = null;

    /**
     * @var bool $promoteStatus
     */
    private $promoteStatus = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $rebates
     */
    private $rebates = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $regularPrice
     */
    private $regularPrice = null;

    /**
     * @var string $source
     */
    private $source = null;

    /**
     * @var string $status
     */
    private $status = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Stock\StockItemDataAttributesType $stockDataAttributes
     */
    private $stockDataAttributes = null;

    /**
     * @var string $stockNumber
     */
    private $stockNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalFacOptsRetail
     */
    private $totalFacOptsRetail = null;

    /**
     * @var string $trimCode
     */
    private $trimCode = null;

    /**
     * @var string $type
     */
    private $type = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Stock\OptionType[] $vehicleOptions
     */
    private $vehicleOptions = null;

    /**
     * @var string $vehiclePromoteStatus
     */
    private $vehiclePromoteStatus = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $wholesalePrice
     */
    private $wholesalePrice = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $writeDown
     */
    private $writeDown = null;

    /**
     * Gets as accumulatedBalance
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getAccumulatedBalance()
    {
        return $this->accumulatedBalance;
    }

    /**
     * Sets a new accumulatedBalance
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $accumulatedBalance
     * @return self
     */
    public function setAccumulatedBalance(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $accumulatedBalance)
    {
        $this->accumulatedBalance = $accumulatedBalance;
        return $this;
    }

    /**
     * Gets as advertisedSalePrice
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getAdvertisedSalePrice()
    {
        return $this->advertisedSalePrice;
    }

    /**
     * Sets a new advertisedSalePrice
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $advertisedSalePrice
     * @return self
     */
    public function setAdvertisedSalePrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $advertisedSalePrice)
    {
        $this->advertisedSalePrice = $advertisedSalePrice;
        return $this;
    }

    /**
     * Gets as advertisingCost
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getAdvertisingCost()
    {
        return $this->advertisingCost;
    }

    /**
     * Sets a new advertisingCost
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $advertisingCost
     * @return self
     */
    public function setAdvertisingCost(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $advertisingCost)
    {
        $this->advertisingCost = $advertisingCost;
        return $this;
    }

    /**
     * Gets as advertisingDescription
     *
     * @return string
     */
    public function getAdvertisingDescription()
    {
        return $this->advertisingDescription;
    }

    /**
     * Sets a new advertisingDescription
     *
     * @param string $advertisingDescription
     * @return self
     */
    public function setAdvertisingDescription($advertisingDescription)
    {
        $this->advertisingDescription = $advertisingDescription;
        return $this;
    }

    /**
     * Gets as availability
     *
     * @return string
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * Sets a new availability
     *
     * @param string $availability
     * @return self
     */
    public function setAvailability($availability)
    {
        $this->availability = $availability;
        return $this;
    }

    /**
     * Gets as baseMsrp
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getBaseMsrp()
    {
        return $this->baseMsrp;
    }

    /**
     * Sets a new baseMsrp
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $baseMsrp
     * @return self
     */
    public function setBaseMsrp(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $baseMsrp)
    {
        $this->baseMsrp = $baseMsrp;
        return $this;
    }

    /**
     * Gets as baseRetailPrice
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getBaseRetailPrice()
    {
        return $this->baseRetailPrice;
    }

    /**
     * Sets a new baseRetailPrice
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $baseRetailPrice
     * @return self
     */
    public function setBaseRetailPrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $baseRetailPrice)
    {
        $this->baseRetailPrice = $baseRetailPrice;
        return $this;
    }

    /**
     * Gets as bodyStyle
     *
     * @return string
     */
    public function getBodyStyle()
    {
        return $this->bodyStyle;
    }

    /**
     * Sets a new bodyStyle
     *
     * @param string $bodyStyle
     * @return self
     */
    public function setBodyStyle($bodyStyle)
    {
        $this->bodyStyle = $bodyStyle;
        return $this;
    }

    /**
     * Gets as bodyStyleCode
     *
     * @return string
     */
    public function getBodyStyleCode()
    {
        return $this->bodyStyleCode;
    }

    /**
     * Sets a new bodyStyleCode
     *
     * @param string $bodyStyleCode
     * @return self
     */
    public function setBodyStyleCode($bodyStyleCode)
    {
        $this->bodyStyleCode = $bodyStyleCode;
        return $this;
    }

    /**
     * Gets as colorCode
     *
     * @return string
     */
    public function getColorCode()
    {
        return $this->colorCode;
    }

    /**
     * Sets a new colorCode
     *
     * @param string $colorCode
     * @return self
     */
    public function setColorCode($colorCode)
    {
        $this->colorCode = $colorCode;
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
     * Gets as condition
     *
     * @return string
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * Sets a new condition
     *
     * @param string $condition
     * @return self
     */
    public function setCondition($condition)
    {
        $this->condition = $condition;
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
     * Gets as dateCleared
     *
     * @return \DateTime
     */
    public function getDateCleared()
    {
        return $this->dateCleared;
    }

    /**
     * Sets a new dateCleared
     *
     * @param \DateTime $dateCleared
     * @return self
     */
    public function setDateCleared(\DateTime $dateCleared)
    {
        $this->dateCleared = $dateCleared;
        return $this;
    }

    /**
     * Gets as dateInspected
     *
     * @return \DateTime
     */
    public function getDateInspected()
    {
        return $this->dateInspected;
    }

    /**
     * Sets a new dateInspected
     *
     * @param \DateTime $dateInspected
     * @return self
     */
    public function setDateInspected(\DateTime $dateInspected)
    {
        $this->dateInspected = $dateInspected;
        return $this;
    }

    /**
     * Gets as datePosted
     *
     * @return \DateTime
     */
    public function getDatePosted()
    {
        return $this->datePosted;
    }

    /**
     * Sets a new datePosted
     *
     * @param \DateTime $datePosted
     * @return self
     */
    public function setDatePosted(\DateTime $datePosted)
    {
        $this->datePosted = $datePosted;
        return $this;
    }

    /**
     * Gets as dateReceived
     *
     * @return \DateTime
     */
    public function getDateReceived()
    {
        return $this->dateReceived;
    }

    /**
     * Sets a new dateReceived
     *
     * @param \DateTime $dateReceived
     * @return self
     */
    public function setDateReceived(\DateTime $dateReceived)
    {
        $this->dateReceived = $dateReceived;
        return $this;
    }

    /**
     * Gets as dateSold
     *
     * @return \DateTime
     */
    public function getDateSold()
    {
        return $this->dateSold;
    }

    /**
     * Sets a new dateSold
     *
     * @param \DateTime $dateSold
     * @return self
     */
    public function setDateSold(\DateTime $dateSold)
    {
        $this->dateSold = $dateSold;
        return $this;
    }

    /**
     * Gets as dealerDefinedBoolean1
     *
     * @return bool
     */
    public function getDealerDefinedBoolean1()
    {
        return $this->dealerDefinedBoolean1;
    }

    /**
     * Sets a new dealerDefinedBoolean1
     *
     * @param bool $dealerDefinedBoolean1
     * @return self
     */
    public function setDealerDefinedBoolean1($dealerDefinedBoolean1)
    {
        $this->dealerDefinedBoolean1 = $dealerDefinedBoolean1;
        return $this;
    }

    /**
     * Gets as dealerDefinedBoolean2
     *
     * @return bool
     */
    public function getDealerDefinedBoolean2()
    {
        return $this->dealerDefinedBoolean2;
    }

    /**
     * Sets a new dealerDefinedBoolean2
     *
     * @param bool $dealerDefinedBoolean2
     * @return self
     */
    public function setDealerDefinedBoolean2($dealerDefinedBoolean2)
    {
        $this->dealerDefinedBoolean2 = $dealerDefinedBoolean2;
        return $this;
    }

    /**
     * Gets as dealerDefinedBoolean3
     *
     * @return bool
     */
    public function getDealerDefinedBoolean3()
    {
        return $this->dealerDefinedBoolean3;
    }

    /**
     * Sets a new dealerDefinedBoolean3
     *
     * @param bool $dealerDefinedBoolean3
     * @return self
     */
    public function setDealerDefinedBoolean3($dealerDefinedBoolean3)
    {
        $this->dealerDefinedBoolean3 = $dealerDefinedBoolean3;
        return $this;
    }

    /**
     * Gets as dealerDefinedBoolean4
     *
     * @return bool
     */
    public function getDealerDefinedBoolean4()
    {
        return $this->dealerDefinedBoolean4;
    }

    /**
     * Sets a new dealerDefinedBoolean4
     *
     * @param bool $dealerDefinedBoolean4
     * @return self
     */
    public function setDealerDefinedBoolean4($dealerDefinedBoolean4)
    {
        $this->dealerDefinedBoolean4 = $dealerDefinedBoolean4;
        return $this;
    }

    /**
     * Gets as dealerDefinedField1
     *
     * @return string
     */
    public function getDealerDefinedField1()
    {
        return $this->dealerDefinedField1;
    }

    /**
     * Sets a new dealerDefinedField1
     *
     * @param string $dealerDefinedField1
     * @return self
     */
    public function setDealerDefinedField1($dealerDefinedField1)
    {
        $this->dealerDefinedField1 = $dealerDefinedField1;
        return $this;
    }

    /**
     * Gets as dealerDefinedField2
     *
     * @return string
     */
    public function getDealerDefinedField2()
    {
        return $this->dealerDefinedField2;
    }

    /**
     * Sets a new dealerDefinedField2
     *
     * @param string $dealerDefinedField2
     * @return self
     */
    public function setDealerDefinedField2($dealerDefinedField2)
    {
        $this->dealerDefinedField2 = $dealerDefinedField2;
        return $this;
    }

    /**
     * Gets as dealerDefinedField3
     *
     * @return string
     */
    public function getDealerDefinedField3()
    {
        return $this->dealerDefinedField3;
    }

    /**
     * Sets a new dealerDefinedField3
     *
     * @param string $dealerDefinedField3
     * @return self
     */
    public function setDealerDefinedField3($dealerDefinedField3)
    {
        $this->dealerDefinedField3 = $dealerDefinedField3;
        return $this;
    }

    /**
     * Gets as dealerDefinedField4
     *
     * @return string
     */
    public function getDealerDefinedField4()
    {
        return $this->dealerDefinedField4;
    }

    /**
     * Sets a new dealerDefinedField4
     *
     * @param string $dealerDefinedField4
     * @return self
     */
    public function setDealerDefinedField4($dealerDefinedField4)
    {
        $this->dealerDefinedField4 = $dealerDefinedField4;
        return $this;
    }

    /**
     * Gets as dealerDefinedField5
     *
     * @return string
     */
    public function getDealerDefinedField5()
    {
        return $this->dealerDefinedField5;
    }

    /**
     * Sets a new dealerDefinedField5
     *
     * @param string $dealerDefinedField5
     * @return self
     */
    public function setDealerDefinedField5($dealerDefinedField5)
    {
        $this->dealerDefinedField5 = $dealerDefinedField5;
        return $this;
    }

    /**
     * Gets as dealerDefinedField6
     *
     * @return string
     */
    public function getDealerDefinedField6()
    {
        return $this->dealerDefinedField6;
    }

    /**
     * Sets a new dealerDefinedField6
     *
     * @param string $dealerDefinedField6
     * @return self
     */
    public function setDealerDefinedField6($dealerDefinedField6)
    {
        $this->dealerDefinedField6 = $dealerDefinedField6;
        return $this;
    }

    /**
     * Gets as dealerDefinedField7
     *
     * @return string
     */
    public function getDealerDefinedField7()
    {
        return $this->dealerDefinedField7;
    }

    /**
     * Sets a new dealerDefinedField7
     *
     * @param string $dealerDefinedField7
     * @return self
     */
    public function setDealerDefinedField7($dealerDefinedField7)
    {
        $this->dealerDefinedField7 = $dealerDefinedField7;
        return $this;
    }

    /**
     * Gets as dealerDefinedField8
     *
     * @return string
     */
    public function getDealerDefinedField8()
    {
        return $this->dealerDefinedField8;
    }

    /**
     * Sets a new dealerDefinedField8
     *
     * @param string $dealerDefinedField8
     * @return self
     */
    public function setDealerDefinedField8($dealerDefinedField8)
    {
        $this->dealerDefinedField8 = $dealerDefinedField8;
        return $this;
    }

    /**
     * Gets as dealerDefinedOption
     *
     * @return string
     */
    public function getDealerDefinedOption()
    {
        return $this->dealerDefinedOption;
    }

    /**
     * Sets a new dealerDefinedOption
     *
     * @param string $dealerDefinedOption
     * @return self
     */
    public function setDealerDefinedOption($dealerDefinedOption)
    {
        $this->dealerDefinedOption = $dealerDefinedOption;
        return $this;
    }

    /**
     * Gets as dealerDefinedStatus
     *
     * @return string
     */
    public function getDealerDefinedStatus()
    {
        return $this->dealerDefinedStatus;
    }

    /**
     * Sets a new dealerDefinedStatus
     *
     * @param string $dealerDefinedStatus
     * @return self
     */
    public function setDealerDefinedStatus($dealerDefinedStatus)
    {
        $this->dealerDefinedStatus = $dealerDefinedStatus;
        return $this;
    }

    /**
     * Gets as dealerDefinedStatusDescription
     *
     * @return string
     */
    public function getDealerDefinedStatusDescription()
    {
        return $this->dealerDefinedStatusDescription;
    }

    /**
     * Sets a new dealerDefinedStatusDescription
     *
     * @param string $dealerDefinedStatusDescription
     * @return self
     */
    public function setDealerDefinedStatusDescription($dealerDefinedStatusDescription)
    {
        $this->dealerDefinedStatusDescription = $dealerDefinedStatusDescription;
        return $this;
    }

    /**
     * Gets as dealerInventoryBalance
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getDealerInventoryBalance()
    {
        return $this->dealerInventoryBalance;
    }

    /**
     * Sets a new dealerInventoryBalance
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $dealerInventoryBalance
     * @return self
     */
    public function setDealerInventoryBalance(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $dealerInventoryBalance)
    {
        $this->dealerInventoryBalance = $dealerInventoryBalance;
        return $this;
    }

    /**
     * Gets as dealerOptionsTotal
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getDealerOptionsTotal()
    {
        return $this->dealerOptionsTotal;
    }

    /**
     * Sets a new dealerOptionsTotal
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $dealerOptionsTotal
     * @return self
     */
    public function setDealerOptionsTotal(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $dealerOptionsTotal)
    {
        $this->dealerOptionsTotal = $dealerOptionsTotal;
        return $this;
    }

    /**
     * Gets as deliveryDate
     *
     * @return \DateTime
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }

    /**
     * Sets a new deliveryDate
     *
     * @param \DateTime $deliveryDate
     * @return self
     */
    public function setDeliveryDate(\DateTime $deliveryDate)
    {
        $this->deliveryDate = $deliveryDate;
        return $this;
    }

    /**
     * Gets as deliveryMileage
     *
     * @return int
     */
    public function getDeliveryMileage()
    {
        return $this->deliveryMileage;
    }

    /**
     * Sets a new deliveryMileage
     *
     * @param int $deliveryMileage
     * @return self
     */
    public function setDeliveryMileage($deliveryMileage)
    {
        $this->deliveryMileage = $deliveryMileage;
        return $this;
    }

    /**
     * Gets as demoEndDate
     *
     * @return \DateTime
     */
    public function getDemoEndDate()
    {
        return $this->demoEndDate;
    }

    /**
     * Sets a new demoEndDate
     *
     * @param \DateTime $demoEndDate
     * @return self
     */
    public function setDemoEndDate(\DateTime $demoEndDate)
    {
        $this->demoEndDate = $demoEndDate;
        return $this;
    }

    /**
     * Gets as demoPlate
     *
     * @return string
     */
    public function getDemoPlate()
    {
        return $this->demoPlate;
    }

    /**
     * Sets a new demoPlate
     *
     * @param string $demoPlate
     * @return self
     */
    public function setDemoPlate($demoPlate)
    {
        $this->demoPlate = $demoPlate;
        return $this;
    }

    /**
     * Gets as demoStartDate
     *
     * @return \DateTime
     */
    public function getDemoStartDate()
    {
        return $this->demoStartDate;
    }

    /**
     * Sets a new demoStartDate
     *
     * @param \DateTime $demoStartDate
     * @return self
     */
    public function setDemoStartDate(\DateTime $demoStartDate)
    {
        $this->demoStartDate = $demoStartDate;
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
     * Gets as doesBaseCostIncludeHoldback
     *
     * @return bool
     */
    public function getDoesBaseCostIncludeHoldback()
    {
        return $this->doesBaseCostIncludeHoldback;
    }

    /**
     * Sets a new doesBaseCostIncludeHoldback
     *
     * @param bool $doesBaseCostIncludeHoldback
     * @return self
     */
    public function setDoesBaseCostIncludeHoldback($doesBaseCostIncludeHoldback)
    {
        $this->doesBaseCostIncludeHoldback = $doesBaseCostIncludeHoldback;
        return $this;
    }

    /**
     * Gets as doorKeyNumber
     *
     * @return string
     */
    public function getDoorKeyNumber()
    {
        return $this->doorKeyNumber;
    }

    /**
     * Sets a new doorKeyNumber
     *
     * @param string $doorKeyNumber
     * @return self
     */
    public function setDoorKeyNumber($doorKeyNumber)
    {
        $this->doorKeyNumber = $doorKeyNumber;
        return $this;
    }

    /**
     * Gets as doorUnlockCode
     *
     * @return string
     */
    public function getDoorUnlockCode()
    {
        return $this->doorUnlockCode;
    }

    /**
     * Sets a new doorUnlockCode
     *
     * @param string $doorUnlockCode
     * @return self
     */
    public function setDoorUnlockCode($doorUnlockCode)
    {
        $this->doorUnlockCode = $doorUnlockCode;
        return $this;
    }

    /**
     * Gets as downPayment
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getDownPayment()
    {
        return $this->downPayment;
    }

    /**
     * Sets a new downPayment
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $downPayment
     * @return self
     */
    public function setDownPayment(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $downPayment)
    {
        $this->downPayment = $downPayment;
        return $this;
    }

    /**
     * Gets as editedFrom
     *
     * @return string
     */
    public function getEditedFrom()
    {
        return $this->editedFrom;
    }

    /**
     * Sets a new editedFrom
     *
     * @param string $editedFrom
     * @return self
     */
    public function setEditedFrom($editedFrom)
    {
        $this->editedFrom = $editedFrom;
        return $this;
    }

    /**
     * Gets as engineSerialString
     *
     * @return string
     */
    public function getEngineSerialString()
    {
        return $this->engineSerialString;
    }

    /**
     * Sets a new engineSerialString
     *
     * @param string $engineSerialString
     * @return self
     */
    public function setEngineSerialString($engineSerialString)
    {
        $this->engineSerialString = $engineSerialString;
        return $this;
    }

    /**
     * Gets as explodeVin
     *
     * @return bool
     */
    public function getExplodeVin()
    {
        return $this->explodeVin;
    }

    /**
     * Sets a new explodeVin
     *
     * @param bool $explodeVin
     * @return self
     */
    public function setExplodeVin($explodeVin)
    {
        $this->explodeVin = $explodeVin;
        return $this;
    }

    /**
     * Gets as floorAmount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getFloorAmount()
    {
        return $this->floorAmount;
    }

    /**
     * Sets a new floorAmount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $floorAmount
     * @return self
     */
    public function setFloorAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $floorAmount)
    {
        $this->floorAmount = $floorAmount;
        return $this;
    }

    /**
     * Gets as fuelType
     *
     * @return string
     */
    public function getFuelType()
    {
        return $this->fuelType;
    }

    /**
     * Sets a new fuelType
     *
     * @param string $fuelType
     * @return self
     */
    public function setFuelType($fuelType)
    {
        $this->fuelType = $fuelType;
        return $this;
    }

    /**
     * Gets as gLAccount
     *
     * @return string
     */
    public function getGLAccount()
    {
        return $this->gLAccount;
    }

    /**
     * Sets a new gLAccount
     *
     * @param string $gLAccount
     * @return self
     */
    public function setGLAccount($gLAccount)
    {
        $this->gLAccount = $gLAccount;
        return $this;
    }

    /**
     * Gets as gLSaleAccount
     *
     * @return string
     */
    public function getGLSaleAccount()
    {
        return $this->gLSaleAccount;
    }

    /**
     * Sets a new gLSaleAccount
     *
     * @param string $gLSaleAccount
     * @return self
     */
    public function setGLSaleAccount($gLSaleAccount)
    {
        $this->gLSaleAccount = $gLSaleAccount;
        return $this;
    }

    /**
     * Gets as generalJournalAdjustments
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getGeneralJournalAdjustments()
    {
        return $this->generalJournalAdjustments;
    }

    /**
     * Sets a new generalJournalAdjustments
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $generalJournalAdjustments
     * @return self
     */
    public function setGeneralJournalAdjustments(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $generalJournalAdjustments)
    {
        $this->generalJournalAdjustments = $generalJournalAdjustments;
        return $this;
    }

    /**
     * Gets as grossVehicleWeight
     *
     * @return float
     */
    public function getGrossVehicleWeight()
    {
        return $this->grossVehicleWeight;
    }

    /**
     * Sets a new grossVehicleWeight
     *
     * @param float $grossVehicleWeight
     * @return self
     */
    public function setGrossVehicleWeight($grossVehicleWeight)
    {
        $this->grossVehicleWeight = $grossVehicleWeight;
        return $this;
    }

    /**
     * Gets as holdback
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getHoldback()
    {
        return $this->holdback;
    }

    /**
     * Sets a new holdback
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $holdback
     * @return self
     */
    public function setHoldback(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $holdback)
    {
        $this->holdback = $holdback;
        return $this;
    }

    /**
     * Gets as iMilesExceedMechLimit
     *
     * @return int
     */
    public function getIMilesExceedMechLimit()
    {
        return $this->iMilesExceedMechLimit;
    }

    /**
     * Sets a new iMilesExceedMechLimit
     *
     * @param int $iMilesExceedMechLimit
     * @return self
     */
    public function setIMilesExceedMechLimit($iMilesExceedMechLimit)
    {
        $this->iMilesExceedMechLimit = $iMilesExceedMechLimit;
        return $this;
    }

    /**
     * Gets as iMilesExempt
     *
     * @return int
     */
    public function getIMilesExempt()
    {
        return $this->iMilesExempt;
    }

    /**
     * Sets a new iMilesExempt
     *
     * @param int $iMilesExempt
     * @return self
     */
    public function setIMilesExempt($iMilesExempt)
    {
        $this->iMilesExempt = $iMilesExempt;
        return $this;
    }

    /**
     * Gets as importedFrom
     *
     * @return string
     */
    public function getImportedFrom()
    {
        return $this->importedFrom;
    }

    /**
     * Sets a new importedFrom
     *
     * @param string $importedFrom
     * @return self
     */
    public function setImportedFrom($importedFrom)
    {
        $this->importedFrom = $importedFrom;
        return $this;
    }

    /**
     * Gets as inServiceDate
     *
     * @return \DateTime
     */
    public function getInServiceDate()
    {
        return $this->inServiceDate;
    }

    /**
     * Sets a new inServiceDate
     *
     * @param \DateTime $inServiceDate
     * @return self
     */
    public function setInServiceDate(\DateTime $inServiceDate)
    {
        $this->inServiceDate = $inServiceDate;
        return $this;
    }

    /**
     * Gets as interiorColorCode
     *
     * @return string
     */
    public function getInteriorColorCode()
    {
        return $this->interiorColorCode;
    }

    /**
     * Sets a new interiorColorCode
     *
     * @param string $interiorColorCode
     * @return self
     */
    public function setInteriorColorCode($interiorColorCode)
    {
        $this->interiorColorCode = $interiorColorCode;
        return $this;
    }

    /**
     * Gets as internalROCost
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getInternalROCost()
    {
        return $this->internalROCost;
    }

    /**
     * Sets a new internalROCost
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $internalROCost
     * @return self
     */
    public function setInternalROCost(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $internalROCost)
    {
        $this->internalROCost = $internalROCost;
        return $this;
    }

    /**
     * Gets as invoiceBalance
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getInvoiceBalance()
    {
        return $this->invoiceBalance;
    }

    /**
     * Sets a new invoiceBalance
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $invoiceBalance
     * @return self
     */
    public function setInvoiceBalance(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $invoiceBalance)
    {
        $this->invoiceBalance = $invoiceBalance;
        return $this;
    }

    /**
     * Gets as invoiceDate
     *
     * @return \DateTime
     */
    public function getInvoiceDate()
    {
        return $this->invoiceDate;
    }

    /**
     * Sets a new invoiceDate
     *
     * @param \DateTime $invoiceDate
     * @return self
     */
    public function setInvoiceDate(\DateTime $invoiceDate)
    {
        $this->invoiceDate = $invoiceDate;
        return $this;
    }

    /**
     * Gets as invoiceNumber
     *
     * @return string
     */
    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    /**
     * Sets a new invoiceNumber
     *
     * @param string $invoiceNumber
     * @return self
     */
    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;
        return $this;
    }

    /**
     * Gets as invoiceNumberString
     *
     * @return string
     */
    public function getInvoiceNumberString()
    {
        return $this->invoiceNumberString;
    }

    /**
     * Sets a new invoiceNumberString
     *
     * @param string $invoiceNumberString
     * @return self
     */
    public function setInvoiceNumberString($invoiceNumberString)
    {
        $this->invoiceNumberString = $invoiceNumberString;
        return $this;
    }

    /**
     * Gets as isCertifiedPreOwned
     *
     * @return bool
     */
    public function getIsCertifiedPreOwned()
    {
        return $this->isCertifiedPreOwned;
    }

    /**
     * Sets a new isCertifiedPreOwned
     *
     * @param bool $isCertifiedPreOwned
     * @return self
     */
    public function setIsCertifiedPreOwned($isCertifiedPreOwned)
    {
        $this->isCertifiedPreOwned = $isCertifiedPreOwned;
        return $this;
    }

    /**
     * Gets as isDamaged
     *
     * @return bool
     */
    public function getIsDamaged()
    {
        return $this->isDamaged;
    }

    /**
     * Sets a new isDamaged
     *
     * @param bool $isDamaged
     * @return self
     */
    public function setIsDamaged($isDamaged)
    {
        $this->isDamaged = $isDamaged;
        return $this;
    }

    /**
     * Gets as isDemo
     *
     * @return bool
     */
    public function getIsDemo()
    {
        return $this->isDemo;
    }

    /**
     * Sets a new isDemo
     *
     * @param bool $isDemo
     * @return self
     */
    public function setIsDemo($isDemo)
    {
        $this->isDemo = $isDemo;
        return $this;
    }

    /**
     * Gets as isNew
     *
     * @return bool
     */
    public function getIsNew()
    {
        return $this->isNew;
    }

    /**
     * Sets a new isNew
     *
     * @param bool $isNew
     * @return self
     */
    public function setIsNew($isNew)
    {
        $this->isNew = $isNew;
        return $this;
    }

    /**
     * Gets as isSalvaged
     *
     * @return bool
     */
    public function getIsSalvaged()
    {
        return $this->isSalvaged;
    }

    /**
     * Sets a new isSalvaged
     *
     * @param bool $isSalvaged
     * @return self
     */
    public function setIsSalvaged($isSalvaged)
    {
        $this->isSalvaged = $isSalvaged;
        return $this;
    }

    /**
     * Gets as keyNumber
     *
     * @return string
     */
    public function getKeyNumber()
    {
        return $this->keyNumber;
    }

    /**
     * Sets a new keyNumber
     *
     * @param string $keyNumber
     * @return self
     */
    public function setKeyNumber($keyNumber)
    {
        $this->keyNumber = $keyNumber;
        return $this;
    }

    /**
     * Gets as licenseNumberString
     *
     * @return string
     */
    public function getLicenseNumberString()
    {
        return $this->licenseNumberString;
    }

    /**
     * Sets a new licenseNumberString
     *
     * @param string $licenseNumberString
     * @return self
     */
    public function setLicenseNumberString($licenseNumberString)
    {
        $this->licenseNumberString = $licenseNumberString;
        return $this;
    }

    /**
     * Gets as licensePlateState
     *
     * @return string
     */
    public function getLicensePlateState()
    {
        return $this->licensePlateState;
    }

    /**
     * Sets a new licensePlateState
     *
     * @param string $licensePlateState
     * @return self
     */
    public function setLicensePlateState($licensePlateState)
    {
        $this->licensePlateState = $licensePlateState;
        return $this;
    }

    /**
     * Gets as licensingFee
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getLicensingFee()
    {
        return $this->licensingFee;
    }

    /**
     * Sets a new licensingFee
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $licensingFee
     * @return self
     */
    public function setLicensingFee(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $licensingFee)
    {
        $this->licensingFee = $licensingFee;
        return $this;
    }

    /**
     * Gets as makeString
     *
     * @return string
     */
    public function getMakeString()
    {
        return $this->makeString;
    }

    /**
     * Sets a new makeString
     *
     * @param string $makeString
     * @return self
     */
    public function setMakeString($makeString)
    {
        $this->makeString = $makeString;
        return $this;
    }

    /**
     * Gets as modelCode
     *
     * @return string
     */
    public function getModelCode()
    {
        return $this->modelCode;
    }

    /**
     * Sets a new modelCode
     *
     * @param string $modelCode
     * @return self
     */
    public function setModelCode($modelCode)
    {
        $this->modelCode = $modelCode;
        return $this;
    }

    /**
     * Gets as modifiedBy
     *
     * @return string
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    /**
     * Sets a new modifiedBy
     *
     * @param string $modifiedBy
     * @return self
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }

    /**
     * Gets as modifiedStamp
     *
     * @return \DateTime
     */
    public function getModifiedStamp()
    {
        return $this->modifiedStamp;
    }

    /**
     * Sets a new modifiedStamp
     *
     * @param \DateTime $modifiedStamp
     * @return self
     */
    public function setModifiedStamp(\DateTime $modifiedStamp)
    {
        $this->modifiedStamp = $modifiedStamp;
        return $this;
    }

    /**
     * Gets as msrp
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getMsrp()
    {
        return $this->msrp;
    }

    /**
     * Sets a new msrp
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $msrp
     * @return self
     */
    public function setMsrp(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $msrp)
    {
        $this->msrp = $msrp;
        return $this;
    }

    /**
     * Gets as msrpe
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getMsrpe()
    {
        return $this->msrpe;
    }

    /**
     * Sets a new msrpe
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $msrpe
     * @return self
     */
    public function setMsrpe(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $msrpe)
    {
        $this->msrpe = $msrpe;
        return $this;
    }

    /**
     * Gets as numberOfAxles
     *
     * @return int
     */
    public function getNumberOfAxles()
    {
        return $this->numberOfAxles;
    }

    /**
     * Sets a new numberOfAxles
     *
     * @param int $numberOfAxles
     * @return self
     */
    public function setNumberOfAxles($numberOfAxles)
    {
        $this->numberOfAxles = $numberOfAxles;
        return $this;
    }

    /**
     * Adds as option
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Stock\OptionType $option
     */
    public function addToOptions(\App\Soap\dealerbuilt\src\Models\Stock\OptionType $option)
    {
        $this->options[] = $option;
        return $this;
    }

    /**
     * isset options
     *
     * @param int|string $index
     * @return bool
     */
    public function issetOptions($index)
    {
        return isset($this->options[$index]);
    }

    /**
     * unset options
     *
     * @param int|string $index
     * @return void
     */
    public function unsetOptions($index)
    {
        unset($this->options[$index]);
    }

    /**
     * Gets as options
     *
     * @return \App\Soap\dealerbuilt\src\Models\Stock\OptionType[]
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Sets a new options
     *
     * @param \App\Soap\dealerbuilt\src\Models\Stock\OptionType[] $options
     * @return self
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * Gets as otherOptions
     *
     * @return string
     */
    public function getOtherOptions()
    {
        return $this->otherOptions;
    }

    /**
     * Sets a new otherOptions
     *
     * @param string $otherOptions
     * @return self
     */
    public function setOtherOptions($otherOptions)
    {
        $this->otherOptions = $otherOptions;
        return $this;
    }

    /**
     * Gets as pDIDate
     *
     * @return \DateTime
     */
    public function getPDIDate()
    {
        return $this->pDIDate;
    }

    /**
     * Sets a new pDIDate
     *
     * @param \DateTime $pDIDate
     * @return self
     */
    public function setPDIDate(\DateTime $pDIDate)
    {
        $this->pDIDate = $pDIDate;
        return $this;
    }

    /**
     * Gets as pDITechnician
     *
     * @return \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType
     */
    public function getPDITechnician()
    {
        return $this->pDITechnician;
    }

    /**
     * Sets a new pDITechnician
     *
     * @param \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType $pDITechnician
     * @return self
     */
    public function setPDITechnician(\App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType $pDITechnician)
    {
        $this->pDITechnician = $pDITechnician;
        return $this;
    }

    /**
     * Gets as packageDiscount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getPackageDiscount()
    {
        return $this->packageDiscount;
    }

    /**
     * Sets a new packageDiscount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $packageDiscount
     * @return self
     */
    public function setPackageDiscount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $packageDiscount)
    {
        $this->packageDiscount = $packageDiscount;
        return $this;
    }

    /**
     * Gets as payoffLenderName
     *
     * @return string
     */
    public function getPayoffLenderName()
    {
        return $this->payoffLenderName;
    }

    /**
     * Sets a new payoffLenderName
     *
     * @param string $payoffLenderName
     * @return self
     */
    public function setPayoffLenderName($payoffLenderName)
    {
        $this->payoffLenderName = $payoffLenderName;
        return $this;
    }

    /**
     * Gets as postedDate
     *
     * @return \DateTime
     */
    public function getPostedDate()
    {
        return $this->postedDate;
    }

    /**
     * Sets a new postedDate
     *
     * @param \DateTime $postedDate
     * @return self
     */
    public function setPostedDate(\DateTime $postedDate)
    {
        $this->postedDate = $postedDate;
        return $this;
    }

    /**
     * Gets as price
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets a new price
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $price
     * @return self
     */
    public function setPrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Gets as promoteStatus
     *
     * @return bool
     */
    public function getPromoteStatus()
    {
        return $this->promoteStatus;
    }

    /**
     * Sets a new promoteStatus
     *
     * @param bool $promoteStatus
     * @return self
     */
    public function setPromoteStatus($promoteStatus)
    {
        $this->promoteStatus = $promoteStatus;
        return $this;
    }

    /**
     * Gets as rebates
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getRebates()
    {
        return $this->rebates;
    }

    /**
     * Sets a new rebates
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $rebates
     * @return self
     */
    public function setRebates(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $rebates)
    {
        $this->rebates = $rebates;
        return $this;
    }

    /**
     * Gets as regularPrice
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getRegularPrice()
    {
        return $this->regularPrice;
    }

    /**
     * Sets a new regularPrice
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $regularPrice
     * @return self
     */
    public function setRegularPrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $regularPrice)
    {
        $this->regularPrice = $regularPrice;
        return $this;
    }

    /**
     * Gets as source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Sets a new source
     *
     * @param string $source
     * @return self
     */
    public function setSource($source)
    {
        $this->source = $source;
        return $this;
    }

    /**
     * Gets as status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets a new status
     *
     * @param string $status
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Gets as stockDataAttributes
     *
     * @return \App\Soap\dealerbuilt\src\Models\Stock\StockItemDataAttributesType
     */
    public function getStockDataAttributes()
    {
        return $this->stockDataAttributes;
    }

    /**
     * Sets a new stockDataAttributes
     *
     * @param \App\Soap\dealerbuilt\src\Models\Stock\StockItemDataAttributesType $stockDataAttributes
     * @return self
     */
    public function setStockDataAttributes(\App\Soap\dealerbuilt\src\Models\Stock\StockItemDataAttributesType $stockDataAttributes)
    {
        $this->stockDataAttributes = $stockDataAttributes;
        return $this;
    }

    /**
     * Gets as stockNumber
     *
     * @return string
     */
    public function getStockNumber()
    {
        return $this->stockNumber;
    }

    /**
     * Sets a new stockNumber
     *
     * @param string $stockNumber
     * @return self
     */
    public function setStockNumber($stockNumber)
    {
        $this->stockNumber = $stockNumber;
        return $this;
    }

    /**
     * Gets as totalFacOptsRetail
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTotalFacOptsRetail()
    {
        return $this->totalFacOptsRetail;
    }

    /**
     * Sets a new totalFacOptsRetail
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalFacOptsRetail
     * @return self
     */
    public function setTotalFacOptsRetail(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalFacOptsRetail)
    {
        $this->totalFacOptsRetail = $totalFacOptsRetail;
        return $this;
    }

    /**
     * Gets as trimCode
     *
     * @return string
     */
    public function getTrimCode()
    {
        return $this->trimCode;
    }

    /**
     * Sets a new trimCode
     *
     * @param string $trimCode
     * @return self
     */
    public function setTrimCode($trimCode)
    {
        $this->trimCode = $trimCode;
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

    /**
     * Adds as option
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Stock\OptionType $option
     */
    public function addToVehicleOptions(\App\Soap\dealerbuilt\src\Models\Stock\OptionType $option)
    {
        $this->vehicleOptions[] = $option;
        return $this;
    }

    /**
     * isset vehicleOptions
     *
     * @param int|string $index
     * @return bool
     */
    public function issetVehicleOptions($index)
    {
        return isset($this->vehicleOptions[$index]);
    }

    /**
     * unset vehicleOptions
     *
     * @param int|string $index
     * @return void
     */
    public function unsetVehicleOptions($index)
    {
        unset($this->vehicleOptions[$index]);
    }

    /**
     * Gets as vehicleOptions
     *
     * @return \App\Soap\dealerbuilt\src\Models\Stock\OptionType[]
     */
    public function getVehicleOptions()
    {
        return $this->vehicleOptions;
    }

    /**
     * Sets a new vehicleOptions
     *
     * @param \App\Soap\dealerbuilt\src\Models\Stock\OptionType[] $vehicleOptions
     * @return self
     */
    public function setVehicleOptions(array $vehicleOptions)
    {
        $this->vehicleOptions = $vehicleOptions;
        return $this;
    }

    /**
     * Gets as vehiclePromoteStatus
     *
     * @return string
     */
    public function getVehiclePromoteStatus()
    {
        return $this->vehiclePromoteStatus;
    }

    /**
     * Sets a new vehiclePromoteStatus
     *
     * @param string $vehiclePromoteStatus
     * @return self
     */
    public function setVehiclePromoteStatus($vehiclePromoteStatus)
    {
        $this->vehiclePromoteStatus = $vehiclePromoteStatus;
        return $this;
    }

    /**
     * Gets as wholesalePrice
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getWholesalePrice()
    {
        return $this->wholesalePrice;
    }

    /**
     * Sets a new wholesalePrice
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $wholesalePrice
     * @return self
     */
    public function setWholesalePrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $wholesalePrice)
    {
        $this->wholesalePrice = $wholesalePrice;
        return $this;
    }

    /**
     * Gets as writeDown
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getWriteDown()
    {
        return $this->writeDown;
    }

    /**
     * Sets a new writeDown
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $writeDown
     * @return self
     */
    public function setWriteDown(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $writeDown)
    {
        $this->writeDown = $writeDown;
        return $this;
    }


}


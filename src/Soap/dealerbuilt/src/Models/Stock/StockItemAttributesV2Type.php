<?php

namespace App\Soap\dealerbuilt\src\Models\Stock;

/**
 * Class representing StockItemAttributesV2Type.
 *
 * XSD Type: StockItemAttributesV2
 */
class StockItemAttributesV2Type
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $accumulatedBalance = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $advertisedSalePrice = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $advertisingCost = null;

    /**
     * @var string
     */
    private $advertisingDescription = null;

    /**
     * @var string
     */
    private $appraiserId = null;

    /**
     * @var string
     */
    private $availability = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $baseMsrp = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $baseRetailPrice = null;

    /**
     * @var string
     */
    private $bodyStyle = null;

    /**
     * @var string
     */
    private $bodyStyleCode = null;

    /**
     * @var int
     */
    private $bookRetail = null;

    /**
     * @var int
     */
    private $bookWholeSale = null;

    /**
     * @var string
     */
    private $colorCode = null;

    /**
     * @var string
     */
    private $colorCode2 = null;

    /**
     * @var string
     */
    private $comments = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $cost = null;

    /**
     * @var \DateTime
     */
    private $dateCleared = null;

    /**
     * @var \DateTime
     */
    private $dateInspected = null;

    /**
     * @var \DateTime
     */
    private $datePosted = null;

    /**
     * @var \DateTime
     */
    private $dateReceived = null;

    /**
     * @var \DateTime
     */
    private $dateSold = null;

    /**
     * @var string
     */
    private $dealerDefineListCode1 = null;

    /**
     * @var bool
     */
    private $dealerDefinedBoolean1 = null;

    /**
     * @var bool
     */
    private $dealerDefinedBoolean2 = null;

    /**
     * @var bool
     */
    private $dealerDefinedBoolean3 = null;

    /**
     * @var bool
     */
    private $dealerDefinedBoolean4 = null;

    /**
     * @var string
     */
    private $dealerDefinedField1 = null;

    /**
     * @var string
     */
    private $dealerDefinedField2 = null;

    /**
     * @var string
     */
    private $dealerDefinedField3 = null;

    /**
     * @var string
     */
    private $dealerDefinedField4 = null;

    /**
     * @var string
     */
    private $dealerDefinedField5 = null;

    /**
     * @var string
     */
    private $dealerDefinedField6 = null;

    /**
     * @var string
     */
    private $dealerDefinedField7 = null;

    /**
     * @var string
     */
    private $dealerDefinedField8 = null;

    /**
     * @var string
     */
    private $dealerDefinedOption = null;

    /**
     * @var string
     */
    private $dealerDefinedStatus = null;

    /**
     * @var string
     */
    private $dealerDefinedStatusDescription = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $dealerInventoryBalance = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $dealerOptionsTotal = null;

    /**
     * @var \DateTime
     */
    private $deliveryDate = null;

    /**
     * @var int
     */
    private $deliveryMileage = null;

    /**
     * @var \DateTime
     */
    private $demoEndDate = null;

    /**
     * @var string
     */
    private $demoPlate = null;

    /**
     * @var \DateTime
     */
    private $demoStartDate = null;

    /**
     * @var string
     */
    private $description = null;

    /**
     * @var bool
     */
    private $doesBaseCostIncludeHoldback = null;

    /**
     * @var string
     */
    private $doorKeyNumber = null;

    /**
     * @var string
     */
    private $doorUnlockCode = null;

    /**
     * @var string
     */
    private $editedFrom = null;

    /**
     * @var string
     */
    private $engineSerialString = null;

    /**
     * @var int
     */
    private $explodeVin = null;

    /**
     * @var string
     */
    private $factoryExteriorColor2 = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $floorAmount = null;

    /**
     * @var string
     */
    private $fuelType = null;

    /**
     * @var string
     */
    private $gLAccount = null;

    /**
     * @var string
     */
    private $gLSaleAccount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $generalJournalAdjustments = null;

    /**
     * @var float
     */
    private $grossVehicleWeight = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $holdback = null;

    /**
     * @var string
     */
    private $importedFrom = null;

    /**
     * @var \DateTime
     */
    private $inServiceDate = null;

    /**
     * @var string
     */
    private $interiorColorCode = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $internalROCost = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $invoiceBalance = null;

    /**
     * @var \DateTime
     */
    private $invoiceDate = null;

    /**
     * @var string
     */
    private $invoiceNumber = null;

    /**
     * @var string
     */
    private $invoiceNumberString = null;

    /**
     * @var int
     */
    private $irtiPromoted = null;

    /**
     * @var bool
     */
    private $isCertifiedPreOwned = null;

    /**
     * @var bool
     */
    private $isDamaged = null;

    /**
     * @var bool
     */
    private $isDemo = null;

    /**
     * @var bool
     */
    private $isNew = null;

    /**
     * @var bool
     */
    private $isSalvaged = null;

    /**
     * @var string
     */
    private $keyNumber = null;

    /**
     * @var string
     */
    private $licensePlateState = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $licensingFee = null;

    /**
     * @var string
     */
    private $modelCode = null;

    /**
     * @var string
     */
    private $modifiedBy = null;

    /**
     * @var \DateTime
     */
    private $modifiedStamp = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $msrp = null;

    /**
     * @var int
     */
    private $nadaRetail = null;

    /**
     * @var int
     */
    private $nadaTrade = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Stock\OptionType[]
     */
    private $options = null;

    /**
     * @var string
     */
    private $otherOptions = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $ovAdvertisedSalePrice = null;

    /**
     * @var \DateTime
     */
    private $pDIDate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType
     */
    private $pDITechnician = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $packageDiscount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $payFrom = null;

    /**
     * @var string
     */
    private $payoffLenderName = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $pendingBid = null;

    /**
     * @var \DateTime
     */
    private $postedDate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $price = null;

    /**
     * @var bool
     */
    private $promoteStatus = null;

    /**
     * @var string
     */
    private $purchaseOrderMemo = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $rebates = null;

    /**
     * @var string
     */
    private $source = null;

    /**
     * @var string
     */
    private $status = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Stock\StockItemDataAttributesType
     */
    private $stockDataAttributes = null;

    /**
     * @var string
     */
    private $stockNumber = null;

    /**
     * @var string
     */
    private $subType = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $totalFacOptsCost = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $totalFacOptsRetail = null;

    /**
     * @var string
     */
    private $trimCode = null;

    /**
     * @var string
     */
    private $type = null;

    /**
     * @var string
     */
    private $vehiclePromoteStatus = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $wholesalePrice = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $writeDown = null;

    /**
     * Gets as accumulatedBalance.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getAccumulatedBalance()
    {
        return $this->accumulatedBalance;
    }

    /**
     * Sets a new accumulatedBalance.
     *
     * @return self
     */
    public function setAccumulatedBalance(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $accumulatedBalance)
    {
        $this->accumulatedBalance = $accumulatedBalance;

        return $this;
    }

    /**
     * Gets as advertisedSalePrice.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getAdvertisedSalePrice()
    {
        return $this->advertisedSalePrice;
    }

    /**
     * Sets a new advertisedSalePrice.
     *
     * @return self
     */
    public function setAdvertisedSalePrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $advertisedSalePrice)
    {
        $this->advertisedSalePrice = $advertisedSalePrice;

        return $this;
    }

    /**
     * Gets as advertisingCost.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getAdvertisingCost()
    {
        return $this->advertisingCost;
    }

    /**
     * Sets a new advertisingCost.
     *
     * @return self
     */
    public function setAdvertisingCost(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $advertisingCost)
    {
        $this->advertisingCost = $advertisingCost;

        return $this;
    }

    /**
     * Gets as advertisingDescription.
     *
     * @return string
     */
    public function getAdvertisingDescription()
    {
        return $this->advertisingDescription;
    }

    /**
     * Sets a new advertisingDescription.
     *
     * @param string $advertisingDescription
     *
     * @return self
     */
    public function setAdvertisingDescription($advertisingDescription)
    {
        $this->advertisingDescription = $advertisingDescription;

        return $this;
    }

    /**
     * Gets as appraiserId.
     *
     * @return string
     */
    public function getAppraiserId()
    {
        return $this->appraiserId;
    }

    /**
     * Sets a new appraiserId.
     *
     * @param string $appraiserId
     *
     * @return self
     */
    public function setAppraiserId($appraiserId)
    {
        $this->appraiserId = $appraiserId;

        return $this;
    }

    /**
     * Gets as availability.
     *
     * @return string
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * Sets a new availability.
     *
     * @param string $availability
     *
     * @return self
     */
    public function setAvailability($availability)
    {
        $this->availability = $availability;

        return $this;
    }

    /**
     * Gets as baseMsrp.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getBaseMsrp()
    {
        return $this->baseMsrp;
    }

    /**
     * Sets a new baseMsrp.
     *
     * @return self
     */
    public function setBaseMsrp(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $baseMsrp)
    {
        $this->baseMsrp = $baseMsrp;

        return $this;
    }

    /**
     * Gets as baseRetailPrice.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getBaseRetailPrice()
    {
        return $this->baseRetailPrice;
    }

    /**
     * Sets a new baseRetailPrice.
     *
     * @return self
     */
    public function setBaseRetailPrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $baseRetailPrice)
    {
        $this->baseRetailPrice = $baseRetailPrice;

        return $this;
    }

    /**
     * Gets as bodyStyle.
     *
     * @return string
     */
    public function getBodyStyle()
    {
        return $this->bodyStyle;
    }

    /**
     * Sets a new bodyStyle.
     *
     * @param string $bodyStyle
     *
     * @return self
     */
    public function setBodyStyle($bodyStyle)
    {
        $this->bodyStyle = $bodyStyle;

        return $this;
    }

    /**
     * Gets as bodyStyleCode.
     *
     * @return string
     */
    public function getBodyStyleCode()
    {
        return $this->bodyStyleCode;
    }

    /**
     * Sets a new bodyStyleCode.
     *
     * @param string $bodyStyleCode
     *
     * @return self
     */
    public function setBodyStyleCode($bodyStyleCode)
    {
        $this->bodyStyleCode = $bodyStyleCode;

        return $this;
    }

    /**
     * Gets as bookRetail.
     *
     * @return int
     */
    public function getBookRetail()
    {
        return $this->bookRetail;
    }

    /**
     * Sets a new bookRetail.
     *
     * @param int $bookRetail
     *
     * @return self
     */
    public function setBookRetail($bookRetail)
    {
        $this->bookRetail = $bookRetail;

        return $this;
    }

    /**
     * Gets as bookWholeSale.
     *
     * @return int
     */
    public function getBookWholeSale()
    {
        return $this->bookWholeSale;
    }

    /**
     * Sets a new bookWholeSale.
     *
     * @param int $bookWholeSale
     *
     * @return self
     */
    public function setBookWholeSale($bookWholeSale)
    {
        $this->bookWholeSale = $bookWholeSale;

        return $this;
    }

    /**
     * Gets as colorCode.
     *
     * @return string
     */
    public function getColorCode()
    {
        return $this->colorCode;
    }

    /**
     * Sets a new colorCode.
     *
     * @param string $colorCode
     *
     * @return self
     */
    public function setColorCode($colorCode)
    {
        $this->colorCode = $colorCode;

        return $this;
    }

    /**
     * Gets as colorCode2.
     *
     * @return string
     */
    public function getColorCode2()
    {
        return $this->colorCode2;
    }

    /**
     * Sets a new colorCode2.
     *
     * @param string $colorCode2
     *
     * @return self
     */
    public function setColorCode2($colorCode2)
    {
        $this->colorCode2 = $colorCode2;

        return $this;
    }

    /**
     * Gets as comments.
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Sets a new comments.
     *
     * @param string $comments
     *
     * @return self
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

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
     * Gets as dateCleared.
     *
     * @return \DateTime
     */
    public function getDateCleared()
    {
        return $this->dateCleared;
    }

    /**
     * Sets a new dateCleared.
     *
     * @return self
     */
    public function setDateCleared(\DateTime $dateCleared)
    {
        $this->dateCleared = $dateCleared;

        return $this;
    }

    /**
     * Gets as dateInspected.
     *
     * @return \DateTime
     */
    public function getDateInspected()
    {
        return $this->dateInspected;
    }

    /**
     * Sets a new dateInspected.
     *
     * @return self
     */
    public function setDateInspected(\DateTime $dateInspected)
    {
        $this->dateInspected = $dateInspected;

        return $this;
    }

    /**
     * Gets as datePosted.
     *
     * @return \DateTime
     */
    public function getDatePosted()
    {
        return $this->datePosted;
    }

    /**
     * Sets a new datePosted.
     *
     * @return self
     */
    public function setDatePosted(\DateTime $datePosted)
    {
        $this->datePosted = $datePosted;

        return $this;
    }

    /**
     * Gets as dateReceived.
     *
     * @return \DateTime
     */
    public function getDateReceived()
    {
        return $this->dateReceived;
    }

    /**
     * Sets a new dateReceived.
     *
     * @return self
     */
    public function setDateReceived(\DateTime $dateReceived)
    {
        $this->dateReceived = $dateReceived;

        return $this;
    }

    /**
     * Gets as dateSold.
     *
     * @return \DateTime
     */
    public function getDateSold()
    {
        return $this->dateSold;
    }

    /**
     * Sets a new dateSold.
     *
     * @return self
     */
    public function setDateSold(\DateTime $dateSold)
    {
        $this->dateSold = $dateSold;

        return $this;
    }

    /**
     * Gets as dealerDefineListCode1.
     *
     * @return string
     */
    public function getDealerDefineListCode1()
    {
        return $this->dealerDefineListCode1;
    }

    /**
     * Sets a new dealerDefineListCode1.
     *
     * @param string $dealerDefineListCode1
     *
     * @return self
     */
    public function setDealerDefineListCode1($dealerDefineListCode1)
    {
        $this->dealerDefineListCode1 = $dealerDefineListCode1;

        return $this;
    }

    /**
     * Gets as dealerDefinedBoolean1.
     *
     * @return bool
     */
    public function getDealerDefinedBoolean1()
    {
        return $this->dealerDefinedBoolean1;
    }

    /**
     * Sets a new dealerDefinedBoolean1.
     *
     * @param bool $dealerDefinedBoolean1
     *
     * @return self
     */
    public function setDealerDefinedBoolean1($dealerDefinedBoolean1)
    {
        $this->dealerDefinedBoolean1 = $dealerDefinedBoolean1;

        return $this;
    }

    /**
     * Gets as dealerDefinedBoolean2.
     *
     * @return bool
     */
    public function getDealerDefinedBoolean2()
    {
        return $this->dealerDefinedBoolean2;
    }

    /**
     * Sets a new dealerDefinedBoolean2.
     *
     * @param bool $dealerDefinedBoolean2
     *
     * @return self
     */
    public function setDealerDefinedBoolean2($dealerDefinedBoolean2)
    {
        $this->dealerDefinedBoolean2 = $dealerDefinedBoolean2;

        return $this;
    }

    /**
     * Gets as dealerDefinedBoolean3.
     *
     * @return bool
     */
    public function getDealerDefinedBoolean3()
    {
        return $this->dealerDefinedBoolean3;
    }

    /**
     * Sets a new dealerDefinedBoolean3.
     *
     * @param bool $dealerDefinedBoolean3
     *
     * @return self
     */
    public function setDealerDefinedBoolean3($dealerDefinedBoolean3)
    {
        $this->dealerDefinedBoolean3 = $dealerDefinedBoolean3;

        return $this;
    }

    /**
     * Gets as dealerDefinedBoolean4.
     *
     * @return bool
     */
    public function getDealerDefinedBoolean4()
    {
        return $this->dealerDefinedBoolean4;
    }

    /**
     * Sets a new dealerDefinedBoolean4.
     *
     * @param bool $dealerDefinedBoolean4
     *
     * @return self
     */
    public function setDealerDefinedBoolean4($dealerDefinedBoolean4)
    {
        $this->dealerDefinedBoolean4 = $dealerDefinedBoolean4;

        return $this;
    }

    /**
     * Gets as dealerDefinedField1.
     *
     * @return string
     */
    public function getDealerDefinedField1()
    {
        return $this->dealerDefinedField1;
    }

    /**
     * Sets a new dealerDefinedField1.
     *
     * @param string $dealerDefinedField1
     *
     * @return self
     */
    public function setDealerDefinedField1($dealerDefinedField1)
    {
        $this->dealerDefinedField1 = $dealerDefinedField1;

        return $this;
    }

    /**
     * Gets as dealerDefinedField2.
     *
     * @return string
     */
    public function getDealerDefinedField2()
    {
        return $this->dealerDefinedField2;
    }

    /**
     * Sets a new dealerDefinedField2.
     *
     * @param string $dealerDefinedField2
     *
     * @return self
     */
    public function setDealerDefinedField2($dealerDefinedField2)
    {
        $this->dealerDefinedField2 = $dealerDefinedField2;

        return $this;
    }

    /**
     * Gets as dealerDefinedField3.
     *
     * @return string
     */
    public function getDealerDefinedField3()
    {
        return $this->dealerDefinedField3;
    }

    /**
     * Sets a new dealerDefinedField3.
     *
     * @param string $dealerDefinedField3
     *
     * @return self
     */
    public function setDealerDefinedField3($dealerDefinedField3)
    {
        $this->dealerDefinedField3 = $dealerDefinedField3;

        return $this;
    }

    /**
     * Gets as dealerDefinedField4.
     *
     * @return string
     */
    public function getDealerDefinedField4()
    {
        return $this->dealerDefinedField4;
    }

    /**
     * Sets a new dealerDefinedField4.
     *
     * @param string $dealerDefinedField4
     *
     * @return self
     */
    public function setDealerDefinedField4($dealerDefinedField4)
    {
        $this->dealerDefinedField4 = $dealerDefinedField4;

        return $this;
    }

    /**
     * Gets as dealerDefinedField5.
     *
     * @return string
     */
    public function getDealerDefinedField5()
    {
        return $this->dealerDefinedField5;
    }

    /**
     * Sets a new dealerDefinedField5.
     *
     * @param string $dealerDefinedField5
     *
     * @return self
     */
    public function setDealerDefinedField5($dealerDefinedField5)
    {
        $this->dealerDefinedField5 = $dealerDefinedField5;

        return $this;
    }

    /**
     * Gets as dealerDefinedField6.
     *
     * @return string
     */
    public function getDealerDefinedField6()
    {
        return $this->dealerDefinedField6;
    }

    /**
     * Sets a new dealerDefinedField6.
     *
     * @param string $dealerDefinedField6
     *
     * @return self
     */
    public function setDealerDefinedField6($dealerDefinedField6)
    {
        $this->dealerDefinedField6 = $dealerDefinedField6;

        return $this;
    }

    /**
     * Gets as dealerDefinedField7.
     *
     * @return string
     */
    public function getDealerDefinedField7()
    {
        return $this->dealerDefinedField7;
    }

    /**
     * Sets a new dealerDefinedField7.
     *
     * @param string $dealerDefinedField7
     *
     * @return self
     */
    public function setDealerDefinedField7($dealerDefinedField7)
    {
        $this->dealerDefinedField7 = $dealerDefinedField7;

        return $this;
    }

    /**
     * Gets as dealerDefinedField8.
     *
     * @return string
     */
    public function getDealerDefinedField8()
    {
        return $this->dealerDefinedField8;
    }

    /**
     * Sets a new dealerDefinedField8.
     *
     * @param string $dealerDefinedField8
     *
     * @return self
     */
    public function setDealerDefinedField8($dealerDefinedField8)
    {
        $this->dealerDefinedField8 = $dealerDefinedField8;

        return $this;
    }

    /**
     * Gets as dealerDefinedOption.
     *
     * @return string
     */
    public function getDealerDefinedOption()
    {
        return $this->dealerDefinedOption;
    }

    /**
     * Sets a new dealerDefinedOption.
     *
     * @param string $dealerDefinedOption
     *
     * @return self
     */
    public function setDealerDefinedOption($dealerDefinedOption)
    {
        $this->dealerDefinedOption = $dealerDefinedOption;

        return $this;
    }

    /**
     * Gets as dealerDefinedStatus.
     *
     * @return string
     */
    public function getDealerDefinedStatus()
    {
        return $this->dealerDefinedStatus;
    }

    /**
     * Sets a new dealerDefinedStatus.
     *
     * @param string $dealerDefinedStatus
     *
     * @return self
     */
    public function setDealerDefinedStatus($dealerDefinedStatus)
    {
        $this->dealerDefinedStatus = $dealerDefinedStatus;

        return $this;
    }

    /**
     * Gets as dealerDefinedStatusDescription.
     *
     * @return string
     */
    public function getDealerDefinedStatusDescription()
    {
        return $this->dealerDefinedStatusDescription;
    }

    /**
     * Sets a new dealerDefinedStatusDescription.
     *
     * @param string $dealerDefinedStatusDescription
     *
     * @return self
     */
    public function setDealerDefinedStatusDescription($dealerDefinedStatusDescription)
    {
        $this->dealerDefinedStatusDescription = $dealerDefinedStatusDescription;

        return $this;
    }

    /**
     * Gets as dealerInventoryBalance.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getDealerInventoryBalance()
    {
        return $this->dealerInventoryBalance;
    }

    /**
     * Sets a new dealerInventoryBalance.
     *
     * @return self
     */
    public function setDealerInventoryBalance(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $dealerInventoryBalance)
    {
        $this->dealerInventoryBalance = $dealerInventoryBalance;

        return $this;
    }

    /**
     * Gets as dealerOptionsTotal.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getDealerOptionsTotal()
    {
        return $this->dealerOptionsTotal;
    }

    /**
     * Sets a new dealerOptionsTotal.
     *
     * @return self
     */
    public function setDealerOptionsTotal(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $dealerOptionsTotal)
    {
        $this->dealerOptionsTotal = $dealerOptionsTotal;

        return $this;
    }

    /**
     * Gets as deliveryDate.
     *
     * @return \DateTime
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }

    /**
     * Sets a new deliveryDate.
     *
     * @return self
     */
    public function setDeliveryDate(\DateTime $deliveryDate)
    {
        $this->deliveryDate = $deliveryDate;

        return $this;
    }

    /**
     * Gets as deliveryMileage.
     *
     * @return int
     */
    public function getDeliveryMileage()
    {
        return $this->deliveryMileage;
    }

    /**
     * Sets a new deliveryMileage.
     *
     * @param int $deliveryMileage
     *
     * @return self
     */
    public function setDeliveryMileage($deliveryMileage)
    {
        $this->deliveryMileage = $deliveryMileage;

        return $this;
    }

    /**
     * Gets as demoEndDate.
     *
     * @return \DateTime
     */
    public function getDemoEndDate()
    {
        return $this->demoEndDate;
    }

    /**
     * Sets a new demoEndDate.
     *
     * @return self
     */
    public function setDemoEndDate(\DateTime $demoEndDate)
    {
        $this->demoEndDate = $demoEndDate;

        return $this;
    }

    /**
     * Gets as demoPlate.
     *
     * @return string
     */
    public function getDemoPlate()
    {
        return $this->demoPlate;
    }

    /**
     * Sets a new demoPlate.
     *
     * @param string $demoPlate
     *
     * @return self
     */
    public function setDemoPlate($demoPlate)
    {
        $this->demoPlate = $demoPlate;

        return $this;
    }

    /**
     * Gets as demoStartDate.
     *
     * @return \DateTime
     */
    public function getDemoStartDate()
    {
        return $this->demoStartDate;
    }

    /**
     * Sets a new demoStartDate.
     *
     * @return self
     */
    public function setDemoStartDate(\DateTime $demoStartDate)
    {
        $this->demoStartDate = $demoStartDate;

        return $this;
    }

    /**
     * Gets as description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets a new description.
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets as doesBaseCostIncludeHoldback.
     *
     * @return bool
     */
    public function getDoesBaseCostIncludeHoldback()
    {
        return $this->doesBaseCostIncludeHoldback;
    }

    /**
     * Sets a new doesBaseCostIncludeHoldback.
     *
     * @param bool $doesBaseCostIncludeHoldback
     *
     * @return self
     */
    public function setDoesBaseCostIncludeHoldback($doesBaseCostIncludeHoldback)
    {
        $this->doesBaseCostIncludeHoldback = $doesBaseCostIncludeHoldback;

        return $this;
    }

    /**
     * Gets as doorKeyNumber.
     *
     * @return string
     */
    public function getDoorKeyNumber()
    {
        return $this->doorKeyNumber;
    }

    /**
     * Sets a new doorKeyNumber.
     *
     * @param string $doorKeyNumber
     *
     * @return self
     */
    public function setDoorKeyNumber($doorKeyNumber)
    {
        $this->doorKeyNumber = $doorKeyNumber;

        return $this;
    }

    /**
     * Gets as doorUnlockCode.
     *
     * @return string
     */
    public function getDoorUnlockCode()
    {
        return $this->doorUnlockCode;
    }

    /**
     * Sets a new doorUnlockCode.
     *
     * @param string $doorUnlockCode
     *
     * @return self
     */
    public function setDoorUnlockCode($doorUnlockCode)
    {
        $this->doorUnlockCode = $doorUnlockCode;

        return $this;
    }

    /**
     * Gets as editedFrom.
     *
     * @return string
     */
    public function getEditedFrom()
    {
        return $this->editedFrom;
    }

    /**
     * Sets a new editedFrom.
     *
     * @param string $editedFrom
     *
     * @return self
     */
    public function setEditedFrom($editedFrom)
    {
        $this->editedFrom = $editedFrom;

        return $this;
    }

    /**
     * Gets as engineSerialString.
     *
     * @return string
     */
    public function getEngineSerialString()
    {
        return $this->engineSerialString;
    }

    /**
     * Sets a new engineSerialString.
     *
     * @param string $engineSerialString
     *
     * @return self
     */
    public function setEngineSerialString($engineSerialString)
    {
        $this->engineSerialString = $engineSerialString;

        return $this;
    }

    /**
     * Gets as explodeVin.
     *
     * @return int
     */
    public function getExplodeVin()
    {
        return $this->explodeVin;
    }

    /**
     * Sets a new explodeVin.
     *
     * @param int $explodeVin
     *
     * @return self
     */
    public function setExplodeVin($explodeVin)
    {
        $this->explodeVin = $explodeVin;

        return $this;
    }

    /**
     * Gets as factoryExteriorColor2.
     *
     * @return string
     */
    public function getFactoryExteriorColor2()
    {
        return $this->factoryExteriorColor2;
    }

    /**
     * Sets a new factoryExteriorColor2.
     *
     * @param string $factoryExteriorColor2
     *
     * @return self
     */
    public function setFactoryExteriorColor2($factoryExteriorColor2)
    {
        $this->factoryExteriorColor2 = $factoryExteriorColor2;

        return $this;
    }

    /**
     * Gets as floorAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getFloorAmount()
    {
        return $this->floorAmount;
    }

    /**
     * Sets a new floorAmount.
     *
     * @return self
     */
    public function setFloorAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $floorAmount)
    {
        $this->floorAmount = $floorAmount;

        return $this;
    }

    /**
     * Gets as fuelType.
     *
     * @return string
     */
    public function getFuelType()
    {
        return $this->fuelType;
    }

    /**
     * Sets a new fuelType.
     *
     * @param string $fuelType
     *
     * @return self
     */
    public function setFuelType($fuelType)
    {
        $this->fuelType = $fuelType;

        return $this;
    }

    /**
     * Gets as gLAccount.
     *
     * @return string
     */
    public function getGLAccount()
    {
        return $this->gLAccount;
    }

    /**
     * Sets a new gLAccount.
     *
     * @param string $gLAccount
     *
     * @return self
     */
    public function setGLAccount($gLAccount)
    {
        $this->gLAccount = $gLAccount;

        return $this;
    }

    /**
     * Gets as gLSaleAccount.
     *
     * @return string
     */
    public function getGLSaleAccount()
    {
        return $this->gLSaleAccount;
    }

    /**
     * Sets a new gLSaleAccount.
     *
     * @param string $gLSaleAccount
     *
     * @return self
     */
    public function setGLSaleAccount($gLSaleAccount)
    {
        $this->gLSaleAccount = $gLSaleAccount;

        return $this;
    }

    /**
     * Gets as generalJournalAdjustments.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getGeneralJournalAdjustments()
    {
        return $this->generalJournalAdjustments;
    }

    /**
     * Sets a new generalJournalAdjustments.
     *
     * @return self
     */
    public function setGeneralJournalAdjustments(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $generalJournalAdjustments)
    {
        $this->generalJournalAdjustments = $generalJournalAdjustments;

        return $this;
    }

    /**
     * Gets as grossVehicleWeight.
     *
     * @return float
     */
    public function getGrossVehicleWeight()
    {
        return $this->grossVehicleWeight;
    }

    /**
     * Sets a new grossVehicleWeight.
     *
     * @param float $grossVehicleWeight
     *
     * @return self
     */
    public function setGrossVehicleWeight($grossVehicleWeight)
    {
        $this->grossVehicleWeight = $grossVehicleWeight;

        return $this;
    }

    /**
     * Gets as holdback.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getHoldback()
    {
        return $this->holdback;
    }

    /**
     * Sets a new holdback.
     *
     * @return self
     */
    public function setHoldback(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $holdback)
    {
        $this->holdback = $holdback;

        return $this;
    }

    /**
     * Gets as importedFrom.
     *
     * @return string
     */
    public function getImportedFrom()
    {
        return $this->importedFrom;
    }

    /**
     * Sets a new importedFrom.
     *
     * @param string $importedFrom
     *
     * @return self
     */
    public function setImportedFrom($importedFrom)
    {
        $this->importedFrom = $importedFrom;

        return $this;
    }

    /**
     * Gets as inServiceDate.
     *
     * @return \DateTime
     */
    public function getInServiceDate()
    {
        return $this->inServiceDate;
    }

    /**
     * Sets a new inServiceDate.
     *
     * @return self
     */
    public function setInServiceDate(\DateTime $inServiceDate)
    {
        $this->inServiceDate = $inServiceDate;

        return $this;
    }

    /**
     * Gets as interiorColorCode.
     *
     * @return string
     */
    public function getInteriorColorCode()
    {
        return $this->interiorColorCode;
    }

    /**
     * Sets a new interiorColorCode.
     *
     * @param string $interiorColorCode
     *
     * @return self
     */
    public function setInteriorColorCode($interiorColorCode)
    {
        $this->interiorColorCode = $interiorColorCode;

        return $this;
    }

    /**
     * Gets as internalROCost.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getInternalROCost()
    {
        return $this->internalROCost;
    }

    /**
     * Sets a new internalROCost.
     *
     * @return self
     */
    public function setInternalROCost(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $internalROCost)
    {
        $this->internalROCost = $internalROCost;

        return $this;
    }

    /**
     * Gets as invoiceBalance.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getInvoiceBalance()
    {
        return $this->invoiceBalance;
    }

    /**
     * Sets a new invoiceBalance.
     *
     * @return self
     */
    public function setInvoiceBalance(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $invoiceBalance)
    {
        $this->invoiceBalance = $invoiceBalance;

        return $this;
    }

    /**
     * Gets as invoiceDate.
     *
     * @return \DateTime
     */
    public function getInvoiceDate()
    {
        return $this->invoiceDate;
    }

    /**
     * Sets a new invoiceDate.
     *
     * @return self
     */
    public function setInvoiceDate(\DateTime $invoiceDate)
    {
        $this->invoiceDate = $invoiceDate;

        return $this;
    }

    /**
     * Gets as invoiceNumber.
     *
     * @return string
     */
    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    /**
     * Sets a new invoiceNumber.
     *
     * @param string $invoiceNumber
     *
     * @return self
     */
    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;

        return $this;
    }

    /**
     * Gets as invoiceNumberString.
     *
     * @return string
     */
    public function getInvoiceNumberString()
    {
        return $this->invoiceNumberString;
    }

    /**
     * Sets a new invoiceNumberString.
     *
     * @param string $invoiceNumberString
     *
     * @return self
     */
    public function setInvoiceNumberString($invoiceNumberString)
    {
        $this->invoiceNumberString = $invoiceNumberString;

        return $this;
    }

    /**
     * Gets as irtiPromoted.
     *
     * @return int
     */
    public function getIrtiPromoted()
    {
        return $this->irtiPromoted;
    }

    /**
     * Sets a new irtiPromoted.
     *
     * @param int $irtiPromoted
     *
     * @return self
     */
    public function setIrtiPromoted($irtiPromoted)
    {
        $this->irtiPromoted = $irtiPromoted;

        return $this;
    }

    /**
     * Gets as isCertifiedPreOwned.
     *
     * @return bool
     */
    public function getIsCertifiedPreOwned()
    {
        return $this->isCertifiedPreOwned;
    }

    /**
     * Sets a new isCertifiedPreOwned.
     *
     * @param bool $isCertifiedPreOwned
     *
     * @return self
     */
    public function setIsCertifiedPreOwned($isCertifiedPreOwned)
    {
        $this->isCertifiedPreOwned = $isCertifiedPreOwned;

        return $this;
    }

    /**
     * Gets as isDamaged.
     *
     * @return bool
     */
    public function getIsDamaged()
    {
        return $this->isDamaged;
    }

    /**
     * Sets a new isDamaged.
     *
     * @param bool $isDamaged
     *
     * @return self
     */
    public function setIsDamaged($isDamaged)
    {
        $this->isDamaged = $isDamaged;

        return $this;
    }

    /**
     * Gets as isDemo.
     *
     * @return bool
     */
    public function getIsDemo()
    {
        return $this->isDemo;
    }

    /**
     * Sets a new isDemo.
     *
     * @param bool $isDemo
     *
     * @return self
     */
    public function setIsDemo($isDemo)
    {
        $this->isDemo = $isDemo;

        return $this;
    }

    /**
     * Gets as isNew.
     *
     * @return bool
     */
    public function getIsNew()
    {
        return $this->isNew;
    }

    /**
     * Sets a new isNew.
     *
     * @param bool $isNew
     *
     * @return self
     */
    public function setIsNew($isNew)
    {
        $this->isNew = $isNew;

        return $this;
    }

    /**
     * Gets as isSalvaged.
     *
     * @return bool
     */
    public function getIsSalvaged()
    {
        return $this->isSalvaged;
    }

    /**
     * Sets a new isSalvaged.
     *
     * @param bool $isSalvaged
     *
     * @return self
     */
    public function setIsSalvaged($isSalvaged)
    {
        $this->isSalvaged = $isSalvaged;

        return $this;
    }

    /**
     * Gets as keyNumber.
     *
     * @return string
     */
    public function getKeyNumber()
    {
        return $this->keyNumber;
    }

    /**
     * Sets a new keyNumber.
     *
     * @param string $keyNumber
     *
     * @return self
     */
    public function setKeyNumber($keyNumber)
    {
        $this->keyNumber = $keyNumber;

        return $this;
    }

    /**
     * Gets as licensePlateState.
     *
     * @return string
     */
    public function getLicensePlateState()
    {
        return $this->licensePlateState;
    }

    /**
     * Sets a new licensePlateState.
     *
     * @param string $licensePlateState
     *
     * @return self
     */
    public function setLicensePlateState($licensePlateState)
    {
        $this->licensePlateState = $licensePlateState;

        return $this;
    }

    /**
     * Gets as licensingFee.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getLicensingFee()
    {
        return $this->licensingFee;
    }

    /**
     * Sets a new licensingFee.
     *
     * @return self
     */
    public function setLicensingFee(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $licensingFee)
    {
        $this->licensingFee = $licensingFee;

        return $this;
    }

    /**
     * Gets as modelCode.
     *
     * @return string
     */
    public function getModelCode()
    {
        return $this->modelCode;
    }

    /**
     * Sets a new modelCode.
     *
     * @param string $modelCode
     *
     * @return self
     */
    public function setModelCode($modelCode)
    {
        $this->modelCode = $modelCode;

        return $this;
    }

    /**
     * Gets as modifiedBy.
     *
     * @return string
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    /**
     * Sets a new modifiedBy.
     *
     * @param string $modifiedBy
     *
     * @return self
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;

        return $this;
    }

    /**
     * Gets as modifiedStamp.
     *
     * @return \DateTime
     */
    public function getModifiedStamp()
    {
        return $this->modifiedStamp;
    }

    /**
     * Sets a new modifiedStamp.
     *
     * @return self
     */
    public function setModifiedStamp(\DateTime $modifiedStamp)
    {
        $this->modifiedStamp = $modifiedStamp;

        return $this;
    }

    /**
     * Gets as msrp.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getMsrp()
    {
        return $this->msrp;
    }

    /**
     * Sets a new msrp.
     *
     * @return self
     */
    public function setMsrp(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $msrp)
    {
        $this->msrp = $msrp;

        return $this;
    }

    /**
     * Gets as nadaRetail.
     *
     * @return int
     */
    public function getNadaRetail()
    {
        return $this->nadaRetail;
    }

    /**
     * Sets a new nadaRetail.
     *
     * @param int $nadaRetail
     *
     * @return self
     */
    public function setNadaRetail($nadaRetail)
    {
        $this->nadaRetail = $nadaRetail;

        return $this;
    }

    /**
     * Gets as nadaTrade.
     *
     * @return int
     */
    public function getNadaTrade()
    {
        return $this->nadaTrade;
    }

    /**
     * Sets a new nadaTrade.
     *
     * @param int $nadaTrade
     *
     * @return self
     */
    public function setNadaTrade($nadaTrade)
    {
        $this->nadaTrade = $nadaTrade;

        return $this;
    }

    /**
     * Adds as option.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Stock\OptionType $option
     */
    public function addToOptions(OptionType $option)
    {
        $this->options[] = $option;

        return $this;
    }

    /**
     * isset options.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetOptions($index)
    {
        return isset($this->options[$index]);
    }

    /**
     * unset options.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetOptions($index)
    {
        unset($this->options[$index]);
    }

    /**
     * Gets as options.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Stock\OptionType[]
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Sets a new options.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Stock\OptionType[] $options
     *
     * @return self
     */
    public function setOptions(array $options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Gets as otherOptions.
     *
     * @return string
     */
    public function getOtherOptions()
    {
        return $this->otherOptions;
    }

    /**
     * Sets a new otherOptions.
     *
     * @param string $otherOptions
     *
     * @return self
     */
    public function setOtherOptions($otherOptions)
    {
        $this->otherOptions = $otherOptions;

        return $this;
    }

    /**
     * Gets as ovAdvertisedSalePrice.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getOvAdvertisedSalePrice()
    {
        return $this->ovAdvertisedSalePrice;
    }

    /**
     * Sets a new ovAdvertisedSalePrice.
     *
     * @return self
     */
    public function setOvAdvertisedSalePrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $ovAdvertisedSalePrice)
    {
        $this->ovAdvertisedSalePrice = $ovAdvertisedSalePrice;

        return $this;
    }

    /**
     * Gets as pDIDate.
     *
     * @return \DateTime
     */
    public function getPDIDate()
    {
        return $this->pDIDate;
    }

    /**
     * Sets a new pDIDate.
     *
     * @return self
     */
    public function setPDIDate(\DateTime $pDIDate)
    {
        $this->pDIDate = $pDIDate;

        return $this;
    }

    /**
     * Gets as pDITechnician.
     *
     * @return \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType
     */
    public function getPDITechnician()
    {
        return $this->pDITechnician;
    }

    /**
     * Sets a new pDITechnician.
     *
     * @return self
     */
    public function setPDITechnician(\App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType $pDITechnician)
    {
        $this->pDITechnician = $pDITechnician;

        return $this;
    }

    /**
     * Gets as packageDiscount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getPackageDiscount()
    {
        return $this->packageDiscount;
    }

    /**
     * Sets a new packageDiscount.
     *
     * @return self
     */
    public function setPackageDiscount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $packageDiscount)
    {
        $this->packageDiscount = $packageDiscount;

        return $this;
    }

    /**
     * Gets as payFrom.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getPayFrom()
    {
        return $this->payFrom;
    }

    /**
     * Sets a new payFrom.
     *
     * @return self
     */
    public function setPayFrom(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $payFrom)
    {
        $this->payFrom = $payFrom;

        return $this;
    }

    /**
     * Gets as payoffLenderName.
     *
     * @return string
     */
    public function getPayoffLenderName()
    {
        return $this->payoffLenderName;
    }

    /**
     * Sets a new payoffLenderName.
     *
     * @param string $payoffLenderName
     *
     * @return self
     */
    public function setPayoffLenderName($payoffLenderName)
    {
        $this->payoffLenderName = $payoffLenderName;

        return $this;
    }

    /**
     * Gets as pendingBid.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getPendingBid()
    {
        return $this->pendingBid;
    }

    /**
     * Sets a new pendingBid.
     *
     * @return self
     */
    public function setPendingBid(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $pendingBid)
    {
        $this->pendingBid = $pendingBid;

        return $this;
    }

    /**
     * Gets as postedDate.
     *
     * @return \DateTime
     */
    public function getPostedDate()
    {
        return $this->postedDate;
    }

    /**
     * Sets a new postedDate.
     *
     * @return self
     */
    public function setPostedDate(\DateTime $postedDate)
    {
        $this->postedDate = $postedDate;

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
     * Gets as promoteStatus.
     *
     * @return bool
     */
    public function getPromoteStatus()
    {
        return $this->promoteStatus;
    }

    /**
     * Sets a new promoteStatus.
     *
     * @param bool $promoteStatus
     *
     * @return self
     */
    public function setPromoteStatus($promoteStatus)
    {
        $this->promoteStatus = $promoteStatus;

        return $this;
    }

    /**
     * Gets as purchaseOrderMemo.
     *
     * @return string
     */
    public function getPurchaseOrderMemo()
    {
        return $this->purchaseOrderMemo;
    }

    /**
     * Sets a new purchaseOrderMemo.
     *
     * @param string $purchaseOrderMemo
     *
     * @return self
     */
    public function setPurchaseOrderMemo($purchaseOrderMemo)
    {
        $this->purchaseOrderMemo = $purchaseOrderMemo;

        return $this;
    }

    /**
     * Gets as rebates.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getRebates()
    {
        return $this->rebates;
    }

    /**
     * Sets a new rebates.
     *
     * @return self
     */
    public function setRebates(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $rebates)
    {
        $this->rebates = $rebates;

        return $this;
    }

    /**
     * Gets as source.
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Sets a new source.
     *
     * @param string $source
     *
     * @return self
     */
    public function setSource($source)
    {
        $this->source = $source;

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
     * Gets as stockDataAttributes.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Stock\StockItemDataAttributesType
     */
    public function getStockDataAttributes()
    {
        return $this->stockDataAttributes;
    }

    /**
     * Sets a new stockDataAttributes.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Stock\StockItemDataAttributesType $stockDataAttributes
     *
     * @return self
     */
    public function setStockDataAttributes(StockItemDataAttributesType $stockDataAttributes)
    {
        $this->stockDataAttributes = $stockDataAttributes;

        return $this;
    }

    /**
     * Gets as stockNumber.
     *
     * @return string
     */
    public function getStockNumber()
    {
        return $this->stockNumber;
    }

    /**
     * Sets a new stockNumber.
     *
     * @param string $stockNumber
     *
     * @return self
     */
    public function setStockNumber($stockNumber)
    {
        $this->stockNumber = $stockNumber;

        return $this;
    }

    /**
     * Gets as subType.
     *
     * @return string
     */
    public function getSubType()
    {
        return $this->subType;
    }

    /**
     * Sets a new subType.
     *
     * @param string $subType
     *
     * @return self
     */
    public function setSubType($subType)
    {
        $this->subType = $subType;

        return $this;
    }

    /**
     * Gets as totalFacOptsCost.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTotalFacOptsCost()
    {
        return $this->totalFacOptsCost;
    }

    /**
     * Sets a new totalFacOptsCost.
     *
     * @return self
     */
    public function setTotalFacOptsCost(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalFacOptsCost)
    {
        $this->totalFacOptsCost = $totalFacOptsCost;

        return $this;
    }

    /**
     * Gets as totalFacOptsRetail.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTotalFacOptsRetail()
    {
        return $this->totalFacOptsRetail;
    }

    /**
     * Sets a new totalFacOptsRetail.
     *
     * @return self
     */
    public function setTotalFacOptsRetail(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalFacOptsRetail)
    {
        $this->totalFacOptsRetail = $totalFacOptsRetail;

        return $this;
    }

    /**
     * Gets as trimCode.
     *
     * @return string
     */
    public function getTrimCode()
    {
        return $this->trimCode;
    }

    /**
     * Sets a new trimCode.
     *
     * @param string $trimCode
     *
     * @return self
     */
    public function setTrimCode($trimCode)
    {
        $this->trimCode = $trimCode;

        return $this;
    }

    /**
     * Gets as type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets a new type.
     *
     * @param string $type
     *
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Gets as vehiclePromoteStatus.
     *
     * @return string
     */
    public function getVehiclePromoteStatus()
    {
        return $this->vehiclePromoteStatus;
    }

    /**
     * Sets a new vehiclePromoteStatus.
     *
     * @param string $vehiclePromoteStatus
     *
     * @return self
     */
    public function setVehiclePromoteStatus($vehiclePromoteStatus)
    {
        $this->vehiclePromoteStatus = $vehiclePromoteStatus;

        return $this;
    }

    /**
     * Gets as wholesalePrice.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getWholesalePrice()
    {
        return $this->wholesalePrice;
    }

    /**
     * Sets a new wholesalePrice.
     *
     * @return self
     */
    public function setWholesalePrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $wholesalePrice)
    {
        $this->wholesalePrice = $wholesalePrice;

        return $this;
    }

    /**
     * Gets as writeDown.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getWriteDown()
    {
        return $this->writeDown;
    }

    /**
     * Sets a new writeDown.
     *
     * @return self
     */
    public function setWriteDown(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $writeDown)
    {
        $this->writeDown = $writeDown;

        return $this;
    }
}

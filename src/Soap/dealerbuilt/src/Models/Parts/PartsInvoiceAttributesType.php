<?php

namespace App\Soap\dealerbuilt\src\Models\Parts;

/**
 * Class representing PartsInvoiceAttributesType.
 *
 * XSD Type: PartsInvoiceAttributes
 */
class PartsInvoiceAttributesType
{
    /**
     * @var \DateTime
     */
    private $accountingDate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $actualWholesaleAmount = null;

    /**
     * @var string
     */
    private $address = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $balanceDue = null;

    /**
     * @var string
     */
    private $city = null;

    /**
     * @var \DateTime
     */
    private $closeDate = null;

    /**
     * @var string
     */
    private $comments = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $coreAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $cost = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $countyTaxAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Parts\CustomerFocusIncentivesType
     */
    private $customerFocusIncentives = null;

    /**
     * @var string
     */
    private $customerPurchaseOrderNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $dealerDiscountAmount = null;

    /**
     * @var string
     */
    private $dealerNumber = null;

    /**
     * @var \DateTime
     */
    private $deliveredDate = null;

    /**
     * @var string
     */
    private $deliveryType = null;

    /**
     * @var \DateTime
     */
    private $documentDate = null;

    /**
     * @var string
     */
    private $documentID = null;

    /**
     * @var string
     */
    private $footerText = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $freightCharge = null;

    /**
     * @var string
     */
    private $freightTerms = null;

    /**
     * @var string
     */
    private $headerText = null;

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
    private $invoiceTask = null;

    /**
     * @var string
     */
    private $invoiceType = null;

    /**
     * @var bool
     */
    private $isCod = null;

    /**
     * @var bool
     */
    private $isDelivered = null;

    /**
     * @var bool
     */
    private $isDelivery = null;

    /**
     * @var bool
     */
    private $isReturn = null;

    /**
     * @var bool
     */
    private $isTaxable = null;

    /**
     * @var bool
     */
    private $isWholesale = null;

    /**
     * @var string
     */
    private $legalName = null;

    /**
     * @var string
     */
    private $letterOfCredit = null;

    /**
     * @var string
     */
    private $locationName = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $miscChargeTotal = null;

    /**
     * @var \DateTime
     */
    private $modifiedDate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $monthlyDiscountsOrAllowancesAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $monthlyMiscSalesChargesAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $monthlyPartsTotalAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $monthlyTotalAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Parts\PartNumbersStockedType
     */
    private $partNumbersStocked = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $partsDiscountAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $partsInvoiceItemAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Parts\PartsInvoiceLineType[]
     */
    private $partsInvoiceLines = null;

    /**
     * @var string
     */
    private $purchaseOrderNumber = null;

    /**
     * @var string
     */
    private $referenceNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $restockingFee = null;

    /**
     * @var string
     */
    private $secondaryDealerNumber = null;

    /**
     * @var string
     */
    private $shipMethod = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\IdentityProfileType
     */
    private $shipTo = null;

    /**
     * @var string
     */
    private $shipToLocationID = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Parts\ShipmentCarrierDetailType[]
     */
    private $shipmentCarrierDetails = null;

    /**
     * @var string
     */
    private $shipmentNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType
     */
    private $soldBy = null;

    /**
     * @var string
     */
    private $state = null;

    /**
     * @var int
     */
    private $status = null;

    /**
     * @var string
     */
    private $subHeaderText = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $subTotal = null;

    /**
     * @var string
     */
    private $taxDescription = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $taxOnTradeInTaxAmount = null;

    /**
     * @var float
     */
    private $taxPercent = null;

    /**
     * @var string
     */
    private $titleText = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $totalAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $totalDiscountAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $totalOtherAmount = null;

    /**
     * @var float
     */
    private $totalQuantity = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $totalTaxAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $tradeInAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $yTDDiscountsOrAllowancesAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $yTDMiscSalesChargesAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $yTDPartsTotalAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $yTDTotalAmount = null;

    /**
     * @var string
     */
    private $zipcode = null;

    /**
     * Gets as accountingDate.
     *
     * @return \DateTime
     */
    public function getAccountingDate()
    {
        return $this->accountingDate;
    }

    /**
     * Sets a new accountingDate.
     *
     * @return self
     */
    public function setAccountingDate(\DateTime $accountingDate)
    {
        $this->accountingDate = $accountingDate;

        return $this;
    }

    /**
     * Gets as actualWholesaleAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getActualWholesaleAmount()
    {
        return $this->actualWholesaleAmount;
    }

    /**
     * Sets a new actualWholesaleAmount.
     *
     * @return self
     */
    public function setActualWholesaleAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $actualWholesaleAmount)
    {
        $this->actualWholesaleAmount = $actualWholesaleAmount;

        return $this;
    }

    /**
     * Gets as address.
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets a new address.
     *
     * @param string $address
     *
     * @return self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Gets as balanceDue.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getBalanceDue()
    {
        return $this->balanceDue;
    }

    /**
     * Sets a new balanceDue.
     *
     * @return self
     */
    public function setBalanceDue(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $balanceDue)
    {
        $this->balanceDue = $balanceDue;

        return $this;
    }

    /**
     * Gets as city.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets a new city.
     *
     * @param string $city
     *
     * @return self
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Gets as closeDate.
     *
     * @return \DateTime
     */
    public function getCloseDate()
    {
        return $this->closeDate;
    }

    /**
     * Sets a new closeDate.
     *
     * @return self
     */
    public function setCloseDate(\DateTime $closeDate)
    {
        $this->closeDate = $closeDate;

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
     * Gets as coreAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCoreAmount()
    {
        return $this->coreAmount;
    }

    /**
     * Sets a new coreAmount.
     *
     * @return self
     */
    public function setCoreAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $coreAmount)
    {
        $this->coreAmount = $coreAmount;

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
     * Gets as countyTaxAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCountyTaxAmount()
    {
        return $this->countyTaxAmount;
    }

    /**
     * Sets a new countyTaxAmount.
     *
     * @return self
     */
    public function setCountyTaxAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $countyTaxAmount)
    {
        $this->countyTaxAmount = $countyTaxAmount;

        return $this;
    }

    /**
     * Gets as customerFocusIncentives.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Parts\CustomerFocusIncentivesType
     */
    public function getCustomerFocusIncentives()
    {
        return $this->customerFocusIncentives;
    }

    /**
     * Sets a new customerFocusIncentives.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\CustomerFocusIncentivesType $customerFocusIncentives
     *
     * @return self
     */
    public function setCustomerFocusIncentives(CustomerFocusIncentivesType $customerFocusIncentives)
    {
        $this->customerFocusIncentives = $customerFocusIncentives;

        return $this;
    }

    /**
     * Gets as customerPurchaseOrderNumber.
     *
     * @return string
     */
    public function getCustomerPurchaseOrderNumber()
    {
        return $this->customerPurchaseOrderNumber;
    }

    /**
     * Sets a new customerPurchaseOrderNumber.
     *
     * @param string $customerPurchaseOrderNumber
     *
     * @return self
     */
    public function setCustomerPurchaseOrderNumber($customerPurchaseOrderNumber)
    {
        $this->customerPurchaseOrderNumber = $customerPurchaseOrderNumber;

        return $this;
    }

    /**
     * Gets as dealerDiscountAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getDealerDiscountAmount()
    {
        return $this->dealerDiscountAmount;
    }

    /**
     * Sets a new dealerDiscountAmount.
     *
     * @return self
     */
    public function setDealerDiscountAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $dealerDiscountAmount)
    {
        $this->dealerDiscountAmount = $dealerDiscountAmount;

        return $this;
    }

    /**
     * Gets as dealerNumber.
     *
     * @return string
     */
    public function getDealerNumber()
    {
        return $this->dealerNumber;
    }

    /**
     * Sets a new dealerNumber.
     *
     * @param string $dealerNumber
     *
     * @return self
     */
    public function setDealerNumber($dealerNumber)
    {
        $this->dealerNumber = $dealerNumber;

        return $this;
    }

    /**
     * Gets as deliveredDate.
     *
     * @return \DateTime
     */
    public function getDeliveredDate()
    {
        return $this->deliveredDate;
    }

    /**
     * Sets a new deliveredDate.
     *
     * @return self
     */
    public function setDeliveredDate(\DateTime $deliveredDate)
    {
        $this->deliveredDate = $deliveredDate;

        return $this;
    }

    /**
     * Gets as deliveryType.
     *
     * @return string
     */
    public function getDeliveryType()
    {
        return $this->deliveryType;
    }

    /**
     * Sets a new deliveryType.
     *
     * @param string $deliveryType
     *
     * @return self
     */
    public function setDeliveryType($deliveryType)
    {
        $this->deliveryType = $deliveryType;

        return $this;
    }

    /**
     * Gets as documentDate.
     *
     * @return \DateTime
     */
    public function getDocumentDate()
    {
        return $this->documentDate;
    }

    /**
     * Sets a new documentDate.
     *
     * @return self
     */
    public function setDocumentDate(\DateTime $documentDate)
    {
        $this->documentDate = $documentDate;

        return $this;
    }

    /**
     * Gets as documentID.
     *
     * @return string
     */
    public function getDocumentID()
    {
        return $this->documentID;
    }

    /**
     * Sets a new documentID.
     *
     * @param string $documentID
     *
     * @return self
     */
    public function setDocumentID($documentID)
    {
        $this->documentID = $documentID;

        return $this;
    }

    /**
     * Gets as footerText.
     *
     * @return string
     */
    public function getFooterText()
    {
        return $this->footerText;
    }

    /**
     * Sets a new footerText.
     *
     * @param string $footerText
     *
     * @return self
     */
    public function setFooterText($footerText)
    {
        $this->footerText = $footerText;

        return $this;
    }

    /**
     * Gets as freightCharge.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getFreightCharge()
    {
        return $this->freightCharge;
    }

    /**
     * Sets a new freightCharge.
     *
     * @return self
     */
    public function setFreightCharge(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $freightCharge)
    {
        $this->freightCharge = $freightCharge;

        return $this;
    }

    /**
     * Gets as freightTerms.
     *
     * @return string
     */
    public function getFreightTerms()
    {
        return $this->freightTerms;
    }

    /**
     * Sets a new freightTerms.
     *
     * @param string $freightTerms
     *
     * @return self
     */
    public function setFreightTerms($freightTerms)
    {
        $this->freightTerms = $freightTerms;

        return $this;
    }

    /**
     * Gets as headerText.
     *
     * @return string
     */
    public function getHeaderText()
    {
        return $this->headerText;
    }

    /**
     * Sets a new headerText.
     *
     * @param string $headerText
     *
     * @return self
     */
    public function setHeaderText($headerText)
    {
        $this->headerText = $headerText;

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
     * Gets as invoiceTask.
     *
     * @return string
     */
    public function getInvoiceTask()
    {
        return $this->invoiceTask;
    }

    /**
     * Sets a new invoiceTask.
     *
     * @param string $invoiceTask
     *
     * @return self
     */
    public function setInvoiceTask($invoiceTask)
    {
        $this->invoiceTask = $invoiceTask;

        return $this;
    }

    /**
     * Gets as invoiceType.
     *
     * @return string
     */
    public function getInvoiceType()
    {
        return $this->invoiceType;
    }

    /**
     * Sets a new invoiceType.
     *
     * @param string $invoiceType
     *
     * @return self
     */
    public function setInvoiceType($invoiceType)
    {
        $this->invoiceType = $invoiceType;

        return $this;
    }

    /**
     * Gets as isCod.
     *
     * @return bool
     */
    public function getIsCod()
    {
        return $this->isCod;
    }

    /**
     * Sets a new isCod.
     *
     * @param bool $isCod
     *
     * @return self
     */
    public function setIsCod($isCod)
    {
        $this->isCod = $isCod;

        return $this;
    }

    /**
     * Gets as isDelivered.
     *
     * @return bool
     */
    public function getIsDelivered()
    {
        return $this->isDelivered;
    }

    /**
     * Sets a new isDelivered.
     *
     * @param bool $isDelivered
     *
     * @return self
     */
    public function setIsDelivered($isDelivered)
    {
        $this->isDelivered = $isDelivered;

        return $this;
    }

    /**
     * Gets as isDelivery.
     *
     * @return bool
     */
    public function getIsDelivery()
    {
        return $this->isDelivery;
    }

    /**
     * Sets a new isDelivery.
     *
     * @param bool $isDelivery
     *
     * @return self
     */
    public function setIsDelivery($isDelivery)
    {
        $this->isDelivery = $isDelivery;

        return $this;
    }

    /**
     * Gets as isReturn.
     *
     * @return bool
     */
    public function getIsReturn()
    {
        return $this->isReturn;
    }

    /**
     * Sets a new isReturn.
     *
     * @param bool $isReturn
     *
     * @return self
     */
    public function setIsReturn($isReturn)
    {
        $this->isReturn = $isReturn;

        return $this;
    }

    /**
     * Gets as isTaxable.
     *
     * @return bool
     */
    public function getIsTaxable()
    {
        return $this->isTaxable;
    }

    /**
     * Sets a new isTaxable.
     *
     * @param bool $isTaxable
     *
     * @return self
     */
    public function setIsTaxable($isTaxable)
    {
        $this->isTaxable = $isTaxable;

        return $this;
    }

    /**
     * Gets as isWholesale.
     *
     * @return bool
     */
    public function getIsWholesale()
    {
        return $this->isWholesale;
    }

    /**
     * Sets a new isWholesale.
     *
     * @param bool $isWholesale
     *
     * @return self
     */
    public function setIsWholesale($isWholesale)
    {
        $this->isWholesale = $isWholesale;

        return $this;
    }

    /**
     * Gets as legalName.
     *
     * @return string
     */
    public function getLegalName()
    {
        return $this->legalName;
    }

    /**
     * Sets a new legalName.
     *
     * @param string $legalName
     *
     * @return self
     */
    public function setLegalName($legalName)
    {
        $this->legalName = $legalName;

        return $this;
    }

    /**
     * Gets as letterOfCredit.
     *
     * @return string
     */
    public function getLetterOfCredit()
    {
        return $this->letterOfCredit;
    }

    /**
     * Sets a new letterOfCredit.
     *
     * @param string $letterOfCredit
     *
     * @return self
     */
    public function setLetterOfCredit($letterOfCredit)
    {
        $this->letterOfCredit = $letterOfCredit;

        return $this;
    }

    /**
     * Gets as locationName.
     *
     * @return string
     */
    public function getLocationName()
    {
        return $this->locationName;
    }

    /**
     * Sets a new locationName.
     *
     * @param string $locationName
     *
     * @return self
     */
    public function setLocationName($locationName)
    {
        $this->locationName = $locationName;

        return $this;
    }

    /**
     * Gets as miscChargeTotal.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getMiscChargeTotal()
    {
        return $this->miscChargeTotal;
    }

    /**
     * Sets a new miscChargeTotal.
     *
     * @return self
     */
    public function setMiscChargeTotal(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $miscChargeTotal)
    {
        $this->miscChargeTotal = $miscChargeTotal;

        return $this;
    }

    /**
     * Gets as modifiedDate.
     *
     * @return \DateTime
     */
    public function getModifiedDate()
    {
        return $this->modifiedDate;
    }

    /**
     * Sets a new modifiedDate.
     *
     * @return self
     */
    public function setModifiedDate(\DateTime $modifiedDate)
    {
        $this->modifiedDate = $modifiedDate;

        return $this;
    }

    /**
     * Gets as monthlyDiscountsOrAllowancesAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getMonthlyDiscountsOrAllowancesAmount()
    {
        return $this->monthlyDiscountsOrAllowancesAmount;
    }

    /**
     * Sets a new monthlyDiscountsOrAllowancesAmount.
     *
     * @return self
     */
    public function setMonthlyDiscountsOrAllowancesAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $monthlyDiscountsOrAllowancesAmount)
    {
        $this->monthlyDiscountsOrAllowancesAmount = $monthlyDiscountsOrAllowancesAmount;

        return $this;
    }

    /**
     * Gets as monthlyMiscSalesChargesAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getMonthlyMiscSalesChargesAmount()
    {
        return $this->monthlyMiscSalesChargesAmount;
    }

    /**
     * Sets a new monthlyMiscSalesChargesAmount.
     *
     * @return self
     */
    public function setMonthlyMiscSalesChargesAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $monthlyMiscSalesChargesAmount)
    {
        $this->monthlyMiscSalesChargesAmount = $monthlyMiscSalesChargesAmount;

        return $this;
    }

    /**
     * Gets as monthlyPartsTotalAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getMonthlyPartsTotalAmount()
    {
        return $this->monthlyPartsTotalAmount;
    }

    /**
     * Sets a new monthlyPartsTotalAmount.
     *
     * @return self
     */
    public function setMonthlyPartsTotalAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $monthlyPartsTotalAmount)
    {
        $this->monthlyPartsTotalAmount = $monthlyPartsTotalAmount;

        return $this;
    }

    /**
     * Gets as monthlyTotalAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getMonthlyTotalAmount()
    {
        return $this->monthlyTotalAmount;
    }

    /**
     * Sets a new monthlyTotalAmount.
     *
     * @return self
     */
    public function setMonthlyTotalAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $monthlyTotalAmount)
    {
        $this->monthlyTotalAmount = $monthlyTotalAmount;

        return $this;
    }

    /**
     * Gets as partNumbersStocked.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Parts\PartNumbersStockedType
     */
    public function getPartNumbersStocked()
    {
        return $this->partNumbersStocked;
    }

    /**
     * Sets a new partNumbersStocked.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\PartNumbersStockedType $partNumbersStocked
     *
     * @return self
     */
    public function setPartNumbersStocked(PartNumbersStockedType $partNumbersStocked)
    {
        $this->partNumbersStocked = $partNumbersStocked;

        return $this;
    }

    /**
     * Gets as partsDiscountAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getPartsDiscountAmount()
    {
        return $this->partsDiscountAmount;
    }

    /**
     * Sets a new partsDiscountAmount.
     *
     * @return self
     */
    public function setPartsDiscountAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $partsDiscountAmount)
    {
        $this->partsDiscountAmount = $partsDiscountAmount;

        return $this;
    }

    /**
     * Gets as partsInvoiceItemAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getPartsInvoiceItemAmount()
    {
        return $this->partsInvoiceItemAmount;
    }

    /**
     * Sets a new partsInvoiceItemAmount.
     *
     * @return self
     */
    public function setPartsInvoiceItemAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $partsInvoiceItemAmount)
    {
        $this->partsInvoiceItemAmount = $partsInvoiceItemAmount;

        return $this;
    }

    /**
     * Adds as partsInvoiceLine.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\PartsInvoiceLineType $partsInvoiceLine
     */
    public function addToPartsInvoiceLines(PartsInvoiceLineType $partsInvoiceLine)
    {
        $this->partsInvoiceLines[] = $partsInvoiceLine;

        return $this;
    }

    /**
     * isset partsInvoiceLines.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPartsInvoiceLines($index)
    {
        return isset($this->partsInvoiceLines[$index]);
    }

    /**
     * unset partsInvoiceLines.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPartsInvoiceLines($index)
    {
        unset($this->partsInvoiceLines[$index]);
    }

    /**
     * Gets as partsInvoiceLines.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Parts\PartsInvoiceLineType[]
     */
    public function getPartsInvoiceLines()
    {
        return $this->partsInvoiceLines;
    }

    /**
     * Sets a new partsInvoiceLines.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\PartsInvoiceLineType[] $partsInvoiceLines
     *
     * @return self
     */
    public function setPartsInvoiceLines(array $partsInvoiceLines)
    {
        $this->partsInvoiceLines = $partsInvoiceLines;

        return $this;
    }

    /**
     * Gets as purchaseOrderNumber.
     *
     * @return string
     */
    public function getPurchaseOrderNumber()
    {
        return $this->purchaseOrderNumber;
    }

    /**
     * Sets a new purchaseOrderNumber.
     *
     * @param string $purchaseOrderNumber
     *
     * @return self
     */
    public function setPurchaseOrderNumber($purchaseOrderNumber)
    {
        $this->purchaseOrderNumber = $purchaseOrderNumber;

        return $this;
    }

    /**
     * Gets as referenceNumber.
     *
     * @return string
     */
    public function getReferenceNumber()
    {
        return $this->referenceNumber;
    }

    /**
     * Sets a new referenceNumber.
     *
     * @param string $referenceNumber
     *
     * @return self
     */
    public function setReferenceNumber($referenceNumber)
    {
        $this->referenceNumber = $referenceNumber;

        return $this;
    }

    /**
     * Gets as restockingFee.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getRestockingFee()
    {
        return $this->restockingFee;
    }

    /**
     * Sets a new restockingFee.
     *
     * @return self
     */
    public function setRestockingFee(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $restockingFee)
    {
        $this->restockingFee = $restockingFee;

        return $this;
    }

    /**
     * Gets as secondaryDealerNumber.
     *
     * @return string
     */
    public function getSecondaryDealerNumber()
    {
        return $this->secondaryDealerNumber;
    }

    /**
     * Sets a new secondaryDealerNumber.
     *
     * @param string $secondaryDealerNumber
     *
     * @return self
     */
    public function setSecondaryDealerNumber($secondaryDealerNumber)
    {
        $this->secondaryDealerNumber = $secondaryDealerNumber;

        return $this;
    }

    /**
     * Gets as shipMethod.
     *
     * @return string
     */
    public function getShipMethod()
    {
        return $this->shipMethod;
    }

    /**
     * Sets a new shipMethod.
     *
     * @param string $shipMethod
     *
     * @return self
     */
    public function setShipMethod($shipMethod)
    {
        $this->shipMethod = $shipMethod;

        return $this;
    }

    /**
     * Gets as shipTo.
     *
     * @return \App\Soap\dealerbuilt\src\Models\IdentityProfileType
     */
    public function getShipTo()
    {
        return $this->shipTo;
    }

    /**
     * Sets a new shipTo.
     *
     * @return self
     */
    public function setShipTo(\App\Soap\dealerbuilt\src\Models\IdentityProfileType $shipTo)
    {
        $this->shipTo = $shipTo;

        return $this;
    }

    /**
     * Gets as shipToLocationID.
     *
     * @return string
     */
    public function getShipToLocationID()
    {
        return $this->shipToLocationID;
    }

    /**
     * Sets a new shipToLocationID.
     *
     * @param string $shipToLocationID
     *
     * @return self
     */
    public function setShipToLocationID($shipToLocationID)
    {
        $this->shipToLocationID = $shipToLocationID;

        return $this;
    }

    /**
     * Adds as shipmentCarrierDetail.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\ShipmentCarrierDetailType $shipmentCarrierDetail
     */
    public function addToShipmentCarrierDetails(ShipmentCarrierDetailType $shipmentCarrierDetail)
    {
        $this->shipmentCarrierDetails[] = $shipmentCarrierDetail;

        return $this;
    }

    /**
     * isset shipmentCarrierDetails.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetShipmentCarrierDetails($index)
    {
        return isset($this->shipmentCarrierDetails[$index]);
    }

    /**
     * unset shipmentCarrierDetails.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetShipmentCarrierDetails($index)
    {
        unset($this->shipmentCarrierDetails[$index]);
    }

    /**
     * Gets as shipmentCarrierDetails.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Parts\ShipmentCarrierDetailType[]
     */
    public function getShipmentCarrierDetails()
    {
        return $this->shipmentCarrierDetails;
    }

    /**
     * Sets a new shipmentCarrierDetails.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\ShipmentCarrierDetailType[] $shipmentCarrierDetails
     *
     * @return self
     */
    public function setShipmentCarrierDetails(array $shipmentCarrierDetails)
    {
        $this->shipmentCarrierDetails = $shipmentCarrierDetails;

        return $this;
    }

    /**
     * Gets as shipmentNumber.
     *
     * @return string
     */
    public function getShipmentNumber()
    {
        return $this->shipmentNumber;
    }

    /**
     * Sets a new shipmentNumber.
     *
     * @param string $shipmentNumber
     *
     * @return self
     */
    public function setShipmentNumber($shipmentNumber)
    {
        $this->shipmentNumber = $shipmentNumber;

        return $this;
    }

    /**
     * Gets as soldBy.
     *
     * @return \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType
     */
    public function getSoldBy()
    {
        return $this->soldBy;
    }

    /**
     * Sets a new soldBy.
     *
     * @return self
     */
    public function setSoldBy(\App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType $soldBy)
    {
        $this->soldBy = $soldBy;

        return $this;
    }

    /**
     * Gets as state.
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Sets a new state.
     *
     * @param string $state
     *
     * @return self
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Gets as status.
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets a new status.
     *
     * @param int $status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Gets as subHeaderText.
     *
     * @return string
     */
    public function getSubHeaderText()
    {
        return $this->subHeaderText;
    }

    /**
     * Sets a new subHeaderText.
     *
     * @param string $subHeaderText
     *
     * @return self
     */
    public function setSubHeaderText($subHeaderText)
    {
        $this->subHeaderText = $subHeaderText;

        return $this;
    }

    /**
     * Gets as subTotal.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getSubTotal()
    {
        return $this->subTotal;
    }

    /**
     * Sets a new subTotal.
     *
     * @return self
     */
    public function setSubTotal(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $subTotal)
    {
        $this->subTotal = $subTotal;

        return $this;
    }

    /**
     * Gets as taxDescription.
     *
     * @return string
     */
    public function getTaxDescription()
    {
        return $this->taxDescription;
    }

    /**
     * Sets a new taxDescription.
     *
     * @param string $taxDescription
     *
     * @return self
     */
    public function setTaxDescription($taxDescription)
    {
        $this->taxDescription = $taxDescription;

        return $this;
    }

    /**
     * Gets as taxOnTradeInTaxAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTaxOnTradeInTaxAmount()
    {
        return $this->taxOnTradeInTaxAmount;
    }

    /**
     * Sets a new taxOnTradeInTaxAmount.
     *
     * @return self
     */
    public function setTaxOnTradeInTaxAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $taxOnTradeInTaxAmount)
    {
        $this->taxOnTradeInTaxAmount = $taxOnTradeInTaxAmount;

        return $this;
    }

    /**
     * Gets as taxPercent.
     *
     * @return float
     */
    public function getTaxPercent()
    {
        return $this->taxPercent;
    }

    /**
     * Sets a new taxPercent.
     *
     * @param float $taxPercent
     *
     * @return self
     */
    public function setTaxPercent($taxPercent)
    {
        $this->taxPercent = $taxPercent;

        return $this;
    }

    /**
     * Gets as titleText.
     *
     * @return string
     */
    public function getTitleText()
    {
        return $this->titleText;
    }

    /**
     * Sets a new titleText.
     *
     * @param string $titleText
     *
     * @return self
     */
    public function setTitleText($titleText)
    {
        $this->titleText = $titleText;

        return $this;
    }

    /**
     * Gets as totalAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * Sets a new totalAmount.
     *
     * @return self
     */
    public function setTotalAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalAmount)
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    /**
     * Gets as totalDiscountAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTotalDiscountAmount()
    {
        return $this->totalDiscountAmount;
    }

    /**
     * Sets a new totalDiscountAmount.
     *
     * @return self
     */
    public function setTotalDiscountAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalDiscountAmount)
    {
        $this->totalDiscountAmount = $totalDiscountAmount;

        return $this;
    }

    /**
     * Gets as totalOtherAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTotalOtherAmount()
    {
        return $this->totalOtherAmount;
    }

    /**
     * Sets a new totalOtherAmount.
     *
     * @return self
     */
    public function setTotalOtherAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalOtherAmount)
    {
        $this->totalOtherAmount = $totalOtherAmount;

        return $this;
    }

    /**
     * Gets as totalQuantity.
     *
     * @return float
     */
    public function getTotalQuantity()
    {
        return $this->totalQuantity;
    }

    /**
     * Sets a new totalQuantity.
     *
     * @param float $totalQuantity
     *
     * @return self
     */
    public function setTotalQuantity($totalQuantity)
    {
        $this->totalQuantity = $totalQuantity;

        return $this;
    }

    /**
     * Gets as totalTaxAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTotalTaxAmount()
    {
        return $this->totalTaxAmount;
    }

    /**
     * Sets a new totalTaxAmount.
     *
     * @return self
     */
    public function setTotalTaxAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalTaxAmount)
    {
        $this->totalTaxAmount = $totalTaxAmount;

        return $this;
    }

    /**
     * Gets as tradeInAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTradeInAmount()
    {
        return $this->tradeInAmount;
    }

    /**
     * Sets a new tradeInAmount.
     *
     * @return self
     */
    public function setTradeInAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $tradeInAmount)
    {
        $this->tradeInAmount = $tradeInAmount;

        return $this;
    }

    /**
     * Gets as yTDDiscountsOrAllowancesAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getYTDDiscountsOrAllowancesAmount()
    {
        return $this->yTDDiscountsOrAllowancesAmount;
    }

    /**
     * Sets a new yTDDiscountsOrAllowancesAmount.
     *
     * @return self
     */
    public function setYTDDiscountsOrAllowancesAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $yTDDiscountsOrAllowancesAmount)
    {
        $this->yTDDiscountsOrAllowancesAmount = $yTDDiscountsOrAllowancesAmount;

        return $this;
    }

    /**
     * Gets as yTDMiscSalesChargesAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getYTDMiscSalesChargesAmount()
    {
        return $this->yTDMiscSalesChargesAmount;
    }

    /**
     * Sets a new yTDMiscSalesChargesAmount.
     *
     * @return self
     */
    public function setYTDMiscSalesChargesAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $yTDMiscSalesChargesAmount)
    {
        $this->yTDMiscSalesChargesAmount = $yTDMiscSalesChargesAmount;

        return $this;
    }

    /**
     * Gets as yTDPartsTotalAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getYTDPartsTotalAmount()
    {
        return $this->yTDPartsTotalAmount;
    }

    /**
     * Sets a new yTDPartsTotalAmount.
     *
     * @return self
     */
    public function setYTDPartsTotalAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $yTDPartsTotalAmount)
    {
        $this->yTDPartsTotalAmount = $yTDPartsTotalAmount;

        return $this;
    }

    /**
     * Gets as yTDTotalAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getYTDTotalAmount()
    {
        return $this->yTDTotalAmount;
    }

    /**
     * Sets a new yTDTotalAmount.
     *
     * @return self
     */
    public function setYTDTotalAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $yTDTotalAmount)
    {
        $this->yTDTotalAmount = $yTDTotalAmount;

        return $this;
    }

    /**
     * Gets as zipcode.
     *
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Sets a new zipcode.
     *
     * @param string $zipcode
     *
     * @return self
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }
}

<?php

namespace App\Soap\dealerbuilt\src\Models\Parts;

/**
 * Class representing PartsInvoiceLineType
 *
 * 
 * XSD Type: PartsInvoiceLine
 */
class PartsInvoiceLineType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $actualWholesaleAmount
     */
    private $actualWholesaleAmount = null;

    /**
     * @var string $binLocation
     */
    private $binLocation = null;

    /**
     * @var string $caseCartonNumber
     */
    private $caseCartonNumber = null;

    /**
     * @var string $comments
     */
    private $comments = null;

    /**
     * @var string $conveyanceNumber
     */
    private $conveyanceNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $coreAmount
     */
    private $coreAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $coreUnitAmount
     */
    private $coreUnitAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $dealerDiscountAmount
     */
    private $dealerDiscountAmount = null;

    /**
     * @var string $detailNotes
     */
    private $detailNotes = null;

    /**
     * @var float $discountPercentage
     */
    private $discountPercentage = null;

    /**
     * @var \DateTime $eTADate
     */
    private $eTADate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $extendedAmount
     */
    private $extendedAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $extendedCoreAmount
     */
    private $extendedCoreAmount = null;

    /**
     * @var float $freightCharge
     */
    private $freightCharge = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $grossDiscountAmount
     */
    private $grossDiscountAmount = null;

    /**
     * @var string $hTSCode
     */
    private $hTSCode = null;

    /**
     * @var string $headerNotes
     */
    private $headerNotes = null;

    /**
     * @var int $linenumber
     */
    private $linenumber = null;

    /**
     * @var string $manufacturerOrderNumber
     */
    private $manufacturerOrderNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $miscChargeTotal
     */
    private $miscChargeTotal = null;

    /**
     * @var string $miscDescription
     */
    private $miscDescription = null;

    /**
     * @var \DateTime $orderDate
     */
    private $orderDate = null;

    /**
     * @var string $orderReferenceNumber
     */
    private $orderReferenceNumber = null;

    /**
     * @var string $orderType
     */
    private $orderType = null;

    /**
     * @var float $packQty
     */
    private $packQty = null;

    /**
     * @var string $partClass
     */
    private $partClass = null;

    /**
     * @var string $partKey
     */
    private $partKey = null;

    /**
     * @var string $partName
     */
    private $partName = null;

    /**
     * @var string $partNumber
     */
    private $partNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $partsInvoiceItemNetAmount
     */
    private $partsInvoiceItemNetAmount = null;

    /**
     * @var string $priceDescription
     */
    private $priceDescription = null;

    /**
     * @var string $processCode
     */
    private $processCode = null;

    /**
     * @var \DateTime $processDate
     */
    private $processDate = null;

    /**
     * @var string $purchaseOrderNum
     */
    private $purchaseOrderNum = null;

    /**
     * @var float $quantityOrdered
     */
    private $quantityOrdered = null;

    /**
     * @var float $quantityShipped
     */
    private $quantityShipped = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $retailAmount
     */
    private $retailAmount = null;

    /**
     * @var string $saleType
     */
    private $saleType = null;

    /**
     * @var string $shipmentNumber
     */
    private $shipmentNumber = null;

    /**
     * @var string $shippingPDC
     */
    private $shippingPDC = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $soldAmount
     */
    private $soldAmount = null;

    /**
     * @var \DateTime $soldDate
     */
    private $soldDate = null;

    /**
     * @var string $source
     */
    private $source = null;

    /**
     * @var string $sourceDescription
     */
    private $sourceDescription = null;

    /**
     * @var float $specialTax
     */
    private $specialTax = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $submittedAmount
     */
    private $submittedAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $taxAmount
     */
    private $taxAmount = null;

    /**
     * @var string $taxDescription
     */
    private $taxDescription = null;

    /**
     * @var string $taxPaidToName
     */
    private $taxPaidToName = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $tradeInAmount
     */
    private $tradeInAmount = null;

    /**
     * @var string $vendor
     */
    private $vendor = null;

    /**
     * Gets as actualWholesaleAmount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getActualWholesaleAmount()
    {
        return $this->actualWholesaleAmount;
    }

    /**
     * Sets a new actualWholesaleAmount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $actualWholesaleAmount
     * @return self
     */
    public function setActualWholesaleAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $actualWholesaleAmount)
    {
        $this->actualWholesaleAmount = $actualWholesaleAmount;
        return $this;
    }

    /**
     * Gets as binLocation
     *
     * @return string
     */
    public function getBinLocation()
    {
        return $this->binLocation;
    }

    /**
     * Sets a new binLocation
     *
     * @param string $binLocation
     * @return self
     */
    public function setBinLocation($binLocation)
    {
        $this->binLocation = $binLocation;
        return $this;
    }

    /**
     * Gets as caseCartonNumber
     *
     * @return string
     */
    public function getCaseCartonNumber()
    {
        return $this->caseCartonNumber;
    }

    /**
     * Sets a new caseCartonNumber
     *
     * @param string $caseCartonNumber
     * @return self
     */
    public function setCaseCartonNumber($caseCartonNumber)
    {
        $this->caseCartonNumber = $caseCartonNumber;
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
     * Gets as conveyanceNumber
     *
     * @return string
     */
    public function getConveyanceNumber()
    {
        return $this->conveyanceNumber;
    }

    /**
     * Sets a new conveyanceNumber
     *
     * @param string $conveyanceNumber
     * @return self
     */
    public function setConveyanceNumber($conveyanceNumber)
    {
        $this->conveyanceNumber = $conveyanceNumber;
        return $this;
    }

    /**
     * Gets as coreAmount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCoreAmount()
    {
        return $this->coreAmount;
    }

    /**
     * Sets a new coreAmount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $coreAmount
     * @return self
     */
    public function setCoreAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $coreAmount)
    {
        $this->coreAmount = $coreAmount;
        return $this;
    }

    /**
     * Gets as coreUnitAmount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCoreUnitAmount()
    {
        return $this->coreUnitAmount;
    }

    /**
     * Sets a new coreUnitAmount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $coreUnitAmount
     * @return self
     */
    public function setCoreUnitAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $coreUnitAmount)
    {
        $this->coreUnitAmount = $coreUnitAmount;
        return $this;
    }

    /**
     * Gets as dealerDiscountAmount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getDealerDiscountAmount()
    {
        return $this->dealerDiscountAmount;
    }

    /**
     * Sets a new dealerDiscountAmount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $dealerDiscountAmount
     * @return self
     */
    public function setDealerDiscountAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $dealerDiscountAmount)
    {
        $this->dealerDiscountAmount = $dealerDiscountAmount;
        return $this;
    }

    /**
     * Gets as detailNotes
     *
     * @return string
     */
    public function getDetailNotes()
    {
        return $this->detailNotes;
    }

    /**
     * Sets a new detailNotes
     *
     * @param string $detailNotes
     * @return self
     */
    public function setDetailNotes($detailNotes)
    {
        $this->detailNotes = $detailNotes;
        return $this;
    }

    /**
     * Gets as discountPercentage
     *
     * @return float
     */
    public function getDiscountPercentage()
    {
        return $this->discountPercentage;
    }

    /**
     * Sets a new discountPercentage
     *
     * @param float $discountPercentage
     * @return self
     */
    public function setDiscountPercentage($discountPercentage)
    {
        $this->discountPercentage = $discountPercentage;
        return $this;
    }

    /**
     * Gets as eTADate
     *
     * @return \DateTime
     */
    public function getETADate()
    {
        return $this->eTADate;
    }

    /**
     * Sets a new eTADate
     *
     * @param \DateTime $eTADate
     * @return self
     */
    public function setETADate(\DateTime $eTADate)
    {
        $this->eTADate = $eTADate;
        return $this;
    }

    /**
     * Gets as extendedAmount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getExtendedAmount()
    {
        return $this->extendedAmount;
    }

    /**
     * Sets a new extendedAmount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $extendedAmount
     * @return self
     */
    public function setExtendedAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $extendedAmount)
    {
        $this->extendedAmount = $extendedAmount;
        return $this;
    }

    /**
     * Gets as extendedCoreAmount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getExtendedCoreAmount()
    {
        return $this->extendedCoreAmount;
    }

    /**
     * Sets a new extendedCoreAmount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $extendedCoreAmount
     * @return self
     */
    public function setExtendedCoreAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $extendedCoreAmount)
    {
        $this->extendedCoreAmount = $extendedCoreAmount;
        return $this;
    }

    /**
     * Gets as freightCharge
     *
     * @return float
     */
    public function getFreightCharge()
    {
        return $this->freightCharge;
    }

    /**
     * Sets a new freightCharge
     *
     * @param float $freightCharge
     * @return self
     */
    public function setFreightCharge($freightCharge)
    {
        $this->freightCharge = $freightCharge;
        return $this;
    }

    /**
     * Gets as grossDiscountAmount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getGrossDiscountAmount()
    {
        return $this->grossDiscountAmount;
    }

    /**
     * Sets a new grossDiscountAmount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $grossDiscountAmount
     * @return self
     */
    public function setGrossDiscountAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $grossDiscountAmount)
    {
        $this->grossDiscountAmount = $grossDiscountAmount;
        return $this;
    }

    /**
     * Gets as hTSCode
     *
     * @return string
     */
    public function getHTSCode()
    {
        return $this->hTSCode;
    }

    /**
     * Sets a new hTSCode
     *
     * @param string $hTSCode
     * @return self
     */
    public function setHTSCode($hTSCode)
    {
        $this->hTSCode = $hTSCode;
        return $this;
    }

    /**
     * Gets as headerNotes
     *
     * @return string
     */
    public function getHeaderNotes()
    {
        return $this->headerNotes;
    }

    /**
     * Sets a new headerNotes
     *
     * @param string $headerNotes
     * @return self
     */
    public function setHeaderNotes($headerNotes)
    {
        $this->headerNotes = $headerNotes;
        return $this;
    }

    /**
     * Gets as linenumber
     *
     * @return int
     */
    public function getLinenumber()
    {
        return $this->linenumber;
    }

    /**
     * Sets a new linenumber
     *
     * @param int $linenumber
     * @return self
     */
    public function setLinenumber($linenumber)
    {
        $this->linenumber = $linenumber;
        return $this;
    }

    /**
     * Gets as manufacturerOrderNumber
     *
     * @return string
     */
    public function getManufacturerOrderNumber()
    {
        return $this->manufacturerOrderNumber;
    }

    /**
     * Sets a new manufacturerOrderNumber
     *
     * @param string $manufacturerOrderNumber
     * @return self
     */
    public function setManufacturerOrderNumber($manufacturerOrderNumber)
    {
        $this->manufacturerOrderNumber = $manufacturerOrderNumber;
        return $this;
    }

    /**
     * Gets as miscChargeTotal
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getMiscChargeTotal()
    {
        return $this->miscChargeTotal;
    }

    /**
     * Sets a new miscChargeTotal
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $miscChargeTotal
     * @return self
     */
    public function setMiscChargeTotal(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $miscChargeTotal)
    {
        $this->miscChargeTotal = $miscChargeTotal;
        return $this;
    }

    /**
     * Gets as miscDescription
     *
     * @return string
     */
    public function getMiscDescription()
    {
        return $this->miscDescription;
    }

    /**
     * Sets a new miscDescription
     *
     * @param string $miscDescription
     * @return self
     */
    public function setMiscDescription($miscDescription)
    {
        $this->miscDescription = $miscDescription;
        return $this;
    }

    /**
     * Gets as orderDate
     *
     * @return \DateTime
     */
    public function getOrderDate()
    {
        return $this->orderDate;
    }

    /**
     * Sets a new orderDate
     *
     * @param \DateTime $orderDate
     * @return self
     */
    public function setOrderDate(\DateTime $orderDate)
    {
        $this->orderDate = $orderDate;
        return $this;
    }

    /**
     * Gets as orderReferenceNumber
     *
     * @return string
     */
    public function getOrderReferenceNumber()
    {
        return $this->orderReferenceNumber;
    }

    /**
     * Sets a new orderReferenceNumber
     *
     * @param string $orderReferenceNumber
     * @return self
     */
    public function setOrderReferenceNumber($orderReferenceNumber)
    {
        $this->orderReferenceNumber = $orderReferenceNumber;
        return $this;
    }

    /**
     * Gets as orderType
     *
     * @return string
     */
    public function getOrderType()
    {
        return $this->orderType;
    }

    /**
     * Sets a new orderType
     *
     * @param string $orderType
     * @return self
     */
    public function setOrderType($orderType)
    {
        $this->orderType = $orderType;
        return $this;
    }

    /**
     * Gets as packQty
     *
     * @return float
     */
    public function getPackQty()
    {
        return $this->packQty;
    }

    /**
     * Sets a new packQty
     *
     * @param float $packQty
     * @return self
     */
    public function setPackQty($packQty)
    {
        $this->packQty = $packQty;
        return $this;
    }

    /**
     * Gets as partClass
     *
     * @return string
     */
    public function getPartClass()
    {
        return $this->partClass;
    }

    /**
     * Sets a new partClass
     *
     * @param string $partClass
     * @return self
     */
    public function setPartClass($partClass)
    {
        $this->partClass = $partClass;
        return $this;
    }

    /**
     * Gets as partKey
     *
     * @return string
     */
    public function getPartKey()
    {
        return $this->partKey;
    }

    /**
     * Sets a new partKey
     *
     * @param string $partKey
     * @return self
     */
    public function setPartKey($partKey)
    {
        $this->partKey = $partKey;
        return $this;
    }

    /**
     * Gets as partName
     *
     * @return string
     */
    public function getPartName()
    {
        return $this->partName;
    }

    /**
     * Sets a new partName
     *
     * @param string $partName
     * @return self
     */
    public function setPartName($partName)
    {
        $this->partName = $partName;
        return $this;
    }

    /**
     * Gets as partNumber
     *
     * @return string
     */
    public function getPartNumber()
    {
        return $this->partNumber;
    }

    /**
     * Sets a new partNumber
     *
     * @param string $partNumber
     * @return self
     */
    public function setPartNumber($partNumber)
    {
        $this->partNumber = $partNumber;
        return $this;
    }

    /**
     * Gets as partsInvoiceItemNetAmount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getPartsInvoiceItemNetAmount()
    {
        return $this->partsInvoiceItemNetAmount;
    }

    /**
     * Sets a new partsInvoiceItemNetAmount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $partsInvoiceItemNetAmount
     * @return self
     */
    public function setPartsInvoiceItemNetAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $partsInvoiceItemNetAmount)
    {
        $this->partsInvoiceItemNetAmount = $partsInvoiceItemNetAmount;
        return $this;
    }

    /**
     * Gets as priceDescription
     *
     * @return string
     */
    public function getPriceDescription()
    {
        return $this->priceDescription;
    }

    /**
     * Sets a new priceDescription
     *
     * @param string $priceDescription
     * @return self
     */
    public function setPriceDescription($priceDescription)
    {
        $this->priceDescription = $priceDescription;
        return $this;
    }

    /**
     * Gets as processCode
     *
     * @return string
     */
    public function getProcessCode()
    {
        return $this->processCode;
    }

    /**
     * Sets a new processCode
     *
     * @param string $processCode
     * @return self
     */
    public function setProcessCode($processCode)
    {
        $this->processCode = $processCode;
        return $this;
    }

    /**
     * Gets as processDate
     *
     * @return \DateTime
     */
    public function getProcessDate()
    {
        return $this->processDate;
    }

    /**
     * Sets a new processDate
     *
     * @param \DateTime $processDate
     * @return self
     */
    public function setProcessDate(\DateTime $processDate)
    {
        $this->processDate = $processDate;
        return $this;
    }

    /**
     * Gets as purchaseOrderNum
     *
     * @return string
     */
    public function getPurchaseOrderNum()
    {
        return $this->purchaseOrderNum;
    }

    /**
     * Sets a new purchaseOrderNum
     *
     * @param string $purchaseOrderNum
     * @return self
     */
    public function setPurchaseOrderNum($purchaseOrderNum)
    {
        $this->purchaseOrderNum = $purchaseOrderNum;
        return $this;
    }

    /**
     * Gets as quantityOrdered
     *
     * @return float
     */
    public function getQuantityOrdered()
    {
        return $this->quantityOrdered;
    }

    /**
     * Sets a new quantityOrdered
     *
     * @param float $quantityOrdered
     * @return self
     */
    public function setQuantityOrdered($quantityOrdered)
    {
        $this->quantityOrdered = $quantityOrdered;
        return $this;
    }

    /**
     * Gets as quantityShipped
     *
     * @return float
     */
    public function getQuantityShipped()
    {
        return $this->quantityShipped;
    }

    /**
     * Sets a new quantityShipped
     *
     * @param float $quantityShipped
     * @return self
     */
    public function setQuantityShipped($quantityShipped)
    {
        $this->quantityShipped = $quantityShipped;
        return $this;
    }

    /**
     * Gets as retailAmount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getRetailAmount()
    {
        return $this->retailAmount;
    }

    /**
     * Sets a new retailAmount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $retailAmount
     * @return self
     */
    public function setRetailAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $retailAmount)
    {
        $this->retailAmount = $retailAmount;
        return $this;
    }

    /**
     * Gets as saleType
     *
     * @return string
     */
    public function getSaleType()
    {
        return $this->saleType;
    }

    /**
     * Sets a new saleType
     *
     * @param string $saleType
     * @return self
     */
    public function setSaleType($saleType)
    {
        $this->saleType = $saleType;
        return $this;
    }

    /**
     * Gets as shipmentNumber
     *
     * @return string
     */
    public function getShipmentNumber()
    {
        return $this->shipmentNumber;
    }

    /**
     * Sets a new shipmentNumber
     *
     * @param string $shipmentNumber
     * @return self
     */
    public function setShipmentNumber($shipmentNumber)
    {
        $this->shipmentNumber = $shipmentNumber;
        return $this;
    }

    /**
     * Gets as shippingPDC
     *
     * @return string
     */
    public function getShippingPDC()
    {
        return $this->shippingPDC;
    }

    /**
     * Sets a new shippingPDC
     *
     * @param string $shippingPDC
     * @return self
     */
    public function setShippingPDC($shippingPDC)
    {
        $this->shippingPDC = $shippingPDC;
        return $this;
    }

    /**
     * Gets as soldAmount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getSoldAmount()
    {
        return $this->soldAmount;
    }

    /**
     * Sets a new soldAmount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $soldAmount
     * @return self
     */
    public function setSoldAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $soldAmount)
    {
        $this->soldAmount = $soldAmount;
        return $this;
    }

    /**
     * Gets as soldDate
     *
     * @return \DateTime
     */
    public function getSoldDate()
    {
        return $this->soldDate;
    }

    /**
     * Sets a new soldDate
     *
     * @param \DateTime $soldDate
     * @return self
     */
    public function setSoldDate(\DateTime $soldDate)
    {
        $this->soldDate = $soldDate;
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
     * Gets as sourceDescription
     *
     * @return string
     */
    public function getSourceDescription()
    {
        return $this->sourceDescription;
    }

    /**
     * Sets a new sourceDescription
     *
     * @param string $sourceDescription
     * @return self
     */
    public function setSourceDescription($sourceDescription)
    {
        $this->sourceDescription = $sourceDescription;
        return $this;
    }

    /**
     * Gets as specialTax
     *
     * @return float
     */
    public function getSpecialTax()
    {
        return $this->specialTax;
    }

    /**
     * Sets a new specialTax
     *
     * @param float $specialTax
     * @return self
     */
    public function setSpecialTax($specialTax)
    {
        $this->specialTax = $specialTax;
        return $this;
    }

    /**
     * Gets as submittedAmount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getSubmittedAmount()
    {
        return $this->submittedAmount;
    }

    /**
     * Sets a new submittedAmount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $submittedAmount
     * @return self
     */
    public function setSubmittedAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $submittedAmount)
    {
        $this->submittedAmount = $submittedAmount;
        return $this;
    }

    /**
     * Gets as taxAmount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTaxAmount()
    {
        return $this->taxAmount;
    }

    /**
     * Sets a new taxAmount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $taxAmount
     * @return self
     */
    public function setTaxAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $taxAmount)
    {
        $this->taxAmount = $taxAmount;
        return $this;
    }

    /**
     * Gets as taxDescription
     *
     * @return string
     */
    public function getTaxDescription()
    {
        return $this->taxDescription;
    }

    /**
     * Sets a new taxDescription
     *
     * @param string $taxDescription
     * @return self
     */
    public function setTaxDescription($taxDescription)
    {
        $this->taxDescription = $taxDescription;
        return $this;
    }

    /**
     * Gets as taxPaidToName
     *
     * @return string
     */
    public function getTaxPaidToName()
    {
        return $this->taxPaidToName;
    }

    /**
     * Sets a new taxPaidToName
     *
     * @param string $taxPaidToName
     * @return self
     */
    public function setTaxPaidToName($taxPaidToName)
    {
        $this->taxPaidToName = $taxPaidToName;
        return $this;
    }

    /**
     * Gets as tradeInAmount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTradeInAmount()
    {
        return $this->tradeInAmount;
    }

    /**
     * Sets a new tradeInAmount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $tradeInAmount
     * @return self
     */
    public function setTradeInAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $tradeInAmount)
    {
        $this->tradeInAmount = $tradeInAmount;
        return $this;
    }

    /**
     * Gets as vendor
     *
     * @return string
     */
    public function getVendor()
    {
        return $this->vendor;
    }

    /**
     * Sets a new vendor
     *
     * @param string $vendor
     * @return self
     */
    public function setVendor($vendor)
    {
        $this->vendor = $vendor;
        return $this;
    }


}


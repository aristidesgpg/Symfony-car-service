<?php

namespace App\Soap\dealerbuilt\src\Models\Parts;

/**
 * Class representing InventoryPartAttributesType.
 *
 * XSD Type: InventoryPartAttributes
 */
class InventoryPartAttributesType
{
    /**
     * @var \DateTime
     */
    private $addedDate = null;

    /**
     * @var float
     */
    private $backorderedQuantity = null;

    /**
     * @var float
     */
    private $bestStockingLevel = null;

    /**
     * @var string[]
     */
    private $bins = null;

    /**
     * @var float
     */
    private $cTQuantitySoldMonthToDate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $coreCost = null;

    /**
     * @var float
     */
    private $coreQuantity = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $cost = null;

    /**
     * @var int
     */
    private $dealerPartId = null;

    /**
     * @var string
     */
    private $description = null;

    /**
     * @var bool
     */
    private $factoryControlled = null;

    /**
     * @var \DateTime
     */
    private $inventoryStamp = null;

    /**
     * @var string[]
     */
    private $inventorySupercessionChain = null;

    /**
     * @var \DateTime
     */
    private $lastPhysicalInventoryDate = null;

    /**
     * @var \DateTime
     */
    private $lastReceiptDate = null;

    /**
     * @var float
     */
    private $lastReceiptQuantity = null;

    /**
     * @var \DateTime
     */
    private $lastSoldDate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $listPrice = null;

    /**
     * @var float
     */
    private $maximumOnHandQuantity = null;

    /**
     * @var float
     */
    private $minimumOnHandQuantity = null;

    /**
     * @var int
     */
    private $monthsWithoutSale = null;

    /**
     * @var float
     */
    private $onHandQuantity = null;

    /**
     * @var float
     */
    private $onHoldQuantity = null;

    /**
     * @var float
     */
    private $onOrderQuantity = null;

    /**
     * @var float
     */
    private $packQuantity = null;

    /**
     * @var string
     */
    private $partNumber = null;

    /**
     * @var string
     */
    private $partNumberFormatted = null;

    /**
     * @var float
     */
    private $quantityLostMonthToDate = null;

    /**
     * @var float[]
     */
    private $quantityLostPerMonth = null;

    /**
     * @var float
     */
    private $quantityLostToday = null;

    /**
     * @var float
     */
    private $quantityReturnedMonthToDate = null;

    /**
     * @var float
     */
    private $quantityReturnedToday = null;

    /**
     * @var float
     */
    private $quantitySoldMonthToDate = null;

    /**
     * @var float[]
     */
    private $quantitySoldPerMonth = null;

    /**
     * @var float
     */
    private $quantitySoldToday = null;

    /**
     * @var float
     */
    private $rOQuantitySoldMonthToDate = null;

    /**
     * @var float
     */
    private $receiptQuantityMonthToDate = null;

    /**
     * @var string
     */
    private $remarks = null;

    /**
     * @var float
     */
    private $reorderPoint = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $retailPrice = null;

    /**
     * @var string
     */
    private $source = null;

    /**
     * @var string
     */
    private $stockingStatus = null;

    /**
     * @var string
     */
    private $supercededByVendorPartNumber = null;

    /**
     * @var string
     */
    private $supercedesVendorPartNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $tradePrice = null;

    /**
     * @var float
     */
    private $twelveMonthLostQuantity = null;

    /**
     * @var float
     */
    private $twelveMonthSalesQuantity = null;

    /**
     * @var string
     */
    private $vendor = null;

    /**
     * @var string[]
     */
    private $vendorSupercessionChain = null;

    /**
     * Gets as addedDate.
     *
     * @return \DateTime
     */
    public function getAddedDate()
    {
        return $this->addedDate;
    }

    /**
     * Sets a new addedDate.
     *
     * @param \DateTime $addedDate
     *
     * @return self
     */
    public function setAddedDate(\DateTime $addedDate = null)
    {
        $this->addedDate = $addedDate;

        return $this;
    }

    /**
     * Gets as backorderedQuantity.
     *
     * @return float
     */
    public function getBackorderedQuantity()
    {
        return $this->backorderedQuantity;
    }

    /**
     * Sets a new backorderedQuantity.
     *
     * @param float $backorderedQuantity
     *
     * @return self
     */
    public function setBackorderedQuantity($backorderedQuantity)
    {
        $this->backorderedQuantity = $backorderedQuantity;

        return $this;
    }

    /**
     * Gets as bestStockingLevel.
     *
     * @return float
     */
    public function getBestStockingLevel()
    {
        return $this->bestStockingLevel;
    }

    /**
     * Sets a new bestStockingLevel.
     *
     * @param float $bestStockingLevel
     *
     * @return self
     */
    public function setBestStockingLevel($bestStockingLevel)
    {
        $this->bestStockingLevel = $bestStockingLevel;

        return $this;
    }

    /**
     * Adds as string.
     *
     * @return self
     *
     * @param string $string
     */
    public function addToBins($string)
    {
        $this->bins[] = $string;

        return $this;
    }

    /**
     * isset bins.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetBins($index)
    {
        return isset($this->bins[$index]);
    }

    /**
     * unset bins.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetBins($index)
    {
        unset($this->bins[$index]);
    }

    /**
     * Gets as bins.
     *
     * @return string[]
     */
    public function getBins()
    {
        return $this->bins;
    }

    /**
     * Sets a new bins.
     *
     * @param string[] $bins
     *
     * @return self
     */
    public function setBins(array $bins = null)
    {
        $this->bins = $bins;

        return $this;
    }

    /**
     * Gets as cTQuantitySoldMonthToDate.
     *
     * @return float
     */
    public function getCTQuantitySoldMonthToDate()
    {
        return $this->cTQuantitySoldMonthToDate;
    }

    /**
     * Sets a new cTQuantitySoldMonthToDate.
     *
     * @param float $cTQuantitySoldMonthToDate
     *
     * @return self
     */
    public function setCTQuantitySoldMonthToDate($cTQuantitySoldMonthToDate)
    {
        $this->cTQuantitySoldMonthToDate = $cTQuantitySoldMonthToDate;

        return $this;
    }

    /**
     * Gets as coreCost.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCoreCost()
    {
        return $this->coreCost;
    }

    /**
     * Sets a new coreCost.
     *
     * @return self
     */
    public function setCoreCost(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $coreCost)
    {
        $this->coreCost = $coreCost;

        return $this;
    }

    /**
     * Gets as coreQuantity.
     *
     * @return float
     */
    public function getCoreQuantity()
    {
        return $this->coreQuantity;
    }

    /**
     * Sets a new coreQuantity.
     *
     * @param float $coreQuantity
     *
     * @return self
     */
    public function setCoreQuantity($coreQuantity)
    {
        $this->coreQuantity = $coreQuantity;

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
     * Gets as dealerPartId.
     *
     * @return int
     */
    public function getDealerPartId()
    {
        return $this->dealerPartId;
    }

    /**
     * Sets a new dealerPartId.
     *
     * @param int $dealerPartId
     *
     * @return self
     */
    public function setDealerPartId($dealerPartId)
    {
        $this->dealerPartId = $dealerPartId;

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
     * Gets as factoryControlled.
     *
     * @return bool
     */
    public function getFactoryControlled()
    {
        return $this->factoryControlled;
    }

    /**
     * Sets a new factoryControlled.
     *
     * @param bool $factoryControlled
     *
     * @return self
     */
    public function setFactoryControlled($factoryControlled)
    {
        $this->factoryControlled = $factoryControlled;

        return $this;
    }

    /**
     * Gets as inventoryStamp.
     *
     * @return \DateTime
     */
    public function getInventoryStamp()
    {
        return $this->inventoryStamp;
    }

    /**
     * Sets a new inventoryStamp.
     *
     * @param \DateTime $inventoryStamp
     *
     * @return self
     */
    public function setInventoryStamp(\DateTime $inventoryStamp = null)
    {
        $this->inventoryStamp = $inventoryStamp;

        return $this;
    }

    /**
     * Adds as string.
     *
     * @return self
     *
     * @param string $string
     */
    public function addToInventorySupercessionChain($string)
    {
        $this->inventorySupercessionChain[] = $string;

        return $this;
    }

    /**
     * isset inventorySupercessionChain.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetInventorySupercessionChain($index)
    {
        return isset($this->inventorySupercessionChain[$index]);
    }

    /**
     * unset inventorySupercessionChain.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetInventorySupercessionChain($index)
    {
        unset($this->inventorySupercessionChain[$index]);
    }

    /**
     * Gets as inventorySupercessionChain.
     *
     * @return string[]
     */
    public function getInventorySupercessionChain()
    {
        return $this->inventorySupercessionChain;
    }

    /**
     * Sets a new inventorySupercessionChain.
     *
     * @param string[] $inventorySupercessionChain
     *
     * @return self
     */
    public function setInventorySupercessionChain(array $inventorySupercessionChain)
    {
        $this->inventorySupercessionChain = $inventorySupercessionChain;

        return $this;
    }

    /**
     * Gets as lastPhysicalInventoryDate.
     *
     * @return \DateTime
     */
    public function getLastPhysicalInventoryDate()
    {
        return $this->lastPhysicalInventoryDate;
    }

    /**
     * Sets a new lastPhysicalInventoryDate.
     *
     * @param \DateTime $lastPhysicalInventoryDate
     *
     * @return self
     */
    public function setLastPhysicalInventoryDate(\DateTime $lastPhysicalInventoryDate = null)
    {
        $this->lastPhysicalInventoryDate = $lastPhysicalInventoryDate;

        return $this;
    }

    /**
     * Gets as lastReceiptDate.
     *
     * @return \DateTime
     */
    public function getLastReceiptDate()
    {
        return $this->lastReceiptDate;
    }

    /**
     * Sets a new lastReceiptDate.
     *
     * @param \DateTime $lastReceiptDate
     *
     * @return self
     */
    public function setLastReceiptDate(\DateTime $lastReceiptDate = null)
    {
        $this->lastReceiptDate = $lastReceiptDate;

        return $this;
    }

    /**
     * Gets as lastReceiptQuantity.
     *
     * @return float
     */
    public function getLastReceiptQuantity()
    {
        return $this->lastReceiptQuantity;
    }

    /**
     * Sets a new lastReceiptQuantity.
     *
     * @param float $lastReceiptQuantity
     *
     * @return self
     */
    public function setLastReceiptQuantity($lastReceiptQuantity)
    {
        $this->lastReceiptQuantity = $lastReceiptQuantity;

        return $this;
    }

    /**
     * Gets as lastSoldDate.
     *
     * @return \DateTime
     */
    public function getLastSoldDate()
    {
        return $this->lastSoldDate;
    }

    /**
     * Sets a new lastSoldDate.
     *
     * @param \DateTime $lastSoldDate
     *
     * @return self
     */
    public function setLastSoldDate(\DateTime $lastSoldDate = null)
    {
        $this->lastSoldDate = $lastSoldDate;

        return $this;
    }

    /**
     * Gets as listPrice.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getListPrice()
    {
        return $this->listPrice;
    }

    /**
     * Sets a new listPrice.
     *
     * @return self
     */
    public function setListPrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $listPrice)
    {
        $this->listPrice = $listPrice;

        return $this;
    }

    /**
     * Gets as maximumOnHandQuantity.
     *
     * @return float
     */
    public function getMaximumOnHandQuantity()
    {
        return $this->maximumOnHandQuantity;
    }

    /**
     * Sets a new maximumOnHandQuantity.
     *
     * @param float $maximumOnHandQuantity
     *
     * @return self
     */
    public function setMaximumOnHandQuantity($maximumOnHandQuantity)
    {
        $this->maximumOnHandQuantity = $maximumOnHandQuantity;

        return $this;
    }

    /**
     * Gets as minimumOnHandQuantity.
     *
     * @return float
     */
    public function getMinimumOnHandQuantity()
    {
        return $this->minimumOnHandQuantity;
    }

    /**
     * Sets a new minimumOnHandQuantity.
     *
     * @param float $minimumOnHandQuantity
     *
     * @return self
     */
    public function setMinimumOnHandQuantity($minimumOnHandQuantity)
    {
        $this->minimumOnHandQuantity = $minimumOnHandQuantity;

        return $this;
    }

    /**
     * Gets as monthsWithoutSale.
     *
     * @return int
     */
    public function getMonthsWithoutSale()
    {
        return $this->monthsWithoutSale;
    }

    /**
     * Sets a new monthsWithoutSale.
     *
     * @param int $monthsWithoutSale
     *
     * @return self
     */
    public function setMonthsWithoutSale($monthsWithoutSale)
    {
        $this->monthsWithoutSale = $monthsWithoutSale;

        return $this;
    }

    /**
     * Gets as onHandQuantity.
     *
     * @return float
     */
    public function getOnHandQuantity()
    {
        return $this->onHandQuantity;
    }

    /**
     * Sets a new onHandQuantity.
     *
     * @param float $onHandQuantity
     *
     * @return self
     */
    public function setOnHandQuantity($onHandQuantity)
    {
        $this->onHandQuantity = $onHandQuantity;

        return $this;
    }

    /**
     * Gets as onHoldQuantity.
     *
     * @return float
     */
    public function getOnHoldQuantity()
    {
        return $this->onHoldQuantity;
    }

    /**
     * Sets a new onHoldQuantity.
     *
     * @param float $onHoldQuantity
     *
     * @return self
     */
    public function setOnHoldQuantity($onHoldQuantity)
    {
        $this->onHoldQuantity = $onHoldQuantity;

        return $this;
    }

    /**
     * Gets as onOrderQuantity.
     *
     * @return float
     */
    public function getOnOrderQuantity()
    {
        return $this->onOrderQuantity;
    }

    /**
     * Sets a new onOrderQuantity.
     *
     * @param float $onOrderQuantity
     *
     * @return self
     */
    public function setOnOrderQuantity($onOrderQuantity)
    {
        $this->onOrderQuantity = $onOrderQuantity;

        return $this;
    }

    /**
     * Gets as packQuantity.
     *
     * @return float
     */
    public function getPackQuantity()
    {
        return $this->packQuantity;
    }

    /**
     * Sets a new packQuantity.
     *
     * @param float $packQuantity
     *
     * @return self
     */
    public function setPackQuantity($packQuantity)
    {
        $this->packQuantity = $packQuantity;

        return $this;
    }

    /**
     * Gets as partNumber.
     *
     * @return string
     */
    public function getPartNumber()
    {
        return $this->partNumber;
    }

    /**
     * Sets a new partNumber.
     *
     * @param string $partNumber
     *
     * @return self
     */
    public function setPartNumber($partNumber)
    {
        $this->partNumber = $partNumber;

        return $this;
    }

    /**
     * Gets as partNumberFormatted.
     *
     * @return string
     */
    public function getPartNumberFormatted()
    {
        return $this->partNumberFormatted;
    }

    /**
     * Sets a new partNumberFormatted.
     *
     * @param string $partNumberFormatted
     *
     * @return self
     */
    public function setPartNumberFormatted($partNumberFormatted)
    {
        $this->partNumberFormatted = $partNumberFormatted;

        return $this;
    }

    /**
     * Gets as quantityLostMonthToDate.
     *
     * @return float
     */
    public function getQuantityLostMonthToDate()
    {
        return $this->quantityLostMonthToDate;
    }

    /**
     * Sets a new quantityLostMonthToDate.
     *
     * @param float $quantityLostMonthToDate
     *
     * @return self
     */
    public function setQuantityLostMonthToDate($quantityLostMonthToDate)
    {
        $this->quantityLostMonthToDate = $quantityLostMonthToDate;

        return $this;
    }

    /**
     * Adds as decimal.
     *
     * @return self
     *
     * @param float $decimal
     */
    public function addToQuantityLostPerMonth($decimal)
    {
        $this->quantityLostPerMonth[] = $decimal;

        return $this;
    }

    /**
     * isset quantityLostPerMonth.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetQuantityLostPerMonth($index)
    {
        return isset($this->quantityLostPerMonth[$index]);
    }

    /**
     * unset quantityLostPerMonth.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetQuantityLostPerMonth($index)
    {
        unset($this->quantityLostPerMonth[$index]);
    }

    /**
     * Gets as quantityLostPerMonth.
     *
     * @return float[]
     */
    public function getQuantityLostPerMonth()
    {
        return $this->quantityLostPerMonth;
    }

    /**
     * Sets a new quantityLostPerMonth.
     *
     * @param float[] $quantityLostPerMonth
     *
     * @return self
     */
    public function setQuantityLostPerMonth(array $quantityLostPerMonth)
    {
        $this->quantityLostPerMonth = $quantityLostPerMonth;

        return $this;
    }

    /**
     * Gets as quantityLostToday.
     *
     * @return float
     */
    public function getQuantityLostToday()
    {
        return $this->quantityLostToday;
    }

    /**
     * Sets a new quantityLostToday.
     *
     * @param float $quantityLostToday
     *
     * @return self
     */
    public function setQuantityLostToday($quantityLostToday)
    {
        $this->quantityLostToday = $quantityLostToday;

        return $this;
    }

    /**
     * Gets as quantityReturnedMonthToDate.
     *
     * @return float
     */
    public function getQuantityReturnedMonthToDate()
    {
        return $this->quantityReturnedMonthToDate;
    }

    /**
     * Sets a new quantityReturnedMonthToDate.
     *
     * @param float $quantityReturnedMonthToDate
     *
     * @return self
     */
    public function setQuantityReturnedMonthToDate($quantityReturnedMonthToDate)
    {
        $this->quantityReturnedMonthToDate = $quantityReturnedMonthToDate;

        return $this;
    }

    /**
     * Gets as quantityReturnedToday.
     *
     * @return float
     */
    public function getQuantityReturnedToday()
    {
        return $this->quantityReturnedToday;
    }

    /**
     * Sets a new quantityReturnedToday.
     *
     * @param float $quantityReturnedToday
     *
     * @return self
     */
    public function setQuantityReturnedToday($quantityReturnedToday)
    {
        $this->quantityReturnedToday = $quantityReturnedToday;

        return $this;
    }

    /**
     * Gets as quantitySoldMonthToDate.
     *
     * @return float
     */
    public function getQuantitySoldMonthToDate()
    {
        return $this->quantitySoldMonthToDate;
    }

    /**
     * Sets a new quantitySoldMonthToDate.
     *
     * @param float $quantitySoldMonthToDate
     *
     * @return self
     */
    public function setQuantitySoldMonthToDate($quantitySoldMonthToDate)
    {
        $this->quantitySoldMonthToDate = $quantitySoldMonthToDate;

        return $this;
    }

    /**
     * Adds as decimal.
     *
     * @return self
     *
     * @param float $decimal
     */
    public function addToQuantitySoldPerMonth($decimal)
    {
        $this->quantitySoldPerMonth[] = $decimal;

        return $this;
    }

    /**
     * isset quantitySoldPerMonth.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetQuantitySoldPerMonth($index)
    {
        return isset($this->quantitySoldPerMonth[$index]);
    }

    /**
     * unset quantitySoldPerMonth.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetQuantitySoldPerMonth($index)
    {
        unset($this->quantitySoldPerMonth[$index]);
    }

    /**
     * Gets as quantitySoldPerMonth.
     *
     * @return float[]
     */
    public function getQuantitySoldPerMonth()
    {
        return $this->quantitySoldPerMonth;
    }

    /**
     * Sets a new quantitySoldPerMonth.
     *
     * @param float[] $quantitySoldPerMonth
     *
     * @return self
     */
    public function setQuantitySoldPerMonth(array $quantitySoldPerMonth)
    {
        $this->quantitySoldPerMonth = $quantitySoldPerMonth;

        return $this;
    }

    /**
     * Gets as quantitySoldToday.
     *
     * @return float
     */
    public function getQuantitySoldToday()
    {
        return $this->quantitySoldToday;
    }

    /**
     * Sets a new quantitySoldToday.
     *
     * @param float $quantitySoldToday
     *
     * @return self
     */
    public function setQuantitySoldToday($quantitySoldToday)
    {
        $this->quantitySoldToday = $quantitySoldToday;

        return $this;
    }

    /**
     * Gets as rOQuantitySoldMonthToDate.
     *
     * @return float
     */
    public function getROQuantitySoldMonthToDate()
    {
        return $this->rOQuantitySoldMonthToDate;
    }

    /**
     * Sets a new rOQuantitySoldMonthToDate.
     *
     * @param float $rOQuantitySoldMonthToDate
     *
     * @return self
     */
    public function setROQuantitySoldMonthToDate($rOQuantitySoldMonthToDate)
    {
        $this->rOQuantitySoldMonthToDate = $rOQuantitySoldMonthToDate;

        return $this;
    }

    /**
     * Gets as receiptQuantityMonthToDate.
     *
     * @return float
     */
    public function getReceiptQuantityMonthToDate()
    {
        return $this->receiptQuantityMonthToDate;
    }

    /**
     * Sets a new receiptQuantityMonthToDate.
     *
     * @param float $receiptQuantityMonthToDate
     *
     * @return self
     */
    public function setReceiptQuantityMonthToDate($receiptQuantityMonthToDate)
    {
        $this->receiptQuantityMonthToDate = $receiptQuantityMonthToDate;

        return $this;
    }

    /**
     * Gets as remarks.
     *
     * @return string
     */
    public function getRemarks()
    {
        return $this->remarks;
    }

    /**
     * Sets a new remarks.
     *
     * @param string $remarks
     *
     * @return self
     */
    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;

        return $this;
    }

    /**
     * Gets as reorderPoint.
     *
     * @return float
     */
    public function getReorderPoint()
    {
        return $this->reorderPoint;
    }

    /**
     * Sets a new reorderPoint.
     *
     * @param float $reorderPoint
     *
     * @return self
     */
    public function setReorderPoint($reorderPoint)
    {
        $this->reorderPoint = $reorderPoint;

        return $this;
    }

    /**
     * Gets as retailPrice.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getRetailPrice()
    {
        return $this->retailPrice;
    }

    /**
     * Sets a new retailPrice.
     *
     * @return self
     */
    public function setRetailPrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $retailPrice)
    {
        $this->retailPrice = $retailPrice;

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
     * Gets as stockingStatus.
     *
     * @return string
     */
    public function getStockingStatus()
    {
        return $this->stockingStatus;
    }

    /**
     * Sets a new stockingStatus.
     *
     * @param string $stockingStatus
     *
     * @return self
     */
    public function setStockingStatus($stockingStatus)
    {
        $this->stockingStatus = $stockingStatus;

        return $this;
    }

    /**
     * Gets as supercededByVendorPartNumber.
     *
     * @return string
     */
    public function getSupercededByVendorPartNumber()
    {
        return $this->supercededByVendorPartNumber;
    }

    /**
     * Sets a new supercededByVendorPartNumber.
     *
     * @param string $supercededByVendorPartNumber
     *
     * @return self
     */
    public function setSupercededByVendorPartNumber($supercededByVendorPartNumber)
    {
        $this->supercededByVendorPartNumber = $supercededByVendorPartNumber;

        return $this;
    }

    /**
     * Gets as supercedesVendorPartNumber.
     *
     * @return string
     */
    public function getSupercedesVendorPartNumber()
    {
        return $this->supercedesVendorPartNumber;
    }

    /**
     * Sets a new supercedesVendorPartNumber.
     *
     * @param string $supercedesVendorPartNumber
     *
     * @return self
     */
    public function setSupercedesVendorPartNumber($supercedesVendorPartNumber)
    {
        $this->supercedesVendorPartNumber = $supercedesVendorPartNumber;

        return $this;
    }

    /**
     * Gets as tradePrice.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTradePrice()
    {
        return $this->tradePrice;
    }

    /**
     * Sets a new tradePrice.
     *
     * @return self
     */
    public function setTradePrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $tradePrice)
    {
        $this->tradePrice = $tradePrice;

        return $this;
    }

    /**
     * Gets as twelveMonthLostQuantity.
     *
     * @return float
     */
    public function getTwelveMonthLostQuantity()
    {
        return $this->twelveMonthLostQuantity;
    }

    /**
     * Sets a new twelveMonthLostQuantity.
     *
     * @param float $twelveMonthLostQuantity
     *
     * @return self
     */
    public function setTwelveMonthLostQuantity($twelveMonthLostQuantity)
    {
        $this->twelveMonthLostQuantity = $twelveMonthLostQuantity;

        return $this;
    }

    /**
     * Gets as twelveMonthSalesQuantity.
     *
     * @return float
     */
    public function getTwelveMonthSalesQuantity()
    {
        return $this->twelveMonthSalesQuantity;
    }

    /**
     * Sets a new twelveMonthSalesQuantity.
     *
     * @param float $twelveMonthSalesQuantity
     *
     * @return self
     */
    public function setTwelveMonthSalesQuantity($twelveMonthSalesQuantity)
    {
        $this->twelveMonthSalesQuantity = $twelveMonthSalesQuantity;

        return $this;
    }

    /**
     * Gets as vendor.
     *
     * @return string
     */
    public function getVendor()
    {
        return $this->vendor;
    }

    /**
     * Sets a new vendor.
     *
     * @param string $vendor
     *
     * @return self
     */
    public function setVendor($vendor)
    {
        $this->vendor = $vendor;

        return $this;
    }

    /**
     * Adds as string.
     *
     * @return self
     *
     * @param string $string
     */
    public function addToVendorSupercessionChain($string)
    {
        $this->vendorSupercessionChain[] = $string;

        return $this;
    }

    /**
     * isset vendorSupercessionChain.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetVendorSupercessionChain($index)
    {
        return isset($this->vendorSupercessionChain[$index]);
    }

    /**
     * unset vendorSupercessionChain.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetVendorSupercessionChain($index)
    {
        unset($this->vendorSupercessionChain[$index]);
    }

    /**
     * Gets as vendorSupercessionChain.
     *
     * @return string[]
     */
    public function getVendorSupercessionChain()
    {
        return $this->vendorSupercessionChain;
    }

    /**
     * Sets a new vendorSupercessionChain.
     *
     * @param string[] $vendorSupercessionChain
     *
     * @return self
     */
    public function setVendorSupercessionChain(array $vendorSupercessionChain)
    {
        $this->vendorSupercessionChain = $vendorSupercessionChain;

        return $this;
    }
}

<?php

namespace App\Soap\dealertrack\src;

/**
 * Class representing PartsResult
 */
class PartsResult
{

    /**
     * @var string $companyNumber
     */
    private $companyNumber = null;

    /**
     * @var string $manufacturer
     */
    private $manufacturer = null;

    /**
     * @var string $partNumber
     */
    private $partNumber = null;

    /**
     * @var string $partDescription
     */
    private $partDescription = null;

    /**
     * @var int $stockingGroup
     */
    private $stockingGroup = null;

    /**
     * @var string $status
     */
    private $status = null;

    /**
     * @var \App\Soap\dealertrack\src\Obsolete $obsolete
     */
    private $obsolete = null;

    /**
     * @var string $returnCode
     */
    private $returnCode = null;

    /**
     * @var \App\Soap\dealertrack\src\ArrivalCode $arrivalCode
     */
    private $arrivalCode = null;

    /**
     * @var string $stockPromoCode
     */
    private $stockPromoCode = null;

    /**
     * @var \App\Soap\dealertrack\src\SpecialOrderCode $specialOrderCode
     */
    private $specialOrderCode = null;

    /**
     * @var string $priceUpdate
     */
    private $priceUpdate = null;

    /**
     * @var \App\Soap\dealertrack\src\KitPart $kitPart
     */
    private $kitPart = null;

    /**
     * @var \App\Soap\dealertrack\src\ComponentPart $componentPart
     */
    private $componentPart = null;

    /**
     * @var \App\Soap\dealertrack\src\AssociateWithPart $associateWithPart
     */
    private $associateWithPart = null;

    /**
     * @var \App\Soap\dealertrack\src\AlternatePart $alternatePart
     */
    private $alternatePart = null;

    /**
     * @var string $corePart
     */
    private $corePart = null;

    /**
     * @var \App\Soap\dealertrack\src\MerchCode $merchCode
     */
    private $merchCode = null;

    /**
     * @var string $priceSymbol
     */
    private $priceSymbol = null;

    /**
     * @var string $prodCodeClass
     */
    private $prodCodeClass = null;

    /**
     * @var \App\Soap\dealertrack\src\FleetAllowance $fleetAllowance
     */
    private $fleetAllowance = null;

    /**
     * @var string $groupCode
     */
    private $groupCode = null;

    /**
     * @var string $binLocation
     */
    private $binLocation = null;

    /**
     * @var \App\Soap\dealertrack\src\ShelfLocation $shelfLocation
     */
    private $shelfLocation = null;

    /**
     * @var int $quantityOnHand
     */
    private $quantityOnHand = null;

    /**
     * @var int $quantityReserved
     */
    private $quantityReserved = null;

    /**
     * @var int $quantityOnOrder
     */
    private $quantityOnOrder = null;

    /**
     * @var int $quantityOnBackOrder
     */
    private $quantityOnBackOrder = null;

    /**
     * @var int $quantityOnSpecialOrder
     */
    private $quantityOnSpecialOrder = null;

    /**
     * @var int $placeOnOrder
     */
    private $placeOnOrder = null;

    /**
     * @var int $placeOnSpecialOrder
     */
    private $placeOnSpecialOrder = null;

    /**
     * @var int $packQuantity
     */
    private $packQuantity = null;

    /**
     * @var int $minSalesQuantity
     */
    private $minSalesQuantity = null;

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
     * @var float $wholesaleComp
     */
    private $wholesaleComp = null;

    /**
     * @var float $wholesaleCompFleet
     */
    private $wholesaleCompFleet = null;

    /**
     * @var float $flatPrice
     */
    private $flatPrice = null;

    /**
     * @var int $minMaxPackAdj
     */
    private $minMaxPackAdj = null;

    /**
     * @var int $dynamDaysSupply
     */
    private $dynamDaysSupply = null;

    /**
     * @var int $minimumOnHand
     */
    private $minimumOnHand = null;

    /**
     * @var int $maximumOnHand
     */
    private $maximumOnHand = null;

    /**
     * @var int $lowModelYear
     */
    private $lowModelYear = null;

    /**
     * @var int $highModelYear
     */
    private $highModelYear = null;

    /**
     * @var int $dateInInventory
     */
    private $dateInInventory = null;

    /**
     * @var int $datePhasedOut
     */
    private $datePhasedOut = null;

    /**
     * @var int $dateLastSold
     */
    private $dateLastSold = null;

    /**
     * @var float $inventoryTurns
     */
    private $inventoryTurns = null;

    /**
     * @var int $bestStockLevel
     */
    private $bestStockLevel = null;

    /**
     * @var int $stockStatus
     */
    private $stockStatus = null;

    /**
     * @var int $recentDemand
     */
    private $recentDemand = null;

    /**
     * @var int $priorDemand
     */
    private $priorDemand = null;

    /**
     * @var float $recentWorkDays
     */
    private $recentWorkDays = null;

    /**
     * @var float $priorWorkDays
     */
    private $priorWorkDays = null;

    /**
     * @var float $weightedDailyAverage
     */
    private $weightedDailyAverage = null;

    /**
     * @var int $salesDemand
     */
    private $salesDemand = null;

    /**
     * @var int $lostSalesDemand
     */
    private $lostSalesDemand = null;

    /**
     * @var int $specOrderDemand
     */
    private $specOrderDemand = null;

    /**
     * @var int $nonStockDemand
     */
    private $nonStockDemand = null;

    /**
     * @var int $returnDemand
     */
    private $returnDemand = null;

    /**
     * @var float $inventoryValue
     */
    private $inventoryValue = null;

    /**
     * @var int $totalQuantitySold
     */
    private $totalQuantitySold = null;

    /**
     * @var float $totalCostSales
     */
    private $totalCostSales = null;

    /**
     * @var float $stockPurchases
     */
    private $stockPurchases = null;

    /**
     * @var string $displayPartNumber
     */
    private $displayPartNumber = null;

    /**
     * @var string $sortPartNumber
     */
    private $sortPartNumber = null;

    /**
     * @var string $oldPartNumber
     */
    private $oldPartNumber = null;

    /**
     * @var string $newPartNumber
     */
    private $newPartNumber = null;

    /**
     * @var \App\Soap\dealertrack\src\CorePartNumber $corePartNumber
     */
    private $corePartNumber = null;

    /**
     * @var \App\Soap\dealertrack\src\Remarks $remarks
     */
    private $remarks = null;

    /**
     * @var \App\Soap\dealertrack\src\DisplayRemarks $displayRemarks
     */
    private $displayRemarks = null;

    /**
     * @var int $bulkItemActualWeight
     */
    private $bulkItemActualWeight = null;

    /**
     * @var \App\Soap\dealertrack\src\SecondaryBinLocation $secondaryBinLocation
     */
    private $secondaryBinLocation = null;

    /**
     * @var \App\Soap\dealertrack\src\ClassCode $classCode
     */
    private $classCode = null;

    /**
     * @var float $partDealerToDealerPrice
     */
    private $partDealerToDealerPrice = null;

    /**
     * @var float $partSubsidiaryPrice
     */
    private $partSubsidiaryPrice = null;

    /**
     * @var \App\Soap\dealertrack\src\PartDealerToDealerCode $partDealerToDealerCode
     */
    private $partDealerToDealerCode = null;

    /**
     * @var int $emergencyRepairPackage
     */
    private $emergencyRepairPackage = null;

    /**
     * @var \App\Soap\dealertrack\src\PartLsgCode $partLsgCode
     */
    private $partLsgCode = null;

    /**
     * @var string $brandCode
     */
    private $brandCode = null;

    /**
     * @var \App\Soap\dealertrack\src\Partcommondcode $partcommondcode
     */
    private $partcommondcode = null;

    /**
     * @var \App\Soap\dealertrack\src\PartCrossShipCode $partCrossShipCode
     */
    private $partCrossShipCode = null;

    /**
     * @var \App\Soap\dealertrack\src\PartDiscountCode $partDiscountCode
     */
    private $partDiscountCode = null;

    /**
     * @var \App\Soap\dealertrack\src\PartDirectshipCode $partDirectshipCode
     */
    private $partDirectshipCode = null;

    /**
     * @var \App\Soap\dealertrack\src\PartHazardCode $partHazardCode
     */
    private $partHazardCode = null;

    /**
     * @var \App\Soap\dealertrack\src\PartInterchangeSubstitute $partInterchangeSubstitute
     */
    private $partInterchangeSubstitute = null;

    /**
     * @var \App\Soap\dealertrack\src\PartLargeQuantityCode $partLargeQuantityCode
     */
    private $partLargeQuantityCode = null;

    /**
     * @var int $partMaximumOrderQuantity
     */
    private $partMaximumOrderQuantity = null;

    /**
     * @var int $partMinimumOrderQuantity
     */
    private $partMinimumOrderQuantity = null;

    /**
     * @var \App\Soap\dealertrack\src\PartObsoleteStatus $partObsoleteStatus
     */
    private $partObsoleteStatus = null;

    /**
     * @var \App\Soap\dealertrack\src\ProgramPartAllowanceCode $programPartAllowanceCode
     */
    private $programPartAllowanceCode = null;

    /**
     * @var float $partPricingDiscountPer
     */
    private $partPricingDiscountPer = null;

    /**
     * @var \App\Soap\dealertrack\src\ProgramPartReturnableCode $programPartReturnableCode
     */
    private $programPartReturnableCode = null;

    /**
     * @var \App\Soap\dealertrack\src\PartSizeCode $partSizeCode
     */
    private $partSizeCode = null;

    /**
     * @var \App\Soap\dealertrack\src\PartType $partType
     */
    private $partType = null;

    /**
     * @var \App\Soap\dealertrack\src\PartVolumeDiscountFlag $partVolumeDiscountFlag
     */
    private $partVolumeDiscountFlag = null;

    /**
     * @var \App\Soap\dealertrack\src\SecondaryShelf $secondaryShelf
     */
    private $secondaryShelf = null;

    /**
     * @var \App\Soap\dealertrack\src\WeightCode $weightCode
     */
    private $weightCode = null;

    /**
     * @var float $unitOfMeasure
     */
    private $unitOfMeasure = null;

    /**
     * @var string $stockCode
     */
    private $stockCode = null;

    /**
     * @var int $quantity
     */
    private $quantity = null;

    /**
     * @var string $lastUpdated
     */
    private $lastUpdated = null;

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
     * Gets as manufacturer
     *
     * @return string
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Sets a new manufacturer
     *
     * @param string $manufacturer
     * @return self
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
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
     * Gets as partDescription
     *
     * @return string
     */
    public function getPartDescription()
    {
        return $this->partDescription;
    }

    /**
     * Sets a new partDescription
     *
     * @param string $partDescription
     * @return self
     */
    public function setPartDescription($partDescription)
    {
        $this->partDescription = $partDescription;
        return $this;
    }

    /**
     * Gets as stockingGroup
     *
     * @return int
     */
    public function getStockingGroup()
    {
        return $this->stockingGroup;
    }

    /**
     * Sets a new stockingGroup
     *
     * @param int $stockingGroup
     * @return self
     */
    public function setStockingGroup($stockingGroup)
    {
        $this->stockingGroup = $stockingGroup;
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
     * Gets as obsolete
     *
     * @return \App\Soap\dealertrack\src\Obsolete
     */
    public function getObsolete()
    {
        return $this->obsolete;
    }

    /**
     * Sets a new obsolete
     *
     * @param \App\Soap\dealertrack\src\Obsolete $obsolete
     * @return self
     */
    public function setObsolete(\App\Soap\dealertrack\src\Obsolete $obsolete)
    {
        $this->obsolete = $obsolete;
        return $this;
    }

    /**
     * Gets as returnCode
     *
     * @return string
     */
    public function getReturnCode()
    {
        return $this->returnCode;
    }

    /**
     * Sets a new returnCode
     *
     * @param string $returnCode
     * @return self
     */
    public function setReturnCode($returnCode)
    {
        $this->returnCode = $returnCode;
        return $this;
    }

    /**
     * Gets as arrivalCode
     *
     * @return \App\Soap\dealertrack\src\ArrivalCode
     */
    public function getArrivalCode()
    {
        return $this->arrivalCode;
    }

    /**
     * Sets a new arrivalCode
     *
     * @param \App\Soap\dealertrack\src\ArrivalCode $arrivalCode
     * @return self
     */
    public function setArrivalCode(\App\Soap\dealertrack\src\ArrivalCode $arrivalCode)
    {
        $this->arrivalCode = $arrivalCode;
        return $this;
    }

    /**
     * Gets as stockPromoCode
     *
     * @return string
     */
    public function getStockPromoCode()
    {
        return $this->stockPromoCode;
    }

    /**
     * Sets a new stockPromoCode
     *
     * @param string $stockPromoCode
     * @return self
     */
    public function setStockPromoCode($stockPromoCode)
    {
        $this->stockPromoCode = $stockPromoCode;
        return $this;
    }

    /**
     * Gets as specialOrderCode
     *
     * @return \App\Soap\dealertrack\src\SpecialOrderCode
     */
    public function getSpecialOrderCode()
    {
        return $this->specialOrderCode;
    }

    /**
     * Sets a new specialOrderCode
     *
     * @param \App\Soap\dealertrack\src\SpecialOrderCode $specialOrderCode
     * @return self
     */
    public function setSpecialOrderCode(\App\Soap\dealertrack\src\SpecialOrderCode $specialOrderCode)
    {
        $this->specialOrderCode = $specialOrderCode;
        return $this;
    }

    /**
     * Gets as priceUpdate
     *
     * @return string
     */
    public function getPriceUpdate()
    {
        return $this->priceUpdate;
    }

    /**
     * Sets a new priceUpdate
     *
     * @param string $priceUpdate
     * @return self
     */
    public function setPriceUpdate($priceUpdate)
    {
        $this->priceUpdate = $priceUpdate;
        return $this;
    }

    /**
     * Gets as kitPart
     *
     * @return \App\Soap\dealertrack\src\KitPart
     */
    public function getKitPart()
    {
        return $this->kitPart;
    }

    /**
     * Sets a new kitPart
     *
     * @param \App\Soap\dealertrack\src\KitPart $kitPart
     * @return self
     */
    public function setKitPart(\App\Soap\dealertrack\src\KitPart $kitPart)
    {
        $this->kitPart = $kitPart;
        return $this;
    }

    /**
     * Gets as componentPart
     *
     * @return \App\Soap\dealertrack\src\ComponentPart
     */
    public function getComponentPart()
    {
        return $this->componentPart;
    }

    /**
     * Sets a new componentPart
     *
     * @param \App\Soap\dealertrack\src\ComponentPart $componentPart
     * @return self
     */
    public function setComponentPart(\App\Soap\dealertrack\src\ComponentPart $componentPart)
    {
        $this->componentPart = $componentPart;
        return $this;
    }

    /**
     * Gets as associateWithPart
     *
     * @return \App\Soap\dealertrack\src\AssociateWithPart
     */
    public function getAssociateWithPart()
    {
        return $this->associateWithPart;
    }

    /**
     * Sets a new associateWithPart
     *
     * @param \App\Soap\dealertrack\src\AssociateWithPart $associateWithPart
     * @return self
     */
    public function setAssociateWithPart(\App\Soap\dealertrack\src\AssociateWithPart $associateWithPart)
    {
        $this->associateWithPart = $associateWithPart;
        return $this;
    }

    /**
     * Gets as alternatePart
     *
     * @return \App\Soap\dealertrack\src\AlternatePart
     */
    public function getAlternatePart()
    {
        return $this->alternatePart;
    }

    /**
     * Sets a new alternatePart
     *
     * @param \App\Soap\dealertrack\src\AlternatePart $alternatePart
     * @return self
     */
    public function setAlternatePart(\App\Soap\dealertrack\src\AlternatePart $alternatePart)
    {
        $this->alternatePart = $alternatePart;
        return $this;
    }

    /**
     * Gets as corePart
     *
     * @return string
     */
    public function getCorePart()
    {
        return $this->corePart;
    }

    /**
     * Sets a new corePart
     *
     * @param string $corePart
     * @return self
     */
    public function setCorePart($corePart)
    {
        $this->corePart = $corePart;
        return $this;
    }

    /**
     * Gets as merchCode
     *
     * @return \App\Soap\dealertrack\src\MerchCode
     */
    public function getMerchCode()
    {
        return $this->merchCode;
    }

    /**
     * Sets a new merchCode
     *
     * @param \App\Soap\dealertrack\src\MerchCode $merchCode
     * @return self
     */
    public function setMerchCode(\App\Soap\dealertrack\src\MerchCode $merchCode)
    {
        $this->merchCode = $merchCode;
        return $this;
    }

    /**
     * Gets as priceSymbol
     *
     * @return string
     */
    public function getPriceSymbol()
    {
        return $this->priceSymbol;
    }

    /**
     * Sets a new priceSymbol
     *
     * @param string $priceSymbol
     * @return self
     */
    public function setPriceSymbol($priceSymbol)
    {
        $this->priceSymbol = $priceSymbol;
        return $this;
    }

    /**
     * Gets as prodCodeClass
     *
     * @return string
     */
    public function getProdCodeClass()
    {
        return $this->prodCodeClass;
    }

    /**
     * Sets a new prodCodeClass
     *
     * @param string $prodCodeClass
     * @return self
     */
    public function setProdCodeClass($prodCodeClass)
    {
        $this->prodCodeClass = $prodCodeClass;
        return $this;
    }

    /**
     * Gets as fleetAllowance
     *
     * @return \App\Soap\dealertrack\src\FleetAllowance
     */
    public function getFleetAllowance()
    {
        return $this->fleetAllowance;
    }

    /**
     * Sets a new fleetAllowance
     *
     * @param \App\Soap\dealertrack\src\FleetAllowance $fleetAllowance
     * @return self
     */
    public function setFleetAllowance(\App\Soap\dealertrack\src\FleetAllowance $fleetAllowance)
    {
        $this->fleetAllowance = $fleetAllowance;
        return $this;
    }

    /**
     * Gets as groupCode
     *
     * @return string
     */
    public function getGroupCode()
    {
        return $this->groupCode;
    }

    /**
     * Sets a new groupCode
     *
     * @param string $groupCode
     * @return self
     */
    public function setGroupCode($groupCode)
    {
        $this->groupCode = $groupCode;
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
     * Gets as shelfLocation
     *
     * @return \App\Soap\dealertrack\src\ShelfLocation
     */
    public function getShelfLocation()
    {
        return $this->shelfLocation;
    }

    /**
     * Sets a new shelfLocation
     *
     * @param \App\Soap\dealertrack\src\ShelfLocation $shelfLocation
     * @return self
     */
    public function setShelfLocation(\App\Soap\dealertrack\src\ShelfLocation $shelfLocation)
    {
        $this->shelfLocation = $shelfLocation;
        return $this;
    }

    /**
     * Gets as quantityOnHand
     *
     * @return int
     */
    public function getQuantityOnHand()
    {
        return $this->quantityOnHand;
    }

    /**
     * Sets a new quantityOnHand
     *
     * @param int $quantityOnHand
     * @return self
     */
    public function setQuantityOnHand($quantityOnHand)
    {
        $this->quantityOnHand = $quantityOnHand;
        return $this;
    }

    /**
     * Gets as quantityReserved
     *
     * @return int
     */
    public function getQuantityReserved()
    {
        return $this->quantityReserved;
    }

    /**
     * Sets a new quantityReserved
     *
     * @param int $quantityReserved
     * @return self
     */
    public function setQuantityReserved($quantityReserved)
    {
        $this->quantityReserved = $quantityReserved;
        return $this;
    }

    /**
     * Gets as quantityOnOrder
     *
     * @return int
     */
    public function getQuantityOnOrder()
    {
        return $this->quantityOnOrder;
    }

    /**
     * Sets a new quantityOnOrder
     *
     * @param int $quantityOnOrder
     * @return self
     */
    public function setQuantityOnOrder($quantityOnOrder)
    {
        $this->quantityOnOrder = $quantityOnOrder;
        return $this;
    }

    /**
     * Gets as quantityOnBackOrder
     *
     * @return int
     */
    public function getQuantityOnBackOrder()
    {
        return $this->quantityOnBackOrder;
    }

    /**
     * Sets a new quantityOnBackOrder
     *
     * @param int $quantityOnBackOrder
     * @return self
     */
    public function setQuantityOnBackOrder($quantityOnBackOrder)
    {
        $this->quantityOnBackOrder = $quantityOnBackOrder;
        return $this;
    }

    /**
     * Gets as quantityOnSpecialOrder
     *
     * @return int
     */
    public function getQuantityOnSpecialOrder()
    {
        return $this->quantityOnSpecialOrder;
    }

    /**
     * Sets a new quantityOnSpecialOrder
     *
     * @param int $quantityOnSpecialOrder
     * @return self
     */
    public function setQuantityOnSpecialOrder($quantityOnSpecialOrder)
    {
        $this->quantityOnSpecialOrder = $quantityOnSpecialOrder;
        return $this;
    }

    /**
     * Gets as placeOnOrder
     *
     * @return int
     */
    public function getPlaceOnOrder()
    {
        return $this->placeOnOrder;
    }

    /**
     * Sets a new placeOnOrder
     *
     * @param int $placeOnOrder
     * @return self
     */
    public function setPlaceOnOrder($placeOnOrder)
    {
        $this->placeOnOrder = $placeOnOrder;
        return $this;
    }

    /**
     * Gets as placeOnSpecialOrder
     *
     * @return int
     */
    public function getPlaceOnSpecialOrder()
    {
        return $this->placeOnSpecialOrder;
    }

    /**
     * Sets a new placeOnSpecialOrder
     *
     * @param int $placeOnSpecialOrder
     * @return self
     */
    public function setPlaceOnSpecialOrder($placeOnSpecialOrder)
    {
        $this->placeOnSpecialOrder = $placeOnSpecialOrder;
        return $this;
    }

    /**
     * Gets as packQuantity
     *
     * @return int
     */
    public function getPackQuantity()
    {
        return $this->packQuantity;
    }

    /**
     * Sets a new packQuantity
     *
     * @param int $packQuantity
     * @return self
     */
    public function setPackQuantity($packQuantity)
    {
        $this->packQuantity = $packQuantity;
        return $this;
    }

    /**
     * Gets as minSalesQuantity
     *
     * @return int
     */
    public function getMinSalesQuantity()
    {
        return $this->minSalesQuantity;
    }

    /**
     * Sets a new minSalesQuantity
     *
     * @param int $minSalesQuantity
     * @return self
     */
    public function setMinSalesQuantity($minSalesQuantity)
    {
        $this->minSalesQuantity = $minSalesQuantity;
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
     * Gets as wholesaleComp
     *
     * @return float
     */
    public function getWholesaleComp()
    {
        return $this->wholesaleComp;
    }

    /**
     * Sets a new wholesaleComp
     *
     * @param float $wholesaleComp
     * @return self
     */
    public function setWholesaleComp($wholesaleComp)
    {
        $this->wholesaleComp = $wholesaleComp;
        return $this;
    }

    /**
     * Gets as wholesaleCompFleet
     *
     * @return float
     */
    public function getWholesaleCompFleet()
    {
        return $this->wholesaleCompFleet;
    }

    /**
     * Sets a new wholesaleCompFleet
     *
     * @param float $wholesaleCompFleet
     * @return self
     */
    public function setWholesaleCompFleet($wholesaleCompFleet)
    {
        $this->wholesaleCompFleet = $wholesaleCompFleet;
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
     * Gets as minMaxPackAdj
     *
     * @return int
     */
    public function getMinMaxPackAdj()
    {
        return $this->minMaxPackAdj;
    }

    /**
     * Sets a new minMaxPackAdj
     *
     * @param int $minMaxPackAdj
     * @return self
     */
    public function setMinMaxPackAdj($minMaxPackAdj)
    {
        $this->minMaxPackAdj = $minMaxPackAdj;
        return $this;
    }

    /**
     * Gets as dynamDaysSupply
     *
     * @return int
     */
    public function getDynamDaysSupply()
    {
        return $this->dynamDaysSupply;
    }

    /**
     * Sets a new dynamDaysSupply
     *
     * @param int $dynamDaysSupply
     * @return self
     */
    public function setDynamDaysSupply($dynamDaysSupply)
    {
        $this->dynamDaysSupply = $dynamDaysSupply;
        return $this;
    }

    /**
     * Gets as minimumOnHand
     *
     * @return int
     */
    public function getMinimumOnHand()
    {
        return $this->minimumOnHand;
    }

    /**
     * Sets a new minimumOnHand
     *
     * @param int $minimumOnHand
     * @return self
     */
    public function setMinimumOnHand($minimumOnHand)
    {
        $this->minimumOnHand = $minimumOnHand;
        return $this;
    }

    /**
     * Gets as maximumOnHand
     *
     * @return int
     */
    public function getMaximumOnHand()
    {
        return $this->maximumOnHand;
    }

    /**
     * Sets a new maximumOnHand
     *
     * @param int $maximumOnHand
     * @return self
     */
    public function setMaximumOnHand($maximumOnHand)
    {
        $this->maximumOnHand = $maximumOnHand;
        return $this;
    }

    /**
     * Gets as lowModelYear
     *
     * @return int
     */
    public function getLowModelYear()
    {
        return $this->lowModelYear;
    }

    /**
     * Sets a new lowModelYear
     *
     * @param int $lowModelYear
     * @return self
     */
    public function setLowModelYear($lowModelYear)
    {
        $this->lowModelYear = $lowModelYear;
        return $this;
    }

    /**
     * Gets as highModelYear
     *
     * @return int
     */
    public function getHighModelYear()
    {
        return $this->highModelYear;
    }

    /**
     * Sets a new highModelYear
     *
     * @param int $highModelYear
     * @return self
     */
    public function setHighModelYear($highModelYear)
    {
        $this->highModelYear = $highModelYear;
        return $this;
    }

    /**
     * Gets as dateInInventory
     *
     * @return int
     */
    public function getDateInInventory()
    {
        return $this->dateInInventory;
    }

    /**
     * Sets a new dateInInventory
     *
     * @param int $dateInInventory
     * @return self
     */
    public function setDateInInventory($dateInInventory)
    {
        $this->dateInInventory = $dateInInventory;
        return $this;
    }

    /**
     * Gets as datePhasedOut
     *
     * @return int
     */
    public function getDatePhasedOut()
    {
        return $this->datePhasedOut;
    }

    /**
     * Sets a new datePhasedOut
     *
     * @param int $datePhasedOut
     * @return self
     */
    public function setDatePhasedOut($datePhasedOut)
    {
        $this->datePhasedOut = $datePhasedOut;
        return $this;
    }

    /**
     * Gets as dateLastSold
     *
     * @return int
     */
    public function getDateLastSold()
    {
        return $this->dateLastSold;
    }

    /**
     * Sets a new dateLastSold
     *
     * @param int $dateLastSold
     * @return self
     */
    public function setDateLastSold($dateLastSold)
    {
        $this->dateLastSold = $dateLastSold;
        return $this;
    }

    /**
     * Gets as inventoryTurns
     *
     * @return float
     */
    public function getInventoryTurns()
    {
        return $this->inventoryTurns;
    }

    /**
     * Sets a new inventoryTurns
     *
     * @param float $inventoryTurns
     * @return self
     */
    public function setInventoryTurns($inventoryTurns)
    {
        $this->inventoryTurns = $inventoryTurns;
        return $this;
    }

    /**
     * Gets as bestStockLevel
     *
     * @return int
     */
    public function getBestStockLevel()
    {
        return $this->bestStockLevel;
    }

    /**
     * Sets a new bestStockLevel
     *
     * @param int $bestStockLevel
     * @return self
     */
    public function setBestStockLevel($bestStockLevel)
    {
        $this->bestStockLevel = $bestStockLevel;
        return $this;
    }

    /**
     * Gets as stockStatus
     *
     * @return int
     */
    public function getStockStatus()
    {
        return $this->stockStatus;
    }

    /**
     * Sets a new stockStatus
     *
     * @param int $stockStatus
     * @return self
     */
    public function setStockStatus($stockStatus)
    {
        $this->stockStatus = $stockStatus;
        return $this;
    }

    /**
     * Gets as recentDemand
     *
     * @return int
     */
    public function getRecentDemand()
    {
        return $this->recentDemand;
    }

    /**
     * Sets a new recentDemand
     *
     * @param int $recentDemand
     * @return self
     */
    public function setRecentDemand($recentDemand)
    {
        $this->recentDemand = $recentDemand;
        return $this;
    }

    /**
     * Gets as priorDemand
     *
     * @return int
     */
    public function getPriorDemand()
    {
        return $this->priorDemand;
    }

    /**
     * Sets a new priorDemand
     *
     * @param int $priorDemand
     * @return self
     */
    public function setPriorDemand($priorDemand)
    {
        $this->priorDemand = $priorDemand;
        return $this;
    }

    /**
     * Gets as recentWorkDays
     *
     * @return float
     */
    public function getRecentWorkDays()
    {
        return $this->recentWorkDays;
    }

    /**
     * Sets a new recentWorkDays
     *
     * @param float $recentWorkDays
     * @return self
     */
    public function setRecentWorkDays($recentWorkDays)
    {
        $this->recentWorkDays = $recentWorkDays;
        return $this;
    }

    /**
     * Gets as priorWorkDays
     *
     * @return float
     */
    public function getPriorWorkDays()
    {
        return $this->priorWorkDays;
    }

    /**
     * Sets a new priorWorkDays
     *
     * @param float $priorWorkDays
     * @return self
     */
    public function setPriorWorkDays($priorWorkDays)
    {
        $this->priorWorkDays = $priorWorkDays;
        return $this;
    }

    /**
     * Gets as weightedDailyAverage
     *
     * @return float
     */
    public function getWeightedDailyAverage()
    {
        return $this->weightedDailyAverage;
    }

    /**
     * Sets a new weightedDailyAverage
     *
     * @param float $weightedDailyAverage
     * @return self
     */
    public function setWeightedDailyAverage($weightedDailyAverage)
    {
        $this->weightedDailyAverage = $weightedDailyAverage;
        return $this;
    }

    /**
     * Gets as salesDemand
     *
     * @return int
     */
    public function getSalesDemand()
    {
        return $this->salesDemand;
    }

    /**
     * Sets a new salesDemand
     *
     * @param int $salesDemand
     * @return self
     */
    public function setSalesDemand($salesDemand)
    {
        $this->salesDemand = $salesDemand;
        return $this;
    }

    /**
     * Gets as lostSalesDemand
     *
     * @return int
     */
    public function getLostSalesDemand()
    {
        return $this->lostSalesDemand;
    }

    /**
     * Sets a new lostSalesDemand
     *
     * @param int $lostSalesDemand
     * @return self
     */
    public function setLostSalesDemand($lostSalesDemand)
    {
        $this->lostSalesDemand = $lostSalesDemand;
        return $this;
    }

    /**
     * Gets as specOrderDemand
     *
     * @return int
     */
    public function getSpecOrderDemand()
    {
        return $this->specOrderDemand;
    }

    /**
     * Sets a new specOrderDemand
     *
     * @param int $specOrderDemand
     * @return self
     */
    public function setSpecOrderDemand($specOrderDemand)
    {
        $this->specOrderDemand = $specOrderDemand;
        return $this;
    }

    /**
     * Gets as nonStockDemand
     *
     * @return int
     */
    public function getNonStockDemand()
    {
        return $this->nonStockDemand;
    }

    /**
     * Sets a new nonStockDemand
     *
     * @param int $nonStockDemand
     * @return self
     */
    public function setNonStockDemand($nonStockDemand)
    {
        $this->nonStockDemand = $nonStockDemand;
        return $this;
    }

    /**
     * Gets as returnDemand
     *
     * @return int
     */
    public function getReturnDemand()
    {
        return $this->returnDemand;
    }

    /**
     * Sets a new returnDemand
     *
     * @param int $returnDemand
     * @return self
     */
    public function setReturnDemand($returnDemand)
    {
        $this->returnDemand = $returnDemand;
        return $this;
    }

    /**
     * Gets as inventoryValue
     *
     * @return float
     */
    public function getInventoryValue()
    {
        return $this->inventoryValue;
    }

    /**
     * Sets a new inventoryValue
     *
     * @param float $inventoryValue
     * @return self
     */
    public function setInventoryValue($inventoryValue)
    {
        $this->inventoryValue = $inventoryValue;
        return $this;
    }

    /**
     * Gets as totalQuantitySold
     *
     * @return int
     */
    public function getTotalQuantitySold()
    {
        return $this->totalQuantitySold;
    }

    /**
     * Sets a new totalQuantitySold
     *
     * @param int $totalQuantitySold
     * @return self
     */
    public function setTotalQuantitySold($totalQuantitySold)
    {
        $this->totalQuantitySold = $totalQuantitySold;
        return $this;
    }

    /**
     * Gets as totalCostSales
     *
     * @return float
     */
    public function getTotalCostSales()
    {
        return $this->totalCostSales;
    }

    /**
     * Sets a new totalCostSales
     *
     * @param float $totalCostSales
     * @return self
     */
    public function setTotalCostSales($totalCostSales)
    {
        $this->totalCostSales = $totalCostSales;
        return $this;
    }

    /**
     * Gets as stockPurchases
     *
     * @return float
     */
    public function getStockPurchases()
    {
        return $this->stockPurchases;
    }

    /**
     * Sets a new stockPurchases
     *
     * @param float $stockPurchases
     * @return self
     */
    public function setStockPurchases($stockPurchases)
    {
        $this->stockPurchases = $stockPurchases;
        return $this;
    }

    /**
     * Gets as displayPartNumber
     *
     * @return string
     */
    public function getDisplayPartNumber()
    {
        return $this->displayPartNumber;
    }

    /**
     * Sets a new displayPartNumber
     *
     * @param string $displayPartNumber
     * @return self
     */
    public function setDisplayPartNumber($displayPartNumber)
    {
        $this->displayPartNumber = $displayPartNumber;
        return $this;
    }

    /**
     * Gets as sortPartNumber
     *
     * @return string
     */
    public function getSortPartNumber()
    {
        return $this->sortPartNumber;
    }

    /**
     * Sets a new sortPartNumber
     *
     * @param string $sortPartNumber
     * @return self
     */
    public function setSortPartNumber($sortPartNumber)
    {
        $this->sortPartNumber = $sortPartNumber;
        return $this;
    }

    /**
     * Gets as oldPartNumber
     *
     * @return string
     */
    public function getOldPartNumber()
    {
        return $this->oldPartNumber;
    }

    /**
     * Sets a new oldPartNumber
     *
     * @param string $oldPartNumber
     * @return self
     */
    public function setOldPartNumber($oldPartNumber)
    {
        $this->oldPartNumber = $oldPartNumber;
        return $this;
    }

    /**
     * Gets as newPartNumber
     *
     * @return string
     */
    public function getNewPartNumber()
    {
        return $this->newPartNumber;
    }

    /**
     * Sets a new newPartNumber
     *
     * @param string $newPartNumber
     * @return self
     */
    public function setNewPartNumber($newPartNumber)
    {
        $this->newPartNumber = $newPartNumber;
        return $this;
    }

    /**
     * Gets as corePartNumber
     *
     * @return \App\Soap\dealertrack\src\CorePartNumber
     */
    public function getCorePartNumber()
    {
        return $this->corePartNumber;
    }

    /**
     * Sets a new corePartNumber
     *
     * @param \App\Soap\dealertrack\src\CorePartNumber $corePartNumber
     * @return self
     */
    public function setCorePartNumber(\App\Soap\dealertrack\src\CorePartNumber $corePartNumber)
    {
        $this->corePartNumber = $corePartNumber;
        return $this;
    }

    /**
     * Gets as remarks
     *
     * @return \App\Soap\dealertrack\src\Remarks
     */
    public function getRemarks()
    {
        return $this->remarks;
    }

    /**
     * Sets a new remarks
     *
     * @param \App\Soap\dealertrack\src\Remarks $remarks
     * @return self
     */
    public function setRemarks(\App\Soap\dealertrack\src\Remarks $remarks)
    {
        $this->remarks = $remarks;
        return $this;
    }

    /**
     * Gets as displayRemarks
     *
     * @return \App\Soap\dealertrack\src\DisplayRemarks
     */
    public function getDisplayRemarks()
    {
        return $this->displayRemarks;
    }

    /**
     * Sets a new displayRemarks
     *
     * @param \App\Soap\dealertrack\src\DisplayRemarks $displayRemarks
     * @return self
     */
    public function setDisplayRemarks(\App\Soap\dealertrack\src\DisplayRemarks $displayRemarks)
    {
        $this->displayRemarks = $displayRemarks;
        return $this;
    }

    /**
     * Gets as bulkItemActualWeight
     *
     * @return int
     */
    public function getBulkItemActualWeight()
    {
        return $this->bulkItemActualWeight;
    }

    /**
     * Sets a new bulkItemActualWeight
     *
     * @param int $bulkItemActualWeight
     * @return self
     */
    public function setBulkItemActualWeight($bulkItemActualWeight)
    {
        $this->bulkItemActualWeight = $bulkItemActualWeight;
        return $this;
    }

    /**
     * Gets as secondaryBinLocation
     *
     * @return \App\Soap\dealertrack\src\SecondaryBinLocation
     */
    public function getSecondaryBinLocation()
    {
        return $this->secondaryBinLocation;
    }

    /**
     * Sets a new secondaryBinLocation
     *
     * @param \App\Soap\dealertrack\src\SecondaryBinLocation $secondaryBinLocation
     * @return self
     */
    public function setSecondaryBinLocation(\App\Soap\dealertrack\src\SecondaryBinLocation $secondaryBinLocation)
    {
        $this->secondaryBinLocation = $secondaryBinLocation;
        return $this;
    }

    /**
     * Gets as classCode
     *
     * @return \App\Soap\dealertrack\src\ClassCode
     */
    public function getClassCode()
    {
        return $this->classCode;
    }

    /**
     * Sets a new classCode
     *
     * @param \App\Soap\dealertrack\src\ClassCode $classCode
     * @return self
     */
    public function setClassCode(\App\Soap\dealertrack\src\ClassCode $classCode)
    {
        $this->classCode = $classCode;
        return $this;
    }

    /**
     * Gets as partDealerToDealerPrice
     *
     * @return float
     */
    public function getPartDealerToDealerPrice()
    {
        return $this->partDealerToDealerPrice;
    }

    /**
     * Sets a new partDealerToDealerPrice
     *
     * @param float $partDealerToDealerPrice
     * @return self
     */
    public function setPartDealerToDealerPrice($partDealerToDealerPrice)
    {
        $this->partDealerToDealerPrice = $partDealerToDealerPrice;
        return $this;
    }

    /**
     * Gets as partSubsidiaryPrice
     *
     * @return float
     */
    public function getPartSubsidiaryPrice()
    {
        return $this->partSubsidiaryPrice;
    }

    /**
     * Sets a new partSubsidiaryPrice
     *
     * @param float $partSubsidiaryPrice
     * @return self
     */
    public function setPartSubsidiaryPrice($partSubsidiaryPrice)
    {
        $this->partSubsidiaryPrice = $partSubsidiaryPrice;
        return $this;
    }

    /**
     * Gets as partDealerToDealerCode
     *
     * @return \App\Soap\dealertrack\src\PartDealerToDealerCode
     */
    public function getPartDealerToDealerCode()
    {
        return $this->partDealerToDealerCode;
    }

    /**
     * Sets a new partDealerToDealerCode
     *
     * @param \App\Soap\dealertrack\src\PartDealerToDealerCode $partDealerToDealerCode
     * @return self
     */
    public function setPartDealerToDealerCode(\App\Soap\dealertrack\src\PartDealerToDealerCode $partDealerToDealerCode)
    {
        $this->partDealerToDealerCode = $partDealerToDealerCode;
        return $this;
    }

    /**
     * Gets as emergencyRepairPackage
     *
     * @return int
     */
    public function getEmergencyRepairPackage()
    {
        return $this->emergencyRepairPackage;
    }

    /**
     * Sets a new emergencyRepairPackage
     *
     * @param int $emergencyRepairPackage
     * @return self
     */
    public function setEmergencyRepairPackage($emergencyRepairPackage)
    {
        $this->emergencyRepairPackage = $emergencyRepairPackage;
        return $this;
    }

    /**
     * Gets as partLsgCode
     *
     * @return \App\Soap\dealertrack\src\PartLsgCode
     */
    public function getPartLsgCode()
    {
        return $this->partLsgCode;
    }

    /**
     * Sets a new partLsgCode
     *
     * @param \App\Soap\dealertrack\src\PartLsgCode $partLsgCode
     * @return self
     */
    public function setPartLsgCode(\App\Soap\dealertrack\src\PartLsgCode $partLsgCode)
    {
        $this->partLsgCode = $partLsgCode;
        return $this;
    }

    /**
     * Gets as brandCode
     *
     * @return string
     */
    public function getBrandCode()
    {
        return $this->brandCode;
    }

    /**
     * Sets a new brandCode
     *
     * @param string $brandCode
     * @return self
     */
    public function setBrandCode($brandCode)
    {
        $this->brandCode = $brandCode;
        return $this;
    }

    /**
     * Gets as partcommondcode
     *
     * @return \App\Soap\dealertrack\src\Partcommondcode
     */
    public function getPartcommondcode()
    {
        return $this->partcommondcode;
    }

    /**
     * Sets a new partcommondcode
     *
     * @param \App\Soap\dealertrack\src\Partcommondcode $partcommondcode
     * @return self
     */
    public function setPartcommondcode(\App\Soap\dealertrack\src\Partcommondcode $partcommondcode)
    {
        $this->partcommondcode = $partcommondcode;
        return $this;
    }

    /**
     * Gets as partCrossShipCode
     *
     * @return \App\Soap\dealertrack\src\PartCrossShipCode
     */
    public function getPartCrossShipCode()
    {
        return $this->partCrossShipCode;
    }

    /**
     * Sets a new partCrossShipCode
     *
     * @param \App\Soap\dealertrack\src\PartCrossShipCode $partCrossShipCode
     * @return self
     */
    public function setPartCrossShipCode(\App\Soap\dealertrack\src\PartCrossShipCode $partCrossShipCode)
    {
        $this->partCrossShipCode = $partCrossShipCode;
        return $this;
    }

    /**
     * Gets as partDiscountCode
     *
     * @return \App\Soap\dealertrack\src\PartDiscountCode
     */
    public function getPartDiscountCode()
    {
        return $this->partDiscountCode;
    }

    /**
     * Sets a new partDiscountCode
     *
     * @param \App\Soap\dealertrack\src\PartDiscountCode $partDiscountCode
     * @return self
     */
    public function setPartDiscountCode(\App\Soap\dealertrack\src\PartDiscountCode $partDiscountCode)
    {
        $this->partDiscountCode = $partDiscountCode;
        return $this;
    }

    /**
     * Gets as partDirectshipCode
     *
     * @return \App\Soap\dealertrack\src\PartDirectshipCode
     */
    public function getPartDirectshipCode()
    {
        return $this->partDirectshipCode;
    }

    /**
     * Sets a new partDirectshipCode
     *
     * @param \App\Soap\dealertrack\src\PartDirectshipCode $partDirectshipCode
     * @return self
     */
    public function setPartDirectshipCode(\App\Soap\dealertrack\src\PartDirectshipCode $partDirectshipCode)
    {
        $this->partDirectshipCode = $partDirectshipCode;
        return $this;
    }

    /**
     * Gets as partHazardCode
     *
     * @return \App\Soap\dealertrack\src\PartHazardCode
     */
    public function getPartHazardCode()
    {
        return $this->partHazardCode;
    }

    /**
     * Sets a new partHazardCode
     *
     * @param \App\Soap\dealertrack\src\PartHazardCode $partHazardCode
     * @return self
     */
    public function setPartHazardCode(\App\Soap\dealertrack\src\PartHazardCode $partHazardCode)
    {
        $this->partHazardCode = $partHazardCode;
        return $this;
    }

    /**
     * Gets as partInterchangeSubstitute
     *
     * @return \App\Soap\dealertrack\src\PartInterchangeSubstitute
     */
    public function getPartInterchangeSubstitute()
    {
        return $this->partInterchangeSubstitute;
    }

    /**
     * Sets a new partInterchangeSubstitute
     *
     * @param \App\Soap\dealertrack\src\PartInterchangeSubstitute $partInterchangeSubstitute
     * @return self
     */
    public function setPartInterchangeSubstitute(\App\Soap\dealertrack\src\PartInterchangeSubstitute $partInterchangeSubstitute)
    {
        $this->partInterchangeSubstitute = $partInterchangeSubstitute;
        return $this;
    }

    /**
     * Gets as partLargeQuantityCode
     *
     * @return \App\Soap\dealertrack\src\PartLargeQuantityCode
     */
    public function getPartLargeQuantityCode()
    {
        return $this->partLargeQuantityCode;
    }

    /**
     * Sets a new partLargeQuantityCode
     *
     * @param \App\Soap\dealertrack\src\PartLargeQuantityCode $partLargeQuantityCode
     * @return self
     */
    public function setPartLargeQuantityCode(\App\Soap\dealertrack\src\PartLargeQuantityCode $partLargeQuantityCode)
    {
        $this->partLargeQuantityCode = $partLargeQuantityCode;
        return $this;
    }

    /**
     * Gets as partMaximumOrderQuantity
     *
     * @return int
     */
    public function getPartMaximumOrderQuantity()
    {
        return $this->partMaximumOrderQuantity;
    }

    /**
     * Sets a new partMaximumOrderQuantity
     *
     * @param int $partMaximumOrderQuantity
     * @return self
     */
    public function setPartMaximumOrderQuantity($partMaximumOrderQuantity)
    {
        $this->partMaximumOrderQuantity = $partMaximumOrderQuantity;
        return $this;
    }

    /**
     * Gets as partMinimumOrderQuantity
     *
     * @return int
     */
    public function getPartMinimumOrderQuantity()
    {
        return $this->partMinimumOrderQuantity;
    }

    /**
     * Sets a new partMinimumOrderQuantity
     *
     * @param int $partMinimumOrderQuantity
     * @return self
     */
    public function setPartMinimumOrderQuantity($partMinimumOrderQuantity)
    {
        $this->partMinimumOrderQuantity = $partMinimumOrderQuantity;
        return $this;
    }

    /**
     * Gets as partObsoleteStatus
     *
     * @return \App\Soap\dealertrack\src\PartObsoleteStatus
     */
    public function getPartObsoleteStatus()
    {
        return $this->partObsoleteStatus;
    }

    /**
     * Sets a new partObsoleteStatus
     *
     * @param \App\Soap\dealertrack\src\PartObsoleteStatus $partObsoleteStatus
     * @return self
     */
    public function setPartObsoleteStatus(\App\Soap\dealertrack\src\PartObsoleteStatus $partObsoleteStatus)
    {
        $this->partObsoleteStatus = $partObsoleteStatus;
        return $this;
    }

    /**
     * Gets as programPartAllowanceCode
     *
     * @return \App\Soap\dealertrack\src\ProgramPartAllowanceCode
     */
    public function getProgramPartAllowanceCode()
    {
        return $this->programPartAllowanceCode;
    }

    /**
     * Sets a new programPartAllowanceCode
     *
     * @param \App\Soap\dealertrack\src\ProgramPartAllowanceCode $programPartAllowanceCode
     * @return self
     */
    public function setProgramPartAllowanceCode(\App\Soap\dealertrack\src\ProgramPartAllowanceCode $programPartAllowanceCode)
    {
        $this->programPartAllowanceCode = $programPartAllowanceCode;
        return $this;
    }

    /**
     * Gets as partPricingDiscountPer
     *
     * @return float
     */
    public function getPartPricingDiscountPer()
    {
        return $this->partPricingDiscountPer;
    }

    /**
     * Sets a new partPricingDiscountPer
     *
     * @param float $partPricingDiscountPer
     * @return self
     */
    public function setPartPricingDiscountPer($partPricingDiscountPer)
    {
        $this->partPricingDiscountPer = $partPricingDiscountPer;
        return $this;
    }

    /**
     * Gets as programPartReturnableCode
     *
     * @return \App\Soap\dealertrack\src\ProgramPartReturnableCode
     */
    public function getProgramPartReturnableCode()
    {
        return $this->programPartReturnableCode;
    }

    /**
     * Sets a new programPartReturnableCode
     *
     * @param \App\Soap\dealertrack\src\ProgramPartReturnableCode $programPartReturnableCode
     * @return self
     */
    public function setProgramPartReturnableCode(\App\Soap\dealertrack\src\ProgramPartReturnableCode $programPartReturnableCode)
    {
        $this->programPartReturnableCode = $programPartReturnableCode;
        return $this;
    }

    /**
     * Gets as partSizeCode
     *
     * @return \App\Soap\dealertrack\src\PartSizeCode
     */
    public function getPartSizeCode()
    {
        return $this->partSizeCode;
    }

    /**
     * Sets a new partSizeCode
     *
     * @param \App\Soap\dealertrack\src\PartSizeCode $partSizeCode
     * @return self
     */
    public function setPartSizeCode(\App\Soap\dealertrack\src\PartSizeCode $partSizeCode)
    {
        $this->partSizeCode = $partSizeCode;
        return $this;
    }

    /**
     * Gets as partType
     *
     * @return \App\Soap\dealertrack\src\PartType
     */
    public function getPartType()
    {
        return $this->partType;
    }

    /**
     * Sets a new partType
     *
     * @param \App\Soap\dealertrack\src\PartType $partType
     * @return self
     */
    public function setPartType(\App\Soap\dealertrack\src\PartType $partType)
    {
        $this->partType = $partType;
        return $this;
    }

    /**
     * Gets as partVolumeDiscountFlag
     *
     * @return \App\Soap\dealertrack\src\PartVolumeDiscountFlag
     */
    public function getPartVolumeDiscountFlag()
    {
        return $this->partVolumeDiscountFlag;
    }

    /**
     * Sets a new partVolumeDiscountFlag
     *
     * @param \App\Soap\dealertrack\src\PartVolumeDiscountFlag $partVolumeDiscountFlag
     * @return self
     */
    public function setPartVolumeDiscountFlag(\App\Soap\dealertrack\src\PartVolumeDiscountFlag $partVolumeDiscountFlag)
    {
        $this->partVolumeDiscountFlag = $partVolumeDiscountFlag;
        return $this;
    }

    /**
     * Gets as secondaryShelf
     *
     * @return \App\Soap\dealertrack\src\SecondaryShelf
     */
    public function getSecondaryShelf()
    {
        return $this->secondaryShelf;
    }

    /**
     * Sets a new secondaryShelf
     *
     * @param \App\Soap\dealertrack\src\SecondaryShelf $secondaryShelf
     * @return self
     */
    public function setSecondaryShelf(\App\Soap\dealertrack\src\SecondaryShelf $secondaryShelf)
    {
        $this->secondaryShelf = $secondaryShelf;
        return $this;
    }

    /**
     * Gets as weightCode
     *
     * @return \App\Soap\dealertrack\src\WeightCode
     */
    public function getWeightCode()
    {
        return $this->weightCode;
    }

    /**
     * Sets a new weightCode
     *
     * @param \App\Soap\dealertrack\src\WeightCode $weightCode
     * @return self
     */
    public function setWeightCode(\App\Soap\dealertrack\src\WeightCode $weightCode)
    {
        $this->weightCode = $weightCode;
        return $this;
    }

    /**
     * Gets as unitOfMeasure
     *
     * @return float
     */
    public function getUnitOfMeasure()
    {
        return $this->unitOfMeasure;
    }

    /**
     * Sets a new unitOfMeasure
     *
     * @param float $unitOfMeasure
     * @return self
     */
    public function setUnitOfMeasure($unitOfMeasure)
    {
        $this->unitOfMeasure = $unitOfMeasure;
        return $this;
    }

    /**
     * Gets as stockCode
     *
     * @return string
     */
    public function getStockCode()
    {
        return $this->stockCode;
    }

    /**
     * Sets a new stockCode
     *
     * @param string $stockCode
     * @return self
     */
    public function setStockCode($stockCode)
    {
        $this->stockCode = $stockCode;
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
     * Gets as lastUpdated
     *
     * @return string
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * Sets a new lastUpdated
     *
     * @param string $lastUpdated
     * @return self
     */
    public function setLastUpdated($lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;
        return $this;
    }


}


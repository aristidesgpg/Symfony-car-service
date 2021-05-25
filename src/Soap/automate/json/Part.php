<?php

namespace App\Soap\automate\json;

use JMS\Serializer\Annotation\Type;

class Part
{
    /**
     * @var string
     * @Type("string")
     */
    private $partNumber;

    /**
     * @var ?string
     * @Type("string")
     */
    private $dmsPartNumber;

    /**
     * @var ?string
     * @Type("string")
     */
    private $stockingStatus;

    /**
     * @var float
     * @Type("float")
     */
    private $bestStockingLevel;

    /**
     * @var float
     * @Type("float")
     */
    private $minStockingLevel;

    /**
     * @var float
     * @Type("float")
     */
    private $maxStockingLevel;

    /**
     * @var float
     * @Type("float")
     */
    private $packageQuantity;

    /**
     * @var float
     * @Type("float")
     */
    private $quantityOnHand;

    /**
     * @var float
     * @Type("float")
     */
    private $quantityOnOrder;

    /**
     * @var float
     * @Type("float")
     */
    private $reorderPoint;

    /**
     * @var float
     * @Type("float")
     */
    private $corePrice;

    /**
     * @var float
     * @Type("float")
     */
    private $dealerCost;

    /**
     * @var float
     * @Type("float")
     */
    private $listPrice;

    /**
     * @var []
     * @Type("array")
     */
    private $binLocations; //maybe array;

    /**
     * @var ?string
     * @Type("string")
     */
    private $description;

    /**
     * @var string
     * @Type("string")
     */
    private $oemCode;

    /**
     * @var float
     * @Type("float")
     */
    private $reservedQuantity;

    /**
     * @var bool
     * @Type("bool")
     */
    private $soldAsPackage;

    /**
     * @var float
     * @Type("float")
     */
    private $unitCost;

    /**
     * @var string
     * @Type("string")
     */
    private $sourceCode;

    /**
     * @var string
     * @Type("string")
     */
    private $created;

    /**
     * @var string
     * @Type("string")
     */
    private $group;

    /**
     * @var string
     * @Type("string")
     */
    private $lastSold;

    /**
     * @var string
     * @Type("string")
     */
    private $lastReceived;

    /**
     * @var float
     * @Type("float")
     */
    private $msrp;

    /**
     * @var []
     * @Type("array")
     */
    private $supersessions; 

    /**
     * @var []
     * @Type("array")
     */
    private $dmsSupersessions; 

    /**
     * @var []
     * @Type("array")
     */
    private $supersedes; 

    /**
     * @var []
     * @Type("array")
     */
    private $dmsSupersedes; 

    public function getPartNumber(): string
    {
        return $this->partNumber;
    }

    public function setPartNumber(string $partNumber): Part
    {
        $this->partNumber = $partNumber;

        return $this;
    }

    public function getDmsPartNumber(): ?string
    {
        return $this->dmsPartNumber;
    }

    public function setDmsPartNumber(?string $dmsPartNumber): Part
    {
        $this->dmsPartNumber = $dmsPartNumber;

        return $this;
    }

    public function getStockingStatus(): ?string
    {
        return $this->stockingStatus;
    }

    public function setStockingStatus(?string $stockingStatus): Part
    {
        $this->stockingStatus = $stockingStatus;

        return $this;
    }

    public function getBestStockingLevel(): float
    {
        return $this->bestStockingLevel;
    }

    public function setBestStockingLevel(float $bestStockingLevel): Part
    {
        $this->bestStockingLevel = $bestStockingLevel;

        return $this;
    }

    public function getMinStockingLevel(): float
    {
        return $this->minStockingLevel;
    }

    public function setMinStockingLevel(float $minStockingLevel): Part
    {
        $this->minStockingLevel = $minStockingLevel;

        return $this;
    }

    public function getMaxStockingLevel(): float
    {
        return $this->maxStockingLevel;
    }

    public function setMaxStockingLevel(float $maxStockingLevel): Part
    {
        $this->maxStockingLevel = $maxStockingLevel;

        return $this;
    }

    public function getPackageQuantity(): float
    {
        return $this->packageQuantity;
    }

    public function setPackageQuantity(float $packageQuantity): Part
    {
        $this->packageQuantity = $packageQuantity;

        return $this;
    }

    public function getQuantityOnHand(): float
    {
        return $this->quantityOnHand;
    }

    public function setQuantityOnHand(float $quantityOnHand): Part
    {
        $this->quantityOnHand = $quantityOnHand;

        return $this;
    }

    public function getQuantityOnOrder(): float
    {
        return $this->quantityOnOrder;
    }

    public function setQuantityOnOrder(float $quantityOnOrder): Part
    {
        $this->quantityOnOrder = $quantityOnOrder;

        return $this;
    }

    public function getReorderPoint(): float
    {
        return $this->reorderPoint;
    }

    public function setReorderPoint(float $reorderPoint): Part
    {
        $this->reorderPoint = $reorderPoint;

        return $this;
    }

    public function getCorePrice(): float
    {
        return $this->corePrice;
    }

    public function setCorePrice(float $corePrice): Part
    {
        $this->corePrice = $corePrice;

        return $this;
    }

    public function getDealerCost(): float
    {
        return $this->dealerCost;
    }

    public function setDealerCost(float $dealerCost): Part
    {
        $this->dealerCost = $dealerCost;

        return $this;
    }

    public function getListPrice(): float
    {
        return $this->listPrice;
    }

    public function setListPrice(float $listPrice): Part
    {
        $this->listPrice = $listPrice;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBinLocations()
    {
        return $this->binLocations;
    }

    /**
     * @param mixed $binLocations
     *
     * @return Part
     */
    public function setBinLocations($binLocations)
    {
        $this->binLocations = $binLocations;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): Part
    {
        $this->description = $description;

        return $this;
    }

    public function getOemCode(): string
    {
        return $this->oemCode;
    }

    public function setOemCode(string $oemCode): Part
    {
        $this->oemCode = $oemCode;

        return $this;
    }

    public function getReservedQuantity(): float
    {
        return $this->reservedQuantity;
    }

    public function setReservedQuantity(float $reservedQuantity): Part
    {
        $this->reservedQuantity = $reservedQuantity;

        return $this;
    }

    public function isSoldAsPackage(): bool
    {
        return $this->soldAsPackage;
    }

    public function setSoldAsPackage(bool $soldAsPackage): Part
    {
        $this->soldAsPackage = $soldAsPackage;

        return $this;
    }

    public function getUnitCost(): float
    {
        return $this->unitCost;
    }

    public function setUnitCost(float $unitCost): Part
    {
        $this->unitCost = $unitCost;

        return $this;
    }

    public function getSourceCode(): string
    {
        return $this->sourceCode;
    }

    public function setSourceCode(string $sourceCode): Part
    {
        $this->sourceCode = $sourceCode;

        return $this;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function setCreated(string $created): Part
    {
        $this->created = $created;

        return $this;
    }

    public function getGroup(): string
    {
        return $this->group;
    }

    public function setGroup(string $group): Part
    {
        $this->group = $group;

        return $this;
    }

    public function getLastSold(): string
    {
        return $this->lastSold;
    }

    public function setLastSold(string $lastSold): Part
    {
        $this->lastSold = $lastSold;

        return $this;
    }

    public function getLastReceived(): string
    {
        return $this->lastReceived;
    }

    public function setLastReceived(string $lastReceived): Part
    {
        $this->lastReceived = $lastReceived;

        return $this;
    }

    public function getMsrp(): float
    {
        return $this->msrp;
    }

    public function setMsrp(float $msrp): Part
    {
        $this->msrp = $msrp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSupersessions()
    {
        return $this->supersessions;
    }

    /**
     * @param mixed $supersessions
     * @return Part
     */
    public function setSupersessions($supersessions)
    {
        $this->supersessions = $supersessions;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDmsSupersessions()
    {
        return $this->dmsSupersessions;
    }

    /**
     * @param mixed $dmsSupersessions
     * @return Part
     */
    public function setDmsSupersessions($dmsSupersessions)
    {
        $this->dmsSupersessions = $dmsSupersessions;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSupersedes()
    {
        return $this->supersedes;
    }

    /**
     * @param mixed $supersedes
     * @return Part
     */
    public function setSupersedes($supersedes)
    {
        $this->supersedes = $supersedes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDmsSupersedes()
    {
        return $this->dmsSupersedes;
    }

    /**
     * @param mixed $dmsSupersedes
     * @return Part
     */
    public function setDmsSupersedes($dmsSupersedes)
    {
        $this->dmsSupersedes = $dmsSupersedes;
        return $this;
    }


}

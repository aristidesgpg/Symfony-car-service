<?php

namespace App\Soap\cdk\src\Parts;

/**
 * Class representing PartsInventoryAType
 */
class PartsInventoryAType
{

    /**
     * @var int $onOrderQty
     */
    private $onOrderQty = null;

    /**
     * @var string $lastSaleDate
     */
    private $lastSaleDate = null;

    /**
     * @var int $hostItemID
     */
    private $hostItemID = null;

    /**
     * @var int $partNumber
     */
    private $partNumber = null;

    /**
     * @var int $class
     */
    private $class = null;

    /**
     * @var string $description
     */
    private $description = null;

    /**
     * @var string $bOPCK
     */
    private $bOPCK = null;

    /**
     * @var int $source
     */
    private $source = null;

    /**
     * @var int $pack
     */
    private $pack = null;

    /**
     * @var int $multiple
     */
    private $multiple = null;

    /**
     * @var string $priceUnit
     */
    private $priceUnit = null;

    /**
     * @var string $packMultipleFlag
     */
    private $packMultipleFlag = null;

    /**
     * @var float $cost
     */
    private $cost = null;

    /**
     * @var float $list
     */
    private $list = null;

    /**
     * @var float $trade
     */
    private $trade = null;

    /**
     * @var string $comp
     */
    private $comp = null;

    /**
     * @var mixed $exchange
     */
    private $exchange = null;

    /**
     * @var string $aBCD
     */
    private $aBCD = null;

    /**
     * @var mixed $price6
     */
    private $price6 = null;

    /**
     * @var mixed $price7
     */
    private $price7 = null;

    /**
     * @var string $pNC
     */
    private $pNC = null;

    /**
     * @var string $rBCode
     */
    private $rBCode = null;

    /**
     * @var mixed $extraDS
     */
    private $extraDS = null;

    /**
     * @var string $updateCode
     */
    private $updateCode = null;

    /**
     * @var mixed $commentFlag
     */
    private $commentFlag = null;

    /**
     * @var mixed $oldOnHand
     */
    private $oldOnHand = null;

    /**
     * @var string $newOrderQty
     */
    private $newOrderQty = null;

    /**
     * @var string $bin1
     */
    private $bin1 = null;

    /**
     * @var string $bin2
     */
    private $bin2 = null;

    /**
     * @var string $bin3
     */
    private $bin3 = null;

    /**
     * @var int $onHand
     */
    private $onHand = null;

    /**
     * @var string $memoPartFlag
     */
    private $memoPartFlag = null;

    /**
     * @var mixed $deletePartFlag
     */
    private $deletePartFlag = null;

    /**
     * @var string $bRP
     */
    private $bRP = null;

    /**
     * @var string $bSL
     */
    private $bSL = null;

    /**
     * @var mixed $fullBin
     */
    private $fullBin = null;

    /**
     * @var string $specialStatus
     */
    private $specialStatus = null;

    /**
     * @var string $dateAdded
     */
    private $dateAdded = null;

    /**
     * @var string $lastCountDate
     */
    private $lastCountDate = null;

    /**
     * @var mixed $price8
     */
    private $price8 = null;

    /**
     * @var string $price9
     */
    private $price9 = null;

    /**
     * @var string $price10
     */
    private $price10 = null;

    /**
     * @var string $monthsNoReceipt
     */
    private $monthsNoReceipt = null;

    /**
     * @var int $monthsNoSale
     */
    private $monthsNoSale = null;

    /**
     * @var string $lastTransDate
     */
    private $lastTransDate = null;

    /**
     * @var mixed $baseCostLIFO
     */
    private $baseCostLIFO = null;

    /**
     * @var mixed $begQtyLIFO
     */
    private $begQtyLIFO = null;

    /**
     * @var mixed $mTDEmerPurchase
     */
    private $mTDEmerPurchase = null;

    /**
     * @var mixed $mTDPlusAdj
     */
    private $mTDPlusAdj = null;

    /**
     * @var mixed $mTDMinusAdj
     */
    private $mTDMinusAdj = null;

    /**
     * @var string $mTDLostSales
     */
    private $mTDLostSales = null;

    /**
     * @var mixed $comment
     */
    private $comment = null;

    /**
     * @var string $misc
     */
    private $misc = null;

    /**
     * @var string $manufacturer
     */
    private $manufacturer = null;

    /**
     * @var string $accountingAccount
     */
    private $accountingAccount = null;

    /**
     * @var mixed $aBCXYZ
     */
    private $aBCXYZ = null;

    /**
     * @var string $priorYearSales1
     */
    private $priorYearSales1 = null;

    /**
     * @var string $priorYearSales2
     */
    private $priorYearSales2 = null;

    /**
     * @var string $priorYearSales3
     */
    private $priorYearSales3 = null;

    /**
     * @var mixed $dateLastReceipted
     */
    private $dateLastReceipted = null;

    /**
     * @var int $errorLevel
     */
    private $errorLevel = null;

    /**
     * @var mixed $errorMessage
     */
    private $errorMessage = null;

    /**
     * Gets as onOrderQty
     *
     * @return int
     */
    public function getOnOrderQty()
    {
        return $this->onOrderQty;
    }

    /**
     * Sets a new onOrderQty
     *
     * @param int $onOrderQty
     * @return self
     */
    public function setOnOrderQty($onOrderQty)
    {
        $this->onOrderQty = $onOrderQty;
        return $this;
    }

    /**
     * Gets as lastSaleDate
     *
     * @return string
     */
    public function getLastSaleDate()
    {
        return $this->lastSaleDate;
    }

    /**
     * Sets a new lastSaleDate
     *
     * @param string $lastSaleDate
     * @return self
     */
    public function setLastSaleDate($lastSaleDate)
    {
        $this->lastSaleDate = $lastSaleDate;
        return $this;
    }

    /**
     * Gets as hostItemID
     *
     * @return int
     */
    public function getHostItemID()
    {
        return $this->hostItemID;
    }

    /**
     * Sets a new hostItemID
     *
     * @param int $hostItemID
     * @return self
     */
    public function setHostItemID($hostItemID)
    {
        $this->hostItemID = $hostItemID;
        return $this;
    }

    /**
     * Gets as partNumber
     *
     * @return int
     */
    public function getPartNumber()
    {
        return $this->partNumber;
    }

    /**
     * Sets a new partNumber
     *
     * @param int $partNumber
     * @return self
     */
    public function setPartNumber($partNumber)
    {
        $this->partNumber = $partNumber;
        return $this;
    }

    /**
     * Gets as class
     *
     * @return int
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Sets a new class
     *
     * @param int $class
     * @return self
     */
    public function setClass($class)
    {
        $this->class = $class;
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
     * Gets as bOPCK
     *
     * @return string
     */
    public function getBOPCK()
    {
        return $this->bOPCK;
    }

    /**
     * Sets a new bOPCK
     *
     * @param string $bOPCK
     * @return self
     */
    public function setBOPCK($bOPCK)
    {
        $this->bOPCK = $bOPCK;
        return $this;
    }

    /**
     * Gets as source
     *
     * @return int
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Sets a new source
     *
     * @param int $source
     * @return self
     */
    public function setSource($source)
    {
        $this->source = $source;
        return $this;
    }

    /**
     * Gets as pack
     *
     * @return int
     */
    public function getPack()
    {
        return $this->pack;
    }

    /**
     * Sets a new pack
     *
     * @param int $pack
     * @return self
     */
    public function setPack($pack)
    {
        $this->pack = $pack;
        return $this;
    }

    /**
     * Gets as multiple
     *
     * @return int
     */
    public function getMultiple()
    {
        return $this->multiple;
    }

    /**
     * Sets a new multiple
     *
     * @param int $multiple
     * @return self
     */
    public function setMultiple($multiple)
    {
        $this->multiple = $multiple;
        return $this;
    }

    /**
     * Gets as priceUnit
     *
     * @return string
     */
    public function getPriceUnit()
    {
        return $this->priceUnit;
    }

    /**
     * Sets a new priceUnit
     *
     * @param string $priceUnit
     * @return self
     */
    public function setPriceUnit($priceUnit)
    {
        $this->priceUnit = $priceUnit;
        return $this;
    }

    /**
     * Gets as packMultipleFlag
     *
     * @return string
     */
    public function getPackMultipleFlag()
    {
        return $this->packMultipleFlag;
    }

    /**
     * Sets a new packMultipleFlag
     *
     * @param string $packMultipleFlag
     * @return self
     */
    public function setPackMultipleFlag($packMultipleFlag)
    {
        $this->packMultipleFlag = $packMultipleFlag;
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
     * Gets as list
     *
     * @return float
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * Sets a new list
     *
     * @param float $list
     * @return self
     */
    public function setList($list)
    {
        $this->list = $list;
        return $this;
    }

    /**
     * Gets as trade
     *
     * @return float
     */
    public function getTrade()
    {
        return $this->trade;
    }

    /**
     * Sets a new trade
     *
     * @param float $trade
     * @return self
     */
    public function setTrade($trade)
    {
        $this->trade = $trade;
        return $this;
    }

    /**
     * Gets as comp
     *
     * @return string
     */
    public function getComp()
    {
        return $this->comp;
    }

    /**
     * Sets a new comp
     *
     * @param string $comp
     * @return self
     */
    public function setComp($comp)
    {
        $this->comp = $comp;
        return $this;
    }

    /**
     * Gets as exchange
     *
     * @return mixed
     */
    public function getExchange()
    {
        return $this->exchange;
    }

    /**
     * Sets a new exchange
     *
     * @param mixed $exchange
     * @return self
     */
    public function setExchange($exchange)
    {
        $this->exchange = $exchange;
        return $this;
    }

    /**
     * Gets as aBCD
     *
     * @return string
     */
    public function getABCD()
    {
        return $this->aBCD;
    }

    /**
     * Sets a new aBCD
     *
     * @param string $aBCD
     * @return self
     */
    public function setABCD($aBCD)
    {
        $this->aBCD = $aBCD;
        return $this;
    }

    /**
     * Gets as price6
     *
     * @return mixed
     */
    public function getPrice6()
    {
        return $this->price6;
    }

    /**
     * Sets a new price6
     *
     * @param mixed $price6
     * @return self
     */
    public function setPrice6($price6)
    {
        $this->price6 = $price6;
        return $this;
    }

    /**
     * Gets as price7
     *
     * @return mixed
     */
    public function getPrice7()
    {
        return $this->price7;
    }

    /**
     * Sets a new price7
     *
     * @param mixed $price7
     * @return self
     */
    public function setPrice7($price7)
    {
        $this->price7 = $price7;
        return $this;
    }

    /**
     * Gets as pNC
     *
     * @return string
     */
    public function getPNC()
    {
        return $this->pNC;
    }

    /**
     * Sets a new pNC
     *
     * @param string $pNC
     * @return self
     */
    public function setPNC($pNC)
    {
        $this->pNC = $pNC;
        return $this;
    }

    /**
     * Gets as rBCode
     *
     * @return string
     */
    public function getRBCode()
    {
        return $this->rBCode;
    }

    /**
     * Sets a new rBCode
     *
     * @param string $rBCode
     * @return self
     */
    public function setRBCode($rBCode)
    {
        $this->rBCode = $rBCode;
        return $this;
    }

    /**
     * Gets as extraDS
     *
     * @return mixed
     */
    public function getExtraDS()
    {
        return $this->extraDS;
    }

    /**
     * Sets a new extraDS
     *
     * @param mixed $extraDS
     * @return self
     */
    public function setExtraDS($extraDS)
    {
        $this->extraDS = $extraDS;
        return $this;
    }

    /**
     * Gets as updateCode
     *
     * @return string
     */
    public function getUpdateCode()
    {
        return $this->updateCode;
    }

    /**
     * Sets a new updateCode
     *
     * @param string $updateCode
     * @return self
     */
    public function setUpdateCode($updateCode)
    {
        $this->updateCode = $updateCode;
        return $this;
    }

    /**
     * Gets as commentFlag
     *
     * @return mixed
     */
    public function getCommentFlag()
    {
        return $this->commentFlag;
    }

    /**
     * Sets a new commentFlag
     *
     * @param mixed $commentFlag
     * @return self
     */
    public function setCommentFlag($commentFlag)
    {
        $this->commentFlag = $commentFlag;
        return $this;
    }

    /**
     * Gets as oldOnHand
     *
     * @return mixed
     */
    public function getOldOnHand()
    {
        return $this->oldOnHand;
    }

    /**
     * Sets a new oldOnHand
     *
     * @param mixed $oldOnHand
     * @return self
     */
    public function setOldOnHand($oldOnHand)
    {
        $this->oldOnHand = $oldOnHand;
        return $this;
    }

    /**
     * Gets as newOrderQty
     *
     * @return string
     */
    public function getNewOrderQty()
    {
        return $this->newOrderQty;
    }

    /**
     * Sets a new newOrderQty
     *
     * @param string $newOrderQty
     * @return self
     */
    public function setNewOrderQty($newOrderQty)
    {
        $this->newOrderQty = $newOrderQty;
        return $this;
    }

    /**
     * Gets as bin1
     *
     * @return string
     */
    public function getBin1()
    {
        return $this->bin1;
    }

    /**
     * Sets a new bin1
     *
     * @param string $bin1
     * @return self
     */
    public function setBin1($bin1)
    {
        $this->bin1 = $bin1;
        return $this;
    }

    /**
     * Gets as bin2
     *
     * @return string
     */
    public function getBin2()
    {
        return $this->bin2;
    }

    /**
     * Sets a new bin2
     *
     * @param string $bin2
     * @return self
     */
    public function setBin2($bin2)
    {
        $this->bin2 = $bin2;
        return $this;
    }

    /**
     * Gets as bin3
     *
     * @return string
     */
    public function getBin3()
    {
        return $this->bin3;
    }

    /**
     * Sets a new bin3
     *
     * @param string $bin3
     * @return self
     */
    public function setBin3($bin3)
    {
        $this->bin3 = $bin3;
        return $this;
    }

    /**
     * Gets as onHand
     *
     * @return int
     */
    public function getOnHand()
    {
        return $this->onHand;
    }

    /**
     * Sets a new onHand
     *
     * @param int $onHand
     * @return self
     */
    public function setOnHand($onHand)
    {
        $this->onHand = $onHand;
        return $this;
    }

    /**
     * Gets as memoPartFlag
     *
     * @return string
     */
    public function getMemoPartFlag()
    {
        return $this->memoPartFlag;
    }

    /**
     * Sets a new memoPartFlag
     *
     * @param string $memoPartFlag
     * @return self
     */
    public function setMemoPartFlag($memoPartFlag)
    {
        $this->memoPartFlag = $memoPartFlag;
        return $this;
    }

    /**
     * Gets as deletePartFlag
     *
     * @return mixed
     */
    public function getDeletePartFlag()
    {
        return $this->deletePartFlag;
    }

    /**
     * Sets a new deletePartFlag
     *
     * @param mixed $deletePartFlag
     * @return self
     */
    public function setDeletePartFlag($deletePartFlag)
    {
        $this->deletePartFlag = $deletePartFlag;
        return $this;
    }

    /**
     * Gets as bRP
     *
     * @return string
     */
    public function getBRP()
    {
        return $this->bRP;
    }

    /**
     * Sets a new bRP
     *
     * @param string $bRP
     * @return self
     */
    public function setBRP($bRP)
    {
        $this->bRP = $bRP;
        return $this;
    }

    /**
     * Gets as bSL
     *
     * @return string
     */
    public function getBSL()
    {
        return $this->bSL;
    }

    /**
     * Sets a new bSL
     *
     * @param string $bSL
     * @return self
     */
    public function setBSL($bSL)
    {
        $this->bSL = $bSL;
        return $this;
    }

    /**
     * Gets as fullBin
     *
     * @return mixed
     */
    public function getFullBin()
    {
        return $this->fullBin;
    }

    /**
     * Sets a new fullBin
     *
     * @param mixed $fullBin
     * @return self
     */
    public function setFullBin($fullBin)
    {
        $this->fullBin = $fullBin;
        return $this;
    }

    /**
     * Gets as specialStatus
     *
     * @return string
     */
    public function getSpecialStatus()
    {
        return $this->specialStatus;
    }

    /**
     * Sets a new specialStatus
     *
     * @param string $specialStatus
     * @return self
     */
    public function setSpecialStatus($specialStatus)
    {
        $this->specialStatus = $specialStatus;
        return $this;
    }

    /**
     * Gets as dateAdded
     *
     * @return string
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * Sets a new dateAdded
     *
     * @param string $dateAdded
     * @return self
     */
    public function setDateAdded(string $dateAdded)
    {
        $this->dateAdded = $dateAdded;
        return $this;
    }

    /**
     * Gets as lastCountDate
     *
     * @return string
     */
    public function getLastCountDate()
    {
        return $this->lastCountDate;
    }

    /**
     * Sets a new lastCountDate
     *
     * @param string $lastCountDate
     * @return self
     */
    public function setLastCountDate($lastCountDate)
    {
        $this->lastCountDate = $lastCountDate;
        return $this;
    }

    /**
     * Gets as price8
     *
     * @return mixed
     */
    public function getPrice8()
    {
        return $this->price8;
    }

    /**
     * Sets a new price8
     *
     * @param mixed $price8
     * @return self
     */
    public function setPrice8($price8)
    {
        $this->price8 = $price8;
        return $this;
    }

    /**
     * Gets as price9
     *
     * @return string
     */
    public function getPrice9()
    {
        return $this->price9;
    }

    /**
     * Sets a new price9
     *
     * @param string $price9
     * @return self
     */
    public function setPrice9($price9)
    {
        $this->price9 = $price9;
        return $this;
    }

    /**
     * Gets as price10
     *
     * @return string
     */
    public function getPrice10()
    {
        return $this->price10;
    }

    /**
     * Sets a new price10
     *
     * @param string $price10
     * @return self
     */
    public function setPrice10($price10)
    {
        $this->price10 = $price10;
        return $this;
    }

    /**
     * Gets as monthsNoReceipt
     *
     * @return string
     */
    public function getMonthsNoReceipt()
    {
        return $this->monthsNoReceipt;
    }

    /**
     * Sets a new monthsNoReceipt
     *
     * @param string $monthsNoReceipt
     * @return self
     */
    public function setMonthsNoReceipt($monthsNoReceipt)
    {
        $this->monthsNoReceipt = $monthsNoReceipt;
        return $this;
    }

    /**
     * Gets as monthsNoSale
     *
     * @return int
     */
    public function getMonthsNoSale()
    {
        return $this->monthsNoSale;
    }

    /**
     * Sets a new monthsNoSale
     *
     * @param int $monthsNoSale
     * @return self
     */
    public function setMonthsNoSale($monthsNoSale)
    {
        $this->monthsNoSale = $monthsNoSale;
        return $this;
    }

    /**
     * Gets as lastTransDate
     *
     * @return string
     */
    public function getLastTransDate()
    {
        return $this->lastTransDate;
    }

    /**
     * Sets a new lastTransDate
     *
     * @param string $lastTransDate
     * @return self
     */
    public function setLastTransDate($lastTransDate)
    {
        $this->lastTransDate = $lastTransDate;
        return $this;
    }

    /**
     * Gets as baseCostLIFO
     *
     * @return mixed
     */
    public function getBaseCostLIFO()
    {
        return $this->baseCostLIFO;
    }

    /**
     * Sets a new baseCostLIFO
     *
     * @param mixed $baseCostLIFO
     * @return self
     */
    public function setBaseCostLIFO($baseCostLIFO)
    {
        $this->baseCostLIFO = $baseCostLIFO;
        return $this;
    }

    /**
     * Gets as begQtyLIFO
     *
     * @return mixed
     */
    public function getBegQtyLIFO()
    {
        return $this->begQtyLIFO;
    }

    /**
     * Sets a new begQtyLIFO
     *
     * @param mixed $begQtyLIFO
     * @return self
     */
    public function setBegQtyLIFO($begQtyLIFO)
    {
        $this->begQtyLIFO = $begQtyLIFO;
        return $this;
    }

    /**
     * Gets as mTDEmerPurchase
     *
     * @return mixed
     */
    public function getMTDEmerPurchase()
    {
        return $this->mTDEmerPurchase;
    }

    /**
     * Sets a new mTDEmerPurchase
     *
     * @param mixed $mTDEmerPurchase
     * @return self
     */
    public function setMTDEmerPurchase($mTDEmerPurchase)
    {
        $this->mTDEmerPurchase = $mTDEmerPurchase;
        return $this;
    }

    /**
     * Gets as mTDPlusAdj
     *
     * @return mixed
     */
    public function getMTDPlusAdj()
    {
        return $this->mTDPlusAdj;
    }

    /**
     * Sets a new mTDPlusAdj
     *
     * @param mixed $mTDPlusAdj
     * @return self
     */
    public function setMTDPlusAdj($mTDPlusAdj)
    {
        $this->mTDPlusAdj = $mTDPlusAdj;
        return $this;
    }

    /**
     * Gets as mTDMinusAdj
     *
     * @return mixed
     */
    public function getMTDMinusAdj()
    {
        return $this->mTDMinusAdj;
    }

    /**
     * Sets a new mTDMinusAdj
     *
     * @param mixed $mTDMinusAdj
     * @return self
     */
    public function setMTDMinusAdj($mTDMinusAdj)
    {
        $this->mTDMinusAdj = $mTDMinusAdj;
        return $this;
    }

    /**
     * Gets as mTDLostSales
     *
     * @return string
     */
    public function getMTDLostSales()
    {
        return $this->mTDLostSales;
    }

    /**
     * Sets a new mTDLostSales
     *
     * @param string $mTDLostSales
     * @return self
     */
    public function setMTDLostSales($mTDLostSales)
    {
        $this->mTDLostSales = $mTDLostSales;
        return $this;
    }

    /**
     * Gets as comment
     *
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Sets a new comment
     *
     * @param mixed $comment
     * @return self
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * Gets as misc
     *
     * @return string
     */
    public function getMisc()
    {
        return $this->misc;
    }

    /**
     * Sets a new misc
     *
     * @param string $misc
     * @return self
     */
    public function setMisc($misc)
    {
        $this->misc = $misc;
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
     * Gets as accountingAccount
     *
     * @return string
     */
    public function getAccountingAccount()
    {
        return $this->accountingAccount;
    }

    /**
     * Sets a new accountingAccount
     *
     * @param string $accountingAccount
     * @return self
     */
    public function setAccountingAccount($accountingAccount)
    {
        $this->accountingAccount = $accountingAccount;
        return $this;
    }

    /**
     * Gets as aBCXYZ
     *
     * @return mixed
     */
    public function getABCXYZ()
    {
        return $this->aBCXYZ;
    }

    /**
     * Sets a new aBCXYZ
     *
     * @param mixed $aBCXYZ
     * @return self
     */
    public function setABCXYZ($aBCXYZ)
    {
        $this->aBCXYZ = $aBCXYZ;
        return $this;
    }

    /**
     * Gets as priorYearSales1
     *
     * @return string
     */
    public function getPriorYearSales1()
    {
        return $this->priorYearSales1;
    }

    /**
     * Sets a new priorYearSales1
     *
     * @param string $priorYearSales1
     * @return self
     */
    public function setPriorYearSales1($priorYearSales1)
    {
        $this->priorYearSales1 = $priorYearSales1;
        return $this;
    }

    /**
     * Gets as priorYearSales2
     *
     * @return string
     */
    public function getPriorYearSales2()
    {
        return $this->priorYearSales2;
    }

    /**
     * Sets a new priorYearSales2
     *
     * @param string $priorYearSales2
     * @return self
     */
    public function setPriorYearSales2($priorYearSales2)
    {
        $this->priorYearSales2 = $priorYearSales2;
        return $this;
    }

    /**
     * Gets as priorYearSales3
     *
     * @return string
     */
    public function getPriorYearSales3()
    {
        return $this->priorYearSales3;
    }

    /**
     * Sets a new priorYearSales3
     *
     * @param string $priorYearSales3
     * @return self
     */
    public function setPriorYearSales3($priorYearSales3)
    {
        $this->priorYearSales3 = $priorYearSales3;
        return $this;
    }

    /**
     * Gets as dateLastReceipted
     *
     * @return mixed
     */
    public function getDateLastReceipted()
    {
        return $this->dateLastReceipted;
    }

    /**
     * Sets a new dateLastReceipted
     *
     * @param mixed $dateLastReceipted
     * @return self
     */
    public function setDateLastReceipted($dateLastReceipted)
    {
        $this->dateLastReceipted = $dateLastReceipted;
        return $this;
    }

    /**
     * Gets as errorLevel
     *
     * @return int
     */
    public function getErrorLevel()
    {
        return $this->errorLevel;
    }

    /**
     * Sets a new errorLevel
     *
     * @param int $errorLevel
     * @return self
     */
    public function setErrorLevel($errorLevel)
    {
        $this->errorLevel = $errorLevel;
        return $this;
    }

    /**
     * Gets as errorMessage
     *
     * @return mixed
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * Sets a new errorMessage
     *
     * @param mixed $errorMessage
     * @return self
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }


}


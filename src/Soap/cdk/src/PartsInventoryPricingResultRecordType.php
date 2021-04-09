<?php

namespace App\Soap\cdk\src;

/**
 * Class representing PartsInventoryPricingResultRecordType
 *
 * 
 * XSD Type: partsInventoryPricingResultRecord
 */
class PartsInventoryPricingResultRecordType
{

    /**
     * @var string $partNumber
     */
    private $partNumber = null;

    /**
     * @var string $description
     */
    private $description = null;

    /**
     * @var string $manufacturer1
     */
    private $manufacturer1 = null;

    /**
     * @var string $source
     */
    private $source = null;

    /**
     * @var string $cost
     */
    private $cost = null;

    /**
     * @var string $list
     */
    private $list = null;

    /**
     * @var string $trade
     */
    private $trade = null;

    /**
     * @var string $comp
     */
    private $comp = null;

    /**
     * @var string $exchange
     */
    private $exchange = null;

    /**
     * @var string $unitPrice6
     */
    private $unitPrice6 = null;

    /**
     * @var string $unitPrice7
     */
    private $unitPrice7 = null;

    /**
     * @var string $unitPrice8
     */
    private $unitPrice8 = null;

    /**
     * @var string $unitPrice9
     */
    private $unitPrice9 = null;

    /**
     * @var string $unitPrice10
     */
    private $unitPrice10 = null;

    /**
     * @var string $supersedePartNumber
     */
    private $supersedePartNumber = null;

    /**
     * @var string $supersedeCode
     */
    private $supersedeCode = null;

    /**
     * @var string $bin1
     */
    private $bin1 = null;

    /**
     * @var string $onHandQty
     */
    private $onHandQty = null;

    /**
     * @var string $specialStatus
     */
    private $specialStatus = null;

    /**
     * @var string $onOrderQty
     */
    private $onOrderQty = null;

    /**
     * @var string $unitWeight
     */
    private $unitWeight = null;

    /**
     * @var string $olmNewPartNumber
     */
    private $olmNewPartNumber = null;

    /**
     * @var string $presoldQty
     */
    private $presoldQty = null;

    /**
     * @var string $requestedQty
     */
    private $requestedQty = null;

    /**
     * @var string $originalPartNumberFlag
     */
    private $originalPartNumberFlag = null;

    /**
     * @var string $salePrice
     */
    private $salePrice = null;

    /**
     * @var string $memoFlag
     */
    private $memoFlag = null;

    /**
     * @var string $errorLevel
     */
    private $errorLevel = null;

    /**
     * @var string $errorMessage
     */
    private $errorMessage = null;

    /**
     * @var string $olmMfr
     */
    private $olmMfr = null;

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
     * Gets as manufacturer1
     *
     * @return string
     */
    public function getManufacturer1()
    {
        return $this->manufacturer1;
    }

    /**
     * Sets a new manufacturer1
     *
     * @param string $manufacturer1
     * @return self
     */
    public function setManufacturer1($manufacturer1)
    {
        $this->manufacturer1 = $manufacturer1;
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
     * Gets as cost
     *
     * @return string
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Sets a new cost
     *
     * @param string $cost
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
     * @return string
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * Sets a new list
     *
     * @param string $list
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
     * @return string
     */
    public function getTrade()
    {
        return $this->trade;
    }

    /**
     * Sets a new trade
     *
     * @param string $trade
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
     * @return string
     */
    public function getExchange()
    {
        return $this->exchange;
    }

    /**
     * Sets a new exchange
     *
     * @param string $exchange
     * @return self
     */
    public function setExchange($exchange)
    {
        $this->exchange = $exchange;
        return $this;
    }

    /**
     * Gets as unitPrice6
     *
     * @return string
     */
    public function getUnitPrice6()
    {
        return $this->unitPrice6;
    }

    /**
     * Sets a new unitPrice6
     *
     * @param string $unitPrice6
     * @return self
     */
    public function setUnitPrice6($unitPrice6)
    {
        $this->unitPrice6 = $unitPrice6;
        return $this;
    }

    /**
     * Gets as unitPrice7
     *
     * @return string
     */
    public function getUnitPrice7()
    {
        return $this->unitPrice7;
    }

    /**
     * Sets a new unitPrice7
     *
     * @param string $unitPrice7
     * @return self
     */
    public function setUnitPrice7($unitPrice7)
    {
        $this->unitPrice7 = $unitPrice7;
        return $this;
    }

    /**
     * Gets as unitPrice8
     *
     * @return string
     */
    public function getUnitPrice8()
    {
        return $this->unitPrice8;
    }

    /**
     * Sets a new unitPrice8
     *
     * @param string $unitPrice8
     * @return self
     */
    public function setUnitPrice8($unitPrice8)
    {
        $this->unitPrice8 = $unitPrice8;
        return $this;
    }

    /**
     * Gets as unitPrice9
     *
     * @return string
     */
    public function getUnitPrice9()
    {
        return $this->unitPrice9;
    }

    /**
     * Sets a new unitPrice9
     *
     * @param string $unitPrice9
     * @return self
     */
    public function setUnitPrice9($unitPrice9)
    {
        $this->unitPrice9 = $unitPrice9;
        return $this;
    }

    /**
     * Gets as unitPrice10
     *
     * @return string
     */
    public function getUnitPrice10()
    {
        return $this->unitPrice10;
    }

    /**
     * Sets a new unitPrice10
     *
     * @param string $unitPrice10
     * @return self
     */
    public function setUnitPrice10($unitPrice10)
    {
        $this->unitPrice10 = $unitPrice10;
        return $this;
    }

    /**
     * Gets as supersedePartNumber
     *
     * @return string
     */
    public function getSupersedePartNumber()
    {
        return $this->supersedePartNumber;
    }

    /**
     * Sets a new supersedePartNumber
     *
     * @param string $supersedePartNumber
     * @return self
     */
    public function setSupersedePartNumber($supersedePartNumber)
    {
        $this->supersedePartNumber = $supersedePartNumber;
        return $this;
    }

    /**
     * Gets as supersedeCode
     *
     * @return string
     */
    public function getSupersedeCode()
    {
        return $this->supersedeCode;
    }

    /**
     * Sets a new supersedeCode
     *
     * @param string $supersedeCode
     * @return self
     */
    public function setSupersedeCode($supersedeCode)
    {
        $this->supersedeCode = $supersedeCode;
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
     * Gets as onHandQty
     *
     * @return string
     */
    public function getOnHandQty()
    {
        return $this->onHandQty;
    }

    /**
     * Sets a new onHandQty
     *
     * @param string $onHandQty
     * @return self
     */
    public function setOnHandQty($onHandQty)
    {
        $this->onHandQty = $onHandQty;
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
     * Gets as onOrderQty
     *
     * @return string
     */
    public function getOnOrderQty()
    {
        return $this->onOrderQty;
    }

    /**
     * Sets a new onOrderQty
     *
     * @param string $onOrderQty
     * @return self
     */
    public function setOnOrderQty($onOrderQty)
    {
        $this->onOrderQty = $onOrderQty;
        return $this;
    }

    /**
     * Gets as unitWeight
     *
     * @return string
     */
    public function getUnitWeight()
    {
        return $this->unitWeight;
    }

    /**
     * Sets a new unitWeight
     *
     * @param string $unitWeight
     * @return self
     */
    public function setUnitWeight($unitWeight)
    {
        $this->unitWeight = $unitWeight;
        return $this;
    }

    /**
     * Gets as olmNewPartNumber
     *
     * @return string
     */
    public function getOlmNewPartNumber()
    {
        return $this->olmNewPartNumber;
    }

    /**
     * Sets a new olmNewPartNumber
     *
     * @param string $olmNewPartNumber
     * @return self
     */
    public function setOlmNewPartNumber($olmNewPartNumber)
    {
        $this->olmNewPartNumber = $olmNewPartNumber;
        return $this;
    }

    /**
     * Gets as presoldQty
     *
     * @return string
     */
    public function getPresoldQty()
    {
        return $this->presoldQty;
    }

    /**
     * Sets a new presoldQty
     *
     * @param string $presoldQty
     * @return self
     */
    public function setPresoldQty($presoldQty)
    {
        $this->presoldQty = $presoldQty;
        return $this;
    }

    /**
     * Gets as requestedQty
     *
     * @return string
     */
    public function getRequestedQty()
    {
        return $this->requestedQty;
    }

    /**
     * Sets a new requestedQty
     *
     * @param string $requestedQty
     * @return self
     */
    public function setRequestedQty($requestedQty)
    {
        $this->requestedQty = $requestedQty;
        return $this;
    }

    /**
     * Gets as originalPartNumberFlag
     *
     * @return string
     */
    public function getOriginalPartNumberFlag()
    {
        return $this->originalPartNumberFlag;
    }

    /**
     * Sets a new originalPartNumberFlag
     *
     * @param string $originalPartNumberFlag
     * @return self
     */
    public function setOriginalPartNumberFlag($originalPartNumberFlag)
    {
        $this->originalPartNumberFlag = $originalPartNumberFlag;
        return $this;
    }

    /**
     * Gets as salePrice
     *
     * @return string
     */
    public function getSalePrice()
    {
        return $this->salePrice;
    }

    /**
     * Sets a new salePrice
     *
     * @param string $salePrice
     * @return self
     */
    public function setSalePrice($salePrice)
    {
        $this->salePrice = $salePrice;
        return $this;
    }

    /**
     * Gets as memoFlag
     *
     * @return string
     */
    public function getMemoFlag()
    {
        return $this->memoFlag;
    }

    /**
     * Sets a new memoFlag
     *
     * @param string $memoFlag
     * @return self
     */
    public function setMemoFlag($memoFlag)
    {
        $this->memoFlag = $memoFlag;
        return $this;
    }

    /**
     * Gets as errorLevel
     *
     * @return string
     */
    public function getErrorLevel()
    {
        return $this->errorLevel;
    }

    /**
     * Sets a new errorLevel
     *
     * @param string $errorLevel
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
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * Sets a new errorMessage
     *
     * @param string $errorMessage
     * @return self
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }

    /**
     * Gets as olmMfr
     *
     * @return string
     */
    public function getOlmMfr()
    {
        return $this->olmMfr;
    }

    /**
     * Sets a new olmMfr
     *
     * @param string $olmMfr
     * @return self
     */
    public function setOlmMfr($olmMfr)
    {
        $this->olmMfr = $olmMfr;
        return $this;
    }


}


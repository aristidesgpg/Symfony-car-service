<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing PushedLaborItemAttributesType
 *
 * 
 * XSD Type: PushedLaborItemAttributes
 */
class PushedLaborItemAttributesType
{

    /**
     * @var float $adminHours
     */
    private $adminHours = null;

    /**
     * @var string $cause
     */
    private $cause = null;

    /**
     * @var string $code
     */
    private $code = null;

    /**
     * @var string $correction
     */
    private $correction = null;

    /**
     * @var string $description
     */
    private $description = null;

    /**
     * @var float $diagnosisHours
     */
    private $diagnosisHours = null;

    /**
     * @var string $externalLaborItemId
     */
    private $externalLaborItemId = null;

    /**
     * @var string $failCode
     */
    private $failCode = null;

    /**
     * @var float $hours
     */
    private $hours = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $laborAmount
     */
    private $laborAmount = null;

    /**
     * @var string $laborPriceCode
     */
    private $laborPriceCode = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $laborRate
     */
    private $laborRate = null;

    /**
     * @var string $laborType
     */
    private $laborType = null;

    /**
     * @var int $lineNumber
     */
    private $lineNumber = null;

    /**
     * @var string $modifiedBy
     */
    private $modifiedBy = null;

    /**
     * @var float $otherLaborHours
     */
    private $otherLaborHours = null;

    /**
     * @var float $paintMixHours
     */
    private $paintMixHours = null;

    /**
     * @var string $quickCode
     */
    private $quickCode = null;

    /**
     * @var string $remark
     */
    private $remark = null;

    /**
     * @var float $setupHours
     */
    private $setupHours = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PushedLaborOperationSubletAttributesType[] $sublets
     */
    private $sublets = null;

    /**
     * Gets as adminHours
     *
     * @return float
     */
    public function getAdminHours()
    {
        return $this->adminHours;
    }

    /**
     * Sets a new adminHours
     *
     * @param float $adminHours
     * @return self
     */
    public function setAdminHours($adminHours)
    {
        $this->adminHours = $adminHours;
        return $this;
    }

    /**
     * Gets as cause
     *
     * @return string
     */
    public function getCause()
    {
        return $this->cause;
    }

    /**
     * Sets a new cause
     *
     * @param string $cause
     * @return self
     */
    public function setCause($cause)
    {
        $this->cause = $cause;
        return $this;
    }

    /**
     * Gets as code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Sets a new code
     *
     * @param string $code
     * @return self
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Gets as correction
     *
     * @return string
     */
    public function getCorrection()
    {
        return $this->correction;
    }

    /**
     * Sets a new correction
     *
     * @param string $correction
     * @return self
     */
    public function setCorrection($correction)
    {
        $this->correction = $correction;
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
     * Gets as diagnosisHours
     *
     * @return float
     */
    public function getDiagnosisHours()
    {
        return $this->diagnosisHours;
    }

    /**
     * Sets a new diagnosisHours
     *
     * @param float $diagnosisHours
     * @return self
     */
    public function setDiagnosisHours($diagnosisHours)
    {
        $this->diagnosisHours = $diagnosisHours;
        return $this;
    }

    /**
     * Gets as externalLaborItemId
     *
     * @return string
     */
    public function getExternalLaborItemId()
    {
        return $this->externalLaborItemId;
    }

    /**
     * Sets a new externalLaborItemId
     *
     * @param string $externalLaborItemId
     * @return self
     */
    public function setExternalLaborItemId($externalLaborItemId)
    {
        $this->externalLaborItemId = $externalLaborItemId;
        return $this;
    }

    /**
     * Gets as failCode
     *
     * @return string
     */
    public function getFailCode()
    {
        return $this->failCode;
    }

    /**
     * Sets a new failCode
     *
     * @param string $failCode
     * @return self
     */
    public function setFailCode($failCode)
    {
        $this->failCode = $failCode;
        return $this;
    }

    /**
     * Gets as hours
     *
     * @return float
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * Sets a new hours
     *
     * @param float $hours
     * @return self
     */
    public function setHours($hours)
    {
        $this->hours = $hours;
        return $this;
    }

    /**
     * Gets as laborAmount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getLaborAmount()
    {
        return $this->laborAmount;
    }

    /**
     * Sets a new laborAmount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $laborAmount
     * @return self
     */
    public function setLaborAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $laborAmount)
    {
        $this->laborAmount = $laborAmount;
        return $this;
    }

    /**
     * Gets as laborPriceCode
     *
     * @return string
     */
    public function getLaborPriceCode()
    {
        return $this->laborPriceCode;
    }

    /**
     * Sets a new laborPriceCode
     *
     * @param string $laborPriceCode
     * @return self
     */
    public function setLaborPriceCode($laborPriceCode)
    {
        $this->laborPriceCode = $laborPriceCode;
        return $this;
    }

    /**
     * Gets as laborRate
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getLaborRate()
    {
        return $this->laborRate;
    }

    /**
     * Sets a new laborRate
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $laborRate
     * @return self
     */
    public function setLaborRate(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $laborRate)
    {
        $this->laborRate = $laborRate;
        return $this;
    }

    /**
     * Gets as laborType
     *
     * @return string
     */
    public function getLaborType()
    {
        return $this->laborType;
    }

    /**
     * Sets a new laborType
     *
     * @param string $laborType
     * @return self
     */
    public function setLaborType($laborType)
    {
        $this->laborType = $laborType;
        return $this;
    }

    /**
     * Gets as lineNumber
     *
     * @return int
     */
    public function getLineNumber()
    {
        return $this->lineNumber;
    }

    /**
     * Sets a new lineNumber
     *
     * @param int $lineNumber
     * @return self
     */
    public function setLineNumber($lineNumber)
    {
        $this->lineNumber = $lineNumber;
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
     * Gets as otherLaborHours
     *
     * @return float
     */
    public function getOtherLaborHours()
    {
        return $this->otherLaborHours;
    }

    /**
     * Sets a new otherLaborHours
     *
     * @param float $otherLaborHours
     * @return self
     */
    public function setOtherLaborHours($otherLaborHours)
    {
        $this->otherLaborHours = $otherLaborHours;
        return $this;
    }

    /**
     * Gets as paintMixHours
     *
     * @return float
     */
    public function getPaintMixHours()
    {
        return $this->paintMixHours;
    }

    /**
     * Sets a new paintMixHours
     *
     * @param float $paintMixHours
     * @return self
     */
    public function setPaintMixHours($paintMixHours)
    {
        $this->paintMixHours = $paintMixHours;
        return $this;
    }

    /**
     * Gets as quickCode
     *
     * @return string
     */
    public function getQuickCode()
    {
        return $this->quickCode;
    }

    /**
     * Sets a new quickCode
     *
     * @param string $quickCode
     * @return self
     */
    public function setQuickCode($quickCode)
    {
        $this->quickCode = $quickCode;
        return $this;
    }

    /**
     * Gets as remark
     *
     * @return string
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * Sets a new remark
     *
     * @param string $remark
     * @return self
     */
    public function setRemark($remark)
    {
        $this->remark = $remark;
        return $this;
    }

    /**
     * Gets as setupHours
     *
     * @return float
     */
    public function getSetupHours()
    {
        return $this->setupHours;
    }

    /**
     * Sets a new setupHours
     *
     * @param float $setupHours
     * @return self
     */
    public function setSetupHours($setupHours)
    {
        $this->setupHours = $setupHours;
        return $this;
    }

    /**
     * Adds as pushedLaborOperationSubletAttributes
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedLaborOperationSubletAttributesType $pushedLaborOperationSubletAttributes
     */
    public function addToSublets(\App\Soap\dealerbuilt\src\Models\Service\PushedLaborOperationSubletAttributesType $pushedLaborOperationSubletAttributes)
    {
        $this->sublets[] = $pushedLaborOperationSubletAttributes;
        return $this;
    }

    /**
     * isset sublets
     *
     * @param int|string $index
     * @return bool
     */
    public function issetSublets($index)
    {
        return isset($this->sublets[$index]);
    }

    /**
     * unset sublets
     *
     * @param int|string $index
     * @return void
     */
    public function unsetSublets($index)
    {
        unset($this->sublets[$index]);
    }

    /**
     * Gets as sublets
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PushedLaborOperationSubletAttributesType[]
     */
    public function getSublets()
    {
        return $this->sublets;
    }

    /**
     * Sets a new sublets
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedLaborOperationSubletAttributesType[] $sublets
     * @return self
     */
    public function setSublets(array $sublets)
    {
        $this->sublets = $sublets;
        return $this;
    }


}


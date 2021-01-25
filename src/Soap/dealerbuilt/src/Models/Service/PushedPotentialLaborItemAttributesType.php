<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing PushedPotentialLaborItemAttributesType.
 *
 * XSD Type: PushedPotentialLaborItemAttributes
 */
class PushedPotentialLaborItemAttributesType
{
    /**
     * @var string
     */
    private $cause = null;

    /**
     * @var string
     */
    private $code = null;

    /**
     * @var string
     */
    private $correction = null;

    /**
     * @var string
     */
    private $description = null;

    /**
     * @var string
     */
    private $externalLaborItemId = null;

    /**
     * @var string
     */
    private $failCode = null;

    /**
     * @var float
     */
    private $hours = null;

    /**
     * @var bool
     */
    private $isApproved = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $laborAmount = null;

    /**
     * @var string
     */
    private $laborPriceCode = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $laborRate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $laborTax = null;

    /**
     * @var string
     */
    private $laborType = null;

    /**
     * @var int
     */
    private $lineNumber = null;

    /**
     * @var float
     */
    private $otherLaborHours = null;

    /**
     * @var string
     */
    private $remark = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialLaborOperationSubletAttributesType[]
     */
    private $sublets = null;

    /**
     * Gets as cause.
     *
     * @return string
     */
    public function getCause()
    {
        return $this->cause;
    }

    /**
     * Sets a new cause.
     *
     * @param string $cause
     *
     * @return self
     */
    public function setCause($cause)
    {
        $this->cause = $cause;

        return $this;
    }

    /**
     * Gets as code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Sets a new code.
     *
     * @param string $code
     *
     * @return self
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Gets as correction.
     *
     * @return string
     */
    public function getCorrection()
    {
        return $this->correction;
    }

    /**
     * Sets a new correction.
     *
     * @param string $correction
     *
     * @return self
     */
    public function setCorrection($correction)
    {
        $this->correction = $correction;

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
     * Gets as externalLaborItemId.
     *
     * @return string
     */
    public function getExternalLaborItemId()
    {
        return $this->externalLaborItemId;
    }

    /**
     * Sets a new externalLaborItemId.
     *
     * @param string $externalLaborItemId
     *
     * @return self
     */
    public function setExternalLaborItemId($externalLaborItemId)
    {
        $this->externalLaborItemId = $externalLaborItemId;

        return $this;
    }

    /**
     * Gets as failCode.
     *
     * @return string
     */
    public function getFailCode()
    {
        return $this->failCode;
    }

    /**
     * Sets a new failCode.
     *
     * @param string $failCode
     *
     * @return self
     */
    public function setFailCode($failCode)
    {
        $this->failCode = $failCode;

        return $this;
    }

    /**
     * Gets as hours.
     *
     * @return float
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * Sets a new hours.
     *
     * @param float $hours
     *
     * @return self
     */
    public function setHours($hours)
    {
        $this->hours = $hours;

        return $this;
    }

    /**
     * Gets as isApproved.
     *
     * @return bool
     */
    public function getIsApproved()
    {
        return $this->isApproved;
    }

    /**
     * Sets a new isApproved.
     *
     * @param bool $isApproved
     *
     * @return self
     */
    public function setIsApproved($isApproved)
    {
        $this->isApproved = $isApproved;

        return $this;
    }

    /**
     * Gets as laborAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getLaborAmount()
    {
        return $this->laborAmount;
    }

    /**
     * Sets a new laborAmount.
     *
     * @return self
     */
    public function setLaborAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $laborAmount)
    {
        $this->laborAmount = $laborAmount;

        return $this;
    }

    /**
     * Gets as laborPriceCode.
     *
     * @return string
     */
    public function getLaborPriceCode()
    {
        return $this->laborPriceCode;
    }

    /**
     * Sets a new laborPriceCode.
     *
     * @param string $laborPriceCode
     *
     * @return self
     */
    public function setLaborPriceCode($laborPriceCode)
    {
        $this->laborPriceCode = $laborPriceCode;

        return $this;
    }

    /**
     * Gets as laborRate.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getLaborRate()
    {
        return $this->laborRate;
    }

    /**
     * Sets a new laborRate.
     *
     * @return self
     */
    public function setLaborRate(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $laborRate)
    {
        $this->laborRate = $laborRate;

        return $this;
    }

    /**
     * Gets as laborTax.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getLaborTax()
    {
        return $this->laborTax;
    }

    /**
     * Sets a new laborTax.
     *
     * @return self
     */
    public function setLaborTax(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $laborTax)
    {
        $this->laborTax = $laborTax;

        return $this;
    }

    /**
     * Gets as laborType.
     *
     * @return string
     */
    public function getLaborType()
    {
        return $this->laborType;
    }

    /**
     * Sets a new laborType.
     *
     * @param string $laborType
     *
     * @return self
     */
    public function setLaborType($laborType)
    {
        $this->laborType = $laborType;

        return $this;
    }

    /**
     * Gets as lineNumber.
     *
     * @return int
     */
    public function getLineNumber()
    {
        return $this->lineNumber;
    }

    /**
     * Sets a new lineNumber.
     *
     * @param int $lineNumber
     *
     * @return self
     */
    public function setLineNumber($lineNumber)
    {
        $this->lineNumber = $lineNumber;

        return $this;
    }

    /**
     * Gets as otherLaborHours.
     *
     * @return float
     */
    public function getOtherLaborHours()
    {
        return $this->otherLaborHours;
    }

    /**
     * Sets a new otherLaborHours.
     *
     * @param float $otherLaborHours
     *
     * @return self
     */
    public function setOtherLaborHours($otherLaborHours)
    {
        $this->otherLaborHours = $otherLaborHours;

        return $this;
    }

    /**
     * Gets as remark.
     *
     * @return string
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * Sets a new remark.
     *
     * @param string $remark
     *
     * @return self
     */
    public function setRemark($remark)
    {
        $this->remark = $remark;

        return $this;
    }

    /**
     * Adds as pushedPotentialLaborOperationSubletAttributes.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialLaborOperationSubletAttributesType $pushedPotentialLaborOperationSubletAttributes
     */
    public function addToSublets(PushedPotentialLaborOperationSubletAttributesType $pushedPotentialLaborOperationSubletAttributes)
    {
        $this->sublets[] = $pushedPotentialLaborOperationSubletAttributes;

        return $this;
    }

    /**
     * isset sublets.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetSublets($index)
    {
        return isset($this->sublets[$index]);
    }

    /**
     * unset sublets.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetSublets($index)
    {
        unset($this->sublets[$index]);
    }

    /**
     * Gets as sublets.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialLaborOperationSubletAttributesType[]
     */
    public function getSublets()
    {
        return $this->sublets;
    }

    /**
     * Sets a new sublets.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialLaborOperationSubletAttributesType[] $sublets
     *
     * @return self
     */
    public function setSublets(array $sublets)
    {
        $this->sublets = $sublets;

        return $this;
    }
}

<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing LaborItemType.
 *
 * XSD Type: LaborItem
 */
class LaborItemType
{
    /**
     * @var float
     */
    private $additionalHours = null;

    /**
     * @var float
     */
    private $adminHours = null;

    /**
     * @var float
     */
    private $allowanceHours = null;

    /**
     * @var float
     */
    private $diagnosisHours = null;

    /**
     * @var float
     */
    private $hours = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $laborAmount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $laborRate = null;

    /**
     * @var string
     */
    private $laborType = null;

    /**
     * @var int
     */
    private $lineNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\LaborOperationType
     */
    private $operation = null;

    /**
     * @var float
     */
    private $otherLaborHours = null;

    /**
     * @var float
     */
    private $paintMixHours = null;

    /**
     * @var string
     */
    private $remark = null;

    /**
     * @var float
     */
    private $setupHours = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\LaborOperationSubletType[]
     */
    private $sublets = null;

    /**
     * Gets as additionalHours.
     *
     * @return float
     */
    public function getAdditionalHours()
    {
        return $this->additionalHours;
    }

    /**
     * Sets a new additionalHours.
     *
     * @param float $additionalHours
     *
     * @return self
     */
    public function setAdditionalHours($additionalHours)
    {
        $this->additionalHours = $additionalHours;

        return $this;
    }

    /**
     * Gets as adminHours.
     *
     * @return float
     */
    public function getAdminHours()
    {
        return $this->adminHours;
    }

    /**
     * Sets a new adminHours.
     *
     * @param float $adminHours
     *
     * @return self
     */
    public function setAdminHours($adminHours)
    {
        $this->adminHours = $adminHours;

        return $this;
    }

    /**
     * Gets as allowanceHours.
     *
     * @return float
     */
    public function getAllowanceHours()
    {
        return $this->allowanceHours;
    }

    /**
     * Sets a new allowanceHours.
     *
     * @param float $allowanceHours
     *
     * @return self
     */
    public function setAllowanceHours($allowanceHours)
    {
        $this->allowanceHours = $allowanceHours;

        return $this;
    }

    /**
     * Gets as diagnosisHours.
     *
     * @return float
     */
    public function getDiagnosisHours()
    {
        return $this->diagnosisHours;
    }

    /**
     * Sets a new diagnosisHours.
     *
     * @param float $diagnosisHours
     *
     * @return self
     */
    public function setDiagnosisHours($diagnosisHours)
    {
        $this->diagnosisHours = $diagnosisHours;

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
     * Gets as operation.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\LaborOperationType
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * Sets a new operation.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\LaborOperationType $operation
     *
     * @return self
     */
    public function setOperation(LaborOperationType $operation)
    {
        $this->operation = $operation;

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
     * Gets as paintMixHours.
     *
     * @return float
     */
    public function getPaintMixHours()
    {
        return $this->paintMixHours;
    }

    /**
     * Sets a new paintMixHours.
     *
     * @param float $paintMixHours
     *
     * @return self
     */
    public function setPaintMixHours($paintMixHours)
    {
        $this->paintMixHours = $paintMixHours;

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
     * Gets as setupHours.
     *
     * @return float
     */
    public function getSetupHours()
    {
        return $this->setupHours;
    }

    /**
     * Sets a new setupHours.
     *
     * @param float $setupHours
     *
     * @return self
     */
    public function setSetupHours($setupHours)
    {
        $this->setupHours = $setupHours;

        return $this;
    }

    /**
     * Adds as laborOperationSublet.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\LaborOperationSubletType $laborOperationSublet
     */
    public function addToSublets(LaborOperationSubletType $laborOperationSublet)
    {
        $this->sublets[] = $laborOperationSublet;

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
     * @return \App\Soap\dealerbuilt\src\Models\Service\LaborOperationSubletType[]
     */
    public function getSublets()
    {
        return $this->sublets;
    }

    /**
     * Sets a new sublets.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\LaborOperationSubletType[] $sublets
     *
     * @return self
     */
    public function setSublets(array $sublets)
    {
        $this->sublets = $sublets;

        return $this;
    }
}

<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing PushedRepairOrderJobAttributesType
 *
 * 
 * XSD Type: PushedRepairOrderJobAttributes
 */
class PushedRepairOrderJobAttributesType
{

    /**
     * @var string $campaignDispositionCode
     */
    private $campaignDispositionCode = null;

    /**
     * @var string $campaignNumber
     */
    private $campaignNumber = null;

    /**
     * @var string $causeDescription
     */
    private $causeDescription = null;

    /**
     * @var string $complaint
     */
    private $complaint = null;

    /**
     * @var string $correction
     */
    private $correction = null;

    /**
     * @var float $estimatedHours
     */
    private $estimatedHours = null;

    /**
     * @var string $externalJobId
     */
    private $externalJobId = null;

    /**
     * @var string $jobCodeGroup
     */
    private $jobCodeGroup = null;

    /**
     * @var int $jobNumber
     */
    private $jobNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PushedLaborItemAttributesType[] $laborItems
     */
    private $laborItems = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $menuPartsPrice
     */
    private $menuPartsPrice = null;

    /**
     * @var string $modifiedBy
     */
    private $modifiedBy = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderPartAttributesType[] $parts
     */
    private $parts = null;

    /**
     * @var string $payType
     */
    private $payType = null;

    /**
     * @var string $quickCode
     */
    private $quickCode = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderTechsAttributesType[] $techs
     */
    private $techs = null;

    /**
     * Gets as campaignDispositionCode
     *
     * @return string
     */
    public function getCampaignDispositionCode()
    {
        return $this->campaignDispositionCode;
    }

    /**
     * Sets a new campaignDispositionCode
     *
     * @param string $campaignDispositionCode
     * @return self
     */
    public function setCampaignDispositionCode($campaignDispositionCode)
    {
        $this->campaignDispositionCode = $campaignDispositionCode;
        return $this;
    }

    /**
     * Gets as campaignNumber
     *
     * @return string
     */
    public function getCampaignNumber()
    {
        return $this->campaignNumber;
    }

    /**
     * Sets a new campaignNumber
     *
     * @param string $campaignNumber
     * @return self
     */
    public function setCampaignNumber($campaignNumber)
    {
        $this->campaignNumber = $campaignNumber;
        return $this;
    }

    /**
     * Gets as causeDescription
     *
     * @return string
     */
    public function getCauseDescription()
    {
        return $this->causeDescription;
    }

    /**
     * Sets a new causeDescription
     *
     * @param string $causeDescription
     * @return self
     */
    public function setCauseDescription($causeDescription)
    {
        $this->causeDescription = $causeDescription;
        return $this;
    }

    /**
     * Gets as complaint
     *
     * @return string
     */
    public function getComplaint()
    {
        return $this->complaint;
    }

    /**
     * Sets a new complaint
     *
     * @param string $complaint
     * @return self
     */
    public function setComplaint($complaint)
    {
        $this->complaint = $complaint;
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
     * Gets as estimatedHours
     *
     * @return float
     */
    public function getEstimatedHours()
    {
        return $this->estimatedHours;
    }

    /**
     * Sets a new estimatedHours
     *
     * @param float $estimatedHours
     * @return self
     */
    public function setEstimatedHours($estimatedHours)
    {
        $this->estimatedHours = $estimatedHours;
        return $this;
    }

    /**
     * Gets as externalJobId
     *
     * @return string
     */
    public function getExternalJobId()
    {
        return $this->externalJobId;
    }

    /**
     * Sets a new externalJobId
     *
     * @param string $externalJobId
     * @return self
     */
    public function setExternalJobId($externalJobId)
    {
        $this->externalJobId = $externalJobId;
        return $this;
    }

    /**
     * Gets as jobCodeGroup
     *
     * @return string
     */
    public function getJobCodeGroup()
    {
        return $this->jobCodeGroup;
    }

    /**
     * Sets a new jobCodeGroup
     *
     * @param string $jobCodeGroup
     * @return self
     */
    public function setJobCodeGroup($jobCodeGroup)
    {
        $this->jobCodeGroup = $jobCodeGroup;
        return $this;
    }

    /**
     * Gets as jobNumber
     *
     * @return int
     */
    public function getJobNumber()
    {
        return $this->jobNumber;
    }

    /**
     * Sets a new jobNumber
     *
     * @param int $jobNumber
     * @return self
     */
    public function setJobNumber($jobNumber)
    {
        $this->jobNumber = $jobNumber;
        return $this;
    }

    /**
     * Adds as pushedLaborItemAttributes
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedLaborItemAttributesType $pushedLaborItemAttributes
     */
    public function addToLaborItems(\App\Soap\dealerbuilt\src\Models\Service\PushedLaborItemAttributesType $pushedLaborItemAttributes)
    {
        $this->laborItems[] = $pushedLaborItemAttributes;
        return $this;
    }

    /**
     * isset laborItems
     *
     * @param int|string $index
     * @return bool
     */
    public function issetLaborItems($index)
    {
        return isset($this->laborItems[$index]);
    }

    /**
     * unset laborItems
     *
     * @param int|string $index
     * @return void
     */
    public function unsetLaborItems($index)
    {
        unset($this->laborItems[$index]);
    }

    /**
     * Gets as laborItems
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PushedLaborItemAttributesType[]
     */
    public function getLaborItems()
    {
        return $this->laborItems;
    }

    /**
     * Sets a new laborItems
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedLaborItemAttributesType[] $laborItems
     * @return self
     */
    public function setLaborItems(array $laborItems)
    {
        $this->laborItems = $laborItems;
        return $this;
    }

    /**
     * Gets as menuPartsPrice
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getMenuPartsPrice()
    {
        return $this->menuPartsPrice;
    }

    /**
     * Sets a new menuPartsPrice
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $menuPartsPrice
     * @return self
     */
    public function setMenuPartsPrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $menuPartsPrice)
    {
        $this->menuPartsPrice = $menuPartsPrice;
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
     * Adds as pushedRepairOrderPartAttributes
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderPartAttributesType $pushedRepairOrderPartAttributes
     */
    public function addToParts(\App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderPartAttributesType $pushedRepairOrderPartAttributes)
    {
        $this->parts[] = $pushedRepairOrderPartAttributes;
        return $this;
    }

    /**
     * isset parts
     *
     * @param int|string $index
     * @return bool
     */
    public function issetParts($index)
    {
        return isset($this->parts[$index]);
    }

    /**
     * unset parts
     *
     * @param int|string $index
     * @return void
     */
    public function unsetParts($index)
    {
        unset($this->parts[$index]);
    }

    /**
     * Gets as parts
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderPartAttributesType[]
     */
    public function getParts()
    {
        return $this->parts;
    }

    /**
     * Sets a new parts
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderPartAttributesType[] $parts
     * @return self
     */
    public function setParts(array $parts)
    {
        $this->parts = $parts;
        return $this;
    }

    /**
     * Gets as payType
     *
     * @return string
     */
    public function getPayType()
    {
        return $this->payType;
    }

    /**
     * Sets a new payType
     *
     * @param string $payType
     * @return self
     */
    public function setPayType($payType)
    {
        $this->payType = $payType;
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
     * Adds as pushedRepairOrderTechsAttributes
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderTechsAttributesType $pushedRepairOrderTechsAttributes
     */
    public function addToTechs(\App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderTechsAttributesType $pushedRepairOrderTechsAttributes)
    {
        $this->techs[] = $pushedRepairOrderTechsAttributes;
        return $this;
    }

    /**
     * isset techs
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTechs($index)
    {
        return isset($this->techs[$index]);
    }

    /**
     * unset techs
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTechs($index)
    {
        unset($this->techs[$index]);
    }

    /**
     * Gets as techs
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderTechsAttributesType[]
     */
    public function getTechs()
    {
        return $this->techs;
    }

    /**
     * Sets a new techs
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedRepairOrderTechsAttributesType[] $techs
     * @return self
     */
    public function setTechs(array $techs)
    {
        $this->techs = $techs;
        return $this;
    }


}


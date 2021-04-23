<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing PushedPotentialJobAttributesType
 *
 * 
 * XSD Type: PushedPotentialJobAttributes
 */
class PushedPotentialJobAttributesType
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
     * @var int $jobId
     */
    private $jobId = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialLaborItemAttributesType[] $laborItems
     */
    private $laborItems = null;

    /**
     * @var string $laborPriceCode
     */
    private $laborPriceCode = null;

    /**
     * @var float $laborRate
     */
    private $laborRate = null;

    /**
     * @var float $laborTax
     */
    private $laborTax = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $menuPartsPrice
     */
    private $menuPartsPrice = null;

    /**
     * @var string $modifiedBy
     */
    private $modifiedBy = null;

    /**
     * @var string $mpiCode
     */
    private $mpiCode = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialPartAttributesType[] $parts
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
     * @var string $serviceAdvisorNumber
     */
    private $serviceAdvisorNumber = null;

    /**
     * @var string $status
     */
    private $status = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialTechsAttributesType[] $techs
     */
    private $techs = null;

    /**
     * @var string $vciCode
     */
    private $vciCode = null;

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
     * Gets as jobId
     *
     * @return int
     */
    public function getJobId()
    {
        return $this->jobId;
    }

    /**
     * Sets a new jobId
     *
     * @param int $jobId
     * @return self
     */
    public function setJobId($jobId)
    {
        $this->jobId = $jobId;
        return $this;
    }

    /**
     * Adds as pushedPotentialLaborItemAttributes
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialLaborItemAttributesType $pushedPotentialLaborItemAttributes
     */
    public function addToLaborItems(\App\Soap\dealerbuilt\src\Models\Service\PushedPotentialLaborItemAttributesType $pushedPotentialLaborItemAttributes)
    {
        $this->laborItems[] = $pushedPotentialLaborItemAttributes;
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
     * @return \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialLaborItemAttributesType[]
     */
    public function getLaborItems()
    {
        return $this->laborItems;
    }

    /**
     * Sets a new laborItems
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialLaborItemAttributesType[] $laborItems
     * @return self
     */
    public function setLaborItems(?array $laborItems)
    {
        $this->laborItems = $laborItems;
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
     * @return float
     */
    public function getLaborRate()
    {
        return $this->laborRate;
    }

    /**
     * Sets a new laborRate
     *
     * @param float $laborRate
     * @return self
     */
    public function setLaborRate($laborRate)
    {
        $this->laborRate = $laborRate;
        return $this;
    }

    /**
     * Gets as laborTax
     *
     * @return float
     */
    public function getLaborTax()
    {
        return $this->laborTax;
    }

    /**
     * Sets a new laborTax
     *
     * @param float $laborTax
     * @return self
     */
    public function setLaborTax($laborTax)
    {
        $this->laborTax = $laborTax;
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
     * Gets as mpiCode
     *
     * @return string
     */
    public function getMpiCode()
    {
        return $this->mpiCode;
    }

    /**
     * Sets a new mpiCode
     *
     * @param string $mpiCode
     * @return self
     */
    public function setMpiCode($mpiCode)
    {
        $this->mpiCode = $mpiCode;
        return $this;
    }

    /**
     * Adds as pushedPotentialPartAttributes
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialPartAttributesType $pushedPotentialPartAttributes
     */
    public function addToParts(\App\Soap\dealerbuilt\src\Models\Service\PushedPotentialPartAttributesType $pushedPotentialPartAttributes)
    {
        $this->parts[] = $pushedPotentialPartAttributes;
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
     * @return \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialPartAttributesType[]
     */
    public function getParts()
    {
        return $this->parts;
    }

    /**
     * Sets a new parts
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialPartAttributesType[] $parts
     * @return self
     */
    public function setParts(?array $parts)
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
     * Gets as serviceAdvisorNumber
     *
     * @return string
     */
    public function getServiceAdvisorNumber()
    {
        return $this->serviceAdvisorNumber;
    }

    /**
     * Sets a new serviceAdvisorNumber
     *
     * @param string $serviceAdvisorNumber
     * @return self
     */
    public function setServiceAdvisorNumber($serviceAdvisorNumber)
    {
        $this->serviceAdvisorNumber = $serviceAdvisorNumber;
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
     * Adds as pushedPotentialTechsAttributes
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialTechsAttributesType $pushedPotentialTechsAttributes
     */
    public function addToTechs(\App\Soap\dealerbuilt\src\Models\Service\PushedPotentialTechsAttributesType $pushedPotentialTechsAttributes)
    {
        $this->techs[] = $pushedPotentialTechsAttributes;
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
     * @return \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialTechsAttributesType[]
     */
    public function getTechs()
    {
        return $this->techs;
    }

    /**
     * Sets a new techs
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PushedPotentialTechsAttributesType[] $techs
     * @return self
     */
    public function setTechs(?array $techs)
    {
        $this->techs = $techs;
        return $this;
    }

    /**
     * Gets as vciCode
     *
     * @return string
     */
    public function getVciCode()
    {
        return $this->vciCode;
    }

    /**
     * Sets a new vciCode
     *
     * @param string $vciCode
     * @return self
     */
    public function setVciCode($vciCode)
    {
        $this->vciCode = $vciCode;
        return $this;
    }


}


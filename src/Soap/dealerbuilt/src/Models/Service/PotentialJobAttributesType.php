<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing PotentialJobAttributesType.
 *
 * XSD Type: PotentialJobAttributes
 */
class PotentialJobAttributesType
{
    /**
     * @var string
     */
    private $campaignDispositionCode = null;

    /**
     * @var string
     */
    private $campaignNumber = null;

    /**
     * @var string
     */
    private $causeDescription = null;

    /**
     * @var string
     */
    private $claimComment = null;

    /**
     * @var string
     */
    private $complaint = null;

    /**
     * @var string
     */
    private $complaintCode = null;

    /**
     * @var string
     */
    private $correction = null;

    /**
     * @var string
     */
    private $defectCode = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $freightTotal = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $hazmatTotal = null;

    /**
     * @var bool
     */
    private $isFailedPartJob = null;

    /**
     * @var string
     */
    private $jobCode = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $jobCost = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $jobLaborRate = null;

    /**
     * @var int
     */
    private $jobNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $jobTax = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $jobTotal = null;

    /**
     * @var float
     */
    private $laborActualHours = null;

    /**
     * @var float
     */
    private $laborAllowanceHours = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $laborCost = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PotentialLaborItemType[]
     */
    private $laborItems = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $laborTotal = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $menuPartsPrice = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PotentialPartType[]
     */
    private $parts = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $partsCost = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $partsTotal = null;

    /**
     * @var string
     */
    private $payType = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $rentalTotal = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\PotentialServiceComponentType[]
     */
    private $serviceComponents = null;

    /**
     * @var string
     */
    private $serviceDept = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $subletCost = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $subletTotal = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\JobTechnicianType[]
     */
    private $techs = null;

    /**
     * @var string
     */
    private $warrantyClaimType = null;

    /**
     * Gets as campaignDispositionCode.
     *
     * @return string
     */
    public function getCampaignDispositionCode()
    {
        return $this->campaignDispositionCode;
    }

    /**
     * Sets a new campaignDispositionCode.
     *
     * @param string $campaignDispositionCode
     *
     * @return self
     */
    public function setCampaignDispositionCode($campaignDispositionCode)
    {
        $this->campaignDispositionCode = $campaignDispositionCode;

        return $this;
    }

    /**
     * Gets as campaignNumber.
     *
     * @return string
     */
    public function getCampaignNumber()
    {
        return $this->campaignNumber;
    }

    /**
     * Sets a new campaignNumber.
     *
     * @param string $campaignNumber
     *
     * @return self
     */
    public function setCampaignNumber($campaignNumber)
    {
        $this->campaignNumber = $campaignNumber;

        return $this;
    }

    /**
     * Gets as causeDescription.
     *
     * @return string
     */
    public function getCauseDescription()
    {
        return $this->causeDescription;
    }

    /**
     * Sets a new causeDescription.
     *
     * @param string $causeDescription
     *
     * @return self
     */
    public function setCauseDescription($causeDescription)
    {
        $this->causeDescription = $causeDescription;

        return $this;
    }

    /**
     * Gets as claimComment.
     *
     * @return string
     */
    public function getClaimComment()
    {
        return $this->claimComment;
    }

    /**
     * Sets a new claimComment.
     *
     * @param string $claimComment
     *
     * @return self
     */
    public function setClaimComment($claimComment)
    {
        $this->claimComment = $claimComment;

        return $this;
    }

    /**
     * Gets as complaint.
     *
     * @return string
     */
    public function getComplaint()
    {
        return $this->complaint;
    }

    /**
     * Sets a new complaint.
     *
     * @param string $complaint
     *
     * @return self
     */
    public function setComplaint($complaint)
    {
        $this->complaint = $complaint;

        return $this;
    }

    /**
     * Gets as complaintCode.
     *
     * @return string
     */
    public function getComplaintCode()
    {
        return $this->complaintCode;
    }

    /**
     * Sets a new complaintCode.
     *
     * @param string $complaintCode
     *
     * @return self
     */
    public function setComplaintCode($complaintCode)
    {
        $this->complaintCode = $complaintCode;

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
     * Gets as defectCode.
     *
     * @return string
     */
    public function getDefectCode()
    {
        return $this->defectCode;
    }

    /**
     * Sets a new defectCode.
     *
     * @param string $defectCode
     *
     * @return self
     */
    public function setDefectCode($defectCode)
    {
        $this->defectCode = $defectCode;

        return $this;
    }

    /**
     * Gets as freightTotal.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getFreightTotal()
    {
        return $this->freightTotal;
    }

    /**
     * Sets a new freightTotal.
     *
     * @return self
     */
    public function setFreightTotal(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $freightTotal)
    {
        $this->freightTotal = $freightTotal;

        return $this;
    }

    /**
     * Gets as hazmatTotal.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getHazmatTotal()
    {
        return $this->hazmatTotal;
    }

    /**
     * Sets a new hazmatTotal.
     *
     * @return self
     */
    public function setHazmatTotal(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $hazmatTotal)
    {
        $this->hazmatTotal = $hazmatTotal;

        return $this;
    }

    /**
     * Gets as isFailedPartJob.
     *
     * @return bool
     */
    public function getIsFailedPartJob()
    {
        return $this->isFailedPartJob;
    }

    /**
     * Sets a new isFailedPartJob.
     *
     * @param bool $isFailedPartJob
     *
     * @return self
     */
    public function setIsFailedPartJob($isFailedPartJob)
    {
        $this->isFailedPartJob = $isFailedPartJob;

        return $this;
    }

    /**
     * Gets as jobCode.
     *
     * @return string
     */
    public function getJobCode()
    {
        return $this->jobCode;
    }

    /**
     * Sets a new jobCode.
     *
     * @param string $jobCode
     *
     * @return self
     */
    public function setJobCode($jobCode)
    {
        $this->jobCode = $jobCode;

        return $this;
    }

    /**
     * Gets as jobCost.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getJobCost()
    {
        return $this->jobCost;
    }

    /**
     * Sets a new jobCost.
     *
     * @return self
     */
    public function setJobCost(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $jobCost)
    {
        $this->jobCost = $jobCost;

        return $this;
    }

    /**
     * Gets as jobLaborRate.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getJobLaborRate()
    {
        return $this->jobLaborRate;
    }

    /**
     * Sets a new jobLaborRate.
     *
     * @return self
     */
    public function setJobLaborRate(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $jobLaborRate)
    {
        $this->jobLaborRate = $jobLaborRate;

        return $this;
    }

    /**
     * Gets as jobNumber.
     *
     * @return int
     */
    public function getJobNumber()
    {
        return $this->jobNumber;
    }

    /**
     * Sets a new jobNumber.
     *
     * @param int $jobNumber
     *
     * @return self
     */
    public function setJobNumber($jobNumber)
    {
        $this->jobNumber = $jobNumber;

        return $this;
    }

    /**
     * Gets as jobTax.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getJobTax()
    {
        return $this->jobTax;
    }

    /**
     * Sets a new jobTax.
     *
     * @return self
     */
    public function setJobTax(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $jobTax)
    {
        $this->jobTax = $jobTax;

        return $this;
    }

    /**
     * Gets as jobTotal.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getJobTotal()
    {
        return $this->jobTotal;
    }

    /**
     * Sets a new jobTotal.
     *
     * @return self
     */
    public function setJobTotal(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $jobTotal)
    {
        $this->jobTotal = $jobTotal;

        return $this;
    }

    /**
     * Gets as laborActualHours.
     *
     * @return float
     */
    public function getLaborActualHours()
    {
        return $this->laborActualHours;
    }

    /**
     * Sets a new laborActualHours.
     *
     * @param float $laborActualHours
     *
     * @return self
     */
    public function setLaborActualHours($laborActualHours)
    {
        $this->laborActualHours = $laborActualHours;

        return $this;
    }

    /**
     * Gets as laborAllowanceHours.
     *
     * @return float
     */
    public function getLaborAllowanceHours()
    {
        return $this->laborAllowanceHours;
    }

    /**
     * Sets a new laborAllowanceHours.
     *
     * @param float $laborAllowanceHours
     *
     * @return self
     */
    public function setLaborAllowanceHours($laborAllowanceHours)
    {
        $this->laborAllowanceHours = $laborAllowanceHours;

        return $this;
    }

    /**
     * Gets as laborCost.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getLaborCost()
    {
        return $this->laborCost;
    }

    /**
     * Sets a new laborCost.
     *
     * @return self
     */
    public function setLaborCost(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $laborCost)
    {
        $this->laborCost = $laborCost;

        return $this;
    }

    /**
     * Adds as potentialLaborItem.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PotentialLaborItemType $potentialLaborItem
     */
    public function addToLaborItems(PotentialLaborItemType $potentialLaborItem)
    {
        $this->laborItems[] = $potentialLaborItem;

        return $this;
    }

    /**
     * isset laborItems.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetLaborItems($index)
    {
        return isset($this->laborItems[$index]);
    }

    /**
     * unset laborItems.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetLaborItems($index)
    {
        unset($this->laborItems[$index]);
    }

    /**
     * Gets as laborItems.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PotentialLaborItemType[]
     */
    public function getLaborItems()
    {
        return $this->laborItems;
    }

    /**
     * Sets a new laborItems.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PotentialLaborItemType[] $laborItems
     *
     * @return self
     */
    public function setLaborItems(array $laborItems)
    {
        $this->laborItems = $laborItems;

        return $this;
    }

    /**
     * Gets as laborTotal.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getLaborTotal()
    {
        return $this->laborTotal;
    }

    /**
     * Sets a new laborTotal.
     *
     * @return self
     */
    public function setLaborTotal(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $laborTotal)
    {
        $this->laborTotal = $laborTotal;

        return $this;
    }

    /**
     * Gets as menuPartsPrice.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getMenuPartsPrice()
    {
        return $this->menuPartsPrice;
    }

    /**
     * Sets a new menuPartsPrice.
     *
     * @return self
     */
    public function setMenuPartsPrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $menuPartsPrice)
    {
        $this->menuPartsPrice = $menuPartsPrice;

        return $this;
    }

    /**
     * Adds as potentialPart.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PotentialPartType $potentialPart
     */
    public function addToParts(PotentialPartType $potentialPart)
    {
        $this->parts[] = $potentialPart;

        return $this;
    }

    /**
     * isset parts.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetParts($index)
    {
        return isset($this->parts[$index]);
    }

    /**
     * unset parts.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetParts($index)
    {
        unset($this->parts[$index]);
    }

    /**
     * Gets as parts.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PotentialPartType[]
     */
    public function getParts()
    {
        return $this->parts;
    }

    /**
     * Sets a new parts.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PotentialPartType[] $parts
     *
     * @return self
     */
    public function setParts(array $parts)
    {
        $this->parts = $parts;

        return $this;
    }

    /**
     * Gets as partsCost.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getPartsCost()
    {
        return $this->partsCost;
    }

    /**
     * Sets a new partsCost.
     *
     * @return self
     */
    public function setPartsCost(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $partsCost)
    {
        $this->partsCost = $partsCost;

        return $this;
    }

    /**
     * Gets as partsTotal.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getPartsTotal()
    {
        return $this->partsTotal;
    }

    /**
     * Sets a new partsTotal.
     *
     * @return self
     */
    public function setPartsTotal(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $partsTotal)
    {
        $this->partsTotal = $partsTotal;

        return $this;
    }

    /**
     * Gets as payType.
     *
     * @return string
     */
    public function getPayType()
    {
        return $this->payType;
    }

    /**
     * Sets a new payType.
     *
     * @param string $payType
     *
     * @return self
     */
    public function setPayType($payType)
    {
        $this->payType = $payType;

        return $this;
    }

    /**
     * Gets as rentalTotal.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getRentalTotal()
    {
        return $this->rentalTotal;
    }

    /**
     * Sets a new rentalTotal.
     *
     * @return self
     */
    public function setRentalTotal(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $rentalTotal)
    {
        $this->rentalTotal = $rentalTotal;

        return $this;
    }

    /**
     * Adds as potentialServiceComponent.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PotentialServiceComponentType $potentialServiceComponent
     */
    public function addToServiceComponents(PotentialServiceComponentType $potentialServiceComponent)
    {
        $this->serviceComponents[] = $potentialServiceComponent;

        return $this;
    }

    /**
     * isset serviceComponents.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetServiceComponents($index)
    {
        return isset($this->serviceComponents[$index]);
    }

    /**
     * unset serviceComponents.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetServiceComponents($index)
    {
        unset($this->serviceComponents[$index]);
    }

    /**
     * Gets as serviceComponents.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\PotentialServiceComponentType[]
     */
    public function getServiceComponents()
    {
        return $this->serviceComponents;
    }

    /**
     * Sets a new serviceComponents.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\PotentialServiceComponentType[] $serviceComponents
     *
     * @return self
     */
    public function setServiceComponents(array $serviceComponents)
    {
        $this->serviceComponents = $serviceComponents;

        return $this;
    }

    /**
     * Gets as serviceDept.
     *
     * @return string
     */
    public function getServiceDept()
    {
        return $this->serviceDept;
    }

    /**
     * Sets a new serviceDept.
     *
     * @param string $serviceDept
     *
     * @return self
     */
    public function setServiceDept($serviceDept)
    {
        $this->serviceDept = $serviceDept;

        return $this;
    }

    /**
     * Gets as subletCost.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getSubletCost()
    {
        return $this->subletCost;
    }

    /**
     * Sets a new subletCost.
     *
     * @return self
     */
    public function setSubletCost(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $subletCost)
    {
        $this->subletCost = $subletCost;

        return $this;
    }

    /**
     * Gets as subletTotal.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getSubletTotal()
    {
        return $this->subletTotal;
    }

    /**
     * Sets a new subletTotal.
     *
     * @return self
     */
    public function setSubletTotal(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $subletTotal)
    {
        $this->subletTotal = $subletTotal;

        return $this;
    }

    /**
     * Adds as jobTechnician.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\JobTechnicianType $jobTechnician
     */
    public function addToTechs(JobTechnicianType $jobTechnician)
    {
        $this->techs[] = $jobTechnician;

        return $this;
    }

    /**
     * isset techs.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetTechs($index)
    {
        return isset($this->techs[$index]);
    }

    /**
     * unset techs.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetTechs($index)
    {
        unset($this->techs[$index]);
    }

    /**
     * Gets as techs.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\JobTechnicianType[]
     */
    public function getTechs()
    {
        return $this->techs;
    }

    /**
     * Sets a new techs.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\JobTechnicianType[] $techs
     *
     * @return self
     */
    public function setTechs(array $techs)
    {
        $this->techs = $techs;

        return $this;
    }

    /**
     * Gets as warrantyClaimType.
     *
     * @return string
     */
    public function getWarrantyClaimType()
    {
        return $this->warrantyClaimType;
    }

    /**
     * Sets a new warrantyClaimType.
     *
     * @param string $warrantyClaimType
     *
     * @return self
     */
    public function setWarrantyClaimType($warrantyClaimType)
    {
        $this->warrantyClaimType = $warrantyClaimType;

        return $this;
    }
}

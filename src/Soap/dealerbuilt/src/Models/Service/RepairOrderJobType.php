<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing RepairOrderJobType.
 *
 * XSD Type: RepairOrderJob
 */
class RepairOrderJobType
{
    /**
     * @var bool
     */
    private $addOnRepairIndicator = null;

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
    private $causeCode = null;

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
    private $complaintDescription = null;

    /**
     * @var string
     */
    private $correction = null;

    /**
     * @var string
     */
    private $correctionDescription = null;

    /**
     * @var float
     */
    private $couponDiscountAmount = null;

    /**
     * @var string
     */
    private $defectCode = null;

    /**
     * @var string
     */
    private $diagnosticName = null;

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
     * @var string
     */
    private $jobCodeDescription = null;

    /**
     * @var string
     */
    private $jobCodeGroup = null;

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
     * @var string
     */
    private $jobTypeString = null;

    /**
     * @var string
     */
    private $laborActionCode = null;

    /**
     * @var string
     */
    private $laborActionDescription = null;

    /**
     * @var float
     */
    private $laborActualHours = null;

    /**
     * @var float
     */
    private $laborActualHoursNumeric = null;

    /**
     * @var float
     */
    private $laborAllowanceHours = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $laborCost = null;

    /**
     * @var string
     */
    private $laborInvoiceNumber = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\LaborItemType[]
     */
    private $laborItems = null;

    /**
     * @var string
     */
    private $laborOperationComment = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $laborTotal = null;

    /**
     * @var string
     */
    private $locationDescription = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $menuPartsPrice = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $miscFees = null;

    /**
     * @var string
     */
    private $miscellaneousNotes = null;

    /**
     * @var string
     */
    private $operationName = null;

    /**
     * @var string
     */
    private $packageCode = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\RepairOrderPartType[]
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
    private $partsWriter = null;

    /**
     * @var string
     */
    private $payType = null;

    /**
     * @var string
     */
    private $recommendation = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $rentalTotal = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\RentalVehicleType[]
     */
    private $rentalVehicles = null;

    /**
     * @var string
     */
    private $repeatRepairIndicator = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\RepairOrderServiceComponentType[]
     */
    private $serviceComponents = null;

    /**
     * @var string
     */
    private $serviceDept = null;

    /**
     * @var string
     */
    private $serviceLeadID = null;

    /**
     * @var string
     */
    private $status = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $subletCost = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $subletTotal = null;

    /**
     * @var float
     */
    private $taxAmount = null;

    /**
     * @var string
     */
    private $technicianNotes = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\JobTechnicianType[]
     */
    private $techs = null;

    /**
     * @var string
     */
    private $warrantyClaimNumber = null;

    /**
     * @var string
     */
    private $warrantyClaimType = null;

    /**
     * Gets as addOnRepairIndicator.
     *
     * @return bool
     */
    public function getAddOnRepairIndicator()
    {
        return $this->addOnRepairIndicator;
    }

    /**
     * Sets a new addOnRepairIndicator.
     *
     * @param bool $addOnRepairIndicator
     *
     * @return self
     */
    public function setAddOnRepairIndicator($addOnRepairIndicator)
    {
        $this->addOnRepairIndicator = $addOnRepairIndicator;

        return $this;
    }

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
     * Gets as causeCode.
     *
     * @return string
     */
    public function getCauseCode()
    {
        return $this->causeCode;
    }

    /**
     * Sets a new causeCode.
     *
     * @param string $causeCode
     *
     * @return self
     */
    public function setCauseCode($causeCode)
    {
        $this->causeCode = $causeCode;

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
     * Gets as complaintDescription.
     *
     * @return string
     */
    public function getComplaintDescription()
    {
        return $this->complaintDescription;
    }

    /**
     * Sets a new complaintDescription.
     *
     * @param string $complaintDescription
     *
     * @return self
     */
    public function setComplaintDescription($complaintDescription)
    {
        $this->complaintDescription = $complaintDescription;

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
     * Gets as correctionDescription.
     *
     * @return string
     */
    public function getCorrectionDescription()
    {
        return $this->correctionDescription;
    }

    /**
     * Sets a new correctionDescription.
     *
     * @param string $correctionDescription
     *
     * @return self
     */
    public function setCorrectionDescription($correctionDescription)
    {
        $this->correctionDescription = $correctionDescription;

        return $this;
    }

    /**
     * Gets as couponDiscountAmount.
     *
     * @return float
     */
    public function getCouponDiscountAmount()
    {
        return $this->couponDiscountAmount;
    }

    /**
     * Sets a new couponDiscountAmount.
     *
     * @param float $couponDiscountAmount
     *
     * @return self
     */
    public function setCouponDiscountAmount($couponDiscountAmount)
    {
        $this->couponDiscountAmount = $couponDiscountAmount;

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
     * Gets as diagnosticName.
     *
     * @return string
     */
    public function getDiagnosticName()
    {
        return $this->diagnosticName;
    }

    /**
     * Sets a new diagnosticName.
     *
     * @param string $diagnosticName
     *
     * @return self
     */
    public function setDiagnosticName($diagnosticName)
    {
        $this->diagnosticName = $diagnosticName;

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
     * Gets as jobCodeDescription.
     *
     * @return string
     */
    public function getJobCodeDescription()
    {
        return $this->jobCodeDescription;
    }

    /**
     * Sets a new jobCodeDescription.
     *
     * @param string $jobCodeDescription
     *
     * @return self
     */
    public function setJobCodeDescription($jobCodeDescription)
    {
        $this->jobCodeDescription = $jobCodeDescription;

        return $this;
    }

    /**
     * Gets as jobCodeGroup.
     *
     * @return string
     */
    public function getJobCodeGroup()
    {
        return $this->jobCodeGroup;
    }

    /**
     * Sets a new jobCodeGroup.
     *
     * @param string $jobCodeGroup
     *
     * @return self
     */
    public function setJobCodeGroup($jobCodeGroup)
    {
        $this->jobCodeGroup = $jobCodeGroup;

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
     * Gets as jobTypeString.
     *
     * @return string
     */
    public function getJobTypeString()
    {
        return $this->jobTypeString;
    }

    /**
     * Sets a new jobTypeString.
     *
     * @param string $jobTypeString
     *
     * @return self
     */
    public function setJobTypeString($jobTypeString)
    {
        $this->jobTypeString = $jobTypeString;

        return $this;
    }

    /**
     * Gets as laborActionCode.
     *
     * @return string
     */
    public function getLaborActionCode()
    {
        return $this->laborActionCode;
    }

    /**
     * Sets a new laborActionCode.
     *
     * @param string $laborActionCode
     *
     * @return self
     */
    public function setLaborActionCode($laborActionCode)
    {
        $this->laborActionCode = $laborActionCode;

        return $this;
    }

    /**
     * Gets as laborActionDescription.
     *
     * @return string
     */
    public function getLaborActionDescription()
    {
        return $this->laborActionDescription;
    }

    /**
     * Sets a new laborActionDescription.
     *
     * @param string $laborActionDescription
     *
     * @return self
     */
    public function setLaborActionDescription($laborActionDescription)
    {
        $this->laborActionDescription = $laborActionDescription;

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
     * Gets as laborActualHoursNumeric.
     *
     * @return float
     */
    public function getLaborActualHoursNumeric()
    {
        return $this->laborActualHoursNumeric;
    }

    /**
     * Sets a new laborActualHoursNumeric.
     *
     * @param float $laborActualHoursNumeric
     *
     * @return self
     */
    public function setLaborActualHoursNumeric($laborActualHoursNumeric)
    {
        $this->laborActualHoursNumeric = $laborActualHoursNumeric;

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
     * Gets as laborInvoiceNumber.
     *
     * @return string
     */
    public function getLaborInvoiceNumber()
    {
        return $this->laborInvoiceNumber;
    }

    /**
     * Sets a new laborInvoiceNumber.
     *
     * @param string $laborInvoiceNumber
     *
     * @return self
     */
    public function setLaborInvoiceNumber($laborInvoiceNumber)
    {
        $this->laborInvoiceNumber = $laborInvoiceNumber;

        return $this;
    }

    /**
     * Adds as laborItem.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\LaborItemType $laborItem
     */
    public function addToLaborItems(LaborItemType $laborItem)
    {
        $this->laborItems[] = $laborItem;

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
     * @return \App\Soap\dealerbuilt\src\Models\Service\LaborItemType[]
     */
    public function getLaborItems()
    {
        return $this->laborItems;
    }

    /**
     * Sets a new laborItems.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\LaborItemType[] $laborItems
     *
     * @return self
     */
    public function setLaborItems(array $laborItems)
    {
        $this->laborItems = $laborItems;

        return $this;
    }

    /**
     * Gets as laborOperationComment.
     *
     * @return string
     */
    public function getLaborOperationComment()
    {
        return $this->laborOperationComment;
    }

    /**
     * Sets a new laborOperationComment.
     *
     * @param string $laborOperationComment
     *
     * @return self
     */
    public function setLaborOperationComment($laborOperationComment)
    {
        $this->laborOperationComment = $laborOperationComment;

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
     * Gets as locationDescription.
     *
     * @return string
     */
    public function getLocationDescription()
    {
        return $this->locationDescription;
    }

    /**
     * Sets a new locationDescription.
     *
     * @param string $locationDescription
     *
     * @return self
     */
    public function setLocationDescription($locationDescription)
    {
        $this->locationDescription = $locationDescription;

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
     * Gets as miscFees.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getMiscFees()
    {
        return $this->miscFees;
    }

    /**
     * Sets a new miscFees.
     *
     * @return self
     */
    public function setMiscFees(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $miscFees)
    {
        $this->miscFees = $miscFees;

        return $this;
    }

    /**
     * Gets as miscellaneousNotes.
     *
     * @return string
     */
    public function getMiscellaneousNotes()
    {
        return $this->miscellaneousNotes;
    }

    /**
     * Sets a new miscellaneousNotes.
     *
     * @param string $miscellaneousNotes
     *
     * @return self
     */
    public function setMiscellaneousNotes($miscellaneousNotes)
    {
        $this->miscellaneousNotes = $miscellaneousNotes;

        return $this;
    }

    /**
     * Gets as operationName.
     *
     * @return string
     */
    public function getOperationName()
    {
        return $this->operationName;
    }

    /**
     * Sets a new operationName.
     *
     * @param string $operationName
     *
     * @return self
     */
    public function setOperationName($operationName)
    {
        $this->operationName = $operationName;

        return $this;
    }

    /**
     * Gets as packageCode.
     *
     * @return string
     */
    public function getPackageCode()
    {
        return $this->packageCode;
    }

    /**
     * Sets a new packageCode.
     *
     * @param string $packageCode
     *
     * @return self
     */
    public function setPackageCode($packageCode)
    {
        $this->packageCode = $packageCode;

        return $this;
    }

    /**
     * Adds as repairOrderPart.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\RepairOrderPartType $repairOrderPart
     */
    public function addToParts(RepairOrderPartType $repairOrderPart)
    {
        $this->parts[] = $repairOrderPart;

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
     * @return \App\Soap\dealerbuilt\src\Models\Service\RepairOrderPartType[]
     */
    public function getParts()
    {
        return $this->parts;
    }

    /**
     * Sets a new parts.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\RepairOrderPartType[] $parts
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
     * Gets as partsWriter.
     *
     * @return string
     */
    public function getPartsWriter()
    {
        return $this->partsWriter;
    }

    /**
     * Sets a new partsWriter.
     *
     * @param string $partsWriter
     *
     * @return self
     */
    public function setPartsWriter($partsWriter)
    {
        $this->partsWriter = $partsWriter;

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
     * Gets as recommendation.
     *
     * @return string
     */
    public function getRecommendation()
    {
        return $this->recommendation;
    }

    /**
     * Sets a new recommendation.
     *
     * @param string $recommendation
     *
     * @return self
     */
    public function setRecommendation($recommendation)
    {
        $this->recommendation = $recommendation;

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
     * Adds as rentalVehicle.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\RentalVehicleType $rentalVehicle
     */
    public function addToRentalVehicles(RentalVehicleType $rentalVehicle)
    {
        $this->rentalVehicles[] = $rentalVehicle;

        return $this;
    }

    /**
     * isset rentalVehicles.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetRentalVehicles($index)
    {
        return isset($this->rentalVehicles[$index]);
    }

    /**
     * unset rentalVehicles.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetRentalVehicles($index)
    {
        unset($this->rentalVehicles[$index]);
    }

    /**
     * Gets as rentalVehicles.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\RentalVehicleType[]
     */
    public function getRentalVehicles()
    {
        return $this->rentalVehicles;
    }

    /**
     * Sets a new rentalVehicles.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\RentalVehicleType[] $rentalVehicles
     *
     * @return self
     */
    public function setRentalVehicles(array $rentalVehicles)
    {
        $this->rentalVehicles = $rentalVehicles;

        return $this;
    }

    /**
     * Gets as repeatRepairIndicator.
     *
     * @return string
     */
    public function getRepeatRepairIndicator()
    {
        return $this->repeatRepairIndicator;
    }

    /**
     * Sets a new repeatRepairIndicator.
     *
     * @param string $repeatRepairIndicator
     *
     * @return self
     */
    public function setRepeatRepairIndicator($repeatRepairIndicator)
    {
        $this->repeatRepairIndicator = $repeatRepairIndicator;

        return $this;
    }

    /**
     * Adds as repairOrderServiceComponent.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\RepairOrderServiceComponentType $repairOrderServiceComponent
     */
    public function addToServiceComponents(RepairOrderServiceComponentType $repairOrderServiceComponent)
    {
        $this->serviceComponents[] = $repairOrderServiceComponent;

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
     * @return \App\Soap\dealerbuilt\src\Models\Service\RepairOrderServiceComponentType[]
     */
    public function getServiceComponents()
    {
        return $this->serviceComponents;
    }

    /**
     * Sets a new serviceComponents.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\RepairOrderServiceComponentType[] $serviceComponents
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
     * Gets as serviceLeadID.
     *
     * @return string
     */
    public function getServiceLeadID()
    {
        return $this->serviceLeadID;
    }

    /**
     * Sets a new serviceLeadID.
     *
     * @param string $serviceLeadID
     *
     * @return self
     */
    public function setServiceLeadID($serviceLeadID)
    {
        $this->serviceLeadID = $serviceLeadID;

        return $this;
    }

    /**
     * Gets as status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets a new status.
     *
     * @param string $status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

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
     * Gets as taxAmount.
     *
     * @return float
     */
    public function getTaxAmount()
    {
        return $this->taxAmount;
    }

    /**
     * Sets a new taxAmount.
     *
     * @param float $taxAmount
     *
     * @return self
     */
    public function setTaxAmount($taxAmount)
    {
        $this->taxAmount = $taxAmount;

        return $this;
    }

    /**
     * Gets as technicianNotes.
     *
     * @return string
     */
    public function getTechnicianNotes()
    {
        return $this->technicianNotes;
    }

    /**
     * Sets a new technicianNotes.
     *
     * @param string $technicianNotes
     *
     * @return self
     */
    public function setTechnicianNotes($technicianNotes)
    {
        $this->technicianNotes = $technicianNotes;

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
     * Gets as warrantyClaimNumber.
     *
     * @return string
     */
    public function getWarrantyClaimNumber()
    {
        return $this->warrantyClaimNumber;
    }

    /**
     * Sets a new warrantyClaimNumber.
     *
     * @param string $warrantyClaimNumber
     *
     * @return self
     */
    public function setWarrantyClaimNumber($warrantyClaimNumber)
    {
        $this->warrantyClaimNumber = $warrantyClaimNumber;

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

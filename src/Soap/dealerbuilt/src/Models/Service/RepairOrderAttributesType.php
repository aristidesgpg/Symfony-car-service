<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing RepairOrderAttributesType
 *
 * 
 * XSD Type: RepairOrderAttributes
 */
class RepairOrderAttributesType extends RecordAttributesType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $balanceDue
     */
    private $balanceDue = null;

    /**
     * @var \DateTime $closedStamp
     */
    private $closedStamp = null;

    /**
     * @var string $color
     */
    private $color = null;

    /**
     * @var \DateTime $completedDate
     */
    private $completedDate = null;

    /**
     * @var \DateTime $completionEstimatedStamp
     */
    private $completionEstimatedStamp = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $customerAmount
     */
    private $customerAmount = null;

    /**
     * @var bool $customerAppointmentFlag
     */
    private $customerAppointmentFlag = null;

    /**
     * @var string $customerAppointmentNumber
     */
    private $customerAppointmentNumber = null;

    /**
     * @var \DateTime $customerClosedDate
     */
    private $customerClosedDate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $customerLaborDiscount
     */
    private $customerLaborDiscount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $customerPartsDiscount
     */
    private $customerPartsDiscount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\RepairOrderPayTypeBreakdownType $customerPay
     */
    private $customerPay = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $customerSubletDiscount
     */
    private $customerSubletDiscount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $defaultCustomerPayRate
     */
    private $defaultCustomerPayRate = null;

    /**
     * @var \DateTime $deliveredDate
     */
    private $deliveredDate = null;

    /**
     * @var string $departmentType
     */
    private $departmentType = null;

    /**
     * @var string $documentID
     */
    private $documentID = null;

    /**
     * @var string $driverPartyFamilyName
     */
    private $driverPartyFamilyName = null;

    /**
     * @var string $driverPartyGivenName
     */
    private $driverPartyGivenName = null;

    /**
     * @var string $driverPartyMiddleName
     */
    private $driverPartyMiddleName = null;

    /**
     * @var string $hat
     */
    private $hat = null;

    /**
     * @var int $inDistanceMeasure
     */
    private $inDistanceMeasure = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $internalAmount
     */
    private $internalAmount = null;

    /**
     * @var \DateTime $internalClosedDate
     */
    private $internalClosedDate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $internalCustomerCopay
     */
    private $internalCustomerCopay = null;

    /**
     * @var string $internalNotes
     */
    private $internalNotes = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\RepairOrderPayTypeBreakdownType $internalPay
     */
    private $internalPay = null;

    /**
     * @var bool $isWaiter
     */
    private $isWaiter = null;

    /**
     * @var bool $isWholesale
     */
    private $isWholesale = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\RepairOrderJobType[] $jobs
     */
    private $jobs = null;

    /**
     * @var int $milesIn
     */
    private $milesIn = null;

    /**
     * @var int $milesOut
     */
    private $milesOut = null;

    /**
     * @var string $notes
     */
    private $notes = null;

    /**
     * @var \DateTime $notifyDate
     */
    private $notifyDate = null;

    /**
     * @var \DateTime $openedStamp
     */
    private $openedStamp = null;

    /**
     * @var string $orderInternalNotes
     */
    private $orderInternalNotes = null;

    /**
     * @var string $orderNotes
     */
    private $orderNotes = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $originalEstimate
     */
    private $originalEstimate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Accounting\PayTypeStatusType[] $payTypeStatuses
     */
    private $payTypeStatuses = null;

    /**
     * @var string $payerType
     */
    private $payerType = null;

    /**
     * @var int $priority
     */
    private $priority = null;

    /**
     * @var \DateTime $promisedRepairCompletionDate
     */
    private $promisedRepairCompletionDate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\RentalVehicleType[] $rentalVehicles
     */
    private $rentalVehicles = null;

    /**
     * @var string $repairOrderNumber
     */
    private $repairOrderNumber = null;

    /**
     * @var \DateTime $repairOrderOpenedDate
     */
    private $repairOrderOpenedDate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType $serviceAdvisor
     */
    private $serviceAdvisor = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $serviceContractAmount
     */
    private $serviceContractAmount = null;

    /**
     * @var \DateTime $serviceContractClosedDate
     */
    private $serviceContractClosedDate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $serviceContractCustomerCopay
     */
    private $serviceContractCustomerCopay = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\RepairOrderPayTypeBreakdownType $serviceContractPay
     */
    private $serviceContractPay = null;

    /**
     * @var string $serviceLeadID
     */
    private $serviceLeadID = null;

    /**
     * @var string $specialRemarksDescription
     */
    private $specialRemarksDescription = null;

    /**
     * @var string $status
     */
    private $status = null;

    /**
     * @var bool $stopEmail
     */
    private $stopEmail = null;

    /**
     * @var bool $stopText
     */
    private $stopText = null;

    /**
     * @var string $taxDescription
     */
    private $taxDescription = null;

    /**
     * @var bool $taxExempt
     */
    private $taxExempt = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalAmount
     */
    private $totalAmount = null;

    /**
     * @var string $type
     */
    private $type = null;

    /**
     * @var string $warrClaimType
     */
    private $warrClaimType = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $warrantyAmount
     */
    private $warrantyAmount = null;

    /**
     * @var \DateTime $warrantyClosedDate
     */
    private $warrantyClosedDate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $warrantyCustomerCopay
     */
    private $warrantyCustomerCopay = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\RepairOrderPayTypeBreakdownType $warrantyPay
     */
    private $warrantyPay = null;

    /**
     * @var \DateTime $warrantyPostedStamp
     */
    private $warrantyPostedStamp = null;

    /**
     * Gets as balanceDue
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getBalanceDue()
    {
        return $this->balanceDue;
    }

    /**
     * Sets a new balanceDue
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $balanceDue
     * @return self
     */
    public function setBalanceDue(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $balanceDue)
    {
        $this->balanceDue = $balanceDue;
        return $this;
    }

    /**
     * Gets as closedStamp
     *
     * @return \DateTime
     */
    public function getClosedStamp()
    {
        return $this->closedStamp;
    }

    /**
     * Sets a new closedStamp
     *
     * @param \DateTime $closedStamp
     * @return self
     */
    public function setClosedStamp(\DateTime $closedStamp = null)
    {
        $this->closedStamp = $closedStamp;
        return $this;
    }

    /**
     * Gets as color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Sets a new color
     *
     * @param string $color
     * @return self
     */
    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

    /**
     * Gets as completedDate
     *
     * @return \DateTime
     */
    public function getCompletedDate()
    {
        return $this->completedDate;
    }

    /**
     * Sets a new completedDate
     *
     * @param \DateTime $completedDate
     * @return self
     */
    public function setCompletedDate(\DateTime $completedDate = null)
    {
        $this->completedDate = $completedDate;
        return $this;
    }

    /**
     * Gets as completionEstimatedStamp
     *
     * @return \DateTime
     */
    public function getCompletionEstimatedStamp()
    {
        return $this->completionEstimatedStamp;
    }

    /**
     * Sets a new completionEstimatedStamp
     *
     * @param \DateTime $completionEstimatedStamp
     * @return self
     */
    public function setCompletionEstimatedStamp(\DateTime $completionEstimatedStamp = null)
    {
        $this->completionEstimatedStamp = $completionEstimatedStamp;
        return $this;
    }

    /**
     * Gets as customerAmount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCustomerAmount()
    {
        return $this->customerAmount;
    }

    /**
     * Sets a new customerAmount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $customerAmount
     * @return self
     */
    public function setCustomerAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $customerAmount)
    {
        $this->customerAmount = $customerAmount;
        return $this;
    }

    /**
     * Gets as customerAppointmentFlag
     *
     * @return bool
     */
    public function getCustomerAppointmentFlag()
    {
        return $this->customerAppointmentFlag;
    }

    /**
     * Sets a new customerAppointmentFlag
     *
     * @param bool $customerAppointmentFlag
     * @return self
     */
    public function setCustomerAppointmentFlag($customerAppointmentFlag)
    {
        $this->customerAppointmentFlag = $customerAppointmentFlag;
        return $this;
    }

    /**
     * Gets as customerAppointmentNumber
     *
     * @return string
     */
    public function getCustomerAppointmentNumber()
    {
        return $this->customerAppointmentNumber;
    }

    /**
     * Sets a new customerAppointmentNumber
     *
     * @param string $customerAppointmentNumber
     * @return self
     */
    public function setCustomerAppointmentNumber($customerAppointmentNumber)
    {
        $this->customerAppointmentNumber = $customerAppointmentNumber;
        return $this;
    }

    /**
     * Gets as customerClosedDate
     *
     * @return \DateTime
     */
    public function getCustomerClosedDate()
    {
        return $this->customerClosedDate;
    }

    /**
     * Sets a new customerClosedDate
     *
     * @param \DateTime $customerClosedDate
     * @return self
     */
    public function setCustomerClosedDate(\DateTime $customerClosedDate = null)
    {
        $this->customerClosedDate = $customerClosedDate;
        return $this;
    }

    /**
     * Gets as customerLaborDiscount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCustomerLaborDiscount()
    {
        return $this->customerLaborDiscount;
    }

    /**
     * Sets a new customerLaborDiscount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $customerLaborDiscount
     * @return self
     */
    public function setCustomerLaborDiscount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $customerLaborDiscount)
    {
        $this->customerLaborDiscount = $customerLaborDiscount;
        return $this;
    }

    /**
     * Gets as customerPartsDiscount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCustomerPartsDiscount()
    {
        return $this->customerPartsDiscount;
    }

    /**
     * Sets a new customerPartsDiscount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $customerPartsDiscount
     * @return self
     */
    public function setCustomerPartsDiscount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $customerPartsDiscount)
    {
        $this->customerPartsDiscount = $customerPartsDiscount;
        return $this;
    }

    /**
     * Gets as customerPay
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\RepairOrderPayTypeBreakdownType
     */
    public function getCustomerPay()
    {
        return $this->customerPay;
    }

    /**
     * Sets a new customerPay
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\RepairOrderPayTypeBreakdownType $customerPay
     * @return self
     */
    public function setCustomerPay(\App\Soap\dealerbuilt\src\Models\Service\RepairOrderPayTypeBreakdownType $customerPay)
    {
        $this->customerPay = $customerPay;
        return $this;
    }

    /**
     * Gets as customerSubletDiscount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCustomerSubletDiscount()
    {
        return $this->customerSubletDiscount;
    }

    /**
     * Sets a new customerSubletDiscount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $customerSubletDiscount
     * @return self
     */
    public function setCustomerSubletDiscount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $customerSubletDiscount)
    {
        $this->customerSubletDiscount = $customerSubletDiscount;
        return $this;
    }

    /**
     * Gets as defaultCustomerPayRate
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getDefaultCustomerPayRate()
    {
        return $this->defaultCustomerPayRate;
    }

    /**
     * Sets a new defaultCustomerPayRate
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $defaultCustomerPayRate
     * @return self
     */
    public function setDefaultCustomerPayRate(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $defaultCustomerPayRate)
    {
        $this->defaultCustomerPayRate = $defaultCustomerPayRate;
        return $this;
    }

    /**
     * Gets as deliveredDate
     *
     * @return \DateTime
     */
    public function getDeliveredDate()
    {
        return $this->deliveredDate;
    }

    /**
     * Sets a new deliveredDate
     *
     * @param \DateTime $deliveredDate
     * @return self
     */
    public function setDeliveredDate(\DateTime $deliveredDate = null)
    {
        $this->deliveredDate = $deliveredDate;
        return $this;
    }

    /**
     * Gets as departmentType
     *
     * @return string
     */
    public function getDepartmentType()
    {
        return $this->departmentType;
    }

    /**
     * Sets a new departmentType
     *
     * @param string $departmentType
     * @return self
     */
    public function setDepartmentType($departmentType)
    {
        $this->departmentType = $departmentType;
        return $this;
    }

    /**
     * Gets as documentID
     *
     * @return string
     */
    public function getDocumentID()
    {
        return $this->documentID;
    }

    /**
     * Sets a new documentID
     *
     * @param string $documentID
     * @return self
     */
    public function setDocumentID($documentID)
    {
        $this->documentID = $documentID;
        return $this;
    }

    /**
     * Gets as driverPartyFamilyName
     *
     * @return string
     */
    public function getDriverPartyFamilyName()
    {
        return $this->driverPartyFamilyName;
    }

    /**
     * Sets a new driverPartyFamilyName
     *
     * @param string $driverPartyFamilyName
     * @return self
     */
    public function setDriverPartyFamilyName($driverPartyFamilyName)
    {
        $this->driverPartyFamilyName = $driverPartyFamilyName;
        return $this;
    }

    /**
     * Gets as driverPartyGivenName
     *
     * @return string
     */
    public function getDriverPartyGivenName()
    {
        return $this->driverPartyGivenName;
    }

    /**
     * Sets a new driverPartyGivenName
     *
     * @param string $driverPartyGivenName
     * @return self
     */
    public function setDriverPartyGivenName($driverPartyGivenName)
    {
        $this->driverPartyGivenName = $driverPartyGivenName;
        return $this;
    }

    /**
     * Gets as driverPartyMiddleName
     *
     * @return string
     */
    public function getDriverPartyMiddleName()
    {
        return $this->driverPartyMiddleName;
    }

    /**
     * Sets a new driverPartyMiddleName
     *
     * @param string $driverPartyMiddleName
     * @return self
     */
    public function setDriverPartyMiddleName($driverPartyMiddleName)
    {
        $this->driverPartyMiddleName = $driverPartyMiddleName;
        return $this;
    }

    /**
     * Gets as hat
     *
     * @return string
     */
    public function getHat()
    {
        return $this->hat;
    }

    /**
     * Sets a new hat
     *
     * @param string $hat
     * @return self
     */
    public function setHat($hat)
    {
        $this->hat = $hat;
        return $this;
    }

    /**
     * Gets as inDistanceMeasure
     *
     * @return int
     */
    public function getInDistanceMeasure()
    {
        return $this->inDistanceMeasure;
    }

    /**
     * Sets a new inDistanceMeasure
     *
     * @param int $inDistanceMeasure
     * @return self
     */
    public function setInDistanceMeasure($inDistanceMeasure)
    {
        $this->inDistanceMeasure = $inDistanceMeasure;
        return $this;
    }

    /**
     * Gets as internalAmount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getInternalAmount()
    {
        return $this->internalAmount;
    }

    /**
     * Sets a new internalAmount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $internalAmount
     * @return self
     */
    public function setInternalAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $internalAmount)
    {
        $this->internalAmount = $internalAmount;
        return $this;
    }

    /**
     * Gets as internalClosedDate
     *
     * @return \DateTime
     */
    public function getInternalClosedDate()
    {
        return $this->internalClosedDate;
    }

    /**
     * Sets a new internalClosedDate
     *
     * @param \DateTime $internalClosedDate
     * @return self
     */
    public function setInternalClosedDate(\DateTime $internalClosedDate = null)
    {
        $this->internalClosedDate = $internalClosedDate;
        return $this;
    }

    /**
     * Gets as internalCustomerCopay
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getInternalCustomerCopay()
    {
        return $this->internalCustomerCopay;
    }

    /**
     * Sets a new internalCustomerCopay
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $internalCustomerCopay
     * @return self
     */
    public function setInternalCustomerCopay(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $internalCustomerCopay)
    {
        $this->internalCustomerCopay = $internalCustomerCopay;
        return $this;
    }

    /**
     * Gets as internalNotes
     *
     * @return string
     */
    public function getInternalNotes()
    {
        return $this->internalNotes;
    }

    /**
     * Sets a new internalNotes
     *
     * @param string $internalNotes
     * @return self
     */
    public function setInternalNotes($internalNotes)
    {
        $this->internalNotes = $internalNotes;
        return $this;
    }

    /**
     * Gets as internalPay
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\RepairOrderPayTypeBreakdownType
     */
    public function getInternalPay()
    {
        return $this->internalPay;
    }

    /**
     * Sets a new internalPay
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\RepairOrderPayTypeBreakdownType $internalPay
     * @return self
     */
    public function setInternalPay(\App\Soap\dealerbuilt\src\Models\Service\RepairOrderPayTypeBreakdownType $internalPay)
    {
        $this->internalPay = $internalPay;
        return $this;
    }

    /**
     * Gets as isWaiter
     *
     * @return bool
     */
    public function getIsWaiter()
    {
        return $this->isWaiter;
    }

    /**
     * Sets a new isWaiter
     *
     * @param bool $isWaiter
     * @return self
     */
    public function setIsWaiter($isWaiter)
    {
        $this->isWaiter = $isWaiter;
        return $this;
    }

    /**
     * Gets as isWholesale
     *
     * @return bool
     */
    public function getIsWholesale()
    {
        return $this->isWholesale;
    }

    /**
     * Sets a new isWholesale
     *
     * @param bool $isWholesale
     * @return self
     */
    public function setIsWholesale($isWholesale)
    {
        $this->isWholesale = $isWholesale;
        return $this;
    }

    /**
     * Adds as repairOrderJob
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Service\RepairOrderJobType $repairOrderJob
     */
    public function addToJobs(\App\Soap\dealerbuilt\src\Models\Service\RepairOrderJobType $repairOrderJob)
    {
        $this->jobs[] = $repairOrderJob;
        return $this;
    }

    /**
     * isset jobs
     *
     * @param int|string $index
     * @return bool
     */
    public function issetJobs($index)
    {
        return isset($this->jobs[$index]);
    }

    /**
     * unset jobs
     *
     * @param int|string $index
     * @return void
     */
    public function unsetJobs($index)
    {
        unset($this->jobs[$index]);
    }

    /**
     * Gets as jobs
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\RepairOrderJobType[]
     */
    public function getJobs()
    {
        return $this->jobs;
    }

    /**
     * Sets a new jobs
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\RepairOrderJobType[] $jobs
     * @return self
     */
    public function setJobs(array $jobs)
    {
        $this->jobs = $jobs;
        return $this;
    }

    /**
     * Gets as milesIn
     *
     * @return int
     */
    public function getMilesIn()
    {
        return $this->milesIn;
    }

    /**
     * Sets a new milesIn
     *
     * @param int $milesIn
     * @return self
     */
    public function setMilesIn($milesIn)
    {
        $this->milesIn = $milesIn;
        return $this;
    }

    /**
     * Gets as milesOut
     *
     * @return int
     */
    public function getMilesOut()
    {
        return $this->milesOut;
    }

    /**
     * Sets a new milesOut
     *
     * @param int $milesOut
     * @return self
     */
    public function setMilesOut($milesOut)
    {
        $this->milesOut = $milesOut;
        return $this;
    }

    /**
     * Gets as notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Sets a new notes
     *
     * @param string $notes
     * @return self
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * Gets as notifyDate
     *
     * @return \DateTime
     */
    public function getNotifyDate()
    {
        return $this->notifyDate;
    }

    /**
     * Sets a new notifyDate
     *
     * @param \DateTime $notifyDate
     * @return self
     */
    public function setNotifyDate(\DateTime $notifyDate = null)
    {
        $this->notifyDate = $notifyDate;
        return $this;
    }

    /**
     * Gets as openedStamp
     *
     * @return \DateTime
     */
    public function getOpenedStamp()
    {
        return $this->openedStamp;
    }

    /**
     * Sets a new openedStamp
     *
     * @param \DateTime $openedStamp
     * @return self
     */
    public function setOpenedStamp(\DateTime $openedStamp = null)
    {
        $this->openedStamp = $openedStamp;
        return $this;
    }

    /**
     * Gets as orderInternalNotes
     *
     * @return string
     */
    public function getOrderInternalNotes()
    {
        return $this->orderInternalNotes;
    }

    /**
     * Sets a new orderInternalNotes
     *
     * @param string $orderInternalNotes
     * @return self
     */
    public function setOrderInternalNotes($orderInternalNotes)
    {
        $this->orderInternalNotes = $orderInternalNotes;
        return $this;
    }

    /**
     * Gets as orderNotes
     *
     * @return string
     */
    public function getOrderNotes()
    {
        return $this->orderNotes;
    }

    /**
     * Sets a new orderNotes
     *
     * @param string $orderNotes
     * @return self
     */
    public function setOrderNotes($orderNotes)
    {
        $this->orderNotes = $orderNotes;
        return $this;
    }

    /**
     * Gets as originalEstimate
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getOriginalEstimate()
    {
        return $this->originalEstimate;
    }

    /**
     * Sets a new originalEstimate
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $originalEstimate
     * @return self
     */
    public function setOriginalEstimate(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $originalEstimate)
    {
        $this->originalEstimate = $originalEstimate;
        return $this;
    }

    /**
     * Adds as payTypeStatus
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Accounting\PayTypeStatusType $payTypeStatus
     */
    public function addToPayTypeStatuses(\App\Soap\dealerbuilt\src\Models\Accounting\PayTypeStatusType $payTypeStatus)
    {
        $this->payTypeStatuses[] = $payTypeStatus;
        return $this;
    }

    /**
     * isset payTypeStatuses
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPayTypeStatuses($index)
    {
        return isset($this->payTypeStatuses[$index]);
    }

    /**
     * unset payTypeStatuses
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPayTypeStatuses($index)
    {
        unset($this->payTypeStatuses[$index]);
    }

    /**
     * Gets as payTypeStatuses
     *
     * @return \App\Soap\dealerbuilt\src\Models\Accounting\PayTypeStatusType[]
     */
    public function getPayTypeStatuses()
    {
        return $this->payTypeStatuses;
    }

    /**
     * Sets a new payTypeStatuses
     *
     * @param \App\Soap\dealerbuilt\src\Models\Accounting\PayTypeStatusType[] $payTypeStatuses
     * @return self
     */
    public function setPayTypeStatuses(array $payTypeStatuses)
    {
        $this->payTypeStatuses = $payTypeStatuses;
        return $this;
    }

    /**
     * Gets as payerType
     *
     * @return string
     */
    public function getPayerType()
    {
        return $this->payerType;
    }

    /**
     * Sets a new payerType
     *
     * @param string $payerType
     * @return self
     */
    public function setPayerType($payerType)
    {
        $this->payerType = $payerType;
        return $this;
    }

    /**
     * Gets as priority
     *
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Sets a new priority
     *
     * @param int $priority
     * @return self
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * Gets as promisedRepairCompletionDate
     *
     * @return \DateTime
     */
    public function getPromisedRepairCompletionDate()
    {
        return $this->promisedRepairCompletionDate;
    }

    /**
     * Sets a new promisedRepairCompletionDate
     *
     * @param \DateTime $promisedRepairCompletionDate
     * @return self
     */
    public function setPromisedRepairCompletionDate(\DateTime $promisedRepairCompletionDate = null)
    {
        $this->promisedRepairCompletionDate = $promisedRepairCompletionDate;
        return $this;
    }

    /**
     * Adds as rentalVehicle
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Service\RentalVehicleType $rentalVehicle
     */
    public function addToRentalVehicles(\App\Soap\dealerbuilt\src\Models\Service\RentalVehicleType $rentalVehicle)
    {
        $this->rentalVehicles[] = $rentalVehicle;
        return $this;
    }

    /**
     * isset rentalVehicles
     *
     * @param int|string $index
     * @return bool
     */
    public function issetRentalVehicles($index)
    {
        return isset($this->rentalVehicles[$index]);
    }

    /**
     * unset rentalVehicles
     *
     * @param int|string $index
     * @return void
     */
    public function unsetRentalVehicles($index)
    {
        unset($this->rentalVehicles[$index]);
    }

    /**
     * Gets as rentalVehicles
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\RentalVehicleType[]
     */
    public function getRentalVehicles()
    {
        return $this->rentalVehicles;
    }

    /**
     * Sets a new rentalVehicles
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\RentalVehicleType[] $rentalVehicles
     * @return self
     */
    public function setRentalVehicles(array $rentalVehicles)
    {
        $this->rentalVehicles = $rentalVehicles;
        return $this;
    }

    /**
     * Gets as repairOrderNumber
     *
     * @return string
     */
    public function getRepairOrderNumber()
    {
        return $this->repairOrderNumber;
    }

    /**
     * Sets a new repairOrderNumber
     *
     * @param string $repairOrderNumber
     * @return self
     */
    public function setRepairOrderNumber($repairOrderNumber)
    {
        $this->repairOrderNumber = $repairOrderNumber;
        return $this;
    }

    /**
     * Gets as repairOrderOpenedDate
     *
     * @return \DateTime
     */
    public function getRepairOrderOpenedDate()
    {
        return $this->repairOrderOpenedDate;
    }

    /**
     * Sets a new repairOrderOpenedDate
     *
     * @param \DateTime $repairOrderOpenedDate
     * @return self
     */
    public function setRepairOrderOpenedDate(\DateTime $repairOrderOpenedDate = null)
    {
        $this->repairOrderOpenedDate = $repairOrderOpenedDate;
        return $this;
    }

    /**
     * Gets as serviceAdvisor
     *
     * @return \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType
     */
    public function getServiceAdvisor()
    {
        return $this->serviceAdvisor;
    }

    /**
     * Sets a new serviceAdvisor
     *
     * @param \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType $serviceAdvisor
     * @return self
     */
    public function setServiceAdvisor(\App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType $serviceAdvisor)
    {
        $this->serviceAdvisor = $serviceAdvisor;
        return $this;
    }

    /**
     * Gets as serviceContractAmount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getServiceContractAmount()
    {
        return $this->serviceContractAmount;
    }

    /**
     * Sets a new serviceContractAmount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $serviceContractAmount
     * @return self
     */
    public function setServiceContractAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $serviceContractAmount)
    {
        $this->serviceContractAmount = $serviceContractAmount;
        return $this;
    }

    /**
     * Gets as serviceContractClosedDate
     *
     * @return \DateTime
     */
    public function getServiceContractClosedDate()
    {
        return $this->serviceContractClosedDate;
    }

    /**
     * Sets a new serviceContractClosedDate
     *
     * @param \DateTime $serviceContractClosedDate
     * @return self
     */
    public function setServiceContractClosedDate(\DateTime $serviceContractClosedDate = null)
    {
        $this->serviceContractClosedDate = $serviceContractClosedDate;
        return $this;
    }

    /**
     * Gets as serviceContractCustomerCopay
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getServiceContractCustomerCopay()
    {
        return $this->serviceContractCustomerCopay;
    }

    /**
     * Sets a new serviceContractCustomerCopay
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $serviceContractCustomerCopay
     * @return self
     */
    public function setServiceContractCustomerCopay(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $serviceContractCustomerCopay)
    {
        $this->serviceContractCustomerCopay = $serviceContractCustomerCopay;
        return $this;
    }

    /**
     * Gets as serviceContractPay
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\RepairOrderPayTypeBreakdownType
     */
    public function getServiceContractPay()
    {
        return $this->serviceContractPay;
    }

    /**
     * Sets a new serviceContractPay
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\RepairOrderPayTypeBreakdownType $serviceContractPay
     * @return self
     */
    public function setServiceContractPay(\App\Soap\dealerbuilt\src\Models\Service\RepairOrderPayTypeBreakdownType $serviceContractPay)
    {
        $this->serviceContractPay = $serviceContractPay;
        return $this;
    }

    /**
     * Gets as serviceLeadID
     *
     * @return string
     */
    public function getServiceLeadID()
    {
        return $this->serviceLeadID;
    }

    /**
     * Sets a new serviceLeadID
     *
     * @param string $serviceLeadID
     * @return self
     */
    public function setServiceLeadID($serviceLeadID)
    {
        $this->serviceLeadID = $serviceLeadID;
        return $this;
    }

    /**
     * Gets as specialRemarksDescription
     *
     * @return string
     */
    public function getSpecialRemarksDescription()
    {
        return $this->specialRemarksDescription;
    }

    /**
     * Sets a new specialRemarksDescription
     *
     * @param string $specialRemarksDescription
     * @return self
     */
    public function setSpecialRemarksDescription($specialRemarksDescription)
    {
        $this->specialRemarksDescription = $specialRemarksDescription;
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
     * Gets as stopEmail
     *
     * @return bool
     */
    public function getStopEmail()
    {
        return $this->stopEmail;
    }

    /**
     * Sets a new stopEmail
     *
     * @param bool $stopEmail
     * @return self
     */
    public function setStopEmail($stopEmail)
    {
        $this->stopEmail = $stopEmail;
        return $this;
    }

    /**
     * Gets as stopText
     *
     * @return bool
     */
    public function getStopText()
    {
        return $this->stopText;
    }

    /**
     * Sets a new stopText
     *
     * @param bool $stopText
     * @return self
     */
    public function setStopText($stopText)
    {
        $this->stopText = $stopText;
        return $this;
    }

    /**
     * Gets as taxDescription
     *
     * @return string
     */
    public function getTaxDescription()
    {
        return $this->taxDescription;
    }

    /**
     * Sets a new taxDescription
     *
     * @param string $taxDescription
     * @return self
     */
    public function setTaxDescription($taxDescription)
    {
        $this->taxDescription = $taxDescription;
        return $this;
    }

    /**
     * Gets as taxExempt
     *
     * @return bool
     */
    public function getTaxExempt()
    {
        return $this->taxExempt;
    }

    /**
     * Sets a new taxExempt
     *
     * @param bool $taxExempt
     * @return self
     */
    public function setTaxExempt($taxExempt)
    {
        $this->taxExempt = $taxExempt;
        return $this;
    }

    /**
     * Gets as totalAmount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * Sets a new totalAmount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalAmount
     * @return self
     */
    public function setTotalAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalAmount)
    {
        $this->totalAmount = $totalAmount;
        return $this;
    }

    /**
     * Gets as type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets a new type
     *
     * @param string $type
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Gets as warrClaimType
     *
     * @return string
     */
    public function getWarrClaimType()
    {
        return $this->warrClaimType;
    }

    /**
     * Sets a new warrClaimType
     *
     * @param string $warrClaimType
     * @return self
     */
    public function setWarrClaimType($warrClaimType)
    {
        $this->warrClaimType = $warrClaimType;
        return $this;
    }

    /**
     * Gets as warrantyAmount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getWarrantyAmount()
    {
        return $this->warrantyAmount;
    }

    /**
     * Sets a new warrantyAmount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $warrantyAmount
     * @return self
     */
    public function setWarrantyAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $warrantyAmount)
    {
        $this->warrantyAmount = $warrantyAmount;
        return $this;
    }

    /**
     * Gets as warrantyClosedDate
     *
     * @return \DateTime
     */
    public function getWarrantyClosedDate()
    {
        return $this->warrantyClosedDate;
    }

    /**
     * Sets a new warrantyClosedDate
     *
     * @param \DateTime $warrantyClosedDate
     * @return self
     */
    public function setWarrantyClosedDate(\DateTime $warrantyClosedDate = null)
    {
        $this->warrantyClosedDate = $warrantyClosedDate;
        return $this;
    }

    /**
     * Gets as warrantyCustomerCopay
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getWarrantyCustomerCopay()
    {
        return $this->warrantyCustomerCopay;
    }

    /**
     * Sets a new warrantyCustomerCopay
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $warrantyCustomerCopay
     * @return self
     */
    public function setWarrantyCustomerCopay(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $warrantyCustomerCopay)
    {
        $this->warrantyCustomerCopay = $warrantyCustomerCopay;
        return $this;
    }

    /**
     * Gets as warrantyPay
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\RepairOrderPayTypeBreakdownType
     */
    public function getWarrantyPay()
    {
        return $this->warrantyPay;
    }

    /**
     * Sets a new warrantyPay
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\RepairOrderPayTypeBreakdownType $warrantyPay
     * @return self
     */
    public function setWarrantyPay(\App\Soap\dealerbuilt\src\Models\Service\RepairOrderPayTypeBreakdownType $warrantyPay)
    {
        $this->warrantyPay = $warrantyPay;
        return $this;
    }

    /**
     * Gets as warrantyPostedStamp
     *
     * @return \DateTime
     */
    public function getWarrantyPostedStamp()
    {
        return $this->warrantyPostedStamp;
    }

    /**
     * Sets a new warrantyPostedStamp
     *
     * @param \DateTime $warrantyPostedStamp
     * @return self
     */
    public function setWarrantyPostedStamp(\DateTime $warrantyPostedStamp = null)
    {
        $this->warrantyPostedStamp = $warrantyPostedStamp;
        return $this;
    }


}


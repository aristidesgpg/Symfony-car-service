<?php

namespace App\Soap\automate\src;

/**
 * Class representing RepairOrderHeader
 */
class RepairOrderHeader
{

    /**
     * @var string $documentDateTime
     */
    private $documentDateTime = null;

    /**
     * @var \App\Soap\automate\src\DocumentIdentificationGroup $documentIdentificationGroup
     */
    private $documentIdentificationGroup = null;

    /**
     * @var \App\Soap\automate\src\DealerParty $dealerParty
     */
    private $dealerParty = null;

    /**
     * @var \App\Soap\automate\src\OwnerParty $ownerParty
     */
    private $ownerParty = null;

    /**
     * @var \App\Soap\automate\src\RepairOrderVehicleLineItem $repairOrderVehicleLineItem
     */
    private $repairOrderVehicleLineItem = null;

    /**
     * @var string $repairOrderOpenedDate
     */
    private $repairOrderOpenedDate = null;

    /**
     * @var string $repairOrderCompletedDate
     */
    private $repairOrderCompletedDate = null;

    /**
     * @var string $repairOrderInvoiceDate
     */
    private $repairOrderInvoiceDate = null;

    /**
     * @var \App\Soap\automate\src\ServiceAdvisorParty $serviceAdvisorParty
     */
    private $serviceAdvisorParty = null;

    /**
     * @var \App\Soap\automate\src\InDistanceMeasure $inDistanceMeasure
     */
    private $inDistanceMeasure = null;

    /**
     * @var \App\Soap\automate\src\RepairOrderStatus[] $repairOrderStatus
     */
    private $repairOrderStatus = [
        
    ];

    /**
     * @var string $promisedRepairCompletionDate
     */
    private $promisedRepairCompletionDate = null;

    /**
     * @var string $repairOrderPriorityCode
     */
    private $repairOrderPriorityCode = null;

    /**
     * @var \App\Soap\automate\src\DocumentIdentification $documentIdentification
     */
    private $documentIdentification = null;

    /**
     * Gets as documentDateTime
     *
     * @return string
     */
    public function getDocumentDateTime()
    {
        return $this->documentDateTime;
    }

    /**
     * Sets a new documentDateTime
     *
     * @param string $documentDateTime
     * @return self
     */
    public function setDocumentDateTime($documentDateTime)
    {
        $this->documentDateTime = $documentDateTime;
        return $this;
    }

    /**
     * Gets as documentIdentificationGroup
     *
     * @return \App\Soap\automate\src\DocumentIdentificationGroup
     */
    public function getDocumentIdentificationGroup()
    {
        return $this->documentIdentificationGroup;
    }

    /**
     * Sets a new documentIdentificationGroup
     *
     * @param \App\Soap\automate\src\DocumentIdentificationGroup $documentIdentificationGroup
     * @return self
     */
    public function setDocumentIdentificationGroup(\App\Soap\automate\src\DocumentIdentificationGroup $documentIdentificationGroup)
    {
        $this->documentIdentificationGroup = $documentIdentificationGroup;
        return $this;
    }

    /**
     * Gets as dealerParty
     *
     * @return \App\Soap\automate\src\DealerParty
     */
    public function getDealerParty()
    {
        return $this->dealerParty;
    }

    /**
     * Sets a new dealerParty
     *
     * @param \App\Soap\automate\src\DealerParty $dealerParty
     * @return self
     */
    public function setDealerParty(\App\Soap\automate\src\DealerParty $dealerParty)
    {
        $this->dealerParty = $dealerParty;
        return $this;
    }

    /**
     * Gets as ownerParty
     *
     * @return \App\Soap\automate\src\OwnerParty
     */
    public function getOwnerParty()
    {
        return $this->ownerParty;
    }

    /**
     * Sets a new ownerParty
     *
     * @param \App\Soap\automate\src\OwnerParty $ownerParty
     * @return self
     */
    public function setOwnerParty(\App\Soap\automate\src\OwnerParty $ownerParty)
    {
        $this->ownerParty = $ownerParty;
        return $this;
    }

    /**
     * Gets as repairOrderVehicleLineItem
     *
     * @return \App\Soap\automate\src\RepairOrderVehicleLineItem
     */
    public function getRepairOrderVehicleLineItem()
    {
        return $this->repairOrderVehicleLineItem;
    }

    /**
     * Sets a new repairOrderVehicleLineItem
     *
     * @param \App\Soap\automate\src\RepairOrderVehicleLineItem $repairOrderVehicleLineItem
     * @return self
     */
    public function setRepairOrderVehicleLineItem(\App\Soap\automate\src\RepairOrderVehicleLineItem $repairOrderVehicleLineItem)
    {
        $this->repairOrderVehicleLineItem = $repairOrderVehicleLineItem;
        return $this;
    }

    /**
     * Gets as repairOrderOpenedDate
     *
     * @return string
     */
    public function getRepairOrderOpenedDate()
    {
        return $this->repairOrderOpenedDate;
    }

    /**
     * Sets a new repairOrderOpenedDate
     *
     * @param string $repairOrderOpenedDate
     * @return self
     */
    public function setRepairOrderOpenedDate($repairOrderOpenedDate)
    {
        $this->repairOrderOpenedDate = $repairOrderOpenedDate;
        return $this;
    }

    /**
     * Gets as repairOrderCompletedDate
     *
     * @return string
     */
    public function getRepairOrderCompletedDate()
    {
        return $this->repairOrderCompletedDate;
    }

    /**
     * Sets a new repairOrderCompletedDate
     *
     * @param string $repairOrderCompletedDate
     * @return self
     */
    public function setRepairOrderCompletedDate($repairOrderCompletedDate)
    {
        $this->repairOrderCompletedDate = $repairOrderCompletedDate;
        return $this;
    }

    /**
     * Gets as repairOrderInvoiceDate
     *
     * @return string
     */
    public function getRepairOrderInvoiceDate()
    {
        return $this->repairOrderInvoiceDate;
    }

    /**
     * Sets a new repairOrderInvoiceDate
     *
     * @param string $repairOrderInvoiceDate
     * @return self
     */
    public function setRepairOrderInvoiceDate($repairOrderInvoiceDate)
    {
        $this->repairOrderInvoiceDate = $repairOrderInvoiceDate;
        return $this;
    }

    /**
     * Gets as serviceAdvisorParty
     *
     * @return \App\Soap\automate\src\ServiceAdvisorParty
     */
    public function getServiceAdvisorParty()
    {
        return $this->serviceAdvisorParty;
    }

    /**
     * Sets a new serviceAdvisorParty
     *
     * @param \App\Soap\automate\src\ServiceAdvisorParty $serviceAdvisorParty
     * @return self
     */
    public function setServiceAdvisorParty(\App\Soap\automate\src\ServiceAdvisorParty $serviceAdvisorParty)
    {
        $this->serviceAdvisorParty = $serviceAdvisorParty;
        return $this;
    }

    /**
     * Gets as inDistanceMeasure
     *
     * @return \App\Soap\automate\src\InDistanceMeasure
     */
    public function getInDistanceMeasure()
    {
        return $this->inDistanceMeasure;
    }

    /**
     * Sets a new inDistanceMeasure
     *
     * @param \App\Soap\automate\src\InDistanceMeasure $inDistanceMeasure
     * @return self
     */
    public function setInDistanceMeasure(\App\Soap\automate\src\InDistanceMeasure $inDistanceMeasure)
    {
        $this->inDistanceMeasure = $inDistanceMeasure;
        return $this;
    }

    /**
     * Adds as repairOrderStatus
     *
     * @return self
     * @param \App\Soap\automate\src\RepairOrderStatus $repairOrderStatus
     */
    public function addToRepairOrderStatus(\App\Soap\automate\src\RepairOrderStatus $repairOrderStatus)
    {
        $this->repairOrderStatus[] = $repairOrderStatus;
        return $this;
    }

    /**
     * isset repairOrderStatus
     *
     * @param int|string $index
     * @return bool
     */
    public function issetRepairOrderStatus($index)
    {
        return isset($this->repairOrderStatus[$index]);
    }

    /**
     * unset repairOrderStatus
     *
     * @param int|string $index
     * @return void
     */
    public function unsetRepairOrderStatus($index)
    {
        unset($this->repairOrderStatus[$index]);
    }

    /**
     * Gets as repairOrderStatus
     *
     * @return \App\Soap\automate\src\RepairOrderStatus[]
     */
    public function getRepairOrderStatus()
    {
        return $this->repairOrderStatus;
    }

    /**
     * Sets a new repairOrderStatus
     *
     * @param \App\Soap\automate\src\RepairOrderStatus[] $repairOrderStatus
     * @return self
     */
    public function setRepairOrderStatus(array $repairOrderStatus)
    {
        $this->repairOrderStatus = $repairOrderStatus;
        return $this;
    }

    /**
     * Gets as promisedRepairCompletionDate
     *
     * @return string
     */
    public function getPromisedRepairCompletionDate()
    {
        return $this->promisedRepairCompletionDate;
    }

    /**
     * Sets a new promisedRepairCompletionDate
     *
     * @param string $promisedRepairCompletionDate
     * @return self
     */
    public function setPromisedRepairCompletionDate($promisedRepairCompletionDate)
    {
        $this->promisedRepairCompletionDate = $promisedRepairCompletionDate;
        return $this;
    }

    /**
     * Gets as repairOrderPriorityCode
     *
     * @return string
     */
    public function getRepairOrderPriorityCode()
    {
        return $this->repairOrderPriorityCode;
    }

    /**
     * Sets a new repairOrderPriorityCode
     *
     * @param string $repairOrderPriorityCode
     * @return self
     */
    public function setRepairOrderPriorityCode($repairOrderPriorityCode)
    {
        $this->repairOrderPriorityCode = $repairOrderPriorityCode;
        return $this;
    }

    /**
     * Gets as documentIdentification
     *
     * @return \App\Soap\automate\src\DocumentIdentification
     */
    public function getDocumentIdentification()
    {
        return $this->documentIdentification;
    }

    /**
     * Sets a new inDistanceMeasure
     *
     * @param \App\Soap\automate\src\DocumentIdentification $documentIdentification
     * @return self
     */
    public function setDocumentIdentification(\App\Soap\automate\src\DocumentIdentification $documentIdentification)
    {
        $this->documentIdentification = $documentIdentification;
        return $this;
    }

}


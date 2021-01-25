<?php

namespace App\Soap\dealerbuilt\src\Models\Accounting;

/**
 * Class representing GlDetailLineType.
 *
 * XSD Type: GlDetailLine
 */
class GlDetailLineType
{
    /**
     * @var \DateTime
     */
    private $accountingDate = null;

    /**
     * @var string
     */
    private $control1Code = null;

    /**
     * @var string
     */
    private $control2Code = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $credits = null;

    /**
     * @var \DateTime
     */
    private $dateReconciledOnBankRecord = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $debits = null;

    /**
     * @var int
     */
    private $division = null;

    /**
     * @var string
     */
    private $glHeaderDescription = null;

    /**
     * @var string
     */
    private $glVouch = null;

    /**
     * @var bool
     */
    private $isClearedBank = null;

    /**
     * @var bool
     */
    private $isReconciled = null;

    /**
     * @var string
     */
    private $journal = null;

    /**
     * @var string
     */
    private $journalDescription = null;

    /**
     * @var string
     */
    private $journalType = null;

    /**
     * @var string
     */
    private $lineDescription = null;

    /**
     * @var int
     */
    private $lineId = null;

    /**
     * @var \DateTime
     */
    private $modifiedStamp = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $monthToDate = null;

    /**
     * @var string
     */
    private $reference = null;

    /**
     * @var int
     */
    private $unitCount = null;

    /**
     * @var string
     */
    private $voidStatus = null;

    /**
     * @var \DateTime
     */
    private $zeroDate = null;

    /**
     * Gets as accountingDate.
     *
     * @return \DateTime
     */
    public function getAccountingDate()
    {
        return $this->accountingDate;
    }

    /**
     * Sets a new accountingDate.
     *
     * @return self
     */
    public function setAccountingDate(\DateTime $accountingDate)
    {
        $this->accountingDate = $accountingDate;

        return $this;
    }

    /**
     * Gets as control1Code.
     *
     * @return string
     */
    public function getControl1Code()
    {
        return $this->control1Code;
    }

    /**
     * Sets a new control1Code.
     *
     * @param string $control1Code
     *
     * @return self
     */
    public function setControl1Code($control1Code)
    {
        $this->control1Code = $control1Code;

        return $this;
    }

    /**
     * Gets as control2Code.
     *
     * @return string
     */
    public function getControl2Code()
    {
        return $this->control2Code;
    }

    /**
     * Sets a new control2Code.
     *
     * @param string $control2Code
     *
     * @return self
     */
    public function setControl2Code($control2Code)
    {
        $this->control2Code = $control2Code;

        return $this;
    }

    /**
     * Gets as credits.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCredits()
    {
        return $this->credits;
    }

    /**
     * Sets a new credits.
     *
     * @return self
     */
    public function setCredits(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $credits)
    {
        $this->credits = $credits;

        return $this;
    }

    /**
     * Gets as dateReconciledOnBankRecord.
     *
     * @return \DateTime
     */
    public function getDateReconciledOnBankRecord()
    {
        return $this->dateReconciledOnBankRecord;
    }

    /**
     * Sets a new dateReconciledOnBankRecord.
     *
     * @return self
     */
    public function setDateReconciledOnBankRecord(\DateTime $dateReconciledOnBankRecord)
    {
        $this->dateReconciledOnBankRecord = $dateReconciledOnBankRecord;

        return $this;
    }

    /**
     * Gets as debits.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getDebits()
    {
        return $this->debits;
    }

    /**
     * Sets a new debits.
     *
     * @return self
     */
    public function setDebits(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $debits)
    {
        $this->debits = $debits;

        return $this;
    }

    /**
     * Gets as division.
     *
     * @return int
     */
    public function getDivision()
    {
        return $this->division;
    }

    /**
     * Sets a new division.
     *
     * @param int $division
     *
     * @return self
     */
    public function setDivision($division)
    {
        $this->division = $division;

        return $this;
    }

    /**
     * Gets as glHeaderDescription.
     *
     * @return string
     */
    public function getGlHeaderDescription()
    {
        return $this->glHeaderDescription;
    }

    /**
     * Sets a new glHeaderDescription.
     *
     * @param string $glHeaderDescription
     *
     * @return self
     */
    public function setGlHeaderDescription($glHeaderDescription)
    {
        $this->glHeaderDescription = $glHeaderDescription;

        return $this;
    }

    /**
     * Gets as glVouch.
     *
     * @return string
     */
    public function getGlVouch()
    {
        return $this->glVouch;
    }

    /**
     * Sets a new glVouch.
     *
     * @param string $glVouch
     *
     * @return self
     */
    public function setGlVouch($glVouch)
    {
        $this->glVouch = $glVouch;

        return $this;
    }

    /**
     * Gets as isClearedBank.
     *
     * @return bool
     */
    public function getIsClearedBank()
    {
        return $this->isClearedBank;
    }

    /**
     * Sets a new isClearedBank.
     *
     * @param bool $isClearedBank
     *
     * @return self
     */
    public function setIsClearedBank($isClearedBank)
    {
        $this->isClearedBank = $isClearedBank;

        return $this;
    }

    /**
     * Gets as isReconciled.
     *
     * @return bool
     */
    public function getIsReconciled()
    {
        return $this->isReconciled;
    }

    /**
     * Sets a new isReconciled.
     *
     * @param bool $isReconciled
     *
     * @return self
     */
    public function setIsReconciled($isReconciled)
    {
        $this->isReconciled = $isReconciled;

        return $this;
    }

    /**
     * Gets as journal.
     *
     * @return string
     */
    public function getJournal()
    {
        return $this->journal;
    }

    /**
     * Sets a new journal.
     *
     * @param string $journal
     *
     * @return self
     */
    public function setJournal($journal)
    {
        $this->journal = $journal;

        return $this;
    }

    /**
     * Gets as journalDescription.
     *
     * @return string
     */
    public function getJournalDescription()
    {
        return $this->journalDescription;
    }

    /**
     * Sets a new journalDescription.
     *
     * @param string $journalDescription
     *
     * @return self
     */
    public function setJournalDescription($journalDescription)
    {
        $this->journalDescription = $journalDescription;

        return $this;
    }

    /**
     * Gets as journalType.
     *
     * @return string
     */
    public function getJournalType()
    {
        return $this->journalType;
    }

    /**
     * Sets a new journalType.
     *
     * @param string $journalType
     *
     * @return self
     */
    public function setJournalType($journalType)
    {
        $this->journalType = $journalType;

        return $this;
    }

    /**
     * Gets as lineDescription.
     *
     * @return string
     */
    public function getLineDescription()
    {
        return $this->lineDescription;
    }

    /**
     * Sets a new lineDescription.
     *
     * @param string $lineDescription
     *
     * @return self
     */
    public function setLineDescription($lineDescription)
    {
        $this->lineDescription = $lineDescription;

        return $this;
    }

    /**
     * Gets as lineId.
     *
     * @return int
     */
    public function getLineId()
    {
        return $this->lineId;
    }

    /**
     * Sets a new lineId.
     *
     * @param int $lineId
     *
     * @return self
     */
    public function setLineId($lineId)
    {
        $this->lineId = $lineId;

        return $this;
    }

    /**
     * Gets as modifiedStamp.
     *
     * @return \DateTime
     */
    public function getModifiedStamp()
    {
        return $this->modifiedStamp;
    }

    /**
     * Sets a new modifiedStamp.
     *
     * @return self
     */
    public function setModifiedStamp(\DateTime $modifiedStamp)
    {
        $this->modifiedStamp = $modifiedStamp;

        return $this;
    }

    /**
     * Gets as monthToDate.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getMonthToDate()
    {
        return $this->monthToDate;
    }

    /**
     * Sets a new monthToDate.
     *
     * @return self
     */
    public function setMonthToDate(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $monthToDate)
    {
        $this->monthToDate = $monthToDate;

        return $this;
    }

    /**
     * Gets as reference.
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Sets a new reference.
     *
     * @param string $reference
     *
     * @return self
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Gets as unitCount.
     *
     * @return int
     */
    public function getUnitCount()
    {
        return $this->unitCount;
    }

    /**
     * Sets a new unitCount.
     *
     * @param int $unitCount
     *
     * @return self
     */
    public function setUnitCount($unitCount)
    {
        $this->unitCount = $unitCount;

        return $this;
    }

    /**
     * Gets as voidStatus.
     *
     * @return string
     */
    public function getVoidStatus()
    {
        return $this->voidStatus;
    }

    /**
     * Sets a new voidStatus.
     *
     * @param string $voidStatus
     *
     * @return self
     */
    public function setVoidStatus($voidStatus)
    {
        $this->voidStatus = $voidStatus;

        return $this;
    }

    /**
     * Gets as zeroDate.
     *
     * @return \DateTime
     */
    public function getZeroDate()
    {
        return $this->zeroDate;
    }

    /**
     * Sets a new zeroDate.
     *
     * @return self
     */
    public function setZeroDate(\DateTime $zeroDate)
    {
        $this->zeroDate = $zeroDate;

        return $this;
    }
}

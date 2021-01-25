<?php

namespace App\Soap\dealerbuilt\src\Models\Accounting;

/**
 * Class representing AccountingTransactionLineItemType
 *
 * 
 * XSD Type: AccountingTransactionLineItem
 */
class AccountingTransactionLineItemType
{

    /**
     * @var string $account
     */
    private $account = null;

    /**
     * @var \DateTime $accountingDate
     */
    private $accountingDate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $amount
     */
    private $amount = null;

    /**
     * @var bool $claimGasIndicator
     */
    private $claimGasIndicator = null;

    /**
     * @var string $claimType
     */
    private $claimType = null;

    /**
     * @var int $company
     */
    private $company = null;

    /**
     * @var string $control
     */
    private $control = null;

    /**
     * @var string $control2
     */
    private $control2 = null;

    /**
     * @var string $description
     */
    private $description = null;

    /**
     * @var string $gLVouch
     */
    private $gLVouch = null;

    /**
     * @var string $groupUnique
     */
    private $groupUnique = null;

    /**
     * @var string $journal
     */
    private $journal = null;

    /**
     * @var int $lineNumber
     */
    private $lineNumber = null;

    /**
     * @var int $period
     */
    private $period = null;

    /**
     * @var string $reference
     */
    private $reference = null;

    /**
     * @var string $scheduleCode
     */
    private $scheduleCode = null;

    /**
     * @var int $unitCount
     */
    private $unitCount = null;

    /**
     * @var string $vIN
     */
    private $vIN = null;

    /**
     * Gets as account
     *
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Sets a new account
     *
     * @param string $account
     * @return self
     */
    public function setAccount($account)
    {
        $this->account = $account;
        return $this;
    }

    /**
     * Gets as accountingDate
     *
     * @return \DateTime
     */
    public function getAccountingDate()
    {
        return $this->accountingDate;
    }

    /**
     * Sets a new accountingDate
     *
     * @param \DateTime $accountingDate
     * @return self
     */
    public function setAccountingDate(\DateTime $accountingDate)
    {
        $this->accountingDate = $accountingDate;
        return $this;
    }

    /**
     * Gets as amount
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Sets a new amount
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $amount
     * @return self
     */
    public function setAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Gets as claimGasIndicator
     *
     * @return bool
     */
    public function getClaimGasIndicator()
    {
        return $this->claimGasIndicator;
    }

    /**
     * Sets a new claimGasIndicator
     *
     * @param bool $claimGasIndicator
     * @return self
     */
    public function setClaimGasIndicator($claimGasIndicator)
    {
        $this->claimGasIndicator = $claimGasIndicator;
        return $this;
    }

    /**
     * Gets as claimType
     *
     * @return string
     */
    public function getClaimType()
    {
        return $this->claimType;
    }

    /**
     * Sets a new claimType
     *
     * @param string $claimType
     * @return self
     */
    public function setClaimType($claimType)
    {
        $this->claimType = $claimType;
        return $this;
    }

    /**
     * Gets as company
     *
     * @return int
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Sets a new company
     *
     * @param int $company
     * @return self
     */
    public function setCompany($company)
    {
        $this->company = $company;
        return $this;
    }

    /**
     * Gets as control
     *
     * @return string
     */
    public function getControl()
    {
        return $this->control;
    }

    /**
     * Sets a new control
     *
     * @param string $control
     * @return self
     */
    public function setControl($control)
    {
        $this->control = $control;
        return $this;
    }

    /**
     * Gets as control2
     *
     * @return string
     */
    public function getControl2()
    {
        return $this->control2;
    }

    /**
     * Sets a new control2
     *
     * @param string $control2
     * @return self
     */
    public function setControl2($control2)
    {
        $this->control2 = $control2;
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
     * Gets as gLVouch
     *
     * @return string
     */
    public function getGLVouch()
    {
        return $this->gLVouch;
    }

    /**
     * Sets a new gLVouch
     *
     * @param string $gLVouch
     * @return self
     */
    public function setGLVouch($gLVouch)
    {
        $this->gLVouch = $gLVouch;
        return $this;
    }

    /**
     * Gets as groupUnique
     *
     * @return string
     */
    public function getGroupUnique()
    {
        return $this->groupUnique;
    }

    /**
     * Sets a new groupUnique
     *
     * @param string $groupUnique
     * @return self
     */
    public function setGroupUnique($groupUnique)
    {
        $this->groupUnique = $groupUnique;
        return $this;
    }

    /**
     * Gets as journal
     *
     * @return string
     */
    public function getJournal()
    {
        return $this->journal;
    }

    /**
     * Sets a new journal
     *
     * @param string $journal
     * @return self
     */
    public function setJournal($journal)
    {
        $this->journal = $journal;
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
     * Gets as period
     *
     * @return int
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Sets a new period
     *
     * @param int $period
     * @return self
     */
    public function setPeriod($period)
    {
        $this->period = $period;
        return $this;
    }

    /**
     * Gets as reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Sets a new reference
     *
     * @param string $reference
     * @return self
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * Gets as scheduleCode
     *
     * @return string
     */
    public function getScheduleCode()
    {
        return $this->scheduleCode;
    }

    /**
     * Sets a new scheduleCode
     *
     * @param string $scheduleCode
     * @return self
     */
    public function setScheduleCode($scheduleCode)
    {
        $this->scheduleCode = $scheduleCode;
        return $this;
    }

    /**
     * Gets as unitCount
     *
     * @return int
     */
    public function getUnitCount()
    {
        return $this->unitCount;
    }

    /**
     * Sets a new unitCount
     *
     * @param int $unitCount
     * @return self
     */
    public function setUnitCount($unitCount)
    {
        $this->unitCount = $unitCount;
        return $this;
    }

    /**
     * Gets as vIN
     *
     * @return string
     */
    public function getVIN()
    {
        return $this->vIN;
    }

    /**
     * Sets a new vIN
     *
     * @param string $vIN
     * @return self
     */
    public function setVIN($vIN)
    {
        $this->vIN = $vIN;
        return $this;
    }


}


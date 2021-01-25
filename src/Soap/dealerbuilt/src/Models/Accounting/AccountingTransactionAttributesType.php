<?php

namespace App\Soap\dealerbuilt\src\Models\Accounting;

/**
 * Class representing AccountingTransactionAttributesType.
 *
 * XSD Type: AccountingTransactionAttributes
 */
class AccountingTransactionAttributesType
{
    /**
     * @var \DateTime
     */
    private $accountingDate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $balance = null;

    /**
     * @var int
     */
    private $dealNumber = null;

    /**
     * @var int
     */
    private $dealerID = null;

    /**
     * @var string
     */
    private $description = null;

    /**
     * @var int
     */
    private $division = null;

    /**
     * @var \DateTime
     */
    private $documentDate = null;

    /**
     * @var int
     */
    private $fieldCode = null;

    /**
     * @var \DateTime
     */
    private $gLEntryDate = null;

    /**
     * @var string
     */
    private $gLVouch = null;

    /**
     * @var string
     */
    private $groupDescription = null;

    /**
     * @var string
     */
    private $groupUnique = null;

    /**
     * @var string
     */
    private $groupUserID = null;

    /**
     * @var string
     */
    private $journal = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Accounting\AccountingTransactionLineItemType[]
     */
    private $lineItems = null;

    /**
     * @var int
     */
    private $locationID = null;

    /**
     * @var string
     */
    private $modifiedBy = null;

    /**
     * @var string
     */
    private $omnisName = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $paymentAmount = null;

    /**
     * @var int
     */
    private $period = null;

    /**
     * @var \DateTime
     */
    private $postTime = null;

    /**
     * @var int
     */
    private $posted = null;

    /**
     * @var string
     */
    private $refJrnl = null;

    /**
     * @var string
     */
    private $reference = null;

    /**
     * @var \DateTime
     */
    private $referenceDate = null;

    /**
     * @var int
     */
    private $sourceLocationID = null;

    /**
     * @var string
     */
    private $transType1 = null;

    /**
     * @var string
     */
    private $userCode = null;

    /**
     * @var string
     */
    private $userName = null;

    /**
     * @var string
     */
    private $factory = null;

    /**
     * @var int
     */
    private $windowCode = null;

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
     * Gets as balance.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Sets a new balance.
     *
     * @return self
     */
    public function setBalance(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * Gets as dealNumber.
     *
     * @return int
     */
    public function getDealNumber()
    {
        return $this->dealNumber;
    }

    /**
     * Sets a new dealNumber.
     *
     * @param int $dealNumber
     *
     * @return self
     */
    public function setDealNumber($dealNumber)
    {
        $this->dealNumber = $dealNumber;

        return $this;
    }

    /**
     * Gets as dealerID.
     *
     * @return int
     */
    public function getDealerID()
    {
        return $this->dealerID;
    }

    /**
     * Sets a new dealerID.
     *
     * @param int $dealerID
     *
     * @return self
     */
    public function setDealerID($dealerID)
    {
        $this->dealerID = $dealerID;

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
     * Gets as documentDate.
     *
     * @return \DateTime
     */
    public function getDocumentDate()
    {
        return $this->documentDate;
    }

    /**
     * Sets a new documentDate.
     *
     * @return self
     */
    public function setDocumentDate(\DateTime $documentDate)
    {
        $this->documentDate = $documentDate;

        return $this;
    }

    /**
     * Gets as fieldCode.
     *
     * @return int
     */
    public function getFieldCode()
    {
        return $this->fieldCode;
    }

    /**
     * Sets a new fieldCode.
     *
     * @param int $fieldCode
     *
     * @return self
     */
    public function setFieldCode($fieldCode)
    {
        $this->fieldCode = $fieldCode;

        return $this;
    }

    /**
     * Gets as gLEntryDate.
     *
     * @return \DateTime
     */
    public function getGLEntryDate()
    {
        return $this->gLEntryDate;
    }

    /**
     * Sets a new gLEntryDate.
     *
     * @return self
     */
    public function setGLEntryDate(\DateTime $gLEntryDate)
    {
        $this->gLEntryDate = $gLEntryDate;

        return $this;
    }

    /**
     * Gets as gLVouch.
     *
     * @return string
     */
    public function getGLVouch()
    {
        return $this->gLVouch;
    }

    /**
     * Sets a new gLVouch.
     *
     * @param string $gLVouch
     *
     * @return self
     */
    public function setGLVouch($gLVouch)
    {
        $this->gLVouch = $gLVouch;

        return $this;
    }

    /**
     * Gets as groupDescription.
     *
     * @return string
     */
    public function getGroupDescription()
    {
        return $this->groupDescription;
    }

    /**
     * Sets a new groupDescription.
     *
     * @param string $groupDescription
     *
     * @return self
     */
    public function setGroupDescription($groupDescription)
    {
        $this->groupDescription = $groupDescription;

        return $this;
    }

    /**
     * Gets as groupUnique.
     *
     * @return string
     */
    public function getGroupUnique()
    {
        return $this->groupUnique;
    }

    /**
     * Sets a new groupUnique.
     *
     * @param string $groupUnique
     *
     * @return self
     */
    public function setGroupUnique($groupUnique)
    {
        $this->groupUnique = $groupUnique;

        return $this;
    }

    /**
     * Gets as groupUserID.
     *
     * @return string
     */
    public function getGroupUserID()
    {
        return $this->groupUserID;
    }

    /**
     * Sets a new groupUserID.
     *
     * @param string $groupUserID
     *
     * @return self
     */
    public function setGroupUserID($groupUserID)
    {
        $this->groupUserID = $groupUserID;

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
     * Adds as accountingTransactionLineItem.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Accounting\AccountingTransactionLineItemType $accountingTransactionLineItem
     */
    public function addToLineItems(AccountingTransactionLineItemType $accountingTransactionLineItem)
    {
        $this->lineItems[] = $accountingTransactionLineItem;

        return $this;
    }

    /**
     * isset lineItems.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetLineItems($index)
    {
        return isset($this->lineItems[$index]);
    }

    /**
     * unset lineItems.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetLineItems($index)
    {
        unset($this->lineItems[$index]);
    }

    /**
     * Gets as lineItems.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Accounting\AccountingTransactionLineItemType[]
     */
    public function getLineItems()
    {
        return $this->lineItems;
    }

    /**
     * Sets a new lineItems.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Accounting\AccountingTransactionLineItemType[] $lineItems
     *
     * @return self
     */
    public function setLineItems(array $lineItems)
    {
        $this->lineItems = $lineItems;

        return $this;
    }

    /**
     * Gets as locationID.
     *
     * @return int
     */
    public function getLocationID()
    {
        return $this->locationID;
    }

    /**
     * Sets a new locationID.
     *
     * @param int $locationID
     *
     * @return self
     */
    public function setLocationID($locationID)
    {
        $this->locationID = $locationID;

        return $this;
    }

    /**
     * Gets as modifiedBy.
     *
     * @return string
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    /**
     * Sets a new modifiedBy.
     *
     * @param string $modifiedBy
     *
     * @return self
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;

        return $this;
    }

    /**
     * Gets as omnisName.
     *
     * @return string
     */
    public function getOmnisName()
    {
        return $this->omnisName;
    }

    /**
     * Sets a new omnisName.
     *
     * @param string $omnisName
     *
     * @return self
     */
    public function setOmnisName($omnisName)
    {
        $this->omnisName = $omnisName;

        return $this;
    }

    /**
     * Gets as paymentAmount.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getPaymentAmount()
    {
        return $this->paymentAmount;
    }

    /**
     * Sets a new paymentAmount.
     *
     * @return self
     */
    public function setPaymentAmount(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $paymentAmount)
    {
        $this->paymentAmount = $paymentAmount;

        return $this;
    }

    /**
     * Gets as period.
     *
     * @return int
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Sets a new period.
     *
     * @param int $period
     *
     * @return self
     */
    public function setPeriod($period)
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Gets as postTime.
     *
     * @return \DateTime
     */
    public function getPostTime()
    {
        return $this->postTime;
    }

    /**
     * Sets a new postTime.
     *
     * @return self
     */
    public function setPostTime(\DateTime $postTime)
    {
        $this->postTime = $postTime;

        return $this;
    }

    /**
     * Gets as posted.
     *
     * @return int
     */
    public function getPosted()
    {
        return $this->posted;
    }

    /**
     * Sets a new posted.
     *
     * @param int $posted
     *
     * @return self
     */
    public function setPosted($posted)
    {
        $this->posted = $posted;

        return $this;
    }

    /**
     * Gets as refJrnl.
     *
     * @return string
     */
    public function getRefJrnl()
    {
        return $this->refJrnl;
    }

    /**
     * Sets a new refJrnl.
     *
     * @param string $refJrnl
     *
     * @return self
     */
    public function setRefJrnl($refJrnl)
    {
        $this->refJrnl = $refJrnl;

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
     * Gets as referenceDate.
     *
     * @return \DateTime
     */
    public function getReferenceDate()
    {
        return $this->referenceDate;
    }

    /**
     * Sets a new referenceDate.
     *
     * @return self
     */
    public function setReferenceDate(\DateTime $referenceDate)
    {
        $this->referenceDate = $referenceDate;

        return $this;
    }

    /**
     * Gets as sourceLocationID.
     *
     * @return int
     */
    public function getSourceLocationID()
    {
        return $this->sourceLocationID;
    }

    /**
     * Sets a new sourceLocationID.
     *
     * @param int $sourceLocationID
     *
     * @return self
     */
    public function setSourceLocationID($sourceLocationID)
    {
        $this->sourceLocationID = $sourceLocationID;

        return $this;
    }

    /**
     * Gets as transType1.
     *
     * @return string
     */
    public function getTransType1()
    {
        return $this->transType1;
    }

    /**
     * Sets a new transType1.
     *
     * @param string $transType1
     *
     * @return self
     */
    public function setTransType1($transType1)
    {
        $this->transType1 = $transType1;

        return $this;
    }

    /**
     * Gets as userCode.
     *
     * @return string
     */
    public function getUserCode()
    {
        return $this->userCode;
    }

    /**
     * Sets a new userCode.
     *
     * @param string $userCode
     *
     * @return self
     */
    public function setUserCode($userCode)
    {
        $this->userCode = $userCode;

        return $this;
    }

    /**
     * Gets as userName.
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Sets a new userName.
     *
     * @param string $userName
     *
     * @return self
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Gets as factory.
     *
     * @return string
     */
    public function getFactory()
    {
        return $this->factory;
    }

    /**
     * Sets a new factory.
     *
     * @param string $factory
     *
     * @return self
     */
    public function setFactory($factory)
    {
        $this->factory = $factory;

        return $this;
    }

    /**
     * Gets as windowCode.
     *
     * @return int
     */
    public function getWindowCode()
    {
        return $this->windowCode;
    }

    /**
     * Sets a new windowCode.
     *
     * @param int $windowCode
     *
     * @return self
     */
    public function setWindowCode($windowCode)
    {
        $this->windowCode = $windowCode;

        return $this;
    }
}

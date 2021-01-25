<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing GlLineSearchCriteriaType
 *
 * 
 * XSD Type: GlLineSearchCriteria
 */
class GlLineSearchCriteriaType extends AccountsSearchCriteriaType
{

    /**
     * @var int[] $divisions
     */
    private $divisions = null;

    /**
     * @var bool $includeBalanceForwardRecords
     */
    private $includeBalanceForwardRecords = null;

    /**
     * @var \DateInterval $maxElapsedSinceUpdate
     */
    private $maxElapsedSinceUpdate = null;

    /**
     * @var \DateTime $maximumAccountingDate
     */
    private $maximumAccountingDate = null;

    /**
     * @var \DateTime $maximumCreatedStamp
     */
    private $maximumCreatedStamp = null;

    /**
     * @var \DateTime $maximumUpdateStamp
     */
    private $maximumUpdateStamp = null;

    /**
     * @var \DateTime $minimumAccountingDate
     */
    private $minimumAccountingDate = null;

    /**
     * @var \DateTime $minimumCreatedStamp
     */
    private $minimumCreatedStamp = null;

    /**
     * @var \DateTime $minimumUpdateStamp
     */
    private $minimumUpdateStamp = null;

    /**
     * @var string $reconciledScope
     */
    private $reconciledScope = null;

    /**
     * @var string[] $voidStatuses
     */
    private $voidStatuses = null;

    /**
     * @var string $zeroDateScope
     */
    private $zeroDateScope = null;

    /**
     * Adds as long
     *
     * @return self
     * @param int $long
     */
    public function addToDivisions($long)
    {
        $this->divisions[] = $long;
        return $this;
    }

    /**
     * isset divisions
     *
     * @param int|string $index
     * @return bool
     */
    public function issetDivisions($index)
    {
        return isset($this->divisions[$index]);
    }

    /**
     * unset divisions
     *
     * @param int|string $index
     * @return void
     */
    public function unsetDivisions($index)
    {
        unset($this->divisions[$index]);
    }

    /**
     * Gets as divisions
     *
     * @return int[]
     */
    public function getDivisions()
    {
        return $this->divisions;
    }

    /**
     * Sets a new divisions
     *
     * @param int[] $divisions
     * @return self
     */
    public function setDivisions(array $divisions)
    {
        $this->divisions = $divisions;
        return $this;
    }

    /**
     * Gets as includeBalanceForwardRecords
     *
     * @return bool
     */
    public function getIncludeBalanceForwardRecords()
    {
        return $this->includeBalanceForwardRecords;
    }

    /**
     * Sets a new includeBalanceForwardRecords
     *
     * @param bool $includeBalanceForwardRecords
     * @return self
     */
    public function setIncludeBalanceForwardRecords($includeBalanceForwardRecords)
    {
        $this->includeBalanceForwardRecords = $includeBalanceForwardRecords;
        return $this;
    }

    /**
     * Gets as maxElapsedSinceUpdate
     *
     * @return \DateInterval
     */
    public function getMaxElapsedSinceUpdate()
    {
        return $this->maxElapsedSinceUpdate;
    }

    /**
     * Sets a new maxElapsedSinceUpdate
     *
     * @param \DateInterval $maxElapsedSinceUpdate
     * @return self
     */
    public function setMaxElapsedSinceUpdate(\DateInterval $maxElapsedSinceUpdate)
    {
        $this->maxElapsedSinceUpdate = $maxElapsedSinceUpdate;
        return $this;
    }

    /**
     * Gets as maximumAccountingDate
     *
     * @return \DateTime
     */
    public function getMaximumAccountingDate()
    {
        return $this->maximumAccountingDate;
    }

    /**
     * Sets a new maximumAccountingDate
     *
     * @param \DateTime $maximumAccountingDate
     * @return self
     */
    public function setMaximumAccountingDate(\DateTime $maximumAccountingDate)
    {
        $this->maximumAccountingDate = $maximumAccountingDate;
        return $this;
    }

    /**
     * Gets as maximumCreatedStamp
     *
     * @return \DateTime
     */
    public function getMaximumCreatedStamp()
    {
        return $this->maximumCreatedStamp;
    }

    /**
     * Sets a new maximumCreatedStamp
     *
     * @param \DateTime $maximumCreatedStamp
     * @return self
     */
    public function setMaximumCreatedStamp(\DateTime $maximumCreatedStamp)
    {
        $this->maximumCreatedStamp = $maximumCreatedStamp;
        return $this;
    }

    /**
     * Gets as maximumUpdateStamp
     *
     * @return \DateTime
     */
    public function getMaximumUpdateStamp()
    {
        return $this->maximumUpdateStamp;
    }

    /**
     * Sets a new maximumUpdateStamp
     *
     * @param \DateTime $maximumUpdateStamp
     * @return self
     */
    public function setMaximumUpdateStamp(\DateTime $maximumUpdateStamp)
    {
        $this->maximumUpdateStamp = $maximumUpdateStamp;
        return $this;
    }

    /**
     * Gets as minimumAccountingDate
     *
     * @return \DateTime
     */
    public function getMinimumAccountingDate()
    {
        return $this->minimumAccountingDate;
    }

    /**
     * Sets a new minimumAccountingDate
     *
     * @param \DateTime $minimumAccountingDate
     * @return self
     */
    public function setMinimumAccountingDate(\DateTime $minimumAccountingDate)
    {
        $this->minimumAccountingDate = $minimumAccountingDate;
        return $this;
    }

    /**
     * Gets as minimumCreatedStamp
     *
     * @return \DateTime
     */
    public function getMinimumCreatedStamp()
    {
        return $this->minimumCreatedStamp;
    }

    /**
     * Sets a new minimumCreatedStamp
     *
     * @param \DateTime $minimumCreatedStamp
     * @return self
     */
    public function setMinimumCreatedStamp(\DateTime $minimumCreatedStamp)
    {
        $this->minimumCreatedStamp = $minimumCreatedStamp;
        return $this;
    }

    /**
     * Gets as minimumUpdateStamp
     *
     * @return \DateTime
     */
    public function getMinimumUpdateStamp()
    {
        return $this->minimumUpdateStamp;
    }

    /**
     * Sets a new minimumUpdateStamp
     *
     * @param \DateTime $minimumUpdateStamp
     * @return self
     */
    public function setMinimumUpdateStamp(\DateTime $minimumUpdateStamp)
    {
        $this->minimumUpdateStamp = $minimumUpdateStamp;
        return $this;
    }

    /**
     * Gets as reconciledScope
     *
     * @return string
     */
    public function getReconciledScope()
    {
        return $this->reconciledScope;
    }

    /**
     * Sets a new reconciledScope
     *
     * @param string $reconciledScope
     * @return self
     */
    public function setReconciledScope($reconciledScope)
    {
        $this->reconciledScope = $reconciledScope;
        return $this;
    }

    /**
     * Adds as voidStatusType
     *
     * @return self
     * @param string $voidStatusType
     */
    public function addToVoidStatuses($voidStatusType)
    {
        $this->voidStatuses[] = $voidStatusType;
        return $this;
    }

    /**
     * isset voidStatuses
     *
     * @param int|string $index
     * @return bool
     */
    public function issetVoidStatuses($index)
    {
        return isset($this->voidStatuses[$index]);
    }

    /**
     * unset voidStatuses
     *
     * @param int|string $index
     * @return void
     */
    public function unsetVoidStatuses($index)
    {
        unset($this->voidStatuses[$index]);
    }

    /**
     * Gets as voidStatuses
     *
     * @return string[]
     */
    public function getVoidStatuses()
    {
        return $this->voidStatuses;
    }

    /**
     * Sets a new voidStatuses
     *
     * @param string $voidStatuses
     * @return self
     */
    public function setVoidStatuses(array $voidStatuses)
    {
        $this->voidStatuses = $voidStatuses;
        return $this;
    }

    /**
     * Gets as zeroDateScope
     *
     * @return string
     */
    public function getZeroDateScope()
    {
        return $this->zeroDateScope;
    }

    /**
     * Sets a new zeroDateScope
     *
     * @param string $zeroDateScope
     * @return self
     */
    public function setZeroDateScope($zeroDateScope)
    {
        $this->zeroDateScope = $zeroDateScope;
        return $this;
    }


}


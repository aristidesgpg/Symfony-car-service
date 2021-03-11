<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing GlDetailItemType
 *
 * 
 * XSD Type: GlDetailItem
 */
class GlDetailItemType extends ApiCompanyItemType
{

    /**
     * @var string $account
     */
    private $account = null;

    /**
     * @var string $accountClass
     */
    private $accountClass = null;

    /**
     * @var string $accountDescription
     */
    private $accountDescription = null;

    /**
     * @var string $accountDescriptionAbbreviated
     */
    private $accountDescriptionAbbreviated = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $balanceForward
     */
    private $balanceForward = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Accounting\GlDetailLineType[] $lines
     */
    private $lines = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalCredits
     */
    private $totalCredits = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalDebits
     */
    private $totalDebits = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalMonthToDate
     */
    private $totalMonthToDate = null;

    /**
     * @var int $totalUnitCount
     */
    private $totalUnitCount = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalYearToDate
     */
    private $totalYearToDate = null;

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
     * Gets as accountClass
     *
     * @return string
     */
    public function getAccountClass()
    {
        return $this->accountClass;
    }

    /**
     * Sets a new accountClass
     *
     * @param string $accountClass
     * @return self
     */
    public function setAccountClass($accountClass)
    {
        $this->accountClass = $accountClass;
        return $this;
    }

    /**
     * Gets as accountDescription
     *
     * @return string
     */
    public function getAccountDescription()
    {
        return $this->accountDescription;
    }

    /**
     * Sets a new accountDescription
     *
     * @param string $accountDescription
     * @return self
     */
    public function setAccountDescription($accountDescription)
    {
        $this->accountDescription = $accountDescription;
        return $this;
    }

    /**
     * Gets as accountDescriptionAbbreviated
     *
     * @return string
     */
    public function getAccountDescriptionAbbreviated()
    {
        return $this->accountDescriptionAbbreviated;
    }

    /**
     * Sets a new accountDescriptionAbbreviated
     *
     * @param string $accountDescriptionAbbreviated
     * @return self
     */
    public function setAccountDescriptionAbbreviated($accountDescriptionAbbreviated)
    {
        $this->accountDescriptionAbbreviated = $accountDescriptionAbbreviated;
        return $this;
    }

    /**
     * Gets as balanceForward
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getBalanceForward()
    {
        return $this->balanceForward;
    }

    /**
     * Sets a new balanceForward
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $balanceForward
     * @return self
     */
    public function setBalanceForward(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $balanceForward)
    {
        $this->balanceForward = $balanceForward;
        return $this;
    }

    /**
     * Adds as glDetailLine
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Accounting\GlDetailLineType $glDetailLine
     */
    public function addToLines(\App\Soap\dealerbuilt\src\Models\Accounting\GlDetailLineType $glDetailLine)
    {
        $this->lines[] = $glDetailLine;
        return $this;
    }

    /**
     * isset lines
     *
     * @param int|string $index
     * @return bool
     */
    public function issetLines($index)
    {
        return isset($this->lines[$index]);
    }

    /**
     * unset lines
     *
     * @param int|string $index
     * @return void
     */
    public function unsetLines($index)
    {
        unset($this->lines[$index]);
    }

    /**
     * Gets as lines
     *
     * @return \App\Soap\dealerbuilt\src\Models\Accounting\GlDetailLineType[]
     */
    public function getLines()
    {
        return $this->lines;
    }

    /**
     * Sets a new lines
     *
     * @param \App\Soap\dealerbuilt\src\Models\Accounting\GlDetailLineType[] $lines
     * @return self
     */
    public function setLines(array $lines)
    {
        $this->lines = $lines;
        return $this;
    }

    /**
     * Gets as totalCredits
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTotalCredits()
    {
        return $this->totalCredits;
    }

    /**
     * Sets a new totalCredits
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalCredits
     * @return self
     */
    public function setTotalCredits(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalCredits)
    {
        $this->totalCredits = $totalCredits;
        return $this;
    }

    /**
     * Gets as totalDebits
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTotalDebits()
    {
        return $this->totalDebits;
    }

    /**
     * Sets a new totalDebits
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalDebits
     * @return self
     */
    public function setTotalDebits(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalDebits)
    {
        $this->totalDebits = $totalDebits;
        return $this;
    }

    /**
     * Gets as totalMonthToDate
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTotalMonthToDate()
    {
        return $this->totalMonthToDate;
    }

    /**
     * Sets a new totalMonthToDate
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalMonthToDate
     * @return self
     */
    public function setTotalMonthToDate(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalMonthToDate)
    {
        $this->totalMonthToDate = $totalMonthToDate;
        return $this;
    }

    /**
     * Gets as totalUnitCount
     *
     * @return int
     */
    public function getTotalUnitCount()
    {
        return $this->totalUnitCount;
    }

    /**
     * Sets a new totalUnitCount
     *
     * @param int $totalUnitCount
     * @return self
     */
    public function setTotalUnitCount($totalUnitCount)
    {
        $this->totalUnitCount = $totalUnitCount;
        return $this;
    }

    /**
     * Gets as totalYearToDate
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getTotalYearToDate()
    {
        return $this->totalYearToDate;
    }

    /**
     * Sets a new totalYearToDate
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalYearToDate
     * @return self
     */
    public function setTotalYearToDate(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $totalYearToDate)
    {
        $this->totalYearToDate = $totalYearToDate;
        return $this;
    }


}


<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing GlSummaryItemType
 *
 * 
 * XSD Type: GlSummaryItem
 */
class GlSummaryItemType extends ApiCompanyItemType
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
     * @var \DateTime $fromDate
     */
    private $fromDate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $monthToDate
     */
    private $monthToDate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Accounting\GlMonthlySummaryType[] $monthlyTotals
     */
    private $monthlyTotals = null;

    /**
     * @var \DateTime $toDate
     */
    private $toDate = null;

    /**
     * @var int $unitsMonthToDate
     */
    private $unitsMonthToDate = null;

    /**
     * @var int $unitsYearToDate
     */
    private $unitsYearToDate = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $yearToDate
     */
    private $yearToDate = null;

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
     * Gets as fromDate
     *
     * @return \DateTime
     */
    public function getFromDate()
    {
        return $this->fromDate;
    }

    /**
     * Sets a new fromDate
     *
     * @param \DateTime $fromDate
     * @return self
     */
    public function setFromDate(\DateTime $fromDate)
    {
        $this->fromDate = $fromDate;
        return $this;
    }

    /**
     * Gets as monthToDate
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getMonthToDate()
    {
        return $this->monthToDate;
    }

    /**
     * Sets a new monthToDate
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $monthToDate
     * @return self
     */
    public function setMonthToDate(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $monthToDate)
    {
        $this->monthToDate = $monthToDate;
        return $this;
    }

    /**
     * Adds as glMonthlySummary
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Accounting\GlMonthlySummaryType $glMonthlySummary
     */
    public function addToMonthlyTotals(\App\Soap\dealerbuilt\src\Models\Accounting\GlMonthlySummaryType $glMonthlySummary)
    {
        $this->monthlyTotals[] = $glMonthlySummary;
        return $this;
    }

    /**
     * isset monthlyTotals
     *
     * @param int|string $index
     * @return bool
     */
    public function issetMonthlyTotals($index)
    {
        return isset($this->monthlyTotals[$index]);
    }

    /**
     * unset monthlyTotals
     *
     * @param int|string $index
     * @return void
     */
    public function unsetMonthlyTotals($index)
    {
        unset($this->monthlyTotals[$index]);
    }

    /**
     * Gets as monthlyTotals
     *
     * @return \App\Soap\dealerbuilt\src\Models\Accounting\GlMonthlySummaryType[]
     */
    public function getMonthlyTotals()
    {
        return $this->monthlyTotals;
    }

    /**
     * Sets a new monthlyTotals
     *
     * @param \App\Soap\dealerbuilt\src\Models\Accounting\GlMonthlySummaryType[] $monthlyTotals
     * @return self
     */
    public function setMonthlyTotals(array $monthlyTotals)
    {
        $this->monthlyTotals = $monthlyTotals;
        return $this;
    }

    /**
     * Gets as toDate
     *
     * @return \DateTime
     */
    public function getToDate()
    {
        return $this->toDate;
    }

    /**
     * Sets a new toDate
     *
     * @param \DateTime $toDate
     * @return self
     */
    public function setToDate(\DateTime $toDate)
    {
        $this->toDate = $toDate;
        return $this;
    }

    /**
     * Gets as unitsMonthToDate
     *
     * @return int
     */
    public function getUnitsMonthToDate()
    {
        return $this->unitsMonthToDate;
    }

    /**
     * Sets a new unitsMonthToDate
     *
     * @param int $unitsMonthToDate
     * @return self
     */
    public function setUnitsMonthToDate($unitsMonthToDate)
    {
        $this->unitsMonthToDate = $unitsMonthToDate;
        return $this;
    }

    /**
     * Gets as unitsYearToDate
     *
     * @return int
     */
    public function getUnitsYearToDate()
    {
        return $this->unitsYearToDate;
    }

    /**
     * Sets a new unitsYearToDate
     *
     * @param int $unitsYearToDate
     * @return self
     */
    public function setUnitsYearToDate($unitsYearToDate)
    {
        $this->unitsYearToDate = $unitsYearToDate;
        return $this;
    }

    /**
     * Gets as yearToDate
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getYearToDate()
    {
        return $this->yearToDate;
    }

    /**
     * Sets a new yearToDate
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $yearToDate
     * @return self
     */
    public function setYearToDate(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $yearToDate)
    {
        $this->yearToDate = $yearToDate;
        return $this;
    }


}


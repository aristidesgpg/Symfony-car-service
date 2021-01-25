<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing GlSummarySearchCriteriaType.
 *
 * XSD Type: GlSummarySearchCriteria
 */
class GlSummarySearchCriteriaType extends AccountsSearchCriteriaType
{
    /**
     * @var int[]
     */
    private $divisions = null;

    /**
     * @var int
     */
    private $endMonth = null;

    /**
     * @var int
     */
    private $endYear = null;

    /**
     * @var bool
     */
    private $includeFuturePostedActivity = null;

    /**
     * @var bool
     */
    private $rollUpSpreadAccounts = null;

    /**
     * @var int
     */
    private $startMonth = null;

    /**
     * @var int
     */
    private $startYear = null;

    /**
     * Adds as long.
     *
     * @return self
     *
     * @param int $long
     */
    public function addToDivisions($long)
    {
        $this->divisions[] = $long;

        return $this;
    }

    /**
     * isset divisions.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetDivisions($index)
    {
        return isset($this->divisions[$index]);
    }

    /**
     * unset divisions.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetDivisions($index)
    {
        unset($this->divisions[$index]);
    }

    /**
     * Gets as divisions.
     *
     * @return int[]
     */
    public function getDivisions()
    {
        return $this->divisions;
    }

    /**
     * Sets a new divisions.
     *
     * @param int[] $divisions
     *
     * @return self
     */
    public function setDivisions(array $divisions)
    {
        $this->divisions = $divisions;

        return $this;
    }

    /**
     * Gets as endMonth.
     *
     * @return int
     */
    public function getEndMonth()
    {
        return $this->endMonth;
    }

    /**
     * Sets a new endMonth.
     *
     * @param int $endMonth
     *
     * @return self
     */
    public function setEndMonth($endMonth)
    {
        $this->endMonth = $endMonth;

        return $this;
    }

    /**
     * Gets as endYear.
     *
     * @return int
     */
    public function getEndYear()
    {
        return $this->endYear;
    }

    /**
     * Sets a new endYear.
     *
     * @param int $endYear
     *
     * @return self
     */
    public function setEndYear($endYear)
    {
        $this->endYear = $endYear;

        return $this;
    }

    /**
     * Gets as includeFuturePostedActivity.
     *
     * @return bool
     */
    public function getIncludeFuturePostedActivity()
    {
        return $this->includeFuturePostedActivity;
    }

    /**
     * Sets a new includeFuturePostedActivity.
     *
     * @param bool $includeFuturePostedActivity
     *
     * @return self
     */
    public function setIncludeFuturePostedActivity($includeFuturePostedActivity)
    {
        $this->includeFuturePostedActivity = $includeFuturePostedActivity;

        return $this;
    }

    /**
     * Gets as rollUpSpreadAccounts.
     *
     * @return bool
     */
    public function getRollUpSpreadAccounts()
    {
        return $this->rollUpSpreadAccounts;
    }

    /**
     * Sets a new rollUpSpreadAccounts.
     *
     * @param bool $rollUpSpreadAccounts
     *
     * @return self
     */
    public function setRollUpSpreadAccounts($rollUpSpreadAccounts)
    {
        $this->rollUpSpreadAccounts = $rollUpSpreadAccounts;

        return $this;
    }

    /**
     * Gets as startMonth.
     *
     * @return int
     */
    public function getStartMonth()
    {
        return $this->startMonth;
    }

    /**
     * Sets a new startMonth.
     *
     * @param int $startMonth
     *
     * @return self
     */
    public function setStartMonth($startMonth)
    {
        $this->startMonth = $startMonth;

        return $this;
    }

    /**
     * Gets as startYear.
     *
     * @return int
     */
    public function getStartYear()
    {
        return $this->startYear;
    }

    /**
     * Sets a new startYear.
     *
     * @param int $startYear
     *
     * @return self
     */
    public function setStartYear($startYear)
    {
        $this->startYear = $startYear;

        return $this;
    }
}

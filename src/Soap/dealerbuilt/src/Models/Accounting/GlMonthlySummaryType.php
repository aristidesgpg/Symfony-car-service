<?php

namespace App\Soap\dealerbuilt\src\Models\Accounting;

/**
 * Class representing GlMonthlySummaryType.
 *
 * XSD Type: GlMonthlySummary
 */
class GlMonthlySummaryType
{
    /**
     * @var \DateTime
     */
    private $fromDate = null;

    /**
     * @var bool
     */
    private $isFullMonth = null;

    /**
     * @var int
     */
    private $month = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $monthToDate = null;

    /**
     * @var \DateTime
     */
    private $toDate = null;

    /**
     * @var int
     */
    private $unitsMonthToDate = null;

    /**
     * @var int
     */
    private $unitsYearToDate = null;

    /**
     * @var int
     */
    private $year = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    private $yearToDate = null;

    /**
     * Gets as fromDate.
     *
     * @return \DateTime
     */
    public function getFromDate()
    {
        return $this->fromDate;
    }

    /**
     * Sets a new fromDate.
     *
     * @return self
     */
    public function setFromDate(\DateTime $fromDate)
    {
        $this->fromDate = $fromDate;

        return $this;
    }

    /**
     * Gets as isFullMonth.
     *
     * @return bool
     */
    public function getIsFullMonth()
    {
        return $this->isFullMonth;
    }

    /**
     * Sets a new isFullMonth.
     *
     * @param bool $isFullMonth
     *
     * @return self
     */
    public function setIsFullMonth($isFullMonth)
    {
        $this->isFullMonth = $isFullMonth;

        return $this;
    }

    /**
     * Gets as month.
     *
     * @return int
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Sets a new month.
     *
     * @param int $month
     *
     * @return self
     */
    public function setMonth($month)
    {
        $this->month = $month;

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
     * Gets as toDate.
     *
     * @return \DateTime
     */
    public function getToDate()
    {
        return $this->toDate;
    }

    /**
     * Sets a new toDate.
     *
     * @return self
     */
    public function setToDate(\DateTime $toDate)
    {
        $this->toDate = $toDate;

        return $this;
    }

    /**
     * Gets as unitsMonthToDate.
     *
     * @return int
     */
    public function getUnitsMonthToDate()
    {
        return $this->unitsMonthToDate;
    }

    /**
     * Sets a new unitsMonthToDate.
     *
     * @param int $unitsMonthToDate
     *
     * @return self
     */
    public function setUnitsMonthToDate($unitsMonthToDate)
    {
        $this->unitsMonthToDate = $unitsMonthToDate;

        return $this;
    }

    /**
     * Gets as unitsYearToDate.
     *
     * @return int
     */
    public function getUnitsYearToDate()
    {
        return $this->unitsYearToDate;
    }

    /**
     * Sets a new unitsYearToDate.
     *
     * @param int $unitsYearToDate
     *
     * @return self
     */
    public function setUnitsYearToDate($unitsYearToDate)
    {
        $this->unitsYearToDate = $unitsYearToDate;

        return $this;
    }

    /**
     * Gets as year.
     *
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Sets a new year.
     *
     * @param int $year
     *
     * @return self
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Gets as yearToDate.
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getYearToDate()
    {
        return $this->yearToDate;
    }

    /**
     * Sets a new yearToDate.
     *
     * @return self
     */
    public function setYearToDate(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $yearToDate)
    {
        $this->yearToDate = $yearToDate;

        return $this;
    }
}

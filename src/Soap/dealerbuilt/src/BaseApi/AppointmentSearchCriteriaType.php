<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing AppointmentSearchCriteriaType
 *
 * 
 * XSD Type: AppointmentSearchCriteria
 */
class AppointmentSearchCriteriaType extends ServiceLocationsSearchCriteriaType
{

    /**
     * @var \DateTime $periodEnd
     */
    private $periodEnd = null;

    /**
     * @var \DateTime $periodStart
     */
    private $periodStart = null;

    /**
     * @var string[] $statuses
     */
    private $statuses = null;

    /**
     * Gets as periodEnd
     *
     * @return \DateTime
     */
    public function getPeriodEnd()
    {
        return $this->periodEnd;
    }

    /**
     * Sets a new periodEnd
     *
     * @param \DateTime $periodEnd
     * @return self
     */
    public function setPeriodEnd(\DateTime $periodEnd)
    {
        $this->periodEnd = $periodEnd;
        return $this;
    }

    /**
     * Gets as periodStart
     *
     * @return \DateTime
     */
    public function getPeriodStart()
    {
        return $this->periodStart;
    }

    /**
     * Sets a new periodStart
     *
     * @param \DateTime $periodStart
     * @return self
     */
    public function setPeriodStart(\DateTime $periodStart)
    {
        $this->periodStart = $periodStart;
        return $this;
    }

    /**
     * Adds as appointmentStatus
     *
     * @return self
     * @param string $appointmentStatus
     */
    public function addToStatuses($appointmentStatus)
    {
        $this->statuses[] = $appointmentStatus;
        return $this;
    }

    /**
     * isset statuses
     *
     * @param int|string $index
     * @return bool
     */
    public function issetStatuses($index)
    {
        return isset($this->statuses[$index]);
    }

    /**
     * unset statuses
     *
     * @param int|string $index
     * @return void
     */
    public function unsetStatuses($index)
    {
        unset($this->statuses[$index]);
    }

    /**
     * Gets as statuses
     *
     * @return string[]
     */
    public function getStatuses()
    {
        return $this->statuses;
    }

    /**
     * Sets a new statuses
     *
     * @param string $statuses
     * @return self
     */
    public function setStatuses(array $statuses)
    {
        $this->statuses = $statuses;
        return $this;
    }


}


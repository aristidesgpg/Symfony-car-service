<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing SearchCriteriaType
 *
 * 
 * XSD Type: SearchCriteria
 */
class SearchCriteriaType
{

    /**
     * @var \DateTime $changedPeriodEnd
     */
    private $changedPeriodEnd = null;

    /**
     * @var \DateTime $changedPeriodStart
     */
    private $changedPeriodStart = null;

    /**
     * @var \DateInterval $maxElapsedSinceUpdate
     */
    private $maxElapsedSinceUpdate = null;

    /**
     * @var bool $suppressErrors
     */
    private $suppressErrors = null;

    /**
     * Gets as changedPeriodEnd
     *
     * @return \DateTime
     */
    public function getChangedPeriodEnd()
    {
        return $this->changedPeriodEnd;
    }

    /**
     * Sets a new changedPeriodEnd
     *
     * @param \DateTime $changedPeriodEnd
     * @return self
     */
    public function setChangedPeriodEnd(\DateTime $changedPeriodEnd)
    {
        $this->changedPeriodEnd = $changedPeriodEnd;
        return $this;
    }

    /**
     * Gets as changedPeriodStart
     *
     * @return \DateTime
     */
    public function getChangedPeriodStart()
    {
        return $this->changedPeriodStart;
    }

    /**
     * Sets a new changedPeriodStart
     *
     * @param \DateTime $changedPeriodStart
     * @return self
     */
    public function setChangedPeriodStart(\DateTime $changedPeriodStart)
    {
        $this->changedPeriodStart = $changedPeriodStart;
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
     * Gets as suppressErrors
     *
     * @return bool
     */
    public function getSuppressErrors()
    {
        return $this->suppressErrors;
    }

    /**
     * Sets a new suppressErrors
     *
     * @param bool $suppressErrors
     * @return self
     */
    public function setSuppressErrors($suppressErrors)
    {
        $this->suppressErrors = $suppressErrors;
        return $this;
    }


}


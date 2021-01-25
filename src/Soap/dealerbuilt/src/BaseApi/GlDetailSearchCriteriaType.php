<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing GlDetailSearchCriteriaType
 *
 * 
 * XSD Type: GlDetailSearchCriteria
 */
class GlDetailSearchCriteriaType extends AccountsSearchCriteriaType
{

    /**
     * @var \DateTime $endDate
     */
    private $endDate = null;

    /**
     * @var \DateTime $startDate
     */
    private $startDate = null;

    /**
     * Gets as endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Sets a new endDate
     *
     * @param \DateTime $endDate
     * @return self
     */
    public function setEndDate(\DateTime $endDate)
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * Gets as startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Sets a new startDate
     *
     * @param \DateTime $startDate
     * @return self
     */
    public function setStartDate(\DateTime $startDate)
    {
        $this->startDate = $startDate;
        return $this;
    }


}


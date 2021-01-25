<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullRepairOrderKeys.
 */
class PullRepairOrderKeys
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\RepairOrderSearchCriteriaType
     */
    private $searchCriteria = null;

    /**
     * Gets as searchCriteria.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\RepairOrderSearchCriteriaType
     */
    public function getSearchCriteria()
    {
        return $this->searchCriteria;
    }

    /**
     * Sets a new searchCriteria.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderSearchCriteriaType $searchCriteria
     *
     * @return self
     */
    public function setSearchCriteria(BaseApi\RepairOrderSearchCriteriaType $searchCriteria)
    {
        $this->searchCriteria = $searchCriteria;

        return $this;
    }
}

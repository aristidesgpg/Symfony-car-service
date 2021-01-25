<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ServiceLocationsSearchCriteriaType.
 *
 * XSD Type: ServiceLocationsSearchCriteria
 */
class ServiceLocationsSearchCriteriaType extends SearchCriteriaType
{
    /**
     * @var int[]
     */
    private $serviceLocationIds = null;

    /**
     * Adds as long.
     *
     * @return self
     *
     * @param int $long
     */
    public function addToServiceLocationIds($long)
    {
        $this->serviceLocationIds[] = $long;

        return $this;
    }

    /**
     * isset serviceLocationIds.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetServiceLocationIds($index)
    {
        return isset($this->serviceLocationIds[$index]);
    }

    /**
     * unset serviceLocationIds.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetServiceLocationIds($index)
    {
        unset($this->serviceLocationIds[$index]);
    }

    /**
     * Gets as serviceLocationIds.
     *
     * @return int[]
     */
    public function getServiceLocationIds()
    {
        return $this->serviceLocationIds;
    }

    /**
     * Sets a new serviceLocationIds.
     *
     * @param int[] $serviceLocationIds
     *
     * @return self
     */
    public function setServiceLocationIds(array $serviceLocationIds)
    {
        $this->serviceLocationIds = $serviceLocationIds;

        return $this;
    }
}

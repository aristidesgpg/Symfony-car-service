<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing CustomerVehicleSearchCriteriaType.
 *
 * XSD Type: CustomerVehicleSearchCriteria
 */
class CustomerVehicleSearchCriteriaType extends SourcesSearchCriteriaType
{
    /**
     * @var int[]
     */
    private $activityStoreIds = null;

    /**
     * @var \DateTime
     */
    private $maximumUpdateStamp = null;

    /**
     * @var \DateTime
     */
    private $minimumUpdateStamp = null;

    /**
     * @var string
     */
    private $partialVin = null;

    /**
     * Adds as long.
     *
     * @return self
     *
     * @param int $long
     */
    public function addToActivityStoreIds($long)
    {
        $this->activityStoreIds[] = $long;

        return $this;
    }

    /**
     * isset activityStoreIds.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetActivityStoreIds($index)
    {
        return isset($this->activityStoreIds[$index]);
    }

    /**
     * unset activityStoreIds.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetActivityStoreIds($index)
    {
        unset($this->activityStoreIds[$index]);
    }

    /**
     * Gets as activityStoreIds.
     *
     * @return int[]
     */
    public function getActivityStoreIds()
    {
        return $this->activityStoreIds;
    }

    /**
     * Sets a new activityStoreIds.
     *
     * @param int[] $activityStoreIds
     *
     * @return self
     */
    public function setActivityStoreIds(array $activityStoreIds)
    {
        $this->activityStoreIds = $activityStoreIds;

        return $this;
    }

    /**
     * Gets as maximumUpdateStamp.
     *
     * @return \DateTime
     */
    public function getMaximumUpdateStamp()
    {
        return $this->maximumUpdateStamp;
    }

    /**
     * Sets a new maximumUpdateStamp.
     *
     * @return self
     */
    public function setMaximumUpdateStamp(\DateTime $maximumUpdateStamp)
    {
        $this->maximumUpdateStamp = $maximumUpdateStamp;

        return $this;
    }

    /**
     * Gets as minimumUpdateStamp.
     *
     * @return \DateTime
     */
    public function getMinimumUpdateStamp()
    {
        return $this->minimumUpdateStamp;
    }

    /**
     * Sets a new minimumUpdateStamp.
     *
     * @return self
     */
    public function setMinimumUpdateStamp(\DateTime $minimumUpdateStamp)
    {
        $this->minimumUpdateStamp = $minimumUpdateStamp;

        return $this;
    }

    /**
     * Gets as partialVin.
     *
     * @return string
     */
    public function getPartialVin()
    {
        return $this->partialVin;
    }

    /**
     * Sets a new partialVin.
     *
     * @param string $partialVin
     *
     * @return self
     */
    public function setPartialVin($partialVin)
    {
        $this->partialVin = $partialVin;

        return $this;
    }
}

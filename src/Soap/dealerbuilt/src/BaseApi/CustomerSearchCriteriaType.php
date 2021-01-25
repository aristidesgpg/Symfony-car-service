<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing CustomerSearchCriteriaType
 *
 * 
 * XSD Type: CustomerSearchCriteria
 */
class CustomerSearchCriteriaType extends SourcesSearchCriteriaType
{

    /**
     * @var int[] $activityStoreIds
     */
    private $activityStoreIds = null;

    /**
     * @var string $customerNumber
     */
    private $customerNumber = null;

    /**
     * @var string $driverLicenseNumber
     */
    private $driverLicenseNumber = null;

    /**
     * @var \DateTime $maximumUpdateStamp
     */
    private $maximumUpdateStamp = null;

    /**
     * @var \DateTime $minimumUpdateStamp
     */
    private $minimumUpdateStamp = null;

    /**
     * @var string $partialName
     */
    private $partialName = null;

    /**
     * @var string $phone
     */
    private $phone = null;

    /**
     * Adds as long
     *
     * @return self
     * @param int $long
     */
    public function addToActivityStoreIds($long)
    {
        $this->activityStoreIds[] = $long;
        return $this;
    }

    /**
     * isset activityStoreIds
     *
     * @param int|string $index
     * @return bool
     */
    public function issetActivityStoreIds($index)
    {
        return isset($this->activityStoreIds[$index]);
    }

    /**
     * unset activityStoreIds
     *
     * @param int|string $index
     * @return void
     */
    public function unsetActivityStoreIds($index)
    {
        unset($this->activityStoreIds[$index]);
    }

    /**
     * Gets as activityStoreIds
     *
     * @return int[]
     */
    public function getActivityStoreIds()
    {
        return $this->activityStoreIds;
    }

    /**
     * Sets a new activityStoreIds
     *
     * @param int[] $activityStoreIds
     * @return self
     */
    public function setActivityStoreIds(array $activityStoreIds)
    {
        $this->activityStoreIds = $activityStoreIds;
        return $this;
    }

    /**
     * Gets as customerNumber
     *
     * @return string
     */
    public function getCustomerNumber()
    {
        return $this->customerNumber;
    }

    /**
     * Sets a new customerNumber
     *
     * @param string $customerNumber
     * @return self
     */
    public function setCustomerNumber($customerNumber)
    {
        $this->customerNumber = $customerNumber;
        return $this;
    }

    /**
     * Gets as driverLicenseNumber
     *
     * @return string
     */
    public function getDriverLicenseNumber()
    {
        return $this->driverLicenseNumber;
    }

    /**
     * Sets a new driverLicenseNumber
     *
     * @param string $driverLicenseNumber
     * @return self
     */
    public function setDriverLicenseNumber($driverLicenseNumber)
    {
        $this->driverLicenseNumber = $driverLicenseNumber;
        return $this;
    }

    /**
     * Gets as maximumUpdateStamp
     *
     * @return \DateTime
     */
    public function getMaximumUpdateStamp()
    {
        return $this->maximumUpdateStamp;
    }

    /**
     * Sets a new maximumUpdateStamp
     *
     * @param \DateTime $maximumUpdateStamp
     * @return self
     */
    public function setMaximumUpdateStamp(\DateTime $maximumUpdateStamp)
    {
        $this->maximumUpdateStamp = $maximumUpdateStamp;
        return $this;
    }

    /**
     * Gets as minimumUpdateStamp
     *
     * @return \DateTime
     */
    public function getMinimumUpdateStamp()
    {
        return $this->minimumUpdateStamp;
    }

    /**
     * Sets a new minimumUpdateStamp
     *
     * @param \DateTime $minimumUpdateStamp
     * @return self
     */
    public function setMinimumUpdateStamp(\DateTime $minimumUpdateStamp)
    {
        $this->minimumUpdateStamp = $minimumUpdateStamp;
        return $this;
    }

    /**
     * Gets as partialName
     *
     * @return string
     */
    public function getPartialName()
    {
        return $this->partialName;
    }

    /**
     * Sets a new partialName
     *
     * @param string $partialName
     * @return self
     */
    public function setPartialName($partialName)
    {
        $this->partialName = $partialName;
        return $this;
    }

    /**
     * Gets as phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Sets a new phone
     *
     * @param string $phone
     * @return self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }


}


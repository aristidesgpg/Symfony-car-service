<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing RepairOrderSearchCriteriaType
 *
 * 
 * XSD Type: RepairOrderSearchCriteria
 */
class RepairOrderSearchCriteriaType extends ServiceLocationsSearchCriteriaType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\ArrayOfServicePayType[] $closedPayTypes
     */
    private $closedPayTypes = null;

    /**
     * @var string $customerKey
     */
    private $customerKey = null;

    /**
     * @var \DateTime $maximumClosedStamp
     */
    private $maximumClosedStamp = null;

    /**
     * @var \DateTime $maximumOpenedStamp
     */
    private $maximumOpenedStamp = null;

    /**
     * @var \DateTime $maximumUpdateStamp
     */
    private $maximumUpdateStamp = null;

    /**
     * @var \DateTime $minimumClosedStamp
     */
    private $minimumClosedStamp = null;

    /**
     * @var \DateTime $minimumOpenedStamp
     */
    private $minimumOpenedStamp = null;

    /**
     * @var \DateTime $minimumUpdateStamp
     */
    private $minimumUpdateStamp = null;

    /**
     * @var string[] $statuses
     */
    private $statuses = null;

    /**
     * @var string $vin
     */
    private $vin = null;

    /**
     * Adds as arrayOfServicePayType
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Service\ArrayOfServicePayType $arrayOfServicePayType
     */
    public function addToClosedPayTypes(\App\Soap\dealerbuilt\src\Models\Service\ArrayOfServicePayType $arrayOfServicePayType)
    {
        $this->closedPayTypes[] = $arrayOfServicePayType;
        return $this;
    }

    /**
     * isset closedPayTypes
     *
     * @param int|string $index
     * @return bool
     */
    public function issetClosedPayTypes($index)
    {
        return isset($this->closedPayTypes[$index]);
    }

    /**
     * unset closedPayTypes
     *
     * @param int|string $index
     * @return void
     */
    public function unsetClosedPayTypes($index)
    {
        unset($this->closedPayTypes[$index]);
    }

    /**
     * Gets as closedPayTypes
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\ArrayOfServicePayType[]
     */
    public function getClosedPayTypes()
    {
        return $this->closedPayTypes;
    }

    /**
     * Sets a new closedPayTypes
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\ArrayOfServicePayType[] $closedPayTypes
     * @return self
     */
    public function setClosedPayTypes(array $closedPayTypes)
    {
        $this->closedPayTypes = $closedPayTypes;
        return $this;
    }

    /**
     * Gets as customerKey
     *
     * @return string
     */
    public function getCustomerKey()
    {
        return $this->customerKey;
    }

    /**
     * Sets a new customerKey
     *
     * @param string $customerKey
     * @return self
     */
    public function setCustomerKey($customerKey)
    {
        $this->customerKey = $customerKey;
        return $this;
    }

    /**
     * Gets as maximumClosedStamp
     *
     * @return \DateTime
     */
    public function getMaximumClosedStamp()
    {
        return $this->maximumClosedStamp;
    }

    /**
     * Sets a new maximumClosedStamp
     *
     * @param \DateTime $maximumClosedStamp
     * @return self
     */
    public function setMaximumClosedStamp(\DateTime $maximumClosedStamp)
    {
        $this->maximumClosedStamp = $maximumClosedStamp;
        return $this;
    }

    /**
     * Gets as maximumOpenedStamp
     *
     * @return \DateTime
     */
    public function getMaximumOpenedStamp()
    {
        return $this->maximumOpenedStamp;
    }

    /**
     * Sets a new maximumOpenedStamp
     *
     * @param \DateTime $maximumOpenedStamp
     * @return self
     */
    public function setMaximumOpenedStamp(\DateTime $maximumOpenedStamp)
    {
        $this->maximumOpenedStamp = $maximumOpenedStamp;
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
     * Gets as minimumClosedStamp
     *
     * @return \DateTime
     */
    public function getMinimumClosedStamp()
    {
        return $this->minimumClosedStamp;
    }

    /**
     * Sets a new minimumClosedStamp
     *
     * @param \DateTime $minimumClosedStamp
     * @return self
     */
    public function setMinimumClosedStamp(\DateTime $minimumClosedStamp)
    {
        $this->minimumClosedStamp = $minimumClosedStamp;
        return $this;
    }

    /**
     * Gets as minimumOpenedStamp
     *
     * @return \DateTime
     */
    public function getMinimumOpenedStamp()
    {
        return $this->minimumOpenedStamp;
    }

    /**
     * Sets a new minimumOpenedStamp
     *
     * @param \DateTime $minimumOpenedStamp
     * @return self
     */
    public function setMinimumOpenedStamp(\DateTime $minimumOpenedStamp)
    {
        $this->minimumOpenedStamp = $minimumOpenedStamp;
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
     * Adds as repairOrderStatus
     *
     * @return self
     * @param string $repairOrderStatus
     */
    public function addToStatuses($repairOrderStatus)
    {
        $this->statuses[] = $repairOrderStatus;
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

    /**
     * Gets as vin
     *
     * @return string
     */
    public function getVin()
    {
        return $this->vin;
    }

    /**
     * Sets a new vin
     *
     * @param string $vin
     * @return self
     */
    public function setVin($vin)
    {
        $this->vin = $vin;
        return $this;
    }


}


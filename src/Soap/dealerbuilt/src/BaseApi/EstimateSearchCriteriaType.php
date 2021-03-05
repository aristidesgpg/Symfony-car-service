<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing EstimateSearchCriteriaType
 *
 * 
 * XSD Type: EstimateSearchCriteria
 */
class EstimateSearchCriteriaType extends ServiceLocationsSearchCriteriaType
{

    /**
     * @var string $customerKey
     */
    private $customerKey = null;

    /**
     * @var \DateTime $maximumUpdateStamp
     */
    private $maximumUpdateStamp = null;

    /**
     * @var \DateTime $minimumUpdateStamp
     */
    private $minimumUpdateStamp = null;

    /**
     * @var string $vin
     */
    private $vin = null;

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


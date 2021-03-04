<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ProspectSearchCriteriaType
 *
 * 
 * XSD Type: ProspectSearchCriteria
 */
class ProspectSearchCriteriaType extends StoresSearchCriteriaType
{

    /**
     * @var string $driverLicenseNumber
     */
    private $driverLicenseNumber = null;

    /**
     * @var string $partialName
     */
    private $partialName = null;

    /**
     * @var string $phone
     */
    private $phone = null;

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


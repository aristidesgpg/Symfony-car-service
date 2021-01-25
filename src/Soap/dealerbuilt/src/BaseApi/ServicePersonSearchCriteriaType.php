<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ServicePersonSearchCriteriaType.
 *
 * XSD Type: ServicePersonSearchCriteria
 */
class ServicePersonSearchCriteriaType extends ServiceLocationSearchCriteriaType
{
    /**
     * @var string[]
     */
    private $employeeTypes = null;

    /**
     * @var string
     */
    private $status = null;

    /**
     * Adds as servicePersonType.
     *
     * @return self
     *
     * @param string $servicePersonType
     */
    public function addToEmployeeTypes($servicePersonType)
    {
        $this->employeeTypes[] = $servicePersonType;

        return $this;
    }

    /**
     * isset employeeTypes.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetEmployeeTypes($index)
    {
        return isset($this->employeeTypes[$index]);
    }

    /**
     * unset employeeTypes.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetEmployeeTypes($index)
    {
        unset($this->employeeTypes[$index]);
    }

    /**
     * Gets as employeeTypes.
     *
     * @return string[]
     */
    public function getEmployeeTypes()
    {
        return $this->employeeTypes;
    }

    /**
     * Sets a new employeeTypes.
     *
     * @param string $employeeTypes
     *
     * @return self
     */
    public function setEmployeeTypes(array $employeeTypes)
    {
        $this->employeeTypes = $employeeTypes;

        return $this;
    }

    /**
     * Gets as status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets a new status.
     *
     * @param string $status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}

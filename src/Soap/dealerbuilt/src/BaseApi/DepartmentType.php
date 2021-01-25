<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing DepartmentType.
 *
 * XSD Type: Department
 */
class DepartmentType extends ApiCompanyItemType
{
    /**
     * @var string
     */
    private $departmentCode = null;

    /**
     * @var string
     */
    private $description = null;

    /**
     * Gets as departmentCode.
     *
     * @return string
     */
    public function getDepartmentCode()
    {
        return $this->departmentCode;
    }

    /**
     * Sets a new departmentCode.
     *
     * @param string $departmentCode
     *
     * @return self
     */
    public function setDepartmentCode($departmentCode)
    {
        $this->departmentCode = $departmentCode;

        return $this;
    }

    /**
     * Gets as description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets a new description.
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}

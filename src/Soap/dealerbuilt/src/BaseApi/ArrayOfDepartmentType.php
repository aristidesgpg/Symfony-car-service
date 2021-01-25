<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfDepartmentType.
 *
 * XSD Type: ArrayOfDepartment
 */
class ArrayOfDepartmentType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DepartmentType[]
     */
    private $department = [
    ];

    /**
     * Adds as department.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DepartmentType $department
     */
    public function addToDepartment(DepartmentType $department)
    {
        $this->department[] = $department;

        return $this;
    }

    /**
     * isset department.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetDepartment($index)
    {
        return isset($this->department[$index]);
    }

    /**
     * unset department.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetDepartment($index)
    {
        unset($this->department[$index]);
    }

    /**
     * Gets as department.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DepartmentType[]
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Sets a new department.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DepartmentType[] $department
     *
     * @return self
     */
    public function setDepartment(array $department)
    {
        $this->department = $department;

        return $this;
    }
}

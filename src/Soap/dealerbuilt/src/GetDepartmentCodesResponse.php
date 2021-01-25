<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing GetDepartmentCodesResponse.
 */
class GetDepartmentCodesResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DepartmentType[]
     */
    private $getDepartmentCodesResult = null;

    /**
     * Adds as department.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DepartmentType $department
     */
    public function addToGetDepartmentCodesResult(BaseApi\DepartmentType $department)
    {
        $this->getDepartmentCodesResult[] = $department;

        return $this;
    }

    /**
     * isset getDepartmentCodesResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetGetDepartmentCodesResult($index)
    {
        return isset($this->getDepartmentCodesResult[$index]);
    }

    /**
     * unset getDepartmentCodesResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetGetDepartmentCodesResult($index)
    {
        unset($this->getDepartmentCodesResult[$index]);
    }

    /**
     * Gets as getDepartmentCodesResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DepartmentType[]
     */
    public function getGetDepartmentCodesResult()
    {
        return $this->getDepartmentCodesResult;
    }

    /**
     * Sets a new getDepartmentCodesResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DepartmentType[] $getDepartmentCodesResult
     *
     * @return self
     */
    public function setGetDepartmentCodesResult(array $getDepartmentCodesResult)
    {
        $this->getDepartmentCodesResult = $getDepartmentCodesResult;

        return $this;
    }
}

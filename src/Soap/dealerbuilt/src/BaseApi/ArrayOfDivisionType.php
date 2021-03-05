<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfDivisionType
 *
 * 
 * XSD Type: ArrayOfDivision
 */
class ArrayOfDivisionType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DivisionType[] $division
     */
    private $division = [
        
    ];

    /**
     * Adds as division
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\DivisionType $division
     */
    public function addToDivision(\App\Soap\dealerbuilt\src\BaseApi\DivisionType $division)
    {
        $this->division[] = $division;
        return $this;
    }

    /**
     * isset division
     *
     * @param int|string $index
     * @return bool
     */
    public function issetDivision($index)
    {
        return isset($this->division[$index]);
    }

    /**
     * unset division
     *
     * @param int|string $index
     * @return void
     */
    public function unsetDivision($index)
    {
        unset($this->division[$index]);
    }

    /**
     * Gets as division
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DivisionType[]
     */
    public function getDivision()
    {
        return $this->division;
    }

    /**
     * Sets a new division
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DivisionType[] $division
     * @return self
     */
    public function setDivision(array $division)
    {
        $this->division = $division;
        return $this;
    }


}


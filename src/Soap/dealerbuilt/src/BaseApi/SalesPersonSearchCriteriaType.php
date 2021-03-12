<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing SalesPersonSearchCriteriaType
 *
 * 
 * XSD Type: SalesPersonSearchCriteria
 */
class SalesPersonSearchCriteriaType extends StoresSearchCriteriaType
{

    /**
     * @var string $status
     */
    private $status = null;

    /**
     * @var string[] $types
     */
    private $types = null;

    /**
     * Gets as status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets a new status
     *
     * @param string $status
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Adds as salesPersonType
     *
     * @return self
     * @param string $salesPersonType
     */
    public function addToTypes($salesPersonType)
    {
        $this->types[] = $salesPersonType;
        return $this;
    }

    /**
     * isset types
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTypes($index)
    {
        return isset($this->types[$index]);
    }

    /**
     * unset types
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTypes($index)
    {
        unset($this->types[$index]);
    }

    /**
     * Gets as types
     *
     * @return string[]
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * Sets a new types
     *
     * @param string $types
     * @return self
     */
    public function setTypes(array $types)
    {
        $this->types = $types;
        return $this;
    }


}


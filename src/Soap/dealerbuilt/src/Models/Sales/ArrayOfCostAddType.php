<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing ArrayOfCostAddType
 *
 * 
 * XSD Type: ArrayOfCostAdd
 */
class ArrayOfCostAddType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\CostAddType[] $costAdd
     */
    private $costAdd = [
        
    ];

    /**
     * Adds as costAdd
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Sales\CostAddType $costAdd
     */
    public function addToCostAdd(\App\Soap\dealerbuilt\src\Models\Sales\CostAddType $costAdd)
    {
        $this->costAdd[] = $costAdd;
        return $this;
    }

    /**
     * isset costAdd
     *
     * @param int|string $index
     * @return bool
     */
    public function issetCostAdd($index)
    {
        return isset($this->costAdd[$index]);
    }

    /**
     * unset costAdd
     *
     * @param int|string $index
     * @return void
     */
    public function unsetCostAdd($index)
    {
        unset($this->costAdd[$index]);
    }

    /**
     * Gets as costAdd
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\CostAddType[]
     */
    public function getCostAdd()
    {
        return $this->costAdd;
    }

    /**
     * Sets a new costAdd
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\CostAddType[] $costAdd
     * @return self
     */
    public function setCostAdd(array $costAdd)
    {
        $this->costAdd = $costAdd;
        return $this;
    }


}


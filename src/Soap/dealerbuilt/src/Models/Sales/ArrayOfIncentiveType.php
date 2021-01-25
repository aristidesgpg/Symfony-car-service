<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing ArrayOfIncentiveType
 *
 * 
 * XSD Type: ArrayOfIncentive
 */
class ArrayOfIncentiveType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\IncentiveType[] $incentive
     */
    private $incentive = [
        
    ];

    /**
     * Adds as incentive
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Sales\IncentiveType $incentive
     */
    public function addToIncentive(\App\Soap\dealerbuilt\src\Models\Sales\IncentiveType $incentive)
    {
        $this->incentive[] = $incentive;
        return $this;
    }

    /**
     * isset incentive
     *
     * @param int|string $index
     * @return bool
     */
    public function issetIncentive($index)
    {
        return isset($this->incentive[$index]);
    }

    /**
     * unset incentive
     *
     * @param int|string $index
     * @return void
     */
    public function unsetIncentive($index)
    {
        unset($this->incentive[$index]);
    }

    /**
     * Gets as incentive
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\IncentiveType[]
     */
    public function getIncentive()
    {
        return $this->incentive;
    }

    /**
     * Sets a new incentive
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\IncentiveType[] $incentive
     * @return self
     */
    public function setIncentive(array $incentive)
    {
        $this->incentive = $incentive;
        return $this;
    }


}


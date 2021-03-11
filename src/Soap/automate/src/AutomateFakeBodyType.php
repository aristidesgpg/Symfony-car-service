<?php

namespace App\Soap\automate\src;

/**
 * Class representing AutomateFakeBodyType
 */
class AutomateFakeBodyType
{

    /**
     * @var \App\Soap\automate\src\RepairOrder[] $repairOrder
     */
    private $repairOrder = [];

    /**
     * Adds as repairOrder
     *
     * @return self
     * @param \App\Soap\automate\src\RepairOrder $repairOrder
     */
    public function addToRepairOrder(\App\Soap\automate\src\RepairOrder $repairOrder)
    {
        $this->repairOrder[] = $repairOrder;
        return $this;
    }

    /**
     * isset repairOrder
     *
     * @param int|string $index
     * @return bool
     */
    public function issetRepairOrder($index)
    {
        return isset($this->repairOrder[$index]);
    }

    /**
     * unset repairOrder
     *
     * @param int|string $index
     * @return void
     */
    public function unsetRepairOrder($index)
    {
        unset($this->repairOrder[$index]);
    }

    /**
     * Gets as repairOrder
     *
     * @return \App\Soap\automate\src\RepairOrder[]
     */
    public function getRepairOrder()
    {
        return $this->repairOrder;
    }

    /**
     * Sets a new repairOrder
     *
     * @param \App\Soap\automate\src\RepairOrder[] $repairOrder
     * @return self
     */
    public function setRepairOrder(array $repairOrder)
    {
        $this->repairOrder = $repairOrder;
        return $this;
    }


}


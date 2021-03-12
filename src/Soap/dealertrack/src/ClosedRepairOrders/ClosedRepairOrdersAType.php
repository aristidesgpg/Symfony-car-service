<?php

namespace App\Soap\dealertrack\src\ClosedRepairOrders;

/**
 * Class representing ClosedRepairOrdersAType
 */
class ClosedRepairOrdersAType
{

    /**
     * @var \App\Soap\dealertrack\src\ClosedRepairOrder[] $closedRepairOrder
     */
    private $closedRepairOrder = [
        
    ];

    /**
     * Adds as closedRepairOrder
     *
     * @return self
     * @param \App\Soap\dealertrack\src\ClosedRepairOrder $closedRepairOrder
     */
    public function addToClosedRepairOrder(\App\Soap\dealertrack\src\ClosedRepairOrder $closedRepairOrder)
    {
        $this->closedRepairOrder[] = $closedRepairOrder;
        return $this;
    }

    /**
     * isset closedRepairOrder
     *
     * @param int|string $index
     * @return bool
     */
    public function issetClosedRepairOrder($index)
    {
        return isset($this->closedRepairOrder[$index]);
    }

    /**
     * unset closedRepairOrder
     *
     * @param int|string $index
     * @return void
     */
    public function unsetClosedRepairOrder($index)
    {
        unset($this->closedRepairOrder[$index]);
    }

    /**
     * Gets as closedRepairOrder
     *
     * @return \App\Soap\dealertrack\src\ClosedRepairOrder[]
     */
    public function getClosedRepairOrder()
    {
        return $this->closedRepairOrder;
    }

    /**
     * Sets a new closedRepairOrder
     *
     * @param \App\Soap\dealertrack\src\ClosedRepairOrder[] $closedRepairOrder
     * @return self
     */
    public function setClosedRepairOrder(array $closedRepairOrder)
    {
        $this->closedRepairOrder = $closedRepairOrder;
        return $this;
    }


}


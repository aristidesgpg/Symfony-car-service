<?php

namespace App\Soap\dealertrack\src;

/**
 * Class representing GetClosedRepairOrdersResult
 */
class GetClosedRepairOrdersResult
{

    /**
     * @var \App\Soap\dealertrack\src\ClosedRepairOrder[] $closedRepairOrders
     */
    private $closedRepairOrders = null;

    /**
     * Adds as closedRepairOrder
     *
     * @return self
     * @param \App\Soap\dealertrack\src\ClosedRepairOrder $closedRepairOrder
     */
    public function addToClosedRepairOrders(\App\Soap\dealertrack\src\ClosedRepairOrder $closedRepairOrder)
    {
        $this->closedRepairOrders[] = $closedRepairOrder;
        return $this;
    }

    /**
     * isset closedRepairOrders
     *
     * @param int|string $index
     * @return bool
     */
    public function issetClosedRepairOrders($index)
    {
        return isset($this->closedRepairOrders[$index]);
    }

    /**
     * unset closedRepairOrders
     *
     * @param int|string $index
     * @return void
     */
    public function unsetClosedRepairOrders($index)
    {
        unset($this->closedRepairOrders[$index]);
    }

    /**
     * Gets as closedRepairOrders
     *
     * @return \App\Soap\dealertrack\src\ClosedRepairOrder[]
     */
    public function getClosedRepairOrders()
    {
        return $this->closedRepairOrders;
    }

    /**
     * Sets a new closedRepairOrders
     *
     * @param \App\Soap\dealertrack\src\ClosedRepairOrder[] $closedRepairOrders
     * @return self
     */
    public function setClosedRepairOrders(array $closedRepairOrders)
    {
        $this->closedRepairOrders = $closedRepairOrders;
        return $this;
    }


}


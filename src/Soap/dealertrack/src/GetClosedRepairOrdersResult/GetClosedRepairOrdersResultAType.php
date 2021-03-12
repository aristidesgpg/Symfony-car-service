<?php

namespace App\Soap\dealertrack\src\GetClosedRepairOrdersResult;

/**
 * Class representing GetClosedRepairOrdersResultAType
 */
class GetClosedRepairOrdersResultAType
{

    /**
     * @var \App\Soap\dealertrack\src\ClosedRepairOrders[] $closedRepairOrders
     */
    private $closedRepairOrders = [
        
    ];

    /**
     * Adds as closedRepairOrders
     *
     * @return self
     * @param \App\Soap\dealertrack\src\ClosedRepairOrders $closedRepairOrders
     */
    public function addToClosedRepairOrders(\App\Soap\dealertrack\src\ClosedRepairOrders $closedRepairOrders)
    {
        $this->closedRepairOrders[] = $closedRepairOrders;
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
     * @return \App\Soap\dealertrack\src\ClosedRepairOrders[]
     */
    public function getClosedRepairOrders()
    {
        return $this->closedRepairOrders;
    }

    /**
     * Sets a new closedRepairOrders
     *
     * @param \App\Soap\dealertrack\src\ClosedRepairOrders[] $closedRepairOrders
     * @return self
     */
    public function setClosedRepairOrders(array $closedRepairOrders)
    {
        $this->closedRepairOrders = $closedRepairOrders;
        return $this;
    }


}


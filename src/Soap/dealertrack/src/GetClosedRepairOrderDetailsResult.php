<?php

namespace App\Soap\dealertrack\src;

/**
 * Class representing GetClosedRepairOrderDetailsResult
 */
class GetClosedRepairOrderDetailsResult
{

    /**
     * @var \App\Soap\dealertrack\src\ClosedRepairOrder $closedRepairOrder
     */
    private $closedRepairOrder = null;

    /**
     * Gets as closedRepairOrder
     *
     * @return \App\Soap\dealertrack\src\ClosedRepairOrder
     */
    public function getClosedRepairOrder()
    {
        return $this->closedRepairOrder;
    }

    /**
     * Sets a new closedRepairOrder
     *
     * @param \App\Soap\dealertrack\src\ClosedRepairOrder $closedRepairOrder
     * @return self
     */
    public function setClosedRepairOrder(\App\Soap\dealertrack\src\ClosedRepairOrder $closedRepairOrder)
    {
        $this->closedRepairOrder = $closedRepairOrder;
        return $this;
    }


}


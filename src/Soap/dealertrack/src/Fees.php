<?php

namespace App\Soap\dealertrack\src;

/**
 * Class representing Fees
 */
class Fees
{

    /**
     * @var \App\Soap\dealertrack\src\RepairOrderFee $repairOrderFee
     */
    private $repairOrderFee = null;

    /**
     * Gets as repairOrderFee
     *
     * @return \App\Soap\dealertrack\src\RepairOrderFee
     */
    public function getRepairOrderFee()
    {
        return $this->repairOrderFee;
    }

    /**
     * Sets a new repairOrderFee
     *
     * @param \App\Soap\dealertrack\src\RepairOrderFee $repairOrderFee
     * @return self
     */
    public function setRepairOrderFee(\App\Soap\dealertrack\src\RepairOrderFee $repairOrderFee)
    {
        $this->repairOrderFee = $repairOrderFee;
        return $this;
    }


}


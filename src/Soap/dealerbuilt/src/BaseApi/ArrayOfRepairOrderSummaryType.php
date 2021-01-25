<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfRepairOrderSummaryType
 *
 * 
 * XSD Type: ArrayOfRepairOrderSummary
 */
class ArrayOfRepairOrderSummaryType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\RepairOrderSummaryType[] $repairOrderSummary
     */
    private $repairOrderSummary = [
        
    ];

    /**
     * Adds as repairOrderSummary
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderSummaryType $repairOrderSummary
     */
    public function addToRepairOrderSummary(\App\Soap\dealerbuilt\src\BaseApi\RepairOrderSummaryType $repairOrderSummary)
    {
        $this->repairOrderSummary[] = $repairOrderSummary;
        return $this;
    }

    /**
     * isset repairOrderSummary
     *
     * @param int|string $index
     * @return bool
     */
    public function issetRepairOrderSummary($index)
    {
        return isset($this->repairOrderSummary[$index]);
    }

    /**
     * unset repairOrderSummary
     *
     * @param int|string $index
     * @return void
     */
    public function unsetRepairOrderSummary($index)
    {
        unset($this->repairOrderSummary[$index]);
    }

    /**
     * Gets as repairOrderSummary
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\RepairOrderSummaryType[]
     */
    public function getRepairOrderSummary()
    {
        return $this->repairOrderSummary;
    }

    /**
     * Sets a new repairOrderSummary
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderSummaryType[] $repairOrderSummary
     * @return self
     */
    public function setRepairOrderSummary(array $repairOrderSummary)
    {
        $this->repairOrderSummary = $repairOrderSummary;
        return $this;
    }


}


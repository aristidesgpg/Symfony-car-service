<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfRepairOrderType.
 *
 * XSD Type: ArrayOfRepairOrder
 */
class ArrayOfRepairOrderType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\RepairOrderType[]
     */
    private $repairOrder = [
    ];

    /**
     * Adds as repairOrder.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderType $repairOrder
     */
    public function addToRepairOrder(RepairOrderType $repairOrder)
    {
        $this->repairOrder[] = $repairOrder;

        return $this;
    }

    /**
     * isset repairOrder.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetRepairOrder($index)
    {
        return isset($this->repairOrder[$index]);
    }

    /**
     * unset repairOrder.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetRepairOrder($index)
    {
        unset($this->repairOrder[$index]);
    }

    /**
     * Gets as repairOrder.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\RepairOrderType[]
     */
    public function getRepairOrder()
    {
        return $this->repairOrder;
    }

    /**
     * Sets a new repairOrder.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderType[] $repairOrder
     *
     * @return self
     */
    public function setRepairOrder(array $repairOrder)
    {
        $this->repairOrder = $repairOrder;

        return $this;
    }
}

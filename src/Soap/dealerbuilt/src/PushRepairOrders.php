<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushRepairOrders.
 */
class PushRepairOrders
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPushRequestType[]
     */
    private $repairOrders = null;

    /**
     * Adds as repairOrderPushRequest.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPushRequestType $repairOrderPushRequest
     */
    public function addToRepairOrders(BaseApi\RepairOrderPushRequestType $repairOrderPushRequest)
    {
        $this->repairOrders[] = $repairOrderPushRequest;

        return $this;
    }

    /**
     * isset repairOrders.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetRepairOrders($index)
    {
        return isset($this->repairOrders[$index]);
    }

    /**
     * unset repairOrders.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetRepairOrders($index)
    {
        unset($this->repairOrders[$index]);
    }

    /**
     * Gets as repairOrders.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPushRequestType[]
     */
    public function getRepairOrders()
    {
        return $this->repairOrders;
    }

    /**
     * Sets a new repairOrders.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPushRequestType[] $repairOrders
     *
     * @return self
     */
    public function setRepairOrders(array $repairOrders)
    {
        $this->repairOrders = $repairOrders;

        return $this;
    }
}

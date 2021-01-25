<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushRepairOrdersFromAppointmentsResponse.
 */
class PushRepairOrdersFromAppointmentsResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPushResponseType[]
     */
    private $pushRepairOrdersFromAppointmentsResult = null;

    /**
     * Adds as repairOrderPushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPushResponseType $repairOrderPushResponse
     */
    public function addToPushRepairOrdersFromAppointmentsResult(BaseApi\RepairOrderPushResponseType $repairOrderPushResponse)
    {
        $this->pushRepairOrdersFromAppointmentsResult[] = $repairOrderPushResponse;

        return $this;
    }

    /**
     * isset pushRepairOrdersFromAppointmentsResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPushRepairOrdersFromAppointmentsResult($index)
    {
        return isset($this->pushRepairOrdersFromAppointmentsResult[$index]);
    }

    /**
     * unset pushRepairOrdersFromAppointmentsResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPushRepairOrdersFromAppointmentsResult($index)
    {
        unset($this->pushRepairOrdersFromAppointmentsResult[$index]);
    }

    /**
     * Gets as pushRepairOrdersFromAppointmentsResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPushResponseType[]
     */
    public function getPushRepairOrdersFromAppointmentsResult()
    {
        return $this->pushRepairOrdersFromAppointmentsResult;
    }

    /**
     * Sets a new pushRepairOrdersFromAppointmentsResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPushResponseType[] $pushRepairOrdersFromAppointmentsResult
     *
     * @return self
     */
    public function setPushRepairOrdersFromAppointmentsResult(array $pushRepairOrdersFromAppointmentsResult)
    {
        $this->pushRepairOrdersFromAppointmentsResult = $pushRepairOrdersFromAppointmentsResult;

        return $this;
    }
}

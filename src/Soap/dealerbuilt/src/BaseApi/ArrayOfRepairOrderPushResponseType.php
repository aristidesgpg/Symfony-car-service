<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfRepairOrderPushResponseType.
 *
 * XSD Type: ArrayOfRepairOrderPushResponse
 */
class ArrayOfRepairOrderPushResponseType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPushResponseType[]
     */
    private $repairOrderPushResponse = [
    ];

    /**
     * Adds as repairOrderPushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPushResponseType $repairOrderPushResponse
     */
    public function addToRepairOrderPushResponse(RepairOrderPushResponseType $repairOrderPushResponse)
    {
        $this->repairOrderPushResponse[] = $repairOrderPushResponse;

        return $this;
    }

    /**
     * isset repairOrderPushResponse.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetRepairOrderPushResponse($index)
    {
        return isset($this->repairOrderPushResponse[$index]);
    }

    /**
     * unset repairOrderPushResponse.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetRepairOrderPushResponse($index)
    {
        unset($this->repairOrderPushResponse[$index]);
    }

    /**
     * Gets as repairOrderPushResponse.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPushResponseType[]
     */
    public function getRepairOrderPushResponse()
    {
        return $this->repairOrderPushResponse;
    }

    /**
     * Sets a new repairOrderPushResponse.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPushResponseType[] $repairOrderPushResponse
     *
     * @return self
     */
    public function setRepairOrderPushResponse(array $repairOrderPushResponse)
    {
        $this->repairOrderPushResponse = $repairOrderPushResponse;

        return $this;
    }
}

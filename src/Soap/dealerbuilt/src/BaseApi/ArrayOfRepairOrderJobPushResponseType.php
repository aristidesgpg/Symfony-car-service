<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfRepairOrderJobPushResponseType.
 *
 * XSD Type: ArrayOfRepairOrderJobPushResponse
 */
class ArrayOfRepairOrderJobPushResponseType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\RepairOrderJobPushResponseType[]
     */
    private $repairOrderJobPushResponse = [
    ];

    /**
     * Adds as repairOrderJobPushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderJobPushResponseType $repairOrderJobPushResponse
     */
    public function addToRepairOrderJobPushResponse(RepairOrderJobPushResponseType $repairOrderJobPushResponse)
    {
        $this->repairOrderJobPushResponse[] = $repairOrderJobPushResponse;

        return $this;
    }

    /**
     * isset repairOrderJobPushResponse.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetRepairOrderJobPushResponse($index)
    {
        return isset($this->repairOrderJobPushResponse[$index]);
    }

    /**
     * unset repairOrderJobPushResponse.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetRepairOrderJobPushResponse($index)
    {
        unset($this->repairOrderJobPushResponse[$index]);
    }

    /**
     * Gets as repairOrderJobPushResponse.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\RepairOrderJobPushResponseType[]
     */
    public function getRepairOrderJobPushResponse()
    {
        return $this->repairOrderJobPushResponse;
    }

    /**
     * Sets a new repairOrderJobPushResponse.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderJobPushResponseType[] $repairOrderJobPushResponse
     *
     * @return self
     */
    public function setRepairOrderJobPushResponse(array $repairOrderJobPushResponse)
    {
        $this->repairOrderJobPushResponse = $repairOrderJobPushResponse;

        return $this;
    }
}

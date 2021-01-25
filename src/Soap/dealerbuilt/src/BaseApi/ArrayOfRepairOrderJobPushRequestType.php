<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfRepairOrderJobPushRequestType
 *
 * 
 * XSD Type: ArrayOfRepairOrderJobPushRequest
 */
class ArrayOfRepairOrderJobPushRequestType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\RepairOrderJobPushRequestType[] $repairOrderJobPushRequest
     */
    private $repairOrderJobPushRequest = [
        
    ];

    /**
     * Adds as repairOrderJobPushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderJobPushRequestType $repairOrderJobPushRequest
     */
    public function addToRepairOrderJobPushRequest(\App\Soap\dealerbuilt\src\BaseApi\RepairOrderJobPushRequestType $repairOrderJobPushRequest)
    {
        $this->repairOrderJobPushRequest[] = $repairOrderJobPushRequest;
        return $this;
    }

    /**
     * isset repairOrderJobPushRequest
     *
     * @param int|string $index
     * @return bool
     */
    public function issetRepairOrderJobPushRequest($index)
    {
        return isset($this->repairOrderJobPushRequest[$index]);
    }

    /**
     * unset repairOrderJobPushRequest
     *
     * @param int|string $index
     * @return void
     */
    public function unsetRepairOrderJobPushRequest($index)
    {
        unset($this->repairOrderJobPushRequest[$index]);
    }

    /**
     * Gets as repairOrderJobPushRequest
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\RepairOrderJobPushRequestType[]
     */
    public function getRepairOrderJobPushRequest()
    {
        return $this->repairOrderJobPushRequest;
    }

    /**
     * Sets a new repairOrderJobPushRequest
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderJobPushRequestType[] $repairOrderJobPushRequest
     * @return self
     */
    public function setRepairOrderJobPushRequest(array $repairOrderJobPushRequest)
    {
        $this->repairOrderJobPushRequest = $repairOrderJobPushRequest;
        return $this;
    }


}


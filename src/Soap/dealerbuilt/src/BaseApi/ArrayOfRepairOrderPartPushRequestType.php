<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfRepairOrderPartPushRequestType
 *
 * 
 * XSD Type: ArrayOfRepairOrderPartPushRequest
 */
class ArrayOfRepairOrderPartPushRequestType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPartPushRequestType[] $repairOrderPartPushRequest
     */
    private $repairOrderPartPushRequest = [
        
    ];

    /**
     * Adds as repairOrderPartPushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPartPushRequestType $repairOrderPartPushRequest
     */
    public function addToRepairOrderPartPushRequest(\App\Soap\dealerbuilt\src\BaseApi\RepairOrderPartPushRequestType $repairOrderPartPushRequest)
    {
        $this->repairOrderPartPushRequest[] = $repairOrderPartPushRequest;
        return $this;
    }

    /**
     * isset repairOrderPartPushRequest
     *
     * @param int|string $index
     * @return bool
     */
    public function issetRepairOrderPartPushRequest($index)
    {
        return isset($this->repairOrderPartPushRequest[$index]);
    }

    /**
     * unset repairOrderPartPushRequest
     *
     * @param int|string $index
     * @return void
     */
    public function unsetRepairOrderPartPushRequest($index)
    {
        unset($this->repairOrderPartPushRequest[$index]);
    }

    /**
     * Gets as repairOrderPartPushRequest
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPartPushRequestType[]
     */
    public function getRepairOrderPartPushRequest()
    {
        return $this->repairOrderPartPushRequest;
    }

    /**
     * Sets a new repairOrderPartPushRequest
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPartPushRequestType[] $repairOrderPartPushRequest
     * @return self
     */
    public function setRepairOrderPartPushRequest(array $repairOrderPartPushRequest)
    {
        $this->repairOrderPartPushRequest = $repairOrderPartPushRequest;
        return $this;
    }


}


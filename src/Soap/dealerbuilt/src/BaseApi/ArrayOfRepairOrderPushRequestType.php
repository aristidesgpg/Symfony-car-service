<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfRepairOrderPushRequestType
 *
 * 
 * XSD Type: ArrayOfRepairOrderPushRequest
 */
class ArrayOfRepairOrderPushRequestType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPushRequestType[] $repairOrderPushRequest
     */
    private $repairOrderPushRequest = [
        
    ];

    /**
     * Adds as repairOrderPushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPushRequestType $repairOrderPushRequest
     */
    public function addToRepairOrderPushRequest(\App\Soap\dealerbuilt\src\BaseApi\RepairOrderPushRequestType $repairOrderPushRequest)
    {
        $this->repairOrderPushRequest[] = $repairOrderPushRequest;
        return $this;
    }

    /**
     * isset repairOrderPushRequest
     *
     * @param int|string $index
     * @return bool
     */
    public function issetRepairOrderPushRequest($index)
    {
        return isset($this->repairOrderPushRequest[$index]);
    }

    /**
     * unset repairOrderPushRequest
     *
     * @param int|string $index
     * @return void
     */
    public function unsetRepairOrderPushRequest($index)
    {
        unset($this->repairOrderPushRequest[$index]);
    }

    /**
     * Gets as repairOrderPushRequest
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPushRequestType[]
     */
    public function getRepairOrderPushRequest()
    {
        return $this->repairOrderPushRequest;
    }

    /**
     * Sets a new repairOrderPushRequest
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderPushRequestType[] $repairOrderPushRequest
     * @return self
     */
    public function setRepairOrderPushRequest(array $repairOrderPushRequest)
    {
        $this->repairOrderPushRequest = $repairOrderPushRequest;
        return $this;
    }


}


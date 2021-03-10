<?php


namespace App\Soap\dealerbuilt\src;


class DealerBuiltSoapEnvelopeBodyByKey
{

    /**
     * @var \App\Soap\dealerbuilt\src\PullRepairOrdersByKeyResponse  $pullRepairOrdersByKeyResponse
     */
    private $pullRepairOrdersByKeyResponse;


    /**
     * Adds as repairOrder
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderType $repairOrder
     */
    public function addToPullRepairOrdersByKeyResponse(\App\Soap\dealerbuilt\src\BaseApi\PullRepairOrdersByKeyResponse $pullRepairOrdersByKeyResponse)
    {
        $this->pullRepairOrdersByKeyResponse[] = $pullRepairOrdersByKeyResponse;
        return $this;
    }

    /**
     * isset pullRepairOrdersByKeyResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullRepairOrdersByKeyResult($index)
    {
        return isset($this->pullRepairOrdersByKeyResult[$index]);
    }

    /**
     * unset pullRepairOrdersByKeyResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullRepairOrdersByKeyResponse($index)
    {
        unset($this->pullRepairOrdersByKeyResponse[$index]);
    }


    /**
     * @return PullRepairOrdersByKeyResponse
     */
    public function getPullRepairOrdersByKeyResponse(): PullRepairOrdersByKeyResponse
    {
        return $this->pullRepairOrdersByKeyResponse;
    }

    /**
     * @param PullRepairOrdersByKeyResponse $pullRepairOrdersByKeyResponse
     */
    public function setPullRepairOrdersByKeyResponse(PullRepairOrdersByKeyResponse $pullRepairOrdersByKeyResponse): void
    {
        $this->pullRepairOrdersByKeyResponse = $pullRepairOrdersByKeyResponse;
    }





}
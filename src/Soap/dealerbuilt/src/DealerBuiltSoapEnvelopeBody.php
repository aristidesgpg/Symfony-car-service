<?php


namespace App\Soap\dealerbuilt\src;


class DealerBuiltSoapEnvelopeBody
{

    /**
     * @var \App\Soap\dealerbuilt\src\PullRepairOrdersResponse  $pullRepairOrdersResponse
     */
    private $pullRepairOrdersResponse;


    /**
     * Adds as repairOrder
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderType $repairOrder
     */
    public function addToPullRepairOrdersResponse(\App\Soap\dealerbuilt\src\BaseApi\PullRepairOrdersResponse $pullRepairOrdersResponse)
    {
        $this->pullRepairOrdersResponse[] = $pullRepairOrdersResponse;
        return $this;
    }

    /**
     * isset pullRepairOrdersResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullRepairOrdersResult($index)
    {
        return isset($this->pullRepairOrdersResult[$index]);
    }

    /**
     * unset pullRepairOrdersResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullRepairOrdersResponse($index)
    {
        unset($this->PullRepairOrdersResponse[$index]);
    }


    /**
     * @return PullRepairOrdersResponse
     */
    public function getPullRepairOrdersResponse(): PullRepairOrdersResponse
    {
        return $this->pullRepairOrdersResponse;
    }

    /**
     * @param PullRepairOrdersResponse $pullRepairOrdersResponse
     */
    public function setPullRepairOrdersResponse(PullRepairOrdersResponse $pullRepairOrdersResponse): void
    {
        $this->pullRepairOrdersResponse = $pullRepairOrdersResponse;
    }





}
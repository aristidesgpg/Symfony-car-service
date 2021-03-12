<?php


namespace App\Soap\dealerbuilt\src;


class DealerBuiltSoapEnvelopeBodyByNumber
{

    /**
     * @var \App\Soap\dealerbuilt\src\PullRepairOrderByNumberResponse  $pullRepairOrderByNumberResponse
     */
    private $pullRepairOrderByNumberResponse;


    /**
     * Adds as repairOrder
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderType $repairOrder
     */
    public function addToPullRepairOrderByNumberResponse(\App\Soap\dealerbuilt\src\BaseApi\PullRepairOrderByNumberResponse $pullRepairOrderByNumberResponse)
    {
        $this->pullRepairOrderByNumberResponse[] = $pullRepairOrderByNumberResponse;
        return $this;
    }

    /**
     * isset pullRepairOrderByNumberResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullRepairOrderByNumberResult($index)
    {
        return isset($this->pullRepairOrderByNumberResult[$index]);
    }

    /**
     * unset pullRepairOrderByNumberResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullRepairOrderByNumberResponse($index)
    {
        unset($this->pullRepairOrderByNumberResponse[$index]);
    }


    /**
     * @return PullRepairOrderByNumberResponse
     */
    public function getPullRepairOrderByNumberResponse(): PullRepairOrderByNumberResponse
    {
        return $this->pullRepairOrderByNumberResponse;
    }

    /**
     * @param PullRepairOrderByNumberResponse $pullRepairOrderByNumberResponse
     */
    public function setPullRepairOrderByNumberResponse(PullRepairOrderByNumberResponse $pullRepairOrderByNumberResponse): void
    {
        $this->pullRepairOrderByNumberResponse = $pullRepairOrderByNumberResponse;
    }





}
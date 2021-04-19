<?php


namespace App\Soap\dealerbuilt\src;


class DealerBuiltSoapEnvelopeBodyEstimateJobCodes
{

    /**
     * @var \App\Soap\dealerbuilt\src\GetEstimateJobCodesResponse  $getEstimateJobCodesResponse
     */
    private $getEstimateJobCodesResponse;


//    /**
//     * Adds as repairOrder
//     *
//     * @return self
//     * @param \App\Soap\dealerbuilt\src\BaseApi\RepairOrderType $repairOrder
//     */
//    public function addToPullRepairOrderByNumberResponse(\App\Soap\dealerbuilt\src\BaseApi\PullRepairOrderByNumberResponse $pullRepairOrderByNumberResponse)
//    {
//        $this->getEstimateJobCodesResponse[] = $pullRepairOrderByNumberResponse;
//        return $this;
//    }

//    /**
//     * isset pullRepairOrderByNumberResult
//     *
//     * @param int|string $index
//     * @return bool
//     */
//    public function issetPullRepairOrderByNumberResult($index)
//    {
//        return isset($this->pullRepairOrderByNumberResult[$index]);
//    }
//
//    /**
//     * unset pullRepairOrderByNumberResult
//     *
//     * @param int|string $index
//     * @return void
//     */
//    public function unsetPullRepairOrderByNumberResponse($index)
//    {
//        unset($this->getEstimateJobCodesResponse[$index]);
//    }


    /**
     * @return GetEstimateJobCodesResponse
     */
    public function getGetEstimateJobCodesResponse(): GetEstimateJobCodesResponse
    {
        return $this->getEstimateJobCodesResponse;
    }

    /**
     * @param GetEstimateJobCodesResponse $getEstimateJobCodesResponse
     */
    public function setGetEstimateJobCodesResponse(GetEstimateJobCodesResponse $getEstimateJobCodesResponse): void
    {
        $this->getEstimateJobCodesResponse = $getEstimateJobCodesResponse;
    }





}
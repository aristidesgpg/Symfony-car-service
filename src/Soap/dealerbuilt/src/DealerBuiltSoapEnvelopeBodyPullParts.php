<?php


namespace App\Soap\dealerbuilt\src;


class DealerBuiltSoapEnvelopeBodyPullParts
{

    /**
     * @var \App\Soap\dealerbuilt\src\PullPartsResponse  $pullPartsResponse
     */
    private $pullPartsResponse;


    /**
     * Adds as repairOrder
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\InventoryPartType $repairOrder
     */
    public function addToPullPartsResponse(\App\Soap\dealerbuilt\src\BaseApi\InventoryPartType $pullPartsResponse)
    {
        $this->pullPartsResponse[] = $pullPartsResponse;
        return $this;
    }

    /**
     * isset pullRepairOrdersResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullPartsResult($index)
    {
        return isset($this->pullPartsResponse[$index]);
    }

    /**
     * unset pullRepairOrdersResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullPartsResponse($index)
    {
        unset($this->pullPartsResponse[$index]);
    }


    /**
     * @return PullPartsResponse
     */
    public function getPullPartsResponse(): PullPartsResponse
    {
        return $this->pullPartsResponse;
    }

    /**
     * @param PullPartsResponse $pullPartsResponse
     */
    public function setPullPartsResponse(PullPartsResponse $pullPartsResponse): void
    {
        $this->pullPartsResponse = $pullPartsResponse;
    }





}
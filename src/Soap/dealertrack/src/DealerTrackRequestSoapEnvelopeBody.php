<?php


namespace App\Soap\dealertrack\src;


class DealerTrackRequestSoapEnvelopeBody
{

    /**
     * @var \App\Soap\dealertrack\src\GetClosedRepairOrdersResponse  $getClosedRepairOrdersResponse
     */
    private $getClosedRepairOrdersResponse;


    /**
     * Adds as resiult
     *
     * @return self
     * @param \App\Soap\dealertrack\src\GetClosedRepairOrdersResponse $result
     */
    public function addToGetClosedRepairOrderLookupResult(\App\Soap\dealertrack\src\GetClosedRepairOrdersResponse $result)
    {
        $this->getClosedRepairOrdersResponse[] = $result;
        return $this;
    }

    /**
     * isset getClosedRepairOrdersResponse
     *
     * @param int|string $index
     * @return bool
     */
    public function issetGetClosedRepairOrdersResponse($index)
    {
        return isset($this->getClosedRepairOrdersResponse[$index]);
    }

    /**
     * unset getClosedRepairOrdersResponse
     *
     * @param int|string $index
     * @return void
     */
    public function unsetGetClosedRepairOrdersResponse($index)
    {
        unset($this->getClosedRepairOrdersResponse[$index]);
    }


    /**
     * @return GetClosedRepairOrdersResponse
     */
    public function getGetClosedRepairOrdersResponse(): GetClosedRepairOrdersResponse
    {
        return $this->getClosedRepairOrdersResponse;
    }

    /**
     * @param GetClosedRepairOrdersResponse $getClosedRepairOrdersResponse
     */
    public function setGetClosedRepairOrdersResponse(GetClosedRepairOrdersResponse $getClosedRepairOrdersResponse): void
    {
        $this->getClosedRepairOrdersResponse = $getClosedRepairOrdersResponse;
    }





}
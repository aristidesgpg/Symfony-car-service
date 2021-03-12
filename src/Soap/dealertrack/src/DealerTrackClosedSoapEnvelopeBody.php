<?php


namespace App\Soap\dealertrack\src;


class DealerTrackClosedSoapEnvelopeBody
{

    /**
     * @var \App\Soap\dealertrack\src\GetClosedRepairOrderDetailsResponse $getClosedRepairOrderDetailsResponse
     */
    private $getClosedRepairOrderDetailsResponse;


    /**
     * Adds as resiult
     *
     * @return self
     * @param \App\Soap\dealertrack\src\GetClosedRepairOrderDetailsResponse $result
     */
    public function addToGetClosedRepairOrderLookupResult(\App\Soap\dealertrack\src\GetClosedRepairOrderDetailsResponse$result)
    {
        $this->getClosedRepairOrderDetailsResponse[] = $result;
        return $this;
    }

    /**
     * isset getClosedRepairOrderDetailsResponse
     *
     * @param int|string $index
     * @return bool
     */
    public function issetgetClosedRepairOrderDetailsResponse($index)
    {
        return isset($this->getClosedRepairOrderDetailsResponse[$index]);
    }

    /**
     * unset getClosedRepairOrderDetailsResponse
     *
     * @param int|string $index
     * @return void
     */
    public function unsetgetClosedRepairOrderDetailsResponse($index)
    {
        unset($this->getClosedRepairOrderDetailsResponse[$index]);
    }


    /**
     * @return getClosedRepairOrderDetailsResponse
     */
    public function getgetClosedRepairOrderDetailsResponse(): getClosedRepairOrderDetailsResponse
    {
        return $this->getClosedRepairOrderDetailsResponse;
    }

    /**
     * @param GetClosedRepairOrderDetailsResponse $getClosedRepairOrderDetailsResponse
     */
    public function setgetClosedRepairOrderDetailsResponse(GetClosedRepairOrderDetailsResponse$getClosedRepairOrderDetailsResponse): void
    {
        $this->getClosedRepairOrderDetailsResponse = $getClosedRepairOrderDetailsResponse;
    }





}
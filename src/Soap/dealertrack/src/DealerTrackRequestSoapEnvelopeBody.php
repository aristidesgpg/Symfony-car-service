<?php


namespace App\Soap\dealertrack\src;


class DealerTrackRequestSoapEnvelopeBody
{

    /**
     * @var \App\Soap\dealertrack\src\OpenRepairOrderLookupResult  $openRepairOrderLookupResult
     */
    private $openRepairOrderLookupResult;


    /**
     * Adds as resiult
     *
     * @return self
     * @param \App\Soap\dealertrack\src\Result $result
     */
    public function addToOpenRepairOrderLookupResult(\App\Soap\dealertrack\src\Result $result)
    {
        $this->openRepairOrderLookupResult[] = $result;
        return $this;
    }

    /**
     * isset openRepairOrderLookupResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetOpenRepairOrderLookupResult($index)
    {
        return isset($this->openRepairOrderLookupResult[$index]);
    }

    /**
     * unset openRepairOrderLookupResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetOpenRepairOrderLookupResult($index)
    {
        unset($this->openRepairOrderLookupResult[$index]);
    }


    /**
     * @return OpenRepairOrderLookupResult
     */
    public function getOpenRepairOrderLookupResult(): OpenRepairOrderLookupResult
    {
        return $this->openRepairOrderLookupResult;
    }

    /**
     * @param OpenRepairOrderLookupResult $openRepairOrderLookupResult
     */
    public function setOpenRepairOrderLookupResult(OpenRepairOrderLookupResult $openRepairOrderLookupResult): void
    {
        $this->openRepairOrderLookupResult = $openRepairOrderLookupResult;
    }





}
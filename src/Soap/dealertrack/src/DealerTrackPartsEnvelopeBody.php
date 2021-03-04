<?php


namespace App\Soap\dealertrack\src;


class DealerTrackPartsEnvelopeBody
{

    /**
     * @var \App\Soap\dealertrack\src\PartsInventoryResult  $partsInventoryResult
     */
    private $partsInventoryResult;


    /**
     * Adds as resiult
     *
     * @return self
     * @param \App\Soap\dealertrack\src\PartsResult $result
     */
    public function addToPartsInventoryResult(\App\Soap\dealertrack\src\PartsResult $result)
    {
        $this->partsInventoryResult[] = $result;
        return $this;
    }

    /**
     * isset partsInventoryResult

     *
     * @param int|string $index
     * @return bool
     */
    public function issetPartsInventoryResult($index)
    {
        return isset($this->partsInventoryResult[$index]);
    }

    /**
     * unset partsInventoryResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPartsInventoryResult($index)
    {
        unset($this->partsInventoryResult[$index]);
    }


    /**
     * @return PartsInventoryResult
     */
    public function getPartsInventoryResult(): PartsInventoryResult
    {
        return $this->partsInventoryResult;
    }

    /**
     * @param PartsInventoryResult $partsInventoryResult
     */
    public function setPartsInventoryResult(PartsInventoryResult $partsInventoryResult): void
    {
        $this->partsInventoryResult = $partsInventoryResult;
    }





}
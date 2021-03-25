<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing PushCounterTicketApiResponseType
 *
 * 
 * XSD Type: PushCounterTicketApiResponse
 */
class PushCounterTicketApiResponseType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Parts\PushCounterTicketResponseType[] $results
     */
    private $results = null;

    /**
     * Adds as pushCounterTicketResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Parts\PushCounterTicketResponseType $pushCounterTicketResponse
     */
    public function addToResults(\App\Soap\dealerbuilt\src\Models\Parts\PushCounterTicketResponseType $pushCounterTicketResponse)
    {
        $this->results[] = $pushCounterTicketResponse;
        return $this;
    }

    /**
     * isset results
     *
     * @param int|string $index
     * @return bool
     */
    public function issetResults($index)
    {
        return isset($this->results[$index]);
    }

    /**
     * unset results
     *
     * @param int|string $index
     * @return void
     */
    public function unsetResults($index)
    {
        unset($this->results[$index]);
    }

    /**
     * Gets as results
     *
     * @return \App\Soap\dealerbuilt\src\Models\Parts\PushCounterTicketResponseType[]
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * Sets a new results
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\PushCounterTicketResponseType[] $results
     * @return self
     */
    public function setResults(array $results)
    {
        $this->results = $results;
        return $this;
    }


}


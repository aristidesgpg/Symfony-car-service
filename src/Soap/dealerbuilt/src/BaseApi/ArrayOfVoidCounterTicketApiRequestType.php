<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfVoidCounterTicketApiRequestType
 *
 * 
 * XSD Type: ArrayOfVoidCounterTicketApiRequest
 */
class ArrayOfVoidCounterTicketApiRequestType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\VoidCounterTicketApiRequestType[] $voidCounterTicketApiRequest
     */
    private $voidCounterTicketApiRequest = [
        
    ];

    /**
     * Adds as voidCounterTicketApiRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\VoidCounterTicketApiRequestType $voidCounterTicketApiRequest
     */
    public function addToVoidCounterTicketApiRequest(\App\Soap\dealerbuilt\src\BaseApi\VoidCounterTicketApiRequestType $voidCounterTicketApiRequest)
    {
        $this->voidCounterTicketApiRequest[] = $voidCounterTicketApiRequest;
        return $this;
    }

    /**
     * isset voidCounterTicketApiRequest
     *
     * @param int|string $index
     * @return bool
     */
    public function issetVoidCounterTicketApiRequest($index)
    {
        return isset($this->voidCounterTicketApiRequest[$index]);
    }

    /**
     * unset voidCounterTicketApiRequest
     *
     * @param int|string $index
     * @return void
     */
    public function unsetVoidCounterTicketApiRequest($index)
    {
        unset($this->voidCounterTicketApiRequest[$index]);
    }

    /**
     * Gets as voidCounterTicketApiRequest
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\VoidCounterTicketApiRequestType[]
     */
    public function getVoidCounterTicketApiRequest()
    {
        return $this->voidCounterTicketApiRequest;
    }

    /**
     * Sets a new voidCounterTicketApiRequest
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\VoidCounterTicketApiRequestType[] $voidCounterTicketApiRequest
     * @return self
     */
    public function setVoidCounterTicketApiRequest(array $voidCounterTicketApiRequest)
    {
        $this->voidCounterTicketApiRequest = $voidCounterTicketApiRequest;
        return $this;
    }


}


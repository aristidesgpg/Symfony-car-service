<?php

namespace App\Soap\dealerbuilt\src\Models\Parts;

/**
 * Class representing ArrayOfPushCounterTicketResponseType
 *
 * 
 * XSD Type: ArrayOfPushCounterTicketResponse
 */
class ArrayOfPushCounterTicketResponseType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Parts\PushCounterTicketResponseType[] $pushCounterTicketResponse
     */
    private $pushCounterTicketResponse = [
        
    ];

    /**
     * Adds as pushCounterTicketResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Parts\PushCounterTicketResponseType $pushCounterTicketResponse
     */
    public function addToPushCounterTicketResponse(\App\Soap\dealerbuilt\src\Models\Parts\PushCounterTicketResponseType $pushCounterTicketResponse)
    {
        $this->pushCounterTicketResponse[] = $pushCounterTicketResponse;
        return $this;
    }

    /**
     * isset pushCounterTicketResponse
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPushCounterTicketResponse($index)
    {
        return isset($this->pushCounterTicketResponse[$index]);
    }

    /**
     * unset pushCounterTicketResponse
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPushCounterTicketResponse($index)
    {
        unset($this->pushCounterTicketResponse[$index]);
    }

    /**
     * Gets as pushCounterTicketResponse
     *
     * @return \App\Soap\dealerbuilt\src\Models\Parts\PushCounterTicketResponseType[]
     */
    public function getPushCounterTicketResponse()
    {
        return $this->pushCounterTicketResponse;
    }

    /**
     * Sets a new pushCounterTicketResponse
     *
     * @param \App\Soap\dealerbuilt\src\Models\Parts\PushCounterTicketResponseType[] $pushCounterTicketResponse
     * @return self
     */
    public function setPushCounterTicketResponse(array $pushCounterTicketResponse)
    {
        $this->pushCounterTicketResponse = $pushCounterTicketResponse;
        return $this;
    }


}


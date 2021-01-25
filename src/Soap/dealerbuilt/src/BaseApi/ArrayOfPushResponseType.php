<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfPushResponseType
 *
 * 
 * XSD Type: ArrayOfPushResponse
 */
class ArrayOfPushResponseType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PushResponseType[] $pushResponse
     */
    private $pushResponse = [
        
    ];

    /**
     * Adds as pushResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\PushResponseType $pushResponse
     */
    public function addToPushResponse(\App\Soap\dealerbuilt\src\BaseApi\PushResponseType $pushResponse)
    {
        $this->pushResponse[] = $pushResponse;
        return $this;
    }

    /**
     * isset pushResponse
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPushResponse($index)
    {
        return isset($this->pushResponse[$index]);
    }

    /**
     * unset pushResponse
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPushResponse($index)
    {
        unset($this->pushResponse[$index]);
    }

    /**
     * Gets as pushResponse
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PushResponseType[]
     */
    public function getPushResponse()
    {
        return $this->pushResponse;
    }

    /**
     * Sets a new pushResponse
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PushResponseType[] $pushResponse
     * @return self
     */
    public function setPushResponse(array $pushResponse)
    {
        $this->pushResponse = $pushResponse;
        return $this;
    }


}


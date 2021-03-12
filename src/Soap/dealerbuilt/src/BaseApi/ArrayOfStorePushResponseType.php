<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfStorePushResponseType
 *
 * 
 * XSD Type: ArrayOfStorePushResponse
 */
class ArrayOfStorePushResponseType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\StorePushResponseType[] $storePushResponse
     */
    private $storePushResponse = [
        
    ];

    /**
     * Adds as storePushResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\StorePushResponseType $storePushResponse
     */
    public function addToStorePushResponse(\App\Soap\dealerbuilt\src\BaseApi\StorePushResponseType $storePushResponse)
    {
        $this->storePushResponse[] = $storePushResponse;
        return $this;
    }

    /**
     * isset storePushResponse
     *
     * @param int|string $index
     * @return bool
     */
    public function issetStorePushResponse($index)
    {
        return isset($this->storePushResponse[$index]);
    }

    /**
     * unset storePushResponse
     *
     * @param int|string $index
     * @return void
     */
    public function unsetStorePushResponse($index)
    {
        unset($this->storePushResponse[$index]);
    }

    /**
     * Gets as storePushResponse
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\StorePushResponseType[]
     */
    public function getStorePushResponse()
    {
        return $this->storePushResponse;
    }

    /**
     * Sets a new storePushResponse
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StorePushResponseType[] $storePushResponse
     * @return self
     */
    public function setStorePushResponse(array $storePushResponse)
    {
        $this->storePushResponse = $storePushResponse;
        return $this;
    }


}


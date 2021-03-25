<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfSourcePushResponseType
 *
 * 
 * XSD Type: ArrayOfSourcePushResponse
 */
class ArrayOfSourcePushResponseType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\SourcePushResponseType[] $sourcePushResponse
     */
    private $sourcePushResponse = [
        
    ];

    /**
     * Adds as sourcePushResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\SourcePushResponseType $sourcePushResponse
     */
    public function addToSourcePushResponse(\App\Soap\dealerbuilt\src\BaseApi\SourcePushResponseType $sourcePushResponse)
    {
        $this->sourcePushResponse[] = $sourcePushResponse;
        return $this;
    }

    /**
     * isset sourcePushResponse
     *
     * @param int|string $index
     * @return bool
     */
    public function issetSourcePushResponse($index)
    {
        return isset($this->sourcePushResponse[$index]);
    }

    /**
     * unset sourcePushResponse
     *
     * @param int|string $index
     * @return void
     */
    public function unsetSourcePushResponse($index)
    {
        unset($this->sourcePushResponse[$index]);
    }

    /**
     * Gets as sourcePushResponse
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\SourcePushResponseType[]
     */
    public function getSourcePushResponse()
    {
        return $this->sourcePushResponse;
    }

    /**
     * Sets a new sourcePushResponse
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\SourcePushResponseType[] $sourcePushResponse
     * @return self
     */
    public function setSourcePushResponse(array $sourcePushResponse)
    {
        $this->sourcePushResponse = $sourcePushResponse;
        return $this;
    }


}


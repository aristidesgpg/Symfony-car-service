<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfDeferredJobPushRequestType
 *
 * 
 * XSD Type: ArrayOfDeferredJobPushRequest
 */
class ArrayOfDeferredJobPushRequestType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DeferredJobPushRequestType[] $deferredJobPushRequest
     */
    private $deferredJobPushRequest = [
        
    ];

    /**
     * Adds as deferredJobPushRequest
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\DeferredJobPushRequestType $deferredJobPushRequest
     */
    public function addToDeferredJobPushRequest(\App\Soap\dealerbuilt\src\BaseApi\DeferredJobPushRequestType $deferredJobPushRequest)
    {
        $this->deferredJobPushRequest[] = $deferredJobPushRequest;
        return $this;
    }

    /**
     * isset deferredJobPushRequest
     *
     * @param int|string $index
     * @return bool
     */
    public function issetDeferredJobPushRequest($index)
    {
        return isset($this->deferredJobPushRequest[$index]);
    }

    /**
     * unset deferredJobPushRequest
     *
     * @param int|string $index
     * @return void
     */
    public function unsetDeferredJobPushRequest($index)
    {
        unset($this->deferredJobPushRequest[$index]);
    }

    /**
     * Gets as deferredJobPushRequest
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DeferredJobPushRequestType[]
     */
    public function getDeferredJobPushRequest()
    {
        return $this->deferredJobPushRequest;
    }

    /**
     * Sets a new deferredJobPushRequest
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DeferredJobPushRequestType[] $deferredJobPushRequest
     * @return self
     */
    public function setDeferredJobPushRequest(array $deferredJobPushRequest)
    {
        $this->deferredJobPushRequest = $deferredJobPushRequest;
        return $this;
    }


}


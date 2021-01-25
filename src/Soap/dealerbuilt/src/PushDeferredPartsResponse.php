<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushDeferredPartsResponse
 */
class PushDeferredPartsResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[] $pushDeferredPartsResult
     */
    private $pushDeferredPartsResult = null;

    /**
     * Adds as serviceLocationPushResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType $serviceLocationPushResponse
     */
    public function addToPushDeferredPartsResult(\App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType $serviceLocationPushResponse)
    {
        $this->pushDeferredPartsResult[] = $serviceLocationPushResponse;
        return $this;
    }

    /**
     * isset pushDeferredPartsResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPushDeferredPartsResult($index)
    {
        return isset($this->pushDeferredPartsResult[$index]);
    }

    /**
     * unset pushDeferredPartsResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPushDeferredPartsResult($index)
    {
        unset($this->pushDeferredPartsResult[$index]);
    }

    /**
     * Gets as pushDeferredPartsResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[]
     */
    public function getPushDeferredPartsResult()
    {
        return $this->pushDeferredPartsResult;
    }

    /**
     * Sets a new pushDeferredPartsResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[] $pushDeferredPartsResult
     * @return self
     */
    public function setPushDeferredPartsResult(array $pushDeferredPartsResult)
    {
        $this->pushDeferredPartsResult = $pushDeferredPartsResult;
        return $this;
    }


}


<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushDeferredLaborOperationSubletsResponse.
 */
class PushDeferredLaborOperationSubletsResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[]
     */
    private $pushDeferredLaborOperationSubletsResult = null;

    /**
     * Adds as serviceLocationPushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType $serviceLocationPushResponse
     */
    public function addToPushDeferredLaborOperationSubletsResult(BaseApi\ServiceLocationPushResponseType $serviceLocationPushResponse)
    {
        $this->pushDeferredLaborOperationSubletsResult[] = $serviceLocationPushResponse;

        return $this;
    }

    /**
     * isset pushDeferredLaborOperationSubletsResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPushDeferredLaborOperationSubletsResult($index)
    {
        return isset($this->pushDeferredLaborOperationSubletsResult[$index]);
    }

    /**
     * unset pushDeferredLaborOperationSubletsResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPushDeferredLaborOperationSubletsResult($index)
    {
        unset($this->pushDeferredLaborOperationSubletsResult[$index]);
    }

    /**
     * Gets as pushDeferredLaborOperationSubletsResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[]
     */
    public function getPushDeferredLaborOperationSubletsResult()
    {
        return $this->pushDeferredLaborOperationSubletsResult;
    }

    /**
     * Sets a new pushDeferredLaborOperationSubletsResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[] $pushDeferredLaborOperationSubletsResult
     *
     * @return self
     */
    public function setPushDeferredLaborOperationSubletsResult(array $pushDeferredLaborOperationSubletsResult)
    {
        $this->pushDeferredLaborOperationSubletsResult = $pushDeferredLaborOperationSubletsResult;

        return $this;
    }
}

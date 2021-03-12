<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushEstimateLaborOperationSubletsResponse
 */
class PushEstimateLaborOperationSubletsResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[] $pushEstimateLaborOperationSubletsResult
     */
    private $pushEstimateLaborOperationSubletsResult = null;

    /**
     * Adds as serviceLocationPushResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType $serviceLocationPushResponse
     */
    public function addToPushEstimateLaborOperationSubletsResult(\App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType $serviceLocationPushResponse)
    {
        $this->pushEstimateLaborOperationSubletsResult[] = $serviceLocationPushResponse;
        return $this;
    }

    /**
     * isset pushEstimateLaborOperationSubletsResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPushEstimateLaborOperationSubletsResult($index)
    {
        return isset($this->pushEstimateLaborOperationSubletsResult[$index]);
    }

    /**
     * unset pushEstimateLaborOperationSubletsResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPushEstimateLaborOperationSubletsResult($index)
    {
        unset($this->pushEstimateLaborOperationSubletsResult[$index]);
    }

    /**
     * Gets as pushEstimateLaborOperationSubletsResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[]
     */
    public function getPushEstimateLaborOperationSubletsResult()
    {
        return $this->pushEstimateLaborOperationSubletsResult;
    }

    /**
     * Sets a new pushEstimateLaborOperationSubletsResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[] $pushEstimateLaborOperationSubletsResult
     * @return self
     */
    public function setPushEstimateLaborOperationSubletsResult(array $pushEstimateLaborOperationSubletsResult)
    {
        $this->pushEstimateLaborOperationSubletsResult = $pushEstimateLaborOperationSubletsResult;
        return $this;
    }


}


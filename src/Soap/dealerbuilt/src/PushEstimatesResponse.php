<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushEstimatesResponse
 */
class PushEstimatesResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\EstimatePushResponseType[] $pushEstimatesResult
     */
    private $pushEstimatesResult = null;

    /**
     * Adds as estimatePushResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\EstimatePushResponseType $estimatePushResponse
     */
    public function addToPushEstimatesResult(\App\Soap\dealerbuilt\src\BaseApi\EstimatePushResponseType $estimatePushResponse)
    {
        $this->pushEstimatesResult[] = $estimatePushResponse;
        return $this;
    }

    /**
     * isset pushEstimatesResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPushEstimatesResult($index)
    {
        return isset($this->pushEstimatesResult[$index]);
    }

    /**
     * unset pushEstimatesResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPushEstimatesResult($index)
    {
        unset($this->pushEstimatesResult[$index]);
    }

    /**
     * Gets as pushEstimatesResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\EstimatePushResponseType[]
     */
    public function getPushEstimatesResult()
    {
        return $this->pushEstimatesResult;
    }

    /**
     * Sets a new pushEstimatesResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\EstimatePushResponseType[] $pushEstimatesResult
     * @return self
     */
    public function setPushEstimatesResult(array $pushEstimatesResult)
    {
        $this->pushEstimatesResult = $pushEstimatesResult;
        return $this;
    }


}


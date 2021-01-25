<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushEstimatePartsResponse.
 */
class PushEstimatePartsResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[]
     */
    private $pushEstimatePartsResult = null;

    /**
     * Adds as serviceLocationPushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType $serviceLocationPushResponse
     */
    public function addToPushEstimatePartsResult(BaseApi\ServiceLocationPushResponseType $serviceLocationPushResponse)
    {
        $this->pushEstimatePartsResult[] = $serviceLocationPushResponse;

        return $this;
    }

    /**
     * isset pushEstimatePartsResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPushEstimatePartsResult($index)
    {
        return isset($this->pushEstimatePartsResult[$index]);
    }

    /**
     * unset pushEstimatePartsResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPushEstimatePartsResult($index)
    {
        unset($this->pushEstimatePartsResult[$index]);
    }

    /**
     * Gets as pushEstimatePartsResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[]
     */
    public function getPushEstimatePartsResult()
    {
        return $this->pushEstimatePartsResult;
    }

    /**
     * Sets a new pushEstimatePartsResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[] $pushEstimatePartsResult
     *
     * @return self
     */
    public function setPushEstimatePartsResult(array $pushEstimatePartsResult)
    {
        $this->pushEstimatePartsResult = $pushEstimatePartsResult;

        return $this;
    }
}

<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushEstimateLaborItemsResponse.
 */
class PushEstimateLaborItemsResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborItemPushResponseType[]
     */
    private $pushEstimateLaborItemsResult = null;

    /**
     * Adds as potentialLaborItemPushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborItemPushResponseType $potentialLaborItemPushResponse
     */
    public function addToPushEstimateLaborItemsResult(BaseApi\PotentialLaborItemPushResponseType $potentialLaborItemPushResponse)
    {
        $this->pushEstimateLaborItemsResult[] = $potentialLaborItemPushResponse;

        return $this;
    }

    /**
     * isset pushEstimateLaborItemsResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPushEstimateLaborItemsResult($index)
    {
        return isset($this->pushEstimateLaborItemsResult[$index]);
    }

    /**
     * unset pushEstimateLaborItemsResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPushEstimateLaborItemsResult($index)
    {
        unset($this->pushEstimateLaborItemsResult[$index]);
    }

    /**
     * Gets as pushEstimateLaborItemsResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborItemPushResponseType[]
     */
    public function getPushEstimateLaborItemsResult()
    {
        return $this->pushEstimateLaborItemsResult;
    }

    /**
     * Sets a new pushEstimateLaborItemsResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborItemPushResponseType[] $pushEstimateLaborItemsResult
     *
     * @return self
     */
    public function setPushEstimateLaborItemsResult(array $pushEstimateLaborItemsResult)
    {
        $this->pushEstimateLaborItemsResult = $pushEstimateLaborItemsResult;

        return $this;
    }
}

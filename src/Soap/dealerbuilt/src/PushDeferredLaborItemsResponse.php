<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushDeferredLaborItemsResponse.
 */
class PushDeferredLaborItemsResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborItemPushResponseType[]
     */
    private $pushDeferredLaborItemsResult = null;

    /**
     * Adds as potentialLaborItemPushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborItemPushResponseType $potentialLaborItemPushResponse
     */
    public function addToPushDeferredLaborItemsResult(BaseApi\PotentialLaborItemPushResponseType $potentialLaborItemPushResponse)
    {
        $this->pushDeferredLaborItemsResult[] = $potentialLaborItemPushResponse;

        return $this;
    }

    /**
     * isset pushDeferredLaborItemsResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPushDeferredLaborItemsResult($index)
    {
        return isset($this->pushDeferredLaborItemsResult[$index]);
    }

    /**
     * unset pushDeferredLaborItemsResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPushDeferredLaborItemsResult($index)
    {
        unset($this->pushDeferredLaborItemsResult[$index]);
    }

    /**
     * Gets as pushDeferredLaborItemsResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborItemPushResponseType[]
     */
    public function getPushDeferredLaborItemsResult()
    {
        return $this->pushDeferredLaborItemsResult;
    }

    /**
     * Sets a new pushDeferredLaborItemsResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PotentialLaborItemPushResponseType[] $pushDeferredLaborItemsResult
     *
     * @return self
     */
    public function setPushDeferredLaborItemsResult(array $pushDeferredLaborItemsResult)
    {
        $this->pushDeferredLaborItemsResult = $pushDeferredLaborItemsResult;

        return $this;
    }
}

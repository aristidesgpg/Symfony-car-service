<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushDealsResponse.
 */
class PushDealsResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\StorePushResponseType[]
     */
    private $pushDealsResult = null;

    /**
     * Adds as storePushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StorePushResponseType $storePushResponse
     */
    public function addToPushDealsResult(BaseApi\StorePushResponseType $storePushResponse)
    {
        $this->pushDealsResult[] = $storePushResponse;

        return $this;
    }

    /**
     * isset pushDealsResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPushDealsResult($index)
    {
        return isset($this->pushDealsResult[$index]);
    }

    /**
     * unset pushDealsResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPushDealsResult($index)
    {
        unset($this->pushDealsResult[$index]);
    }

    /**
     * Gets as pushDealsResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\StorePushResponseType[]
     */
    public function getPushDealsResult()
    {
        return $this->pushDealsResult;
    }

    /**
     * Sets a new pushDealsResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StorePushResponseType[] $pushDealsResult
     *
     * @return self
     */
    public function setPushDealsResult(array $pushDealsResult)
    {
        $this->pushDealsResult = $pushDealsResult;

        return $this;
    }
}

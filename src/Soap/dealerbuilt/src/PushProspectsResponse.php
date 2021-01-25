<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushProspectsResponse
 */
class PushProspectsResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\StorePushResponseType[] $pushProspectsResult
     */
    private $pushProspectsResult = null;

    /**
     * Adds as storePushResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\StorePushResponseType $storePushResponse
     */
    public function addToPushProspectsResult(\App\Soap\dealerbuilt\src\BaseApi\StorePushResponseType $storePushResponse)
    {
        $this->pushProspectsResult[] = $storePushResponse;
        return $this;
    }

    /**
     * isset pushProspectsResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPushProspectsResult($index)
    {
        return isset($this->pushProspectsResult[$index]);
    }

    /**
     * unset pushProspectsResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPushProspectsResult($index)
    {
        unset($this->pushProspectsResult[$index]);
    }

    /**
     * Gets as pushProspectsResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\StorePushResponseType[]
     */
    public function getPushProspectsResult()
    {
        return $this->pushProspectsResult;
    }

    /**
     * Sets a new pushProspectsResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StorePushResponseType[] $pushProspectsResult
     * @return self
     */
    public function setPushProspectsResult(array $pushProspectsResult)
    {
        $this->pushProspectsResult = $pushProspectsResult;
        return $this;
    }


}


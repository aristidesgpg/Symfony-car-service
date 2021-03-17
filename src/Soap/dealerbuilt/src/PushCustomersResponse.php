<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushCustomersResponse
 */
class PushCustomersResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\SourcePushResponseType[] $pushCustomersResult
     */
    private $pushCustomersResult = null;

    /**
     * Adds as sourcePushResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\SourcePushResponseType $sourcePushResponse
     */
    public function addToPushCustomersResult(\App\Soap\dealerbuilt\src\BaseApi\SourcePushResponseType $sourcePushResponse)
    {
        $this->pushCustomersResult[] = $sourcePushResponse;
        return $this;
    }

    /**
     * isset pushCustomersResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPushCustomersResult($index)
    {
        return isset($this->pushCustomersResult[$index]);
    }

    /**
     * unset pushCustomersResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPushCustomersResult($index)
    {
        unset($this->pushCustomersResult[$index]);
    }

    /**
     * Gets as pushCustomersResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\SourcePushResponseType[]
     */
    public function getPushCustomersResult()
    {
        return $this->pushCustomersResult;
    }

    /**
     * Sets a new pushCustomersResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\SourcePushResponseType[] $pushCustomersResult
     * @return self
     */
    public function setPushCustomersResult(array $pushCustomersResult)
    {
        $this->pushCustomersResult = $pushCustomersResult;
        return $this;
    }


}


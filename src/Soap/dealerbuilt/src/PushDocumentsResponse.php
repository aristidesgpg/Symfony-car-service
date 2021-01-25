<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushDocumentsResponse
 */
class PushDocumentsResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\StorePushResponseType[] $pushDocumentsResult
     */
    private $pushDocumentsResult = null;

    /**
     * Adds as storePushResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\StorePushResponseType $storePushResponse
     */
    public function addToPushDocumentsResult(\App\Soap\dealerbuilt\src\BaseApi\StorePushResponseType $storePushResponse)
    {
        $this->pushDocumentsResult[] = $storePushResponse;
        return $this;
    }

    /**
     * isset pushDocumentsResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPushDocumentsResult($index)
    {
        return isset($this->pushDocumentsResult[$index]);
    }

    /**
     * unset pushDocumentsResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPushDocumentsResult($index)
    {
        unset($this->pushDocumentsResult[$index]);
    }

    /**
     * Gets as pushDocumentsResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\StorePushResponseType[]
     */
    public function getPushDocumentsResult()
    {
        return $this->pushDocumentsResult;
    }

    /**
     * Sets a new pushDocumentsResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StorePushResponseType[] $pushDocumentsResult
     * @return self
     */
    public function setPushDocumentsResult(array $pushDocumentsResult)
    {
        $this->pushDocumentsResult = $pushDocumentsResult;
        return $this;
    }


}


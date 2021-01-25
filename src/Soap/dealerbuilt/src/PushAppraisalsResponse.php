<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushAppraisalsResponse.
 */
class PushAppraisalsResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\StorePushResponseType[]
     */
    private $pushAppraisalsResult = null;

    /**
     * Adds as storePushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StorePushResponseType $storePushResponse
     */
    public function addToPushAppraisalsResult(BaseApi\StorePushResponseType $storePushResponse)
    {
        $this->pushAppraisalsResult[] = $storePushResponse;

        return $this;
    }

    /**
     * isset pushAppraisalsResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPushAppraisalsResult($index)
    {
        return isset($this->pushAppraisalsResult[$index]);
    }

    /**
     * unset pushAppraisalsResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPushAppraisalsResult($index)
    {
        unset($this->pushAppraisalsResult[$index]);
    }

    /**
     * Gets as pushAppraisalsResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\StorePushResponseType[]
     */
    public function getPushAppraisalsResult()
    {
        return $this->pushAppraisalsResult;
    }

    /**
     * Sets a new pushAppraisalsResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\StorePushResponseType[] $pushAppraisalsResult
     *
     * @return self
     */
    public function setPushAppraisalsResult(array $pushAppraisalsResult)
    {
        $this->pushAppraisalsResult = $pushAppraisalsResult;

        return $this;
    }
}

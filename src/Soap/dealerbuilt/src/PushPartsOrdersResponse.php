<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushPartsOrdersResponse
 */
class PushPartsOrdersResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\PartsOrderPushResponseType[] $pushPartsOrdersResult
     */
    private $pushPartsOrdersResult = null;

    /**
     * Adds as partsOrderPushResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsOrderPushResponseType $partsOrderPushResponse
     */
    public function addToPushPartsOrdersResult(\App\Soap\dealerbuilt\src\BaseApi\PartsOrderPushResponseType $partsOrderPushResponse)
    {
        $this->pushPartsOrdersResult[] = $partsOrderPushResponse;
        return $this;
    }

    /**
     * isset pushPartsOrdersResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPushPartsOrdersResult($index)
    {
        return isset($this->pushPartsOrdersResult[$index]);
    }

    /**
     * unset pushPartsOrdersResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPushPartsOrdersResult($index)
    {
        unset($this->pushPartsOrdersResult[$index]);
    }

    /**
     * Gets as pushPartsOrdersResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\PartsOrderPushResponseType[]
     */
    public function getPushPartsOrdersResult()
    {
        return $this->pushPartsOrdersResult;
    }

    /**
     * Sets a new pushPartsOrdersResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\PartsOrderPushResponseType[] $pushPartsOrdersResult
     * @return self
     */
    public function setPushPartsOrdersResult(array $pushPartsOrdersResult)
    {
        $this->pushPartsOrdersResult = $pushPartsOrdersResult;
        return $this;
    }


}


<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushRepairOrderLaborOperationSubletsResponse
 */
class PushRepairOrderLaborOperationSubletsResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[] $pushRepairOrderLaborOperationSubletsResult
     */
    private $pushRepairOrderLaborOperationSubletsResult = null;

    /**
     * Adds as serviceLocationPushResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType $serviceLocationPushResponse
     */
    public function addToPushRepairOrderLaborOperationSubletsResult(\App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType $serviceLocationPushResponse)
    {
        $this->pushRepairOrderLaborOperationSubletsResult[] = $serviceLocationPushResponse;
        return $this;
    }

    /**
     * isset pushRepairOrderLaborOperationSubletsResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPushRepairOrderLaborOperationSubletsResult($index)
    {
        return isset($this->pushRepairOrderLaborOperationSubletsResult[$index]);
    }

    /**
     * unset pushRepairOrderLaborOperationSubletsResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPushRepairOrderLaborOperationSubletsResult($index)
    {
        unset($this->pushRepairOrderLaborOperationSubletsResult[$index]);
    }

    /**
     * Gets as pushRepairOrderLaborOperationSubletsResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[]
     */
    public function getPushRepairOrderLaborOperationSubletsResult()
    {
        return $this->pushRepairOrderLaborOperationSubletsResult;
    }

    /**
     * Sets a new pushRepairOrderLaborOperationSubletsResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[] $pushRepairOrderLaborOperationSubletsResult
     * @return self
     */
    public function setPushRepairOrderLaborOperationSubletsResult(array $pushRepairOrderLaborOperationSubletsResult)
    {
        $this->pushRepairOrderLaborOperationSubletsResult = $pushRepairOrderLaborOperationSubletsResult;
        return $this;
    }


}


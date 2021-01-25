<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushRepairOrderPartsResponse.
 */
class PushRepairOrderPartsResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[]
     */
    private $pushRepairOrderPartsResult = null;

    /**
     * Adds as serviceLocationPushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType $serviceLocationPushResponse
     */
    public function addToPushRepairOrderPartsResult(BaseApi\ServiceLocationPushResponseType $serviceLocationPushResponse)
    {
        $this->pushRepairOrderPartsResult[] = $serviceLocationPushResponse;

        return $this;
    }

    /**
     * isset pushRepairOrderPartsResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPushRepairOrderPartsResult($index)
    {
        return isset($this->pushRepairOrderPartsResult[$index]);
    }

    /**
     * unset pushRepairOrderPartsResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPushRepairOrderPartsResult($index)
    {
        unset($this->pushRepairOrderPartsResult[$index]);
    }

    /**
     * Gets as pushRepairOrderPartsResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[]
     */
    public function getPushRepairOrderPartsResult()
    {
        return $this->pushRepairOrderPartsResult;
    }

    /**
     * Sets a new pushRepairOrderPartsResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\ServiceLocationPushResponseType[] $pushRepairOrderPartsResult
     *
     * @return self
     */
    public function setPushRepairOrderPartsResult(array $pushRepairOrderPartsResult)
    {
        $this->pushRepairOrderPartsResult = $pushRepairOrderPartsResult;

        return $this;
    }
}

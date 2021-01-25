<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushCustomerVehiclesResponse.
 */
class PushCustomerVehiclesResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\SourcePushResponseType[]
     */
    private $pushCustomerVehiclesResult = null;

    /**
     * Adds as sourcePushResponse.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\SourcePushResponseType $sourcePushResponse
     */
    public function addToPushCustomerVehiclesResult(BaseApi\SourcePushResponseType $sourcePushResponse)
    {
        $this->pushCustomerVehiclesResult[] = $sourcePushResponse;

        return $this;
    }

    /**
     * isset pushCustomerVehiclesResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPushCustomerVehiclesResult($index)
    {
        return isset($this->pushCustomerVehiclesResult[$index]);
    }

    /**
     * unset pushCustomerVehiclesResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPushCustomerVehiclesResult($index)
    {
        unset($this->pushCustomerVehiclesResult[$index]);
    }

    /**
     * Gets as pushCustomerVehiclesResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\SourcePushResponseType[]
     */
    public function getPushCustomerVehiclesResult()
    {
        return $this->pushCustomerVehiclesResult;
    }

    /**
     * Sets a new pushCustomerVehiclesResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\SourcePushResponseType[] $pushCustomerVehiclesResult
     *
     * @return self
     */
    public function setPushCustomerVehiclesResult(array $pushCustomerVehiclesResult)
    {
        $this->pushCustomerVehiclesResult = $pushCustomerVehiclesResult;

        return $this;
    }
}

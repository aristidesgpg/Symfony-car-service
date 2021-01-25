<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PushCustomerVehicleOwnersResponse
 */
class PushCustomerVehicleOwnersResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\SourcePushResponseType[] $pushCustomerVehicleOwnersResult
     */
    private $pushCustomerVehicleOwnersResult = null;

    /**
     * Adds as sourcePushResponse
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\SourcePushResponseType $sourcePushResponse
     */
    public function addToPushCustomerVehicleOwnersResult(\App\Soap\dealerbuilt\src\BaseApi\SourcePushResponseType $sourcePushResponse)
    {
        $this->pushCustomerVehicleOwnersResult[] = $sourcePushResponse;
        return $this;
    }

    /**
     * isset pushCustomerVehicleOwnersResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPushCustomerVehicleOwnersResult($index)
    {
        return isset($this->pushCustomerVehicleOwnersResult[$index]);
    }

    /**
     * unset pushCustomerVehicleOwnersResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPushCustomerVehicleOwnersResult($index)
    {
        unset($this->pushCustomerVehicleOwnersResult[$index]);
    }

    /**
     * Gets as pushCustomerVehicleOwnersResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\SourcePushResponseType[]
     */
    public function getPushCustomerVehicleOwnersResult()
    {
        return $this->pushCustomerVehicleOwnersResult;
    }

    /**
     * Sets a new pushCustomerVehicleOwnersResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\SourcePushResponseType[] $pushCustomerVehicleOwnersResult
     * @return self
     */
    public function setPushCustomerVehicleOwnersResult(array $pushCustomerVehicleOwnersResult)
    {
        $this->pushCustomerVehicleOwnersResult = $pushCustomerVehicleOwnersResult;
        return $this;
    }


}


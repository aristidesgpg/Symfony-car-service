<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullCustomerVehicleByKeyResponse.
 */
class PullCustomerVehicleByKeyResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType
     */
    private $pullCustomerVehicleByKeyResult = null;

    /**
     * Gets as pullCustomerVehicleByKeyResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType
     */
    public function getPullCustomerVehicleByKeyResult()
    {
        return $this->pullCustomerVehicleByKeyResult;
    }

    /**
     * Sets a new pullCustomerVehicleByKeyResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType $pullCustomerVehicleByKeyResult
     *
     * @return self
     */
    public function setPullCustomerVehicleByKeyResult(BaseApi\CustomerVehicleType $pullCustomerVehicleByKeyResult)
    {
        $this->pullCustomerVehicleByKeyResult = $pullCustomerVehicleByKeyResult;

        return $this;
    }
}

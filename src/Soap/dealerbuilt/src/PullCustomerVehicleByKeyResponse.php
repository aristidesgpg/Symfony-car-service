<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullCustomerVehicleByKeyResponse
 */
class PullCustomerVehicleByKeyResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType $pullCustomerVehicleByKeyResult
     */
    private $pullCustomerVehicleByKeyResult = null;

    /**
     * Gets as pullCustomerVehicleByKeyResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType
     */
    public function getPullCustomerVehicleByKeyResult()
    {
        return $this->pullCustomerVehicleByKeyResult;
    }

    /**
     * Sets a new pullCustomerVehicleByKeyResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType $pullCustomerVehicleByKeyResult
     * @return self
     */
    public function setPullCustomerVehicleByKeyResult(\App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType $pullCustomerVehicleByKeyResult)
    {
        $this->pullCustomerVehicleByKeyResult = $pullCustomerVehicleByKeyResult;
        return $this;
    }


}


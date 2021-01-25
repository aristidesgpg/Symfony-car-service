<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullCustomerVehiclesByKeyResponse
 */
class PullCustomerVehiclesByKeyResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType[] $pullCustomerVehiclesByKeyResult
     */
    private $pullCustomerVehiclesByKeyResult = null;

    /**
     * Adds as customerVehicle
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType $customerVehicle
     */
    public function addToPullCustomerVehiclesByKeyResult(\App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType $customerVehicle)
    {
        $this->pullCustomerVehiclesByKeyResult[] = $customerVehicle;
        return $this;
    }

    /**
     * isset pullCustomerVehiclesByKeyResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullCustomerVehiclesByKeyResult($index)
    {
        return isset($this->pullCustomerVehiclesByKeyResult[$index]);
    }

    /**
     * unset pullCustomerVehiclesByKeyResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullCustomerVehiclesByKeyResult($index)
    {
        unset($this->pullCustomerVehiclesByKeyResult[$index]);
    }

    /**
     * Gets as pullCustomerVehiclesByKeyResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType[]
     */
    public function getPullCustomerVehiclesByKeyResult()
    {
        return $this->pullCustomerVehiclesByKeyResult;
    }

    /**
     * Sets a new pullCustomerVehiclesByKeyResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType[] $pullCustomerVehiclesByKeyResult
     * @return self
     */
    public function setPullCustomerVehiclesByKeyResult(array $pullCustomerVehiclesByKeyResult)
    {
        $this->pullCustomerVehiclesByKeyResult = $pullCustomerVehiclesByKeyResult;
        return $this;
    }


}


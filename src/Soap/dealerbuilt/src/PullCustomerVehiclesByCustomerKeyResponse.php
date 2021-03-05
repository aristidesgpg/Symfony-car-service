<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullCustomerVehiclesByCustomerKeyResponse
 */
class PullCustomerVehiclesByCustomerKeyResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType[] $pullCustomerVehiclesByCustomerKeyResult
     */
    private $pullCustomerVehiclesByCustomerKeyResult = null;

    /**
     * Adds as customerVehicle
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType $customerVehicle
     */
    public function addToPullCustomerVehiclesByCustomerKeyResult(\App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType $customerVehicle)
    {
        $this->pullCustomerVehiclesByCustomerKeyResult[] = $customerVehicle;
        return $this;
    }

    /**
     * isset pullCustomerVehiclesByCustomerKeyResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullCustomerVehiclesByCustomerKeyResult($index)
    {
        return isset($this->pullCustomerVehiclesByCustomerKeyResult[$index]);
    }

    /**
     * unset pullCustomerVehiclesByCustomerKeyResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullCustomerVehiclesByCustomerKeyResult($index)
    {
        unset($this->pullCustomerVehiclesByCustomerKeyResult[$index]);
    }

    /**
     * Gets as pullCustomerVehiclesByCustomerKeyResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType[]
     */
    public function getPullCustomerVehiclesByCustomerKeyResult()
    {
        return $this->pullCustomerVehiclesByCustomerKeyResult;
    }

    /**
     * Sets a new pullCustomerVehiclesByCustomerKeyResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType[] $pullCustomerVehiclesByCustomerKeyResult
     * @return self
     */
    public function setPullCustomerVehiclesByCustomerKeyResult(array $pullCustomerVehiclesByCustomerKeyResult)
    {
        $this->pullCustomerVehiclesByCustomerKeyResult = $pullCustomerVehiclesByCustomerKeyResult;
        return $this;
    }


}


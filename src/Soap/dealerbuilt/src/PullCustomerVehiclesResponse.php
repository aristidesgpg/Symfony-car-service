<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullCustomerVehiclesResponse
 */
class PullCustomerVehiclesResponse
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType[] $pullCustomerVehiclesResult
     */
    private $pullCustomerVehiclesResult = null;

    /**
     * Adds as customerVehicle
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType $customerVehicle
     */
    public function addToPullCustomerVehiclesResult(\App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType $customerVehicle)
    {
        $this->pullCustomerVehiclesResult[] = $customerVehicle;
        return $this;
    }

    /**
     * isset pullCustomerVehiclesResult
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPullCustomerVehiclesResult($index)
    {
        return isset($this->pullCustomerVehiclesResult[$index]);
    }

    /**
     * unset pullCustomerVehiclesResult
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPullCustomerVehiclesResult($index)
    {
        unset($this->pullCustomerVehiclesResult[$index]);
    }

    /**
     * Gets as pullCustomerVehiclesResult
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType[]
     */
    public function getPullCustomerVehiclesResult()
    {
        return $this->pullCustomerVehiclesResult;
    }

    /**
     * Sets a new pullCustomerVehiclesResult
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleType[] $pullCustomerVehiclesResult
     * @return self
     */
    public function setPullCustomerVehiclesResult(array $pullCustomerVehiclesResult)
    {
        $this->pullCustomerVehiclesResult = $pullCustomerVehiclesResult;
        return $this;
    }


}


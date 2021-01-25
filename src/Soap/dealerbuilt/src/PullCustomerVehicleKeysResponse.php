<?php

namespace App\Soap\dealerbuilt\src;

/**
 * Class representing PullCustomerVehicleKeysResponse.
 */
class PullCustomerVehicleKeysResponse
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleSummaryType[]
     */
    private $pullCustomerVehicleKeysResult = null;

    /**
     * Adds as customerVehicleSummary.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleSummaryType $customerVehicleSummary
     */
    public function addToPullCustomerVehicleKeysResult(BaseApi\CustomerVehicleSummaryType $customerVehicleSummary)
    {
        $this->pullCustomerVehicleKeysResult[] = $customerVehicleSummary;

        return $this;
    }

    /**
     * isset pullCustomerVehicleKeysResult.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPullCustomerVehicleKeysResult($index)
    {
        return isset($this->pullCustomerVehicleKeysResult[$index]);
    }

    /**
     * unset pullCustomerVehicleKeysResult.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPullCustomerVehicleKeysResult($index)
    {
        unset($this->pullCustomerVehicleKeysResult[$index]);
    }

    /**
     * Gets as pullCustomerVehicleKeysResult.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleSummaryType[]
     */
    public function getPullCustomerVehicleKeysResult()
    {
        return $this->pullCustomerVehicleKeysResult;
    }

    /**
     * Sets a new pullCustomerVehicleKeysResult.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleSummaryType[] $pullCustomerVehicleKeysResult
     *
     * @return self
     */
    public function setPullCustomerVehicleKeysResult(array $pullCustomerVehicleKeysResult)
    {
        $this->pullCustomerVehicleKeysResult = $pullCustomerVehicleKeysResult;

        return $this;
    }
}

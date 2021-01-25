<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfCustomerVehicleSummaryType.
 *
 * XSD Type: ArrayOfCustomerVehicleSummary
 */
class ArrayOfCustomerVehicleSummaryType
{
    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleSummaryType[]
     */
    private $customerVehicleSummary = [
    ];

    /**
     * Adds as customerVehicleSummary.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleSummaryType $customerVehicleSummary
     */
    public function addToCustomerVehicleSummary(CustomerVehicleSummaryType $customerVehicleSummary)
    {
        $this->customerVehicleSummary[] = $customerVehicleSummary;

        return $this;
    }

    /**
     * isset customerVehicleSummary.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetCustomerVehicleSummary($index)
    {
        return isset($this->customerVehicleSummary[$index]);
    }

    /**
     * unset customerVehicleSummary.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetCustomerVehicleSummary($index)
    {
        unset($this->customerVehicleSummary[$index]);
    }

    /**
     * Gets as customerVehicleSummary.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleSummaryType[]
     */
    public function getCustomerVehicleSummary()
    {
        return $this->customerVehicleSummary;
    }

    /**
     * Sets a new customerVehicleSummary.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\CustomerVehicleSummaryType[] $customerVehicleSummary
     *
     * @return self
     */
    public function setCustomerVehicleSummary(array $customerVehicleSummary)
    {
        $this->customerVehicleSummary = $customerVehicleSummary;

        return $this;
    }
}

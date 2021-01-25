<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing VehiclesInquiryType.
 *
 * XSD Type: VehiclesInquiry
 */
class VehiclesInquiryType
{
    /**
     * @var int
     */
    private $storeId = null;

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\VehicleLookupType[]
     */
    private $vehicles = null;

    /**
     * Gets as storeId.
     *
     * @return int
     */
    public function getStoreId()
    {
        return $this->storeId;
    }

    /**
     * Sets a new storeId.
     *
     * @param int $storeId
     *
     * @return self
     */
    public function setStoreId($storeId)
    {
        $this->storeId = $storeId;

        return $this;
    }

    /**
     * Adds as vehicleLookup.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\VehicleLookupType $vehicleLookup
     */
    public function addToVehicles(VehicleLookupType $vehicleLookup)
    {
        $this->vehicles[] = $vehicleLookup;

        return $this;
    }

    /**
     * isset vehicles.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetVehicles($index)
    {
        return isset($this->vehicles[$index]);
    }

    /**
     * unset vehicles.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetVehicles($index)
    {
        unset($this->vehicles[$index]);
    }

    /**
     * Gets as vehicles.
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\VehicleLookupType[]
     */
    public function getVehicles()
    {
        return $this->vehicles;
    }

    /**
     * Sets a new vehicles.
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\VehicleLookupType[] $vehicles
     *
     * @return self
     */
    public function setVehicles(array $vehicles)
    {
        $this->vehicles = $vehicles;

        return $this;
    }
}

<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing VehicleInquiryType.
 *
 * XSD Type: VehicleInquiry
 */
class VehicleInquiryType
{
    /**
     * @var int
     */
    private $currentMileage = null;

    /**
     * @var string
     */
    private $ownerLastName = null;

    /**
     * @var int
     */
    private $storeId = null;

    /**
     * @var string
     */
    private $vin = null;

    /**
     * Gets as currentMileage.
     *
     * @return int
     */
    public function getCurrentMileage()
    {
        return $this->currentMileage;
    }

    /**
     * Sets a new currentMileage.
     *
     * @param int $currentMileage
     *
     * @return self
     */
    public function setCurrentMileage($currentMileage)
    {
        $this->currentMileage = $currentMileage;

        return $this;
    }

    /**
     * Gets as ownerLastName.
     *
     * @return string
     */
    public function getOwnerLastName()
    {
        return $this->ownerLastName;
    }

    /**
     * Sets a new ownerLastName.
     *
     * @param string $ownerLastName
     *
     * @return self
     */
    public function setOwnerLastName($ownerLastName)
    {
        $this->ownerLastName = $ownerLastName;

        return $this;
    }

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
     * Gets as vin.
     *
     * @return string
     */
    public function getVin()
    {
        return $this->vin;
    }

    /**
     * Sets a new vin.
     *
     * @param string $vin
     *
     * @return self
     */
    public function setVin($vin)
    {
        $this->vin = $vin;

        return $this;
    }
}

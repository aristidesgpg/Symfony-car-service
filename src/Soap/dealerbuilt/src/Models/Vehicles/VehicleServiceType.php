<?php

namespace App\Soap\dealerbuilt\src\Models\Vehicles;

/**
 * Class representing VehicleServiceType.
 *
 * XSD Type: VehicleService
 */
class VehicleServiceType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleServiceOwnerDataType
     */
    private $ownerInformation = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\RepairOrderType[]
     */
    private $repairOrderHistory = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\ServiceCampaigns\ServiceCampaignType[]
     */
    private $serviceCampaigns = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\ServiceContracts\ServiceContractType[]
     */
    private $serviceContracts = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleServiceVehicleDataType
     */
    private $vehicleInformation = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleServiceSoldByDealerType
     */
    private $vehicleSeller = null;

    /**
     * @var string
     */
    private $vin = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Warranty\WarrantyType[]
     */
    private $warranties = null;

    /**
     * Gets as ownerInformation.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleServiceOwnerDataType
     */
    public function getOwnerInformation()
    {
        return $this->ownerInformation;
    }

    /**
     * Sets a new ownerInformation.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleServiceOwnerDataType $ownerInformation
     *
     * @return self
     */
    public function setOwnerInformation(VehicleServiceOwnerDataType $ownerInformation)
    {
        $this->ownerInformation = $ownerInformation;

        return $this;
    }

    /**
     * Adds as repairOrder.
     *
     * @return self
     */
    public function addToRepairOrderHistory(\App\Soap\dealerbuilt\src\Models\Service\RepairOrderType $repairOrder)
    {
        $this->repairOrderHistory[] = $repairOrder;

        return $this;
    }

    /**
     * isset repairOrderHistory.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetRepairOrderHistory($index)
    {
        return isset($this->repairOrderHistory[$index]);
    }

    /**
     * unset repairOrderHistory.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetRepairOrderHistory($index)
    {
        unset($this->repairOrderHistory[$index]);
    }

    /**
     * Gets as repairOrderHistory.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\RepairOrderType[]
     */
    public function getRepairOrderHistory()
    {
        return $this->repairOrderHistory;
    }

    /**
     * Sets a new repairOrderHistory.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\RepairOrderType[] $repairOrderHistory
     *
     * @return self
     */
    public function setRepairOrderHistory(array $repairOrderHistory)
    {
        $this->repairOrderHistory = $repairOrderHistory;

        return $this;
    }

    /**
     * Adds as serviceCampaign.
     *
     * @return self
     */
    public function addToServiceCampaigns(\App\Soap\dealerbuilt\src\Models\ServiceCampaigns\ServiceCampaignType $serviceCampaign)
    {
        $this->serviceCampaigns[] = $serviceCampaign;

        return $this;
    }

    /**
     * isset serviceCampaigns.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetServiceCampaigns($index)
    {
        return isset($this->serviceCampaigns[$index]);
    }

    /**
     * unset serviceCampaigns.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetServiceCampaigns($index)
    {
        unset($this->serviceCampaigns[$index]);
    }

    /**
     * Gets as serviceCampaigns.
     *
     * @return \App\Soap\dealerbuilt\src\Models\ServiceCampaigns\ServiceCampaignType[]
     */
    public function getServiceCampaigns()
    {
        return $this->serviceCampaigns;
    }

    /**
     * Sets a new serviceCampaigns.
     *
     * @param \App\Soap\dealerbuilt\src\Models\ServiceCampaigns\ServiceCampaignType[] $serviceCampaigns
     *
     * @return self
     */
    public function setServiceCampaigns(array $serviceCampaigns)
    {
        $this->serviceCampaigns = $serviceCampaigns;

        return $this;
    }

    /**
     * Adds as serviceContract.
     *
     * @return self
     */
    public function addToServiceContracts(\App\Soap\dealerbuilt\src\Models\ServiceContracts\ServiceContractType $serviceContract)
    {
        $this->serviceContracts[] = $serviceContract;

        return $this;
    }

    /**
     * isset serviceContracts.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetServiceContracts($index)
    {
        return isset($this->serviceContracts[$index]);
    }

    /**
     * unset serviceContracts.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetServiceContracts($index)
    {
        unset($this->serviceContracts[$index]);
    }

    /**
     * Gets as serviceContracts.
     *
     * @return \App\Soap\dealerbuilt\src\Models\ServiceContracts\ServiceContractType[]
     */
    public function getServiceContracts()
    {
        return $this->serviceContracts;
    }

    /**
     * Sets a new serviceContracts.
     *
     * @param \App\Soap\dealerbuilt\src\Models\ServiceContracts\ServiceContractType[] $serviceContracts
     *
     * @return self
     */
    public function setServiceContracts(array $serviceContracts)
    {
        $this->serviceContracts = $serviceContracts;

        return $this;
    }

    /**
     * Gets as vehicleInformation.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleServiceVehicleDataType
     */
    public function getVehicleInformation()
    {
        return $this->vehicleInformation;
    }

    /**
     * Sets a new vehicleInformation.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleServiceVehicleDataType $vehicleInformation
     *
     * @return self
     */
    public function setVehicleInformation(VehicleServiceVehicleDataType $vehicleInformation)
    {
        $this->vehicleInformation = $vehicleInformation;

        return $this;
    }

    /**
     * Gets as vehicleSeller.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleServiceSoldByDealerType
     */
    public function getVehicleSeller()
    {
        return $this->vehicleSeller;
    }

    /**
     * Sets a new vehicleSeller.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleServiceSoldByDealerType $vehicleSeller
     *
     * @return self
     */
    public function setVehicleSeller(VehicleServiceSoldByDealerType $vehicleSeller)
    {
        $this->vehicleSeller = $vehicleSeller;

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

    /**
     * Adds as warranty.
     *
     * @return self
     */
    public function addToWarranties(\App\Soap\dealerbuilt\src\Models\Warranty\WarrantyType $warranty)
    {
        $this->warranties[] = $warranty;

        return $this;
    }

    /**
     * isset warranties.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetWarranties($index)
    {
        return isset($this->warranties[$index]);
    }

    /**
     * unset warranties.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetWarranties($index)
    {
        unset($this->warranties[$index]);
    }

    /**
     * Gets as warranties.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Warranty\WarrantyType[]
     */
    public function getWarranties()
    {
        return $this->warranties;
    }

    /**
     * Sets a new warranties.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Warranty\WarrantyType[] $warranties
     *
     * @return self
     */
    public function setWarranties(array $warranties)
    {
        $this->warranties = $warranties;

        return $this;
    }
}

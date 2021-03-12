<?php

namespace App\Soap\dealerbuilt\src\Models\Vehicles;

/**
 * Class representing ArrayOfVehicleServiceVehicleDataOptionType
 *
 * 
 * XSD Type: ArrayOfVehicleService.VehicleData.Option
 */
class ArrayOfVehicleServiceVehicleDataOptionType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleServiceVehicleDataOptionType[] $vehicleServiceVehicleDataOption
     */
    private $vehicleServiceVehicleDataOption = [
        
    ];

    /**
     * Adds as vehicleServiceVehicleDataOption
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleServiceVehicleDataOptionType $vehicleServiceVehicleDataOption
     */
    public function addToVehicleServiceVehicleDataOption(\App\Soap\dealerbuilt\src\Models\Vehicles\VehicleServiceVehicleDataOptionType $vehicleServiceVehicleDataOption)
    {
        $this->vehicleServiceVehicleDataOption[] = $vehicleServiceVehicleDataOption;
        return $this;
    }

    /**
     * isset vehicleServiceVehicleDataOption
     *
     * @param int|string $index
     * @return bool
     */
    public function issetVehicleServiceVehicleDataOption($index)
    {
        return isset($this->vehicleServiceVehicleDataOption[$index]);
    }

    /**
     * unset vehicleServiceVehicleDataOption
     *
     * @param int|string $index
     * @return void
     */
    public function unsetVehicleServiceVehicleDataOption($index)
    {
        unset($this->vehicleServiceVehicleDataOption[$index]);
    }

    /**
     * Gets as vehicleServiceVehicleDataOption
     *
     * @return \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleServiceVehicleDataOptionType[]
     */
    public function getVehicleServiceVehicleDataOption()
    {
        return $this->vehicleServiceVehicleDataOption;
    }

    /**
     * Sets a new vehicleServiceVehicleDataOption
     *
     * @param \App\Soap\dealerbuilt\src\Models\Vehicles\VehicleServiceVehicleDataOptionType[] $vehicleServiceVehicleDataOption
     * @return self
     */
    public function setVehicleServiceVehicleDataOption(array $vehicleServiceVehicleDataOption)
    {
        $this->vehicleServiceVehicleDataOption = $vehicleServiceVehicleDataOption;
        return $this;
    }


}


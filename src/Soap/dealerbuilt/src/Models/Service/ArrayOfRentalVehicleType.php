<?php

namespace App\Soap\dealerbuilt\src\Models\Service;

/**
 * Class representing ArrayOfRentalVehicleType
 *
 * 
 * XSD Type: ArrayOfRentalVehicle
 */
class ArrayOfRentalVehicleType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Service\RentalVehicleType[] $rentalVehicle
     */
    private $rentalVehicle = [
        
    ];

    /**
     * Adds as rentalVehicle
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Service\RentalVehicleType $rentalVehicle
     */
    public function addToRentalVehicle(\App\Soap\dealerbuilt\src\Models\Service\RentalVehicleType $rentalVehicle)
    {
        $this->rentalVehicle[] = $rentalVehicle;
        return $this;
    }

    /**
     * isset rentalVehicle
     *
     * @param int|string $index
     * @return bool
     */
    public function issetRentalVehicle($index)
    {
        return isset($this->rentalVehicle[$index]);
    }

    /**
     * unset rentalVehicle
     *
     * @param int|string $index
     * @return void
     */
    public function unsetRentalVehicle($index)
    {
        unset($this->rentalVehicle[$index]);
    }

    /**
     * Gets as rentalVehicle
     *
     * @return \App\Soap\dealerbuilt\src\Models\Service\RentalVehicleType[]
     */
    public function getRentalVehicle()
    {
        return $this->rentalVehicle;
    }

    /**
     * Sets a new rentalVehicle
     *
     * @param \App\Soap\dealerbuilt\src\Models\Service\RentalVehicleType[] $rentalVehicle
     * @return self
     */
    public function setRentalVehicle(array $rentalVehicle)
    {
        $this->rentalVehicle = $rentalVehicle;
        return $this;
    }


}


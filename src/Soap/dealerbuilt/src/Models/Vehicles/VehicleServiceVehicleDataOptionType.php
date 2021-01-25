<?php

namespace App\Soap\dealerbuilt\src\Models\Vehicles;

/**
 * Class representing VehicleServiceVehicleDataOptionType.
 *
 * XSD Type: VehicleService.VehicleData.Option
 */
class VehicleServiceVehicleDataOptionType
{
    /**
     * @var string
     */
    private $optionID = null;

    /**
     * @var string
     */
    private $optionNotes = null;

    /**
     * @var string
     */
    private $optionShortDescription = null;

    /**
     * Gets as optionID.
     *
     * @return string
     */
    public function getOptionID()
    {
        return $this->optionID;
    }

    /**
     * Sets a new optionID.
     *
     * @param string $optionID
     *
     * @return self
     */
    public function setOptionID($optionID)
    {
        $this->optionID = $optionID;

        return $this;
    }

    /**
     * Gets as optionNotes.
     *
     * @return string
     */
    public function getOptionNotes()
    {
        return $this->optionNotes;
    }

    /**
     * Sets a new optionNotes.
     *
     * @param string $optionNotes
     *
     * @return self
     */
    public function setOptionNotes($optionNotes)
    {
        $this->optionNotes = $optionNotes;

        return $this;
    }

    /**
     * Gets as optionShortDescription.
     *
     * @return string
     */
    public function getOptionShortDescription()
    {
        return $this->optionShortDescription;
    }

    /**
     * Sets a new optionShortDescription.
     *
     * @param string $optionShortDescription
     *
     * @return self
     */
    public function setOptionShortDescription($optionShortDescription)
    {
        $this->optionShortDescription = $optionShortDescription;

        return $this;
    }
}

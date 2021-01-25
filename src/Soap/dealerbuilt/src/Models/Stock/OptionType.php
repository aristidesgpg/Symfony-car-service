<?php

namespace App\Soap\dealerbuilt\src\Models\Stock;

/**
 * Class representing OptionType
 *
 * 
 * XSD Type: Option
 */
class OptionType
{

    /**
     * @var string $code
     */
    private $code = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $cost
     */
    private $cost = null;

    /**
     * @var bool $deleteFlag
     */
    private $deleteFlag = null;

    /**
     * @var string $description
     */
    private $description = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\MonetaryValueType $listPrice
     */
    private $listPrice = null;

    /**
     * @var string $manufacturerName
     */
    private $manufacturerName = null;

    /**
     * @var string $optionId
     */
    private $optionId = null;

    /**
     * @var string $optionName
     */
    private $optionName = null;

    /**
     * @var string $optionNotes
     */
    private $optionNotes = null;

    /**
     * @var string $optionType
     */
    private $optionType = null;

    /**
     * Gets as code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Sets a new code
     *
     * @param string $code
     * @return self
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Gets as cost
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Sets a new cost
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $cost
     * @return self
     */
    public function setCost(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $cost)
    {
        $this->cost = $cost;
        return $this;
    }

    /**
     * Gets as deleteFlag
     *
     * @return bool
     */
    public function getDeleteFlag()
    {
        return $this->deleteFlag;
    }

    /**
     * Sets a new deleteFlag
     *
     * @param bool $deleteFlag
     * @return self
     */
    public function setDeleteFlag($deleteFlag)
    {
        $this->deleteFlag = $deleteFlag;
        return $this;
    }

    /**
     * Gets as description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets a new description
     *
     * @param string $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Gets as listPrice
     *
     * @return \App\Soap\dealerbuilt\src\Models\MonetaryValueType
     */
    public function getListPrice()
    {
        return $this->listPrice;
    }

    /**
     * Sets a new listPrice
     *
     * @param \App\Soap\dealerbuilt\src\Models\MonetaryValueType $listPrice
     * @return self
     */
    public function setListPrice(\App\Soap\dealerbuilt\src\Models\MonetaryValueType $listPrice)
    {
        $this->listPrice = $listPrice;
        return $this;
    }

    /**
     * Gets as manufacturerName
     *
     * @return string
     */
    public function getManufacturerName()
    {
        return $this->manufacturerName;
    }

    /**
     * Sets a new manufacturerName
     *
     * @param string $manufacturerName
     * @return self
     */
    public function setManufacturerName($manufacturerName)
    {
        $this->manufacturerName = $manufacturerName;
        return $this;
    }

    /**
     * Gets as optionId
     *
     * @return string
     */
    public function getOptionId()
    {
        return $this->optionId;
    }

    /**
     * Sets a new optionId
     *
     * @param string $optionId
     * @return self
     */
    public function setOptionId($optionId)
    {
        $this->optionId = $optionId;
        return $this;
    }

    /**
     * Gets as optionName
     *
     * @return string
     */
    public function getOptionName()
    {
        return $this->optionName;
    }

    /**
     * Sets a new optionName
     *
     * @param string $optionName
     * @return self
     */
    public function setOptionName($optionName)
    {
        $this->optionName = $optionName;
        return $this;
    }

    /**
     * Gets as optionNotes
     *
     * @return string
     */
    public function getOptionNotes()
    {
        return $this->optionNotes;
    }

    /**
     * Sets a new optionNotes
     *
     * @param string $optionNotes
     * @return self
     */
    public function setOptionNotes($optionNotes)
    {
        $this->optionNotes = $optionNotes;
        return $this;
    }

    /**
     * Gets as optionType
     *
     * @return string
     */
    public function getOptionType()
    {
        return $this->optionType;
    }

    /**
     * Sets a new optionType
     *
     * @param string $optionType
     * @return self
     */
    public function setOptionType($optionType)
    {
        $this->optionType = $optionType;
        return $this;
    }


}


<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ArrayOfDropdownListDetailsType
 *
 * 
 * XSD Type: ArrayOfDropdownListDetails
 */
class ArrayOfDropdownListDetailsType
{

    /**
     * @var \App\Soap\dealerbuilt\src\BaseApi\DropdownListDetailsType[] $dropdownListDetails
     */
    private $dropdownListDetails = [
        
    ];

    /**
     * Adds as dropdownListDetails
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\BaseApi\DropdownListDetailsType $dropdownListDetails
     */
    public function addToDropdownListDetails(\App\Soap\dealerbuilt\src\BaseApi\DropdownListDetailsType $dropdownListDetails)
    {
        $this->dropdownListDetails[] = $dropdownListDetails;
        return $this;
    }

    /**
     * isset dropdownListDetails
     *
     * @param int|string $index
     * @return bool
     */
    public function issetDropdownListDetails($index)
    {
        return isset($this->dropdownListDetails[$index]);
    }

    /**
     * unset dropdownListDetails
     *
     * @param int|string $index
     * @return void
     */
    public function unsetDropdownListDetails($index)
    {
        unset($this->dropdownListDetails[$index]);
    }

    /**
     * Gets as dropdownListDetails
     *
     * @return \App\Soap\dealerbuilt\src\BaseApi\DropdownListDetailsType[]
     */
    public function getDropdownListDetails()
    {
        return $this->dropdownListDetails;
    }

    /**
     * Sets a new dropdownListDetails
     *
     * @param \App\Soap\dealerbuilt\src\BaseApi\DropdownListDetailsType[] $dropdownListDetails
     * @return self
     */
    public function setDropdownListDetails(array $dropdownListDetails)
    {
        $this->dropdownListDetails = $dropdownListDetails;
        return $this;
    }


}


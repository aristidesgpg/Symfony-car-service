<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing DropdownListDetailsType.
 *
 * XSD Type: DropdownListDetails
 */
class DropdownListDetailsType extends ApiStoreItemType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Stock\DropdownListDetailsResponseType
     */
    private $dropdownListDetailsResponse = null;

    /**
     * Gets as dropdownListDetailsResponse.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Stock\DropdownListDetailsResponseType
     */
    public function getDropdownListDetailsResponse()
    {
        return $this->dropdownListDetailsResponse;
    }

    /**
     * Sets a new dropdownListDetailsResponse.
     *
     * @return self
     */
    public function setDropdownListDetailsResponse(\App\Soap\dealerbuilt\src\Models\Stock\DropdownListDetailsResponseType $dropdownListDetailsResponse)
    {
        $this->dropdownListDetailsResponse = $dropdownListDetailsResponse;

        return $this;
    }
}

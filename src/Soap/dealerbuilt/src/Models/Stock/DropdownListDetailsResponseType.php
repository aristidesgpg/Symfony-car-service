<?php

namespace App\Soap\dealerbuilt\src\Models\Stock;

/**
 * Class representing DropdownListDetailsResponseType.
 *
 * XSD Type: DropdownListDetailsResponse
 */
class DropdownListDetailsResponseType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Stock\MnCodeTypeDetailType[]
     */
    private $codeTypeDetails = null;

    /**
     * Adds as mnCodeTypeDetail.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Stock\MnCodeTypeDetailType $mnCodeTypeDetail
     */
    public function addToCodeTypeDetails(MnCodeTypeDetailType $mnCodeTypeDetail)
    {
        $this->codeTypeDetails[] = $mnCodeTypeDetail;

        return $this;
    }

    /**
     * isset codeTypeDetails.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetCodeTypeDetails($index)
    {
        return isset($this->codeTypeDetails[$index]);
    }

    /**
     * unset codeTypeDetails.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetCodeTypeDetails($index)
    {
        unset($this->codeTypeDetails[$index]);
    }

    /**
     * Gets as codeTypeDetails.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Stock\MnCodeTypeDetailType[]
     */
    public function getCodeTypeDetails()
    {
        return $this->codeTypeDetails;
    }

    /**
     * Sets a new codeTypeDetails.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Stock\MnCodeTypeDetailType[] $codeTypeDetails
     *
     * @return self
     */
    public function setCodeTypeDetails(array $codeTypeDetails)
    {
        $this->codeTypeDetails = $codeTypeDetails;

        return $this;
    }
}

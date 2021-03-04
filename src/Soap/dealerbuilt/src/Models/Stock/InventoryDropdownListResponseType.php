<?php

namespace App\Soap\dealerbuilt\src\Models\Stock;

/**
 * Class representing InventoryDropdownListResponseType
 *
 * 
 * XSD Type: InventoryDropdownListResponse
 */
class InventoryDropdownListResponseType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Stock\CodeTypeDetailType[] $codeTypeDetails
     */
    private $codeTypeDetails = null;

    /**
     * Adds as codeTypeDetail
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Stock\CodeTypeDetailType $codeTypeDetail
     */
    public function addToCodeTypeDetails(\App\Soap\dealerbuilt\src\Models\Stock\CodeTypeDetailType $codeTypeDetail)
    {
        $this->codeTypeDetails[] = $codeTypeDetail;
        return $this;
    }

    /**
     * isset codeTypeDetails
     *
     * @param int|string $index
     * @return bool
     */
    public function issetCodeTypeDetails($index)
    {
        return isset($this->codeTypeDetails[$index]);
    }

    /**
     * unset codeTypeDetails
     *
     * @param int|string $index
     * @return void
     */
    public function unsetCodeTypeDetails($index)
    {
        unset($this->codeTypeDetails[$index]);
    }

    /**
     * Gets as codeTypeDetails
     *
     * @return \App\Soap\dealerbuilt\src\Models\Stock\CodeTypeDetailType[]
     */
    public function getCodeTypeDetails()
    {
        return $this->codeTypeDetails;
    }

    /**
     * Sets a new codeTypeDetails
     *
     * @param \App\Soap\dealerbuilt\src\Models\Stock\CodeTypeDetailType[] $codeTypeDetails
     * @return self
     */
    public function setCodeTypeDetails(array $codeTypeDetails)
    {
        $this->codeTypeDetails = $codeTypeDetails;
        return $this;
    }


}


<?php

namespace App\Soap\dealerbuilt\src\Models\Stock;

/**
 * Class representing MnCodeTypeDetailType.
 *
 * XSD Type: MnCodeTypeDetail
 */
class MnCodeTypeDetailType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Stock\MnCodeDetailType
     */
    private $codeDetails = null;

    /**
     * @var string
     */
    private $codeType = null;

    /**
     * Gets as codeDetails.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Stock\MnCodeDetailType
     */
    public function getCodeDetails()
    {
        return $this->codeDetails;
    }

    /**
     * Sets a new codeDetails.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Stock\MnCodeDetailType $codeDetails
     *
     * @return self
     */
    public function setCodeDetails(MnCodeDetailType $codeDetails)
    {
        $this->codeDetails = $codeDetails;

        return $this;
    }

    /**
     * Gets as codeType.
     *
     * @return string
     */
    public function getCodeType()
    {
        return $this->codeType;
    }

    /**
     * Sets a new codeType.
     *
     * @param string $codeType
     *
     * @return self
     */
    public function setCodeType($codeType)
    {
        $this->codeType = $codeType;

        return $this;
    }
}

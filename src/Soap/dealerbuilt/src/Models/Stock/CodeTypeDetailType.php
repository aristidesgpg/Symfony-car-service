<?php

namespace App\Soap\dealerbuilt\src\Models\Stock;

/**
 * Class representing CodeTypeDetailType
 *
 * 
 * XSD Type: CodeTypeDetail
 */
class CodeTypeDetailType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Stock\CodeDetailType $codeDetails
     */
    private $codeDetails = null;

    /**
     * @var string $codeType
     */
    private $codeType = null;

    /**
     * Gets as codeDetails
     *
     * @return \App\Soap\dealerbuilt\src\Models\Stock\CodeDetailType
     */
    public function getCodeDetails()
    {
        return $this->codeDetails;
    }

    /**
     * Sets a new codeDetails
     *
     * @param \App\Soap\dealerbuilt\src\Models\Stock\CodeDetailType $codeDetails
     * @return self
     */
    public function setCodeDetails(\App\Soap\dealerbuilt\src\Models\Stock\CodeDetailType $codeDetails)
    {
        $this->codeDetails = $codeDetails;
        return $this;
    }

    /**
     * Gets as codeType
     *
     * @return string
     */
    public function getCodeType()
    {
        return $this->codeType;
    }

    /**
     * Sets a new codeType
     *
     * @param string $codeType
     * @return self
     */
    public function setCodeType($codeType)
    {
        $this->codeType = $codeType;
        return $this;
    }


}

